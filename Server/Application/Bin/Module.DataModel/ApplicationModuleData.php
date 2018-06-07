<?php
/*
* This file is generated using SoondaCodeGenerator Pluggin for Soonda Application Builder Code Generator.
* Don't modify this file directly.
* This file may be replaced during re-code generation, any changes to this file may be replaced.
* Instead, Create new file and class that inherits this class to add functionality and modification.
*/

/***********************************************************************
* 
* 	File Name: ApplicationModuleData.php
* 	Created Date: 7/21/2017 3:23:42 PM
* 
* **********************************************************************/

/*
* Class Name	: ApplicationModuleData
* Description	: Data Container Class for ApplicationModule module, including its lookups and children, if exist.
*/
class ApplicationModuleData extends application
{
	//var properties


	function __construct()
	{

	}//end of constructor



}//End of php class

/*
* Class Name	: ViewApplicationModuleData
* Description	: View Class for ApplicationModule module
*/
class ViewApplicationModuleData extends ApplicationModuleData
{
	//Properties from lookup tables.


}

/*
* Class Name	: ApplicationModuleFormViewData
* Description	: Form Data Class for ApplicationModule Form-Viewing.
*/
class ApplicationModuleFormViewData extends SoondaData
{
	//Lookup Data Containers

	
	/* ViewApplicationModuleData object */
	var $_ApplicationModuleData;
	protected function _get_ApplicationModuleData()
	{
		return $this->_ApplicationModuleData;
	}
	protected function _set_ApplicationModuleData($value)
	{
		$this->_ApplicationModuleData = $value;
	}
}


?>