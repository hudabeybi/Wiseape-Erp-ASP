<?php

class ApplicationModuleDetailPage extends SoondaPageView
{
	function render( $pageParam, $filename = "" )
	{
		$html = parent::render( $pageParam, $filename );
		$html = $this->displayData( $html, $pageParam->Data );

		$html = parent::SetOtherThings( $pageParam, $html, "ApplicationModule" );
		return $html;
	}

	function displayData( $html, $data)
	{

		$html = str_replace( "{SOO.DATA:ApplicationName}", $data->ApplicationName, $html);

		$html = str_replace( "{SOO.DATA:ApplicationTitle}", $data->ApplicationTitle, $html);

		$html = str_replace( "{SOO.DATA:ApplicationInfo}", $data->ApplicationInfo, $html);

		$html = str_replace( "{SOO.DATA:ApplicationIconSmall}", $data->ApplicationIconSmall, $html);

		$html = str_replace( "{SOO.DATA:ApplicationIconMiddle}", $data->ApplicationIconMiddle, $html);

		$html = str_replace( "{SOO.DATA:ApplicationIconLarge}", $data->ApplicationIconLarge, $html);

		$html = str_replace( "{SOO.DATA:ApplicationPath}", $data->ApplicationPath, $html);

		$html = str_replace( "{SOO.DATA:ApplicationFile}", $data->ApplicationFile, $html);

		$html = str_replace( "{SOO.DATA:ApplicationClass}", $data->ApplicationClass, $html);

		$html = str_replace( "{SOO.DATA:ApplicationMainFunction}", $data->ApplicationMainFunction, $html);

		$html = str_replace( "{SOO.DATA:DisplayIcon}", $data->DisplayIcon, $html);

		$html = str_replace( "{SOO.DATA:IsActive}", $data->IsActive, $html);

		$html = str_replace( "{SOO.DATA:UseWorkflow}", $data->UseWorkflow, $html);

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