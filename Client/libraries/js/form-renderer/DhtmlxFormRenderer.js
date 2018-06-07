$.fn.hasAttr = function(name) {  
   return this.attr(name) !== undefined;
};

var DhtmlxFormRenderer = Class({
	render: function( uiObject )
	{
		console.log("uiObject");
		console.log(uiObject);
		var me = this;
		var html = "";
		
		for(var i = 0; i < uiObject.controls.length; i++)
		{
			 var obj = uiObject.controls[i];
			  html += me.renderContainer(me, obj);
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
		var events = me.getControlEvents(ctrl);
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
				input = "\n\t\t\t<input control-type='textbox' type='text' id='" + ctrl.id + "' name='" + ctrl.id + "' class='form-control' placeholder='" + ctrl.placeholder + "' data-field='" + ctrl.dataField + "' " + events + " />";
			break;
			case "hidden":
				input = "\n\t\t\t<input control-type='hidden' type='hidden' id='" + ctrl.id + "' name='" + ctrl.id + "' class='form-control' placeholder='" + ctrl.placeholder + "' data-field='" + ctrl.dataField + "' " + events + "  />";
			break;
			case "textarea":
				input = "\n\t\t\t<textarea control-type='textarea' cols='20' rows='5' id='" + ctrl.id + "' name='" + ctrl.id + "' class='form-control' placeholder='" + ctrl.placeholder + "' data-field='" + ctrl.dataField + "' " + events + "  ></textarea>";
			break;
			case "numericbox":
				 input = "\n\t\t\t<input control-type='numericbox' type='text' id='" + ctrl.id + "' name='" + ctrl.id + "' class='form-control' placeholder='" + ctrl.placeholder + "' data-field='" + ctrl.dataField + "' data-inputmask='\"mask\": \"999,999,999,999\"' data-mask  " + events + " />";
			break;
			case "grid":
				var scolInfo = ctrl.columns; //JSON.stringify( ctrl.columns );
				scolInfo = scolInfo.replace(/[\r\n]/g, "");
				scolInfo = scolInfo.replace(/[\n]/g, "");
				scolInfo = scolInfo.replace(/[\"]/g, "'");
				
				//scolInfo = scolInfo.substr( 1, scolInfo.length - 1 );
				if(ctrl.width == null)
					ctrl.width = "100%";

				if(ctrl.height == null)
					ctrl.height = "65%";

				input = "\n\t\t\t<div width='" + ctrl.width + "'  height='" + ctrl.height + "' control-type='grid' id='" + ctrl.id + "' name='" + ctrl.id + "' column-info=\"" + scolInfo + "\" ></div>";
			break;
			case "button":
				html = "\n\t<div class='col-md-" + md + "'>{{input}}</div>";
				input = "\n\t\t\t<button id='" + ctrl.id + "' name='" + ctrl.id + "' class=\"btn btn-block btn-primary btn-flat\"  " + events + " >" + ctrl.label + "</button>";
			break;
			case "icon-button":
				html = "{{input}}";
				ctrl.width = "40px";
				ctrl.height = "40px";
				input = "\n\t\t<div " + me.getDefault(ctrl) + " " + me.getProp('tooltip', ctrl.tooltip) + "  " + events + " ><div style='background: url(" + ctrl.url + ") no-repeat; width:100%; height: 100%;background-size: 80% 80%;background-position: center;'></div></div>";
			break;
			case "date":
				input = "\n\t\t\t<div class=\"input-group date\">";
				input += "	\n\t\t\t\t<div class=\"input-group-addon\">";
				input += "	\n\t\t\t\t<i class=\"fa fa-calendar\"></i>";
				input += "	\n\t\t\t\t</div>";
				input +="	\n\t\t\t\t<input control-type='date' type=\"text\" class=\"form-control pull-right\" id='" + ctrl.id + "' name='" + ctrl.id + "' placeholder='" + ctrl.placeholder + "' data-field='" + ctrl.dataField + "'  data-inputmask=\"'alias': 'dd/mm/yyyy'\" data-mask  " + events + " >";
				input += "\n\t\t\t</div>";
			break;
			case "datetime":
				input = "\n\t\t\t<div class=\"input-group date\">";
				input += "	\n\t\t\t\t<span class=\"input-group-addon\"><span class=\"glyphicon glyphicon-calendar\"></span></span>";
				input +="	\n\t\t\t\t<input control-type='datetime' type=\"text\" class=\"form-control\" id='" + ctrl.id + "' name='" + ctrl.id + "' placeholder='" + ctrl.placeholder + "' data-field='" + ctrl.dataField + "'  " + events + " >";
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
						input += "\n\t\t\t<input type='radio' id='" + ctrl.id + "' name='" + ctrl.id + "' value='" + value + "' data-field='" + ctrl.dataField + "' class='form-control minimal'  " + events + " />" + label;
					}
				}
				else
				{
					input = "\n\t\t\t<div control-type='radio' id='" + ctrl.id + "' name='" + ctrl.id + "' data-field='" + ctrl.dataField + "' value-field='" + ctrl.dataSourceInfo.valueField + "' display-field='" + ctrl.dataSourceInfo.displayField + "' " + events + " ></div>";
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
						input += "\n\t\t\t<input type='checkbox' id='" + ctrl.id + "' name='" + ctrl.id + "' value='" + value + "' data-field='" + ctrl.dataField + "' class='form-control minimal'  " + events + " />" + label;
					}
				}
				else
				{
					input = "\n\t\t\t<br /><input control-type='checkbox' type='checkbox' control-type='checkbox' id='" + ctrl.id + "' name='" + ctrl.id + "' data-field='" + ctrl.dataField + "'  class='form-control minimal' " + events + " />";
				}
			break;
			case "combobox":
				
				input = "\n\t\t\t<select control-type='combobox' id='" + ctrl.id + "' name='" + ctrl.id + "' data-field='" + ctrl.dataField + "' " + events + "  class='form-control select2' style='width: 100%' >{{options}}</select>";
				if(ctrl.dataSource != null)
				{
					input = "\n\t\t\t<select control-type='combobox' id='" + ctrl.id + "' name='" + ctrl.id + "' data-field='" + ctrl.dataField + "' value-field='" + ctrl.dataSourceInfo.valueField + "' display-field='" + ctrl.dataSourceInfo.displayField + "' " + events + " class='form-control select2' style='width: 100%' >{{options}}</select>";

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

		if(ctrl.iconClass != null && ctrl.type != "button" && ctrl.type != "icon-button")
		{
			input = "\n\t\t<div class=\"input-group\">";
            input += "\n\t\t\t<span class=\"input-group-addon\">\n<i class=\"fa " + ctrl.iconClass + "\"></i>\n</span>";
            input += input + "\n\t\t</div>";
		}

		html = html.replace("{{input}}", input);
		return html;
	}
	,
	getDefault: function(ctrl)
	{
		var id = ctrl.id + "";
		var datafield = ctrl.dataField + "";
		var placeholder = ctrl.placeholder + "";
		var iconClass = ctrl.iconClass + "";
		var style = ctrl.style + ";";
		var className = ctrl.className + "";
		var datasource = ctrl.dataSource + "";
		var width = ctrl.width + "";
		var height = ctrl.height + "";

		var s = "";

		if(ctrl.width != null)
			style += "width:" + width + ";";

		if(ctrl.height != null)
			style += "height:" + height + ";";

		if(ctrl.id != null)
			s += "id='" + id + "' name='" + id + "' ";

		if(ctrl.dataField != null)
			s += "data-field='" + datafield + "' ";

		if(ctrl.placeholder != null)
			s += "placeholder='" + placeholder + "' ";

		if(ctrl.iconClass != null)
			s += "class='" + iconClass + "' ";

		if(ctrl.style != null)
			s += "style='" + style + "' ";

		if(ctrl.className != null)
			s += "class='" + className + "' ";

		if(ctrl.dataSource != null)
			s += "datasource='" + datasource + "' ";

		return s;
	}
	,
	getControlEvents: function (ctrl)
	{
		var s = "";
		if(ctrl.onclick != null)
			s += "onclick='" + ctrl.onclick + "' ";
		if(ctrl.onchange != null)
			s += "onchange='" + ctrl.onchange + "' ";
		if(ctrl.onkeypress != null)
			s += "onkeypress='" + ctrl.onkeypress+ "' ";
		if(ctrl.onkeydown != null)
			s += "onkeydown='" + ctrl.onkeydown + "' ";
		if(ctrl.onkeyup != null)
			s += "onkeyup='" + ctrl.onkeyup + "' ";
		if(ctrl.onmouseover != null)
			s += "onmouseover='" + ctrl.onmouseover + "' ";
		return s;
	}
	,
	getProp: function( htmlPropname, value)
	{
		var s= "";
		if(value != null)
		{
			s += htmlPropname + "='" + value + "'";
		}
		return s;
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
		var me = this;

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
					WebClient.uploadFileWithTarget(me.uploadUrl, $(this).attr("id"), i, function(result)
					{
						WebClient.noLoader = true;
						console.log("Uploaded");
						console.log(result);
						
						if(me.onUploaded != null)
							me.onUploaded(inpId, thisId,  result);


						
					});
				}
			}
		});

		$("[control-type='file']").on('filedeleted', function(event, key, jqXHR, data) {
			var inpId = $(this).attr("for");
			if(me.onFileDeleted != null)
				me.onFileDeleted(inpId, $(this).attr("id"),  key);
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

		$("div[tooltip='*']").tooltip();

		//$("div[control-type='grid']").
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
		var me = this;
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
					me.setImageDisplay(id, value);

					
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

						var url = me.downloadUrl;
						var newvalue = url + "/" + vVal;
						
						var mee = this;
						var ids = id.split("_");
						var last = ids[ids.length - 1];
						var newid = id.replace("_"  + last, "");
						
						//find the original id
						newid = newid + "_file-" + last;
						var deleteurl = me.deleteUrl + "/" + vVal;

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
	dhtmlxWindow: null
	,
	createWindow: function( container, id, content, option)
	{
		console.log("------option-------------");
		console.log(option);

		if(option.width == null)
			option.width = '1200';
		if(option.height == null)
			option.height = '620';
		if(option.position == null)
		{
			option.position = {};
			option.position.x = 25;
			option.position.y = 5;
		}

		option.title = "<div id='win_" + id + "' class='app-icon' style='background: url(" + option.icon + ") no-repeat; background-size: 100% auto;'></div><div style='display: inline-block; width:20px; height:20px; vertical-align: top; padding: 3px; color: #fff; font-weight: bold;'>" + option.title + "</div>";
		option.titleIsHtml = true;

		var dhxWins = null;
		if(this.dhtmlxWindow != null)
			dhxWins = this.dhtmlxWindow;
		else
		{
			dhxWins = new dhtmlXWindows();
			this.dhtmlxWindow = dhxWins;
			dhxWins.attachViewportTo(container);
			
		}
		

		console.log("------option 2-------------");
		console.log(option);
		
		var w1 = dhxWins.createWindow(id, option.position.x, option.position.y, option.width, option.height);
		dhxWins.window(id).setText(option.title);
		dhxWins.window(id).keepInViewport(true);
		dhxWins.window(id).allowResize(true);
		//dhxWins.window(id).maximize();


		dhxWins.window(id).attachEvent("onResizeFinish", function(win){
			// your code here
			if(option.onResizeEnd != null)
			{
				//option.onResizeEnd(win);
			}
		});

		content = "<div id=\"" + id + "\" style='padding: 12px; overflow-x: hidden;'>" + content + "</div>";
		
		dhxWins.window(id).attachHTMLString(content);
		
		var oriL = $("#" + container).position().left;
		$("#" + id).css( "opacity", 0 );
		$("#" + id).animate({ opacity: 1 }, 1000, function()
		{
			//dhxWins.window(id).keepInViewport(true);
			
		});
		return w1;
	}
	,
	closeWindow: function(dhxWins)
	{
		dhxWins.close();
		//if (dhxWins != null && dhxWins.unload != null) {
		//	dhxWins.unload();
		//	dhxWins = null;
		//}
	}
	,
	libraries: null,
	css: null,
	initLibraries: function()
	{
		var me = this;
		me.libraries = new Array();
		me.libraries.push("libraries/js/dhtmlxstd/codebase/dhtmlx.js");
		me.libraries.push("libraries/js/jqwidgets/jqx-all.js");
	}
	,
	initCss: function()
	{
		var me = this;
		me.css = new Array();
		me.css.push("libraries/js/dhtmlxstd/codebase/dhtmlx.css");
		me.css.push("libraries/js/jqwidgets/styles/jqx.base.css");
	}
	,
	getLibraryFiles: function()
	{
		var me = this;
		me.initLibraries();
		me.initCss();
		var arr = me.libraries.concat( me.css );
		return arr;
	}
});
