var FormAddProcessGroup = Class(WiseapeBaseInputForm,
{
	constructor: function(app)
	{
		FormAddProcessGroup.$super.call(this, app, "formProcessGroupAdd", "ProcessGroup Add", "Forms/FormAddProcessGroup.json", {width: '50%'});
	}
	,
	onLoad: function(param)
	{
		console.log("onLoad");
		console.log(param);
		this.displayLookupData(this, param.Data.Lookups);
		this.initializeControls(this);
		
	}
	,
	displayLookupData: function(me, lookups)
	{
		
	}
});