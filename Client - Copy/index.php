<?php
session_name("inifd");
session_start();

if($_SESSION["user"] == null)
{
	header("Location: system/applications/Login/login.php");
	exit();
}

?>
<!DOCTYPE html>
<html style="min-height:100%; position:relative;">
<head>
	<title>Wiseape Code Generator</title>
	<script src="libraries/js/ejs/ejs.js" type="text/javascript"></script>
	<script src="index-page.js" type="text/javascript"></script>
	<script src="libraries/js/jquery-3.1.0.min.js" type="text/javascript"></script>
	<script src="libraries/js/jsface/jsface.js" type="text/javascript"></script>
	<script src="libraries/js/wiseape/Util.js" type="text/javascript"></script>
	<script src="libraries/js/moment-with-locales.js" type="text/javascript"></script>
	<script src="libraries/js/js-base64/base64.js" type="text/javascript"></script>

	<!-- bootstrap & fontawesome -->
	<link rel="stylesheet" href="applications/SharedResources/Assets/assets/font-awesome/4.5.0/css/font-awesome.min.css" />

	<!-- page specific plugin styles -->
	<link rel="stylesheet" href="applications/SharedResources/Assets/assets/css/jquery-ui.custom.min.css" />
	<link rel="stylesheet" href="applications/SharedResources/Assets/assets/css/chosen.min.css" />



	<!-- ----------------------- BEGIN JQWIDGETS SCRIPTS -------------------------- 
	<link rel="stylesheet" href="libraries/js/jqwidgets/styles/jqx.base.css" />
	<script type="text/javascript" src="libraries/js/jqwidgets/jqxcore.js"></script>
	<script type="text/javascript" src="libraries/js/jqwidgets/jqxbuttons.js"></script>
	<script type="text/javascript" src="libraries/js/jqwidgets/jqxdata.js"></script>
	<script type="text/javascript" src="libraries/js/jqwidgets/jqxscrollbar.js"></script>
	<script type="text/javascript" src="libraries/js/jqwidgets/jqxgrid.js"></script>
	<script type="text/javascript" src="libraries/js/jqwidgets/jqxmenu.js"></script>
	<script type="text/javascript" src="libraries/js/jqwidgets/jqxgrid.filter.js"></script>
	<script type="text/javascript" src="libraries/js/jqwidgets/jqxgrid.sort.js"></script>
	<script type="text/javascript" src="libraries/js/jqwidgets/jqxgrid.selection.js"></script>
	<script type="text/javascript" src="libraries/js/jqwidgets/jqxgrid.filter.js"></script>
	<script type="text/javascript" src="libraries/js/jqwidgets/jqxgrid.columnsresize.js"></script>
	<script type="text/javascript" src="libraries/js/jqwidgets/jqxgrid.columnsreorder.js"></script>
	<script type="text/javascript" src="libraries/js/jqwidgets/jqxgrid.grouping.js"></script>
	<script type="text/javascript" src="libraries/js/jqwidgets/jqxdropdownlist.js"></script>
	<script type="text/javascript" src="libraries/js/jqwidgets/jqxlistbox.js"></script>
	<script type="text/javascript" src="libraries/js/jqwidgets/jqxdata.js"></script>
	<script type="text/javascript" src="libraries/js/jqwidgets/jqxcalendar.js"></script>
	<script type="text/javascript" src="libraries/js/jqwidgets/jqxcombobox.js"></script>
	<script type="text/javascript" src="libraries/js/jqwidgets/jqxcheckbox.js"></script>
	<script type="text/javascript" src="libraries/js/jqwidgets/jqxdragdrop.js"></script>
	<script type="text/javascript" src="libraries/js/jqwidgets/jqxdatetimeinput.js"></script>
	 ----------------------- END JQWIDGETS SCRIPTS -------------------------- -->

	<!---------------------- BEGIN LIBRARIES-------------->
	<script src="libraries/js/handlebars-v4.0.5.js" type="text/javascript"></script>
	<!------- END ---->

	<!-- Wiseape framework --->
	<script src="system/core/ClientConfig.js" type="text/javascript"></script>
	<script src="system/core/ServerConfig.js" type="text/javascript"></script>
	<script src="system/core/WiseapeApplication.js" type="text/javascript"></script>
	<script src="system/core/WiseapeInputApplication.js" type="text/javascript"></script>
	<script src="system/core/WiseapeListApplication.js" type="text/javascript"></script>
	<script src="system/core/WiseapeClient.js" type="text/javascript"></script>
	<script src="system/core/WiseapeKernel.js" type="text/javascript"></script>
	<script src="system/core/WiseapeServer.js" type="text/javascript"></script>
	<script src="system/core/WiseapeWorkflowEngine.js" type="text/javascript"></script>
	<!-- End of Wiseape framework --->

	<!-- Wiseape UI framework --->
	<script src="system/framework/WiseUI/WiseUIConfig.js" type="text/javascript"></script>
	<script src="system/framework/WiseUI/WiseapeWindow.js" type="text/javascript"></script>
	<script src="system/framework/WiseUI/WiseapeFormUtil.js" type="text/javascript"></script>
	<script src="system/framework/WiseUI/WiseapeBaseListForm.js" type="text/javascript"></script>
	<script src="system/framework/WiseUI/WiseapeBaseInputForm.js" type="text/javascript"></script>
	<!-- End of Wiseape UI framework --->

	<!--- Wiseape Desktop --->
	<script src="system/applications/Desktop/html/js/jquery-ui-1.12.0/jquery-ui.js" type="text/javascript"></script>
	<script src="system/applications/Desktop/WiseapeDesktop.js" type="text/javascript"></script>
	<script src="applications/SharedResources/config.js" type="text/javascript"></script>
	<!--- End of Wiseape Desktop --->

	
	<script src="../Shared/Project.js" type="text/javascript"></script>
	<script src="../Shared/Controls.js" type="text/javascript"></script>
	<script src="../Shared/Proxy.js" type="text/javascript"></script>


	<script src="applications/SharedResources/Proxy/FormProxy.js" type="text/javascript"></script>	
	<script src="applications/SharedResources/Proxy/FormConfig.js" type="text/javascript"></script>

	<link rel="stylesheet" href="system/applications/Desktop/html/js/jquery-ui-1.12.0/jquery-ui.css" type="text/css" />
	<link rel="stylesheet" href="system/applications/Desktop/html/js/jquery-ui-1.12.0/jquery-ui.theme.css" type="text/css" />
	<link rel="stylesheet" href="system/applications/Desktop/font-awesome/4.5.0/css/font-awesome.min.css" type="text/css" />


	<link rel="stylesheet" href="libraries/js/jqwidgets/styles/jqx.base.css" type="text/css" />
    <link rel="stylesheet" href="libraries/js/jqwidgets/styles/jqx.hudabluemetro.css" type="text/css" />
	<link rel="stylesheet" href="applications/SharedResources/Assets/Css/list.css" type="text/css" />

	<link rel="icon" href="system/applications/Desktop/images/icon/cow-icon.png" type="image/x-icon" />


</head>
<style>
div
{
	font-size: 9pt;
}
</style>
<body style="height:100%;">
<div id="main-container" style="position: absolute; top:0px; left:0px; width:100%; height:100%; overflow: hidden">

</div>
</body>
<script>
	$(document).ready(function (){
		Index.init("main-container");
	});
</script>
</html>