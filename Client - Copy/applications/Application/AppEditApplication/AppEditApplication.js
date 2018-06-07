
var AppEditApplication = Class(WiseapeInputApplication, {
	getInputAppConfig: function(me)
	{
		var config =
		{
			saveUrl: "application/edit",
			formFile: "Forms/FormEditApplication.js",
			lookupUrl: "application/lookups",
			getDataUrl: "application/get",
			keyColumnName: "IdApplication",
			configFile: me.appPath + "/../config.js",
			appType: "edit"
		}

		return config;
	}
});