<?php

class GalleryModuleWS extends SoondaWS
{
	function index()
	{
		return $this->listData();
	}

	function listData()
	{
		$offset = (isset($this->param["offset"])) ? $this->param["offset"] : 0 ;
		$limit	= (isset($this->param["limit"])) ? $this->param["limit"] : 5 ;
		$offset = $offset * $limit - $limit;

		$adapter = $this->getAdapter( "GalleryModule", $this->dbConnection);
		$adapter->connection = $this->dbConnection;
		$data	 = $adapter->getAll( $this->param["condition"], $this->param["order"], $offset, $limit );
		
		$res = array( "Result" => true, "Data" => $data, "Message" => "Ok" );
		return $res;
	}
	
	function listByAlbum()
	{
	    $idAlbum = $this->param["IdAlbum"];
	    $cond = "GalleryAlbumId = ".$idAlbum;
		$adapter = $this->getAdapter( "GalleryModule", $this->dbConnection);
		$data	 = $adapter->getAll( $cond );
		
		$res = array( "Result" => true, "Data" => $data, "Message" => "Ok" );
		return $res;
	}

	function detailData()
	{
		$adapter = $this->getAdapter( "GalleryModule", $this->dbConnection);
		$adapter->connection = $this->dbConnection;
		$data	 = $adapter->getDetail( $this->param["IdGallery"] );
		if($data == null)
			$res = array("Result" => true, "Data"=> null, "Message" => "0 results" );
		else			
			$res = array( "Result" => true, "Data" => $data, "Message" => "Ok" );
		return $res;
	}


	function saveAddData($o)
	{
		$adapter = $this->getAdapter( "GalleryModule", $this->dbConnection);
		$adapter->connection = $this->dbConnection;

		//$o		 = $adapter->createNew();
		//$o		 = $this->setObjectFromPost( $o );
		$validat = $this->validateEdit( $adapter, $o );
		if( $validat->succeed )
		{
			$adapter->insert( $o );
			$res	 = array( "Result" => true, "Data" => $o, "Message" => "The data has been added");
		}
		else
		{
			$res	 = array( "Result" => false, "Data" => $o, "Message" => $validat->message );
		}
		return $res;
	}

	function saveEditData($o)
	{
		$adapter = $this->getAdapter( "GalleryModule", $this->dbConnection);
		$adapter->connection = $this->dbConnection;

		//$o		 = $adapter->createNew();
		//$o		 = $this->setObjectFromPost( $o );
		$validat = $this->validateEdit( $adapter, $o );
		if( $validat->succeed )
		{
			$adapter->update( $o );
			$res	 = array( "Result" => true, "Data" => $o, "Message" => "The data has been updated");
		}
		else
		{
			$res	 = array( "Result" => false, "Data" => $o, "Message" => $validat->message );
		}
		
		return $res;
	}

	function deleteData($o)
	{
		$adapter = $this->getAdapter( "GalleryModule", $this->dbConnection);
		$adapter->connection = $this->dbConnection;
		$adapter->delete($o);
	
		if( file_exists( $o->ImageUrl ) )
		{
			unlink($o->ImageUrl);
		}
	

		$res	 = array( "Result" => true, "Data" => $o, "Message" => "Ok");
		return $res;

	}


	/*
	*	Function: getLookups( )
	*	Return value: array of all lookup data for Gallery form. 
	*	Description:
	*	Return all lookup data for Gallery form. These lookup data will be used for lookup comboboxes.
	*/
	public function getLookups()
	{
		$lookups = array();

		$adapter = $this->getAdapter( "Module", $this->dbConnection);
		$lookups[""] = $adapter->getAll();
	
		$res	 = array( "Result" => true, "Data" => $lookups, "Message" => "Ok");
		return $res;
	}


	/*
	*	Function: validateAdd( $adapter, $o )
	*	Parameter: 
	*	- $adapter, data adapter object that will be used by the function. 
	*	- $o, object to be processed.
	*	Return value: boolean true or false. 
	*	Description:
	*	This function vailidate Gallery data during add operation. Return true if ok, false of not ok.
	*	When it returns false, the insert operation will halt.
	*/
	public function validateAdd( $adapter, $o )
	{
		$result = new ValidationResult();

		//Check Gallery Caption
		if(SoondaUtil::CheckEmpty( $o->GalleryCaption, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:GalleryCaption}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "GalleryCaption";
			return $result;
		}

		//Check Image Date
		if(SoondaUtil::CheckEmpty( $o->ImageDate, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:ImageDate}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "ImageDate";
			return $result;
		}

		//Check Image Url
		if(SoondaUtil::CheckEmpty( $o->ImageUrl, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:ImageUrl}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "ImageUrl";
			return $result;
		}

		//Check Gallery Album
		if(SoondaUtil::CheckEmpty( $o->GalleryAlbumId, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:GalleryAlbumId}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "GalleryAlbumId";
			return $result;
		}

		$result->succeed = true;
		$result->message = "Ok";
		return $result;
	}


	/*
	*	Function: validateEdit( $adapter, $o )
	*	Parameter: 
	*	- $adapter, data adapter object that will be used by the function. 
	*	- $o, object to be processed.
	*	Return value: boolean true or false and the error message. 
	*	Description:
	*	This function vailidate Gallery data during edit operation. Return true if ok, false of not ok.
	*	When it returns false, the insert operation will halt.
	*/
	public function validateEdit( $adapter, $o )
	{
		$result = new ValidationResult();

		//Check Gallery Caption
		if(SoondaUtil::CheckEmpty( $o->GalleryCaption, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:GalleryCaption}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "GalleryCaption";
			return $result;
		}

		//Check Image Date
		if(SoondaUtil::CheckEmpty( $o->ImageDate, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:ImageDate}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "ImageDate";
			return $result;
		}

		//Check Image Url
		if(SoondaUtil::CheckEmpty( $o->ImageUrl, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:ImageUrl}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "ImageUrl";
			return $result;
		}

		//Check Gallery Album
		if(SoondaUtil::CheckEmpty( $o->GalleryAlbumId, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:GalleryAlbumId}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "GalleryAlbumId";
			return $result;
		}

		$result->succeed = true;
		$result->message = "Ok";
		return $result;
	}

}

?>