var FormEditUserLogin = Class(WiseapeBaseInputForm,
{
	constructor: function(app)
	{
		FormEditUserLogin.$super.call(this, app, "formUserLoginEdit", "UserLogin Edit", "Forms/FormEditUserLogin.json", {width: '50%'});
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