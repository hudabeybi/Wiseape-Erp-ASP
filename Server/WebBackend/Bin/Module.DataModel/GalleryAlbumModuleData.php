<?php
/*
* This file is generated using SoondaCodeGenerator Pluggin for Soonda Application Builder Code Generator.
* Don't modify this file directly.
* This file may be replaced during re-code generation, any changes to this file may be replaced.
* Instead, Create new file and class that inherits this class to add functionality and modification.
*/

/***********************************************************************
* 
* 	File Name: GalleryAlbumModuleData.php
* 	Created Date: 6/7/2017 12:29:15 AM
* 
* **********************************************************************/

/*
* Class Name	: GalleryAlbumModuleData
* Description	: Data Container Class for GalleryAlbumModule module, including its lookups and children, if exist.
*/
class GalleryAlbumModuleData extends galleryalbum
{
	//var properties


	function __construct()
	{

	}//end of constructor



}//End of php class

/*
* Class Name	: ViewGalleryAlbumModuleData
* Description	: View Class for GalleryAlbumModule module
*/
class ViewGalleryAlbumModuleData extends GalleryAlbumModuleData
{
	//Properties from lookup tables.


}

/*
* Class Name	: GalleryAlbumModuleFormViewData
* Description	: Form Data Class for GalleryAlbumModule Form-Viewing.
*/
class GalleryAlbumModuleFormViewData extends SoondaData
{
	//Lookup Data Containers

	
	/* ViewGalleryAlbumModuleData object */
	var $_GalleryAlbumModuleData;
	protected function _get_GalleryAlbumModuleData()
	{
		return $this->_GalleryAlbumModuleData;
	}
	protected function _set_GalleryAlbumModuleData($value)
	{
		$this->_GalleryAlbumModuleData = $value;
	}
}


?>