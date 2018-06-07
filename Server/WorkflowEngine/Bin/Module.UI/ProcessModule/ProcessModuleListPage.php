<?php

class ProcessModuleListPage extends SoondaListPage
{
	function getTableHeaderConfig( $viewPageParam )
	{
		$config = array();
		

		$config[] = array( "ProcessNo", "{SOO.LANG:ProcessNo}", false, false, null );


		$config[] = array( "ProcessName", "{SOO.LANG:ProcessName}", false, false, null );


		$config[] = array( "ProcessCreatedDate", "{SOO.LANG:ProcessCreatedDate}", false, false, new DateRenderer("ProcessCreatedDate", "d M Y h:i:s") );


		$config[] = array( "ApplicationId", "{SOO.LANG:ApplicationId}", false, false, null );

		return $config;
	}
}


?>