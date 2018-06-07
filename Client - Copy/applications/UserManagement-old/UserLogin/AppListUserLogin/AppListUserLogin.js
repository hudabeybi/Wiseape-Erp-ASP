var AppListUserLogin = Class(WiseapeApplication,
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
		me.client.loadLibraryFile(me.appPath + "/../config.js", function()
		{
			me.callCallback(me, null, callback);
		});
	}
	,
	getAndDisplayData: function (me)
	{
		me.getDataList(me, me.displayData);
	}
	,
	getDataList: function( me, callback)
	{
		var url = Config.ws + "/userlogin/find/all/1/100";
		console.log("AppListUserLogin.getDataList()");
		console.log(url);
		WebClient.get(url, function(result)
		{		
			me.callCallback(me, result, callback);
		});
	}
	,
	displayData: function (me, result)
	{
		console.log("displayData");
		console.log(result);
		me.createWindowAndShow(me, result);
	}
	,
	winList: null
	,
	createWindowAndShow: function( me, result )
	{
		if(me.winList == null)
		{
			me.openForm(me, "Forms/FormListUserLogin.js", function(me, win)
			{
				win.show(result);
				me.winList = win;
			});
		}
		else
		{
			me.winList.refresh(result);
		}
	}
	,
	addItem: function(me, param, callback)
	{
		param.command = "add";
		me.client.runApp("AppAddUserLogin", param, function(app)
		{
			app.onExitApplication = function()
			{
				me.getAndDisplayData(me);
			}
		});
	}
	,
	editItem: function(me, param, callback)
	{
		param.command = "edit";
		console.log("Parameter");
		console.log(param);
		me.client.runApp("AppEditUserLogin", param, function(app)
		{
			app.onExitApplication = function()
			{
				me.getAndDisplayData(me);
			}
		});
	}
	,
	deleteItem: function(me, param, callback)
	{	

		param.command = "edit";
		console.log("Parameter");
		console.log(param);
		me.client.runApp("AppDeleteUserLogin", param, function(app)
		{
			app.onExitApplication = function()
			{
				me.getAndDisplayData(me);
			}
		});
	}

});