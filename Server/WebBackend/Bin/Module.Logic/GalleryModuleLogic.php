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
* 	File Name: GalleryModuleBO.php
* 	Created Date: 6/7/2017 1:49:58 AM
*   Description:
*	This class contains functions of logic of the Gallery.
*	
* **********************************************************************/

class GalleryModuleLogic extends SoondaLogic
{

	/*
	*	Function: getLookupData( $adapter )
	*	Parameter: 
	*	- $adapter, data adapter object that will be used by the function. 
	*	Return value: array of all lookup data for Gallery form. 
	*	Description:
	*	Return all lookup data for Gallery form. These lookup data will be used for lookup comboboxes.
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
	*	This function vailidate Gallery data during add operation. Return true if ok, false of not ok.
	*	When it returns false, the insert operation will halt.
	*/
	public function validateAdd( $adapter, $o )
	{
		$result = new ValidationResult();

		//Check Gallery Caption
		if(SoondaUtil::CheckEmpty( $o->GalleryCaption, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:GalleryCaption}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "GalleryCaption";
			return $result;
		}

		//Check Image Date
		if(SoondaUtil::CheckEmpty( $o->ImageDate, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:ImageDate}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "ImageDate";
			return $result;
		}

		//Check Image Url
		if(SoondaUtil::CheckEmpty( $o->ImageUrl, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:ImageUrl}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "ImageUrl";
			return $result;
		}

		//Check Gallery Album
		if(SoondaUtil::CheckEmpty( $o->GalleryAlbumId, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:GalleryAlbumId}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "GalleryAlbumId";
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
	*	This function vailidate Gallery data during edit operation. Return true if ok, false of not ok.
	*	When it returns false, the insert operation will halt.
	*/
	public function validateEdit( $adapter, $o )
	{
		$result = new ValidationResult();

		//Check Gallery Caption
		if(SoondaUtil::CheckEmpty( $o->GalleryCaption, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:GalleryCaption}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "GalleryCaption";
			return $result;
		}

		//Check Image Date
		if(SoondaUtil::CheckEmpty( $o->ImageDate, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:ImageDate}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "ImageDate";
			return $result;
		}

		//Check Image Url
		if(SoondaUtil::CheckEmpty( $o->ImageUrl, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:ImageUrl}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "ImageUrl";
			return $result;
		}

		//Check Gallery Album
		if(SoondaUtil::CheckEmpty( $o->GalleryAlbumId, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:GalleryAlbumId}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "GalleryAlbumId";
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
	*	This function update Gallery data during edit operation. Return true if ok, false of not ok.
	*	When it returns false, the edit operation will halt.
	*/
	public function update(  $adapter, $o )
	{
	
		$prevo = null;
		//We try to get the previous data before update, to delete files.
		$prevo = $adapter->getDetail( $o->IdGallery);
	
		//Update the Gallery data
		$res = parent::update( $adapter, $o );

		//If the update succeeds
		if( $res->succeed )
		{
	
			//Check if ImageUrl file exists. If it does, delete it.
			if( file_exists( $prevo->ImageUrl ) && $o->ImageUrl != $prevo->ImageUrl )
			{
				unlink($prevo->ImageUrl);
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
	*	This function delete Gallery data during delete operation. Return true if ok, false of not ok.
	*	When it returns false, the delete operation will halt.
	*/
	public function delete(  $adapter, $o )
	{
		$res = parent::delete( $adapter, $o );
		if( $res->succeed)
		{
	
			if( file_exists( $o->ImageUrl ) )
			{
				unlink($o->ImageUrl);
			}
	
		}
		return $res;
	}

}




?>