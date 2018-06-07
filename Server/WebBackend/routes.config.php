<?php
$routes = array();

$routes["/user/find/@condition/@offset:[0-9]+/@limit:[0-9]+"] = [ "fileName" => "Bin/Module.WebService/UserModuleWS.php", "className" => "UserModuleWS", "functionName" => "listData",  "method" => "get" ];

$routes["/user/lookups"] = [ "fileName" => "Bin/Module.WebService/UserModuleWS.php", "className" => "UserModuleWS", "functionName" => "getlookups", "method" => "get"];

$routes["/user/get/@IdUser:[0-9]+"] = [ "fileName" => "Bin/Module.WebService/UserModuleWS.php", "className" => "UserModuleWS", "functionName" => "detailData", "method" => "get"];

$routes["/user/add"] = [ "fileName" => "Bin/Module.WebService/UserModuleWS.php", "className" => "UserModuleWS", "functionName" => "saveAddData", "method" => "post" ];

$routes["/user/edit"] = [ "fileName" => "Bin/Module.WebService/UserModuleWS.php", "className" => "UserModuleWS", "functionName" => "saveEditData", "method" => "post" ];

$routes["/user/delete"] = [ "fileName" => "Bin/Module.WebService/UserModuleWS.php", "className" => "UserModuleWS", "functionName" => "deleteData", "method" => "post"];

$routes["/user/login"] = [ "fileName" => "Bin/Module.WebService/UserModuleWS.php", "className" => "UserModuleWS", "functionName" => "login", "method" => "post"];


$routes["/galleryalbum/find/@condition/@offset:[0-9]+/@limit:[0-9]+"] = [ "fileName" => "Bin/Module.WebService/GalleryAlbumModuleWS.php", "className" => "GalleryAlbumModuleWS", "functionName" => "listDataGalleryAlbum",  "method" => "get" ];

$routes["/mediacoverage/find/@condition/@offset:[0-9]+/@limit:[0-9]+"] = [ "fileName" => "Bin/Module.WebService/GalleryAlbumModuleWS.php", "className" => "GalleryAlbumModuleWS", "functionName" => "listDataMediaCoverage",  "method" => "get" ];

$routes["/galleryalbum/lookups"] = [ "fileName" => "Bin/Module.WebService/GalleryAlbumModuleWS.php", "className" => "GalleryAlbumModuleWS", "functionName" => "getlookups", "method" => "get"];

$routes["/galleryalbum/get/@IdGalleryAlbum:[0-9]+"] = [ "fileName" => "Bin/Module.WebService/GalleryAlbumModuleWS.php", "className" => "GalleryAlbumModuleWS", "functionName" => "detailData", "method" => "get"];

$routes["/galleryalbum/add"] = [ "fileName" => "Bin/Module.WebService/GalleryAlbumModuleWS.php", "className" => "GalleryAlbumModuleWS", "functionName" => "saveAddData", "method" => "post" ];

$routes["/galleryalbum/edit"] = [ "fileName" => "Bin/Module.WebService/GalleryAlbumModuleWS.php", "className" => "GalleryAlbumModuleWS", "functionName" => "saveEditData", "method" => "post" ];

$routes["/galleryalbum/delete"] = [ "fileName" => "Bin/Module.WebService/GalleryAlbumModuleWS.php", "className" => "GalleryAlbumModuleWS", "functionName" => "deleteData", "method" => "post"];


$routes["/gallery/find-by-album/@IdAlbum"] = [ "fileName" => "Bin/Module.WebService/GalleryModuleWS.php", "className" => "GalleryModuleWS", "functionName" => "listByAlbum", "method" => "post"];



$routes["/file/upload/@filename/@targetfilename"] = [ "fileName" => "Bin/Module.WebService/FileModuleWS.php", "className" => "FileModuleWS", "functionName" => "upload", "method" => "post"];

$routes["/file/download/@filename"] = [ "fileName" => "Bin/Module.WebService/FileModuleWS.php", "className" => "FileModuleWS", "functionName" => "download", "method" => "post"];

$routes["/file/delete/@filename"] = [ "fileName" => "Bin/Module.WebService/FileModuleWS.php", "className" => "FileModuleWS", "functionName" => "delete", "method" => "get"];

?>