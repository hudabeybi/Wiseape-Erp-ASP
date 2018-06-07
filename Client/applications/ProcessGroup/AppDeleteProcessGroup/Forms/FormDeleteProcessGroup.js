var FormDeleteProcessGroup = Class(WiseapeBaseInputForm,
{
	constructor: function(app)
	{
		FormDeleteProcessGroup.$super.call(this, app, "formProcessGroupDelete", "ProcessGroup Delete", "Forms/FormDeleteProcessGroup.json", {width: '50%'});
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