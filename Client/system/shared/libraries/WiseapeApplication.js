var WiseapeApplication = Class({
	_name: null,
	_description: null,
	_text: null,
	_core: null,
	_id: null,
	_icon: null,
	_info: null,
	constructor: function(name, text, description)
	{
		this.id = makeid();
		this.name = name;
		this.text = text;
		this.description = description;
	}
	,
	init: function (core)
	{
		this.core = core;
	}
	,
	id: {
		get: function ()
		{
			return this._id;
		},
		set: function(value)
		{
			this._id = value;
		}
	}
	,
	info: {
		get: function ()
		{
			return this._info;
		},
		set: function(value)
		{
			this._info = value;
		}
	}
	,
	name: {
		get: function ()
		{
			return this._name;
		},
		set: function(value)
		{
			this._name = value;
		}
	}
	,
	text: {
		get: function ()
		{
			return this._text;
		},
		set: function(value)
		{
			this._text = value;
		}
	}	
	,
	icon: {
		get: function ()
		{
			return this._icon;
		},
		set: function(value)
		{
			this._icon = value;
		}
	}
	,
	description: {
		get: function ()
		{
			return this._description;
		},
		set: function(value)
		{
			this._description = value;
		}
	}
	,
	core: {
		get: function ()
		{
			return this._core;
		},
		set: function(value)
		{
			this._core= value;
		}
	}
	,
	getPath: function()
	{
		var s = this.core.client.getAppUrl( this.info.appPath );
		return s;
	}
	,
	getFile: function()
	{
		return this.path + "/" + this.info.appFile;
	}
	,
	/* 1. Application start program when user click the desktop icon */
	/*	  Everytime We use application object, we call 'run' function with command string parameter' */
	run: function (core, command, param, callback)
	{
		this.core = core;
		this.execute(this, command, param, callback);
	}

	,
	/* 2. Execute command default */
	execute: function (me, command, param, callback)
	{
		if(command == null)
			command = "default";
		if(param == null)
			param = {};
		eval("me." + command + "(me, command, param, callback);");
	}

	,
	/* 3. Default command run by application. It can be overriden by the inherited application */
	default: function (me, command, param)
	{
		me.runApp(me.name, param);
	}

	,
	createWindow: function(name, title, pageUrl, option)
	{
		var win = this.core.desktop.createWindow( this, name, title, this.info.appPath + "/" + pageUrl, option);
		return win;
	}

	,
	loadScript: function ( url, callback )
	{
		$.getScript(url, function (text)
		{
			if(callback != null)
				callback( );
		});
	}

	,
	openForm: function (me, formName, formFile, param, callback)
	{
		me.loadScript( me.core.client.config.path.applications + "/" + formFile, function ()
		{
			eval("var win = new " + formName + "(me );");
			win.show(param);
			if(callback != null)
				callback( win );
		});
	}

	,
	runForm: function(me, formName, formFile, param, callback, oncloseCallback)
	{
		me.openForm(me, formName, formFile, param, function (win)
		{
			console.log(win);
			win.onClose = function (data)
			{
				if(oncloseCallback != null)
					oncloseCallback(data);
			}

		});
	}

	,
	getForm: function(me, id, param, callback, onclosedCallback)
	{
		var formConfig = FormProxy.create(me, id);
		var formName = formConfig.formName;
		var formFile = formConfig.formFile;
		me.runForm(me, formName, formFile, param, callback, onclosedCallback);
	}

	,
	openApp: function (appName, callback)
	{
		var me = this;
		me.core.client.getApplication(appName, function(appInfo)
		{
			me.core.desktop.createApp(me.core, appInfo, callback);
		});
	}

	,
	runAppOld: function(name, command, param, callback)
	{
		var me = this;
		me.openApp(name, function (app)
		{
			app.run(me.core, command, param, function (data)
			{
				if(callback!=null)
					callback(data);
			});
		});
	}

	,
	/* 1. Run app command */
	runApp: function(appName, param, configFile)
	{

		var me = this;
		me.core.client.getApplication(appName, function(appInfo)
		{
			var appPath = appInfo["appPath"];
			var configFile = appPath + "/config.json";
			me.core.client.loadPage( configFile, function(json)
			{
				var configData = JSON.parse(json);
				me.processEvent(me, configData, "default");
			});

		});
	}

	,
	/* 2. Run app command: process command string */
	processEvent: function(me, configData, eventId, param)
	{
		/* Get the event info from config data */
		var event = me.getEventInfoFormData(configData, eventId);

		/* If event type == new form */
		if(event.eventType == "newForm")
		{
			me.newFormAction(me, event, function (form)
			{
				form.onClose = function(o)
				{
					
				}
			});
		}
	}
	,
	newFormAction: function (me, event, callback)
	{
		/* Create form from event info */
		me.createFormFromEventInfo(me, event, function(form)
		{
			//Get data service
			me.getDataServiceFromEventInfo(me, event, function( service )
			{
				//Get lookup data list from service
				service.getLookupDataList(function (lookups)
				{
					//Set the lookupdata to form
					form.setLookupDataSource( lookups, function ()
					{
						//Get new object 
						service.newData( function (o)
						{
							form.setDataSource(o, function()
							{
								var ret = { form: form, service: service }
								me.callCallback( me, ret, callback );
							});
						});
					});
				});
				
			});
		});
	}
	,
	editFormAction: function (me, callback)
	{
		/* Create form from event info */
		me.createFormFromEventInfo(me, event, function(form)
		{
			//Get data service
			me.getDataServiceFromEventInfo(me, event, function( service )
			{
				//Get lookup data list from service
				service.getLookupDataList(function (lookups)
				{
					//Set the lookupdata to form
					form.setLookupDataSource( lookups, function ()
					{
						//Get new object 
						service.getData( function (o)
						{
							form.setDataSource(o, function()
							{
								me.callCallback( me, form, callback );
							});
						});
					});
				});
				
			});
		});
	}
	,
	getEventInfoFormData: function (data, eventId)
	{
		for(var i = 0; i < data.length; i++)
		{
			if(data[i].eventId == eventId)
				return data[i];
		}
		return null;
	}
	,
	createFormFromEventInfo: function (me, eventInfo, callback)
	{
		var formInfo = eventInfo.form.split("/");
		var formClass = formInfo[ formInfo.length - 1];
		var formFilePath = "";
		for(var i = 0; i < formInfo.length - 1; i++)
		{
			formFilePath += formInfo[i] + "/";
		}

		formFilePath = me.core.client.getAppUrl(formFilePath + formClass + ".js");
		$.getScript( formFilePath, function()
		{
			eval("var win = new " + formClass + "();");
			me.callCallback(me, win, callback);
		});		
		
	}
	,
	getDataServiceFromEventInfo: function(me, eventInfo, callback)
	{
		var dataServiceInfo = eventInfo.dataService.split("/");
		var dataServiceClass = dataServiceInfo[ dataServiceInfo.length - 1];
		var dataServiceFilePath = "";

		for(var i = 0; i < dataServiceInfo.length - 1; i++)
		{
			dataServiceFilePath += dataServiceInfo[i] + "/";
		}

		dataServiceFilePath = me.core.client.getAppUrl(dataServiceFilePath + dataServiceClass + ".js");
		$.getScript( dataServiceFilePath, function()
		{
			eval("var service = new " + dataServiceClass + "();");
			me.callCallback(me, service, callback);
		});		
	}
	,
	callCallback: function (me, data, callback)
	{
		if(callback != null)
			callback(me, data);
	}
	,
	/* Function to get new data object for form */
	newData: function (me, serviceId, param, callback)
	{
		/* Get service for new project with 'new.project' key */
		me.getService(me, serviceId, param, function(service)
		{
			/* get the new data from the service */
			service.newData(param, function (data)
			{
				/* call the next function to handle the new data */
				me.callCallback(me, data, callback);
			});
		});
	}
	,
	/* Function to get data object for form */
	getData: function (me, serviceId, param, callback)
	{
		/* Get service for new project with 'new.project' key */
		me.getService(me, serviceId, param, function(service)
		{
			/* get the new data from the service */
			service.getData(param, function (data)
			{
				/* call the next function to handle the new data */
				me.callCallback(me, data, callback);
			});
		});
	}
	,
	/* Function to get all the lookups required by the form */
	getLookups: function(me, serviceId, param, callback)
	{
		/* Get service for new project with 'new.project' key */
		me.getService(me, serviceId, param, function(service)
		{
			/* get the lookup data from the service */
			service.getLookups(param, function (lookups)
			{
				/* call the next function to handle the lookup data */
				me.callCallback(me, lookups, callback);
			});
		});
		
	}
	,
	/* Function to create the form */
	createForm: function (me, id, param, option)
	{
		var onclosedCallback = null;
		if(option != null)
			onclosedCallback = option.onClose;

		/* Buka form untuk input informasi project */
		me.getForm(me, id, param, 
			
			/* callback function for me.getForm() */
			function( form )
			{
				

			}
		, onclosedCallback);
	}


});


