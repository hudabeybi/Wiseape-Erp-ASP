var WiseapeInputApplication = Class(WiseapeApplication,
{
	run: function(param, callback)
	{
		var me = this;
		me.loadConfig(me, function()
		{
			me.getAndDisplayData(me);
		});
	}
	,
	loadConfig: function(me, callback)
	{
		var configFile = me.getConfigFile(me);
		me.client.loadLibraryFile(configFile, function()
		{
			me.callCallback(me, null, callback);
		});
	}
	,
	getConfigFile: function(me)
	{
		return me.getInputAppConfig(me).configFile;
	}
	,
	getAndDisplayData: function (me)
	{
		me.getData(me, function(me, result)
		{
			me.displayData(me, result);
		});
	}
	,
	getData: function(me, callback)
	{
		console.log("me.parameterData");
		console.log(me.parameterData);
		
		me.getLookupData(me, function(me, result)
		{
			var lookupData = result.Data;
			
			if(me.getInputAppConfig(me).appType != "add")
			{
				
				var id = "";
				if(me.parameterData instanceof Array)
					id = me.parameterData[me.parameterData.length - 1][me.getKeyColumnName(me)];
				else
					id = me.parameterData[me.getKeyColumnName(me)];
				
				me.getItemData(me, id, function(me, result)
				{
					result.Data = { Items: result.Data, Lookups: lookupData };
					if(callback != null)
						callback(me,  result );
				});
			}
			else
			{
				
				result.Data = { Items: null, Lookups: lookupData };
				if(callback!=null)
					callback(me, result);
			}

		});
	}
	,
	getItemData: function(me, id, callback)
	{
		var c = Config.ws.slice(-1);
		if(c != "/")
			c = "/";
		else
			c = "";

		var url = Config.ws + c + me.getInputAppConfig(me).getDataUrl + "/" + id;
		
		WebClient.get(url, function(result)
		{
			if(callback != null)
				callback(me, result);
		});
	}
	,
	getKeyColumnName: function(me)
	{

		return  me.getInputAppConfig(me).keyColumnName;
	}
	,
	getLookupData: function(me, callback)
	{
		var c = Config.ws.slice(-1);
		if(c != "/")
			c = "/";
		else
			c = "";
		var lookupUrl = Config.ws + c + me.getInputAppConfig(me).lookupUrl;
		
		if(me.getInputAppConfig(me).lookupUrl != null)
		{
			WebClient.get( lookupUrl, function(result)
			{
				if(callback != null)
					callback(me, result);
			});
		}
		else
		{
			var result = { Result: true, Data: null };
			if(callback != null)
				callback(me, result);
		}
	}
	,
	displayData: function(me, result)
	{
		me.createWindowAndShow(me, result);
	}
	,
	winEdit: null
	,
	createWindowAndShow: function( me, result )
	{
		if(me.winEdit == null)
		{
			me.openForm(me, me.getInputAppConfig(me).formFile, function(me, win)
			{
				win.show(result, me.getWindowOptions());
				win.onSaveData = function(form)
				{
					me.saveData(me, form, function(result)
					{
						me.afterSaveData(me, result);
					});
				};

				win.onClose = function()
				{
					me.exitApplication();
				};
				me.winEdit = win;
			});
		}
		else
		{
			me.winEdit.refresh(result.Data);
		}
	}
	,
	saveData: function(me, form, callback)
	{
		console.log(form);
		var sForm = JSON.stringify(form); 
		var c = Config.ws.slice(-1);
		if(c != "/")
			c = "/";
		else
			c = "";
		var url = Config.ws + c + me.getInputAppConfig(me).saveUrl;
		console.log("Post data to " + url);
		console.log(sForm);
		WebClient.post( url, sForm, function(result)
		{
			console.log("result");
			console.log(result);
			if(callback != null)
				callback(me, result);
		});
		
	}

	,
	getInputAppConfig: function(me)
	{
		var config =
		{
			saveUrl: Config.ws + "/MemberService.svc/member/add",
			formFile: "Forms/FormAddUser.js",
			lookupUrl: Config.ws + "/MemberService.svc/member/lookups",
			getDataUrl: Config.ws + "/MemberService.svc/member/get",
			keyColumnName: "IdUser",
			configFile: me.appPath + "/../config.js",
			appType: "edit"
		}

		return config;
	}
	,
	afterSaveData: function(me, result)
	{
		Util.showNotif("Success", "Saved");
		me.notifyWorkflow(null, false);
	}
	,
	onApplicationExit: function()
	{

	}
	,
	getWindowOptions: function()
	{
		return { };
	}
	,
	saveDelete: function(me, data)
	{
		var config = me.getInputAppConfig(me);
		var url = Config.ws + config.saveUrl + "/" + data[me.getKeyColumnName(me)];
		WebClient.get(url, function(result)
		{
			me.afterSaveData(me, result);
		});
	}
});