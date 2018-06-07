$.fn.hasAttr = function(name) {  
   return this.attr(name) !== undefined;
};

var WiseapeFormRenderer = {
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
	,
	uploadUrl: null
	,
	downloadUrl: null
	,
	deleteUrl: null
	,
	onUploaded: null
	,
	initialize: function()
	{

		$("[control-type='file']").fileinput({'showUpload':false, 'showRemove': false, 'previewFileType':'any'});
		$("[control-type='file']").on("filebatchselected",function()
		{
			var totalFile = ($(this)[0]).files.length;
			var thisId = $(this).attr("id");
			for(var i = 0; i < totalFile; i++)
			{
				var file = ($(this)[0]).files[i];
				var inpId = $(this).attr("for");
				
				WebClient.noLoader = false;
				if(file != null)
				{
					WebClient.uploadFileWithTarget(WiseapeFormRenderer.uploadUrl, $(this).attr("id"), i, function(result)
					{
						WebClient.noLoader = true;
						console.log("Uploaded");
						console.log(result);
						
						if(WiseapeFormRenderer.onUploaded != null)
							WiseapeFormRenderer.onUploaded(inpId, thisId,  result);


						
					});
				}
			}
		});

		$("[control-type='file']").on('filedeleted', function(event, key, jqXHR, data) {
			var inpId = $(this).attr("for");
			if(WiseapeFormRenderer.onFileDeleted != null)
				WiseapeFormRenderer.onFileDeleted(inpId, $(this).attr("id"),  key);
		});


		//$("[control-type='date']").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
		$(".select2").select2();
		//Date picker
		$("[control-type='date']").datepicker({
		  autoclose: true
		});
		 
		$("[control-type='datetime']").datetimepicker({ format: "dd M yyyy hh:ii:ss", autoclose: true});

		//iCheck for checkbox and radio inputs
		$('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
		  checkboxClass: 'icheckbox_minimal-blue',
		  radioClass: 'iradio_minimal-blue'
		});

		$('input[type="checkbox"].minimal, input[type="radio"].minimal').on('ifChecked', function()
		{
			$(this).attr("checked", "true");
		});

		$('input[type="checkbox"].minimal, input[type="radio"].minimal').on('ifUnchecked', function()
		{
			$(this).removeAttr("checked");
		});
	}
	,
	getData: function()
	{
		var form = {};
		$("[data-field]").each(function()
		{
			var field = $(this).attr("data-field");
			var value = $(this).val();
			var id = $(this).attr("id");
			var ctrlType = $(this).attr("control-type");
			switch(ctrlType)
			{
				case "checkbox":
					if($(this).attr("checked") != null)
						form[field] = 1;
					else
						form[field] = 0;
				break;
				case "date":
					value = moment(value).format("YYYY-MM-DD");
					form[field] = value;
				break;
				case "datetime":
					value = moment(value).format("YYYY-MM-DD hh:mm:ss");
					form[field] = value;
				break;
				default:
					form[field] = value;
			}
			
		});

		return form;
	}
	,
	setData: function(form)
	{
		console.log("Set data");
		console.log(form);
		$("[data-field]").each(function()
		{
			var field = $(this).attr("data-field");
			var id = $(this).attr("id");
			var ctrlType = $(this).attr("control-type");
		
			var value = form[field];
			switch(ctrlType)
			{
				case "checkbox":
					if(value == "1")
						$(this).attr("checked", "true");
					else
						$(this).removeAttr("checked");
				break;
				case "image":
					$(this).val(value);
					WiseapeFormRenderer.setImageDisplay(id, value);

					
				break;
				case "date":
					var valuedt = moment(value).format( "DD MMM YYYY");
					//$(this).attr("data-date", value);
					//$(this).attr("data-date-format", "yyyy-mm-ddThh:ii:ssZ");
					$(this).val(valuedt);
				break;
				case "datetime":
					var valuedt = moment(value).format( "DD MMM YYYY hh:mm:ss");
					//$(this).attr("data-date", value);
					//$(this).attr("data-date-format", "yyyy-mm-ddThh:ii:ssZ");
					$(this).val(valuedt);
				break;
				default:
					$(this).val(value);
			}
			
		});
	}
	,
    imageClear: function(id)
    {
        $("#" + id).fileinput("clear");
    }
	,
	setImageDisplay: function(id, value)
	{
			if(value != null)
			{
				if(value.indexOf(";") != -1)
				{
					
					value = value.split(";");
				}
				else
				{
					var vv = new Array();
					vv[0] = value;
					value = vv;
				}
				
				var newValues = new Array();
				var captions = new Array();
				for(var i = 0; i < value.length; i++)
				{
					var vVal = value[i];

					if(vVal != "")
					{

						var url = WiseapeFormRenderer.downloadUrl;
						var newvalue = url + "/" + vVal;
						
						var mee = this;
						var ids = id.split("_");
						var last = ids[ids.length - 1];
						var newid = id.replace("_"  + last, "");
						
						//find the original id
						newid = newid + "_file-" + last;
						var deleteurl = WiseapeFormRenderer.deleteUrl + "/" + vVal;

						newValues[i] = newvalue;
						captions[i] = { caption: vVal, key:vVal };
						//$("#" + newid).fileinput('addToStack', newvalue);
					}
				}

                var overwrite = true;
                if($("#" + newid).hasAttr("multiple"))
                {
                    overwrite = false;
                }
    			$("#" + newid).fileinput({ overwriteInitial:overwrite, 'showUpload':false, showRemove: false, initialPreview: newValues, 
    						initialPreviewAsData: true,
    						initialPreviewConfig: captions,
    						deleteUrl: deleteurl
    			});
                

			}
	}
	,
	createWindow: function( me, container, content, option)
	{
		$("#" + container + "").append( "<div id=\"" + me.tmpname + "\" style='padding-right: 2px; padding-left: 5px; overflow-x: hidden;'>" + content + "</div>" );
			
		if(option == null)
			option = {};

		if(option != null)
			option = Util.merge(option, option);

		if(option.width == null)
			option.width = '93%';
		if(option.height == null)
			option.height = '620';
		option.position = { my: "center", at: "top", of: "#content-panel" };

		option.title = "<div class='app-icon' style='background: url(" + option.icon + ") no-repeat; background-size: 100% auto;'></div><div style='display: inline-block; width:20px; height:20px; vertical-align: top; padding: 3px; color: #fff; font-weight: bold;'>" + option.title + "</div>";
		option.titleIsHtml = true;
		option.show = {
			effect: "scale",
			duration: 200
		};
		option.hide = {
			effect: "scale",
			duration: 200
		};
		
		
		me.win = $("#win_" + me.getFullId()).dialog(option);
		$(".ui-dialog-titlebar-close").html("x");
	}

};