function makeid()
{
    var text = "";
    var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

    for( var i=0; i < 10; i++ )
        text += possible.charAt(Math.floor(Math.random() * possible.length));

    return text;
}



var WiseapeKernel = Class({
	server: null,
	client: null,
	desktop: null,
	run: function(mainContainer)
	{
		this.server = new WiseapeServer();
		this.client = new WiseapeClient();
		var desktop = new WiseapeDesktop(mainContainer);
		this.desktop = desktop;
		var full = location.protocol+'//'+location.hostname+(location.port ? ':'+location.port: '') + "/" + location.pathname;
		if(full.substr(full.length - 1) == "/")
			full = full.substr(0, full.length - 1);
		
		var serverConfig = new ServerConfig( full + "/../Server", null);
		var clientConfig = new ClientConfig( full +  "", null);
		core.server.config = serverConfig;
		core.client.config = clientConfig;

		this.client.getApplications(function (apps)
		{
			this.desktop.run(this);
		});
	}
});

var WiseapeServer = Class({
	config: null,
	constructor: function(config)
	{
		this.config = config;
	}
	,
	execute: function(command, param, callback)
	{
		var url = this.config.getUrl(command);
		//alert(url);
		$.post(url, param, function (result)
		{
			var o = null;
			try
			{
				o = JSON.parse(result);
				if(callback != null)
				{
					callback(o);
				}
			}
			catch(err)
			{
				if(callback != null)
				{
					callback(null, err);
				}
			}
		});
	}
});

