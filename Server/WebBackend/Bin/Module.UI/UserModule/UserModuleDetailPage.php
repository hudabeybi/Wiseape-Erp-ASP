<?php

class UserModuleDetailPage extends SoondaPageView
{
	function render( $pageParam, $filename = "" )
	{
		$html = parent::render( $pageParam, $filename );
		$html = $this->displayData( $html, $pageParam->Data );

		$html = parent::SetOtherThings( $pageParam, $html, "UserModule" );
		return $html;
	}

	function displayData( $html, $data)
	{

		$html = str_replace( "{SOO.DATA:FirstName}", $data->FirstName, $html);

		$html = str_replace( "{SOO.DATA:LastName}", $data->LastName, $html);

		$html = str_replace( "{SOO.DATA:UserPicture}", $data->UserPicture, $html);

		$html = str_replace( "{SOO.DATA:UserRegisteredDate}", date("d M Y h:i:s", strtotime($data->UserRegisteredDate)), $html);					

		$html = str_replace( "{SOO.DATA:GenderId}", $data->GenderId, $html);

		$html = str_replace( "{SOO.DATA:UserEmail}", $data->UserEmail, $html);

		$html = str_replace( "{SOO.DATA:UserPhone}", $data->UserPhone, $html);

		$html = str_replace( "{SOO.DATA:UserGroupId}", $data->UserGroupId, $html);

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