<?php

class UserGroupModuleListPage extends SoondaListPage
{
	function getTableHeaderConfig( $viewPageParam )
	{
		$config = array();
		

		$config[] = array( "UserGroup", "{SOO.LANG:UserGroup}", false, false, null );


		$config[] = array( "UserGroupDesc", "{SOO.LANG:UserGroupDesc}", false, false, null );

		return $config;
	}
}


?>