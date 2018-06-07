<?php
/*
* This file is generated using SoondaCodeGenerator Pluggin for Soonda Application Builder Code Generator.
* Don't modify this file directly.
* This file may be replaced during re-code generation, any changes to this file may be replaced.
* Instead, Create new file and class that inherits this class to add functionality and modification.
*/

/***********************************************************************
* 
* 	File Name: UserGroupModuleData.php
* 	Created Date: 6/5/2017 5:31:51 PM
* 
* **********************************************************************/

/*
* Class Name	: UserGroupModuleData
* Description	: Data Container Class for UserGroupModule module, including its lookups and children, if exist.
*/
class UserGroupModuleData extends usergroup
{
	//var properties


	function __construct()
	{

	}//end of constructor



}//End of php class

/*
* Class Name	: ViewUserGroupModuleData
* Description	: View Class for UserGroupModule module
*/
class ViewUserGroupModuleData extends UserGroupModuleData
{
	//Properties from lookup tables.


}

/*
* Class Name	: UserGroupModuleFormViewData
* Description	: Form Data Class for UserGroupModule Form-Viewing.
*/
class UserGroupModuleFormViewData extends SoondaData
{
	//Lookup Data Containers

	
	/* ViewUserGroupModuleData object */
	var $_UserGroupModuleData;
	protected function _get_UserGroupModuleData()
	{
		return $this->_UserGroupModuleData;
	}
	protected function _set_UserGroupModuleData($value)
	{
		$this->_UserGroupModuleData = $value;
	}
}


?>