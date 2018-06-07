<?php

class GenderModuleWS extends SoondaWS
{
	function index()
	{
		return $this->listData();
	}

	function listData()
	{
		$offset = (isset($this->param["offset"])) ? $this->param["offset"] : 0 ;
		$limit	= (isset($this->param["limit"])) ? $this->param["limit"] : 5 ;
		$offset = $offset * $limit - $limit;

		$adapter = $this->getAdapter( "GenderModule", $this->dbConnection);
		$adapter->connection = $this->dbConnection;
		$data	 = $adapter->getAll( $this->param["condition"], $this->param["order"], $offset, $limit );
		
		$res = array( "Result" => true, "Data" => $data, "Message" => "Ok" );
		return $res;
	}

	function detailData()
	{
		$adapter = $this->getAdapter( "GenderModule", $this->dbConnection);
		$adapter->connection = $this->dbConnection;
		$data	 = $adapter->getDetail( $this->param["Soonda_Library.BO.ModuleColumn"] );
		if($data == null)
			$res = array("Result" => true, "Data"=> null, "Message" => "0 results" );
		else			
			$res = array( "Result" => true, "Data" => $data, "Message" => "Ok" );
		return $res;
	}


	function saveAddData()
	{
		$adapter = $this->getAdapter( "GenderModule", $this->dbConnection);
		$adapter->connection = $this->dbConnection;

		$o		 = $adapter->createNew();
		$o		 = $this->setObjectFromPost( $o );
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

	function saveEditData()
	{
		$adapter = $this->getAdapter( "GenderModule", $this->dbConnection);
		$adapter->connection = $this->dbConnection;

		$o		 = $adapter->createNew();
		$o		 = $this->setObjectFromPost( $o );
		$validat = $this->validateEdit( $adapter, $o );
		if( $validat->succeed )
		{
			$adapter->update( $o );
			$res	 = array( "Result" => true, "Data" => $o, "Message" => "The data has been added");
		}
		else
		{
			$res	 = array( "Result" => false, "Data" => $o, "Message" => $validat->message );
		}
		
		return $res;
	}

	function deleteData()
	{
		$adapter = $this->getAdapter( "GenderModule", $this->dbConnection);
		$adapter->connection = $this->dbConnection;
	
	

	}


	/*
	*	Function: getLookups( )
	*	Return value: array of all lookup data for Gender form. 
	*	Description:
	*	Return all lookup data for Gender form. These lookup data will be used for lookup comboboxes.
	*/
	public function getLookups()
	{
		$lookups = array();
	
		return $lookups;
	}


	/*
	*	Function: validateAdd( $adapter, $o )
	*	Parameter: 
	*	- $adapter, data adapter object that will be used by the function. 
	*	- $o, object to be processed.
	*	Return value: boolean true or false. 
	*	Description:
	*	This function vailidate Gender data during add operation. Return true if ok, false of not ok.
	*	When it returns false, the insert operation will halt.
	*/
	public function validateAdd( $adapter, $o )
	{
		$result = new ValidationResult();

		//Check Gender Name
		if(SoondaUtil::CheckEmpty( $o->GenderName, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:GenderName}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "GenderName";
			return $result;
		}

		//Check Gender Info
		if(SoondaUtil::CheckEmpty( $o->GenderInfo, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:GenderInfo}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "GenderInfo";
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
	*	This function vailidate Gender data during edit operation. Return true if ok, false of not ok.
	*	When it returns false, the insert operation will halt.
	*/
	public function validateEdit( $adapter, $o )
	{
		$result = new ValidationResult();

		//Check Gender Name
		if(SoondaUtil::CheckEmpty( $o->GenderName, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:GenderName}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "GenderName";
			return $result;
		}

		//Check Gender Info
		if(SoondaUtil::CheckEmpty( $o->GenderInfo, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:GenderInfo}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "GenderInfo";
			return $result;
		}

		$result->succeed = true;
		$result->message = "Ok";
		return $result;
	}

}

?>