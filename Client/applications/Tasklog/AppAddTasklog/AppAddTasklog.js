var AppAddTasklog = Class(WiseapeInputApplication, {
	getInputAppConfig: function(me)
	{
		var config =
		{
			saveUrl: "tasklog/add",
			formFile: "Forms/FormAddTasklog.js",
			lookupUrl: "tasklog/lookups",
			getDataUrl: "tasklog/get",
			keyColumnName: "IdTasklog",
			configFile: me.appPath + "/../config.js",
			appType: "add"
		}

		return config;
	}
});