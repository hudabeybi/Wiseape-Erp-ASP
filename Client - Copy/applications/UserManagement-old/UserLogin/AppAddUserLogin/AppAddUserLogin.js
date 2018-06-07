var AppAddUserLogin = Class(WiseapeInputApplication, {
	getInputAppConfig: function(me)
	{
		var config =
		{
			saveUrl: "userlogin/add",
			formFile: "Forms/FormAddUserLogin.js",
			lookupUrl: "userlogin/lookups",
			getDataUrl: "userlogin/get",
			keyColumnName: "IdUserLogin",
			configFile: me.appPath + "/../config.js",
			appType: "add"
		}

		return config;
	}
});