var WiseapeClient = Class({
	config: null,
	constructor: function(config)
	{
		this.config = config;
	}
	,
	loadSystemPage: function(url, callback)
	{
		$.get(this.config.uri + "/" + this.config.path.system.applications + "/" + url, function(html)
		{
			if(callback != null)
				callback(html);
		});
	}
	,
	getSystemPageUrl: function (url)
	{
		return this.config.uri + "/" + this.config.path.system.applications + "/" + url;
	}
	,
	getApplications: function (callback)
	{
		$.get(this.config.uri + "/" + this.config.path.system.data + "/application.info.dat?id=" + makeid(), function(text)
		{
			var data = JSON.parse(text);
			if(callback != null)
				callback( data );
		}); 
	}
	,
	getApplication: function (appName, callback)
	{
		
		$.get(this.config.uri + "/" + this.config.path.system.data + "/application.info.dat?id=" + makeid(), function(text)
		{
			var data = JSON.parse(text);
			for(var i = 0; i < data.length; i++)
			{
				if(data[i].appName == appName)
				{
					if(callback != null)
						callback( data[i] );
				}
			}
			
		}); 
	}
	,
	getAppUrl: function (appname)
	{
		return this.config.uri + "/" + this.config.path.applications + "/" + appname;
	}
	,
	loadAppPage: function ( url, callback )
	{
		$.get(this.config.uri + "/" + this.config.path.applications + "/" + url, function(html)
		{
			if(callback != null)
				callback(html);
		});
	}
	,
	loadPage: function (url, callback)
	{
		$.get( url, function(html)
		{
			if(callback != null)
				callback(html);
		});
	}
	,
	loadLibraryFile: function (filename, callback){
		$.getScript(filename, function( data, textStatus, jqxhr )
		{
			if(callback != null)
				callback();
		});
	}

});


var ServerConfig = Class({
	uri: "http://localhost:9998",
	baseDir: null,
	constructor: function (uri, baseDir)
	{
		this.uri 		= uri;
		this.baseDir 	= baseDir;
	}
	,
	getUrl: function(command)
	{
		if(this.baseDir != null)
			this.baseDir += "/";
			
		var url = this.uri + "/"  + command; 
		return url;
	}
});

var ClientConfig = Class({
	uri: "",
	path: {
		system: { applications: "system/applications", shared: "system/shared", data: "system/data" },
		applications: "applications",
		applicationSharedLibrary: "applications/SharedLibrary"
	}
	,
	constructor: function(uri)
	{
		this.uri 		= uri;
	}
});






