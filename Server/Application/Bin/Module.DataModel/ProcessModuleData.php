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
* 	Created Date: 7/21/2017 3:23:47 PM
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

	var $application_IdApplication;
	public function _get_application_IdApplication()
	{
		return $this->application_IdApplication;
	}
	public function _set_application_IdApplication($value)
	{
		$this->application_IdApplication = $value;
	}

	var $application_ApplicationName;
	public function _get_application_ApplicationName()
	{
		return $this->application_ApplicationName;
	}
	public function _set_application_ApplicationName($value)
	{
		$this->application_ApplicationName = $value;
	}

	var $application_ApplicationTitle;
	public function _get_application_ApplicationTitle()
	{
		return $this->application_ApplicationTitle;
	}
	public function _set_application_ApplicationTitle($value)
	{
		$this->application_ApplicationTitle = $value;
	}

	var $application_ApplicationInfo;
	public function _get_application_ApplicationInfo()
	{
		return $this->application_ApplicationInfo;
	}
	public function _set_application_ApplicationInfo($value)
	{
		$this->application_ApplicationInfo = $value;
	}

	var $application_ApplicationIconSmall;
	public function _get_application_ApplicationIconSmall()
	{
		return $this->application_ApplicationIconSmall;
	}
	public function _set_application_ApplicationIconSmall($value)
	{
		$this->application_ApplicationIconSmall = $value;
	}

	var $application_ApplicationIconMiddle;
	public function _get_application_ApplicationIconMiddle()
	{
		return $this->application_ApplicationIconMiddle;
	}
	public function _set_application_ApplicationIconMiddle($value)
	{
		$this->application_ApplicationIconMiddle = $value;
	}

	var $application_ApplicationIconLarge;
	public function _get_application_ApplicationIconLarge()
	{
		return $this->application_ApplicationIconLarge;
	}
	public function _set_application_ApplicationIconLarge($value)
	{
		$this->application_ApplicationIconLarge = $value;
	}

	var $application_ApplicationPath;
	public function _get_application_ApplicationPath()
	{
		return $this->application_ApplicationPath;
	}
	public function _set_application_ApplicationPath($value)
	{
		$this->application_ApplicationPath = $value;
	}

	var $application_ApplicationFile;
	public function _get_application_ApplicationFile()
	{
		return $this->application_ApplicationFile;
	}
	public function _set_application_ApplicationFile($value)
	{
		$this->application_ApplicationFile = $value;
	}

	var $application_ApplicationClass;
	public function _get_application_ApplicationClass()
	{
		return $this->application_ApplicationClass;
	}
	public function _set_application_ApplicationClass($value)
	{
		$this->application_ApplicationClass = $value;
	}

	var $application_ApplicationMainFunction;
	public function _get_application_ApplicationMainFunction()
	{
		return $this->application_ApplicationMainFunction;
	}
	public function _set_application_ApplicationMainFunction($value)
	{
		$this->application_ApplicationMainFunction = $value;
	}

	var $application_DisplayIcon;
	public function _get_application_DisplayIcon()
	{
		return $this->application_DisplayIcon;
	}
	public function _set_application_DisplayIcon($value)
	{
		$this->application_DisplayIcon = $value;
	}

	var $application_IsActive;
	public function _get_application_IsActive()
	{
		return $this->application_IsActive;
	}
	public function _set_application_IsActive($value)
	{
		$this->application_IsActive = $value;
	}

	var $application_UseWorkflow;
	public function _get_application_UseWorkflow()
	{
		return $this->application_UseWorkflow;
	}
	public function _set_application_UseWorkflow($value)
	{
		$this->application_UseWorkflow = $value;
	}

	var $workflow_IdWorkflow;
	public function _get_workflow_IdWorkflow()
	{
		return $this->workflow_IdWorkflow;
	}
	public function _set_workflow_IdWorkflow($value)
	{
		$this->workflow_IdWorkflow = $value;
	}

	var $workflow_WorkflowNo;
	public function _get_workflow_WorkflowNo()
	{
		return $this->workflow_WorkflowNo;
	}
	public function _set_workflow_WorkflowNo($value)
	{
		$this->workflow_WorkflowNo = $value;
	}

	var $workflow_WorkflowName;
	public function _get_workflow_WorkflowName()
	{
		return $this->workflow_WorkflowName;
	}
	public function _set_workflow_WorkflowName($value)
	{
		$this->workflow_WorkflowName = $value;
	}

	var $workflow_WorkflowDesc;
	public function _get_workflow_WorkflowDesc()
	{
		return $this->workflow_WorkflowDesc;
	}
	public function _set_workflow_WorkflowDesc($value)
	{
		$this->workflow_WorkflowDesc = $value;
	}

	var $processgroup_IdProcessGroup;
	public function _get_processgroup_IdProcessGroup()
	{
		return $this->processgroup_IdProcessGroup;
	}
	public function _set_processgroup_IdProcessGroup($value)
	{
		$this->processgroup_IdProcessGroup = $value;
	}

	var $processgroup_ProcessGroupName;
	public function _get_processgroup_ProcessGroupName()
	{
		return $this->processgroup_ProcessGroupName;
	}
	public function _set_processgroup_ProcessGroupName($value)
	{
		$this->processgroup_ProcessGroupName = $value;
	}

	var $processgroup_ProcessGroupTitle;
	public function _get_processgroup_ProcessGroupTitle()
	{
		return $this->processgroup_ProcessGroupTitle;
	}
	public function _set_processgroup_ProcessGroupTitle($value)
	{
		$this->processgroup_ProcessGroupTitle = $value;
	}

	var $processgroup_ProcessGroupInfo;
	public function _get_processgroup_ProcessGroupInfo()
	{
		return $this->processgroup_ProcessGroupInfo;
	}
	public function _set_processgroup_ProcessGroupInfo($value)
	{
		$this->processgroup_ProcessGroupInfo = $value;
	}

	var $processgroup_IconSmall;
	public function _get_processgroup_IconSmall()
	{
		return $this->processgroup_IconSmall;
	}
	public function _set_processgroup_IconSmall($value)
	{
		$this->processgroup_IconSmall = $value;
	}

	var $processgroup_IconMiddle;
	public function _get_processgroup_IconMiddle()
	{
		return $this->processgroup_IconMiddle;
	}
	public function _set_processgroup_IconMiddle($value)
	{
		$this->processgroup_IconMiddle = $value;
	}

	var $processgroup_IconLarge;
	public function _get_processgroup_IconLarge()
	{
		return $this->processgroup_IconLarge;
	}
	public function _set_processgroup_IconLarge($value)
	{
		$this->processgroup_IconLarge = $value;
	}

	var $processgroup_IsActive;
	public function _get_processgroup_IsActive()
	{
		return $this->processgroup_IsActive;
	}
	public function _set_processgroup_IsActive($value)
	{
		$this->processgroup_IsActive = $value;
	}

	var $processgroup_IsDisplay;
	public function _get_processgroup_IsDisplay()
	{
		return $this->processgroup_IsDisplay;
	}
	public function _set_processgroup_IsDisplay($value)
	{
		$this->processgroup_IsDisplay = $value;
	}


}

/*
* Class Name	: ProcessModuleFormViewData
* Description	: Form Data Class for ProcessModule Form-Viewing.
*/
class ProcessModuleFormViewData extends SoondaData
{
	//Lookup Data Containers

	/* Lookup data from table 'application' */
	var $application_LookupData;
	protected function _get_application_LookupData()
	{
		return $this->application_LookupData;
	}
	protected function _set_application_LookupData($value)
	{
		$this->application_LookupData = $value;
	}


	/* Lookup data from table 'workflow' */
	var $workflow_LookupData;
	protected function _get_workflow_LookupData()
	{
		return $this->workflow_LookupData;
	}
	protected function _set_workflow_LookupData($value)
	{
		$this->workflow_LookupData = $value;
	}


	/* Lookup data from table 'processgroup' */
	var $processgroup_LookupData;
	protected function _get_processgroup_LookupData()
	{
		return $this->processgroup_LookupData;
	}
	protected function _set_processgroup_LookupData($value)
	{
		$this->processgroup_LookupData = $value;
	}


	
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