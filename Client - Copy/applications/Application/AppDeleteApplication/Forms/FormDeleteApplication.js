var FormDeleteApplication = Class(WiseapeBaseInputForm,
{
	constructor: function(app)
	{
		FormDeleteApplication.$super.call(this, app, "formApplicationDelete", "Application Delete", "Forms/FormDeleteApplication.json", {width: '50%'});
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