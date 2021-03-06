<?php
/*
* This file is generated using SoondaCodeGenerator Pluggin for Soonda Application Builder Code Generator.
* Don't modify this file directly.
* This file may be replaced during re-code generation, any changes to this file may be replaced.
* Instead, Create new file and class that inherits this class to add functionality and modification.
*
* M. Huda (huda_ya@yahoo.co.uk)
*/

/***********************************************************************
* 
* 	File Name: ProcessModuleBO.php
* 	Created Date: 6/5/2017 3:40:35 PM
*   Description:
*	This class contains functions of logic of the ProcessModule.
*	
* **********************************************************************/

class ProcessModuleLogic extends SoondaLogic
{

	/*
	*	Function: getLookupData( $adapter )
	*	Parameter: 
	*	- $adapter, data adapter object that will be used by the function. 
	*	Return value: array of all lookup data for ProcessModule form. 
	*	Description:
	*	Return all lookup data for ProcessModule form. These lookup data will be used for lookup comboboxes.
	*/
	public function getLookupData(  $adapter )
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

	/*
	*	Function: update( $adapter, $o )
	*	Parameter: 
	*	- $adapter, data adapter object that will be used by the function. 
	*	- $o, object to be processed.
	*	Return value: boolean true or false and the error message. 
	*	Description:
	*	This function update ProcessModule data during edit operation. Return true if ok, false of not ok.
	*	When it returns false, the edit operation will halt.
	*/
	public function update(  $adapter, $o )
	{
	
		//Update the ProcessModule data
		$res = parent::update( $adapter, $o );

		//If the update succeeds
		if( $res->succeed )
		{
	
	
		}
		
		return $res;
	}


	/*
	*	Function: delete( $adapter, $o )
	*	Parameter: 
	*	- $adapter, data adapter object that will be used by the function. 
	*	- $o, object to be processed.
	*	Return value: boolean true or false and the error message. 
	*	Description:
	*	This function delete ProcessModule data during delete operation. Return true if ok, false of not ok.
	*	When it returns false, the delete operation will halt.
	*/
	public function delete(  $adapter, $o )
	{
		$res = parent::delete( $adapter, $o );
		if( $res->succeed)
		{
	
	
		}
		return $res;
	}

}




?>