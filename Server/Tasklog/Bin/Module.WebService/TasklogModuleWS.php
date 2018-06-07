<?php

class TasklogModuleWS extends SoondaWS
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
		
		if($this->param["condition"] == "all")
			$this->param["condition"] = "";

		if($this->param["order"] == "")
			$this->param["order"] = "TaskDate DESC";

		$condition = $this->setCondition($this->param["condition"]);

		$adapter = $this->getAdapter( "TasklogModule", $this->dbConnection);
		$adapter->connection = $this->dbConnection;
		$data	 = $adapter->getAll( $condition, $this->param["order"], $offset, $limit );
		
		$res = array( "Result" => true, "Data" => $data, "Message" => "Ok" );
		return $res;
	}

	function setCondition($cond)
	{
		$scond ="";

		$scond .= "TaskTitle1 like '%".$cond."%' OR ";

		$scond .= "TaskTitle2 like '%".$cond."%' OR ";

		$scond .= "TaskTitle3 like '%".$cond."%' OR ";

		$scond .= "TaskTitle4 like '%".$cond."%' OR ";

		if(strlen($scond) > 0)
			$scond = substr( $scond, 0, strlen($scond) - 3);
		
		return $scond;
	}

	function detailData()
	{

		$adapter = $this->getAdapter( "TasklogModule", $this->dbConnection);
		$adapter->connection = $this->dbConnection;
		$data	 = $adapter->getDetail( $this->param["IdTasklog"] );
		if($data == null)
			$res = array("Result" => true, "Data"=> null, "Message" => "0 results" );
		else			
			$res = array( "Result" => true, "Data" => $data, "Message" => "Ok" );
		return $res;
	}


	function saveAddData($o)
	{
		$adapter = $this->getAdapter( "TasklogModule", $this->dbConnection);
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
		$adapter = $this->getAdapter( "TasklogModule", $this->dbConnection);
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
		$adapter = $this->getAdapter( "TasklogModule", $this->dbConnection);
		$adapter->connection = $this->dbConnection;
		$adapter->delete($o);
	
	

		$res	 = array( "Result" => true, "Data" => $o, "Message" => "Ok");
		return $res;

	}


	/*
	*	Function: getLookups( )
	*	Return value: array of all lookup data for Tasklog form. 
	*	Description:
	*	Return all lookup data for Tasklog form. These lookup data will be used for lookup comboboxes.
	*/
	public function getLookups()
	{
		$lookups = array();
	
		$res	 = array( "Result" => true, "Data" => $lookups, "Message" => "Ok");
		return $res;
	}


	/*
	*	Function: validateAdd( $adapter, $o )
	*	Parameter: 
	*	- $adapter, data adapter object that will be used by the function. 
	*	- $o, object to be processed.
	*	Return value: boolean true or false. 
	*	Description:
	*	This function vailidate Tasklog data during add operation. Return true if ok, false of not ok.
	*	When it returns false, the insert operation will halt.
	*/
	public function validateAdd( $adapter, $o )
	{
		$result = new ValidationResult();

		//Check Task Title 1
		if(SoondaUtil::CheckEmpty( $o->TaskTitle1, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:TaskTitle1}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "TaskTitle1";
			return $result;
		}


		//Check Task Date
		if(SoondaUtil::CheckEmpty( $o->TaskDate, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:TaskDate}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "TaskDate";
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
	*	This function vailidate Tasklog data during edit operation. Return true if ok, false of not ok.
	*	When it returns false, the insert operation will halt.
	*/
	public function validateEdit( $adapter, $o )
	{
		$result = new ValidationResult();

		//Check Task Title 1
		if(SoondaUtil::CheckEmpty( $o->TaskTitle1, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:TaskTitle1}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "TaskTitle1";
			return $result;
		}


		//Check Task Date
		if(SoondaUtil::CheckEmpty( $o->TaskDate, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:TaskDate}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "TaskDate";
			return $result;
		}

		$result->succeed = true;
		$result->message = "Ok";
		return $result;
	}

}

?>