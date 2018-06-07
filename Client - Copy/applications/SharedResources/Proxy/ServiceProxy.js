var ServiceProxy = 
{
	create: function(app, id)
	{
		var service = ServiceProxy.getService(app, id);

		var servicePath = service.service;
		var serviceFile = servicePath + ".js";
		var serviceName = servicePath.split("/");
		serviceName = serviceName[ serviceName.length -1 ];
		return { serviceFile: serviceFile, serviceName: serviceName };
	}
	,
	getService: function (app, id)
	{
		
		var services = PROXY_SERVICES;
		for(var i = 0; i < services.length; i++)
		{
			if(services[i].serviceId == id)
			{
				return services[i];
			}
		}
		return null;
	}
}