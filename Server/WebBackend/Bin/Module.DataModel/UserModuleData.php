<?php
/*
* This file is generated using SoondaCodeGenerator Pluggin for Soonda Application Builder Code Generator.
* Don't modify this file directly.
* This file may be replaced during re-code generation, any changes to this file may be replaced.
* Instead, Create new file and class that inherits this class to add functionality and modification.
*/

/***********************************************************************
* 
* 	File Name: UserModuleData.php
* 	Created Date: 6/5/2017 5:31:37 PM
* 
* **********************************************************************/

/*
* Class Name	: UserModuleData
* Description	: Data Container Class for UserModule module, including its lookups and children, if exist.
*/
class UserModuleData extends user
{
	//var properties


	function __construct()
	{

	}//end of constructor



}//End of php class

/*
* Class Name	: ViewUserModuleData
* Description	: View Class for UserModule module
*/
class ViewUserModuleData extends UserModuleData
{
	//Properties from lookup tables.


}

/*
* Class Name	: UserModuleFormViewData
* Description	: Form Data Class for UserModule Form-Viewing.
*/
class UserModuleFormViewData extends SoondaData
{
	//Lookup Data Containers

	
	/* ViewUserModuleData object */
	var $_UserModuleData;
	protected function _get_UserModuleData()
	{
		return $this->_UserModuleData;
	}
	protected function _set_UserModuleData($value)
	{
		$this->_UserModuleData = $value;
	}
}


?>