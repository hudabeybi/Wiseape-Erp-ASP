var WiseapeServer = Class({
	config: null,
	constructor: function(config)
	{
		this.config = config;
	}
	,
	execute: function(command, param, callback)
	{
		var url = this.config.getUrl(command);
		//alert(url);
		$.post(url, param, function (result)
		{
			var o = null;
			try
			{
				o = JSON.parse(result);
				if(callback != null)
				{
					callback(o);
				}
			}
			catch(err)
			{
				if(callback != null)
				{
					callback(null, err);
				}
			}
		});
	}
});