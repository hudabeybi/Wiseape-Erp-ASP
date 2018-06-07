var FormAddTasklog = Class(WiseapeBaseInputForm,
{
	constructor: function(app)
	{
		FormAddTasklog.$super.call(this, app, "formTasklogAdd", "Tasklog Add", "Forms/FormAddTasklog.json", {width: '800', height: '500'});
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