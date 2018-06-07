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
* 	Created Date: 6/5/2017 3:40:29 PM
* 
* **********************************************************************/

/*
* Class Name	: ProcessGroupModuleData
* Description	: Data Container Class for ProcessGroupModule module, including its lookups and children, if exist.
*/
class ProcessGroupModuleData extends processgroup
{
	//var properties

	//Children property: Array of ProcessModule;
	var $ProcessModules;


	function __construct()
	{

		$this->ProcessModules = array();

	}//end of constructor


	//Add ProcessModule;
	public function addProcessModule( $ProcessModule)
	{
		$ProcessModule->ProcessGroupId = $this->IdProcessGroup;
		array_push( $this->ProcessModules, $ProcessModule);
	}

	//Set the parent Id for this data
	public function setAllProcessModuleParent()
	{
		foreach($this->ProcessModules as $key => $item)
		{
			$item->ProcessGroupId = $this->IdProcessGroup;
		}
	}

	//Insert ProcessModule;
	public function insertProcessModule( $ProcessModule, $indexAt)
	{
		$ProcessModule->ProcessGroupId = $this->IdProcessGroup;
		array_splice($this->ProcessModules, $indexAt, 0, $ProcessModule);
	}

	//get ProcessModule by index;
	public function getProcessModule( $index)
	{
		return $this->ProcessModules[$index];
	}

	//remove ProcessModule by index;
	public function removeProcessModuleAt( $index)
	{
		unset( $this->ProcessModules[$index]);
		$this->ProcessModules =  array_values( $this->ProcessModules);
	}

	//remove ProcessModule by object;
	public function removeProcessModule( $ProcessModule)
	{
		foreach($this->ProcessModules as $key => $value) 
		{
			if($value == $ProcessModule) 
			{
				unset($array[$key]);
				$this->ProcessModules = array_values( $this->ProcessModules );
				break;
			}
		}
	}
	
	// Get the total of ProcessModule data.
	public function totalProcessModule()
	{
		return count( $this->ProcessModules );
	}


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