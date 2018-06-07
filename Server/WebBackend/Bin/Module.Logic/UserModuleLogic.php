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
* 	File Name: UserModuleBO.php
* 	Created Date: 6/5/2017 5:31:40 PM
*   Description:
*	This class contains functions of logic of the User.
*	
* **********************************************************************/

class UserModuleLogic extends SoondaLogic
{

	/*
	*	Function: getLookupData( $adapter )
	*	Parameter: 
	*	- $adapter, data adapter object that will be used by the function. 
	*	Return value: array of all lookup data for User form. 
	*	Description:
	*	Return all lookup data for User form. These lookup data will be used for lookup comboboxes.
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
	*	This function vailidate User data during add operation. Return true if ok, false of not ok.
	*	When it returns false, the insert operation will halt.
	*/
	public function validateAdd( $adapter, $o )
	{
		$result = new ValidationResult();

		//Check First Name
		if(SoondaUtil::CheckEmpty( $o->FirstName, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:FirstName}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "FirstName";
			return $result;
		}

		//Check Last Name
		if(SoondaUtil::CheckEmpty( $o->LastName, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:LastName}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "LastName";
			return $result;
		}

		//Check User Picture
		if(SoondaUtil::CheckEmpty( $o->UserPicture, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:UserPicture}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "UserPicture";
			return $result;
		}

		//Check User Registered Date
		if(SoondaUtil::CheckEmpty( $o->UserRegisteredDate, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:UserRegisteredDate}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "UserRegisteredDate";
			return $result;
		}

		//Check Gender
		if(SoondaUtil::CheckEmpty( $o->GenderId, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:GenderId}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "GenderId";
			return $result;
		}

		//Check User Email
		if(SoondaUtil::CheckEmpty( $o->UserEmail, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:UserEmail}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "UserEmail";
			return $result;
		}

		//Check User Phone
		if(SoondaUtil::CheckEmpty( $o->UserPhone, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:UserPhone}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "UserPhone";
			return $result;
		}

		//Check User Group Id
		if(SoondaUtil::CheckEmpty( $o->UserGroupId, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:UserGroupId}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "UserGroupId";
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
	*	This function vailidate User data during edit operation. Return true if ok, false of not ok.
	*	When it returns false, the insert operation will halt.
	*/
	public function validateEdit( $adapter, $o )
	{
		$result = new ValidationResult();

		//Check First Name
		if(SoondaUtil::CheckEmpty( $o->FirstName, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:FirstName}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "FirstName";
			return $result;
		}

		//Check Last Name
		if(SoondaUtil::CheckEmpty( $o->LastName, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:LastName}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "LastName";
			return $result;
		}

		//Check User Picture
		if(SoondaUtil::CheckEmpty( $o->UserPicture, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:UserPicture}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "UserPicture";
			return $result;
		}

		//Check User Registered Date
		if(SoondaUtil::CheckEmpty( $o->UserRegisteredDate, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:UserRegisteredDate}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "UserRegisteredDate";
			return $result;
		}

		//Check Gender
		if(SoondaUtil::CheckEmpty( $o->GenderId, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:GenderId}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "GenderId";
			return $result;
		}

		//Check User Email
		if(SoondaUtil::CheckEmpty( $o->UserEmail, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:UserEmail}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "UserEmail";
			return $result;
		}

		//Check User Phone
		if(SoondaUtil::CheckEmpty( $o->UserPhone, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:UserPhone}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "UserPhone";
			return $result;
		}

		//Check User Group Id
		if(SoondaUtil::CheckEmpty( $o->UserGroupId, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:UserGroupId}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "UserGroupId";
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
	*	This function update User data during edit operation. Return true if ok, false of not ok.
	*	When it returns false, the edit operation will halt.
	*/
	public function update(  $adapter, $o )
	{
	
		$prevo = null;
		//We try to get the previous data before update, to delete files.
		$prevo = $adapter->getDetail( $o->IdUser);
	
		//Update the User data
		$res = parent::update( $adapter, $o );

		//If the update succeeds
		if( $res->succeed )
		{
	
			//Check if UserPicture file exists. If it does, delete it.
			if( file_exists( $prevo->UserPicture ) && $o->UserPicture != $prevo->UserPicture )
			{
				unlink($prevo->UserPicture);
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
	*	This function delete User data during delete operation. Return true if ok, false of not ok.
	*	When it returns false, the delete operation will halt.
	*/
	public function delete(  $adapter, $o )
	{
		$res = parent::delete( $adapter, $o );
		if( $res->succeed)
		{
	
			if( file_exists( $o->UserPicture ) )
			{
				unlink($o->UserPicture);
			}
	
		}
		return $res;
	}

}




?>