var FormEditUser = Class(WiseapeBaseInputForm,
{
	constructor: function(app)
	{
		FormEditUser.$super.call(this, app, "formUserEdit", "User Edit", "Forms/FormEditUser.json", {width: '50%'});
	}
	,
	onLoad: function(param)
	{
		console.log("onLoad");
		console.log(param);
		this.displayLookupData(this, param.Data.Lookups);
		this.setData(param.Data.Items);
		this.initializeControls(this);
		
	}
	,
	displayLookupData: function(me, lookups)
	{
		me.fillCombo(me, "cmbGenderId", lookups.Gender);
		me.fillCombo(me, "cmbUserGroupId", lookups.UserGroup);
		
	}
});