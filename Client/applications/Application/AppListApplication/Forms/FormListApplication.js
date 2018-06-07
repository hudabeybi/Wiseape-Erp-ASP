
var FormListApplication = Class(WiseapeBaseListForm, 
{
	constructor: function(app)
	{
		FormListApplication.$super.call(this, app, "formListApplication", "Application List", "Forms/FormListApplication.html");
	}
	,
	getGridColumns: function()
	{
		var cols =	
			[
			  { text: 'IdApplication', datafield: 'IdApplication', width: 0 },

				{ text: 'Application Name', datafield: 'ApplicationName', width: 160 },
	
				{ text: 'Application Title', datafield: 'ApplicationTitle', width: 160 },
	
				{ text: 'Application Icon Small', datafield: 'ApplicationIconSmall', width: 160 },
	
				{ text: 'Application Icon Middle', datafield: 'ApplicationIconMiddle', width: 160 },
	
				{ text: 'Application Icon Large', datafield: 'ApplicationIconLarge', width: 160 },
	
				{ text: 'Application Path', datafield: 'ApplicationPath', width: 160 },
	
				{ text: 'Application File', datafield: 'ApplicationFile', width: 160 },
	
				{ text: 'Application Class', datafield: 'ApplicationClass', width: 160 },
	
				{ text: 'Application Main Function', datafield: 'ApplicationMainFunction', width: 160 },
	
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
			  { name: 'IdApplication', type: 'IdApplication' },

				{ name: 'ApplicationName', type: 'string' },
	
				{ name: 'ApplicationTitle', type: 'string' },
	
				{ name: 'ApplicationIconSmall', type: 'string' },
	
				{ name: 'ApplicationIconMiddle', type: 'string' },
	
				{ name: 'ApplicationIconLarge', type: 'string' },
	
				{ name: 'ApplicationPath', type: 'string' },
	
				{ name: 'ApplicationFile', type: 'string' },
	
				{ name: 'ApplicationClass', type: 'string' },
	
				{ name: 'ApplicationMainFunction', type: 'string' },
	
			];
		
		if(cols[cols.length - 1] == null)
			cols.pop();
		return cols;
	}
	,
	getGridId: function()
	{
		return "gridApplication";
	}

	
});