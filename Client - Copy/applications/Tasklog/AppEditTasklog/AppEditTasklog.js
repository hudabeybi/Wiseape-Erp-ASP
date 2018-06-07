
var AppEditTasklog = Class(WiseapeInputApplication, {
	getInputAppConfig: function(me)
	{
		var config =
		{
			saveUrl: "tasklog/edit",
			formFile: "Forms/FormEditTasklog.js",
			lookupUrl: "tasklog/lookups",
			getDataUrl: "tasklog/get",
			keyColumnName: "IdTaskLog",
			configFile: me.appPath + "/../config.js",
			appType: "edit"
		}

		return config;
	}
});