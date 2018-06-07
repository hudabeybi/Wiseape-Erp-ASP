var AppAddApplication = Class(WiseapeInputApplication, {
	getInputAppConfig: function(me)
	{
		var config =
		{
			saveUrl: "application/add",
			formFile: "Forms/FormAddApplication.js",
			lookupUrl: "application/lookups",
			getDataUrl: "application/get",
			keyColumnName: "IdApplication",
			configFile: me.appPath + "/../config.js",
			appType: "add"
		}

		return config;
	}
});