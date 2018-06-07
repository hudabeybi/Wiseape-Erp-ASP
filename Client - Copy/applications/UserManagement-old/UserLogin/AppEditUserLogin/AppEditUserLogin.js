
var AppEditUserLogin = Class(WiseapeInputApplication, {
	getInputAppConfig: function(me)
	{
		var config =
		{
			saveUrl: "userlogin/edit",
			formFile: "Forms/FormEditUserLogin.js",
			lookupUrl: "userlogin/lookups",
			getDataUrl: "userlogin/get",
			keyColumnName: "IdUser",
			configFile: me.appPath + "/../config.js",
			appType: "edit"
		}

		return config;
	}
});