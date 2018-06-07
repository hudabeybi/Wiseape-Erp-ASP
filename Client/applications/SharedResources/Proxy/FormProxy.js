var FormProxy = 
{
	create: function(app, id)
	{
		var form = FormProxy.getForm(app, id);
		console.log("Form : " + form);
		var formPath = form.form;
		var formFile = formPath + ".js";
		var formName = formPath.split("/");
		formName = formName[ formName.length -1 ];
		return { formFile: formFile, formName: formName };
	}
	,
	getForm: function (app, id)
	{
		
		var forms = PROXY_FORMS;
		for(var i = 0; i < forms.length; i++)
		{
			if(forms[i].formId == id)
			{
				return forms[i];
			}
		}
		return null;
	}
}