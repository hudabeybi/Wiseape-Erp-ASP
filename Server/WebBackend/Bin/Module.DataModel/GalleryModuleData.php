<?php
/*
* This file is generated using SoondaCodeGenerator Pluggin for Soonda Application Builder Code Generator.
* Don't modify this file directly.
* This file may be replaced during re-code generation, any changes to this file may be replaced.
* Instead, Create new file and class that inherits this class to add functionality and modification.
*/

/***********************************************************************
* 
* 	File Name: GalleryModuleData.php
* 	Created Date: 6/7/2017 1:49:54 AM
* 
* **********************************************************************/

/*
* Class Name	: GalleryModuleData
* Description	: Data Container Class for GalleryModule module, including its lookups and children, if exist.
*/
class GalleryModuleData extends gallery
{
	//var properties


	function __construct()
	{

	}//end of constructor



}//End of php class

/*
* Class Name	: ViewGalleryModuleData
* Description	: View Class for GalleryModule module
*/
class ViewGalleryModuleData extends GalleryModuleData
{
	//Properties from lookup tables.


}

/*
* Class Name	: GalleryModuleFormViewData
* Description	: Form Data Class for GalleryModule Form-Viewing.
*/
class GalleryModuleFormViewData extends SoondaData
{
	//Lookup Data Containers

	
	/* ViewGalleryModuleData object */
	var $_GalleryModuleData;
	protected function _get_GalleryModuleData()
	{
		return $this->_GalleryModuleData;
	}
	protected function _set_GalleryModuleData($value)
	{
		$this->_GalleryModuleData = $value;
	}
}


?>