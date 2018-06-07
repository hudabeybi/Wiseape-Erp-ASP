<?php

class GenderModuleListPage extends SoondaListPage
{
	function getTableHeaderConfig( $viewPageParam )
	{
		$config = array();
		

		$config[] = array( "GenderName", "{SOO.LANG:GenderName}", false, false, null );


		$config[] = array( "GenderInfo", "{SOO.LANG:GenderInfo}", false, false, null );

		return $config;
	}
}


?>