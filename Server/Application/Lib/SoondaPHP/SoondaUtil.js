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
	loadJsCssFile: function(filename, filetype){
		 if (filetype=="js"){ //if filename is a external JavaScript file
		  var fileref=document.createElement('script')
		  fileref.setAttribute("type","text/javascript")
		  fileref.setAttribute("src", filename)
		 }
		 else if (filetype=="css"){ //if filename is an external CSS file
		  var fileref=document.createElement("link")
		  fileref.setAttribute("rel", "stylesheet")
		  fileref.setAttribute("type", "text/css")
		  fileref.setAttribute("href", filename)
		 }
		 if (typeof fileref!="undefined")
		  document.getElementsByTagName("head")[0].appendChild(fileref)
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
	showElement: function ( tabName, contentName, classNameForTab, classNameForContent, selectedClassName )
	{
		var line = "";
		try
		{
			line = 1;
			var oTab = document.getElementById( tabName );
			line = 2;
			var oContent = document.getElementById( contentName );
			line = 3;
			//alert( classNameForTab);
			var oTabs = Soonda.getByClass( classNameForTab );
			line = 4;
			var oContents = Soonda.getByClass( classNameForContent );
			line = 5;
			for(var i = 0; i < oTabs.length; i++)
			{
				var o = oTabs[i];
				o.className = classNameForTab;
			}
			line = 6;
			for(var i = 0; i < oContents.length; i++)
			{
				var o = oContents[i];
				o.style.display = "none";
			}
			line = 7;
			oTab.className = classNameForTab + " " + selectedClassName;
			line = 8 ;
			oContent.style.display = "inline";
		}
		catch (e)
		{
			alert("Soonda.showElement: " + e.message + " " + line);
		}

	}
	,
	getByClass: function (matchClass) {
		var elems = document.getElementsByTagName('*'), i;
		var arrElems = new Array();
		for (var i in elems) {
			
			if(('' + elems[i].className + '').indexOf('' + matchClass + '')
					> -1) {
				//return elems[i];
				//elems[i].innerHTML = content;
				//alert(elems[i].className + "-" + matchClass);
				arrElems.push( elems[i] );
			}
		}

		return arrElems;
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
		//Soonda.alert(oSel1);

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
	deleteLayoutGroup: function (moduleName, cmbLayout, oDefaultAnimatorContent, component)
	{
		var cmb = document.getElementById( cmbLayout );
		var idGroup = cmb.options[cmb.selectedIndex].value;
		Soonda.loadModule( moduleName, "deleteFieldGrouping", "idgroup=" + idGroup, oDefaultAnimatorContent, true, component );
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
	loadModule : function ( moduleName, task, otherParam, animObject, componentOnly, componentName )
	{

		if(animObject == null)
			animObject = Soonda._animObject;
		
		try
		{
			if(componentOnly == null)
				componentOnly = false;

			try
			{
				//alert(animObject.start);
				if(animObject != null)
				{
					animObject.start();	
				}
			}
			catch (err)
			{
				alert("Anim Object Error : " + err.message);
			}

			
			var url = 'index.php?ajax=1';

			if(moduleName != null && moduleName.length > 0)
				url += '&module=' + moduleName;
			else
				url += "&firstload=1";

			if(Soonda.currentModuleName == "")
				Soonda.currentModuleName = moduleName;

			
			if(task != null && task.length > 0)
			{
				if( componentName != null)
					url += '&component=' + componentName + '&task' + componentName + '=' + task;
				else
					url += '&task' + moduleName + '=' + task;
			}
			
			url += "&currentmodule=" + Soonda.currentModuleName;
		

			if(componentOnly && Soonda.currentModuleName == moduleName && otherParam.indexOf("simple=") == -1 && otherParam.indexOf("TemplateChange=1") == -1 )
				url += '&simple=true';

			//url += "&" + otherParam;	
			
			
		}
		catch (eLoadModule)
		{
			alert("loadModule Error : " + eLoadModule.message);
		}

		//alert(Soonda.currentModuleName + "===" + moduleName);

		//location = url;			
		
		if( (Soonda.currentModuleName != moduleName && otherParam.indexOf("TemplateChange=0") == -1) || otherParam.indexOf("TemplateChange=1") > -1 )
		{
			//alert("oyyy");
			location = url + "&" + otherParam;			
		}
		else
		{
			url += "&" + otherParam;
			//alert(url);
			
			try
			{
				Soonda.currentModuleName = moduleName;
				jx.load( url,
					function (data)
					{
						try
						{
							//alert(data);
							if(data.toLowerCase().indexOf("php_error") > -1 || data.toLowerCase().indexOf("php_warning") > -1 || data.toLowerCase().indexOf("php_notice") > -1)
							{
								var serr = "";
								if(data.toLowerCase().indexOf("php_error") > -1)
									serr = data.substring(0, data.toLowerCase().indexOf("<-|->"));
								else 
									serr = data.substring(0, data.toLowerCase().indexOf("<-|->"));	
								
								if(serr == "")
									serr = data.substring(data.toLowerCase().indexOf("error"), data.length);

								if(serr == "")
									serr = data.substring( data.toLowerCase().indexOf("warning"), data.length);

								if(serr == "")
									serr = data.substring( data.toLowerCase().indexOf("notice"), data.length);
								//alert(serr);
								SooDialog.alert(serr);
								
							}
							else
							{	
								loc = "before parse and set";
								Soonda.parseAndSet( data );
							}
							loc = "before toajaxlink";
							Soonda.toAjaxLink();
							//alert(data);
								
						}
						catch (e)
						{
							SooDialog.alert(e.message + " " + loc + " , Data : " + data.encodeHTML() );
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
			catch (eeee)
			{
				alert(eeee.message);
			}
		}
	}
	,
	loadModuleByFilter: function (moduleName, task, cmbTotalDisplayName, cmbPageName, cmbLayoutName, cmbSummaryName, cmbGraphTypeName, txtCondition, sender, animObject, component)
	{
		try
		{
			

			
			if(sender != null && cmbTotalDisplayName == sender.id)
			{
				var cmbPage = document.getElementById(cmbPageName);
				cmbPage.selectedIndex = 0;
			}
			
			var filter = Soonda.createFilterParam(cmbTotalDisplayName, cmbPageName, cmbLayoutName, cmbSummaryName, cmbGraphTypeName);
			
			if( document.getElementById(txtCondition) != null && document.getElementById(txtCondition).value != "")
				filter += "&condition=" + document.getElementById(txtCondition).value;
			
			Soonda.loadModule(moduleName, task, filter, animObject, true, component);
		}
		catch (e)
		{
			alert("error load module by filter : " + e.message );
		}
	}
	,
	loadModuleDelete: function ( moduleName, task, otherParam, animObject, componentOnly, component )
	{
		Soonda._moduleName = moduleName;
		Soonda._task = task;
		Soonda._otherParam = otherParam;
		Soonda._animObject = animObject;
		Soonda._componentOnly = true;
		Soonda._Component = component;
		
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
	confirm: function( s, yesCallback, noCallback )
	{
		if(Soonda._winLoad == false)
		{
			REDIPS.dialog.init();               // initialize dialog
			Soonda._winLoad = true;
		}

		
		REDIPS.dialog.op_high = 40;         // set maximum transparency to 40%
		REDIPS.dialog.fade_speed = 1;      // set fade spead (delay is 18ms)
		//REDIPS.dialog.close_button = 'x'; // close button definition
		REDIPS.dialog.show(400, 130, s, 'Yes|' + yesCallback, 'Cancel|' + noCallback)
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
				try
				{
					
					if( elm.type == "checkbox" )
					{
						if(elm.checked)
						{
							
							if(elm.getAttribute("checkedvalue") != null)
							{
								postQuery += elm.getAttribute("data") + eq + elm.getAttribute("checkedvalue").EncodeHTML() + and;
								std += "<td>" + elm.getAttribute("checkedvalue") + "</td>";
							}
							else
							{
								postQuery += elm.getAttribute("data") + eq + "1" + and;
								std += "<td>" + "1" + "</td>";
							}
						
						}
						else
						{
							var sr = "0";

							if(elm.getAttribute("uncheckedvalue") != null)
								sr = elm.getAttribute("uncheckedvalue").EncodeHTML();
							sr = sr.replace(/0Na/gi, "0");
							std += "<td>" + sr + "</td>";
							postQuery += elm.getAttribute("data") + eq + sr + and;
						}
						
					}
					else if( elm.type == "radio" )
					{
						if(elm.checked)
						{
							std += "<td>" + elm.value + "</td>";
							postQuery += elm.getAttribute("data") + eq + elm.value.EncodeHTML() + and;
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
						var ss = elm.getAttribute("data") + eq + elm.value.EncodeHTML();
						//alert(ss);
						postQuery += elm.getAttribute("data") + eq + elm.value.EncodeHTML() + and;
					}
				}
				catch (ee)
				{
					alert("Error getPostParamFromInput : " + elm.id + " -> " + ee.message);
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
	saveModule: function  ( moduleName, task, otherParam, formId, animObject, component )
	{
		try
		{
			Soonda.SetTextAreas();
		}
		catch (eArea)
		{
			alert("Error set text area : " + eArea.message);
		}
	
		if(otherParam != null)
			otherParam = "&" + otherParam;

		var postQuery = "";
		try
		{
			postQuery = Soonda.getPostParamFromInput( formId ) + otherParam;
		}
		catch (epost)
		{
			alert("error get post query : " + epost.message);
		}

		Soonda.loadModule( moduleName, task, postQuery, animObject, true, component);
	}
	,
	displayInvalidInput: function ( formId, lbl, err)
	{
		var form = document.getElementById( formId);
		var divs = form.getElementsByTagName( "div" );

		for(var i = 0; i < divs.length; i++)
		{
			var elm = divs[i];
			if( elm != null && elm.id.indexOf("lblInvalid") > -1)
			{
				elm.innerHTML = "";
			}
		}
		
		if(document.getElementById( lbl ) != null)
			document.getElementById( lbl ).innerHTML = err;
		else
			alert(err);
	}
	,
	editDetailItem: function  ( formId, tblName, moduleName, childModuleName, rIdx, childCompName, animObject )
	{
		var editedInput = document.getElementById("txtDetail" + childModuleName + "_" + rIdx);
		var idx = editedInput.value.indexOf("addnew");
		
		var sAddNew = editedInput.value.substr(idx, 14);
		var postQuery = Soonda.getPostParamFromInput(formId, false, true);	
		postQuery += "[and]" + sAddNew;
		var sTd = Soonda.getPostParamFromInput( formId, true );
		Soonda.SetTextAreas();
		
		var sInput = "<input type='hidden' data='detailRow_" + rIdx + "' id='txtDetail" + childModuleName + "_" + rIdx + "' name='txtDetail" + childModuleName + "_" + rIdx + "' value='" + postQuery + "' >";
		sInput += "<input type='button' value='---' id='btnEditDetail' onclick=\"Soonda.saveModule('" + moduleName + "', 'editChild', 'child=" + childCompName + "&width=800&height=500&hidebuttons=btnSaveWrapper,btnBackWrapper&detailtablename=" + tblName + "&ridx=" + rIdx + "', '" + formId + "', DefaultAnimatorContent );\"><input type='button' value=' x ' id='btnDeleteDetail' onclick=\"Soonda.removeDetailItem('" + tblName + "', 'detailTr" + rIdx + "', 'txtDetail" + tblName + "_" + rIdx + "');\">";
		sTd += "<td width='60px'>" + sInput + "</td>";
		document.getElementById("detailTr" + rIdx).innerHTML = sTd;		
		//REDIPS.dialog.hide('undefined');
		Soonda.closeCurrentDialog();
	}
	,
	addDetailItem: function  ( formId, tblName, moduleName, childModuleName, childCompName, animObject )
	{
		try
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
		}
		catch (eAddDetailItem1)
		{
			Soonda.alert("Error Add Detail Item 1: " + eAddDetailItem1.message);
		}


		try
		{
			var postQuery = Soonda.getPostParamFromInput(formId, false, true);	
			postQuery += "[and]addnew[equal]1";

			var sTd = Soonda.getPostParamFromInput( formId, true );			
		}
		catch (eAddDetailItem2)
		{
			Soonda.alert("Error Add Detail Item 1: " + eAddDetailItem2.message);
		}

		try
		{

			Soonda.SetTextAreas();
			var sInput = "<input type='hidden' data='detailRow_" + counter + "' id='txtDetail" + childModuleName + "_" + counter + "' name='txtDetail" + childModuleName + "_" + counter + "' value='" + postQuery + "' >";
			sInput += "<input type='button' value='---' id='btnEditDetail' onclick=\"Soonda.saveModule('" + moduleName + "', 'editChild', 'child=" + childCompName + "&width=800&height=500&hidebuttons=btnSaveWrapper,btnBackWrapper&detailtablename=" + tblName + "&ridx=" + counter + "', '" + formId + "', DefaultAnimatorContent );\"><input type='button' value=' x ' id='btnDeleteDetail' onclick=\"Soonda.removeDetailItem('" + tblName + "', 'detailTr" + counter + "', 'txtDetail" + tblName + "_" + counter + "');\">";
			sTd += "<td width='60px'>" + sInput + "</td>";
			var sTr = "<TR id='detailTr" + counter + "'>" + sTd + "</TR>" ;
			document.getElementById(tblName).innerHTML += sTr;				
		}
		catch (eAddDetailItem3)
		{
			Soonda.alert("Error Add Detail Item 3: " + eAddDetailItem2.message);
		}

		Soonda.closeCurrentDialog();

		//REDIPS.dialog.hide('undefined');
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

		try
		{

			var cmbPageLimit = document.getElementById(cmbTotalDisplayName);
			var limit = (cmbPageLimit == null) ? 20 : cmbPageLimit.options[cmbPageLimit.selectedIndex].value;
			var layoutId = (document.getElementById(cmbLayoutName) == null) ? -1 : document.getElementById(cmbLayoutName).options[document.getElementById(cmbLayoutName).selectedIndex].value;
			if( cmbSummaryName != null)
				summaryId = document.getElementById(cmbSummaryName).options[document.getElementById(cmbSummaryName).selectedIndex].value;


			if( cmbGraphTypeName != null)
			{
				graphType = ( document.getElementById(cmbGraphTypeName) == null || document.getElementById(cmbGraphTypeName).options == null ) ? 0 : document.getElementById(cmbGraphTypeName).options[document.getElementById(cmbGraphTypeName).selectedIndex].value;			
			}

			var cmbPage = document.getElementById(cmbPageName);
			var page = (cmbPage == null) ? 0 : cmbPage.options[cmbPage.selectedIndex].value;
		


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

		}
		catch (eFilter)
		{
			Soonda.alert("Error create filter param: " + eFilter.message);
		}

		return filter;
	}
	,
	yesClick: function ()
	{
		Soonda.loadModule( Soonda._moduleName, Soonda._task, Soonda._otherParam, Soonda._animObject, Soonda._componentOnly, Soonda._Component);
	}
	,
	parseAndSet : function ( sData)
	{
		//alert(sData);
		if( sData.indexOf( "<:nochange:>") == -1)
		{
			if(sData.indexOf("<<||>>") != -1)
			{
				var elmValues = sData.split("<<||>>");
				for(var i = 0; i < elmValues.length; i++)
				{	
					var elmValue = elmValues[i]; 
					if(elmValue.length > 0)
					{
						var tmp = elmValue.split("<-|->");
						var o = document.getElementById( tmp[0] );
						//Soonda.alert(tmp[0] + " " + tmp[1].DecodeHTML() );
						//if(tmp[1] != null)
						o.innerHTML = tmp[1].DecodeHTML();
					}
				}
			}
			else
			{
					var elmValue = sData; 
					if(elmValue.length > 0)
					{
						var tmp = elmValue.split("<-|->");
						var o = document.getElementById( tmp[0] );
						//Soonda.alert(tmp[0] + " " + tmp[1].DecodeHTML() );
						//if(tmp[1] != null)
						o.innerHTML = tmp[1].DecodeHTML();
					}
			}
		}

		Soonda.runScripts( sData);
	}
	,
	runScripts: function(sData)
	{
		//alert(sData);
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
				try
				{
					//Execute the script.
					if(sScriptSpec != null && sScriptSpec != "")
					{
						eval( sScriptSpec + "");
						//alert( sScriptSpec );
					}
				}
				catch (ee)
				{
					Soonda.alert("Script Execution error : " + ee.message + " " + sScriptSpec );
					//document.writeln("Script Execution error : " + ee.message + " " + sScriptSpec );
				}


				//Check if the script code has been loaded to the document. If it is a function source code, we need to do this.
				/*
				//Forget it, the script is automatically execute when added! It will be executed twice!
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
					//document.getElementsByTagName('head')[0].appendChild(script);
				}*/

				//Find another script tag
				var sFull = "<script>" + sScriptSpec + "</script>";
				idx = sss.indexOf(sFull);
				idx += sFull.length;
				sss = sss.substr( idx, sss.length - idx );
				sScriptSpec =  sss.between("<script>","</script>");	
			}
			catch (e)
			{
				Soonda.alert("error " + e.message);
			}

		}
		

		for(var i = 1; i < 20; i++)
		{
			var sScriptSpec =  sData.between("<script id='" + i + "'>","</script>");
			if(sScriptSpec != null && sScriptSpec != "")
			{
						eval( sScriptSpec + "");
			}
		}

		var sScript = sData.between("<div id='divScript'>","</div>");

		//Soonda.alert(sScript);
		if(sScript != "")
		{			eval( sScript + " defaultOnLoad();");
			//var divScript = document.getElementById( "divScript" );
			var divs = document.getElementsByTagName( "div" );
			//Soonda.alert(divs.length);
			for(var i = 0 ; i < divs.length; i++)
			{
				var div = divs[i];
				//Soonda.alert(div.id);
				if(div.id == "divScript")
				{
					//Soonda.alert(div.innerHTML);
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
		try
		{
			var button = document.getElementById(btn);  //$('#' + btn);
			var interval = 0;
		}
		catch (err)
		{
			alert(err.message);
		}

		//alert(serverUrl);
		
		new AjaxUpload(button, 
		{
				action: serverUrl, 
				name: 'myfile',
				onSubmit : function(file, ext)
				{
					try
					{
						
						// change button text, when user selects file			
						button.value = 'Uploading';
										
						// If you want to allow uploading only 1 file at time,
						// you can disable upload button
						this.disable();
						
						// Uploding -> Uploading. -> Uploading...
						interval = window.setInterval(function()
						{
							var text = button.value;
							if (text.length < 13){
								button.value = text + '.';					
							} else {
								button.value = 'Uploading';				
							}
						}, 200);
					}
					catch (eFileSubmit)
					{
						alert("error file submit : " + eFileSubmit.message);
					}

				}
				,
				onComplete: function(file, response)
				{
					
					button.value = 'Uploaded';
					window.clearInterval(interval);
								
					// enable upload button
					this.enable();
					
					//alert(response);
					// add file to the list	
					if(response.toLowerCase().indexOf("php_error") == -1 && response.toLowerCase().indexOf("php_warning") == -1)
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
					else 
						alert("error saving file : " + response);
				}
		});
	}
	,
	changeDateValue: function (ctrlName)
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
	sortBy: function (fieldname, direction, moduleName, task, cmbTotalDisplayName, cmbPageName, cmbLayoutName, cmbSummaryName, cmbGraphTypeName, txtCondition, sender,  animObject, component)
	{
		Soonda._sortBy = fieldname;
		Soonda._sortDirection = direction;
		Soonda.loadModuleByFilter(moduleName, task, cmbTotalDisplayName, cmbPageName, cmbLayoutName, cmbSummaryName, cmbGraphTypeName, txtCondition, sender, animObject, true, component);
	}
	,
	exportToPDF: function (container, moduleName, cmbTotalDisplayName, cmbPageName, cmbLayoutName, txtCondition, animObject, component)
	{
		//var oContainer = document.getElementById( container);
		//var html = oContainer.innerHTML;
		//var param = "exportdata=" + html.EncodeHTML();

		var filter = Soonda.createFilterParam(cmbTotalDisplayName, cmbPageName, cmbLayoutName, null);
		if( document.getElementById(txtCondition).value != "")
			filter += "&condition=" + document.getElementById(txtCondition).value;
		Soonda.loadModule(moduleName, "exportpdf", filter, animObject, true, component);
	}
	,
	exportToExcel: function (container, moduleName,  cmbTotalDisplayName, cmbPageName, cmbLayoutName, txtCondition, animObject, component)
	{
		var oContainer = document.getElementById( container);
		var html = oContainer.innerHTML;
		
		var param = "exportdata=" + html.EncodeHTML();
		Soonda.loadModule(moduleName, "exportxls", param, animObject, true, component);
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
	currentDialog: null
	,
	showDialogWindow: function(sData, w, h, callback)
	{
		if(sData != null)
			sData = sData.DecodeHTML();
		Soonda.currentDialog = SoondaDialog.show(sData, 800, 600, callback);

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
	closeCurrentDialog: function()
	{
		if( Soonda.currentDialog != null)
			Soonda.currentDialog.close();
	}
	,
	alert: function (s)
	{

		var win = SoondaDialog.show("<b><div style='padding-top:20px;text-align:center'>" + s + "</div></b>", 500, 260);
		var btn = document.createElement("button");
		btn.value = "     Ok      ";
		btn.innerHTML = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ok&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
		btn.style.padding = "6px";
		btn.style.position = "absolute";
		btn.style.left = "40%";
		btn.style.top = "80%";
		btn.style.width = "18%";
		btn.style.textAlign = "center";
		btn.parentWin = win;
		btn.onclick = function () { this.parentWin.close();  }
		win.appendChild(btn);

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
		var sLink = "Soonda.loadModule(\"{modulename}\", \"{taskmodule}\", \"{otherparam}\", {DefaultAnimator}, true, '{component}');";
		var sModuleName = "";
		var sTask = "";
		var sOtherParam = "";
		var sComponent = "";
		var defaultAnimator = "DefaultAnimatorContent";

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
					else if(variable == "component")
						sComponent = value;
					else if(variable == "DefaultAnimator")
						defaultAnimator = value;
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
				sLink = sLink.replace( "{component}", sComponent);
				sLink = sLink.replace( "{DefaultAnimator}", defaultAnimator);
				//Soonda.alert(sLink);
				return sLink;
			}
			else
			{
				return url;
			}
		}
		catch (e)
		{	
			Soonda.alert(e.message + " at " + url);
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
			//alert(url.getAttribute( "noconvert" ));
			if( url.indexOf( "javascript:" ) == -1 && oLinks[i].getAttribute( "noconvert" ) != "yes" )
			{
				var newUrl = Soonda.convertLink(url);
				//oLinks[i].href = "javascript:" + newUrl;
				oLinks[i].data = newUrl;
				//alert(newUrl);
				if(oLinks[i].onclick == null)
					oLinks[i].onclick = function () { eval(this.data); return false; };
					
				//"" + newUrl + "; return false";
			}
		}
	}
	,
	openAjax: function ( url, callback)
	{
		try
		{
			jx.load( url,
			function (data)
			{
				if(callback != null)
					callback( data );
			});		
		}
		catch (eee)
		{
			alert("Open Ajax : " + eee.message);
		}

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
	isRolling: false,
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
		
		if( zoomedId != null && zoomedId.beingZoomed == true && (parseInt(o.style.width) < zoomedId.maxW &&  parseInt(o.style.height) < zoomedId.maxH) )
		{
			
			var w = (parseInt(o.style.width) + zoomedId.deltaW);
			var h = (parseInt(o.style.height) + zoomedId.deltaH);
			
			if( parseInt(o.style.width) < zoomedId.maxW )
			{
				o.style.width = w + "px";
			}

			if( parseInt(o.style.height) < zoomedId.maxH )
			{
				o.style.height = h + "px";
			}

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
		else
			o.style.opacity = start;
		o.style.opacity = parseFloat(o.style.opacity) + 0.05;
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
		try
		{
			var o = document.getElementById(id);
			var opx = 1;
			var opy = 1;

			opx = (x2 > x1) ? 1 : -1;
			opy = (y2 > y1) ? 1 : -1;
			//alert(x1);

			if(start == null)
			{
				o.style.position = "relative";
				o.style.left = x1 + "px";
				o.style.top = y1 + "px";
			}

			//alert( parseFloat(o.style.left) + "===" + o.style.top );
			var ok = true;
			
			if( opx * parseFloat(o.style.left) < opx * x2 )
			{
				//alert( opx * parseFloat(o.style.left) + opx * 3 " ==== " + opx * x2);
				o.style.left = parseFloat(o.style.left) + opx * 3 + "px";
				ok = false;
			}

			if( opy * parseFloat(o.style.top) < opy * y2 )
			{
				o.style.top = parseFloat(o.style.top) + opy * 3 + "px";
				ok = false;
			}
			//alert( o.style.left + "===" + o.style.top );			
		}
		catch (eslid)
		{
			alert("Error slide : " + eslid.message);
		}

				
		
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

		var r = Math.floor((Math.random()*2)+1);	

		//r = 6;
		if(r == 1)
		{
			SoondaAnim.fadeIn( "imgRollover", 1, 100, 
				function ()
				{
					setTimeout ( function () { SoondaAnim.rollover( id, imgs, speed, idx  ); }, speed );
				}
			);
		}
		else if(r == 2)
		{
			var x1 = parseFloat(Soonda.getCSS( id, "left" )) + 400;
			var y1 = parseFloat(Soonda.getCSS( id, "top" )) ;
			var x2 = parseFloat(Soonda.getCSS( id, "left" )) ;
			var y2 = parseFloat(Soonda.getCSS( id, "top" )) ;

			SoondaAnim.slide( "imgRollover", x1, y1, x2, y2, 1,  
				function ()
				{
					setTimeout ( function () { SoondaAnim.rollover( id, imgs, speed, idx  ); }, speed );
				}
			);
			/*
			SoondaAnim.fadeIn( "imgRollover", 1, 10, 
				function ()
				{
					setTimeout ( function () { SoondaAnim.rollover( id, imgs, speed, idx  ); }, speed );
				}
			);*/
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

DefaultAnimatorContent = 
{
	elementId: "",
	start: function ()
	{
		document.getElementById(DefaultAnimatorContent.elementId).style.display = "inline";
		document.body.style.opacity = "0.8";
	}
	,
	stop: function ()
	{
		document.getElementById(DefaultAnimatorContent.elementId).style.display = "none";
		document.body.style.opacity = "1";
	}
}

var SooDialog =
{
	yesCallback: null,
	noCallback: null,
	box: null,
	confirm: function (text, yesCallback, noCallback)
	{
		SooDialog.yesCallback = yesCallback;
		SooDialog.noCallback = noCallback;
		
		
		dhtmlx.modalbox({
			title:"Confirmation",
			text: text,
			buttons:["Yes", "No"],
			callback: SooDialog.confirmResult
		});
	}
	,
	confirmResult: function (res)
	{
		if(res == 0)
			SooDialog.yesCallback();
		else
			SooDialog.noCallback();
	}
	,
	alert: function (text, yesCallback)
	{
		try
		{
			SooDialog.yesCallback = yesCallback;
			box = dhtmlx.modalbox({
				title:"Info",
				text: text,
				buttons:["Ok"],
				callback: SooDialog.alertResult
			});			
		}
		catch (err)
		{
			alert(err.message);
		}

	}
	,
	alertResult: function (res)
	{
		if(res == 0)
			SooDialog.yesCallback();
	}
	,
	showWindow: function (text, w, h)
	{
		try
		{
			if( w == null)
				w = "50%";

			if( h == null)
				h = "auto";

			if(text != null)
				text = text.DecodeHTML();
			
			SooDialog.box = dhtmlx.modalbox({
				title:"Add",
				text: text,
				width: w,
				height: 'auto',
				buttons:["Close"]
				
			});

			Drag.init( SooDialog.box ); 
			
			if(text != null)
				Soonda.runScripts(text);			
		}
		catch (err)
		{
			alert("ShowWindow " + err.message);
		}

		
	}
	,
	close: function ()
	{
		dhtmlx.modalbox.hide(SooDialog.box);
		
	}
	
}


var SoondaDialog = 
{
	mainDiv: null,
	windows: null,
	coverDiv: null,
	show: function ( html, w, h, callback)
	{
		var wSize = SoondaDialog.getWindowSize();
		var wh = wSize.height;
		var ww = wSize.width;
		

		if(SoondaDialog.mainDiv == null)
		{
			try
			{
				SoondaDialog.windows = new Array();
				var div = document.createElement("div");
				div.id = "divMain";
				document.body.appendChild(div);
				SoondaDialog.mainDiv = div;
				
				var div = document.createElement("div");
				div.id = "divCover";
				div.style.position = "absolute";
				div.style.left = "0px";
				div.style.top = "0px";
				div.style.zIndex = "-5";
				div.style.backgroundColor = "#000";
				div.style.opacity = "0";
				document.body.appendChild(div);
				SoondaDialog.coverDiv = div;
			}
			catch (eSoonda1)
			{
				Soonda.alert("Error SoondaDialog 1 : " + eSoonda1.message );
			}

		}

		SoondaDialog.coverDiv.style.width = "100%";
		SoondaDialog.coverDiv.style.height = "200%";

		try
		{
			var divWin = document.createElement("div");
			
			divWin.id = "window" + SoondaDialog.windows.length;
			divWin.style.position="fixed";
			divWin.style.width =  w + "px";
			divWin.style.height = h + "px";
			divWin.style.borderStyle = "solid";
			divWin.style.borderWidth = "8px";
			divWin.style.borderColor = "#ccc";
			divWin.style.borderRadius = "10px";
			divWin.style.className = "popupWindow";
			divWin.style.backgroundColor = "#fff";
			divWin.callback = callback;
	
			divWin.style.top = "10%";
			divWin.style.left = "20%";
			
			//divWin.style.top = ((wh/2) - (h/2)) - (SoondaDialog.windows.length * 25) + "px";
			//divWin.style.left = (ww/2) - (w/2) + (SoondaDialog.windows.length * 25) + "px";

			divWin.style.zIndex = SoondaDialog.windows.length + 10;

			SoondaDialog.windows[ SoondaDialog.windows.length ] = divWin;
			SoondaDialog.mainDiv.appendChild(divWin);	
			//document.getElementById("window" + SoondaDialog.windows.length - 1).style.width = 1000 + "px";

			var divWinHead = document.createElement("div");
			divWinHead.style.width = "100%";
			divWinHead.style.height = "30px";
			divWinHead.style.backgroundColor = "#239";
			divWinHead.style.position = "absolute";
			divWinHead.style.left = "0px";
			divWinHead.style.top = "0px";
			divWinHead.style.borderRadius = "3px";
			divWinHead.style.opacity = 0.7;
			divWinHead.parent = divWin;
			divWin.appendChild(divWinHead);

			var divWinContent = document.createElement("div");
			divWinContent.style.width = "100%";
			divWinContent.style.height = (h - 30) + "px";
			divWinContent.style.overflow = "auto";
			divWinContent.style.backgroundColor = "#fff";
			divWinContent.style.position = "absolute";
			divWinContent.style.left = "0px";
			divWinContent.style.top = "30px";
			divWin.appendChild(divWinContent);
			divWinContent.innerHTML = html;

		}
		catch (eSoonda2)
		{
			Soonda.alert("Error SoondaDialog 2 : " + eSoonda2.message );
		}

		try
		{

			var divClose = document.createElement("div");
			divClose.innerHTML = "&nbsp;&nbsp;X&nbsp;&nbsp;";
			divClose.parentWin = divWin;
			divClose.onclick = function () { this.parentWin.close(); }
			divWin.appendChild( divClose);
			divClose.style.width = 20 + "px";
			divClose.style.height = 20 + "px";
			divClose.style.position = "absolute";
			divClose.style.left = "94%";
			divClose.style.top = 3  + "px";
			divClose.style.fontWeight = "bold";
			divClose.style.paddingTop = "5px";
			divClose.style.paddingLeft = "10px";
			divClose.style.cursor = "hand";
			divClose.style.backgroundColor = "transparent";
			divClose.callback = callback;	
			divClose.style.color = "#fff";

			divWinHead.onmousemove = function () 
			{ 
				if(this.doneInit == false)
					Drag.init( this.parent ); 
				this.style.cursor = "hand";  
				this.doneInit = true;
			};
			divWinHead.onmouseout = function () 
			{ 
				this.doneInit = false;
				Drag.unload( this.parent );  
			};


			SoondaDialog.coverDiv.style.opacity = 0.5;
			SoondaDialog.coverDiv.style.zIndex = 9;

			
			SoondaAnim.fadeIn( divWin.id, 1, 1, null, 0.1 );
			
		}
		catch (eSoonda3)
		{
			Soonda.alert("Error SoondaDialog 3 : " + eSoonda2.message );
		}


		divWin.close = function ()
		{
			try
			{
				var id = this.id;
				for(var i =0; i < SoondaDialog.windows.length; i++ )
				{
					var win = SoondaDialog.windows[i];
					if( win.id == id )
					{
						SoondaDialog.windows.splice( i, 1 );
						SoondaDialog.mainDiv.removeChild( this );
						if(SoondaDialog.windows.length == 0)
						{
							SoondaDialog.coverDiv.style.opacity = 0;
							SoondaDialog.coverDiv.style.zIndex = -5;
						}
						
						if(this.callback != null)
							this.callback();
						break;
					}

				}		
			}
			catch (eDialogClose)
			{
				Soonda.alert("Error Dialog close : " + eDialogClose.message );
			}

		}

		return divWin;
	}
	,
	getWindowSize: function ()
	{
		var winW = 630, winH = 460;
		if (document.body && document.body.offsetWidth) {
		 winW = document.body.offsetWidth;
		 winH = document.body.offsetHeight;
		}
		if (document.compatMode=='CSS1Compat' &&
			document.documentElement &&
			document.documentElement.offsetWidth ) {
		 winW = document.documentElement.offsetWidth;
		 winH = document.documentElement.offsetHeight;
		}
		if (window.innerWidth && window.innerHeight) {
		 winW = window.innerWidth;
		 winH = window.innerHeight;
		}
		return size.set( winW, winH );
	}
}


var size = 
{
	width: null,
	height: null,
	set: function (w, h)
	{
		size.width = w;
		size.height = h;
		return size;
	}
}


var tempX = 0;
  var tempY = 0;

  function getMouseXY(e) {
    if (IE) { // grab the x-y pos.s if browser is IE
      tempX = event.clientX + document.body.scrollLeft;
      tempY = event.clientY + document.body.scrollTop;
    }
    else {  // grab the x-y pos.s if browser is NS
      tempX = e.pageX;
      tempY = e.pageY;
    }  

    if (tempX < 0){tempX = 0;}
    if (tempY < 0){tempY = 0;}  

	var arr = new Array();
	arr[0] = tempX;
	arr[1] = tempY;
	return arr;

  }

  

function loadGroupImages( data )
{
	//alert(data);
	var o = document.getElementById("divGalleryImageContainer");
	o.innerHTML = data;
}

function viewDetail( data )
{

	var o = document.getElementById("divGalleryWin");
	o.style.display = "inline";
	//o.style.width = "1px";
	//o.style.height = "1px";

	SoondaAnim.zoomIn("divGalleryWin", 60, 100, disp, data);
}

function disp( data )
{
	var o = document.getElementById("divGalleryWinContent");
	o.innerHTML = data;
	var o = document.getElementById("divDarker"); 
	o.style.display = "inline";
}

function light()
{
	var o = document.getElementById("divDarker"); 
	o.style.display = "none";
}

function fanbox_init(screen_name){document.getElementById('twitterfanbox').innerHTML='\<iframe name=\"fbfanIFrame_0\" frameborder=\"0\" allowtransparency=\"true\" src=\"http://s.moopz.com/connect.html?user='+screen_name+'\" class=\"FB_SERVER_IFRAME\" scrolling=\"no\" style=\"width: 300px; height: 250px; border-top-style: none; border-right-style: none; border-bottom-style: none; border-left-style: none; border-width: initial; border-color: initial; \"\>\<\/iframe\>';}


var pp =
{

	displayLookupData: function (cmb, moduleName, lookupTable, keyColumn, displayColumn)
	{
		var line = "";
		try
		{
			line = 1;
			var txt = document.getElementById("txtKeyword");
			line = 2;
			var tbl = document.getElementById("tblData");
			line = 3;
			var txtData = document.getElementById("txtData");
			line = 4;
			for(var i = tbl.rows.length; i > 0;i--)
			{
				tbl.deleteRow(i -1);
			}
			line = 5;
			//var displayedData = new Array();
			var keyword = txt.value;
			line = 6;
			var data = txtData.value.split("|");
			line = 7;
			var c = 0;
			for(var i = 0; i < data.length - 1; i++)
			{
				line = 8;
				var s = data[i];
				line = 9;
				
				if(s.toLowerCase().indexOf(keyword.toLowerCase()) > -1 || keyword == "" )
				{
					//displayedData.push(s);
					line = 10;
					var row = tbl.insertRow(c);
					line = 11;
					var ss = s.split(";");
					line = 12;
					var cell = row.insertCell(0);
					cell.width = "90%";
					line = 13;
					cell.innerHTML = ss[1];
					line = 14;
					var cell = row.insertCell(1);			
					cell.innerHTML = "<A href=\"javascript:pp.setCmb('" + cmb + "', '" + ss[0] + "', 'lookupTable=" + lookupTable + "&keyColumn=" + keyColumn + "&displayColumn=" + displayColumn + "&id=" + ss[0] + "')\">Select</A>";
					c++;
					
				}
			}
		}
		catch(e)
		{
			alert( line + " " + e.message);
		}
	}
	,
	setCmb: function (cmb, value)
	{
		try
		{
			var cmbb = document.getElementById(cmb);
			cmbb.value = value;
			SooDialog.close();
		}
		catch (err)
		{
			alert("setcmb: " + err.message);
		}
		
	}

}


