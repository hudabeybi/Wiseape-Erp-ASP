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
* 	File Name: PostModuleBO.php
* 	Created Date: 6/5/2017 5:31:43 PM
*   Description:
*	This class contains functions of logic of the Post.
*	
* **********************************************************************/

class PostModuleLogic extends SoondaLogic
{

	/*
	*	Function: getLookupData( $adapter )
	*	Parameter: 
	*	- $adapter, data adapter object that will be used by the function. 
	*	Return value: array of all lookup data for Post form. 
	*	Description:
	*	Return all lookup data for Post form. These lookup data will be used for lookup comboboxes.
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
	*	This function vailidate Post data during add operation. Return true if ok, false of not ok.
	*	When it returns false, the insert operation will halt.
	*/
	public function validateAdd( $adapter, $o )
	{
		$result = new ValidationResult();

		//Check Post Title
		if(SoondaUtil::CheckEmpty( $o->PostTitle, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:PostTitle}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "PostTitle";
			return $result;
		}

		//Check Post Sub Title
		if(SoondaUtil::CheckEmpty( $o->PostSubTitle, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:PostSubTitle}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "PostSubTitle";
			return $result;
		}

		//Check Post Date
		if(SoondaUtil::CheckEmpty( $o->PostDate, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:PostDate}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "PostDate";
			return $result;
		}

		//Check Post Short Text
		if(SoondaUtil::CheckEmpty( $o->PostShortText, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:PostShortText}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "PostShortText";
			return $result;
		}

		//Check Post Text
		if(SoondaUtil::CheckEmpty( $o->PostText, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:PostText}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "PostText";
			return $result;
		}

		//Check Post Main Image
		if(SoondaUtil::CheckEmpty( $o->PostMainImage, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:PostMainImage}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "PostMainImage";
			return $result;
		}

		//Check Posted By Id
		if(SoondaUtil::CheckEmpty( $o->PostedById, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:PostedById}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "PostedById";
			return $result;
		}

		//Check Is Active
		if(SoondaUtil::CheckEmpty( $o->IsActive, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:IsActive}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "IsActive";
			return $result;
		}

		//Check Post Tag
		if(SoondaUtil::CheckEmpty( $o->PostTag, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:PostTag}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "PostTag";
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
	*	This function vailidate Post data during edit operation. Return true if ok, false of not ok.
	*	When it returns false, the insert operation will halt.
	*/
	public function validateEdit( $adapter, $o )
	{
		$result = new ValidationResult();

		//Check Post Title
		if(SoondaUtil::CheckEmpty( $o->PostTitle, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:PostTitle}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "PostTitle";
			return $result;
		}

		//Check Post Sub Title
		if(SoondaUtil::CheckEmpty( $o->PostSubTitle, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:PostSubTitle}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "PostSubTitle";
			return $result;
		}

		//Check Post Date
		if(SoondaUtil::CheckEmpty( $o->PostDate, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:PostDate}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "PostDate";
			return $result;
		}

		//Check Post Short Text
		if(SoondaUtil::CheckEmpty( $o->PostShortText, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:PostShortText}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "PostShortText";
			return $result;
		}

		//Check Post Text
		if(SoondaUtil::CheckEmpty( $o->PostText, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:PostText}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "PostText";
			return $result;
		}

		//Check Post Main Image
		if(SoondaUtil::CheckEmpty( $o->PostMainImage, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:PostMainImage}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "PostMainImage";
			return $result;
		}

		//Check Posted By Id
		if(SoondaUtil::CheckEmpty( $o->PostedById, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:PostedById}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "PostedById";
			return $result;
		}

		//Check Is Active
		if(SoondaUtil::CheckEmpty( $o->IsActive, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:IsActive}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "IsActive";
			return $result;
		}

		//Check Post Tag
		if(SoondaUtil::CheckEmpty( $o->PostTag, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:PostTag}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "PostTag";
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
	*	This function update Post data during edit operation. Return true if ok, false of not ok.
	*	When it returns false, the edit operation will halt.
	*/
	public function update(  $adapter, $o )
	{
	
		$prevo = null;
		//We try to get the previous data before update, to delete files.
		$prevo = $adapter->getDetail( $o->IdPost);
	
		//Update the Post data
		$res = parent::update( $adapter, $o );

		//If the update succeeds
		if( $res->succeed )
		{
	
			//Check if PostMainImage file exists. If it does, delete it.
			if( file_exists( $prevo->PostMainImage ) && $o->PostMainImage != $prevo->PostMainImage )
			{
				unlink($prevo->PostMainImage);
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
	*	This function delete Post data during delete operation. Return true if ok, false of not ok.
	*	When it returns false, the delete operation will halt.
	*/
	public function delete(  $adapter, $o )
	{
		$res = parent::delete( $adapter, $o );
		if( $res->succeed)
		{
	
			if( file_exists( $o->PostMainImage ) )
			{
				unlink($o->PostMainImage);
			}
	
		}
		return $res;
	}

}




?>