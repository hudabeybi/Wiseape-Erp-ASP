
var FormListProcessGroup = Class(WiseapeBaseListForm, 
{
	constructor: function(app)
	{
		FormListProcessGroup.$super.call(this, app, "formListProcessGroup", "ProcessGroup List", "Forms/FormListProcessGroup.html");
	}
	,
	getGridColumns: function()
	{
		var cols =	
			[
			  { text: 'IdProcessGroup', datafield: 'IdProcessGroup', width: 0 },

				{ text: 'Process Group Name', datafield: 'ProcessGroupName', width: 160 },
	
				{ text: 'Process Group Title', datafield: 'ProcessGroupTitle', width: 160 },
	
				{ text: 'Icon Small', datafield: 'IconSmall', width: 160 },
	
				{ text: 'Icon Middle', datafield: 'IconMiddle', width: 160 },
	
				{ text: 'Icon Large', datafield: 'IconLarge', width: 160 },
	
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
			  { name: 'IdProcessGroup', type: 'IdProcessGroup' },

				{ name: 'ProcessGroupName', type: 'string' },
	
				{ name: 'ProcessGroupTitle', type: 'string' },
	
				{ name: 'IconSmall', type: 'string' },
	
				{ name: 'IconMiddle', type: 'string' },
	
				{ name: 'IconLarge', type: 'string' },
	
			];
		
		if(cols[cols.length - 1] == null)
			cols.pop();
		return cols;
	}
	,
	getGridId: function()
	{
		return "gridProcessGroup";
	}

	
});