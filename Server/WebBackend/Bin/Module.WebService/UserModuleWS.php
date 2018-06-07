<?php

class UserModuleWS extends SoondaWS
{
	function index()
	{
		return $this->listData();
	}

	function login($u)
	{
		$adapter = $this->getAdapter( "UserModule", $this->dbConnection);
		$username = $this->param["username"];
		$password = $this->param["password"];
		$condition = "UserEmail = '".$u->username."' and UserPassword = '".$u->password."'";

		$data	 = $adapter->getAll( $condition, $this->param["order"], $offset, $limit );
		if(count($data) > 0)
			$res = array( "Result" => true, "Data" => $data, "Message" => "Ok" );
		else
			$res = array( "Result" => false, "Data" => $condition, "Message" => "Login failed" );
		return $res;
	}

	function listData()
	{
		$offset = (isset($this->param["offset"])) ? $this->param["offset"] : 0 ;
		$limit	= (isset($this->param["limit"])) ? $this->param["limit"] : 5 ;
		$offset = $offset * $limit - $limit;
		if($this->param["condition"] == "all");
			$this->param["condition"] = "";
		$condition = "FirstName like '%".$this->param["condition"]."%' or LastName like '%".$this->param["condition"]."%'";
		$adapter = $this->getAdapter( "UserModule", $this->dbConnection);
		
		$data	 = $adapter->getAll($condition , $this->param["order"], $offset, $limit );
		
		$res = array( "Result" => true, "Data" => $data, "Message" => "Ok" );
		return $res;
	}

	function detailData()
	{
		$adapter = $this->getAdapter( "UserModule", $this->dbConnection);
		$adapter->connection = $this->dbConnection;
		$data	 = $adapter->getDetail( $this->param["IdUser"] );
		if($data == null)
			$res = array("Result" => true, "Data"=> null, "Message" => "0 results" );
		else			
			$res = array( "Result" => true, "Data" => $data, "Message" => "Ok" );
		return $res;
	}


	function saveAddData($o)
	{
		$adapter = $this->getAdapter( "UserModule", $this->dbConnection);
		$adapter->connection = $this->dbConnection;

		//$o		 = $adapter->createNew();
		//$o		 = $this->setObjectFromPost( $o );
		$validat = $this->validateEdit( $adapter, $o );
		if( $validat->succeed )
		{
			$adapter->insert( $o );
			$res	 = array( "Result" => true, "Data" => $o, "Message" => "The data has been added");
		}
		else
		{
			$res	 = array( "Result" => false, "Data" => $o, "Message" => $validat->message );
		}
		return $res;
	}

	function saveEditData($o)
	{
		$adapter = $this->getAdapter( "UserModule", $this->dbConnection);
		$adapter->connection = $this->dbConnection;

		//$o		 = $adapter->createNew();
		//$o		 = $this->setObjectFromPost( $o );
		$validat = $this->validateEdit( $adapter, $o );
		if( $validat->succeed )
		{
			$adapter->update( $o );
			$res	 = array( "Result" => true, "Data" => $o, "Message" => "The data has been updated");
		}
		else
		{
			$res	 = array( "Result" => false, "Data" => $o, "Message" => $validat->message );
		}
		
		return $res;
	}

	function deleteData($o)
	{
		$adapter = $this->getAdapter( "UserModule", $this->dbConnection);
		$adapter->connection = $this->dbConnection;
		$adapter->delete($o);
		$res	 = array( "Result" => true, "Data" => $o, "Message" => "The data has been deleted");
		return $res;
	}


	/*
	*	Function: getLookups( )
	*	Return value: array of all lookup data for User form. 
	*	Description:
	*	Return all lookup data for User form. These lookup data will be used for lookup comboboxes.
	*/
	public function getLookups()
	{
		$lookups = array();

		$adapter = $this->getAdapter( "GenderModule", $this->dbConnection);
		$lookups["Gender"] = $adapter->getAll();

		$adapter = $this->getAdapter( "UserGroupModule", $this->dbConnection);
		$lookups["UserGroup"] = $adapter->getAll();

		$res	 = array( "Result" => true, "Data" => $lookups, "Message" => $validat->message );
		return $res;
	}


