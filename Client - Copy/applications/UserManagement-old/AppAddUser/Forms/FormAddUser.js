var FormAddUser = Class(WiseapeBaseInputForm,
{
	constructor: function(app)
	{
		FormAddUser.$super.call(this, app, "formUserAdd", "User Add", "Forms/FormAddUser.json", {width: '50%'});
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
		me.fillCombo(me, "cmbGenderId", lookups.Gender);
		me.fillCombo(me, "cmbUserGroupId", lookups.UserGroup);
		
	}
});