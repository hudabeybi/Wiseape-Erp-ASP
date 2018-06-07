<?
error_reporting(0);

function shutdown() {
    $isError = false;
	$phperror = "";



    if ($error = error_get_last()){
    switch($error['type']){
    case E_ERROR:
		$phperror = "[PHP_ERROR]";
    case E_CORE_ERROR:
		$phperror = "[PHP_ERROR]";
    case E_COMPILE_ERROR:
		$phperror = "[PHP_ERROR]";
    case E_USER_ERROR:
		$phperror = "[PHP_ERROR]";
    case E_RECOVERABLE_ERROR:
		$phperror = "[PHP_ERROR]";
    case E_CORE_WARNING:
		$phperror = "[PHP_WARNING]";
    case E_COMPILE_WARNING:
		$phperror = "[PHP_WARNING]";
    case E_PARSE:
		$phperror = "[PHP_ERROR]";
        $serror = "$phperror <br>Level:" . $error['type'] . " <br>\n <b>Message : </b>\n" . $error['message'] . ".<br>\n <b>File:</b> <b>" . $error['file'] . "</b> <br>\n <b>Line:</b>" . $error['line'];
        echo $serror;
        }
    }


}

register_shutdown_function('shutdown');

include_once("SoondaUtil.php");

$op = $_GET["op"];
switch( $op)
{
	case "upload":
		
		$ext = SoondaUtil::SooDecrypt($_GET["ext"]);
		$path = SoondaUtil::SooDecrypt($_GET["path"]);
		SoondaUtil::uploadFile( $_FILES["myfile"], explode(";", $ext ), $path);
	
	break;

	case "savefile":
		SoondaUtil::phpHeaderSaveFile($_GET["file"], $_GET["file"], $_GET["filetype"]); 
	break;
}

?>