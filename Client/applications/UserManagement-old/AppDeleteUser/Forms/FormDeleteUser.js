var FormDeleteUser = Class(WiseapeBaseInputForm,
{
	constructor: function(app)
	{
		FormDeleteUser.$super.call(this, app, "formUserDelete", "User Delete", "Forms/FormDeleteUser.json", {width: '50%'});
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