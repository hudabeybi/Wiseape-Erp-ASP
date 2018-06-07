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
* 	File Name: ApplicationModuleBO.php
* 	Created Date: 6/5/2017 3:21:04 PM
*   Description:
*	This class contains functions of logic of the Application Module.
*	
* **********************************************************************/

class ApplicationModuleLogic extends SoondaLogic
{

	/*
	*	Function: getLookupData( $adapter )
	*	Parameter: 
	*	- $adapter, data adapter object that will be used by the function. 
	*	Return value: array of all lookup data for Application Module form. 
	*	Description:
	*	Return all lookup data for Application Module form. These lookup data will be used for lookup comboboxes.
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
	*	This function vailidate Application Module data during add operation. Return true if ok, false of not ok.
	*	When it returns false, the insert operation will halt.
	*/
	public function validateAdd( $adapter, $o )
	{
		$result = new ValidationResult();

		//Check Application Name
		if(SoondaUtil::CheckEmpty( $o->ApplicationName, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:ApplicationName}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "ApplicationName";
			return $result;
		}

		//Check Application Title
		if(SoondaUtil::CheckEmpty( $o->ApplicationTitle, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:ApplicationTitle}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "ApplicationTitle";
			return $result;
		}

		//Check Application Info
		if(SoondaUtil::CheckEmpty( $o->ApplicationInfo, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:ApplicationInfo}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "ApplicationInfo";
			return $result;
		}

		//Check Application Icon Small
		if(SoondaUtil::CheckEmpty( $o->ApplicationIconSmall, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:ApplicationIconSmall}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "ApplicationIconSmall";
			return $result;
		}

		//Check Application Icon Middle
		if(SoondaUtil::CheckEmpty( $o->ApplicationIconMiddle, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:ApplicationIconMiddle}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "ApplicationIconMiddle";
			return $result;
		}

		//Check Application Icon Large
		if(SoondaUtil::CheckEmpty( $o->ApplicationIconLarge, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:ApplicationIconLarge}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "ApplicationIconLarge";
			return $result;
		}

		//Check Application Path
		if(SoondaUtil::CheckEmpty( $o->ApplicationPath, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:ApplicationPath}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "ApplicationPath";
			return $result;
		}

		//Check Application File
		if(SoondaUtil::CheckEmpty( $o->ApplicationFile, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:ApplicationFile}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "ApplicationFile";
			return $result;
		}

		//Check Application Class
		if(SoondaUtil::CheckEmpty( $o->ApplicationClass, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:ApplicationClass}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "ApplicationClass";
			return $result;
		}

		//Check Application Main Function
		if(SoondaUtil::CheckEmpty( $o->ApplicationMainFunction, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:ApplicationMainFunction}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "ApplicationMainFunction";
			return $result;
		}

		//Check Display Icon
		if(SoondaUtil::CheckEmpty( $o->DisplayIcon, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:DisplayIcon}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "DisplayIcon";
			return $result;
		}

		//Check Is Active
		if(SoondaUtil::CheckEmpty( $o->IsActive, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:IsActive}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "IsActive";
			return $result;
		}

		//Check Use Workflow
		if(SoondaUtil::CheckEmpty( $o->UseWorkflow, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:UseWorkflow}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "UseWorkflow";
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
	*	This function vailidate Application Module data during edit operation. Return true if ok, false of not ok.
	*	When it returns false, the insert operation will halt.
	*/
	public function validateEdit( $adapter, $o )
	{
		$result = new ValidationResult();

		//Check Application Name
		if(SoondaUtil::CheckEmpty( $o->ApplicationName, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:ApplicationName}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "ApplicationName";
			return $result;
		}

		//Check Application Title
		if(SoondaUtil::CheckEmpty( $o->ApplicationTitle, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:ApplicationTitle}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "ApplicationTitle";
			return $result;
		}

		//Check Application Info
		if(SoondaUtil::CheckEmpty( $o->ApplicationInfo, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:ApplicationInfo}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "ApplicationInfo";
			return $result;
		}

		//Check Application Icon Small
		if(SoondaUtil::CheckEmpty( $o->ApplicationIconSmall, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:ApplicationIconSmall}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "ApplicationIconSmall";
			return $result;
		}

		//Check Application Icon Middle
		if(SoondaUtil::CheckEmpty( $o->ApplicationIconMiddle, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:ApplicationIconMiddle}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "ApplicationIconMiddle";
			return $result;
		}

		//Check Application Icon Large
		if(SoondaUtil::CheckEmpty( $o->ApplicationIconLarge, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:ApplicationIconLarge}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "ApplicationIconLarge";
			return $result;
		}

		//Check Application Path
		if(SoondaUtil::CheckEmpty( $o->ApplicationPath, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:ApplicationPath}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "ApplicationPath";
			return $result;
		}

		//Check Application File
		if(SoondaUtil::CheckEmpty( $o->ApplicationFile, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:ApplicationFile}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "ApplicationFile";
			return $result;
		}

		//Check Application Class
		if(SoondaUtil::CheckEmpty( $o->ApplicationClass, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:ApplicationClass}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "ApplicationClass";
			return $result;
		}

		//Check Application Main Function
		if(SoondaUtil::CheckEmpty( $o->ApplicationMainFunction, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:ApplicationMainFunction}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "ApplicationMainFunction";
			return $result;
		}

		//Check Display Icon
		if(SoondaUtil::CheckEmpty( $o->DisplayIcon, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:DisplayIcon}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "DisplayIcon";
			return $result;
		}

		//Check Is Active
		if(SoondaUtil::CheckEmpty( $o->IsActive, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:IsActive}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "IsActive";
			return $result;
		}

		//Check Use Workflow
		if(SoondaUtil::CheckEmpty( $o->UseWorkflow, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:UseWorkflow}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "UseWorkflow";
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
	*	This function update Application Module data during edit operation. Return true if ok, false of not ok.
	*	When it returns false, the edit operation will halt.
	*/
	public function update(  $adapter, $o )
	{
	
		$prevo = null;
		//We try to get the previous data before update, to delete files.
		$prevo = $adapter->getDetail( $o->IdApplication);
	
		//Update the Application Module data
		$res = parent::update( $adapter, $o );

		//If the update succeeds
		if( $res->succeed )
		{
	
			//Check if ApplicationIconSmall file exists. If it does, delete it.
			if( file_exists( $prevo->ApplicationIconSmall ) && $o->ApplicationIconSmall != $prevo->ApplicationIconSmall )
			{
				unlink($prevo->ApplicationIconSmall);
			}
	
			//Check if ApplicationIconMiddle file exists. If it does, delete it.
			if( file_exists( $prevo->ApplicationIconMiddle ) && $o->ApplicationIconMiddle != $prevo->ApplicationIconMiddle )
			{
				unlink($prevo->ApplicationIconMiddle);
			}
	
			//Check if ApplicationIconLarge file exists. If it does, delete it.
			if( file_exists( $prevo->ApplicationIconLarge ) && $o->ApplicationIconLarge != $prevo->ApplicationIconLarge )
			{
				unlink($prevo->ApplicationIconLarge);
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
	*	This function delete Application Module data during delete operation. Return true if ok, false of not ok.
	*	When it returns false, the delete operation will halt.
	*/
	public function delete(  $adapter, $o )
	{
		$res = parent::delete( $adapter, $o );
		if( $res->succeed)
		{
	
			if( file_exists( $o->ApplicationIconSmall ) )
			{
				unlink($o->ApplicationIconSmall);
			}
			if( file_exists( $o->ApplicationIconMiddle ) )
			{
				unlink($o->ApplicationIconMiddle);
			}
			if( file_exists( $o->ApplicationIconLarge ) )
			{
				unlink($o->ApplicationIconLarge);
			}
	
		}
		return $res;
	}

}




?>