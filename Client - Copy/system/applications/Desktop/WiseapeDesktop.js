var WiseapeDesktop = Class(WiseapeApplication, {
	mainContainer: null,
	contentContainer: null,
	client: null,
	onApplicationIconClickEventHandler: null,
	uiRenderer: null,
	maxContentHeight: null,
	maxContentWidth: null,
	constructor: function(mainContainer)
	{
		this.mainContainer = mainContainer;
		this.contentContainer = "content-panel";
		WiseapeDesktop.$super.call(this, "appDesktop", "Desktop", "");

	}
	,
	createWindow: function (app, name, title, pageurl, option)
	{
		var win = new WiseapeWindow( app, name, title, pageurl, this.mainContainer, option);
		return win;
	}
	,
	run: function(client, appGroupConfigs)
	{
		this.client = client;
		var me = this;
		client.loadSystemPage("Desktop/html/index.html?id=" + Util.createId(5), function (html)
		{
			
			var html = Handlebar.render(html, { 'path' : client.config.path });
			$("#" + me.mainContainer).html(html);
			
			me.loadUiRenderer(me, UIConfig, function()
			{
				me.addCssAndScripts(me, function()
				{
					me.initDesktopEvents(me, appGroupConfigs);
					var w = $("#" + me.contentContainer).width();
					var h = $("#" + me.contentContainer).height();
					me.maxContentHeight = h;
					me.maxContentWidth = w;
					//alert(w);
				});
			});
		});
	}
	,
	initDesktopEvents: function(me, appGroupConfigs)
	{
		$(window).resize( function()
		{
			var w = $(".box-menu-icon-left").width();				
			$(".box-menu-icon-left").height(w);
			//$(".menu-background").height($(window).height());
		});

		me.displayApplicationGroups(me.client, appGroupConfigs);
		$("#menu-panel").toggle(300);	

		$("#home-button").click(function(){
			$("#menu-panel").toggle(300);			
		});

		$("#left-panel").mouseover(function(){
			$("#menu-panel").hide();			
		});
	}
	,
	loadUiRenderer: function(me, uiConfig, callback)
	{
		var uiconfig = UIConfig;
		var uilibfile = uiconfig.uiLibFile;
		var uiclass = uiconfig.uiLibClass;
		var files = new Array();
		files.push(uilibfile);

		me.injectFiles(files, function()
		{
			eval("me.uiRenderer = new " + uiclass + "();"); 
			var files = me.uiRenderer.getLibraryFiles();
			me.injectFiles(files, function()
			{
				if(callback != null)
					callback();
			});
		});
	}
	,
	displayApplicationGroups: function(client, appGroups)
	{
		var me = this;
		var menu = $("<ul id='left-menu'></ul>");
		for(var i  = 0; i < appGroups.length; i++)
		{	
			var appGroup = appGroups[i];
			var li = "<li><span><img src='" + appGroup.ApplicationGroupIcon + "' />&nbsp;&nbsp;&nbsp;" + appGroup.ApplicationGroupName + "</span>{menuItems}</li>";
			var menuItems = $("<ul></ul>");
			for(var j = 0; j < appGroup.ApplicationItems.length; j++)
			{
				var appItem = appGroup.ApplicationItems[j];
				if(appItem.IsDisplayed == 1)
				{
					var appItemLi = $("<li appId='" + appItem.IdApplication + "' class='app-item'><img src='" + appItem.ApplicationPath + "/" + appItem.ApplicationIcon + "' />&nbsp;&nbsp;&nbsp;" + appItem.ApplicationTitle + "</li>");
					$(menuItems).append(appItemLi);
				}
			}
			var html = $(menuItems).get(0).outerHTML;
			var lis = li.replace("{menuItems}", html);
			$(menu).append(lis);


		}
		
		$("#menu-panel").append(menu);
		$(menu).menu();
		$(".app-item").click(function()
		{
			var appId = $(this).attr("appId");
			var appItem = me.getApplicationById(appId, appGroups);
			$("#menu-panel").hide(300);
			me.onApplicationIconClickEventHandler(appItem);
		});
		//alert($("#menu-panel").html());
	}
	,
	getApplicationById: function(idApp, appGroups)
	{
		for(var i  = 0; i < appGroups.length; i++)
		{	
			var appGroup = appGroups[i];
			var li = "<li><span><img src='" + appGroup.ApplicationGroupIcon + "' />&nbsp;&nbsp;&nbsp;" + appGroup.ApplicationGroupName + "</span>{menuItems}</li>";
			var menuItems = $("<ul></ul>");
			for(var j = 0; j < appGroup.ApplicationItems.length; j++)
			{
				var appItem = appGroup.ApplicationItems[j];
				if(appItem.IdApplication == idApp)
					return appItem;
			}
		}

		return null;
	}
	,
	displayAppGroupIcons: function(client, appGroups)
	{
		$("#app-container").hide();
		$("#group-menu").show();
		$("#group-menu").html("");
		var me = this;
		for(var i = 0 ; i < appGroups.length; i++)
		{
			var appGroupInfo = appGroups[i];
			console.log(appGroupInfo);
			if(appGroupInfo.IsDisplay == true)
			{
				var appGroupIcon = this.createAppGroupItem( client, appGroupInfo, i + 1 );
				appGroupIcon.tag = appGroupInfo;
				$(appGroupIcon).click(
					function()
					{
						var appGroupInfo = this.tag;
						console.log("Opening Group ");
						console.log(appGroupInfo);

						$("#group-menu").hide("fast",function()
						{
							$("#app-container").show("fast", function ()
							{
								me.displayAppIcons(client, appGroupInfo.Processes);
							});
							
						});
					});
				$("#group-menu").append(appGroupIcon);
			}
		}
	}
	,
	displayAppIcons: function (client, processes)
	{
		$("#app-menu").html("");
		var me = this;
		
		for(var i = 0 ; i < processes.length; i++)
		{
			var processInfo = processes[i];
			console.log(processInfo);
			if(processInfo.Application.DisplayIcon == 1)
			{
				var appIcon = me.createAppMenuItem( client, processInfo.Application, i + 1 );
				appIcon.tag = processInfo;
				$(appIcon).click(
					function()
					{
						var processInfo = this.tag;
						console.log("Opening  " + processInfo.Application.ApplicationName);
						console.log(processInfo);
						
						$("#group-menu").hide();
						$("#app-container").hide("fast", function ()
							{
								if(me.onApplicationIconClickEventHandler != null)
									me.onApplicationIconClickEventHandler(processInfo);
							}
						);
					});
				$("#app-menu").append(appIcon);
			}
		}

		var w = $(".box-menu-icon-left").width();			
		$(".box-menu-icon-left").height(w);
	}
	,
	createAppGroupItem: function (client, appGroup, total)
	{
		//console.log(app);
		var appGroupPath = client.getAppUrl( appGroup.IconSmall) ;
		var appGroupIcon = appGroupPath;
		var appGroupName = appGroup.ProcessGroupName;
		var appGroupTitle = appGroup.ProcessGroupTitle;
		var appGroupDesc = appGroup.ProcessGroupInfo;
		var color = total;  
		 
		var html = "<div id=\"menu-item-" + appGroupName + "\" class=\"box-menu color" + color + "\">" + 
				"<div id=\"menu-item-icon-title-container-" + appGroupName + "\" class=\"box-menu-left\">" + 
					"<div id=\"menu-item-icon-" + appGroupName + "\" class=\"box-menu-icon-container\" style=\"background: url(" + appGroupIcon + ") no-repeat;background-size: 90% auto;\">"  + 
					"" + 
					"</div>" + 
					"<div id=\"menu-item-text-" + appGroupName + "\" class=\"box-menu-group-title\">" + 
					"" + appGroupTitle   + 
					"</div>" + 
				"</div>" + 
				"<div class=\"box-menu-right\">" + 
				"	<div class=\"box-menu-title\">" + 
				"		" + appGroupTitle  + 
				"	</div>" + 
				"	<div class=\"box-menu-text\">" + 
				"		" + appGroupDesc  + 
				"	</div>" + 
				"</div>" + 
			"</div>";
			
		var item = $(html);
		return item[0];
	}
	,
	createAppMenuItem: function(client, app, total)
	{
		//console.log(app);
		var appPath = client.getAppUrl( app.ApplicationIconLarge) ;
		var appIcon = appPath;
		var appName = app.ApplicationName;
		var appTitle = app.ApplicationTitle;
		var appDesc = app.ApplicationInfo;
		var color = total;
		 
		var html = "" + 
				"<div id=\"menu-item-icon-title-container-" + appName + "\" class=\"box-menu-icon-left\"><div class='circle'>" + 
					"<div id=\"menu-item-icon-" + appName + "\" class=\"box-menu-icon-container\" style=\"cursor: pointer; background: url(" + appIcon + ") no-repeat;background-size: 60% auto; background-position: center;\">"  + 
					"" + 
					"</div></div>" + 
					"<div id=\"menu-item-text-" + appName + "\" class=\"box-menu-icon-title\">" + 
					"" + appTitle   + 
					"</div>" + 
				"</div>";
			
		var item = $(html);
		return item[0];
	}
	,
	createApp: function (core, appInfo, callback)
	{
		var appPath		= core.client.getAppUrl( appInfo.appPath) ;
		var appIcon		= appPath + "/" + appInfo.appIcon;
		var appName		= appInfo.appName;
		var appTitle	= appInfo.appTitle;
		var appDesc		= appInfo.appDesc;
		var appFile		= appPath + "/" + appInfo.appFile;
		var appObject	= appInfo.appObject;
		var me = this;
		$.getScript(appFile, function(data)
		{
			eval("var app = new " + appObject + " ( appName, appTitle, appDesc );");
			app.icon = appIcon;
			app.core = core;
			app.info = appInfo;
			app.desktop = me;
			console.log(app);

			if(callback != null)
				callback( app );
		});
	}
	,
	alert: function ( title, content, options )
	{
		var me = this;
		var win = me.createWindow (me, "alertWindow", title, pageurl, option)
	}
	,
	onApplicationIconClick: function(callback)
	{
		this.onApplicationIconClickEventHandler = callback;
	}
	,
	resizeIcons: function()
	{

	}
	,
	addCssAndScripts: function(me, callback)
	{
		//Add WiseUI
		var baseUrl = me.client.config.path.system.framework + "/WiseUI";
		var files = new Array();

		files.push(baseUrl + "/admin-lte/bootstrap/css/bootstrap.css");
		files.push(baseUrl + "/admin-lte/bootstrap/css/bootstrap-theme.css");
		files.push(baseUrl + "/admin-lte/bootstrap/js/bootstrap.js");
		files.push(baseUrl + "/admin-lte/plugins/select2/select2.css");
		files.push(baseUrl + "/admin-lte/dist/css/skins/skin-blue.css");
		files.push(baseUrl + "/admin-lte/plugins/iCheck/all.css");
		files.push(baseUrl + "/admin-lte/plugins/datepicker/datepicker3.css");
		files.push(baseUrl + "/admin-lte/plugins/input-mask/jquery.inputmask.js");
		//files.push(baseUrl + "/admin-lte/plugins/input-mask/jquery.inputmask.extensions.js");
		//files.push(baseUrl + "/admin-lte/plugins/input-mask/jquery.inputmask.date.extensions.js");
		//files.push(baseUrl + "/admin-lte/plugins/datepicker/bootstrap-datepicker.js");
		//files.push(baseUrl + "/admin-lte/plugins/timepicker/bootstrap-timepicker.css");
		files.push(baseUrl + "/admin-lte/plugins/timepicker/bootstrap-timepicker.min.js");
		files.push(baseUrl + "//admin-lte/dist/css/AdminLTE.css");
		files.push(baseUrl + "/admin-lte/plugins/select2/select2.full.js");
		files.push(baseUrl + "/admin-lte/plugins/iCheck/icheck.js");
		files.push(baseUrl + "/dropzone.js");
		//files.push(baseUrl + "/admin-lte/plugins/select2/select2.js");

		me.injectFiles(files, function()
		{
			if(callback != null)
				callback();
		});
	}
	,
	injectFiles: function(files, callback) 
	{
		  var filesLoaded = 0;
		  var parent = document.querySelector("body") || document.querySelector("head");
		  var onFileLoaded = function() {

			if(++filesLoaded == files.length) {
			  callback();
			}
		  }
		  for(var i=0; i <files.length; i++) {   
			 var file = files[i];
			var parts = file.split(".");
			var ext = parts[parts.length-1].toLowerCase();
			switch(ext) {
			  case "js":
				var script = document.createElement('script');
				script.setAttribute("type", "text/javascript");
				script.onload = function() {
					
				  onFileLoaded();
				}
				parent.appendChild(script);

				script.setAttribute("src", file);
			  break;
			  case "css":
				var css = document.createElement('link');
				css.setAttribute("rel", "stylesheet");
				css.setAttribute("type", "text/css");
				css.onload = function() {
					
				  onFileLoaded();
				}
				parent.appendChild(css);

				css.setAttribute("href", file);
			  break;
			}
		  }
	}

});

var MEM =
{
	
}

