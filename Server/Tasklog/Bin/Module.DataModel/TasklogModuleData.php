<?php
/*
* This file is generated using SoondaCodeGenerator Pluggin for Soonda Application Builder Code Generator.
* Don't modify this file directly.
* This file may be replaced during re-code generation, any changes to this file may be replaced.
* Instead, Create new file and class that inherits this class to add functionality and modification.
*/

/***********************************************************************
* 
* 	File Name: TasklogModuleData.php
* 	Created Date: 7/25/2017 6:13:00 PM
* 
* **********************************************************************/

/*
* Class Name	: TasklogModuleData
* Description	: Data Container Class for TasklogModule module, including its lookups and children, if exist.
*/
class TasklogModuleData extends tasklog
{
	//var properties


	function __construct()
	{

	}//end of constructor



}//End of php class

/*
* Class Name	: ViewTasklogModuleData
* Description	: View Class for TasklogModule module
*/
class ViewTasklogModuleData extends TasklogModuleData
{
	//Properties from lookup tables.


}

/*
* Class Name	: TasklogModuleFormViewData
* Description	: Form Data Class for TasklogModule Form-Viewing.
*/
class TasklogModuleFormViewData extends SoondaData
{
	//Lookup Data Containers

	
	/* ViewTasklogModuleData object */
	var $_TasklogModuleData;
	protected function _get_TasklogModuleData()
	{
		return $this->_TasklogModuleData;
	}
	protected function _set_TasklogModuleData($value)
	{
		$this->_TasklogModuleData = $value;
	}
}


?>