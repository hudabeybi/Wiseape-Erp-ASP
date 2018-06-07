var WiseapeWorkflowEngine = Class({

	clientConfig: null,
	serverConfig: null,
	sessionId : null,
	onNextProcessRun: null,
	runNextProcess: function(currentProcessInfo, currentApp, sessionId)
	{
		var me = this;
		me.getNextProcess(me, currentProcessInfo, sessionId, function(result)
		{
			if(result.Data != null)
			{
				var nextProsess = result.Data;
			}
		});
	}
	,
	getNextProcess: function(me, currentProcessInfo, sessionId, data, callback)
	{
		var url	=	me.serverConfig.webService + "/ProcessService.svc/process/next";

		var hdata = {};
		hdata.IdSession = sessionId;
		hdata.IdCurrentProcess = currentProcessInfo.IdProcess;
		hdata.JsonData = JSON.stringify(data);

		hdata = JSON.stringify(hdata);
		WebClient.post(url, hdata,  function(result)
		{
			if(callback != null)
				callback(result);
		});
	}
	,
	runProcess: function(processInfo, callback)
	{
		var me = this;
		if(processInfo.PreviousWorkflowEvaluatorId == null)
			me.sessionId = Util.createId(12);

		me.getProcessDataForCurrentProcess(me, processInfo, me.sessionId, function(result)
		{
			var app = me.createApplication(me, processInfo );
			console.log("getProcessDataForCurrentProcess");
			//console.log(result);
			if(result.Data != null)
			{
				var arr = new Array();
				for(var i = 0; i < result.Data.length; i++)
				{
					var jsonData =  JSON.parse( result.Data[i].Data) ;
					arr.push(jsonData);
				}
				app.parameterData = arr;
			}
			if(callback != null)
				callback(app);
		});
	}
	,
	createApplication: function(me, processInfo)
	{
		var appInfo = processInfo.Application;
		var appObject = appInfo.ApplicationClass;
		var appPath = me.clientConfig.path.applications + "/" + appInfo.ApplicationPath;
		var appName = appInfo.ApplicationName;
		var appDesc = appInfo.ApplicationInfo;
		eval("var app = new " + appObject + "('" + appPath   + "', '" + appName + "', '" + appDesc + "' );");
		app.parentProcess = processInfo;
		app.icon = me.clientConfig.path.applications + "/" + appInfo.ApplicationIconSmall;
		return app;
	}
	,
	getProcessDataForCurrentProcess: function(me, processInfo, sessionId, callback)
	{
		//if(sessionId)
		//{
			var url	=	me.serverConfig.webService + "/ProcessDataServiceExtension.svc/processdata/find-by-session-and-next-process/";
			url		+=	sessionId + "/" + processInfo.IdProcess;

			var url	=	me.serverConfig.webService + "/ProcessDataServiceExtension.svc/processdata/find-by-next-process/";
			url		+=	 processInfo.IdProcess;
			
			
			WebClient.get( url, function(result)
			{
				
				if(callback != null)
					callback(result);
			});
		//}
		
	}
	,
	saveCurrentProcessData: function(app, data, isDelete)
	{
		var me = this;
		var previousProcess = app.parentProcess;
		me.getNextProcess(me, previousProcess, me.sessionId, data, function(result)
		{
			if(result.Result)
			{
				var nextProcess = result.Data;
				if(isDelete)
				{
					me.deleteData(me, previousProcess, nextProcess, function(me, result)
					{
						me.saveData(me, previousProcess, nextProcess, data, function(result)
						{
							if(me.onNextProcessRun != null)
								me.onNextProcessRun( nextProcess );
						});
					});
				}
				else
				{
						me.saveData(me, previousProcess, nextProcess, data, function(result)
						{
							if(me.onNextProcessRun != null)
								me.onNextProcessRun( nextProcess );
						});
				}


			}
		});
	}
	,
	deleteData: function(me, previousProcess, nextProcess, callback)
	{
		var url	=	me.serverConfig.webService + "/ProcessDataService.svc/processdata/delete-by-current-and-next-process/";
		url += previousProcess.IdProcess + "/" + nextProcess.IdProcess;
		WebClient.get(url, function(result)
		{
			if(callback != null)
				callback(me, result);
		});
	}
	,
	saveData: function(me, previousProcess, nextProcess, processData, callback)
	{
		var url	=	me.serverConfig.webService + "/ProcessDataService.svc/processdata/add";
		var pData = {};
		pData.PreviousProcessId = previousProcess.IdProcess;
		pData.NextProcessId = nextProcess.IdProcess;
		pData.Data = JSON.stringify(processData); //Base64.encode( processData );
		pData.WorkflowId = previousProcess.WorkflowId;
		pData.SessionCode = me.sessionId;


		//Save ProcessData to Webservice
		console.log("data to save");
		pData = JSON.stringify(pData);
		console.log(pData);
		WebClient.post( url, pData, function(result)
		{
			if(callback != null)
				callback(result);
		});
	}
});