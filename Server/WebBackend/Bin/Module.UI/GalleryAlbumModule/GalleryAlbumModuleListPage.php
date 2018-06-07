<?php

class GalleryAlbumModuleListPage extends SoondaListPage
{
	function getTableHeaderConfig( $viewPageParam )
	{
		$config = array();
		

		$config[] = array( "AlbumTitle", "{SOO.LANG:AlbumTitle}", false, false, null );


		$config[] = array( "AlbumCreatedDate", "{SOO.LANG:AlbumCreatedDate}", false, false, new DateRenderer("AlbumCreatedDate", "d M Y h:i:s") );

		return $config;
	}
}


?>