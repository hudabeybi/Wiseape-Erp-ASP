var WiseapeApplication = Class({
	_name: null,
	_description: null,
	_text: null,
	_client: null,
	_id: null,
	_icon: null,
	_info: null,
	_desktop: null,
	_appPath: null,
	_parameterData: null,
	_parentProcess: null,
	_onNotifyWorkflow: null,
	onExitApplication: null,
	constructor: function( basePath, name, text, description)
	{
		this.id = Util.createId();
		this.name = name;
		this.text = text;
		this.description = description;
		this.appPath = basePath;
	}
	,
	init: function (client, desktop)
	{
		this.client = client;
		this.desktop = desktop;
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
	onNotifyWorkflow: {
		get: function ()
		{
			return this._onNotifyWorkflow;
		},
		set: function(value)
		{
			this._onNotifyWorkflow = value;
		}
	}
	,
	parameterData: {
		get: function ()
		{
			return this._parameterData;
		},
		set: function(value)
		{
			this._parameterData = value;
		}
	}
	,
	client: {
		get: function ()
		{
			return this._client;
		},
		set: function(value)
		{
			this._client= value;
		}
	}
	,
	desktop: {
		get: function ()
		{
			return this._desktop;
		},
		set: function(value)
		{
			this._desktop = value;
		}
	}
	,
	parentProcess: 
	{
		get: function()
		{
			return this._parentProcess;
		}
		,
		set: function(value)
		{
			this._parentProcess = value;
		}
	}
	,
	getPath: function()
	{
		var s = this.client.client.getAppUrl( this.info.appPath );
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
	run: function (client, command, param, callback)
	{
		this.client = client;
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
		eval("me." + command + "(me, param, callback);");
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
		var win = this.client.desktop.createWindow( this, name, title, this.info.appPath + "/" + pageUrl, option);
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
	openForm: function (me, formFile, callback)
	{
		var formName = formFile.split("/");
		formName = formName[formName.length - 1];
		formName = formName.replace(".js", "");

		me.openFormAgain(me, formName, formFile, callback);
	}
	,
	openFormAgain: function (me, formName, formFile, callback)
	{
		me.loadScript( me.appPath + "/" + formFile, function ()
		{
			eval("var win = new " + formName + "(me );");
			//win.show(param);
			if(callback != null)
				callback(me, win );
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
		me.client.client.getApplication(appName, function(appInfo)
		{
			me.client.desktop.createApp(me.client, appInfo, callback);
		});
	}

	,
	runAppOld: function(name, command, param, callback)
	{
		var me = this;
		me.openApp(name, function (app)
		{
			app.run(me.client, command, param, function (data)
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
		me.client.client.getApplication(appName, function(appInfo)
		{
			var appPath = appInfo["appPath"];
			var configFile = appPath + "/config.json";
			me.client.client.loadPage( configFile, function(json)
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

		formFilePath = me.client.client.getAppUrl(formFilePath + formClass + ".js");
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

		dataServiceFilePath = me.client.client.getAppUrl(dataServiceFilePath + dataServiceClass + ".js");
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
	,
	raiseEvent: function(event, param)
	{
		this.execute(this, event, param);
	}
	,
	notifyWorkflow: function(data, isDelete, callback)
	{
		if(this.onNotifyWorkflow != null)
			this.onNotifyWorkflow(data, isDelete, callback);
	}
	,
	exitApplication: function()
	{
		if(this.onExitApplication != null)
			this.onExitApplication();
	}

});







