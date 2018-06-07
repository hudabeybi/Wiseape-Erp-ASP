var UserListForm = Class(WiseapeBaseListForm, 
{
	constructor: function(app)
	{
		UserListForm.$super.call(this, app, "formUserList", "User List", "Forms/UserListForm.html");
	}
	,
	getGridColumns: function()
	{
		return	[
			  { text: 'Id User', datafield: 'IdUser', width: 0 },
			  { text: 'First Name', datafield: 'FirstName', width: 160 },
			  { text: 'Last Name', datafield: 'LastName', width: 160 },
			  { text: 'Register Date', datafield: 'UserRegisteredDate', width: 100, filtertype: 'date', width: 160, cellsformat: 'dd-MMMM-yyyy' },
			  { text: 'Phone', datafield: 'UserPhone', width: 180, cellsalign: 'right' },
			  { text: 'Email', datafield: 'UserEmail', cellsalign: 'right', cellsformat: 'c2' }
			];
	}
	,
	getDataFields: function()
	{
		return [
				{ name: 'IdUser', type: 'string' },
				{ name: 'FirstName', type: 'string' },
				{ name: 'LastName', type: 'string' },
				{ name: 'UserRegisteredDate', type: 'date' },
				{ name: 'UserPhone', type: 'string' },
				{ name: 'UserEmail', type: 'string' }
			];
	}
	,
	getGridId: function()
	{
		return "gridUser";
	}

	
});