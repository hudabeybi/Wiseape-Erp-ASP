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
* 	Created Date: 7/21/2017 3:23:51 PM
*   Description:
*	This class contains functions of logic of the Process Module.
*	
* **********************************************************************/

class ProcessModuleLogic extends SoondaLogic
{

	/*
	*	Function: getLookupData( $adapter )
	*	Parameter: 
	*	- $adapter, data adapter object that will be used by the function. 
	*	Return value: array of all lookup data for Process Module form. 
	*	Description:
	*	Return all lookup data for Process Module form. These lookup data will be used for lookup comboboxes.
	*/
	public function getLookupData(  $adapter )
	{
		$lookups = array();

		$lAdapter = new applicationAdapter();
		$lAdapter->connection = $adapter->connection;
		$lookups["application"] = $lAdapter->getAll();

		$lAdapter = new workflowAdapter();
		$lAdapter->connection = $adapter->connection;
		$lookups["workflow"] = $lAdapter->getAll();

		$lAdapter = new processgroupAdapter();
		$lAdapter->connection = $adapter->connection;
		$lookups["processgroup"] = $lAdapter->getAll();
	
		return $lookups;
	}



	/*
	*	Function: validateAdd( $adapter, $o )
	*	Parameter: 
	*	- $adapter, data adapter object that will be used by the function. 
	*	- $o, object to be processed.
	*	Return value: boolean true or false. 
	*	Description:
	*	This function vailidate Process Module data during add operation. Return true if ok, false of not ok.
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
	*	This function vailidate Process Module data during edit operation. Return true if ok, false of not ok.
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
	*	This function update Process Module data during edit operation. Return true if ok, false of not ok.
	*	When it returns false, the edit operation will halt.
	*/
	public function update(  $adapter, $o )
	{
	
		//Update the Process Module data
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
	*	This function delete Process Module data during delete operation. Return true if ok, false of not ok.
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