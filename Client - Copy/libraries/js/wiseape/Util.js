String.prototype.replaceAll = function(search, replacement) {
    var target = this;
    return target.replace(new RegExp(search, 'g'), replacement);
};

var WebClient =
{
	noLoader: false,
	onAfterSendPostData: null,
	get: function (url, callback, type)
	{

		try
		{		console.log("url : " + url);
				if(type == "html")
				{
					url += "?id=" + Math.random().toString(36).substring(7);
				}

				//if(WebClient.noLoader == false)
				Util.runLoader();
				$.get(url, function(result)
				{
					
					Util.stopLoader();
					var res = result;
					if(type != "html" && type != "text")
						res = JSON.parse(result);

					if(callback != null)
						callback(res);
				});
		}
		catch (e)
		{
			alert(e);
			Util.stopLoader();
		}


	}
	,
	post: function(url, param, callback, type)
	{
		try
		{
			//if(WebClient.noLoader == false)
			
			Util.runLoader();
			$.ajax({
				url: url,
				headers: {
					'Content-Type':'application/json'
				},
				method: 'POST',
				dataType: 'json',
				contentType: "application/json",
				data: param,
				success: function(result){
					Util.stopLoader();
					var res = result;
					if(type != "html" && type != "text")
					{
						console.log(result);
						//res = JSON.parse(result);
						res = result;
						if(WebClient.onAfterSendPostData != null)
							WebClient.onAfterSendPostData(param, res);
					}
					if(callback != null)
						callback(res);
				},
				error: function()
				{
					Util.stopLoader();
					alert("Internet connection or the website is down");
				}
			});			
		}
		catch (e)
		{
			Util.stopLoader();
		}
	}
	,
	uploadFile: function (url, id, callback)
	{
		//if(WebClient.noLoader)
		Util.runLoader();
		
		var l = document.getElementById(id).files.length;
		
		var fileData = document.getElementById(id).files[0];
		var data = new FormData();
		data.append("uploadedFile",fileData);
		$.ajax({
                url: url + "/" + fileData.name,
                type: 'POST',
                data: data,
                cache: false,
                dataType: 'json',
                processData: false, // Don't process the files
                contentType: false, // Set content type to false as jQuery // will tell the server its a query string request
                success: function (result) {
					Util.stopLoader();
					result = JSON.parse(result);
					console.log("Upload successfull");
					console.log(result);
					if(callback != null)
						callback(result);
                },
                error: function (data) {
					Util.stopLoader();
					console.log("Upload failed");
					console.log(data);
					alert(data.statusText);
                }
         });
	}
	,
	uploadFileWithTarget: function (url, id, i, callback)
	{
		//if(WebClient.noLoader)
		Util.runLoader();
		
		var l = document.getElementById(id).files.length;
		
		var fileData = document.getElementById(id).files[i];

		var targetFileName =  Util.createId(20);
		var ext = fileData.name.split('.').pop();
		targetFileName = targetFileName + "." + ext;

		var data = new FormData();
		data.append("uploadedFile",fileData);
		$.ajax({
                url: url + "/" + fileData.name + "/" + targetFileName,
                type: 'POST',
                data: data,
                cache: false,
                dataType: 'json',
                processData: false, // Don't process the files
                contentType: false, // Set content type to false as jQuery // will tell the server its a query string request
                success: function (result) {
					Util.stopLoader();
					//result = JSON.parse(result);
					console.log("Upload successfull");
					console.log(result);
					if(callback != null)
						callback(result);
                },
                error: function (data) {
					Util.stopLoader();
					console.log("Upload failed");
					console.log(data);
					alert(data.statusText);
                }
         });
	}
}

var DateUtil =
{
	months: null,
	formatDate: function(dt)
	{
		var dt = new Date(dt);
		return dt.getDate() + "-" + (dt.getMonth() + 1) + "-" + dt.getFullYear();
	}
	,
	getDateValue: function(val)
	{
		var dt = DateUtil.toDate(val);
		return "/Date(" + dt.valueOf() + ")/";
	}
	,
	toDate: function(dateStr) {
		var parts = dateStr.split("-");
		var s = parts[2] + "-" + parts[1] + "-" + parts[0];
		var dt = Date.UTC(parts[2], parts[1] - 1, parts[0]);

		return dt;
	}
	,
	toJsonDate: function(dt)
	{
		return "\/Date(" + (dt.valueOf()) + ")\/";
	}
}

