<?php
/*
* This file is generated using SoondaCodeGenerator Pluggin for Soonda Application Builder Code Generator.
* Don't modify this file directly.
* This file may be replaced during re-code generation, any changes to this file may be replaced.
* Instead, Create new file and class that inherits this class to add functionality and modification.
*/

/***********************************************************************
* 
* 	File Name: WorkflowModuleData.php
* 	Created Date: 7/25/2017 3:32:44 PM
* 
* **********************************************************************/

/*
* Class Name	: WorkflowModuleData
* Description	: Data Container Class for WorkflowModule module, including its lookups and children, if exist.
*/
class WorkflowModuleData extends workflow
{
	//var properties


	function __construct()
	{

	}//end of constructor



}//End of php class

/*
* Class Name	: ViewWorkflowModuleData
* Description	: View Class for WorkflowModule module
*/
class ViewWorkflowModuleData extends WorkflowModuleData
{
	//Properties from lookup tables.


}

/*
* Class Name	: WorkflowModuleFormViewData
* Description	: Form Data Class for WorkflowModule Form-Viewing.
*/
class WorkflowModuleFormViewData extends SoondaData
{
	//Lookup Data Containers

	
	/* ViewWorkflowModuleData object */
	var $_WorkflowModuleData;
	protected function _get_WorkflowModuleData()
	{
		return $this->_WorkflowModuleData;
	}
	protected function _set_WorkflowModuleData($value)
	{
		$this->_WorkflowModuleData = $value;
	}
}


?>