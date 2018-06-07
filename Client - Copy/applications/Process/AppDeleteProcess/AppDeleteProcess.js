var AppDeleteProcess = Class(WiseapeInputApplication,
{
	getInputAppConfig: function(me)
	{
		var config =
		{
			saveUrl: "process/delete",
			formFile: "Forms/FormDeleteProcess.js",
			lookupUrl: "process/lookups",
			getDataUrl: "process/get",
			keyColumnName: "IdProcess",
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