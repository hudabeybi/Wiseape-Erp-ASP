<?php

class ProcessGroupModuleWS extends SoondaWS
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

		$condition = $this->setCondition($this->param["condition"]);

		$adapter = $this->getAdapter( "ProcessGroupModule", $this->dbConnection);
		$adapter->connection = $this->dbConnection;
		$data	 = $adapter->getAll( $condition, $this->param["order"], $offset, $limit );
		
		$res = array( "Result" => true, "Data" => $data, "Message" => "Ok" );
		return $res;
	}

	function setCondition($cond)
	{
		$scond ="";

		$scond .= "ProcessGroupName like '%".$cond."%' OR ";

		$scond .= "ProcessGroupTitle like '%".$cond."%' OR ";

		if(strlen($scond) > 0)
			$scond = substr( $scond, 0, strlen($scond) - 3);
		
		return $scond;
	}

	function detailData()
	{
		$adapter = $this->getAdapter( "ProcessGroupModule", $this->dbConnection);
		$adapter->connection = $this->dbConnection;
		$data	 = $adapter->getDetail( $this->param["IdProcessGroup"] );
		if($data == null)
			$res = array("Result" => true, "Data"=> null, "Message" => "0 results" );
		else			
			$res = array( "Result" => true, "Data" => $data, "Message" => "Ok" );
		return $res;
	}


	function saveAddData($o)
	{
		$adapter = $this->getAdapter( "ProcessGroupModule", $this->dbConnection);
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
		$adapter = $this->getAdapter( "ProcessGroupModule", $this->dbConnection);
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
		$adapter = $this->getAdapter( "ProcessGroupModule", $this->dbConnection);
		$adapter->connection = $this->dbConnection;
		$adapter->delete($o);
	
		if( file_exists( $o->IconSmall ) )
		{
			unlink($o->IconSmall);
		}
		if( file_exists( $o->IconMiddle ) )
		{
			unlink($o->IconMiddle);
		}
		if( file_exists( $o->IconLarge ) )
		{
			unlink($o->IconLarge);
		}
	

		$res	 = array( "Result" => true, "Data" => $o, "Message" => "Ok");
		return $res;

	}


	/*
	*	Function: getLookups( )
	*	Return value: array of all lookup data for Process Group Module form. 
	*	Description:
	*	Return all lookup data for Process Group Module form. These lookup data will be used for lookup comboboxes.
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
	*	This function vailidate Process Group Module data during add operation. Return true if ok, false of not ok.
	*	When it returns false, the insert operation will halt.
	*/
	public function validateAdd( $adapter, $o )
	{
		$result = new ValidationResult();

		//Check Process Group Name
		if(SoondaUtil::CheckEmpty( $o->ProcessGroupName, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:ProcessGroupName}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "ProcessGroupName";
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
	*	This function vailidate Process Group Module data during edit operation. Return true if ok, false of not ok.
	*	When it returns false, the insert operation will halt.
	*/
	public function validateEdit( $adapter, $o )
	{
		$result = new ValidationResult();

		//Check Process Group Name
		if(SoondaUtil::CheckEmpty( $o->ProcessGroupName, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:ProcessGroupName}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "ProcessGroupName";
			return $result;
		}



		$result->succeed = true;
		$result->message = "Ok";
		return $result;
	}

}

?>