	/*
	*	Function: validateAdd( $adapter, $o )
	*	Parameter: 
	*	- $adapter, data adapter object that will be used by the function. 
	*	- $o, object to be processed.
	*	Return value: boolean true or false. 
	*	Description:
	*	This function vailidate User data during add operation. Return true if ok, false of not ok.
	*	When it returns false, the insert operation will halt.
	*/
	public function validateAdd( $adapter, $o )
	{
		$result = new ValidationResult();

		//Check First Name
		if(SoondaUtil::CheckEmpty( $o->FirstName, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:FirstName}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "FirstName";
			return $result;
		}

		//Check Last Name
		if(SoondaUtil::CheckEmpty( $o->LastName, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:LastName}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "LastName";
			return $result;
		}

		//Check User Picture
		if(SoondaUtil::CheckEmpty( $o->UserPicture, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:UserPicture}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "UserPicture";
			return $result;
		}

		//Check User Registered Date
		if(SoondaUtil::CheckEmpty( $o->UserRegisteredDate, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:UserRegisteredDate}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "UserRegisteredDate";
			return $result;
		}

		//Check Gender
		if(SoondaUtil::CheckEmpty( $o->GenderId, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:GenderId}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "GenderId";
			return $result;
		}

		//Check User Email
		if(SoondaUtil::CheckEmpty( $o->UserEmail, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:UserEmail}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "UserEmail";
			return $result;
		}

		//Check User Phone
		if(SoondaUtil::CheckEmpty( $o->UserPhone, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:UserPhone}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "UserPhone";
			return $result;
		}

		//Check User Group Id
		if(SoondaUtil::CheckEmpty( $o->UserGroupId, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:UserGroupId}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "UserGroupId";
			return $result;
		}

		$result->succeed = true;
		$result->message = "Ok";
		return $result;
	}


	/*
	*	Function: validateEdit( $adapter, $o )
	*	Parameter: 
	*	- $adapter, data adapter object that will be used by the function. 
	*	- $o, object to be processed.
	*	Return value: boolean true or false and the error message. 
	*	Description:
	*	This function vailidate User data during edit operation. Return true if ok, false of not ok.
	*	When it returns false, the insert operation will halt.
	*/
	public function validateEdit( $adapter, $o )
	{
		$result = new ValidationResult();

		//Check First Name
		if(SoondaUtil::CheckEmpty( $o->FirstName, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:FirstName}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "FirstName";
			return $result;
		}

		//Check Last Name
		if(SoondaUtil::CheckEmpty( $o->LastName, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:LastName}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "LastName";
			return $result;
		}

		//Check User Picture
		if(SoondaUtil::CheckEmpty( $o->UserPicture, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:UserPicture}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "UserPicture";
			return $result;
		}

		//Check User Registered Date
		if(SoondaUtil::CheckEmpty( $o->UserRegisteredDate, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:UserRegisteredDate}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "UserRegisteredDate";
			return $result;
		}

		//Check Gender
		if(SoondaUtil::CheckEmpty( $o->GenderId, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:GenderId}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "GenderId";
			return $result;
		}

		//Check User Email
		if(SoondaUtil::CheckEmpty( $o->UserEmail, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:UserEmail}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "UserEmail";
			return $result;
		}

		//Check User Phone
		if(SoondaUtil::CheckEmpty( $o->UserPhone, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:UserPhone}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "UserPhone";
			return $result;
		}

		//Check User Group Id
		if(SoondaUtil::CheckEmpty( $o->UserGroupId, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:UserGroupId}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "UserGroupId";
			return $result;
		}

		$result->succeed = true;
		$result->message = "Ok";
		return $result;
	}

}

?>