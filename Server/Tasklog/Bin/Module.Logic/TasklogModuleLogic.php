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
* 	File Name: TasklogModuleBO.php
* 	Created Date: 7/25/2017 6:13:05 PM
*   Description:
*	This class contains functions of logic of the Tasklog.
*	
* **********************************************************************/

class TasklogModuleLogic extends SoondaLogic
{

	/*
	*	Function: getLookupData( $adapter )
	*	Parameter: 
	*	- $adapter, data adapter object that will be used by the function. 
	*	Return value: array of all lookup data for Tasklog form. 
	*	Description:
	*	Return all lookup data for Tasklog form. These lookup data will be used for lookup comboboxes.
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

		//Check Task Title 2
		if(SoondaUtil::CheckEmpty( $o->TaskTitle2, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:TaskTitle2}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "TaskTitle2";
			return $result;
		}

		//Check Task Title 3
		if(SoondaUtil::CheckEmpty( $o->TaskTitle3, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:TaskTitle3}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "TaskTitle3";
			return $result;
		}

		//Check Task Title 4
		if(SoondaUtil::CheckEmpty( $o->TaskTitle4, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:TaskTitle4}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "TaskTitle4";
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
	*	Function: update( $adapter, $o )
	*	Parameter: 
	*	- $adapter, data adapter object that will be used by the function. 
	*	- $o, object to be processed.
	*	Return value: boolean true or false and the error message. 
	*	Description:
	*	This function update Tasklog data during edit operation. Return true if ok, false of not ok.
	*	When it returns false, the edit operation will halt.
	*/
	public function update(  $adapter, $o )
	{
	
		//Update the Tasklog data
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
	*	This function delete Tasklog data during delete operation. Return true if ok, false of not ok.
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