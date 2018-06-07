var AppDeleteUser = Class(WiseapeInputApplication,
{
	getInputAppConfig: function(me)
	{
		var config =
		{
			saveUrl: "user/delete",
			formFile: "Forms/FormDeleteUser.js",
			lookupUrl: "user/lookups",
			getDataUrl: "user/get",
			keyColumnName: "IdUser",
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