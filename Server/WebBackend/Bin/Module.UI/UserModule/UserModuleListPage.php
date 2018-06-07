<?php

class UserModuleListPage extends SoondaListPage
{
	function getTableHeaderConfig( $viewPageParam )
	{
		$config = array();
		

		$config[] = array( "FirstName", "{SOO.LANG:FirstName}", false, false, null );


		$config[] = array( "LastName", "{SOO.LANG:LastName}", false, false, null );


		$config[] = array( "UserPicture", "{SOO.LANG:UserPicture}", false, false, new ImageRenderer("UserPicture", 30, 30) );


		$config[] = array( "UserRegisteredDate", "{SOO.LANG:UserRegisteredDate}", false, false, new DateRenderer("UserRegisteredDate", "d M Y h:i:s") );


		$config[] = array( "GenderId", "{SOO.LANG:GenderId}", false, false, null );


		$config[] = array( "UserEmail", "{SOO.LANG:UserEmail}", false, false, null );


		$config[] = array( "UserPhone", "{SOO.LANG:UserPhone}", false, false, null );


		$config[] = array( "UserGroupId", "{SOO.LANG:UserGroupId}", false, false, null );

		return $config;
	}
}


?>