<?php

error_reporting(error_reporting() & ~E_DEPRECATED & ~E_NOTICE);

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


require 'Lib/flight/Flight.php';
include_once("routes.config.php");
include_once("config.php");



foreach($routes as $key => $o)
{
	$file = $o["fileName"];
	$className = $o["className"];
	$func = $o["functionName"];

	$vars = explode("/", $key);
	$params = "";
	$code = "";

	for($i = 0; $i < count($vars); $i++)
	{
		$var = $vars[$i];
		if(strpos($var, "@") !== FALSE)
		{
			$pos = strpos($var, ":");
			if($pos !== FALSE)
			{
				$var = substr($var, 0, $pos);
			}
			$var = str_replace( "@", "$", $var);
			$varname = str_replace( "$", "", $var);
			$params .= $var.",";
			$code .= "\$newObject->param[\"".$varname."\"] = ".$var.";";
		}

		
	}
	if(strlen($params) > 0)
		$params = substr($params, 0, strlen($params) - 1);

	$code = "	include_once(\"".$file."\");
	\$db = new DbConnection(\"".$config["dbengine"]."\", \"".$config["host"]."\", \"".$config["database"]."\", \"".$config["username"]."\", \"".$config["password"]."\");
	\$newObject = new ".$className."();
	\$newObject->dbConnection = \$db; 
	".$code."
	\$result = \$newObject->".$func."(Flight::request()->data);
	if(\$result != null)
		echo json_encode(\$result);";

	$ff = "Flight::route(\"$key\", function(".$params.")
	{
		".$code."
	});";
	//echo $ff;
	eval($ff);
}

Flight::start();




?>