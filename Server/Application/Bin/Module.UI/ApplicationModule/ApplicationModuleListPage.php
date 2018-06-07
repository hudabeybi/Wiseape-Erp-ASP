<?php

class ApplicationModuleListPage extends SoondaListPage
{
	function getTableHeaderConfig( $viewPageParam )
	{
		$config = array();
		

		$config[] = array( "ApplicationName", "{SOO.LANG:ApplicationName}", false, false, null );


		$config[] = array( "ApplicationTitle", "{SOO.LANG:ApplicationTitle}", false, false, null );


		$config[] = array( "ApplicationIconSmall", "{SOO.LANG:ApplicationIconSmall}", false, false, null );


		$config[] = array( "ApplicationIconMiddle", "{SOO.LANG:ApplicationIconMiddle}", false, false, null );


		$config[] = array( "ApplicationIconLarge", "{SOO.LANG:ApplicationIconLarge}", false, false, null );


		$config[] = array( "ApplicationPath", "{SOO.LANG:ApplicationPath}", false, false, null );


		$config[] = array( "ApplicationFile", "{SOO.LANG:ApplicationFile}", false, false, null );


		$config[] = array( "ApplicationClass", "{SOO.LANG:ApplicationClass}", false, false, null );


		$config[] = array( "ApplicationMainFunction", "{SOO.LANG:ApplicationMainFunction}", false, false, null );

		return $config;
	}
}


?>