var FormListTasklog = Class(WiseapeBaseListForm, 
{
	constructor: function(app)
	{
		FormListTasklog.$super.call(this, app, "formListTasklog", "Tasklog List", "Forms/FormListTasklog.json");
	}
	,
	afterLoad: function(param)
	{
		var me = this;
		$(this.get("dt-fromDate")).datepicker({
			autoclose: true, dateFormat: "d M yy"
		});

		$(this.get("dt-endDate")).datepicker({
			autoclose: true, dateFormat: "d M yy"
		});

		$(this.get("btnSearch")).click(function()
		{
			me.refreshData();
		});
	}
	,
	getFilterParameter: function(me)
	{
		var filter = FormListTasklog.$superp.getFilterParameter.call(this, me);
		filter.fromDate = $(this.get("dt-fromDate")).val();
		filter.endDate = $(this.get("dt-endDate")).val();
		return filter;
	}
	,
	/*getGridColumns: function()
	{
		var cols =	
			[
			  { text: 'IdTaskLog', datafield: 'IdTaskLog', width: 0, resizable: true },

				{ text: 'Task Title 1', datafield: 'TaskTitle1', width: '40%', resizable: true },
	
				{ text: 'Task Title 2', datafield: 'TaskTitle2', width: '20%', resizable: true },
	
				{ text: 'Task Title 3', datafield: 'TaskTitle3', width: '10%', resizable: true },
	
				{ text: 'Task Title 4', datafield: 'TaskTitle4', width: '10%', resizable: true },
	
				{ text: 'Task Date', datafield: 'TaskDate', width: '20%', filtertype: 'date', width: 160, cellsformat: 'dd-MMMM-yyyy' },
	
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
			  { name: 'IdTaskLog', type: 'int' },

				{ name: 'TaskTitle1', type: 'string' },
	
				{ name: 'TaskTitle2', type: 'string' },
	
				{ name: 'TaskTitle3', type: 'string' },
	
				{ name: 'TaskTitle4', type: 'string' },
	
				{ name: 'TaskDate', type: 'date' },
	
			];
		
		if(cols[cols.length - 1] == null)
			cols.pop();
		return cols;
	}
	,
	*/
	getGridId: function()
	{
		return "gridTasklog";
	}

	
});