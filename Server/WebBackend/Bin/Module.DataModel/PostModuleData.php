<?php
/*
* This file is generated using SoondaCodeGenerator Pluggin for Soonda Application Builder Code Generator.
* Don't modify this file directly.
* This file may be replaced during re-code generation, any changes to this file may be replaced.
* Instead, Create new file and class that inherits this class to add functionality and modification.
*/

/***********************************************************************
* 
* 	File Name: PostModuleData.php
* 	Created Date: 6/5/2017 5:31:40 PM
* 
* **********************************************************************/

/*
* Class Name	: PostModuleData
* Description	: Data Container Class for PostModule module, including its lookups and children, if exist.
*/
class PostModuleData extends post
{
	//var properties


	function __construct()
	{

	}//end of constructor



}//End of php class

/*
* Class Name	: ViewPostModuleData
* Description	: View Class for PostModule module
*/
class ViewPostModuleData extends PostModuleData
{
	//Properties from lookup tables.


}

/*
* Class Name	: PostModuleFormViewData
* Description	: Form Data Class for PostModule Form-Viewing.
*/
class PostModuleFormViewData extends SoondaData
{
	//Lookup Data Containers

	
	/* ViewPostModuleData object */
	var $_PostModuleData;
	protected function _get_PostModuleData()
	{
		return $this->_PostModuleData;
	}
	protected function _set_PostModuleData($value)
	{
		$this->_PostModuleData = $value;
	}
}


?>