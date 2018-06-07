<?php
$routes = array();

$routes["/application/find/@condition/@offset:[0-9]+/@limit:[0-9]+"] = [ "fileName" => "Bin/Module.WebService/ApplicationModuleWS.php", "className" => "ApplicationModuleWS", "functionName" => "listData",  "method" => "get" ];

$routes["/application/lookups"] = [ "fileName" => "Bin/Module.WebService/ApplicationModuleWS.php", "className" => "ApplicationModuleWS", "functionName" => "getlookups", "method" => "get"];

$routes["/application/get/@IdApplication:[0-9]+"] = [ "fileName" => "Bin/Module.WebService/ApplicationModuleWS.php", "className" => "ApplicationModuleWS", "functionName" => "detailData", "method" => "get"];

$routes["/application/add"] = [ "fileName" => "Bin/Module.WebService/ApplicationModuleWS.php", "className" => "ApplicationModuleWS", "functionName" => "saveAddData", "method" => "post" ];

$routes["/application/edit"] = [ "fileName" => "Bin/Module.WebService/ApplicationModuleWS.php", "className" => "ApplicationModuleWS", "functionName" => "saveEditData", "method" => "post" ];

$routes["/application/delete"] = [ "fileName" => "Bin/Module.WebService/ApplicationModuleWS.php", "className" => "ApplicationModuleWS", "functionName" => "deleteData", "method" => "post"];


$routes["/processgroup/find/@condition/@offset:[0-9]+/@limit:[0-9]+"] = [ "fileName" => "Bin/Module.WebService/ProcessGroupModuleWS.php", "className" => "ProcessGroupModuleWS", "functionName" => "listData",  "method" => "get" ];

$routes["/processgroup/lookups"] = [ "fileName" => "Bin/Module.WebService/ProcessGroupModuleWS.php", "className" => "ProcessGroupModuleWS", "functionName" => "getlookups", "method" => "get"];

$routes["/processgroup/get/@IdProcessGroup:[0-9]+"] = [ "fileName" => "Bin/Module.WebService/ProcessGroupModuleWS.php", "className" => "ProcessGroupModuleWS", "functionName" => "detailData", "method" => "get"];

$routes["/processgroup/add"] = [ "fileName" => "Bin/Module.WebService/ProcessGroupModuleWS.php", "className" => "ProcessGroupModuleWS", "functionName" => "saveAddData", "method" => "post" ];

$routes["/processgroup/edit"] = [ "fileName" => "Bin/Module.WebService/ProcessGroupModuleWS.php", "className" => "ProcessGroupModuleWS", "functionName" => "saveEditData", "method" => "post" ];

$routes["/processgroup/delete"] = [ "fileName" => "Bin/Module.WebService/ProcessGroupModuleWS.php", "className" => "ProcessGroupModuleWS", "functionName" => "deleteData", "method" => "post"];


$routes["/process/find/@condition/@offset:[0-9]+/@limit:[0-9]+"] = [ "fileName" => "Bin/Module.WebService/ProcessModuleWS.php", "className" => "ProcessModuleWS", "functionName" => "listData",  "method" => "get" ];

$routes["/process/lookups"] = [ "fileName" => "Bin/Module.WebService/ProcessModuleWS.php", "className" => "ProcessModuleWS", "functionName" => "getlookups", "method" => "get"];

$routes["/process/get/@IdProcess:[0-9]+"] = [ "fileName" => "Bin/Module.WebService/ProcessModuleWS.php", "className" => "ProcessModuleWS", "functionName" => "detailData", "method" => "get"];

$routes["/process/add"] = [ "fileName" => "Bin/Module.WebService/ProcessModuleWS.php", "className" => "ProcessModuleWS", "functionName" => "saveAddData", "method" => "post" ];

$routes["/process/edit"] = [ "fileName" => "Bin/Module.WebService/ProcessModuleWS.php", "className" => "ProcessModuleWS", "functionName" => "saveEditData", "method" => "post" ];

$routes["/process/delete"] = [ "fileName" => "Bin/Module.WebService/ProcessModuleWS.php", "className" => "ProcessModuleWS", "functionName" => "deleteData", "method" => "post"];


?>