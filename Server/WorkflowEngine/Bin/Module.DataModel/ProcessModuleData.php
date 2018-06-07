<?php
/*
* This file is generated using SoondaCodeGenerator Pluggin for Soonda Application Builder Code Generator.
* Don't modify this file directly.
* This file may be replaced during re-code generation, any changes to this file may be replaced.
* Instead, Create new file and class that inherits this class to add functionality and modification.
*/

/***********************************************************************
* 
* 	File Name: ProcessModuleData.php
* 	Created Date: 6/5/2017 3:40:33 PM
* 
* **********************************************************************/

/*
* Class Name	: ProcessModuleData
* Description	: Data Container Class for ProcessModule module, including its lookups and children, if exist.
*/
class ProcessModuleData extends process
{
	//var properties


	function __construct()
	{

	}//end of constructor



}//End of php class

/*
* Class Name	: ViewProcessModuleData
* Description	: View Class for ProcessModule module
*/
class ViewProcessModuleData extends ProcessModuleData
{
	//Properties from lookup tables.


}

/*
* Class Name	: ProcessModuleFormViewData
* Description	: Form Data Class for ProcessModule Form-Viewing.
*/
class ProcessModuleFormViewData extends SoondaData
{
	//Lookup Data Containers

	
	/* ViewProcessModuleData object */
	var $_ProcessModuleData;
	protected function _get_ProcessModuleData()
	{
		return $this->_ProcessModuleData;
	}
	protected function _set_ProcessModuleData($value)
	{
		$this->_ProcessModuleData = $value;
	}
}


?>