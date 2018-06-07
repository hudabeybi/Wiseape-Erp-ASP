<?php

class ProcessGroupModuleWS extends SoondaWS
{
	function index()
	{
		return $this->listData();
	}

	function listData()
	{
		if($this->param["condition"] == "all")
			$this->param["condition"] = "";
		$offset = (isset($this->param["offset"])) ? $this->param["offset"] : 0 ;
		$limit	= (isset($this->param["limit"])) ? $this->param["limit"] : 5 ;

		$offset = $offset * $limit - $limit;

		$adapter = $this->getAdapter( "ProcessGroupModule", $this->dbConnection);
		$adapter->connection = $this->dbConnection;
		$data	 = $adapter->getAll( $this->param["condition"], $this->param["order"], $offset, $limit );

		$adapter = $this->getAdapter( "ProcessModule", $this->dbConnection);
		$processes	 = $adapter->getAll( "", "", "", "");


		$adapter = $this->getAdapter( "ApplicationModule", $this->dbConnection);
		$applications	 = $adapter->getAll( "", "", "", "");

		foreach($processes as $key => $process)
		{
			$process->Application = null;
			foreach($applications as $appKey => $appItem)
			{
				if($appItem->IdApplication == $process->ApplicationId)
				{
					$process->Application = $appItem;
					$processes[$key] = $process;
				}
			}
		}


		foreach($data as $key => $item)
		{
			$item->Processes = array();
			foreach($processes as $proc => $processItem)
			{
				if($processItem->ProcessGroupId == $item->IdProcessGroup)
				{
					array_push($item->Processes, $processItem);
				}
			}
		}
	
		
		$res = array( "Result" => true, "Data" => $data, "Message" => "Ok" );
		return $res;
	}

	function detailData()
	{
		$adapter = $this->getAdapter( "ProcessGroupModule", $this->dbConnection);
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
		$adapter = $this->getAdapter( "ProcessGroupModule", $this->dbConnection);
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
		$adapter = $this->getAdapter( "ProcessGroupModule", $this->dbConnection);
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
		$adapter = $this->getAdapter( "ProcessGroupModule", $this->dbConnection);
		$adapter->connection = $this->dbConnection;
	
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
	

	}

	/*
	*	Function: validateAdd( $adapter, $o )
	*	Parameter: 
	*	- $adapter, data adapter object that will be used by the function. 
	*	- $o, object to be processed.
	*	Return value: boolean true or false. 
	*	Description:
	*	This function vailidate ProcessGroupModule data during add operation. Return true if ok, false of not ok.
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

		//Check Process Group Title
		if(SoondaUtil::CheckEmpty( $o->ProcessGroupTitle, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:ProcessGroupTitle}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "ProcessGroupTitle";
			return $result;
		}

		//Check Process Group Info
		if(SoondaUtil::CheckEmpty( $o->ProcessGroupInfo, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:ProcessGroupInfo}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "ProcessGroupInfo";
			return $result;
		}

		//Check Icon Small
		if(SoondaUtil::CheckEmpty( $o->IconSmall, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:IconSmall}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "IconSmall";
			return $result;
		}

		//Check Icon Middle
		if(SoondaUtil::CheckEmpty( $o->IconMiddle, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:IconMiddle}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "IconMiddle";
			return $result;
		}

		//Check Icon Large
		if(SoondaUtil::CheckEmpty( $o->IconLarge, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:IconLarge}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "IconLarge";
			return $result;
		}

		//Check Is Active
		if(SoondaUtil::CheckEmpty( $o->IsActive, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:IsActive}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "IsActive";
			return $result;
		}

		//Check Is Display
		if(SoondaUtil::CheckEmpty( $o->IsDisplay, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:IsDisplay}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "IsDisplay";
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
	*	This function vailidate ProcessGroupModule data during edit operation. Return true if ok, false of not ok.
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

		//Check Process Group Title
		if(SoondaUtil::CheckEmpty( $o->ProcessGroupTitle, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:ProcessGroupTitle}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "ProcessGroupTitle";
			return $result;
		}

		//Check Process Group Info
		if(SoondaUtil::CheckEmpty( $o->ProcessGroupInfo, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:ProcessGroupInfo}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "ProcessGroupInfo";
			return $result;
		}

		//Check Icon Small
		if(SoondaUtil::CheckEmpty( $o->IconSmall, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:IconSmall}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "IconSmall";
			return $result;
		}

		//Check Icon Middle
		if(SoondaUtil::CheckEmpty( $o->IconMiddle, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:IconMiddle}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "IconMiddle";
			return $result;
		}

		//Check Icon Large
		if(SoondaUtil::CheckEmpty( $o->IconLarge, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:IconLarge}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "IconLarge";
			return $result;
		}

		//Check Is Active
		if(SoondaUtil::CheckEmpty( $o->IsActive, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:IsActive}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "IsActive";
			return $result;
		}

		//Check Is Display
		if(SoondaUtil::CheckEmpty( $o->IsDisplay, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:IsDisplay}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "IsDisplay";
			return $result;
		}

		$result->succeed = true;
		$result->message = "Ok";
		return $result;
	}

}

?>