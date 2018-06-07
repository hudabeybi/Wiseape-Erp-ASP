var AppEditUser = Class(WiseapeInputApplication, {
	getInputAppConfig: function(me)
	{
		var config =
		{
			saveUrl: "user/edit",
			formFile: "Forms/FormEditUser.js",
			lookupUrl: "user/lookups",
			getDataUrl: "user/get",
			keyColumnName: "IdUser",
			configFile: me.appPath + "/../config.js",
			appType: "edit"
		}

		return config;
	}
});