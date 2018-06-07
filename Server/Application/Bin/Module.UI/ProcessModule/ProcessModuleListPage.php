<?php

class ProcessModuleListPage extends SoondaListPage
{
	function getTableHeaderConfig( $viewPageParam )
	{
		$config = array();
		

		$config[] = array( "ProcessNo", "{SOO.LANG:ProcessNo}", false, false, null );


		$config[] = array( "ProcessName", "{SOO.LANG:ProcessName}", false, false, null );


		$config[] = array( "ProcessCreatedDate", "{SOO.LANG:ProcessCreatedDate}", false, false, new DateRenderer("ProcessCreatedDate", "d M Y h:i:s") );


		$config[] = array( "application_ApplicationName", "{SOO.LANG:application_ApplicationName}", false, false, null );


		$config[] = array( "workflow_WorkflowName", "{SOO.LANG:workflow_WorkflowName}", false, false, null );


		$config[] = array( "processgroup_ProcessGroupName", "{SOO.LANG:processgroup_ProcessGroupName}", false, false, null );

		return $config;
	}
}


?>