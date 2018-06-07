var WiseapeClient = Class({
	config: null,
	serverConfig: null,
	applications: null,
	workflowEngine: null,
	useWorkflowEngine: false,
	constructor: function(config)
	{
		this.config = config;
		//this.workflowEngine = new WiseapeWorkflowEngine();
		this.applications = new Array();
		WebClient.onAfterSendPostData = this.onAfterSendPostData;
	}
	,
	run: function()
	{
		var me = this;
		me.authenticate(me, function()
		{
			me.getAllApplicationGroups(me, function(result)
			{
				me.initDesktop(me, result);
			});
		});
	}
	,
	authenticate: function(me, callback)
	{
		OAuthClient.authenticate(function ()
		{
			if(callback != null)
				callback();
		});
	}
	,
	getAllApplicationGroups: function(me, callback)
	{
		var url = me.serverConfig.getUrl("ApplicationGroupService.svc/applicationgroup/find/all/1/100");
		WebClient.get(url, function(result)
		{
			if(callback != null)
				callback(result);
		});
	}
	,
	initDesktop: function(me, result)
	{
		var desktop = new WiseapeDesktop(this.config.mainContainer);
		this.desktop = desktop;
		this.desktop.run(me, result.Data);

		//Handle when user click application icon in the desktop
		this.desktop.onApplicationIconClick(
			function (appInfo, callback)
			{
				me.loadApplication(me, appInfo, function(apInfo)
				{
					if(callback!= null)
						callback(apInfo);
				});
			}
		);
		
	}
	,
	runApp: function( appName, param, callback)
	{
		var me = this;
		WebClient.get(me.serverConfig.webService + "/ApplicationItemService.svc/applicationitem/find-by-application-name/" + appName, function(result)
		{

			var appInfo = result.Data;
			appInfo = appInfo[0];
			console.log("appInfo");
			console.log(appInfo);
			var jsFile = appInfo.ApplicationPath + "/" + appInfo.ApplicationFile;
			console.log("jsFile : " + jsFile);
			me.loadLibraryFile(jsFile, function()
			{
				var appObject = appInfo.ApplicationClass;
				console.log(appInfo);
				var appPath = appInfo.ApplicationPath;
				var appName = appInfo.ApplicationName;
				var appDesc = appInfo.ApplicationInfo;
				eval("var app = new " + appObject + "('" + appPath   + "', '" + appName + "', '" + appDesc + "' );");
				//app.parentProcess = processInfo;
				app.icon = appPath + "/" + appInfo.ApplicationIcon;
				app.init(me, me.desktop);
				app.parameterData = param;

				if(callback != null)
					callback(app);

				app.run(param);

			});
		});
	}
	,
	loadApplication: function(me, appInfo, callback)
	{
		console.log("loadApplication");
		//console.log(processInfo);
		var jsFile = appInfo.ApplicationPath + "/" + appInfo.ApplicationFile;
		me.loadLibraryFile( jsFile, function()
		{

			var appObject = appInfo.ApplicationClass;
			var appPath = appInfo.ApplicationPath;
			var appName = appInfo.ApplicationName;
			var appDesc = appInfo.ApplicationDesc;
			eval("var app = new " + appObject + "('" + appPath   + "', '" + appName + "', '" + appDesc + "' );");
			app.parentProcess = appInfo;
			app.icon = appInfo.ApplicationPath + "/" + appInfo.ApplicationIcon;
			app.init(me, me.desktop);
			app.run();

			if(callback != null)
				callback(appInfo);
		});
	}
	,
	onAfterSendPostData: function(data, res)
	{

	}
	,
	afterWorkflow: null
	,
	notifyWorkflow: function(app, data, isDelete, callback)
	{
	
		if(this.afterWorkflow != null)
			this.afterWorkflow();

		this.afterWorkflow = callback;
		this.workflowEngine.saveCurrentProcessData(app, data, isDelete);
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
		$.get(this.config.uri + "/" + this.config.path.system.data + "/application.info.dat?id=" + Util.createId(6), function(text)
		{
			var data = JSON.parse(text);
			if(callback != null)
				callback( data );
		}); 
	}
	,
	getApplicationsInfo: function (appName, callback)
	{
		
		$.get(this.config.uri + "/" + this.config.path.system.data + "/application.info.dat?id=" + Util.createId(6), function(text)
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
	getProcessGroupList: function(me, callback)
	{
		WebClient.get(me.serverConfig.webService + "/ProcessGroupService.svc/processgroup/find/all/1/100", function(result)
		{
			if(callback != null)
				callback( result );
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
		}, "html");
	}
	,
	loadLibraryFile: function (filename, callback){
		$.getScript(filename, function( data, textStatus, jqxhr )
		{
			if(callback != null)
				callback();
		});
	}
	,
	get: function(url, callback)
	{
		WebClient.get(url, callback);
	}
	,
	post: function(url, param, callback)
	{
		WebClient.get(url, param, callback);
	}

});