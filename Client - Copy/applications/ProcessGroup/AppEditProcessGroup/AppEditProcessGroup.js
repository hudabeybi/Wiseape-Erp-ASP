
var AppEditProcessGroup = Class(WiseapeInputApplication, {
	getInputAppConfig: function(me)
	{
		var config =
		{
			saveUrl: "processgroup/edit",
			formFile: "Forms/FormEditProcessGroup.js",
			lookupUrl: "processgroup/lookups",
			getDataUrl: "processgroup/get",
			keyColumnName: "IdProcessGroup",
			configFile: me.appPath + "/../config.js",
			appType: "edit"
		}

		return config;
	}
});