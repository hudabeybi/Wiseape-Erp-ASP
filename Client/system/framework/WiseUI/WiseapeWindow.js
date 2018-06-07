String.prototype.replaceAll = function(search, replacement) {
    var target = this;
    return target.replace(new RegExp(search, 'g'), replacement);
};

var WiseapeWindow = Class({
	app: null,
	title: null,
	id: null,
	name: null,
	url: null,
	core: null,
	desktopContainer: null,
	desktopContentContainer: null,
	option: null,
	win: null,
	tmpname: null,
	onClose: null,
	returnData: null,
	param: null,
	dontClose: null,
	uiRenderer: null,
	maxContentHeight: null,
	maxContentWidth: null,
	constructor: function (app, name, title, url, option)
	{
		//this.core = app.core;
		this.app = app;
		this.name = name;
		this.title = title;
		this.id = Util.createId(10);
		this.title = title;
		this.url = app.appPath + "/" + url;
		this.desktopContainer = this.app.desktop.mainContainer;
		this.desktopContentContainer = this.app.desktop.contentContainer;
		this.maxContentHeight = this.app.desktop.maxContentHeight;
		this.maxContentWidth = this.app.desktop.maxContentWidth;

		//alert("max width : " + this.maxContentWidth);

		if(option != null)
			this.option = option;
		else
			this.option = {};

		this.uiRenderer = this.app.desktop.uiRenderer;
		this.tmpname = "win_" + this.getFullId();
		eval("MEM." + this.tmpname + " = this;");
	}
	,
	onResizeEnd: function(me, win)
	{

	}
	,
	show: function(param, option)
	{
		var me = this;
		me.param = param;
		var url = me.url + "?id=" + Util.createId(10);

		if(option == null)
			option = {};
		me.option = $.extend({}, me.option, option);
		me.option.icon = me.app.icon;
		option = me.option;


		//Load page from url set in constructor during this object creation
		me.app.client.loadPage( url, function (content){

			//Process json to html if it is json
			content = me.processJsonContent(url, content);

			//Create window from uiRenderer defined in WiseUIConfig.js
			option.title = me.title;
			option.titleIsHtml = true;
			option.onResizeEnd = function(win)
			{
				me.onResizeEnd(me, win);
			}
			
			console.log("------option start-------------");
			console.log(option);
			me.win = me.uiRenderer.createWindow( me.desktopContentContainer, me.tmpname, content, option );
			me.uiRenderer.initialize();

			//Change controls names and ids, to show its belong to this window
			me.plugControls(me);

			//me.maximize();

			//Call onload method
			if(me.onLoad != null)
				me.onLoad(param);
		});
	}
	,
	processJsonContent: function(url, content)
	{
		var me  = this;
		var ss = url.split(".");
		var ext = ss[ss.length - 1];
		if(ext.indexOf("json") != -1)
		{
			content = me.renderJsonContent(me, content);
		}
		return content;
	}
	,
	renderJsonContent: function(me, jsonContent)
	{
		//console.log(jsonContent);
		jsonContent = jsonContent.replace(/(?:\r\n|\r|\n)/g, '');
		jsonContent = jsonContent.replace(/(?:\t)/g, '');
		console.log(jsonContent);
		jsonContent = JSON.parse(jsonContent);
		console.log("jsonContent");
		console.log(jsonContent);
		var html = this.uiRenderer.render( jsonContent );
		return html;
	}
	,
	afterShow: function()
	{

	}
	,
	getFullId: function()
	{
		return this.name + "_" + this.id; 
	}
	,
	setContent: function (me, content)
	{
		content = content.replaceAll("onclick='", "onclick='MEM." + me.getFullId() + ".");
		content = content.replaceAll("onchange='", "onchange='MEM." + me.getFullId() + ".");
		content = content.replaceAll("onkeypress='", "onkeypress='MEM." + me.getFullId() + ".");
		content = content.replaceAll("onkeydown='", "onkeydown='MEM." + me.getFullId() + ".");
		content = content.replaceAll("onclick=\"", "onclick=\"MEM." + me.getFullId() + ".");
		content = content.replaceAll("onchange=\"", "onchange=\"MEM." + me.getFullId() + ".");
		content = content.replaceAll("onkeypress=\"", "onkeypress=\"MEM." + me.getFullId() + ".");
		content = content.replaceAll("onkeydown=\"", "onkeydown=\"MEM." + me.getFullId() + ".");
		content = content.replaceAll("name='", "name='" + me.getFullId() + "_");
		content = content.replaceAll("id='", "id='" + me.getFullId() + "_");
		content = content.replaceAll("name=\"", "name=\"" + me.getFullId() + "_");
		content = content.replaceAll("id=\"", "id=\"" + me.getFullId() + "_");
		content = content.replaceAll("for=\"", "for=\"" + me.getFullId() + "_");
		content = content.replaceAll("for='", "for='" + me.getFullId() + "_");
		return content;
	} 
	,
	plugControls: function (me)
	{
		var elms = $("#win_" + me.getFullId() + "").find("[name]");
		$.each( elms, function( key, value ) {
			
			var oriid = $(value).attr("name");
			//alert(oriid);
			var id = oriid;
			
			$(value).attr("name", me.getFullId() + "_" + oriid );
			var sid = $(value).attr("id");
			id = id.replace(/-/gi, "_");
			var ss = "me." + id + " =  $(\"#" + sid + "\")[0];"; 
			eval(ss);
		});	
		
		var elms = $("#win_" + me.getFullId() + "").find("[id]");
		$.each( elms, function( key, value ) {
			
			var oriid = $(value).attr("id");
			//alert(oriid);
			var id = oriid;
			
			$(value).attr("id", me.getFullId() + "_" + oriid );
			var sid = $(value).attr("id");
			id = id.replace(/-/gi, "_");
			var ss = "me." + id + " =  $(\"#" + sid + "\")[0];"; 
			eval(ss);
		});	

		var elms = $("#win_" + me.getFullId() + "").find("[onclick]");
		$.each( elms, function( key, value ) {
			
			var oriid = $(value).attr("onclick");
			//alert(oriid);
			var id = oriid;
			$(value).attr("onclick", "MEM." + me.tmpname + "." + oriid );
		});	

		var elms = $("#win_" + me.getFullId() + "").find("[onchange]");
		$.each( elms, function( key, value ) {
			
			var oriid = $(value).attr("onchange");
			//alert(oriid);
			var id = oriid;
			$(value).attr("onchange", "MEM." + me.tmpname + "."  + oriid );
		});	

		
		var elms = $("#win_" + me.getFullId() + "").find("[onkeypress]");
		$.each( elms, function( key, value ) {
			
			var oriid = $(value).attr("onkeypress");
			//alert(oriid);
			var id = oriid;
			$(value).attr("onkeypress", "MEM." + me.tmpname + "."  + oriid );
		});	

		
		var elms = $("#win_" + me.getFullId() + "").find("[onkeydown]");
		$.each( elms, function( key, value ) {
			
			var oriid = $(value).attr("onkeydown");
			//alert(oriid);
			var id = oriid;
			$(value).attr("onkeydown", "MEM." + me.tmpname + "."  + oriid );
		});	

		var elms = $("#win_" + me.getFullId() + "").find("[onkeyup]");
		$.each( elms, function( key, value ) {
			
			var oriid = $(value).attr("onkeyup");
			//alert(oriid);
			var id = oriid;
			$(value).attr("onkeyup", "MEM." + me.tmpname + "."  + oriid );
		});	
	}
	,
	get: function (name)
	{
		return $("#" + this.getFullId() + "_" + name)[0];
	}
	,
	set: function (name, value)
	{
		$("#" + this.getFullId() + "_" + name).val( value );
	}
	,
	getInputForm: function(id)
	{
		var form = {};
		var elms = $("#" + this.getFullId() + "_" + id + "").find("[field]");
		$.each( elms, function( key, value ) {
			var oriid = $(value).attr("field");
			var val = $(value).val();
			var s = "form." + oriid + " = val;";
			//alert(s);
			eval(s);
		});			
		return form;
	}
	,
	setObjectForm: function (id, o)
	{
		var elms = $("#" + this.getFullId() + "_" + id + "").find("[field]");
		$.each( elms, function( key, value ) {
			var oriid = $(value).attr("field");
			var val = $(value).val();
			var s = "o." + oriid + " = val;";
			//alert(s);
			eval(s);
		});	

		return o;
	}
	,
	setInputForm: function(id, data)
	{
		var elms = $("#" + this.getFullId() + "_" + id + "").find("[field]");
		$.each( elms, function( key, value ) {
			var field = $(value).attr("field");
			
			var val = data[field];
			//alert(field + " = " + value);
			$(value).val(val);
		});			
	}
	,
	renderData: function ( data)
	{
		var id = this.tmpname;
		var html = document.getElementById(id).innerHTML;
		html = html.replace( /&gt;/gi, ">" );
		html = html.replace( /&lt;/gi, "<" );
		//alert(html);
		html = ejs.render(html, data);
		$("#" + id).html(html);
	}
	,
	clearForm: function (id)
	{
		var elms = $("#" + this.getFullId() + "_" + id + "").find("[field]");
		$.each( elms, function( key, value ) {
			var field = $(value).attr("field");
			//alert(field + " = " + value);
			$(value).val("");
		});	
	}
	,
	close: function ( returnData, close )
	{
		var me = this;
		me.returnData = returnData;
		if(me.onClose != null)
			me.onClose(me.returnData);

		if(close != false )
			me.uiRenderer.closeWindow(me.win);
		$("#" + me.tmpname).remove();
	}
	,
	maximize: function()
	{
		var me = this;
		var w = $("#" + me.desktopContentContainer).width();
		var h = $("#" + me.desktopContentContainer).height();
		//alert(me.maxContentWidth);
		me.uiRenderer.resizeWindow(me.win, w, h, 1);
		me.onResizeEnd();
	}
	,
	restore: function()
	{
		var me = this;
		var w = $("#" + me.desktopContentContainer).width();
		var h = $("#" + me.desktopContentContainer).height();
		//alert(me.maxContentWidth);
		me.uiRenderer.resizeWindow(me.win, me.uiRenderer.previousW, me.uiRenderer.previousH, 2);
		me.onResizeEnd();
	}
	,
	minimize: function()
	{
		var me = this;
		me.uiRenderer.hideWindow(me.win);
	}
	,
	height: function()
	{
		var h = $("#" + this.desktopContentContainer).height();
		return h;
	}
	,
	width: function()
	{
		var w = $("#" + this.desktopContentContainer).width();
		return w;
	}
	
});
