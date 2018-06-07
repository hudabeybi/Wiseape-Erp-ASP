var AppListApplicationGroup = Class(WiseapeListApplication,
{
	getAppListConfig: function(me, filter)
	{
		var config = {
			listDataWebservice: Config.ws + "/applicationgroup/find/" + filter.keyword + "/" + filter.page + "/" + filter.max,
			listFormFile: "Forms/FormListApplicationGroup.js",
			addApplication: "AppAddApplicationGroup",
			editApplication: "AppEditApplicationGroup",
			deleteApplication: "AppDeleteApplicationGroup"
		};

		return config;
	}

});