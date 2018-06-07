var FormAddApplicationGroup = Class(WiseapeBaseInputForm,
{
	constructor: function(app)
	{
		FormAddApplicationGroup.$super.call(this, app, "formAddApplicationGroup", "Application Group Add", "Forms/FormAddApplicationGroup.json", {width: '50%'});
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