var SConfig = new Array();
SConfig["debug"] =
{
	webService: "http://localhost:63612"
};

SConfig["local"] =
{
	webService: "http://localhost/wiseape-service-applicationmanager"
};

SConfig["inifd"] =
{
	webService: "http://inifdindonesia.com/admin/Server/WorkflowEngine"
};

var SSConfig = SConfig["local"];

var ServerConfig = Class({
	uri: "",
	baseDir: null,
	webService: SSConfig.webService,
	constructor: function (uri, baseDir)
	{
		this.uri 		= uri;
		this.baseDir 	= baseDir;
	}
	,
	getUrl: function(command)
	{
		if(this.webService != null)
			this.webService += "/";
			
		var url = this.webService + "/"  + command; 
		return url;
	}
});