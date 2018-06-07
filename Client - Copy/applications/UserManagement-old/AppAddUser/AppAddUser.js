var AppAddUser = Class(WiseapeInputApplication, {
	getInputAppConfig: function(me)
	{
		var config =
		{
			saveUrl: "user/add",
			formFile: "Forms/FormAddUser.js",
			lookupUrl: "user/lookups",
			getDataUrl: "user/get",
			keyColumnName: "IdUser",
			configFile: me.appPath + "/../config.js",
			appType: "add"
		}

		return config;
	}
});