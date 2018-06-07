
var FormListProcess = Class(WiseapeBaseListForm, 
{
	constructor: function(app)
	{
		FormListProcess.$super.call(this, app, "formListProcess", "Process List", "Forms/FormListProcess.html");
	}
	,
	getGridColumns: function()
	{
		var cols =	
			[
			  { text: 'IdProcess', datafield: 'IdProcess', width: 0 },

				{ text: 'Process No', datafield: 'ProcessNo', width: 160 },
	
				{ text: 'Process Name', datafield: 'ProcessName', width: 160 },
	
				{ text: 'Process Created Date', datafield: 'ProcessCreatedDate', width: 100, filtertype: 'date', width: 160, cellsformat: 'dd-MMMM-yyyy' },
	
				{ text: 'Application', datafield: 'ApplicationId', width: 160 },
	
				{ text: 'Workflow', datafield: 'WorkflowId', width: 160 },
	
				{ text: 'Process Group', datafield: 'ProcessGroupId', width: 160 },
	
			];
		
		if(cols[cols.length - 1] == null)
			cols.pop();
		return cols;
	}
	,
	getDataFields: function()
	{

		var cols =	
			[
			  { name: 'IdProcess', type: 'IdProcess' },

				{ name: 'ProcessNo', type: 'string' },
	
				{ name: 'ProcessName', type: 'string' },
	
				{ name: 'ProcessCreatedDate', type: 'date' },
	
				{ name: 'ApplicationId', type: 'string' },
	
				{ name: 'WorkflowId', type: 'string' },
	
				{ name: 'ProcessGroupId', type: 'string' },
	
			];
		
		if(cols[cols.length - 1] == null)
			cols.pop();
		return cols;
	}
	,
	getGridId: function()
	{
		return "gridProcess";
	}

	
});