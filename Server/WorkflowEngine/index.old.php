<?php

include_once("Lib/SoondaPHP/SoondaUtil.php");
include_once("Lib/SoondaPHP/Soonda.php");
include_once("Lib/SoondaPHP/SoondaWs.php");
include_once("Lib/SoondaPHP/SoondaData.php");
include_once("Lib/SoondaPHP/SoondaAdapter.php");
include_once("Lib/SoondaPHP/SoondaLogic.php");
include_once("Lib/database/connection.php");
include_once("Bin/Global.DataModel/tables.php");
include_once("Bin/Global.DataModel/adapter.php");
//include_once("Lib/database/connection.php");

$db = new DbConnection("mysql", "127.0.0.1", "Com_Wiseape_Gateway_UserManagement", "root", "rotikeju98");

if( isset($_GET["mod"]))
{
	$mod = $_GET["mod"];

	include_once("Bin/Module.Webservice/".$mod."Ws.php");
	$moduleName = $mod."Ws";
	$module = new $moduleName();
	$module->dbConnection = $db;

	foreach($_GET as $key => $val)
	{
		$module->param[$key] = $val;
	}
	
	foreach($_POST as $key => $val)
	{
		$module->param[$key] = $val;
	}

	if(isset($_GET["com"]))
	{
		$com = $_GET["com"];
		$result = $module->$com();
		
		echo json_encode($result);
	}
	else
		echo "{ 'Result' : 'false', 'ErrorMessage' : 'Please, specifym mod and com' }";
}
else
		echo "{ 'Result' : 'false', 'ErrorMessage' : 'Please, specifym mod and com' }";



?>