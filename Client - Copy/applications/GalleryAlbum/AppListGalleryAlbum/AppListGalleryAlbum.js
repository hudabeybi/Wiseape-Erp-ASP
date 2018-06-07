var AppListGalleryAlbum = Class(WiseapeApplication,
{
	filter: {},
	run: function(param, callback)
	{
		var me = this;

		me.filter.page = 1;
		me.filter.max = 10;
		me.filter.keyword = "";

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
	refreshData: function(me, filter)
	{
		var me = this;
		me.filter = filter;
		me.getAndDisplayData(me);
	}
	,
	getAndDisplayData: function (me)
	{
		me.getDataList(me, me.displayData);
	}
	,
	getDataList: function( me, callback)
	{
		if(me.filter.keyword == null || me.filter.keyword == "")
			me.filter.keyword = "all";

		var url = Config.ws + "/galleryalbum/find/" + me.filter.keyword + "/" + me.filter.page + "/" + me.filter.max;
		console.log("AppListGalleryAlbum.getDataList()");
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
			me.openForm(me, "Forms/GalleryAlbumListForm.js", function(me, win)
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
		me.client.runApp("AppAddGalleryAlbum", param, function(app)
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
		me.client.runApp("AppEditGalleryAlbum", param, function(app)
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
		me.client.runApp("AppDeleteGalleryAlbum", param, function(app)
		{
			app.onExitApplication = function()
			{
				me.getAndDisplayData(me);
			}
		});
	}

});