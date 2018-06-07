var FormEditTasklog = Class(WiseapeBaseInputForm,
{
	constructor: function(app)
	{
		FormEditTasklog.$super.call(this, app, "formTasklogEdit", "Tasklog Edit", "Forms/FormEditTasklog.json", {width: '50%'});
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