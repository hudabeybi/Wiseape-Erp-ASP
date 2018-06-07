<?php

class TasklogModuleListPage extends SoondaListPage
{
	function getTableHeaderConfig( $viewPageParam )
	{
		$config = array();
		

		$config[] = array( "TaskTitle1", "{SOO.LANG:TaskTitle1}", false, false, null );


		$config[] = array( "TaskTitle2", "{SOO.LANG:TaskTitle2}", false, false, null );


		$config[] = array( "TaskTitle3", "{SOO.LANG:TaskTitle3}", false, false, null );


		$config[] = array( "TaskTitle4", "{SOO.LANG:TaskTitle4}", false, false, null );


		$config[] = array( "TaskDate", "{SOO.LANG:TaskDate}", false, false, new DateRenderer("TaskDate", "d M Y h:i:s") );

		return $config;
	}
}


?>