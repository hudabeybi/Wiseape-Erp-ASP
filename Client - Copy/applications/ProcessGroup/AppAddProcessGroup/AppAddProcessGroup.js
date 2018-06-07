var AppAddProcessGroup = Class(WiseapeInputApplication, {
	getInputAppConfig: function(me)
	{
		var config =
		{
			saveUrl: "processgroup/add",
			formFile: "Forms/FormAddProcessGroup.js",
			lookupUrl: "processgroup/lookups",
			getDataUrl: "processgroup/get",
			keyColumnName: "IdProcessGroup",
			configFile: me.appPath + "/../config.js",
			appType: "add"
		}

		return config;
	}
});