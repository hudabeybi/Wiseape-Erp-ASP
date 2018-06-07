<?php
/*
* This file is generated using SoondaCodeGenerator Pluggin for Soonda Application Builder Code Generator.
* Don't modify this file directly.
* This file may be replaced during re-code generation, any changes to this file may be replaced.
* Instead, Create new file and class that inherits this class to add functionality and modification.
*/

/***********************************************************************
* 
* 	File Name: GenderModuleData.php
* 	Created Date: 6/5/2017 5:31:47 PM
* 
* **********************************************************************/

/*
* Class Name	: GenderModuleData
* Description	: Data Container Class for GenderModule module, including its lookups and children, if exist.
*/
class GenderModuleData extends gender
{
	//var properties


	function __construct()
	{

	}//end of constructor



}//End of php class

/*
* Class Name	: ViewGenderModuleData
* Description	: View Class for GenderModule module
*/
class ViewGenderModuleData extends GenderModuleData
{
	//Properties from lookup tables.


}

/*
* Class Name	: GenderModuleFormViewData
* Description	: Form Data Class for GenderModule Form-Viewing.
*/
class GenderModuleFormViewData extends SoondaData
{
	//Lookup Data Containers

	
	/* ViewGenderModuleData object */
	var $_GenderModuleData;
	protected function _get_GenderModuleData()
	{
		return $this->_GenderModuleData;
	}
	protected function _set_GenderModuleData($value)
	{
		$this->_GenderModuleData = $value;
	}
}


?>