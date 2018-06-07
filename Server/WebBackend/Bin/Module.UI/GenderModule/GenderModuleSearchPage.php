<?php

class GenderModuleSearchPage extends SoondaPageView
{
	function render( $data = "")
	{
		$html = SoondaUtil::getContent(  "components/com_GenderModule/pages/GenderModuleSearchPage.html");
		$html = $this->setLookupData( $html );

		$html = parent::SetOtherThings( $data, $html, "GenderModule" );
		return $html;
	}

	function setLookupData( $html)
	{

		
		$html = str_replace("{SOO.FUNCTION:Encrypt:GenderName}", $this->enc("GenderName"), $html);
		$html = str_replace("{SOO.FUNCTION:Encrypt:SearchGenderName}", $this->enc("SearchGenderName"), $html);

		//---------------- Set Lookup Data for GenderName --------------
		
		$html = str_replace("{SOO.FUNCTION:Encrypt:GenderInfo}", $this->enc("GenderInfo"), $html);
		$html = str_replace("{SOO.FUNCTION:Encrypt:SearchGenderInfo}", $this->enc("SearchGenderInfo"), $html);

		//---------------- Set Lookup Data for GenderInfo --------------

		return $html;
	}

}


?>