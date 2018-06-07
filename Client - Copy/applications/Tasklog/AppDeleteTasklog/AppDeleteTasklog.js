var AppDeleteTasklog = Class(WiseapeInputApplication,
{
	getInputAppConfig: function(me)
	{
		var config =
		{
			saveUrl: "tasklog/delete",
			formFile: "Forms/FormDeleteTasklog.js",
			lookupUrl: "tasklog/lookups",
			getDataUrl: "tasklog/get",
			keyColumnName: "IdTasklog",
			configFile: me.appPath + "/../config.js",
			appType: "delete"
		}

		return config;
	}
	,
	getWindowOptions: function()
	{
		return { height: "300" };
	}
	,
	afterSaveData: function(me, result)
	{
		Util.showNotif("Success", "Saved");
		me.winEdit.close();
	}
});