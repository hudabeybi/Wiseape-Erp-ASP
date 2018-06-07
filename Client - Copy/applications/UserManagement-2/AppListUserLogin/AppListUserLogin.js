var AppListUserLogin = Class(WiseapeListApplication,
{
	getAppListConfig: function(me, filter)
	{
		var config = {
			listDataWebservice: Config.ws + "/userlogin/find/" + filter.keyword + "/" + filter.page + "/" + filter.max,
			listFormFile: "Forms/FormListUserLogin.js",
			addApplication: "AppAddUserLogin",
			editApplication: "AppEditUserLogin",
			deleteApplication: "AppDeleteUserLogin"
		};

		return config;
	}

});