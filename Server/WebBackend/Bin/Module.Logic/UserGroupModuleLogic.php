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
* 	File Name: UserGroupModuleBO.php
* 	Created Date: 6/5/2017 5:31:54 PM
*   Description:
*	This class contains functions of logic of the User Group.
*	
* **********************************************************************/

class UserGroupModuleLogic extends SoondaLogic
{

	/*
	*	Function: getLookupData( $adapter )
	*	Parameter: 
	*	- $adapter, data adapter object that will be used by the function. 
	*	Return value: array of all lookup data for User Group form. 
	*	Description:
	*	Return all lookup data for User Group form. These lookup data will be used for lookup comboboxes.
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
	*	This function vailidate User Group data during add operation. Return true if ok, false of not ok.
	*	When it returns false, the insert operation will halt.
	*/
	public function validateAdd( $adapter, $o )
	{
		$result = new ValidationResult();

		//Check User Group
		if(SoondaUtil::CheckEmpty( $o->UserGroup, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:UserGroup}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "UserGroup";
			return $result;
		}

		//Check User Group Desc
		if(SoondaUtil::CheckEmpty( $o->UserGroupDesc, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:UserGroupDesc}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "UserGroupDesc";
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
	*	This function vailidate User Group data during edit operation. Return true if ok, false of not ok.
	*	When it returns false, the insert operation will halt.
	*/
	public function validateEdit( $adapter, $o )
	{
		$result = new ValidationResult();

		//Check User Group
		if(SoondaUtil::CheckEmpty( $o->UserGroup, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:UserGroup}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "UserGroup";
			return $result;
		}

		//Check User Group Desc
		if(SoondaUtil::CheckEmpty( $o->UserGroupDesc, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:UserGroupDesc}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "UserGroupDesc";
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
	*	This function update User Group data during edit operation. Return true if ok, false of not ok.
	*	When it returns false, the edit operation will halt.
	*/
	public function update(  $adapter, $o )
	{
	
		//Update the User Group data
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
	*	This function delete User Group data during delete operation. Return true if ok, false of not ok.
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