<?php
require_once("adodb/adodb.inc.php");
//require_once("adodb/adodb-recordset.inc.php");
$errorQuery = "";

class DbConnection
{
	var $ConnectionString;
	var $DbServer;
	var $DbUsername;
	var $DbPassword;
	var $DbName;
	var $DbType;
	var $RecordSet;
	var $Query;

	function DbConnection($dbtype="", $dbserver="", $dbname="",$dbusername="", $dbpassword="")
	{
		$this->DbType = $dbtype;
		$this->DbServer = $dbserver;
		$this->DbUsername = $dbusername;
		$this->DbPassword = $dbpassword;
		$this->DbName = $dbname;

	}

	function Connect()
	{
		$connectionHandler = ADONewConnection($this->DbType);  # create the connection
	    $connectionHandler -> Connect($this->DbServer, $this->DbUsername, $this->DbPassword, $this->DbName);
		return $connectionHandler;
	}

	function HExec($q)
	{
		$db = $this->Connect();
		return $db->Execute($q);
	}
	function GetMetaTables()
	{
		$db = $this->Connect();
		return $db->MetaTables("TABLES");
	}	
	function GetMetaColumns($table,$notcasesensitive=true)
	{
		$db = $this->Connect();
		return $db->MetaColumns($table,$notcasesensitive);
	}
	function GetMetaPrimaryKeys($table, $owner=false)
	{
		$db = $this->Connect();
		return $db->MetaPrimaryKeys($table, $owner);
	}
	function GetMetaForeignKeys($table, $owner = false)
	{
		$db = $this->Connect();
		return $db->MetaForeignKeys($table, $owner);
	}
	function Execute($query="", $limit="", $moffset="")
	{
		global $errorQuery;
		$db = $this->Connect();
		//$db->debug = true;
		
		if(!defined('ADODB_ERROR_HANDLER_TYPE')) {
			define('ADODB_ERROR_HANDLER_TYPE', E_USER_ERROR);
		}
		if(!defined('ADODB_ERROR_HANDLER')) {
			define('ADODB_ERROR_HANDLER', 'my_adodb_errorhandler');
		}


		if($query != "")
		{
			$q = $query;
			$this->Query = $q;
		}
		else
			$q = $this->Query;

		if(strpos(strtolower($q), "select") !== false) 
		{
			if($limit != "")
			{
				if($moffset == "") $moffset =0;					
				$result = $db->SelectLimit($q, $limit, $moffset);

			}
			else
				$result = $db->SelectLimit($q);
			$this->RecordSet = &$result;
		}
		else
		{
			$errorQuery = $q;
			$result = $db->Execute($q);
			
			if(strpos(strtolower($q), "insert") !== false)
				$result = $db->Insert_ID();
			$this->RecordSet = "";
		}
		$err = $db->ErrorMsg();
		if($err != "") 
		{	
			if( !strstr( strtolower($err), "changed database context") )
				echo "php_error: Database: ".$err."<br><b>Query :</b>".$query;
		}

		
		return $result;
	}
}

/**
* ADODB Error Handler
*
* @param string $dbms The RDBMS you are connecting to, e.g. mysql
* @param string $fn The name of the calling function (in uppercase)
* @param mixed $errno The native error number from the database
* @param string $errmsg The native error msg from the database
* @param string $p1 $fn specific parameter
* @param string $p2 $fn specific parameter
* @param $thisConn $current connection object
*/
//-------------------------------------------------------------------------------------------------
function my_adodb_errorhandler($dbms, $fn, $errno, $errmsg, $p1, $p2, $thisConn) {
//-------------------------------------------------------------------------------------------------

	global $errorQuery;
    if($fn == 'CONNECT') {
        // error was connecting to the database
        $errmsg = 'Could not connect to the database server';
    }

    // your code here
	echo "php_error : Database: ".$errmsg. "; <br>Query : ".$errorQuery;
   
}

?>