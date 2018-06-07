<?php

class GalleryAlbumModuleWS extends SoondaWS
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
		if($this->param["condition"] == "all")
			$this->param["condition"] = "";
		$cond = "AlbumTitle like '%".$this->param["condition"]."%'";
		$cond .= " and AlbumDescription like '%".$this->param["condition"]."%'";

		$adapter = $this->getAdapter( "GalleryAlbumModule", $this->dbConnection);
		$adapter->connection = $this->dbConnection;
		$data	 = $adapter->getAll( $cond, "AlbumCreatedDate", $offset, $limit );
		$count	 = $adapter->getCount( $cond );
		$res = array( "Result" => true, "Data" => $data, "Message" => "Ok",  "OtherData" => $count );
		return $res;
	}

	
	function listDataGalleryAlbum()
	{
		$offset = (isset($this->param["offset"])) ? $this->param["offset"] : 0 ;
		$limit	= (isset($this->param["limit"])) ? $this->param["limit"] : 5 ;
		$offset = $offset * $limit - $limit;
		if($this->param["condition"] == "all")
			$this->param["condition"] = "";
		$cond = "AlbumTitle like '%".$this->param["condition"]."%'";
		$cond .= " and AlbumDescription like '%".$this->param["condition"]."%'";
		$cond .= " and Tag like 'Gallery Album'";

		$adapter = $this->getAdapter( "GalleryAlbumModule", $this->dbConnection);
		$adapter->connection = $this->dbConnection;
		$data	 = $adapter->getAll( $cond, "AlbumCreatedDate", $offset, $limit );
		$count	 = $adapter->getCount( $cond );
		$res = array( "Result" => true, "Data" => $data, "Message" => "Ok",  "OtherData" => $count );
		return $res;
	}

	
	function listDataMediaCoverage()
	{
		$offset = (isset($this->param["offset"])) ? $this->param["offset"] : 0 ;
		$limit	= (isset($this->param["limit"])) ? $this->param["limit"] : 5 ;
		$offset = $offset * $limit - $limit;
		if($this->param["condition"] == "all")
			$this->param["condition"] = "";
		$cond = "AlbumTitle like '%".$this->param["condition"]."%'";
		$cond .= " and AlbumDescription like '%".$this->param["condition"]."%'";
		$cond .= " and Tag like 'Media Coverage'";

		$adapter = $this->getAdapter( "GalleryAlbumModule", $this->dbConnection);
		$adapter->connection = $this->dbConnection;
		$data	 = $adapter->getAll( $cond, "AlbumCreatedDate", $offset, $limit );
		$count	 = $adapter->getCount( $cond );
		$res = array( "Result" => true, "Data" => $data, "Message" => "Ok",  "OtherData" => $count );
		return $res;
	}

	function detailData()
	{
		$adapter = $this->getAdapter( "GalleryAlbumModule", $this->dbConnection);
		$adapter->connection = $this->dbConnection;
		$data	 = $adapter->getDetail( $this->param["IdGalleryAlbum"] );

		$adapter = $this->getAdapter("GalleryModule", $this->dbConnection);
		$list =	$adapter->getAll("GalleryAlbumId = ".$data->IdGalleryAlbum);
		
		$pics = "";
		foreach($list as $key => $item)
		{
			$pics .= $item->ImageUrl.";";
		}

		$data->PictureList = $pics;

		if($data == null)
			$res = array("Result" => true, "Data"=> null, "Message" => "0 results" );
		else			
			$res = array( "Result" => true, "Data" => $data, "Message" => "Ok" );
		return $res;
	}


	function saveAddData($o)
	{
		$adapter = $this->getAdapter( "GalleryAlbumModule", $this->dbConnection);
		$adapter->connection = $this->dbConnection;

		//$o		 = $adapter->createNew();
		//$o		 = $this->setObjectFromPost( $o );
		$validat = $this->validateEdit( $adapter, $o );
		if( $validat->succeed )
		{
			$adapter->insert( $o );


			$pictureList = $o->PictureList;
			$pics = explode(";", $pictureList);

			if(count($pics) > 0)
			{
				$adapter = $this->getAdapter( "GalleryModule", $this->dbConnection);
				
				include_once("Bin/Module.DataModel/GalleryModuleData.php");
				foreach($pics as $key => $pic)
				{
					if($pic != "")
					{
						$newPic = new GalleryModuleData();
						$newPic->ImageUrl = $pic;
						$newPic->ImageDate = date("Y-m-d");
						$newPic->GalleryAlbumId = $o->IdGalleryAlbum;
						$adapter->insert($newPic);
					}
				}
			}

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
		$adapter = $this->getAdapter( "GalleryAlbumModule", $this->dbConnection);
		$adapter->connection = $this->dbConnection;

		//$o		 = $adapter->createNew();
		//$o		 = $this->setObjectFromPost( $o );
		$validat = $this->validateEdit( $adapter, $o );
		if( $validat->succeed )
		{
			$adapter->update( $o );

			$pictureList = $o->PictureList;
			$pics = explode(";", $pictureList);

			if(count($pics) > 0)
			{
				$adapter = $this->getAdapter( "GalleryModule", $this->dbConnection);
				$list = $adapter->getAll("GalleryAlbumId = ".$o->IdGalleryAlbum );
				
				foreach($list as $key => $pic)
				{
					$adapter->delete($pic);
				}
				
				include_once("Bin/Module.DataModel/GalleryModuleData.php");
				foreach($pics as $key => $pic)
				{
					if($pic != "")
					{
						$newPic = new GalleryModuleData();
						$newPic->ImageUrl = $pic;
						$newPic->ImageDate = date("Y-m-d");
						$newPic->GalleryAlbumId = $o->IdGalleryAlbum;
						$adapter->insert($newPic);
					}
				}
			}

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
		$adapter = $this->getAdapter( "GalleryAlbumModule", $this->dbConnection);
		$adapter->connection = $this->dbConnection;
		$adapter->delete($o);
	
	

		$res	 = array( "Result" => true, "Data" => $o, "Message" => "Ok");
		return $res;

	}


	/*
	*	Function: getLookups( )
	*	Return value: array of all lookup data for Gallery Album form. 
	*	Description:
	*	Return all lookup data for Gallery Album form. These lookup data will be used for lookup comboboxes.
	*/
	public function getLookups()
	{
		$lookups = array();
	
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
	*	This function vailidate Gallery Album data during add operation. Return true if ok, false of not ok.
	*	When it returns false, the insert operation will halt.
	*/
	public function validateAdd( $adapter, $o )
	{
		$result = new ValidationResult();

		//Check Album Title
		if(SoondaUtil::CheckEmpty( $o->AlbumTitle, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:AlbumTitle}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "AlbumTitle";
			return $result;
		}

		//Check Album Description
		if(SoondaUtil::CheckEmpty( $o->AlbumDescription, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:AlbumDescription}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "AlbumDescription";
			return $result;
		}

		//Check Album Created Date
		if(SoondaUtil::CheckEmpty( $o->AlbumCreatedDate, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:AlbumCreatedDate}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "AlbumCreatedDate";
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
	*	This function vailidate Gallery Album data during edit operation. Return true if ok, false of not ok.
	*	When it returns false, the insert operation will halt.
	*/
	public function validateEdit( $adapter, $o )
	{
		$result = new ValidationResult();

		//Check Album Title
		if(SoondaUtil::CheckEmpty( $o->AlbumTitle, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:AlbumTitle}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "AlbumTitle";
			return $result;
		}

		//Check Album Description
		if(SoondaUtil::CheckEmpty( $o->AlbumDescription, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:AlbumDescription}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "AlbumDescription";
			return $result;
		}

		//Check Album Created Date
		if(SoondaUtil::CheckEmpty( $o->AlbumCreatedDate, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:AlbumCreatedDate}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "AlbumCreatedDate";
			return $result;
		}

		$result->succeed = true;
		$result->message = "Ok";
		return $result;
	}

}

?>