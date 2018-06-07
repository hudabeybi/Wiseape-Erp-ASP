<?php
//This file is generated using SoondaCodeGenerator Pluggin for Huda_AppBuilder.
//Don't modify this file directly. Create new file and class that inherits this class to add functionality and modification.
//This file may be replaced during re-code generation, any changes to this file may be replaced.

//**********************************************************************
//
//	Class Name: GalleryAlbumModuleAdapter
//	Created Date: 6/7/2017 12:29:16 AM
//
//**********************************************************************




class GalleryAlbumModuleAdapter extends galleryalbumAdapter
{

	public function sortBy()
	{
		$sortBy = "";

		if( $sortBy != "")
			$sortBy = substr( $sortBy, 0, strlen($sortBy) - 1)." ASC";
		return $sortBy;
	}

	//Function to get the inner joins for the select query
	protected function getInnerJoins()
	{
		$innerJoins = "";

		return $innerJoins;
	}
	
	//Select Query for ViewGalleryAlbumModuleData override parent's getSelectQuery()
	public function getSelectQuery()
	{
		$columns = "galleryalbum.*,";

		$tables = "galleryalbum,";
		$tables = substr($tables, 0, strlen( $tables) - 1);
		$columns = substr($columns, 0, strlen( $columns) - 1);
		$innerJoins = $this->getInnerJoins();
		$query = "SELECT $columns FROM $tables $innerJoins ";
		return $query;
	}


	//Select Query Count for ViewGalleryAlbumModuleData override parent's getSelectQueryCount()
	public function getSelectQueryCount()
	{
		$tables = "galleryalbum,";
		$tables = substr($tables, 0, strlen( $tables) - 1);
		$innerJoins = $this->getInnerJoins();
		$query = "SELECT count(*) as total_data FROM $tables $innerJoins ";
		return $query;
	}

	//Get query for detail GalleryAlbumModule data
	public function getSelectDetailQuery( $id)
	{
		$condition = "";
	
		$condition .= "galleryalbum.IdGalleryAlbum = ".$id;
	
		$query = $this->getSelectQuery();
		if(str_replace(" ", "", $condition) != "")
			$condition = " WHERE ".$condition;
		$query .= $condition;
		return $query;
	}

	//Initialize View GalleryAlbumModule, it initializes from record set the View object for this module
	public function init($rs, $o)
	{
		parent::init( $rs, $o); 
		
		return $o;
	}


	//Insert GalleryAlbumModule object to database, inherit from galleryalbumAdapter
	public function insert( $o )
	{
		$newId = parent::insert( $o);
		$o->IdGalleryAlbum = $newId;

	}

	//Update GalleryAlbumModule object to database, inherit from galleryalbumAdapter
	public function update( $o)
	{
		parent::update( $o);
		
	}

	//Delete GalleryAlbumModule object to database, inherit from galleryalbumAdapter
	public function delete( $o)
	{
		//Delete the data by primary key
		parent::delete( $o->IdGalleryAlbum);
	
	}//end of function delete




	//Get list of  GalleryAlbumModule objects, override the parent's function
	public function getAll( $condition="", $order="", $offset="", $limit="", $returnRecordSet = false)
	{
		$list = array();
		$order = ( $order == "" ) ? $this->sortBy() : $order ;
		//Get data query for the GalleryAlbumModule data
		$query = $this->getSelectQuery();
		if( str_replace(" ", "", $condition) != "")
			$query .= " WHERE ".$condition;
		if( str_replace(" ", "", $order)!= "")
			$query .= " ORDER BY ".$order;

		//Retrieve the GalleryAlbumModule data
		$rs = $this->connection->Execute( $query, $limit, $offset);

		if($returnRecordSet)
			return $rs;
		else
		{
			$i = 0;
			include_once( "Bin/Module.DataModel/GalleryAlbumModuleData.php");
			while(!$rs->EOF)
			{
				//Instansiate the GalleryAlbumModule object
				$o = $this->createNew();

				//Init the GalleryAlbumModule object
				$o = $this->init($rs, $o);

				//Assembel the GalleryAlbumModule object list
				array_push( $list, $o);

				//Navigate the data source to next data
				$rs->MoveNext();
			}

			//Return the GalleryAlbumModule object list
			return $list;
		}
	}

	//Get total data of GalleryAlbumModule, override the parent's function
	public function getCount( $condition="")
	{
		//Get data query count for the GalleryAlbumModule data
		$query = $this->getSelectQueryCount();
		if( str_replace(" ", "", $condition) != "")
			$query .= " WHERE ".$condition;

		//Retrieve the GalleryAlbumModule data
		$rs = $this->connection->Execute( $query);
		$count = $rs->Fields("total_data");
		return $count;
	}

	//Get Detail of GalleryAlbumModule Object
	public function getDetail( $id, $returnRecordSet = false)
	{
		$query = $this->getSelectDetailQuery( $id);	
	
		//Retrieve the GalleryAlbumModule data
		$rs = $this->connection->Execute( $query);

		if($returnRecordSet)
		{

			return $rs;
		}
		else
		{
			//Instansiate the GalleryAlbumModule object
			$o = $this->createNew();

			//Init the GalleryAlbumModule object
			$o = $this->init($rs, $o);

			return $o;
		}
	}


	//Create new object of ViewGalleryAlbumModuleData
	function createNew()
	{
		include_once( "Bin/Module.DataModel/GalleryAlbumModuleData.php");
		$o = new ViewGalleryAlbumModuleData();
		return $o;
	}

}//End of class

?>