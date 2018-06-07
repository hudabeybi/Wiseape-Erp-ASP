var AppDeleteUserLogin = Class(WiseapeInputApplication,
{
	getInputAppConfig: function(me)
	{
		var config =
		{
			saveUrl: "userlogin/delete",
			formFile: "Forms/FormDeleteUserLogin.js",
			lookupUrl: "userlogin/lookups",
			getDataUrl: "userlogin/get",
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