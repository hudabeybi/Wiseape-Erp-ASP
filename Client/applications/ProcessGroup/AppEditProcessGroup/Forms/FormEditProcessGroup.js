var FormEditProcessGroup = Class(WiseapeBaseInputForm,
{
	constructor: function(app)
	{
		FormEditProcessGroup.$super.call(this, app, "formProcessGroupEdit", "ProcessGroup Edit", "Forms/FormEditProcessGroup.json", {width: '50%'});
	}
	,
	onLoad: function(param)
	{
		console.log("onLoad");
		console.log(param);
		this.displayLookupData(this, param.Data.Lookups);
		this.setData(param.Data.Items);
		this.initializeControls(this);
		
	}
	,
	displayLookupData: function(me, lookups)
	{
		
	}
});