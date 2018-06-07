<?php

class PostModuleListPage extends SoondaListPage
{
	function getTableHeaderConfig( $viewPageParam )
	{
		$config = array();
		

		$config[] = array( "PostTitle", "{SOO.LANG:PostTitle}", false, false, null );


		$config[] = array( "PostSubTitle", "{SOO.LANG:PostSubTitle}", false, false, null );


		$config[] = array( "PostDate", "{SOO.LANG:PostDate}", false, false, new DateRenderer("PostDate", "d M Y h:i:s") );


		$config[] = array( "PostMainImage", "{SOO.LANG:PostMainImage}", false, false, new ImageRenderer("PostMainImage", 30, 30) );


		$config[] = array( "PostTag", "{SOO.LANG:PostTag}", false, false, null );

		return $config;
	}
}


?>