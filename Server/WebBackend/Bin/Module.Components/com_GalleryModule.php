<?php
/*
* This file is generated using SoondaCodeGenerator Pluggin for Soonda Application Builder Code Generator.
* Don't modify this file directly.
* This file may be replaced during re-code generation, any changes to this file may be replaced.
* Instead, Create new file and class that inherits this class to add functionality and modification.
*
* M. Huda (huda_ya@yahoo.co.uk)
*/

/***********************************************************************
* 
* 	File Name: com_GalleryModule.php
* 	Created Date: 6/7/2017 1:49:55 AM
*   Description:
*	This component class serves as controller object for Gallery.
*   This class handles all the view, detail, edit, add, delete, and other request from Gallery module.
*   This class inherits com_ListCtrl component
* **********************************************************************/


class com_GalleryModule extends com_ListCtrl
{

	function com_GalleryModule()
	{
		$this->componentName = "com_GalleryModule";
	
	}

	/*
	*	Function: run
	*	Parameter: none
	*	Return value: html string as the result of the operation.
	*	Description:
	*	This function is the main function of this component. It receives task request from client and execute functions according to the request.
	*	The default operation of the tasks are: View, Detail, Add, Edit, Delete
	*	Override this function to add more task.
	*/
	function run()
	{
		$html = "";

		//Retrieve task request, if no request specified, the default is 'view'.
		$task = $this->getTask("view");
		
		//Handle the task according to the task string
		switch( $task )
		{
			default:
				$html = parent::run();
		}
		return $html;
	}

	/*
	*	Function: getKeyField
	*	Parameter: none
	*	Return value: the name of the key field of the data schema used by this module.
	*	Description:
	*	Function to return the KeyField for this module. KeyField is a primary key field from the data schema used by this 
	*	module.
	*/
	function getKeyField()
	{
		return "IdGallery";
	}	


	/*
	*	Function: getSearchColumns()
	*	Parameter : none
	*	Return : array of column names used for searching
	*	Description:
	*	Function to return columns to be used against search operation.
	*/
	function getSearchColumns()
	{
		$cols = array();

		$cols [] = "gallery.GalleryCaption";

		$cols [] = "gallery.ImageDate";

		return $cols;
	}




}

?>