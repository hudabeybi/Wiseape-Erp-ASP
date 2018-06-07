<?php

class PostModuleDetailPage extends SoondaPageView
{
	function render( $pageParam, $filename = "" )
	{
		$html = parent::render( $pageParam, $filename );
		$html = $this->displayData( $html, $pageParam->Data );

		$html = parent::SetOtherThings( $pageParam, $html, "PostModule" );
		return $html;
	}

	function displayData( $html, $data)
	{

		$html = str_replace( "{SOO.DATA:IdPost}", $data->IdPost, $html);

		$html = str_replace( "{SOO.DATA:PostTitle}", $data->PostTitle, $html);

		$html = str_replace( "{SOO.DATA:PostSubTitle}", $data->PostSubTitle, $html);

		$html = str_replace( "{SOO.DATA:PostDate}", date("d M Y h:i:s", strtotime($data->PostDate)), $html);					

		$html = str_replace( "{SOO.DATA:PostShortText}", $data->PostShortText, $html);

		$html = str_replace( "{SOO.DATA:PostText}", $data->PostText, $html);

		$html = str_replace( "{SOO.DATA:PostMainImage}", $data->PostMainImage, $html);

		$html = str_replace( "{SOO.DATA:PostedById}", $data->PostedById, $html);

		$html = str_replace( "{SOO.DATA:IsActive}", $data->IsActive, $html);

		$html = str_replace( "{SOO.DATA:PostTag}", $data->PostTag, $html);

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