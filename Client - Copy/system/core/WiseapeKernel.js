var WiseapeKernel = Class({
	server: null,
	client: null,
	desktop: null,
	run: function(mainContainer)
	{
		this.server = new WiseapeServer();
		this.client = new WiseapeClient();

		var full = location.protocol+'//'+location.hostname+(location.port ? ':'+location.port: '') + "/" + location.pathname;
		if(full.substr(full.length - 1) == "/")
			full = full.substr(0, full.length - 1);
		
		var serverConfig = new ServerConfig( full + "/../Server", null);
		var clientConfig = new ClientConfig( full +  "", null);
		clientConfig.mainContainer = mainContainer;

		this.server.config = serverConfig;
		this.client.config = clientConfig;
		this.client.serverConfig = serverConfig;

		this.client.run();
	}
});