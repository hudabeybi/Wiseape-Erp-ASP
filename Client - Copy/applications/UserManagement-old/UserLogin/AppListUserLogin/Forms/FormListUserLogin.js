
var FormListUserLogin = Class(WiseapeBaseListForm, 
{
	constructor: function(app)
	{
		FormListUserLogin.$super.call(this, app, "formListUserLogin", "UserLogin List", "Forms/FormListUserLogin.html");
	}
	,
	getGridColumns: function()
	{
		var cols =	
			[
			  { text: 'IdUser', datafield: 'IdUser', width: 0 },

				{ text: 'Identity No', datafield: 'IdentityNo', width: 160 },
	
				{ text: 'First Name', datafield: 'FirstName', width: 160 },
	
				{ text: 'Last Name', datafield: 'LastName', width: 160 },
	
				{ text: 'Email', datafield: 'Email', width: 160 },
	
				{ text: 'Username', datafield: 'Username', width: 160 },
	
				{ text: 'User Password', datafield: 'UserPassword', width: 160 },
	
				{ text: 'Created Date', datafield: 'CreatedDate', width: 100, filtertype: 'date', width: 160, cellsformat: 'dd-MMMM-yyyy' },
	
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
			  { name: 'IdUser', type: 'IdUser' },

				{ name: 'IdentityNo', type: 'string' },
	
				{ name: 'FirstName', type: 'string' },
	
				{ name: 'LastName', type: 'string' },
	
				{ name: 'Email', type: 'string' },
	
				{ name: 'Username', type: 'string' },
	
				{ name: 'UserPassword', type: 'string' },
	
				{ name: 'CreatedDate', type: 'date' },
	
			];
		
		if(cols[cols.length - 1] == null)
			cols.pop();
		return cols;
	}
	,
	getGridId: function()
	{
		return "gridUserLogin";
	}

	
});