<?php
$routes = array();
$routes["/application/list/@condition/@offset:[0-9]+/@limit:[0-9]+"] = [ "fileName" => "Bin/Module.WebService/ApplicationModuleWS.php", "className" => "ApplicationModuleWS", "functionName" => "listData",  "method" => "get" ];

$routes["/ProcessGroupService.svc/processgroup/find/@condition/@offset:[0-9]+/@limit:[0-9]+"] = [ "fileName" => "Bin/Module.WebService/ProcessGroupModuleWS.php", "className" => "ProcessGroupModuleWS", "functionName" => "listData",  "method" => "get" ];

$routes["/ApplicationService.svc/application/find-by-name/@condition"] = [ "fileName" => "Bin/Module.WebService/ApplicationModuleWS.php", "className" => "ApplicationModuleWS", "functionName" => "findByName",  "method" => "get" ];

/*$routes["/application/get/@id:[0-9]+"] = [ "fileName" => "Bin/Module.Webservice/ApplicationModuleWS.php", "className" => "ApplicationModuleWS", "functionName" => "detailData", "method" => "get"];

$routes["/application/add"] = [ "fileName" => "Bin/Module.Webservice/ApplicationModuleWS.php", "className" => "ApplicationModuleWS", "functionName" => "saveAddData", "method" => "post" ];

$routes["/application/update"] = [ "fileName" => "Bin/Module.Webservice/ApplicationModuleWS.php", "className" => "ApplicationModuleWS", "functionName" => "saveEditData", "method" => "post" ];

$routes["/application/delete/@id:[0-9]+"] = [ "fileName" => "Bin/Module.Webservice/ApplicationModuleWS.php", "className" => "ApplicationModuleWS", "functionName" => "deleteData", "method" => "get"];*/

?>