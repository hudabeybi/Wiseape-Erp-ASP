<?php

class ProcessGroupModuleSearchPage extends SoondaPageView
{
	function render( $data = "")
	{
		$html = SoondaUtil::getContent(  "components/com_ProcessGroupModule/pages/ProcessGroupModuleSearchPage.html");
		$html = $this->setLookupData( $html );

		$html = parent::SetOtherThings( $data, $html, "ProcessGroupModule" );
		return $html;
	}

	function setLookupData( $html)
	{

		
		$html = str_replace("{SOO.FUNCTION:Encrypt:ProcessGroupName}", $this->enc("ProcessGroupName"), $html);
		$html = str_replace("{SOO.FUNCTION:Encrypt:SearchProcessGroupName}", $this->enc("SearchProcessGroupName"), $html);

		//---------------- Set Lookup Data for ProcessGroupName --------------
		
		$html = str_replace("{SOO.FUNCTION:Encrypt:ProcessGroupTitle}", $this->enc("ProcessGroupTitle"), $html);
		$html = str_replace("{SOO.FUNCTION:Encrypt:SearchProcessGroupTitle}", $this->enc("SearchProcessGroupTitle"), $html);

		//---------------- Set Lookup Data for ProcessGroupTitle --------------
		
		$html = str_replace("{SOO.FUNCTION:Encrypt:ProcessGroupInfo}", $this->enc("ProcessGroupInfo"), $html);
		$html = str_replace("{SOO.FUNCTION:Encrypt:SearchProcessGroupInfo}", $this->enc("SearchProcessGroupInfo"), $html);

		//---------------- Set Lookup Data for ProcessGroupInfo --------------

		return $html;
	}

}


?>