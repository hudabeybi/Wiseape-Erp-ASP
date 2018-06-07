var AppDeleteProcessGroup = Class(WiseapeInputApplication,
{
	getInputAppConfig: function(me)
	{
		var config =
		{
			saveUrl: "processgroup/delete",
			formFile: "Forms/FormDeleteProcessGroup.js",
			lookupUrl: "processgroup/lookups",
			getDataUrl: "processgroup/get",
			keyColumnName: "IdProcessGroup",
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