var Util =
{
	merge: function (obj1,obj2){
		var obj3 = {};
		for (var attrname in obj1) { obj3[attrname] = obj1[attrname]; }
		for (var attrname in obj2) { obj3[attrname] = obj2[attrname]; }
		return obj3;
	}
	,
	createId: function(length)
	{
		var text = "";
		var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

		for( var i=0; i < length; i++ )
			text += possible.charAt(Math.floor(Math.random() * possible.length));

		return text;
	}
	,
	runLoader: function()
	{
		var div = document.createElement("div");
		$(div).css("height", "200px");
		$(div).css("width", "200px");
		$(div).css("position", "fixed");
		$(div).css("margin-left", "-100px");
		$(div).css("margin-top", "-100px");
		$(div).css("left", "50%");
		$(div).css("top", "50%");
		$(div).css("background", "url(libraries/js/wiseape/images/gears.svg) no-repeat");

		var divbg = document.createElement("div");
		$(divbg).attr("id", "my-loader");
		$(divbg).css("position", "fixed");
		$(divbg).css("left", "0");
		$(divbg).css("top", "0");
		$(divbg).css("background-color", "transparent");
		$(divbg).css("opacity", "0.6");
		$(divbg).css("-moz-opacity", "0.6");
		$(divbg).css("-webkit-opacity", "0.6");
		$(divbg).css("width", "100%");
		$(divbg).css("height", "100%");
		$(divbg).css("z-index", "120000");
		
		$(divbg).append(div);
		$(document.body).append(divbg);
		//alert("hire");
	}
	,
	stopLoader: function ()
	{
		$("#my-loader").remove();
	}
	,
	showNotif: function (title, message, callback)
	{
		Util.showDialog(title, message, callback, { notification: true });
	}
	,
	showNotifMobile: function(message, callback)
	{
		var divContent = "<div id='div-dialog-content' onclick='Util.closeNotifMobile()' style='background-color: #fff; width: 100%;height: 60%;position: fixed;top: 20%;left: 0px; text-align: center; padding-top: 10%; z-index: 1230000; font-size: 16pt'>" + message + "</div>";
		if(document.getElementById("div-dialog-content") == null)
		{
			$(document.body).append(divContent);
		}
		$("#div-dialog-content").show(1000, function()
		{
			Util.notifCallback = callback;
			setTimeout(function()
			{
				$("#div-dialog-content").hide(1000, function()
				{
					Util.closeNotifMobile(callback);
				});
			}, 2000);
		});
	}
	,
	closeNotifMobile: function(callback)
	{
		$("#div-dialog-content").hide(1000, function()
		{
			if(callback != null)
				callback();
			else
			{
				if(Util.notifCallback != null)
					Util.notifCallback();
			}
		});
	}
	,
	showDialog: function(title, message, callback, opt)
	{
		var buttons = {
			Ok: function ()
			{
				$( this ).dialog("close");
			}
		};

		var options = {
			show: { effect: 'fade', speed: 200 },
			hide: { effect: 'fade', speed: 200 },
			buttons: buttons
		};

		if(opt != null && opt.notification == true)
		{
			options.buttons = null;
			options.open = function(event, ui) {
				setTimeout(function ()
				{
				   $("#dialog").dialog("close");
				}, 1000);
			}

		}

		options.close = callback;
		if(document.getElementById("dialog") == null)
			$(document.body).append("<div style='display: none' id=\"dialog\" title=\"" + title + "\">" + message + "</div>");
		$("#dialog").dialog( options );
		
	}
	,
	formToJson: function(id)
	{

		var form = $(id).serializeArray();
		var obj = {};
		$.each(form,
			function(i, v) {
				if(v.value == 'on')
					v.value = 1;
				if(v.value == 'off')
					v.value = 0;
				
				var els =  $(id).find('[name="'+v.name+'"]');
				$(els).each(function()
				{
					if($(this).hasClass("date-picker"))
					{
						var dt =  new Date( $(this).val());
						dt = "\/Date(" + dt.valueOf() + ")\/";			
						v.value = dt;
					}

					if($(this).attr("datafield")  != null)
					{
						var datafield = $(this).attr("datafield");
						if(datafield.indexOf(",") > -1)
						{
							var dataFields = datafield.split(",");
							obj[dataFields[0]] = v.value.split(" ")[0];
							obj[dataFields[1]] = v.value.split(" ")[1];
						}
						else
							obj[datafield] = v.value
					}
				});
				
				obj[v.name] = v.value;
			});
	
		console.log("Object to send");
		console.log(obj);
		return obj;
	}
	,
	formToJson2: function( id )
	{
		var o = {};
		$(id).find("[datafield]").each(function()
		{
			var datafield = $(this).attr("datafield");
			if(datafield != null && datafield.indexOf(",") != -1)
			{
				var ss = datafield.split(",")
				var vals = $(this).val().split(" ");
				for(var j=0; j < ss.length; j++)
				{
					var fname = ss[j];
					o[fname] = vals[j];
				}
			}
			else if(datafield != null && datafield.indexOf(".") != -1)
			{
				var ss = datafield.split(".");
				var vals = o;
				for(var j=0; j < ss.length; j++)
				{
					var fname = ss[j];
					
				}
			}
			else
			{
				var val = $(this).val();
				if($(this).hasClass("date-picker"))
				{
					val = DateUtil.getDateValue(val);
				}
				o[datafield] = val;
			}
		});
		return o;
	}
	,
	jsonToForm2: function( o, formId )
	{
		$(formId).find("[datafield]").each(function()
		{
			var datafield = $(this).attr("datafield");
			
			var val = o[datafield];
			
			if(datafield != null && datafield.indexOf(",") != -1)
			{
				var ss = datafield.split(",");
				var vals = "";
				for(var j=0; j < ss.length; j++)
				{
					var fname = ss[j];
					var val2 = o[fname];
					if($(this).hasClass("date-picker"))
					{
						val2 = DateUtil.formatDate(val2);
					}
					vals += val2 + " ";	
				}
				$(this).val(vals);
				$(this).attr("data-old-val", vals);
			}
			else if(datafield != null && datafield.indexOf(".") != -1)
			{
				var ss = datafield.split(".");
				var vals = o;
				for(var j=0; j < ss.length; j++)
				{
					var fname = ss[j];
					vals = vals[fname];
				}
				if($(this).hasClass("date-picker"))
				{
					vals = DateUtil.formatDate(vals);
				}
				$(this).val(vals);
				$(this).attr("data-old-val", vals);
			}
			else
			{
				if($(this).hasClass("date-picker"))
				{
					val = DateUtil.formatDate(val);
				}
				$(this).val(val);
				$(this).attr("data-old-val", val);
			}
		});
	}
	,
	jsonToForm: function(o, formId )
	{
		$.each(o, function(name, val){
			var $el =  $(formId).find('[name="'+name+'"]'),
				type = $el.attr('type');

			switch(type){
				case 'checkbox':
					if(val)
						$el.attr('checked', 'checked');
					else
						$el.removeAttr('checked');
					break;
				case 'radio':
					if(val)
						$el.filter('[value="'+val+'"]').attr('checked', 'checked');
					else
						$el.removeAttr('checked');
					break;
				default:
					$el.val(val);
			}
		});

		$.each(o, function(name, val){
			var $el =  $(formId).find('[datafield="'+name+'"]'),
				type = $el.attr('type');

			switch(type){
				case 'checkbox':
					if(val)
						$el.attr('checked', 'checked');
					else
						$el.removeAttr('checked');
					break;
				case 'radio':
					if(val)
						$el.filter('[value="'+val+'"]').attr('checked', 'checked');
					else
						$el.removeAttr('checked');
					break;
				default:

					$el.val(val);
					$el.attr("data-old-val", val);
			}
		});
	}
	,
	populateCombo: function( id, data )
	{
		var valueMember = $("#form-field-" + id).attr("valuemember");
		var displayMember = $("#form-field-" + id).attr("displaymember");
		var displayMembers = new Array();
		if(displayMember.indexOf(",") != -1)
		{
			displayMembers = displayMember.split(",");
			console.log("hereee");
		}
		else
			displayMembers[0] = displayMember;

		for(var i = 0; i < data.length; i++)
		{
			var item = data[i];
			var value = "";
			var text = "";
			eval("value = item." + valueMember + ";");
			for(var j = 0; j < displayMembers.length; j++)
			{
				eval("text += item." + displayMembers[j] + " + ' ';");
			}

			var opt = document.createElement("option");
			$(opt).attr("value", value);
			$(opt).text(text);
			
			$("#form-field-" + id).append(opt);
		}
	}
	,
	initPage: function(uploadUrl)
	{
		

		//datepicker plugin
		//link
		$('.date-picker').datepicker({
			autoclose: true,
			todayHighlight: true
		})
		//show datepicker when clicking on the icon
		.next().on(ace.click_event, function(){
			$(this).prev().focus();
		});

		$(".datetime-picker").jqxDateTimeInput({ formatString: "F", showTimeButton: true, width: '400px', height: '35px', template: 'primary' });

		$('input[type=file]').ace_file_input({
			style:'well',
			btn_choose:'Drop files here or click to choose',
			btn_change:null,
			no_icon:'ace-icon fa fa-cloud-upload',
			droppable:true,
			thumbnail:'large'
		});

		var url = uploadUrl;
		$('input[type=file]').change(
			function()
			{
				var id = $(this).attr("id");
				WebClient.uploadFile( url, id, function ()
				{
					var originalName = $("#" + id).attr("name");
					if($("#" + id).attr("type") == "file")
					{
						
						$("#" + id).attr("name", "file-input-" + id);
						var newFile = document.createElement("input");
						$(newFile).attr("type", "hidden");
						$(newFile).attr("name", originalName);
						$(newFile).attr("id", originalName);
						$("#" + id).parent().append(newFile);
					}
					
					$("#" + originalName).val(result.Data);					
				});
			}
		);
	}
}