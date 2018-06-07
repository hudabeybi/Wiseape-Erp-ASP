
var AppEditProcess = Class(WiseapeInputApplication, {
	getInputAppConfig: function(me)
	{
		var config =
		{
			saveUrl: "process/edit",
			formFile: "Forms/FormEditProcess.js",
			lookupUrl: "process/lookups",
			getDataUrl: "process/get",
			keyColumnName: "IdProcess",
			configFile: me.appPath + "/../config.js",
			appType: "edit"
		}

		return config;
	}
});