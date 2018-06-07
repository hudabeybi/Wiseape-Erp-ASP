<?php

class ProcessModuleWS extends SoondaWS
{
	function index()
	{
		return $this->listData();
	}

	function listData()
	{
		$offset = (isset($this->param["offset"])) ? $this->param["offset"] : 0 ;
		$limit	= (isset($this->param["limit"])) ? $this->param["limit"] : 5 ;

		$adapter = $this->getAdapter( "ProcessModule", $this->dbConnection);
		$adapter->connection = $this->dbConnection;
		$data	 = $adapter->getAll( $this->param["condition"], $this->param["order"], $offset, $limit );
		
		$res = array( "Result" => true, "Data" => $data, "Message" => "Ok" );
		return $res;
	}

	function detailData()
	{
		$adapter = $this->getAdapter( "ProcessModule", $this->dbConnection);
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
		$adapter = $this->getAdapter( "ProcessModule", $this->dbConnection);
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
		$adapter = $this->getAdapter( "ProcessModule", $this->dbConnection);
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
		$adapter = $this->getAdapter( "ProcessModule", $this->dbConnection);
		$adapter->connection = $this->dbConnection;
	
	

	}

	/*
	*	Function: validateAdd( $adapter, $o )
	*	Parameter: 
	*	- $adapter, data adapter object that will be used by the function. 
	*	- $o, object to be processed.
	*	Return value: boolean true or false. 
	*	Description:
	*	This function vailidate ProcessModule data during add operation. Return true if ok, false of not ok.
	*	When it returns false, the insert operation will halt.
	*/
	public function validateAdd( $adapter, $o )
	{
		$result = new ValidationResult();

		//Check Process No
		if(SoondaUtil::CheckEmpty( $o->ProcessNo, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:ProcessNo}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "ProcessNo";
			return $result;
		}

		//Check Process Name
		if(SoondaUtil::CheckEmpty( $o->ProcessName, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:ProcessName}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "ProcessName";
			return $result;
		}

		//Check Process Info
		if(SoondaUtil::CheckEmpty( $o->ProcessInfo, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:ProcessInfo}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "ProcessInfo";
			return $result;
		}

		//Check Process Created Date
		if(SoondaUtil::CheckEmpty( $o->ProcessCreatedDate, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:ProcessCreatedDate}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "ProcessCreatedDate";
			return $result;
		}

		//Check Application
		if(SoondaUtil::CheckEmpty( $o->ApplicationId, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:ApplicationId}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "ApplicationId";
			return $result;
		}

		//Check Previous Workflow Evaluator Id
		if(SoondaUtil::CheckEmpty( $o->PreviousWorkflowEvaluatorId, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:PreviousWorkflowEvaluatorId}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "PreviousWorkflowEvaluatorId";
			return $result;
		}

		//Check Next Workflow Evaluator Id
		if(SoondaUtil::CheckEmpty( $o->NextWorkflowEvaluatorId, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:NextWorkflowEvaluatorId}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "NextWorkflowEvaluatorId";
			return $result;
		}

		//Check Workflow Id
		if(SoondaUtil::CheckEmpty( $o->WorkflowId, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:WorkflowId}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "WorkflowId";
			return $result;
		}

		//Check Created By User Id
		if(SoondaUtil::CheckEmpty( $o->CreatedByUserId, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:CreatedByUserId}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "CreatedByUserId";
			return $result;
		}

		//Check Process Group Id
		if(SoondaUtil::CheckEmpty( $o->ProcessGroupId, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:ProcessGroupId}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "ProcessGroupId";
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
	*	This function vailidate ProcessModule data during edit operation. Return true if ok, false of not ok.
	*	When it returns false, the insert operation will halt.
	*/
	public function validateEdit( $adapter, $o )
	{
		$result = new ValidationResult();

		//Check Process No
		if(SoondaUtil::CheckEmpty( $o->ProcessNo, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:ProcessNo}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "ProcessNo";
			return $result;
		}

		//Check Process Name
		if(SoondaUtil::CheckEmpty( $o->ProcessName, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:ProcessName}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "ProcessName";
			return $result;
		}

		//Check Process Info
		if(SoondaUtil::CheckEmpty( $o->ProcessInfo, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:ProcessInfo}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "ProcessInfo";
			return $result;
		}

		//Check Process Created Date
		if(SoondaUtil::CheckEmpty( $o->ProcessCreatedDate, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:ProcessCreatedDate}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "ProcessCreatedDate";
			return $result;
		}

		//Check Application
		if(SoondaUtil::CheckEmpty( $o->ApplicationId, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:ApplicationId}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "ApplicationId";
			return $result;
		}

		//Check Previous Workflow Evaluator Id
		if(SoondaUtil::CheckEmpty( $o->PreviousWorkflowEvaluatorId, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:PreviousWorkflowEvaluatorId}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "PreviousWorkflowEvaluatorId";
			return $result;
		}

		//Check Next Workflow Evaluator Id
		if(SoondaUtil::CheckEmpty( $o->NextWorkflowEvaluatorId, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:NextWorkflowEvaluatorId}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "NextWorkflowEvaluatorId";
			return $result;
		}

		//Check Workflow Id
		if(SoondaUtil::CheckEmpty( $o->WorkflowId, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:WorkflowId}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "WorkflowId";
			return $result;
		}

		//Check Created By User Id
		if(SoondaUtil::CheckEmpty( $o->CreatedByUserId, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:CreatedByUserId}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "CreatedByUserId";
			return $result;
		}

		//Check Process Group Id
		if(SoondaUtil::CheckEmpty( $o->ProcessGroupId, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:ProcessGroupId}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "ProcessGroupId";
			return $result;
		}

		$result->succeed = true;
		$result->message = "Ok";
		return $result;
	}

}

?>