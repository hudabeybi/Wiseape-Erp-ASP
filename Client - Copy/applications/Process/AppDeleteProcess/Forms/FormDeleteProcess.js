var FormDeleteProcess = Class(WiseapeBaseInputForm,
{
	constructor: function(app)
	{
		FormDeleteProcess.$super.call(this, app, "formProcessDelete", "Process Delete", "Forms/FormDeleteProcess.json", {width: '50%'});
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