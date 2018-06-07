var DhtmlxRenderer = 
{
	createWindow: function( container, opt)
	{
		var dhxWins;

	}
	,
	render: function( uiObject )
	{
		console.log("uiObject");
		console.log(uiObject);
		var me = this;
		var html = "";
		
		for(var i = 0; i < uiObject.controls.length; i++)
		{
			 var obj = uiObject.controls[i];
			  html += me.renderContainer(WiseapeFormRenderer, obj);
		}

		return html;
	}
	,
	renderContainer: function(me, ctrl)
	{
		var html = "";
		switch(ctrl.type)
		{
			case "row":
				var content = "";
				var style = "";
				if(ctrl.style != null)
					style = "style='" + ctrl.style + "'";
				html = "\n<div class='row' " + style + ">{{content}}\n</div>\n";
				var controls = ctrl.controls;
				var md = Math.round(12 / controls.length);
				for(var i = 0; i < controls.length; i++)
				{
					var ctrl = controls[i];
					var sControl = me.renderControl(me, ctrl, md);
					content += sControl;
				}
				html = html.replace("{{content}}", content);
			break;
			case "formgroup":
				var content = "";
				if(ctrl.height == null)
					ctrl.height = "85%";
				html = "\n<div style=\"height:" + ctrl.height + ";width: 100%; padding: 10px;  overflow-y: auto; overflow-x: hidden\">{{content}}\n</div>\n";
				var controls = ctrl.controls;
				var md = Math.round(12 / controls.length);
				for(var i = 0; i < controls.length; i++)
				{
					var ctrl = controls[i];
					var sControl = me.renderControl(me, ctrl, md);
					content += sControl;
				}
				html = html.replace("{{content}}", content);
			break;
		}

		return html;
	}
	,
	renderControl: function(me, ctrl, md)
	{
		if(ctrl.label == null)
			ctrl.label = "";

		if(ctrl.placeholder == null)
			ctrl.placeholder = "";

		var html = "\n\t<div class='col-md-" + md + "'>\n\t\t<div class='form-group'>\n\t\t\t<label for='" + ctrl.id + "'>" + ctrl.label + "</label>{{input}}\n\t\t</div>\n\t</div>";
		var input = "";
		switch(ctrl.type)
		{
			case "row":
				html = "";
				html += me.renderContainer(me, ctrl);
			break;
			case "image":
				var multiple= "";
				if(ctrl.multiple == "true" || ctrl.multiple == true)
					multiple = "multiple";
				input = "\n\t\t\t<input type='file' id='file-" + ctrl.id + "' name='file-" + ctrl.id + "' control-type='file' for='" + ctrl.id + "' " + multiple + "/>";
				input += "\n\t\t\t<input control-type='image' type='hidden' id='" + ctrl.id + "' name='" + ctrl.id + "' data-field='" + ctrl.dataField + "' />";
			break;
			case "form-group":
				html = "";
				html += me.renderContainer(me, ctrl);
			break;
			case "label":
				input = "\n\t\t\t<h2 control-type='label' id='" + ctrl.id + "' name='" + ctrl.id + "' class='text-aqua' data-field='" + ctrl.dataField + "' >" + ctrl.text + "</h2>";
			break;
			case "textbox":
				input = "\n\t\t\t<input control-type='textbox' type='text' id='" + ctrl.id + "' name='" + ctrl.id + "' class='form-control' placeholder='" + ctrl.placeholder + "' data-field='" + ctrl.dataField + "' />";
			break;
			case "hidden":
				input = "\n\t\t\t<input control-type='hidden' type='hidden' id='" + ctrl.id + "' name='" + ctrl.id + "' class='form-control' placeholder='" + ctrl.placeholder + "' data-field='" + ctrl.dataField + "' />";
			break;
			case "textarea":
				input = "\n\t\t\t<textarea control-type='textarea' cols='20' rows='5' id='" + ctrl.id + "' name='" + ctrl.id + "' class='form-control' placeholder='" + ctrl.placeholder + "' data-field='" + ctrl.dataField + "' ></textarea>";
			break;
			case "numericbox":
				 input = "\n\t\t\t<input control-type='numericbox' type='text' id='" + ctrl.id + "' name='" + ctrl.id + "' class='form-control' placeholder='" + ctrl.placeholder + "' data-field='" + ctrl.dataField + "' data-inputmask='\"mask\": \"999,999,999,999\"' data-mask/>";
			break;
			case "grid":
				var scolInfo = JSON.stringify( ctrl.columns );
				input = "\n\t\t\t<div control-type='grid' id='" + ctrl.id + "' name='" + ctrl.id + "' column-info='" + scolInfo + "' ></div>";
			break;
			case "button":
				html = "\n\t<div class='col-md-" + md + "'>{{input}}</div>";
				input = "\n\t\t\t<button id='" + ctrl.id + "' name='" + ctrl.id + "' class=\"btn btn-block btn-primary btn-flat\" onclick='" + ctrl.onclick + "'>" + ctrl.label + "</button>";
			break;
			case "date":
				input = "\n\t\t\t<div class=\"input-group date\">";
				input += "	\n\t\t\t\t<div class=\"input-group-addon\">";
				input += "	\n\t\t\t\t<i class=\"fa fa-calendar\"></i>";
				input += "	\n\t\t\t\t</div>";
				input +="	\n\t\t\t\t<input control-type='date' type=\"text\" class=\"form-control pull-right\" id='" + ctrl.id + "' name='" + ctrl.id + "' placeholder='" + ctrl.placeholder + "' data-field='" + ctrl.dataField + "'  data-inputmask=\"'alias': 'dd/mm/yyyy'\" data-mask>";
				input += "\n\t\t\t</div>";
			break;
			case "datetime":
				input = "\n\t\t\t<div class=\"input-group date\">";
				input += "	\n\t\t\t\t<span class=\"input-group-addon\"><span class=\"glyphicon glyphicon-calendar\"></span></span>";
				input +="	\n\t\t\t\t<input control-type='datetime' type=\"text\" class=\"form-control\" id='" + ctrl.id + "' name='" + ctrl.id + "' placeholder='" + ctrl.placeholder + "' data-field='" + ctrl.dataField + "'>";
				input += "\n\t\t\t</div>";
			break;
			case "radio":
				if(ctrl.dataSource != null)
				{
					for(var i = 0; i < ctrl.dataSource.length; i++)
					{
						var valueField = ctrl.dataSourceInfo.valueField;
						var displayField = ctrl.dataSourceInfo.displayField;
						var value = ctrl.dataSource[i][valueField];
						var label = ctrl.dataSource[i][displayField];
						input += "\n\t\t\t<input type='radio' id='" + ctrl.id + "' name='" + ctrl.id + "' value='" + value + "' data-field='" + ctrl.dataField + "' class='form-control minimal' />" + label;
					}
				}
				else
				{
					input = "\n\t\t\t<div control-type='radio' id='" + ctrl.id + "' name='" + ctrl.id + "' data-field='" + ctrl.dataField + "' value-field='" + ctrl.dataSourceInfo.valueField + "' display-field='" + ctrl.dataSourceInfo.displayField + "'></div>";
				}
			break;
			case "checkbox":
				if(ctrl.dataSource != null)
				{
					for(var i = 0; i < ctrl.dataSource.length; i++)
					{
						var valueField = ctrl.dataSourceInfo.valueField;
						var displayField = ctrl.dataSourceInfo.displayField;
						var value = ctrl.dataSource[i][valueField];
						var label = ctrl.dataSource[i][displayField];
						input += "\n\t\t\t<input type='checkbox' id='" + ctrl.id + "' name='" + ctrl.id + "' value='" + value + "' data-field='" + ctrl.dataField + "' class='form-control minimal' />" + label;
					}
				}
				else
				{
					input = "\n\t\t\t<br /><input control-type='checkbox' type='checkbox' control-type='checkbox' id='" + ctrl.id + "' name='" + ctrl.id + "' data-field='" + ctrl.dataField + "'  class='form-control minimal'/>";
				}
			break;
			case "combobox":
				
				input = "\n\t\t\t<select control-type='combobox' id='" + ctrl.id + "' name='" + ctrl.id + "' data-field='" + ctrl.dataField + "' value-field='" + ctrl.dataSourceInfo.valueField + "' display-field='" + ctrl.dataSourceInfo.displayField + "' onchange='" + ctrl.onchange + "'  class='form-control select2' style='width: 100%' >{{options}}</select>";
				if(ctrl.dataSource != null)
				{
					var soptions = "";
					for(var i = 0; i < ctrl.dataSource.length; i++)
					{
						var valueField = ctrl.dataSourceInfo.valueField;
						var displayField = ctrl.dataSourceInfo.displayField;
						var value = ctrl.dataSource[i][valueField];
						var label = ctrl.dataSource[i][displayField];
						soptions += "\n\t\t\t\t<option value='" + value + "' >" + label + "</option>";
					}
					input = input.replace("{{options}}", soptions);
				}
				else
					input = input.replace("{{options}}", "");

			break;
		}

		if(ctrl.iconClass != null && ctrl.type != "button")
		{
			input = "\n\t\t<div class=\"input-group\">";
            input += "\n\t\t\t<span class=\"input-group-addon\">\n<i class=\"fa " + ctrl.iconClass + "\"></i>\n</span>";
            input += input + "\n\t\t</div>";
		}

		html = html.replace("{{input}}", input);
		return html;
	}
}