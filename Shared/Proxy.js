var Proxy = Class({
	configFile: null,
	constructor: function(configFile)
	{
		this.configFile = configFile;
	}
	,
	readConfig: function (core, file, callback)
	{
		core.client.loadPage(file, function(json)
		{
			var data = JSON.parse(json);
			if(callback != null)
				callback(data);
		});
	}
	,
	create: function (core, key, callback)
	{
		var me = this;
		me.readConfig(core, me.configFile, function(data)
		{
			for(var i = 0; i < data.length; i++)
			{
				var o = data[i];
				if(o.key == key)
				{
					var jsFile = o.jsFile;
					var className = o.className;
					$.getScript(jsFile, function()
					{
						eval("var obj = new " + className + "();");
						if(callback != null)
						{
							callback (obj);
						}
					});
					break;
				}
			}
		});
	}
});