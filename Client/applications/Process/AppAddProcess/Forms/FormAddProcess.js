var FormAddProcess = Class(WiseapeBaseInputForm,
{
	constructor: function(app)
	{
		FormAddProcess.$super.call(this, app, "formProcessAdd", "Process Add", "Forms/FormAddProcess.json", {width: '50%'});
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

		me.fillCombo(me, "cmbApplicationId", lookups.application);

		me.fillCombo(me, "cmbWorkflowId", lookups.workflow);

		me.fillCombo(me, "cmbProcessGroupId", lookups.processgroup);
		
	}
});