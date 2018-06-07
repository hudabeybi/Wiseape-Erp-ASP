var FormDeleteTasklog = Class(WiseapeBaseInputForm,
{
	constructor: function(app)
	{
		FormDeleteTasklog.$super.call(this, app, "formTasklogDelete", "Tasklog Delete", "Forms/FormDeleteTasklog.json", {width: '50%'});
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