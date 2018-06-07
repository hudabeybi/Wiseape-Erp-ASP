var AppAddProcess = Class(WiseapeInputApplication, {
	getInputAppConfig: function(me)
	{
		var config =
		{
			saveUrl: "process/add",
			formFile: "Forms/FormAddProcess.js",
			lookupUrl: "process/lookups",
			getDataUrl: "process/get",
			keyColumnName: "IdProcess",
			configFile: me.appPath + "/../config.js",
			appType: "add"
		}

		return config;
	}
});