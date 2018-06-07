var FormEditApplication = Class(WiseapeBaseInputForm,
{
	constructor: function(app)
	{
		FormEditApplication.$super.call(this, app, "formApplicationEdit", "Application Edit", "Forms/FormEditApplication.json", {width: '50%'});
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