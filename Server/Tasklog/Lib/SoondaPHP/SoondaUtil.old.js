/*
Hi, there, SoondaUtil.js is used by Soonda PHP framework.
3 Agustus 2012
M. Huda
*/

var loc = "";

/**
 * Usage  var you = 'hello you guys'.between('hello ',' guys');
 * you = 'you';
 */


String.prototype.between = function(prefix, suffix) {
  var s = this;
  var i = s.indexOf(prefix);
  if (i >= 0) {
    s = s.substring(i + prefix.length);
  }
  else {
    return '';
  }
  if (suffix) {
    i = s.indexOf(suffix);
    if (i >= 0) {
      s = s.substring(0, i);
    }
    else {
      return '';
    }
  }
  return s;
}

String.prototype.EncodeHTML = function ()
{
	var str = this;
	if(str == null)
		return null;
	else
	{
		var sr = encodeURIComponent(str);
		sr = sr.replace(/!/gi, "%21");
		sr = sr.replace(/\*/gi, "%2A");
		sr = sr.replace(/\(/gi, "%28");
		sr = sr.replace(/\)/gi, "%29");
		sr = sr.replace(/\'/gi, "%27");
		sr = sr.replace(/\~/gi, "%7E");
		sr = sr.replace(/\`/gi, "%HX");
		sr = sr.replace(/\—/gi, "%HZ");
		return sr;
	}
}

String.prototype.RemoveNL = function ()
{
  return this.replace(/[\n\r\t]/g, ''); 
}

String.prototype.DecodeHTML = function ()
{
	var str = this;
	if(str == null)
		return null;
	else
	{
		str = str.RemoveNL();
		if(str.indexOf("encoded:") > -1)
		{
			str = str.replace("encoded:", "");
			str = decodeURIComponent( str );
			str = str.replace(/%21/gi, "!" );
			str = str.replace(/%2A/gi, "*");
			str = str.replace( /%28/gi, "(");
			str = str.replace( /%29/gi, ")");
			str = str.replace( /%27/gi, "'");
			str = str.replace( /%7E/gi, "~");
			str = str.replace( /%20/gi, " ");
			str = str.replace( /%2F/gi, "/");
		}
		return str;
	}
}

String.prototype.DecodeHTML2 = function ()
{
	var str = this;
	if(str == null)
		return null;
	else
	{
		str = str.RemoveNL();

			str = str.replace("encoded:", "");
			str = decodeURIComponent( str );
			str = str.replace(/%21/gi, "!" );
			str = str.replace(/%2A/gi, "*");
			str = str.replace( /%28/gi, "(");
			str = str.replace( /%29/gi, ")");
			str = str.replace( /%27/gi, "'");
			str = str.replace( /%7E/gi, "~");
			str = str.replace( /%20/gi, " ");
			str = str.replace( /%2F/gi, "/");
		
		return str;
	}
}

// Array Remove - By John Resig (MIT Licensed)
Array.prototype.remove = function(from, to) {
  var rest = this.slice((to || from) + 1 || this.length);
  this.length = from < 0 ? this.length + from : from;
  return this.push.apply(this, rest);
};



var animContent;
Soonda =
{
	animWidth : 0,
	_moduleName: "",
	_task:null,
	_otherParam:null,
	_animObject:null,
	_sortBy: "",
	_sortDirection: "",
	_componentOnly: false,
	EDITORS:null,
	_winLoad: false,
	errorMsg: "",
	currentModuleName: "",
	init: function ()
	{
		Soonda.EDITORS = new Array();
	}
	,
	selectTab: function (tabSelect, tabUnselect, contentSelect, contentUnselect)
	{
		var otabSelect = document.getElementById(tabSelect);
		otabSelect.className = "selectedViewTab";
		var otabUnselect = document.getElementById(tabUnselect);
		otabUnselect.className = "unSelectedViewTab";
		
		var ocontentSelect = document.getElementById(contentSelect);
		ocontentSelect.style.display = "inline";

		var ocontentUnselect = document.getElementById(contentUnselect);
		ocontentUnselect.style.display = "none";
	}
	,
	initForm: function (formId)
	{
		var form = document.getElementById( formId);
		for(var i = 0; i < form.elements.length; i++)
		{
			var elm = form.elements[i];
			if( elm.getAttribute("tabindex") != null )
			{
				
				if( elm.getAttribute("type") != null &&  elm.getAttribute("type") == "hidden")
				{
				}
				else
				{
					elm.tabIndex = elm.getAttribute("tabindex");
					elm.onkeyup = function () { Soonda.nextFocus(formId, event.keyCode, this ); }
				}
			}
		}
	}
	,
	nextFocus: function (formId, keyCode, elm)
	{
		if( keyCode == '13' && elm.tagName.toLowerCase() != "textarea")
		{
			var form = document.getElementById( formId);
			var tabIdx = elm.tabIndex;
			for(var ix = 0; ix < form.elements.length; ix++)
			{
				var elmNext = form.elements[ix];
				if(elmNext != null && elmNext.id != elm.id && elmNext.tabIndex != null && elmNext.tabIndex >= elm.tabIndex)
				{
					elmNext.focus();
					break;
				}

			}
		}
	}
	,
	moveTo: function (sel1, sel2, otherFunc)
	{
		var oSel2 = document.getElementById(sel2);
		var oSel1 = document.getElementById(sel1);
		//alert(oSel1);

		var sel1Opt = oSel1.options[ oSel1.selectedIndex ];
		var sel2OptSelected = oSel2.options[ oSel2.selectedIndex ];

		var newOpt = document.createElement("option");
		newOpt.text = sel1Opt.text;
		newOpt.value = sel1Opt.value;
		newOpt.setAttribute("originidx", oSel1.selectedIndex);

		try
		{
			oSel2.options.add( newOpt, sel2OptSelected );
		}
		catch (ex)
		{
			oSel2.options.add( newOpt, oSel2.selectedIndex );	
		}

		oSel1.options.remove( oSel1.selectedIndex );
		eval("" + otherFunc);
	}
	,
	moveBack: function (sel1, sel2, otherFunc)
	{
		var oSel2 = document.getElementById(sel2);
		var oSel1 = document.getElementById(sel1);
		var sel2Opt = oSel2.options[ oSel2.selectedIndex ];
		var originIdx = sel2Opt.getAttribute("originidx");
		var sel1OptSelected = oSel1.options[ originIdx ];

		var newOpt = document.createElement("option");
		newOpt.text = sel2Opt.text;
		newOpt.value = sel2Opt.value;


		try
		{
			oSel1.options.add( newOpt, sel1OptSelected );
		}
		catch (ex)
		{
			oSel1.options.add( newOpt, originIdx);	
		}

		oSel2.options.remove( oSel2.selectedIndex );
		
		eval(otherFunc);
	}
	,
	deleteLayoutGroup: function (moduleName, cmbLayout, oDefaultAnimatorContent)
	{
		var cmb = document.getElementById( cmbLayout );
		var idGroup = cmb.options[cmb.selectedIndex].value;
		Soonda.loadModule( moduleName, "deleteFieldGrouping", "idgroup=" + idGroup, oDefaultAnimatorContent, true );
	}
	,
	setFieldGroups: function (sel1, sel2, txt)
	{
		var s = "";
		var oSel2 = document.getElementById(sel2);
		
		for(var i = 0; i < oSel2.options.length; i++ )
		{
			var opt = oSel2.options[i];
			s += opt.value + "->";
		}

		s = s.substr(0, s.length - 2);
		document.getElementById( txt ).value = s;
	}
	,
	openPhpSaveDialog: function (filename, filetype)
	{

		var ifrm = document.createElement("IFRAME"); 
		ifrm.style.display = "none";
		ifrm.setAttribute("src", "libraries/SoondaPHP/SoondaService.php?op=savefile&file=" + filename + "&filetype=" + filetype);
		//document.body.appendChild(ifrm); 
		location = "libraries/SoondaPHP/SoondaService.php?op=savefile&file=" + filename + "&filetype=" + filetype;
	}
	,
	clearForm: function ()
	{
		window.scroll(0,0);
		Soonda.ClearTextAreas();
		var form = document.getElementsByTagName( "form");
		form = form[0];
		
		for(var i = 0; i < form.elements.length; i++)
		{
			var elm = form.elements[i];
			if( elm.getAttribute("data") != null)
			{
				elm.value = "";
			}
		}
	}
	,
	showAlert: function (data)
	{
		if(Soonda._winLoad == false)
		{
			REDIPS.dialog.init();               // initialize dialog
			Soonda._winLoad = true;
		}
		REDIPS.dialog.op_high = 40;         // set maximum transparency to 40%
		REDIPS.dialog.fade_speed = 4;      // set fade spead (delay is 18ms)
		REDIPS.dialog.close_button = 'x'; // close button definition
		REDIPS.dialog.show(400, 100, data, 'Ok')
		//REDIPS.dialog.position();
	}
	,
	addScript : function addScript(inject,code)
	{
        var _in = document.getElementById(inject);
        var scriptNode = document.createElement('script');
        scriptNode.innerHTML = code;
        _in.appendChild(scriptNode);
    }
	,
	loadModuleNew: function  ( moduleName, componenentName, task, otherParam, animObject, componentOnly)
	{
		var taskOther = "task" + componentName
		loadModule( moduleName,
	}
	,
	loadModule : function ( moduleName, task, otherParam, animObject, componentOnly)
	{
		if(componentOnly == null)
			componentOnly = false;

		if(animObject != null)
			animObject.start();
		
		var url = 'index.php?ajax=1';

		if(moduleName != null && moduleName.length > 0)
			url += '&module=' + moduleName;
		else
			url += "&firstload=1";

		if(Soonda.currentModuleName == "")
			Soonda.currentModuleName = moduleName;


		if(task != null && task.length > 0)
		{
			url += '&task' + moduleName + '=' + task;
		}
		
		url += "&currentmodule=" + Soonda.currentModuleName;
	

		if(componentOnly)
			url += '&simple=true';

		if(Soonda.currentModuleName != moduleName)
		{
			location = url;			
		}
		else
		{
			
			jx.load( url,
				function (data)
				{
					try
					{

						if(data.toLowerCase().indexOf("error") > -1 || data.toLowerCase().indexOf("warning") > -1)
						{
							var serr = "";
							if(data.toLowerCase().indexOf("error") > -1)
								serr = data.substring( data.toLowerCase().indexOf("error"), data.length);
							else 
								serr = data.substring( data.toLowerCase().indexOf("warning"), data.length);		
							alert(data);
							
						}
						else
						{	
							loc = "before parse and set";
							Soonda.parseAndSet( data );
						}
						loc = "before toajaxlink";
						Soonda.toAjaxLink();
							
					}
					catch (e)
					{
						alert(e.message + " " + loc + " , Data : " + data);
					}
					if(animObject != null)
						animObject.stop();
				}
				,
					null
				,
				otherParam
			);
		}
	}
	,
	loadModuleByFilter: function (moduleName, task, cmbTotalDisplayName, cmbPageName, cmbLayoutName, cmbSummaryName, cmbGraphTypeName, txtCondition, sender, animObject)
	{
		
		if(sender != null && cmbTotalDisplayName == sender.id)
		{
			var cmbPage = document.getElementById(cmbPageName);
			cmbPage.selectedIndex = 0;
		}
		
		var filter = Soonda.createFilterParam(cmbTotalDisplayName, cmbPageName, cmbLayoutName, cmbSummaryName, cmbGraphTypeName);
		
		if( document.getElementById(txtCondition).value != "")
			filter += "&condition=" + document.getElementById(txtCondition).value;
		
		Soonda.loadModule(moduleName, task, filter, animObject, true);
	}
	,
	loadModuleDelete: function ( moduleName, task, otherParam, animObject )
	{
		Soonda._moduleName = moduleName;
		Soonda._task = task;
		Soonda._otherParam = otherParam;
		Soonda._animObject = animObject;
		Soonda._componentOnly = true;
		
		if(Soonda._winLoad == false)
		{
			REDIPS.dialog.init();               // initialize dialog
			Soonda._winLoad = true;
		}

		
		REDIPS.dialog.op_high = 40;         // set maximum transparency to 40%
		REDIPS.dialog.fade_speed = 4;      // set fade spead (delay is 18ms)
		//REDIPS.dialog.close_button = 'x'; // close button definition
		REDIPS.dialog.show(400, 130, 'Are you sure you want to delete the item?', 'Yes|Soonda.yesClick', 'Cancel')
		//REDIPS.dialog.position();
	}
	,
	getPostParamFromInput: function (formId, withDetailItemTd, useSpecialChar)
	{
		var and = "&";
		var eq = "=";

		if(useSpecialChar == true)
		{
			and = "[and]";
			eq = "[equal]";
		}
		var std = "";
		var form = document.getElementById( formId);
		var postQuery = "";
		for(var i = 0; i < form.elements.length; i++)
		{
			var elm = form.elements[i];
			if( elm.getAttribute("data") != null)
			{
				if( elm.type == "checkbox" )
				{
					if(elm.checked)
					{
						std += "<td>" + elm.getAttribute("checkedvalue") + "</td>";
						postQuery += elm.getAttribute("data") + eq + elm.getAttribute("checkedvalue").EncodeHTML().replace(/0Na/gi, "0") + and;
					
					}
					else
					{
						var sr = elm.getAttribute("uncheckedvalue").EncodeHTML();
						sr = sr.replace(/0Na/gi, "0");
						std += "<td>" + elm.getAttribute("uncheckedvalue") + "</td>";
						postQuery += elm.getAttribute("data") + eq + sr + and;
					}
					
				}
				else if( elm.type == "radio" )
				{
					if(elm.checked)
					{
						std += "<td>" + elm.value + "</td>";
						postQuery += elm.getAttribute("data") + eq + elm.value.EncodeHTML().replace(/0Na/gi, "0") + and;
					}
				}
				else
				{
					if(elm.getAttribute("ishidden") != "true")
					{
						if( elm.getAttribute("isimage") == "true" )
							std += "<td><img width='40px' height='40px' src='" + elm.value + "' border='0' onclick=\"window.open('" + elm.value + "', null, 'width=400,height=400');\"></td>";
						else
						{
							if(elm.tagName.toLowerCase() == "select" )
								std +=  "<td>" + elm.options[elm.selectedIndex].text + "</td>";
							else 
								std +=  "<td>" + elm.value + "</td>";
						}
					}
					postQuery += elm.getAttribute("data") + eq + elm.value.EncodeHTML().replace(/0Na/gi, "0") + and;
				}
			}
		}

		postQuery = postQuery.substring(0, postQuery.length - and.length) ;

		if(withDetailItemTd)
			return std;
		else
			return postQuery;
	}
	,
	saveModule: function  ( moduleName, task, otherParam, formId, animObject )
	{
		Soonda.SetTextAreas();
		if(otherParam != null)
			otherParam = "&" + otherParam;

		var postQuery = Soonda.getPostParamFromInput( formId ) + otherParam;
		Soonda.loadModule( moduleName, task, postQuery, animObject, true);
	}
	,
	displayInvalidInput: function ( formId, lbl, err)
	{
		var form = document.getElementById( formId);
		var divs = form.getElementsByTagName( "div" );

		for(var i = 0; i < divs.length; i++)
		{
			var elm = divs[i];
			if(elm.id.indexOf("lblInvalid") > -1)
			{
				elm.innerHTML = "";
			}
		}

		document.getElementById( lbl ).innerHTML = err;
	}
	,
	editDetailItem: function  ( formId, tblName, moduleName, childModuleName, rIdx, animObject )
	{
		var editedInput = document.getElementById("txtDetail" + childModuleName + "_" + rIdx);
		var idx = editedInput.value.indexOf("addnew");
		
		var sAddNew = editedInput.value.substr(idx, 14);
		var postQuery = Soonda.getPostParamFromInput(formId, false, true);	
		postQuery += "[and]" + sAddNew;
		var sTd = Soonda.getPostParamFromInput( formId, true );
		Soonda.SetTextAreas();
		
		var sInput = "<input type='hidden' data='detailRow_" + tblName + "_" + rIdx + "' id='txtDetail" + childModuleName + "_" + rIdx + "' name='txtDetail" + childModuleName + "_" + rIdx + "' value='" + postQuery + "' >";
		sInput += "<input type='button' value='---' id='btnEditDetail' onclick=\"Soonda.saveModule('" + moduleName + "', 'edit" + childModuleName + "', '&width=800&height=500&hidebuttons=btnSaveWrapper,btnBackWrapper&detailtablename=" + tblName + "&ridx=" + rIdx + "', '" + formId + "', DefaultAnimatorContent );\"><input type='button' value=' x ' id='btnDeleteDetail' onclick=\"Soonda.removeDetailItem('" + tblName + "', 'detailTr" + rIdx + "', 'txtDetail" + tblName + "_" + rIdx + "');\">";
		sTd += "<td width='60px'>" + sInput + "</td>";
		document.getElementById("detailTr" + rIdx).innerHTML = sTd;		
		REDIPS.dialog.hide('undefined');
	}
	,
	addDetailItem: function  ( formId, tblName, moduleName, childModuleName, animObject )
	{
		var counter = 0;
		var inputs = document.getElementsByTagName("input");
		for(var i =0; i < inputs.length; i++)
		{
			var sData = inputs[i].getAttribute("data");
			if( sData != null && sData.indexOf("detailRow") > -1)
			{
				counter++;
			}
		}

		var postQuery = Soonda.getPostParamFromInput(formId, false, true);	
		postQuery += "[and]addnew[equal]1";

		var sTd = Soonda.getPostParamFromInput( formId, true );
		Soonda.SetTextAreas();
		var sInput = "<input type='hidden' data='detailRow_" + tblName + "_" + counter + "' id='txtDetail" + childModuleName + "_" + counter + "' name='txtDetail" + childModuleName + "_" + counter + "' value='" + postQuery + "' >";
		sInput += "<input type='button' value='---' id='btnEditDetail' onclick=\"Soonda.saveModule('" + moduleName + "', 'edit" + childModuleName + "', '&width=800&height=500&hidebuttons=btnSaveWrapper,btnBackWrapper&detailtablename=" + tblName + "&ridx=" + counter + "', '" + formId + "', DefaultAnimatorContent );\"><input type='button' value=' x ' id='btnDeleteDetail' onclick=\"Soonda.removeDetailItem('" + tblName + "', 'detailTr" + counter + "', 'txtDetail" + tblName + "_" + counter + "');\">";
		sTd += "<td width='60px'>" + sInput + "</td>";
		var sTr = "<TR id='detailTr" + counter + "'>" + sTd + "</TR>" ;
		document.getElementById(tblName).innerHTML += sTr;		
		REDIPS.dialog.hide('undefined');
	}
	,
	removeDetailItem: function (tblName, trname, hiddenInputName)
	{
		if (confirm('Are you sure?'))
		{
			var tr = document.getElementById (trname);
			var tbl = document.getElementById(tblName);
			tr.style.display = "none";
			var inp = document.getElementById( hiddenInputName );
			inp.value += "[and]tobedeleted=1";
			//tbl.deleteRow(tr.rowIndex);
		}
	}
	,
	SetTextAreas: function ()
	{
		if(Soonda.EDITORS != null)
		{
			for(var i = 0; i < Soonda.EDITORS.length; i++) 
			{	
				if( document.getElementById( Soonda.EDITORS[i].myData ) != null)
				{
					document.getElementById( Soonda.EDITORS[i].myData ).value = Soonda.EDITORS[i].getData();
				}
			}
		}
	}
	,
	ClearTextAreas: function()
	{
		for(var i = 0; i < Soonda.EDITORS.length; i++) 
		{	
			document.getElementById( Soonda.EDITORS[i].myData ).value = "";
			Soonda.EDITORS[i].setData('');
		}
	}
	,
	createFilterParam: function (cmbTotalDisplayName, cmbPageName, cmbLayoutName, cmbSummaryName, cmbGraphTypeName)
	{
		var filter = "";
		var summaryId = "";
		var graphType = "";

		var cmbPageLimit = document.getElementById(cmbTotalDisplayName);
		var limit = cmbPageLimit.options[cmbPageLimit.selectedIndex].value;
		var layoutId = document.getElementById(cmbLayoutName).options[document.getElementById(cmbLayoutName).selectedIndex].value;
		if( cmbSummaryName != null)
			summaryId = document.getElementById(cmbSummaryName).options[document.getElementById(cmbSummaryName).selectedIndex].value;
		if( cmbGraphTypeName != null)
			graphType = document.getElementById(cmbGraphTypeName).options[document.getElementById(cmbGraphTypeName).selectedIndex].value;
	
		
		var cmbPage = document.getElementById(cmbPageName);
		var page = cmbPage.options[cmbPage.selectedIndex].value;

		if(Soonda._sortBy != "")
			filter += "sortby=" + Soonda._sortBy + "&";
		
		if(Soonda._sortDirection != "")
			filter += "sortdir=" + Soonda._sortDirection + "&";

		if(limit != "")
			filter += "limit=" + limit + "&";
		
		if(page != "")
			filter += "page=" + page + "&";

		if(layoutId != "")
			filter += "layoutId=" + layoutId + "&";

		if(summaryId != "")
			filter += "summaryId=" + summaryId + "&";

		if(graphType != "")
			filter += "graphType=" + graphType + "";


		return filter;
	}
	,
	yesClick: function ()
	{
		Soonda.loadModule( Soonda._moduleName, Soonda._task, Soonda._otherParam, Soonda._animObject, Soonda._componentOnly);
	}
	,
	parseAndSet : function ( sData)
	{
		if( sData.indexOf( "<:nochange:>") == -1)
		{
			var elmValues = sData.split("<<||>>");
			for(var i = 0; i < elmValues.length; i++)
			{	
				var elmValue = elmValues[i]; 
				if(elmValue.length > 0)
				{
					var tmp = elmValue.split("<-|->");
					var o = document.getElementById( tmp[0] );
					//alert(tmp[0] + " " + tmp[1].DecodeHTML() );

					o.innerHTML = tmp[1].DecodeHTML();


					
					//Soonda.runScripts( tmp[1] );

					/*var sScript = tmp[1].between("<div id='divScript'>","</div>");
					//alert(sScript);
					if(sScript != "")
					{
						
						var divScript = document.getElementById( "divScript" );
						divScript.innerHTML = "";
						//SoondaUtil.addScript(divScript, sScript);
						eval( sScript + " defaultOnLoad();");
					}*/
				}
			}
		}

		Soonda.runScripts( sData);
	}
	,
	runScripts: function(sData)
	{
		var sScriptSpec =  sData.between("<script id='specScript'>","</script>");
		if(sScriptSpec != null && sScriptSpec != "")
			eval( sScriptSpec + "");

		var idx = 0;
		var sss = sData;
		var sScriptSpec =  sss.between("<script>","</script>");
		while( sScriptSpec != "")
		{
			try
			{
				//Execute the script.
				if(sScriptSpec != null && sScriptSpec != "")
					eval( sScriptSpec + "");

				//Check if the script code has been loaded to the document. If it is a function source code, we need to do this.
				var exists = false;
				var scripts = document.getElementsByTagName('script');
				for(var ii=0; ii < scripts.length; ii++)
				{
					if(scripts[ii].innerHTML == sScriptSpec)
					{
						exists = true;
						break;
					}
				}
				
				//Add the script element to the document dynamically if it doesn't exist yet
				if(exists == false)
				{
					var script = document.createElement('script');
					script.type = 'text/javascript';
					script.innerHTML = sScriptSpec;
					document.getElementsByTagName('head')[0].appendChild(script);
				}

				//Find another script tag
				var sFull = "<script>" + sScriptSpec + "</script>";
				idx = sss.indexOf(sFull);
				idx += sFull.length;
				sss = sss.substr( idx, sss.length - idx );
				sScriptSpec =  sss.between("<script>","</script>");	
			}
			catch (e)
			{
				alert("error ");
			}

		}
		

		for(var i = 1; i < 20; i++)
		{
			var sScriptSpec =  sData.between("<script id='" + i + "'>","</script>");
			if(sScriptSpec != null && sScriptSpec != "")
				eval( sScriptSpec + "");
		}

		var sScript = sData.between("<div id='divScript'>","</div>");
		//alert(sScript);
		if(sScript != "")
		{
			eval( sScript + " defaultOnLoad();");
			//var divScript = document.getElementById( "divScript" );
			var divs = document.getElementsByTagName( "div" );
			//alert(divs.length);
			for(var i = 0 ; i < divs.length; i++)
			{
				var div = divs[i];
				//alert(div.id);
				if(div.id == "divScript")
				{
					//alert(div.innerHTML);
					div.innerHTML = "";
					//SoondaUtil.addScript(divScript, sScript);
					
				}
			}
		}
	}
	,
	previewImage : function (img)
	{
		if(Soonda._winLoad == false)
		{
			REDIPS.dialog.init();               // initialize dialog
			Soonda._winLoad = true;
		}
		var sImg = "<img src='" + img + "' border='0'>";
		REDIPS.dialog.op_high = 40;         // set maximum transparency to 40%
		REDIPS.dialog.fade_speed = 4;      // set fade spead (delay is 18ms)
		REDIPS.dialog.close_button = 'x'; // close button definition
		REDIPS.dialog.show(600, 400, sImg);
		//REDIPS.dialog.position();
	}
	,
	playSound :	function (soundfile, container) 
	{
			 //document.getElementById(container).innerHTML =
			 //"<embed ID='DIVSOUND' src=\"" + soundfile + "\" hidden=\"true\" autostart=\"true\" loop=\"false\" />";
	}
	,
	ajaxUpload : function(ctrl, btn, divPreview, serverUrl)
	{
		
		var button = $('#' + btn);
		var interval = 0;
		
		new AjaxUpload(button, 
		{
				action: serverUrl, 
				name: 'myfile',
				onSubmit : function(file, ext)
				{
					// change button text, when user selects file			
					button.text('Uploading');
									
					// If you want to allow uploading only 1 file at time,
					// you can disable upload button
					this.disable();
					
					// Uploding -> Uploading. -> Uploading...
					interval = window.setInterval(function()
					{
						var text = button.text();
						if (text.length < 13){
							button.text(text + '.');					
						} else {
							button.text('Uploading');				
						}
					}, 200);
				}
				,
				onComplete: function(file, response)
				{
					
					button.text('Upload');
					window.clearInterval(interval);
								
					// enable upload button
					this.enable();
					
					
					// add file to the list	
					if(response.toLowerCase().indexOf("error") == -1 && response.toLowerCase().indexOf("warning") == -1)
					{
						var tmp = response.split("-|-");
						var sfile = tmp[0].split(":");
						
						document.getElementById(ctrl ).value = sfile[1] ;
						if( document.getElementById(divPreview ).tagName.toLowerCase() == "img")
						{
							document.getElementById(divPreview ).src = sfile[1];
						}
						else
							document.getElementById(divPreview ).innerText = sfile[1];
						//document.getElementById(divPreview ).style.height = "100px"; 
					}
				}
		});
	}
	,
	ChangeDateValue: function (ctrlName)
	{
		var sDate = "";

		var cmbDay = document.getElementById( ctrlName + "Day");
		var cmbMonth = document.getElementById( ctrlName + "Month");
		var cmbYear = document.getElementById( ctrlName + "Year");
		var cmbHour = document.getElementById( ctrlName + "Hour");
		var cmbMinute = document.getElementById( ctrlName + "Minute");
		var cmbSecond = document.getElementById( ctrlName + "Second");

		if(cmbYear != null)
			sDate = cmbYear.options[cmbYear.selectedIndex].value + "-";
		if(cmbMonth != null)
			sDate += cmbMonth.options[cmbMonth.selectedIndex].value + "-";
		if(cmbDay != null)
			sDate += cmbDay.options[cmbDay.selectedIndex].value + " ";
		if(cmbHour != null)
			sDate += cmbHour.options[cmbHour.selectedIndex].value + ":";
		if(cmbMinute != null)
			sDate += cmbMinute.options[cmbMinute.selectedIndex].value + ":";
		if(cmbSecond != null)
			sDate += cmbSecond.options[cmbSecond.selectedIndex].value + "";

		document.getElementById(ctrlName).value = sDate;
	}
	,
	sortBy: function (fieldname, direction, moduleName, task, cmbTotalDisplayName, cmbPageName, cmbLayoutName, cmbSummaryName, cmbGraphTypeName, txtCondition, sender,  animObject)
	{
		Soonda._sortBy = fieldname;
		Soonda._sortDirection = direction;
		Soonda.loadModuleByFilter(moduleName, task, cmbTotalDisplayName, cmbPageName, cmbLayoutName, cmbSummaryName, cmbGraphTypeName, txtCondition, sender, animObject, true);
	}
	,
	exportToPDF: function (container, moduleName, cmbTotalDisplayName, cmbPageName, cmbLayoutName, txtCondition, animObject)
	{
		//var oContainer = document.getElementById( container);
		//var html = oContainer.innerHTML;
		//var param = "exportdata=" + html.EncodeHTML();

		var filter = Soonda.createFilterParam(cmbTotalDisplayName, cmbPageName, cmbLayoutName, null);
		if( document.getElementById(txtCondition).value != "")
			filter += "&condition=" + document.getElementById(txtCondition).value;
		Soonda.loadModule(moduleName, "exportpdf", filter, animObject, true);
	}
	,
	exportToExcel: function (container, moduleName,  cmbTotalDisplayName, cmbPageName, cmbLayoutName, txtCondition, animObject)
	{
		var oContainer = document.getElementById( container);
		var html = oContainer.innerHTML;
		
		var param = "exportdata=" + html.EncodeHTML();
		Soonda.loadModule(moduleName, "exportxls", param, animObject, true);
	}
	,
	validateNumeric: function (evt, type) 
	{
		  var theEvent = evt || window.event;
		  var key = theEvent.keyCode || theEvent.which;
		  key = String.fromCharCode( key );
		  var regex = /^[+-]?\d+(\.\d+)?$/;
		  
		  if(type == "int")
			  regex = /[0-9]/;

		  if( !regex.test(key) ) {
			theEvent.returnValue = false;
			if(theEvent.preventDefault) theEvent.preventDefault();
		  }
	}
	,
	showDialogWindow: function(sData, w, h, callback)
	{
		
		sData = sData.DecodeHTML();
		if(Soonda._winLoad == false)
		{
			REDIPS.dialog.init();  			
			Soonda._winLoad = true;
		}

		REDIPS.dialog.op_high = 40;
		REDIPS.dialog.fade_speed = 4;	
		REDIPS.dialog.show(w, h, sData);

		var sScript = sData.between("<div id='divScript'>","</div>");
		if(sScript != "")
		{
			var divScript = document.getElementById( "divScript" );
			divScript.innerHTML = "";
			//SoondaUtil.addScript(divScript, sScript);
			eval( sScript + " defaultOnLoad();");
		}

		Soonda.runScripts( sData);
	}
	,
	getCSS: function(element, property) 
	{
	  var elem = document.getElementById(element);
	  var css = null; 
	  if(elem.currentStyle) {
		css = elem.currentStyle[property];
	  } else if(window.getComputedStyle) {
		 css = document.defaultView.getComputedStyle(elem, null).getPropertyValue(property);
	  }
	  return css;
	}
	,
	convertLink: function (url)
	{
		var sLink = "Soonda.loadModule(\"{modulename}\", \"{taskmodule}\", \"{otherparam}\", DefaultAnimator);";
		var sModuleName = "";
		var sTask = "";
		var sOtherParam = "";
		
		try
		{
			var ss = "";
			if(url != null)	
				ss = url.split("?");
			var params = null;
			if(ss.length > 1)
				params = ss[1].split("&");

			if(params != null)
			{
				for(var i = 0; i < params.length; i++)
				{
					var param = params[i].split("=");
					var variable = param[0];
					var value = param[1];
					if(variable == "module")
						sModuleName = value;
					else if( variable.indexOf("task" + sModuleName) > -1 )
						sTask = value;
					else if( variable == "ajax" || variable == "firstload")
						continue;
					else
						sOtherParam += variable + "=" + value + "&";
				}
				sOtherParam = sOtherParam.substr(0, sOtherParam.length - 1);
				sLink = sLink.replace( "{modulename}", sModuleName);
				sLink = sLink.replace( "{taskmodule}", sTask);
				sLink = sLink.replace( "{otherparam}", sOtherParam);
				
				//alert(sLink);
				return sLink;
			}
			else
			{
				return url;
			}
		}
		catch (e)
		{	
			alert(e.message + " at " + url);
			return url;
		}

	}
	,
	toAjaxLink: function ()
	{
		var oLinks = document.getElementsByTagName("A");
		
		for(var i = 0; i < oLinks.length; i++)
		{
			var url = oLinks[i].href;
			if( url.indexOf( "javascript:" ) == -1)
			{
				var newUrl = Soonda.convertLink(url);
				oLinks[i].href = "javascript:" + newUrl;
			}
		}
	}
	,
	openAjax: function ( url, callback)
	{
		jx.load( url,
			function (data)
			{
			
				callback( data );
			});
	}


}

SoondaAnim = 
{
	zoomedIds: [],
	minW: 160,
	minH: 200,
	maxW: 180,
	maxH: 240,
	deltaS: 1,
	deltaW: 1,
	deltaH: 1,
	checkIsZoomed: function (id)
	{
		for(var i = 0; i < SoondaAnim.zoomedIds.length; i++)
		{
			var zoomedId = SoondaAnim.zoomedIds[i];
			if(zoomedId != null && zoomedId.id == id)
			{
				return zoomedId;
			}
		}
		return null;
	}
	,
	doneZoom: function (id)
	{
		var idx = -1;
		var zoomID = null;
		for(var i = 0; i < SoondaAnim.zoomedIds.length; i++)
		{
			var zoomedId = zoomedIds[i];
			if(zoomedId != null && zoomedId.id == id)
			{
				idx = i;
				zoomID = zoomedId;
				break;
			}
		}
		if(idx != -1)
		{
			SoondaAnim.zoomedIds.remove(idx);
			clearInterval(zoomID.intval);
		}
	}
	,
	zoomIn: function (id, factor, speed, callback, param)
	{
		var o = document.getElementById(id);
		var zoomedId = SoondaAnim.checkIsZoomed(id);

		//alert(zoomedId);
		if(zoomedId == null)
		{
			SoondaAnim.minH = Soonda.getCSS(id, "height");
			SoondaAnim.minW = Soonda.getCSS(id, "width");
			SoondaAnim.maxH = parseFloat(SoondaAnim.minH) * factor;
			SoondaAnim.maxW = parseFloat(SoondaAnim.minW) * factor;

			SoondaAnim.deltaW = SoondaAnim.deltaW * speed;
			SoondaAnim.deltaH = SoondaAnim.deltaH * speed;

			zoomedId = { id:id, beingZoomed:true, maxH:SoondaAnim.maxH, minH:SoondaAnim.minH, maxW:SoondaAnim.maxW, minW:SoondaAnim.minW, deltaS:SoondaAnim.deltaS, deltaW:SoondaAnim.deltaW, deltaH:SoondaAnim.deltaH };
			SoondaAnim.zoomedIds.push( zoomedId );
			o.style.width = SoondaAnim.minW;
			o.style.height = SoondaAnim.minH;
		}
		
		if( zoomedId != null && zoomedId.beingZoomed == true && (parseInt(o.style.width) < zoomedId.maxW ||  parseInt(o.style.height) < zoomedId.maxH) )
		{
			
			var w = (parseInt(o.style.width) + zoomedId.deltaW);
			var h = (parseInt(o.style.height) + zoomedId.deltaH);
			
			if( parseInt(o.style.width) < zoomedId.maxW )
				o.style.width = w + "px";

			if( parseInt(o.style.height) < zoomedId.maxH )
				o.style.height = h + "px";

			var interval = setTimeout( function(){ SoondaAnim.zoomIn(id, factor, speed, callback, param);  }, zoomedId.deltaS);
			var zoomID = SoondaAnim.checkIsZoomed(id) ;
			if(zoomID != null)
				zoomID.intval = interval;
		}
		else
		{
			//SoondaAnim.doneZoom(id);
			if(callback != null)
				callback(param);
		}
	}
	,
	zoomOut: function (id, callback, param)
	{
		var o = document.getElementById(id);
		//SoondaAnim.doneZoom(id);
		//o.style.height = SoondaAnim.minH + "px";
		//o.style.width = SoondaAnim.minW + "px";
		

		var zoomedId = SoondaAnim.checkIsZoomed(id);
		if(zoomedId != null)
		{
			zoomedId.beingZoomed = false;
			zoomedId.beingZoomedOut = true;
		}
		
		if( zoomedId.beingZoomedOut == true && ( parseInt(o.style.width) > zoomedId.minW || parseInt(o.style.height) > zoomedId.minH ) )
		{

			var w = (parseInt(o.style.width) - zoomedId.deltaW);
			var h = (parseInt(o.style.height) - zoomedId.deltaH);

			if( parseInt(o.style.width) > zoomedId.minW )
				o.style.width = w + "px";

			if(  parseInt(o.style.height) > zoomedId.minH )
				o.style.height = h + "px";

			var interval = setTimeout( function(){ SoondaAnim.zoomOut(id, callback, param);  }, zoomedId.deltaS);
		}
		else
		{
			SoondaAnim.doneZoom(id);
			if(callback != null)
				callback(param);
		}
	}
	,
	fadeOut: function (id, op, dt, callback, start )
	{
		var o = document.getElementById(id);
		if(start == null)
			o.style.opacity = 1;
		o.style.opacity = parseFloat(o.style.opacity) - 0.5;
		if( o.style.opacity > op )
			setTimeout( function () { SoondaAnim.fadeOut( id, op, dt, callback, true ) }, dt  );
		else
			if(callback != null)
				callback();
	}
	,
	fadeIn: function (id, op, dt, callback, start)
	{
		var o = document.getElementById(id);
		if(start == null)
		{
			o.style.opacity = 0;
		}
		o.style.opacity = parseFloat(o.style.opacity) + 0.01;
		//alert(o.style.opacity);
		if( parseFloat(o.style.opacity) < op )
			setTimeout( function () { SoondaAnim.fadeIn( id, op, dt, callback, true ) }, dt  );
		else
			if(callback != null)
				callback();
	}
	,
	slide: function (id, x1, y1, x2, y2, speed, callback, start)
	{
		var o = document.getElementById(id);
		var opx = 1;
		var opy = 1;

		opx = (x2 > x1) ? 1 : -1;
		opy = (y2 > y1) ? 1 : -1;

		if(start == null)
		{
			o.style.position = "relative";
			o.style.left = x1;
			o.style.top = y1;
		}

		//alert( o.style.left + "===" + o.style.top );
		var ok = true;
		if( opx * parseFloat(o.style.left) < opx * x2 )
		{
			o.style.left = parseFloat(o.style.left) + opx * 3;
			ok = false;
		}

		if( opy * parseFloat(o.style.top) < opy * y2 )
		{
			o.style.top = parseFloat(o.style.top) + opy * 3;
			ok = false;
		}
		//alert( o.style.left + "===" + o.style.top );
				
		
		if(ok == false)
			setTimeout( function () { SoondaAnim.slide ( id, x1, y1, x2, y2, speed, callback, true  ); }, speed );
		else
			if(callback != null)
				callback();
		
	}
	,
	rollover: function ( id, imgs, speed, idx )
	{
		if(idx == null || idx == imgs.length)
			idx = 0;

		var o = document.getElementById(id);
		if(o.childNodes.length > 0)
			o.removeChild(o.childNodes[0]);
		if(o.childNodes.length > 0)
			o.removeChild(o.childNodes[0]);
		if(o.childNodes.length > 0)
			o.removeChild(o.childNodes[0]);
		if(o.childNodes.length > 0)
			o.removeChild(o.childNodes[0]);

		var img = document.createElement("img");
		img.src = imgs[idx].ImageFile;
		img.className = "rollover-img";
		img.id = "imgRollover";
		o.appendChild( img );

		var txt = document.createElement("div");
		txt.innerHTML = imgs[idx].ImageText;
		txt.className = "rollover-txt";
		txt.id = "divRollover";
		txt.style.position = "absolute";
		txt.style.left = "0px";
		txt.style.bottom = "0px";
		o.appendChild( txt );
		idx++;

		var r = Math.floor((Math.random()*3)+1);	

		//r = 6;
		if(r == 1)
		{
			SoondaAnim.fadeIn( "imgRollover", 1, 10, 
				function ()
				{
					setTimeout ( function () { SoondaAnim.rollover( id, imgs, speed, idx  ); }, speed );
				}
			);
		}
		else if(r == 2)
		{
			/*var x1 = parseFloat(Soonda.getCSS( id, "left" )) + 400;
			var y1 = parseFloat(Soonda.getCSS( id, "top" )) ;
			var x2 = parseFloat(Soonda.getCSS( id, "left" )) ;
			var y2 = parseFloat(Soonda.getCSS( id, "top" )) ;

			SoondaAnim.slide( "imgRollover", x1, y1, x2, y2, 1,  
				function ()
				{
					setTimeout ( function () { SoondaAnim.rollover( id, imgs, speed, idx  ); }, speed );
				}
			);
			*/
			SoondaAnim.fadeIn( "imgRollover", 1, 10, 
				function ()
				{
					setTimeout ( function () { SoondaAnim.rollover( id, imgs, speed, idx  ); }, speed );
				}
			);
		}
		else
		{
			//var w = Soonda.getCSS( "imgRollover", "width"  );
			//var f = parseFloat(w) / 5;
			//alert(f);
			//img.style.width = "5px";
			SoondaAnim.fadeIn( "imgRollover", 1, 10, 
				function ()
				{
					setTimeout ( function () { SoondaAnim.rollover( id, imgs, speed, idx  ); }, speed );
				}
			);
			/*SoondaAnim.zoomIn( "imgRollover", 117, 10,  
				function ()
				{
					setTimeout ( function () { SoondaAnim.rollover( id, imgs, speed, idx  ); }, speed );
				}
			);*/
		}		
	}
	
}

DefaultAnimator = 
{
	elementId: "",
	start: function ()
	{
		document.getElementById(DefaultAnimator.elementId).style.display = "inline";
		document.body.style.opacity = "0.9";
	}
	,
	stop: function ()
	{
		document.getElementById(DefaultAnimator.elementId).style.display = "none";
		document.body.style.opacity = "1";
	}
}





