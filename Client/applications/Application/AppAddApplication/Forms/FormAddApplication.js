var FormAddApplication = Class(WiseapeBaseInputForm,
{
	constructor: function(app)
	{
		FormAddApplication.$super.call(this, app, "formApplicationAdd", "Application Add", "Forms/FormAddApplication.json", {width: '50%'});
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