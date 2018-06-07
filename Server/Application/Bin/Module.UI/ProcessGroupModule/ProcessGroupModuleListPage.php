<?php

class ProcessGroupModuleListPage extends SoondaListPage
{
	function getTableHeaderConfig( $viewPageParam )
	{
		$config = array();
		

		$config[] = array( "ProcessGroupName", "{SOO.LANG:ProcessGroupName}", false, false, null );


		$config[] = array( "ProcessGroupTitle", "{SOO.LANG:ProcessGroupTitle}", false, false, null );


		$config[] = array( "IconSmall", "{SOO.LANG:IconSmall}", false, false, new ImageRenderer("IconSmall", 30, 30) );


		$config[] = array( "IconMiddle", "{SOO.LANG:IconMiddle}", false, false, new ImageRenderer("IconMiddle", 30, 30) );


		$config[] = array( "IconLarge", "{SOO.LANG:IconLarge}", false, false, new ImageRenderer("IconLarge", 30, 30) );

		return $config;
	}
}


?>