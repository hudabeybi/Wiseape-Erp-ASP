
var FormListApplicationGroup = Class(WiseapeBaseListForm, 
{
	constructor: function(app)
	{
		FormListApplicationGroup.$super.call(this, app, "formListApplicationGroup", "Application Group List", "Forms/FormListApplicationGroup.json");
	}
	,
	getGridId: function()
	{
		return "gridApplicationGroup";
	}

	
});