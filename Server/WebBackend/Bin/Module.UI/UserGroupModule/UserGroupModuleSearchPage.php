<?php

class UserGroupModuleSearchPage extends SoondaPageView
{
	function render( $data = "")
	{
		$html = SoondaUtil::getContent(  "components/com_UserGroupModule/pages/UserGroupModuleSearchPage.html");
		$html = $this->setLookupData( $html );

		$html = parent::SetOtherThings( $data, $html, "UserGroupModule" );
		return $html;
	}

	function setLookupData( $html)
	{

		
		$html = str_replace("{SOO.FUNCTION:Encrypt:UserGroup}", $this->enc("UserGroup"), $html);
		$html = str_replace("{SOO.FUNCTION:Encrypt:SearchUserGroup}", $this->enc("SearchUserGroup"), $html);

		//---------------- Set Lookup Data for UserGroup --------------
		
		$html = str_replace("{SOO.FUNCTION:Encrypt:UserGroupDesc}", $this->enc("UserGroupDesc"), $html);
		$html = str_replace("{SOO.FUNCTION:Encrypt:SearchUserGroupDesc}", $this->enc("SearchUserGroupDesc"), $html);

		//---------------- Set Lookup Data for UserGroupDesc --------------

		return $html;
	}

}


?>