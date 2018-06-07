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
* 	File Name: ProcessGroupModuleBO.php
* 	Created Date: 7/21/2017 3:23:56 PM
*   Description:
*	This class contains functions of logic of the Process Group Module.
*	
* **********************************************************************/

class ProcessGroupModuleLogic extends SoondaLogic
{

	/*
	*	Function: getLookupData( $adapter )
	*	Parameter: 
	*	- $adapter, data adapter object that will be used by the function. 
	*	Return value: array of all lookup data for Process Group Module form. 
	*	Description:
	*	Return all lookup data for Process Group Module form. These lookup data will be used for lookup comboboxes.
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

	/*
	*	Function: update( $adapter, $o )
	*	Parameter: 
	*	- $adapter, data adapter object that will be used by the function. 
	*	- $o, object to be processed.
	*	Return value: boolean true or false and the error message. 
	*	Description:
	*	This function update Process Group Module data during edit operation. Return true if ok, false of not ok.
	*	When it returns false, the edit operation will halt.
	*/
	public function update(  $adapter, $o )
	{
	
		$prevo = null;
		//We try to get the previous data before update, to delete files.
		$prevo = $adapter->getDetail( $o->IdProcessGroup);
	
		//Update the Process Group Module data
		$res = parent::update( $adapter, $o );

		//If the update succeeds
		if( $res->succeed )
		{
	
			//Check if IconSmall file exists. If it does, delete it.
			if( file_exists( $prevo->IconSmall ) && $o->IconSmall != $prevo->IconSmall )
			{
				unlink($prevo->IconSmall);
			}
	
			//Check if IconMiddle file exists. If it does, delete it.
			if( file_exists( $prevo->IconMiddle ) && $o->IconMiddle != $prevo->IconMiddle )
			{
				unlink($prevo->IconMiddle);
			}
	
			//Check if IconLarge file exists. If it does, delete it.
			if( file_exists( $prevo->IconLarge ) && $o->IconLarge != $prevo->IconLarge )
			{
				unlink($prevo->IconLarge);
			}
	
	
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
	*	This function delete Process Group Module data during delete operation. Return true if ok, false of not ok.
	*	When it returns false, the delete operation will halt.
	*/
	public function delete(  $adapter, $o )
	{
		$res = parent::delete( $adapter, $o );
		if( $res->succeed)
		{
	
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
		return $res;
	}

}




?>