var AppDeleteApplication = Class(WiseapeInputApplication,
{
	getInputAppConfig: function(me)
	{
		var config =
		{
			saveUrl: "application/delete",
			formFile: "Forms/FormDeleteApplication.js",
			lookupUrl: "application/lookups",
			getDataUrl: "application/get",
			keyColumnName: "IdApplication",
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