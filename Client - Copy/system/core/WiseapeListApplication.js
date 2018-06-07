var WiseapeListApplication = Class(WiseapeApplication, 
{
	filter: null,
	run: function(param, callback)
	{
		var me = this;
		me.loadConfig(me, function()
		{
			me.filter = { keyword: "all", page: 1, max: 100 }
			me.getAndDisplayData(me, me.filter);
		});
	}
	,
	loadConfig: function(me, callback)
	{
		var url = me.appPath + "/../config.js";
		me.client.loadLibraryFile(url, function()
		{
			me.callCallback(me, null, callback);
		});
	}
	,
	getAndDisplayData: function (me, filter)
	{
		me.getDataList(me, filter, me.displayData);
	}
	,
	getDataList: function( me, filter, callback)
	{
		me.filter = filter;
		var config = me.getAppListConfig(me, me.filter);
		var url = config.listDataWebservice;
		console.log("getDataList()");
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
			var config = me.getAppListConfig(me, me.filter);
			me.openForm(me, config.listFormFile, function(me, win)
			{
				
				win.show(result);
				me.winList = win;
			});
		}
		else
		{
			me.winList.refresh(me.winList, result);
		}
	}
	,
	refreshData: function(me, filter)
	{
		console.log("Filter");
		console.log(filter);
		var me = this;
		me.getAndDisplayData(me, filter);
	}
	,
	addItem: function(me, param, callback)
	{
		param.command = "add";
		var config = me.getAppListConfig(me, me.filter);
		me.client.runApp( config.addApplication, param, function(app)
		{
			app.onExitApplication = function()
			{
				me.getAndDisplayData(me, me.filter);
			}
		});
	}
	,
	editItem: function(me, param, callback)
	{
		param.command = "edit";
		console.log("Parameter");
		console.log(param);
		var config = me.getAppListConfig(me, me.filter);
		me.client.runApp( config.editApplication, param, function(app)
		{
			app.onExitApplication = function()
			{
				me.getAndDisplayData(me, me.filter);
			}
		});
	}
	,
	deleteItem: function(me, param, callback)
	{	

		param.command = "edit";
		console.log("Parameter");
		console.log(param);
		var config = me.getAppListConfig(me, me.filter);
		me.client.runApp(config.deleteApplication, param, function(app)
		{
			app.onExitApplication = function()
			{
				me.getAndDisplayData(me, me.filter);
			}
		});
	}
	
});