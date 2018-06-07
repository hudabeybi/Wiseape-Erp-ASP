var BaseListApplication = Class( WiseApplication, 
{
	run: function()
	{
	}
	,
	createListForm: function(me, callback)
	{
	}
	,
	showListForm: function()
	{
	}
	,
	getListData: function(me)
	{
		me.getListDataHandler().execute(me, function(data)
		{
			me.createListForm(me, function(form)
			{
				
			});
		});
	}
	,
	getListDataHandler: function()
	{
		return me.createHandlerFromConfig("get-list-data-handler");
	}
	
});