var FormEditProcess = Class(WiseapeBaseInputForm,
{
	constructor: function(app)
	{
		FormEditProcess.$super.call(this, app, "formProcessEdit", "Process Edit", "Forms/FormEditProcess.json", {width: '50%'});
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

		me.fillCombo(me, "cmbApplicationId", lookups.application);

		me.fillCombo(me, "cmbWorkflowId", lookups.workflow);

		me.fillCombo(me, "cmbProcessGroupId", lookups.processgroup);
		
	}
});