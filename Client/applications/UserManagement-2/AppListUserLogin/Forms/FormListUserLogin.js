
var FormListUserLogin = Class(WiseapeBaseListForm, 
{
	constructor: function(app)
	{
		FormListUserLogin.$super.call(this, app, "formListUserLogin", "UserLogin List", "Forms/FormListUserLogin.json");
	}
	,
	getGridId: function()
	{
		return "gridUserLogin";
	}

	
});