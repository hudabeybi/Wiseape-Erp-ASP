<?php

class GalleryModuleListPage extends SoondaListPage
{
	function getTableHeaderConfig( $viewPageParam )
	{
		$config = array();
		

		$config[] = array( "GalleryCaption", "{SOO.LANG:GalleryCaption}", false, false, null );


		$config[] = array( "ImageDate", "{SOO.LANG:ImageDate}", false, false, new DateRenderer("ImageDate", "d M Y h:i:s") );


		$config[] = array( "ImageUrl", "{SOO.LANG:ImageUrl}", false, false, new ImageRenderer("ImageUrl", 30, 30) );


		$config[] = array( "GalleryAlbumId", "{SOO.LANG:GalleryAlbumId}", false, false, null );

		return $config;
	}
}


?>