var FormDeleteUserLogin = Class(WiseapeBaseInputForm,
{
	constructor: function(app)
	{
		FormDeleteUserLogin.$super.call(this, app, "formUserLoginDelete", "UserLogin Delete", "Forms/FormDeleteUserLogin.json", {width: '50%'});
	}
	,
	onLoad: function(param)
	{
		console.log("onLoad");
		console.log(param);
		this.setData(param.Data.Items);
		this.initializeControls(this);
	}

});