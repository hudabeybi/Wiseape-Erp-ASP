<?php

class ProcessGroupModuleDetailPage extends SoondaPageView
{
	function render( $pageParam, $filename = "" )
	{
		$html = parent::render( $pageParam, $filename );
		$html = $this->displayData( $html, $pageParam->Data );

		$html = $this->displayDetailDataProcessModule( $html, $pageParam );
		$html = parent::SetOtherThings( $pageParam, $html, "ProcessGroupModule" );
		return $html;
	}

	function displayData( $html, $data)
	{

		$html = str_replace( "{SOO.DATA:ProcessGroupName}", $data->ProcessGroupName, $html);

		$html = str_replace( "{SOO.DATA:ProcessGroupTitle}", $data->ProcessGroupTitle, $html);

		$html = str_replace( "{SOO.DATA:ProcessGroupInfo}", $data->ProcessGroupInfo, $html);

		$html = str_replace( "{SOO.DATA:IconSmall}", $data->IconSmall, $html);

		$html = str_replace( "{SOO.DATA:IconMiddle}", $data->IconMiddle, $html);

		$html = str_replace( "{SOO.DATA:IconLarge}", $data->IconLarge, $html);

		$html = str_replace( "{SOO.DATA:IsActive}", $data->IsActive, $html);

		$html = str_replace( "{SOO.DATA:IsDisplay}", $data->IsDisplay, $html);

		return $html;
	}

	/*
	Function: displayDetailDataProcessModule()
	Desc	: Function to display the list of ProcessModule
	Param	:
	- html, the html string of the page template
	- data,	data to be displayed
	*/
	function displayDetailDataProcessModule( $html, $param )
	{
		$html = parent::renderDetails( $html, "com_ProcessModule", $param->Data->ProcessModules );
		return $html;
	}


/*
	Function: getButtonContainer()
	Desc	: this function overrides parent's getButtonContainer() function. 
	This function will be called by  parent's render function. It returns the HTML element ID that will hold the buttons.
	Param	: 
	- 
	Return :
	-	ID string of HTML element that holds the buttons.
	*/
	public function getButtonContainer()
	{
		return "div-button-container";
	}

	/*
	Function: addButtons()
	Desc	: this function overrides parent's addButtons() function. This function will be called by  parent's render function.	  
	Param	: 
	- 
	*/
	public function addButtons()
	{
		//Add default 'Back' Button
		parent::addButtons();
	}
}

?>