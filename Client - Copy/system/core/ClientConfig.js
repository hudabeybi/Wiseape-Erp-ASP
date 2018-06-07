var ClientConfig = Class({
	uri: "",
	mainContainer: null,
	path: {
		system: { applications: "system/applications", shared: "system/shared", data: "system/data", framework: "system/framework" },
		applications: "applications",
		applicationSharedLibrary: "applications/SharedLibrary"
	}
	,
	constructor: function(uri)
	{
		this.uri 		= uri;
	}
});
