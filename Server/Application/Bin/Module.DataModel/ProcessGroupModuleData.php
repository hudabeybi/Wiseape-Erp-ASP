<?php
/*
* This file is generated using SoondaCodeGenerator Pluggin for Soonda Application Builder Code Generator.
* Don't modify this file directly.
* This file may be replaced during re-code generation, any changes to this file may be replaced.
* Instead, Create new file and class that inherits this class to add functionality and modification.
*/

/***********************************************************************
* 
* 	File Name: ProcessGroupModuleData.php
* 	Created Date: 7/21/2017 3:23:52 PM
* 
* **********************************************************************/

/*
* Class Name	: ProcessGroupModuleData
* Description	: Data Container Class for ProcessGroupModule module, including its lookups and children, if exist.
*/
class ProcessGroupModuleData extends processgroup
{
	//var properties


	function __construct()
	{

	}//end of constructor



}//End of php class

/*
* Class Name	: ViewProcessGroupModuleData
* Description	: View Class for ProcessGroupModule module
*/
class ViewProcessGroupModuleData extends ProcessGroupModuleData
{
	//Properties from lookup tables.


}

/*
* Class Name	: ProcessGroupModuleFormViewData
* Description	: Form Data Class for ProcessGroupModule Form-Viewing.
*/
class ProcessGroupModuleFormViewData extends SoondaData
{
	//Lookup Data Containers

	
	/* ViewProcessGroupModuleData object */
	var $_ProcessGroupModuleData;
	protected function _get_ProcessGroupModuleData()
	{
		return $this->_ProcessGroupModuleData;
	}
	protected function _set_ProcessGroupModuleData($value)
	{
		$this->_ProcessGroupModuleData = $value;
	}
}


?>