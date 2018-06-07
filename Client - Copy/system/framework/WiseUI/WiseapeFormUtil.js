var WiseapeFormUtil = 
{
	initForm: function(formId)
	{
		$(formId).children().each(function()
		{
			var elm = $(this)[0];
			if($(elm).hasClass("datetime-picker"))
			{
				$(elm).jqxDateTimeInput({ formatString: "F", showTimeButton: true, width: '700px', height: '35px', template: 'primary' });
			}
		});
	}
}