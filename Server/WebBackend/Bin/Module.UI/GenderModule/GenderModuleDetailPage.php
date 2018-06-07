<?php

class GenderModuleDetailPage extends SoondaPageView
{
	function render( $pageParam, $filename = "" )
	{
		$html = parent::render( $pageParam, $filename );
		$html = $this->displayData( $html, $pageParam->Data );

		$html = parent::SetOtherThings( $pageParam, $html, "GenderModule" );
		return $html;
	}

	function displayData( $html, $data)
	{

		$html = str_replace( "{SOO.DATA:GenderName}", $data->GenderName, $html);

		$html = str_replace( "{SOO.DATA:GenderInfo}", $data->GenderInfo, $html);

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