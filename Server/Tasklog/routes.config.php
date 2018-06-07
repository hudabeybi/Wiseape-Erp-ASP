<?php
$routes = array();

$routes["/tasklog/find/@condition/@offset:[0-9]+/@limit:[0-9]+"] = [ "fileName" => "Bin/Module.WebService/TasklogModuleWS.php", "className" => "TasklogModuleWS", "functionName" => "listData",  "method" => "get" ];

$routes["/tasklog/lookups"] = [ "fileName" => "Bin/Module.WebService/TasklogModuleWS.php", "className" => "TasklogModuleWS", "functionName" => "getlookups", "method" => "get"];

$routes["/tasklog/get/@IdTasklog:[0-9]+"] = [ "fileName" => "Bin/Module.WebService/TasklogModuleWS.php", "className" => "TasklogModuleWS", "functionName" => "detailData", "method" => "get"];

$routes["/tasklog/add"] = [ "fileName" => "Bin/Module.WebService/TasklogModuleWS.php", "className" => "TasklogModuleWS", "functionName" => "saveAddData", "method" => "post" ];

$routes["/tasklog/edit"] = [ "fileName" => "Bin/Module.WebService/TasklogModuleWS.php", "className" => "TasklogModuleWS", "functionName" => "saveEditData", "method" => "post" ];

$routes["/tasklog/delete"] = [ "fileName" => "Bin/Module.WebService/TasklogModuleWS.php", "className" => "TasklogModuleWS", "functionName" => "deleteData", "method" => "post"];



?>