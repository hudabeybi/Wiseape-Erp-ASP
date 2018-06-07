var Control = Class({
	idControl: null,
	name: null,
	label: null,
	description: null,
	attributes: null,
	prefix: "",
	suffix: "",
	maxLength: null,
	minLength: null,
	property: null,
	width: 100,
	height: 20,
	constructor: function()
	{
		this.idControl = makeid();
	}
	,
	getType: function()
	{
		return "Control";
	}
	,
	setAttr: function(name, value)
	{
		eval("this." + name + " = value;" );
	}
	,
	getAttrs: function()
	{
		var arr = [
			{ attr: "property", label: "Data source"},
			{ attr: "name", label: "Control name" },
			{ attr: "label", label: "label" },
			{ attr: "width", label: "Width" },
			{ attr: "height", label: "Height" },
			{ attr: "description", label: "Control name" },
			{ attr: "maxLength", label: "Max. Length" },
			{ attr: "minLength", label: "Min. Length" },
			{ attr: "prefix", label: "Prefix" },
			{ attr: "suffix", label: "Suffix" }
		];
		return arr;
	}
	
});


var Textbox = Class(Control, {
	constructor: function ()
	{
		Textbox.$super.call(this);
	}
	,
	getType: function ()
	{
		return "textbox";
	}

});


var Numericbox = Class(Control, {
	max: null,
	min: null,
	thousandSeparator: null,
	constructor: function ()
	{
		Numeribox.$super.call(this);
	}
	,
	getType: function ()
	{
		return "numericbox";
	}
	,
	getAttrs: function ()
	{
		var arr = Numericbox.$superp.getAttrs();
		arr.push({ attr: "min", label: "Min. number" });
		arr.push({ attr: "max", label: "Max. number" });
		return arr;
	}
});

var Textarea = Class(Control, {
	constructor: function ()
	{
		Textarea.$super.call(this);
	}
	,
	getType: function ()
	{
		return "textarea";
	}
});

var Combobox = Class(Control, {
	options: null,
	listItemInfo: null,
	constructor: function ()
	{
		this.options = new Array();
		this.listItemInfo = new ListItemInfo();
		Combobox.$super.call(this);
	}
	,
	getType: function ()
	{
		return "combobox";
	}
});

var RadioButtons = Class(Combobox, 
{
	constructor: function ()
	{
		RadioButtons.$super.call(this);
	}
	,
	getType: function ()
	{
		return "radiobuttons";
	}
});

var Checkboxes = Class(Combobox, 
{
	constructor: function ()
	{
		Checkboxes.$super.call(this);
	}
	,
	getType: function ()
	{
		return "checkboxes";
	}
});

var ListItem = Class({
	value: null,
	text: null,
	object: null,
	constructor: function(value, text, object)
	{
		this.value = value;
		this.text = text;
		this.object = object;
	}
});

var ListItemInfo = Class( {
	dataSouce: null,
	valueField: null,
	textFields: null,
	constructor: function()
	{
		this.textFields = new Array();
	}
	,
	addTextField: function (name)
	{
		this.textFields.push(name);
	}
	,
	removeTextField: function(name)
	{
		for(var i = 0; i < this.textFields.length; i++)
		{
			if(this.textFields[i] == name)
			{
				this.textFields.slice(i, 1);
				break;
			}
		}
	}
	
});


var DateCtrl = Class(Control, {
	maxDate: null,
	minDate: null,
	format: "dd/mm/yyyy",
	display: "datetime",
	constructor: function()
	{
		DateCtrl.$super.call(this);
	}
	,
	getType: function()
	{
		return "datectrl";
	}
	,
	getAttrs: function ()
	{
		var arr = Numericbox.$superp.getAttrs();
		arr.push({ attr: "maxDate", label: "Max. Date" });
		arr.push({ attr: "minDate", label: "Min. Date" });
		arr.push({ attr: "display", label: "Display", default: "datetime" });
		return arr;
	}
});


var ControlConfig = 
{
	types: [
		{ name: "textbox", title:"Textbox", control: "Textbox" },	
		{ name: "numericbox", title:"Numericbox", control: "Numericbox" },
		{ name: "textarea", title:"Textarea", control: "Textarea" },
		{ name: "datectrl", title:"Date Control", control: "DateCtrl" },
		{ name: "combobox", title:"Date Control", control: "Combobox" },
		{ name: "radiobuttons", title:"Radio buttons", control: "RadioButtons" },
		{ name: "checkboxes", title:"Checkboxes", control: "Checkboxes" }
	]
}