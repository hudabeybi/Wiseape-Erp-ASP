var AppAddApplicationGroup = Class(WiseapeInputApplication, {
	getInputAppConfig: function(me)
	{
		var config =
		{
			saveUrl: "applicationgroup/add",
			formFile: "Forms/FormAddApplicationGroup.js",
			lookupUrl: null,
			getDataUrl: "applicationgroup/get",
			keyColumnName: "IdApplicationGroup",
			configFile: me.appPath + "/../config.js",
			appType: "add"
		}

		return config;
	}
});