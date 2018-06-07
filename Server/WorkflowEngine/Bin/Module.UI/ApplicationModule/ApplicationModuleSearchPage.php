<?php

class ApplicationModuleSearchPage extends SoondaPageView
{
	function render( $data = "")
	{
		$html = SoondaUtil::getContent(  "components/com_ApplicationModule/pages/ApplicationModuleSearchPage.html");
		$html = $this->setLookupData( $html );

		$html = parent::SetOtherThings( $data, $html, "ApplicationModule" );
		return $html;
	}

	function setLookupData( $html)
	{

		
		$html = str_replace("{SOO.FUNCTION:Encrypt:ApplicationName}", $this->enc("ApplicationName"), $html);
		$html = str_replace("{SOO.FUNCTION:Encrypt:SearchApplicationName}", $this->enc("SearchApplicationName"), $html);

		//---------------- Set Lookup Data for ApplicationName --------------
		
		$html = str_replace("{SOO.FUNCTION:Encrypt:ApplicationTitle}", $this->enc("ApplicationTitle"), $html);
		$html = str_replace("{SOO.FUNCTION:Encrypt:SearchApplicationTitle}", $this->enc("SearchApplicationTitle"), $html);

		//---------------- Set Lookup Data for ApplicationTitle --------------
		
		$html = str_replace("{SOO.FUNCTION:Encrypt:ApplicationInfo}", $this->enc("ApplicationInfo"), $html);
		$html = str_replace("{SOO.FUNCTION:Encrypt:SearchApplicationInfo}", $this->enc("SearchApplicationInfo"), $html);

		//---------------- Set Lookup Data for ApplicationInfo --------------
		
		$html = str_replace("{SOO.FUNCTION:Encrypt:ApplicationIconSmall}", $this->enc("ApplicationIconSmall"), $html);
		$html = str_replace("{SOO.FUNCTION:Encrypt:SearchApplicationIconSmall}", $this->enc("SearchApplicationIconSmall"), $html);

		//---------------- Set Lookup Data for ApplicationIconSmall --------------
		
		$html = str_replace("{SOO.FUNCTION:Encrypt:ApplicationIconMiddle}", $this->enc("ApplicationIconMiddle"), $html);
		$html = str_replace("{SOO.FUNCTION:Encrypt:SearchApplicationIconMiddle}", $this->enc("SearchApplicationIconMiddle"), $html);

		//---------------- Set Lookup Data for ApplicationIconMiddle --------------
		
		$html = str_replace("{SOO.FUNCTION:Encrypt:ApplicationIconLarge}", $this->enc("ApplicationIconLarge"), $html);
		$html = str_replace("{SOO.FUNCTION:Encrypt:SearchApplicationIconLarge}", $this->enc("SearchApplicationIconLarge"), $html);

		//---------------- Set Lookup Data for ApplicationIconLarge --------------
		
		$html = str_replace("{SOO.FUNCTION:Encrypt:ApplicationPath}", $this->enc("ApplicationPath"), $html);
		$html = str_replace("{SOO.FUNCTION:Encrypt:SearchApplicationPath}", $this->enc("SearchApplicationPath"), $html);

		//---------------- Set Lookup Data for ApplicationPath --------------
		
		$html = str_replace("{SOO.FUNCTION:Encrypt:ApplicationFile}", $this->enc("ApplicationFile"), $html);
		$html = str_replace("{SOO.FUNCTION:Encrypt:SearchApplicationFile}", $this->enc("SearchApplicationFile"), $html);

		//---------------- Set Lookup Data for ApplicationFile --------------
		
		$html = str_replace("{SOO.FUNCTION:Encrypt:ApplicationClass}", $this->enc("ApplicationClass"), $html);
		$html = str_replace("{SOO.FUNCTION:Encrypt:SearchApplicationClass}", $this->enc("SearchApplicationClass"), $html);

		//---------------- Set Lookup Data for ApplicationClass --------------
		
		$html = str_replace("{SOO.FUNCTION:Encrypt:ApplicationMainFunction}", $this->enc("ApplicationMainFunction"), $html);
		$html = str_replace("{SOO.FUNCTION:Encrypt:SearchApplicationMainFunction}", $this->enc("SearchApplicationMainFunction"), $html);

		//---------------- Set Lookup Data for ApplicationMainFunction --------------

		return $html;
	}

}


?>