var FormAddUserLogin = Class(WiseapeBaseInputForm,
{
	constructor: function(app)
	{
		FormAddUserLogin.$super.call(this, app, "formUserLoginAdd", "UserLogin Add", "Forms/FormAddUserLogin.json", {width: '50%'});
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