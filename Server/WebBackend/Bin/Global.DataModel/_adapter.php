<?php
/*
* This file is generated using SoondaCodeGenerator Pluggin for Soonda Application Builder Code Generator.
* Don't modify this file directly.
* This file may be replaced during re-code generation, any changes to this file may be replaced.
* Instead, Create new file and class that inherits this class to add functionality and modification.
*/

/***********************************************************************
* 
* 	File Name: _tables.php
* 	Created Date: 6/7/2017 1:49:55 AM
* 
* **********************************************************************/


//Adapter for gallery
class _galleryAdapter extends SoondaAdapter
{	

	public function sortBy()
	{
		$sortBy = "";
	
		$sortBy .= "IdGallery ASC";
	
		return $sortBy;
	}

	//get query to retrieve all gallery data
	public function getSelectQuery()
	{
		$query = "SELECT * FROM gallery ";
		return $query;
	}

	//get query to count all gallery data
	public function getSelectQueryCount()
	{
		$query = "SELECT count(*) as total_data FROM gallery";
		return $query;
	}

	//Get query for detail gallery data
	protected function getSelectDetailQuery( $id)
	{
		$condition = "";
	
		$condition .= "IdGallery = ".$id;
	
		$query = $this->getSelectQuery( );

		if( $condition != "")
			$condition = " WHERE ".$condition;
		$query = $query.$condition;
		return $query;
	}

	//Get query to insert an gallery object
	protected function getInsertQuery( $o)
	{
		$columns = "";
		$values = "";
		$condition = "";
		$query = "INSERT INTO gallery ( ";
	
			
		$columns .= "GalleryCaption,";
		$values .= "'".SoondaUtil::encloseHTML( $o->GalleryCaption )."',";
	
		$columns .= "ImageDate,";
		if( str_replace(" ", "", $o->ImageDate) == "")
			$values .= "NULL,";
		else
			$values .= "'".$o->ImageDate."',";
	
			
		$columns .= "ImageUrl,";
		$values .= "'".SoondaUtil::encloseHTML( $o->ImageUrl )."',";
	
		$columns .= "GalleryAlbumId,";
		if(str_replace(" ", "",  $o->GalleryAlbumId) == "")
			$values .= "0,";
		else
			$values .= "".SoondaUtil::encloseHTML( $o->GalleryAlbumId ).",";
			
	
		$columns = substr( $columns, 0, strlen( $columns) - 1);
		$values = substr( $values, 0, strlen( $values) - 1);
		$query = $query.$columns." ) VALUES (".$values.")";
		return $query;
	}

	//Get query to Update an gallery object
	protected function getUpdateQuery( $o)
	{
		$columnAndValues = "";
		$condition = "";
		$query = "UPDATE gallery SET ";
	
		$condition .= "IdGallery = ".$o->IdGallery." AND ";
	
		$columnAndValues .= "GalleryCaption = '".SoondaUtil::encloseHTML( $o->GalleryCaption )."',";
	
		if(str_replace(" ", "", $o->ImageDate) == "")
			$columnAndValues .= "ImageDate = NULL,";
		else
			$columnAndValues .= "ImageDate = '".$o->ImageDate."',";
	
		$columnAndValues .= "ImageUrl = '".SoondaUtil::encloseHTML( $o->ImageUrl )."',";
	
		if(str_replace(" ", "",  $o->GalleryAlbumId) == "")
			$columnAndValues .= "GalleryAlbumId = 0,";		
		else
			$columnAndValues .= "GalleryAlbumId = ".SoondaUtil::encloseHTML( $o->GalleryAlbumId ).",";
	
		$columnAndValues = substr( $columnAndValues, 0, strlen($columnAndValues) - 1);
		$condition = substr( $condition, 0, strlen($condition) - 4);
		$query = $query.$columnAndValues." WHERE ".$condition;
		return $query;
	}

	//Get query to delete gallery by id
	protected function getDeleteQuery( $id)
	{
		$condition = "";
		$query = "DELETE FROM gallery ";
	
		$condition .= "IdGallery = ".$id;
	
		$query = $query." WHERE ".$condition;
		return $query;
	}

	//Get query to delete gallery by condition
	protected function getDeleteQueryByCondition( $condition )
	{
		$query = "DELETE FROM gallery ";
		$query = $query." WHERE ".$condition;
		return $query;
	}

	//to initialize an gallery object with data from database
	protected function init($rs, $o)
	{
	
		$o->IdGallery = SoondaUtil::decloseHTML( $rs->Fields("IdGallery") );
	
		$o->GalleryCaption = SoondaUtil::decloseHTML( $rs->Fields("GalleryCaption") );
	
		$o->ImageDate = $rs->Fields("ImageDate");
	
		$o->ImageUrl = SoondaUtil::decloseHTML( $rs->Fields("ImageUrl") );
	
		$o->GalleryAlbumId = SoondaUtil::decloseHTML( $rs->Fields("GalleryAlbumId") );
	
		return $o;
	}

	//get all the gallery data from database
	public function getAll( $condition = "", $order="", $offset = "", $limit = "", $returnRecordSet = false)
	{
		$data = array();
		$query = $this->getSelectQuery();
		if( str_replace(" ", "", $condition) != "")
			$condition = " WHERE ".$condition;

		$order = ( $order == "" ) ? $this->sortBy() : $order ;
		if( str_replace(" ", "", $order)!= "")
			$order = " ORDER BY ".$order;

		$query = $query." $condition $order";

		$rs = $this->connection->Execute( $query,  $limit, $offset );

		if($returnRecordSet)
			return $rs;
		else
		{
			while( !$rs->EOF)
			{
				$o = $this->createNew();
				$o = $this->init($rs, $o);
				array_push( $data, $o);
				$rs->MoveNext();
			}

			return $data;
		}
	}

	//get the gallery total number of data from database
	public function getCount( $condition="")
	{
		//Get data query count for the gallery data
		$query = $this->getSelectQueryCount();
		if( str_replace(" ", "", $condition) != "")
			$condition = " WHERE ".$condition;
		$query .= $condition;

		//Retrieve the gallery data count
		$rs = $this->connection->Execute( $query);
		$count = $rs->Fields("total_data");
		return $count;
	}

	//get the detail of gallery using its id
	public function getDetail( $id, $returnRecordSet = false)
	{
		$data = array();
		$query = $this->getSelectDetailQuery( $id);
		$rs = $this->connection->Execute( $query );

		if($returnRecordSet)
			return $rs;
		else
		{
			$o = $this->createNew();
			$o = $this->init($rs, $o);
			return $o;
		}
	}

	//Inserting gallery object into database
	public function insert( $o)
	{
		$data = array();
		$query = $this->getInsertQuery( $o);
		$rs = $this->connection->Execute( $query );
		
		$o->IdGallery = $rs;
		
		return $rs;
	}

	//Updating a gallery object in database
	public function update( $o)
	{
		$data = array();
		$query = $this->getUpdateQuery( $o);
		$rs = $this->connection->Execute( $query );
		return $o;
	}

	//Delete a gallery by id in database
	public function delete( $id)
	{
		$query = $this->getDeleteQuery( $id);
		$this->connection->Execute( $query);
	}

	//Delete a gallery by id in database
	public function deleteWhere( $condition)
	{
		$query = $this->getDeleteQueryByCondition( $condition );
		$this->connection->Execute( $query);
	}

	//Create new object of gallery
	public function createNew()
	{
		$o = new gallery();
		return $o;
	}


}//End of class

//Adapter for galleryalbum
class _galleryalbumAdapter extends SoondaAdapter
{	

	public function sortBy()
	{
		$sortBy = "";
	
		$sortBy .= "IdGalleryAlbum ASC";
	
		return $sortBy;
	}

	//get query to retrieve all galleryalbum data
	public function getSelectQuery()
	{
		$query = "SELECT * FROM galleryalbum ";
		return $query;
	}

	//get query to count all galleryalbum data
	public function getSelectQueryCount()
	{
		$query = "SELECT count(*) as total_data FROM galleryalbum";
		return $query;
	}

	//Get query for detail galleryalbum data
	protected function getSelectDetailQuery( $id)
	{
		$condition = "";
	
		$condition .= "IdGalleryAlbum = ".$id;
	
		$query = $this->getSelectQuery( );

		if( $condition != "")
			$condition = " WHERE ".$condition;
		$query = $query.$condition;
		return $query;
	}

	//Get query to insert an galleryalbum object
	protected function getInsertQuery( $o)
	{
		$columns = "";
		$values = "";
		$condition = "";
		$query = "INSERT INTO galleryalbum ( ";
	
		$columns .= "AlbumTitle,";
		$values .= "'".SoondaUtil::encloseHTML( $o->AlbumTitle )."',";
			
		$columns .= "AlbumDescription,";
		$values .= "'".SoondaUtil::encloseHTML( $o->AlbumDescription )."',";

		$columns .= "AlbumImage,";
		$values .= "'".SoondaUtil::encloseHTML( $o->AlbumImage )."',";

		$columns .= "Tag,";
		$values .= "'".SoondaUtil::encloseHTML( $o->Tag )."',";
	
		$columns .= "AlbumCreatedDate,";
		if( str_replace(" ", "", $o->AlbumCreatedDate) == "")
			$values .= "NULL,";
		else
			$values .= "'".$o->AlbumCreatedDate."',";
	
		$columns = substr( $columns, 0, strlen( $columns) - 1);
		$values = substr( $values, 0, strlen( $values) - 1);
		$query = $query.$columns." ) VALUES (".$values.")";
		return $query;
	}

	//Get query to Update an galleryalbum object
	protected function getUpdateQuery( $o)
	{
		$columnAndValues = "";
		$condition = "";
		$query = "UPDATE galleryalbum SET ";
	
		$condition .= "IdGalleryAlbum = ".$o->IdGalleryAlbum." AND ";
	
		$columnAndValues .= "AlbumTitle = '".SoondaUtil::encloseHTML( $o->AlbumTitle )."',";
	
		$columnAndValues .= "AlbumDescription = '".SoondaUtil::encloseHTML( $o->AlbumDescription )."',";

		$columnAndValues .= "AlbumImage = '".SoondaUtil::encloseHTML( $o->AlbumImage )."',";

		$columnAndValues .= "Tag = '".SoondaUtil::encloseHTML( $o->Tag )."',";
	
		if(str_replace(" ", "", $o->AlbumCreatedDate) == "")
			$columnAndValues .= "AlbumCreatedDate = NULL,";
		else
			$columnAndValues .= "AlbumCreatedDate = '".$o->AlbumCreatedDate."',";
	
		$columnAndValues = substr( $columnAndValues, 0, strlen($columnAndValues) - 1);
		$condition = substr( $condition, 0, strlen($condition) - 4);
		$query = $query.$columnAndValues." WHERE ".$condition;
		return $query;
	}

	//Get query to delete galleryalbum by id
	protected function getDeleteQuery( $id)
	{
		$condition = "";
		$query = "DELETE FROM galleryalbum ";
	
		$condition .= "IdGalleryAlbum = ".$id;
	
		$query = $query." WHERE ".$condition;
		return $query;
	}

	//Get query to delete galleryalbum by condition
	protected function getDeleteQueryByCondition( $condition )
	{
		$query = "DELETE FROM galleryalbum ";
		$query = $query." WHERE ".$condition;
		return $query;
	}

	//to initialize an galleryalbum object with data from database
	protected function init($rs, $o)
	{
	
		$o->IdGalleryAlbum = SoondaUtil::decloseHTML( $rs->Fields("IdGalleryAlbum") );
	
		$o->AlbumTitle = SoondaUtil::decloseHTML( $rs->Fields("AlbumTitle") );
	
		$o->AlbumDescription = SoondaUtil::decloseHTML( $rs->Fields("AlbumDescription") );

		$o->AlbumImage = SoondaUtil::decloseHTML( $rs->Fields("AlbumImage") );

		$o->Tag = SoondaUtil::decloseHTML( $rs->Fields("Tag") );
	
		$o->AlbumCreatedDate = $rs->Fields("AlbumCreatedDate");
	
		return $o;
	}

	//get all the galleryalbum data from database
	public function getAll( $condition = "", $order="", $offset = "", $limit = "", $returnRecordSet = false)
	{
		$data = array();
		$query = $this->getSelectQuery();
		if( str_replace(" ", "", $condition) != "")
			$condition = " WHERE ".$condition;

		$order = ( $order == "" ) ? $this->sortBy() : $order ;
		if( str_replace(" ", "", $order)!= "")
			$order = " ORDER BY ".$order;

		$query = $query." $condition $order";

		$rs = $this->connection->Execute( $query,  $limit, $offset );

		if($returnRecordSet)
			return $rs;
		else
		{
			while( !$rs->EOF)
			{
				$o = $this->createNew();
				$o = $this->init($rs, $o);
				array_push( $data, $o);
				$rs->MoveNext();
			}

			return $data;
		}
	}

	//get the galleryalbum total number of data from database
	public function getCount( $condition="")
	{
		//Get data query count for the galleryalbum data
		$query = $this->getSelectQueryCount();
		if( str_replace(" ", "", $condition) != "")
			$condition = " WHERE ".$condition;
		$query .= $condition;

		//Retrieve the galleryalbum data count
		$rs = $this->connection->Execute( $query);
		$count = $rs->Fields("total_data");
		return $count;
	}

	//get the detail of galleryalbum using its id
	public function getDetail( $id, $returnRecordSet = false)
	{
		$data = array();
		$query = $this->getSelectDetailQuery( $id);
		$rs = $this->connection->Execute( $query );

		if($returnRecordSet)
			return $rs;
		else
		{
			$o = $this->createNew();
			$o = $this->init($rs, $o);
			return $o;
		}
	}

	//Inserting galleryalbum object into database
	public function insert( $o)
	{
		$data = array();
		$query = $this->getInsertQuery( $o);
		$rs = $this->connection->Execute( $query );
		
		$o->IdGalleryAlbum = $rs;
		
		return $rs;
	}

	//Updating a galleryalbum object in database
	public function update( $o)
	{
		$data = array();
		$query = $this->getUpdateQuery( $o);
		$rs = $this->connection->Execute( $query );
		return $o;
	}

	//Delete a galleryalbum by id in database
	public function delete( $id)
	{
		$query = $this->getDeleteQuery( $id);
		$this->connection->Execute( $query);
	}

	//Delete a galleryalbum by id in database
	public function deleteWhere( $condition)
	{
		$query = $this->getDeleteQueryByCondition( $condition );
		$this->connection->Execute( $query);
	}

	//Create new object of galleryalbum
	public function createNew()
	{
		$o = new galleryalbum();
		return $o;
	}


}//End of class

//Adapter for gender
class _genderAdapter extends SoondaAdapter
{	

	public function sortBy()
	{
		$sortBy = "";
	
		$sortBy .= "IdGender ASC";
	
		return $sortBy;
	}

	//get query to retrieve all gender data
	public function getSelectQuery()
	{
		$query = "SELECT * FROM gender ";
		return $query;
	}

	//get query to count all gender data
	public function getSelectQueryCount()
	{
		$query = "SELECT count(*) as total_data FROM gender";
		return $query;
	}

	//Get query for detail gender data
	protected function getSelectDetailQuery( $id)
	{
		$condition = "";
	
		$condition .= "IdGender = ".$id;
	
		$query = $this->getSelectQuery( );

		if( $condition != "")
			$condition = " WHERE ".$condition;
		$query = $query.$condition;
		return $query;
	}

	//Get query to insert an gender object
	protected function getInsertQuery( $o)
	{
		$columns = "";
		$values = "";
		$condition = "";
		$query = "INSERT INTO gender ( ";
	
			
		$columns .= "GenderName,";
		$values .= "'".SoondaUtil::encloseHTML( $o->GenderName )."',";
	
			
		$columns .= "GenderInfo,";
		$values .= "'".SoondaUtil::encloseHTML( $o->GenderInfo )."',";
	
		$columns = substr( $columns, 0, strlen( $columns) - 1);
		$values = substr( $values, 0, strlen( $values) - 1);
		$query = $query.$columns." ) VALUES (".$values.")";
		return $query;
	}

	//Get query to Update an gender object
	protected function getUpdateQuery( $o)
	{
		$columnAndValues = "";
		$condition = "";
		$query = "UPDATE gender SET ";
	
		$condition .= "IdGender = ".$o->IdGender." AND ";
	
		$columnAndValues .= "GenderName = '".SoondaUtil::encloseHTML( $o->GenderName )."',";
	
		$columnAndValues .= "GenderInfo = '".SoondaUtil::encloseHTML( $o->GenderInfo )."',";
	
		$columnAndValues = substr( $columnAndValues, 0, strlen($columnAndValues) - 1);
		$condition = substr( $condition, 0, strlen($condition) - 4);
		$query = $query.$columnAndValues." WHERE ".$condition;
		return $query;
	}

	//Get query to delete gender by id
	protected function getDeleteQuery( $id)
	{
		$condition = "";
		$query = "DELETE FROM gender ";
	
		$condition .= "IdGender = ".$id;
	
		$query = $query." WHERE ".$condition;
		return $query;
	}

	//Get query to delete gender by condition
	protected function getDeleteQueryByCondition( $condition )
	{
		$query = "DELETE FROM gender ";
		$query = $query." WHERE ".$condition;
		return $query;
	}

	//to initialize an gender object with data from database
	protected function init($rs, $o)
	{
	
		$o->IdGender = SoondaUtil::decloseHTML( $rs->Fields("IdGender") );
	
		$o->GenderName = SoondaUtil::decloseHTML( $rs->Fields("GenderName") );
	
		$o->GenderInfo = SoondaUtil::decloseHTML( $rs->Fields("GenderInfo") );
	
		return $o;
	}

	//get all the gender data from database
	public function getAll( $condition = "", $order="", $offset = "", $limit = "", $returnRecordSet = false)
	{
		$data = array();
		$query = $this->getSelectQuery();
		if( str_replace(" ", "", $condition) != "")
			$condition = " WHERE ".$condition;

		$order = ( $order == "" ) ? $this->sortBy() : $order ;
		if( str_replace(" ", "", $order)!= "")
			$order = " ORDER BY ".$order;

		$query = $query." $condition $order";

		$rs = $this->connection->Execute( $query,  $limit, $offset );

		if($returnRecordSet)
			return $rs;
		else
		{
			while( !$rs->EOF)
			{
				$o = $this->createNew();
				$o = $this->init($rs, $o);
				array_push( $data, $o);
				$rs->MoveNext();
			}

			return $data;
		}
	}

	//get the gender total number of data from database
	public function getCount( $condition="")
	{
		//Get data query count for the gender data
		$query = $this->getSelectQueryCount();
		if( str_replace(" ", "", $condition) != "")
			$condition = " WHERE ".$condition;
		$query .= $condition;

		//Retrieve the gender data count
		$rs = $this->connection->Execute( $query);
		$count = $rs->Fields("total_data");
		return $count;
	}

	//get the detail of gender using its id
	public function getDetail( $id, $returnRecordSet = false)
	{
		$data = array();
		$query = $this->getSelectDetailQuery( $id);
		$rs = $this->connection->Execute( $query );

		if($returnRecordSet)
			return $rs;
		else
		{
			$o = $this->createNew();
			$o = $this->init($rs, $o);
			return $o;
		}
	}

	//Inserting gender object into database
	public function insert( $o)
	{
		$data = array();
		$query = $this->getInsertQuery( $o);
		$rs = $this->connection->Execute( $query );
		
		$o->IdGender = $rs;
		
		return $rs;
	}

	//Updating a gender object in database
	public function update( $o)
	{
		$data = array();
		$query = $this->getUpdateQuery( $o);
		$rs = $this->connection->Execute( $query );
		return $o;
	}

	//Delete a gender by id in database
	public function delete( $id)
	{
		$query = $this->getDeleteQuery( $id);
		$this->connection->Execute( $query);
	}

	//Delete a gender by id in database
	public function deleteWhere( $condition)
	{
		$query = $this->getDeleteQueryByCondition( $condition );
		$this->connection->Execute( $query);
	}

	//Create new object of gender
	public function createNew()
	{
		$o = new gender();
		return $o;
	}


}//End of class

//Adapter for post
class _postAdapter extends SoondaAdapter
{	

	public function sortBy()
	{
		$sortBy = "";
	
		$sortBy .= "IdPost ASC";
	
		return $sortBy;
	}

	//get query to retrieve all post data
	public function getSelectQuery()
	{
		$query = "SELECT * FROM post ";
		return $query;
	}

	//get query to count all post data
	public function getSelectQueryCount()
	{
		$query = "SELECT count(*) as total_data FROM post";
		return $query;
	}

	//Get query for detail post data
	protected function getSelectDetailQuery( $id)
	{
		$condition = "";
	
		$condition .= "IdPost = ".$id;
	
		$query = $this->getSelectQuery( );

		if( $condition != "")
			$condition = " WHERE ".$condition;
		$query = $query.$condition;
		return $query;
	}

	//Get query to insert an post object
	protected function getInsertQuery( $o)
	{
		$columns = "";
		$values = "";
		$condition = "";
		$query = "INSERT INTO post ( ";
	
		$columns .= "IdPost,";
		if(str_replace(" ", "",  $o->IdPost) == "")
			$values .= "0,";
		else
			$values .= "".SoondaUtil::encloseHTML( $o->IdPost ).",";
			
	
			
		$columns .= "PostTitle,";
		$values .= "'".SoondaUtil::encloseHTML( $o->PostTitle )."',";
	
			
		$columns .= "PostSubTitle,";
		$values .= "'".SoondaUtil::encloseHTML( $o->PostSubTitle )."',";
	
		$columns .= "PostDate,";
		if( str_replace(" ", "", $o->PostDate) == "")
			$values .= "NULL,";
		else
			$values .= "'".$o->PostDate."',";
	
			
		$columns .= "PostShortText,";
		$values .= "'".SoondaUtil::encloseHTML( $o->PostShortText )."',";
	
			
		$columns .= "PostText,";
		$values .= "'".SoondaUtil::encloseHTML( $o->PostText )."',";
	
			
		$columns .= "PostMainImage,";
		$values .= "'".SoondaUtil::encloseHTML( $o->PostMainImage )."',";
	
		$columns .= "PostedById,";
		if(str_replace(" ", "",  $o->PostedById) == "")
			$values .= "0,";
		else
			$values .= "".SoondaUtil::encloseHTML( $o->PostedById ).",";
			
	
			
		$columns .= "PostTag,";
		$values .= "'".SoondaUtil::encloseHTML( $o->PostTag )."',";
	
		$columns .= "IsActive,";
		if(str_replace(" ", "",  $o->IsActive) == "")
			$values .= "0,";
		else
			$values .= "".SoondaUtil::encloseHTML( $o->IsActive ).",";
			
	
		$columns = substr( $columns, 0, strlen( $columns) - 1);
		$values = substr( $values, 0, strlen( $values) - 1);
		$query = $query.$columns." ) VALUES (".$values.")";
		return $query;
	}

	//Get query to Update an post object
	protected function getUpdateQuery( $o)
	{
		$columnAndValues = "";
		$condition = "";
		$query = "UPDATE post SET ";
	
		$condition .= "IdPost = ".$o->IdPost." AND ";
	
		$columnAndValues .= "PostTitle = '".SoondaUtil::encloseHTML( $o->PostTitle )."',";
	
		$columnAndValues .= "PostSubTitle = '".SoondaUtil::encloseHTML( $o->PostSubTitle )."',";
	
		if(str_replace(" ", "", $o->PostDate) == "")
			$columnAndValues .= "PostDate = NULL,";
		else
			$columnAndValues .= "PostDate = '".$o->PostDate."',";
	
		$columnAndValues .= "PostShortText = '".SoondaUtil::encloseHTML( $o->PostShortText )."',";
	
		$columnAndValues .= "PostText = '".SoondaUtil::encloseHTML( $o->PostText )."',";
	
		$columnAndValues .= "PostMainImage = '".SoondaUtil::encloseHTML( $o->PostMainImage )."',";
	
		if(str_replace(" ", "",  $o->PostedById) == "")
			$columnAndValues .= "PostedById = 0,";		
		else
			$columnAndValues .= "PostedById = ".SoondaUtil::encloseHTML( $o->PostedById ).",";
	
		$columnAndValues .= "PostTag = '".SoondaUtil::encloseHTML( $o->PostTag )."',";
	
		if(str_replace(" ", "",  $o->IsActive) == "")
			$columnAndValues .= "IsActive = 0,";		
		else
			$columnAndValues .= "IsActive = ".SoondaUtil::encloseHTML( $o->IsActive ).",";
	
		$columnAndValues = substr( $columnAndValues, 0, strlen($columnAndValues) - 1);
		$condition = substr( $condition, 0, strlen($condition) - 4);
		$query = $query.$columnAndValues." WHERE ".$condition;
		return $query;
	}

	//Get query to delete post by id
	protected function getDeleteQuery( $id)
	{
		$condition = "";
		$query = "DELETE FROM post ";
	
		$condition .= "IdPost = ".$id;
	
		$query = $query." WHERE ".$condition;
		return $query;
	}

	//Get query to delete post by condition
	protected function getDeleteQueryByCondition( $condition )
	{
		$query = "DELETE FROM post ";
		$query = $query." WHERE ".$condition;
		return $query;
	}

	//to initialize an post object with data from database
	protected function init($rs, $o)
	{
	
		$o->IdPost = SoondaUtil::decloseHTML( $rs->Fields("IdPost") );
	
		$o->PostTitle = SoondaUtil::decloseHTML( $rs->Fields("PostTitle") );
	
		$o->PostSubTitle = SoondaUtil::decloseHTML( $rs->Fields("PostSubTitle") );
	
		$o->PostDate = $rs->Fields("PostDate");
	
		$o->PostShortText = SoondaUtil::decloseHTML( $rs->Fields("PostShortText") );
	
		$o->PostText = SoondaUtil::decloseHTML( $rs->Fields("PostText") );
	
		$o->PostMainImage = SoondaUtil::decloseHTML( $rs->Fields("PostMainImage") );
	
		$o->PostedById = SoondaUtil::decloseHTML( $rs->Fields("PostedById") );
	
		$o->PostTag = SoondaUtil::decloseHTML( $rs->Fields("PostTag") );
	
		$o->IsActive = SoondaUtil::decloseHTML( $rs->Fields("IsActive") );
	
		return $o;
	}

	//get all the post data from database
	public function getAll( $condition = "", $order="", $offset = "", $limit = "", $returnRecordSet = false)
	{
		$data = array();
		$query = $this->getSelectQuery();
		if( str_replace(" ", "", $condition) != "")
			$condition = " WHERE ".$condition;

		$order = ( $order == "" ) ? $this->sortBy() : $order ;
		if( str_replace(" ", "", $order)!= "")
			$order = " ORDER BY ".$order;

		$query = $query." $condition $order";

		$rs = $this->connection->Execute( $query,  $limit, $offset );

		if($returnRecordSet)
			return $rs;
		else
		{
			while( !$rs->EOF)
			{
				$o = $this->createNew();
				$o = $this->init($rs, $o);
				array_push( $data, $o);
				$rs->MoveNext();
			}

			return $data;
		}
	}

	//get the post total number of data from database
	public function getCount( $condition="")
	{
		//Get data query count for the post data
		$query = $this->getSelectQueryCount();
		if( str_replace(" ", "", $condition) != "")
			$condition = " WHERE ".$condition;
		$query .= $condition;

		//Retrieve the post data count
		$rs = $this->connection->Execute( $query);
		$count = $rs->Fields("total_data");
		return $count;
	}

	//get the detail of post using its id
	public function getDetail( $id, $returnRecordSet = false)
	{
		$data = array();
		$query = $this->getSelectDetailQuery( $id);
		$rs = $this->connection->Execute( $query );

		if($returnRecordSet)
			return $rs;
		else
		{
			$o = $this->createNew();
			$o = $this->init($rs, $o);
			return $o;
		}
	}

	//Inserting post object into database
	public function insert( $o)
	{
		$data = array();
		$query = $this->getInsertQuery( $o);
		$rs = $this->connection->Execute( $query );
		
		$o->IdPost = $rs;
		
		return $rs;
	}

	//Updating a post object in database
	public function update( $o)
	{
		$data = array();
		$query = $this->getUpdateQuery( $o);
		$rs = $this->connection->Execute( $query );
		return $o;
	}

	//Delete a post by id in database
	public function delete( $id)
	{
		$query = $this->getDeleteQuery( $id);
		$this->connection->Execute( $query);
	}

	//Delete a post by id in database
	public function deleteWhere( $condition)
	{
		$query = $this->getDeleteQueryByCondition( $condition );
		$this->connection->Execute( $query);
	}

	//Create new object of post
	public function createNew()
	{
		$o = new post();
		return $o;
	}


}//End of class

//Adapter for user
class _userAdapter extends SoondaAdapter
{	

	public function sortBy()
	{
		$sortBy = "";
	
		$sortBy .= "IdUser ASC";
	
		return $sortBy;
	}

	//get query to retrieve all user data
	public function getSelectQuery()
	{
		$query = "SELECT * FROM user ";
		return $query;
	}

	//get query to count all user data
	public function getSelectQueryCount()
	{
		$query = "SELECT count(*) as total_data FROM user";
		return $query;
	}

	//Get query for detail user data
	protected function getSelectDetailQuery( $id)
	{
		$condition = "";
	
		$condition .= "IdUser = ".$id;
	
		$query = $this->getSelectQuery( );

		if( $condition != "")
			$condition = " WHERE ".$condition;
		$query = $query.$condition;
		return $query;
	}

	//Get query to insert an user object
	protected function getInsertQuery( $o)
	{
		$columns = "";
		$values = "";
		$condition = "";
		$query = "INSERT INTO user ( ";
	
			
		$columns .= "FirstName,";
		$values .= "'".SoondaUtil::encloseHTML( $o->FirstName )."',";
	
			
		$columns .= "LastName,";
		$values .= "'".SoondaUtil::encloseHTML( $o->LastName )."',";
	
			
		$columns .= "UserPicture,";
		$values .= "'".SoondaUtil::encloseHTML( $o->UserPicture )."',";
	
		$columns .= "UserRegisteredDate,";
		if( str_replace(" ", "", $o->UserRegisteredDate) == "")
			$values .= "NULL,";
		else
			$values .= "'".$o->UserRegisteredDate."',";
	
		$columns .= "GenderId,";
		if(str_replace(" ", "",  $o->GenderId) == "")
			$values .= "0,";
		else
			$values .= "".SoondaUtil::encloseHTML( $o->GenderId ).",";
			
	
			
		$columns .= "UserEmail,";
		$values .= "'".SoondaUtil::encloseHTML( $o->UserEmail )."',";
	
			
		$columns .= "UserPhone,";
		$values .= "'".SoondaUtil::encloseHTML( $o->UserPhone )."',";
	
		$columns .= "UserGroupId,";
		if(str_replace(" ", "",  $o->UserGroupId) == "")
			$values .= "0,";
		else
			$values .= "".SoondaUtil::encloseHTML( $o->UserGroupId ).",";
			
	
		$columns = substr( $columns, 0, strlen( $columns) - 1);
		$values = substr( $values, 0, strlen( $values) - 1);
		$query = $query.$columns." ) VALUES (".$values.")";
		return $query;
	}

	//Get query to Update an user object
	protected function getUpdateQuery( $o)
	{
		$columnAndValues = "";
		$condition = "";
		$query = "UPDATE user SET ";
	
		$condition .= "IdUser = ".$o->IdUser." AND ";
	
		$columnAndValues .= "FirstName = '".SoondaUtil::encloseHTML( $o->FirstName )."',";
	
		$columnAndValues .= "LastName = '".SoondaUtil::encloseHTML( $o->LastName )."',";
	
		$columnAndValues .= "UserPicture = '".SoondaUtil::encloseHTML( $o->UserPicture )."',";
	
		if(str_replace(" ", "", $o->UserRegisteredDate) == "")
			$columnAndValues .= "UserRegisteredDate = NULL,";
		else
			$columnAndValues .= "UserRegisteredDate = '".$o->UserRegisteredDate."',";
	
		if(str_replace(" ", "",  $o->GenderId) == "")
			$columnAndValues .= "GenderId = 0,";		
		else
			$columnAndValues .= "GenderId = ".SoondaUtil::encloseHTML( $o->GenderId ).",";
	
		$columnAndValues .= "UserEmail = '".SoondaUtil::encloseHTML( $o->UserEmail )."',";
	
		$columnAndValues .= "UserPhone = '".SoondaUtil::encloseHTML( $o->UserPhone )."',";
	
		if(str_replace(" ", "",  $o->UserGroupId) == "")
			$columnAndValues .= "UserGroupId = 0,";		
		else
			$columnAndValues .= "UserGroupId = ".SoondaUtil::encloseHTML( $o->UserGroupId ).",";
	
		$columnAndValues = substr( $columnAndValues, 0, strlen($columnAndValues) - 1);
		$condition = substr( $condition, 0, strlen($condition) - 4);
		$query = $query.$columnAndValues." WHERE ".$condition;
		return $query;
	}

	//Get query to delete user by id
	protected function getDeleteQuery( $id)
	{
		$condition = "";
		$query = "DELETE FROM user ";
	
		$condition .= "IdUser = ".$id;
	
		$query = $query." WHERE ".$condition;
		return $query;
	}

	//Get query to delete user by condition
	protected function getDeleteQueryByCondition( $condition )
	{
		$query = "DELETE FROM user ";
		$query = $query." WHERE ".$condition;
		return $query;
	}

	//to initialize an user object with data from database
	protected function init($rs, $o)
	{
	
		$o->IdUser = SoondaUtil::decloseHTML( $rs->Fields("IdUser") );
	
		$o->FirstName = SoondaUtil::decloseHTML( $rs->Fields("FirstName") );
	
		$o->LastName = SoondaUtil::decloseHTML( $rs->Fields("LastName") );
	
		$o->UserPicture = SoondaUtil::decloseHTML( $rs->Fields("UserPicture") );
	
		$o->UserRegisteredDate = $rs->Fields("UserRegisteredDate");
	
		$o->GenderId = SoondaUtil::decloseHTML( $rs->Fields("GenderId") );
	
		$o->UserEmail = SoondaUtil::decloseHTML( $rs->Fields("UserEmail") );
	
		$o->UserPhone = SoondaUtil::decloseHTML( $rs->Fields("UserPhone") );
	
		$o->UserGroupId = SoondaUtil::decloseHTML( $rs->Fields("UserGroupId") );
	
		return $o;
	}

	//get all the user data from database
	public function getAll( $condition = "", $order="", $offset = "", $limit = "", $returnRecordSet = false)
	{
		$data = array();
		$query = $this->getSelectQuery();
		if( str_replace(" ", "", $condition) != "")
			$condition = " WHERE ".$condition;

		$order = ( $order == "" ) ? $this->sortBy() : $order ;
		if( str_replace(" ", "", $order)!= "")
			$order = " ORDER BY ".$order;

		$query = $query." $condition $order";

		$rs = $this->connection->Execute( $query,  $limit, $offset );

		if($returnRecordSet)
			return $rs;
		else
		{
			while( !$rs->EOF)
			{
				$o = $this->createNew();
				$o = $this->init($rs, $o);
				array_push( $data, $o);
				$rs->MoveNext();
			}

			return $data;
		}
	}

	//get the user total number of data from database
	public function getCount( $condition="")
	{
		//Get data query count for the user data
		$query = $this->getSelectQueryCount();
		if( str_replace(" ", "", $condition) != "")
			$condition = " WHERE ".$condition;
		$query .= $condition;

		//Retrieve the user data count
		$rs = $this->connection->Execute( $query);
		$count = $rs->Fields("total_data");
		return $count;
	}

	//get the detail of user using its id
	public function getDetail( $id, $returnRecordSet = false)
	{
		$data = array();
		$query = $this->getSelectDetailQuery( $id);
		$rs = $this->connection->Execute( $query );

		if($returnRecordSet)
			return $rs;
		else
		{
			$o = $this->createNew();
			$o = $this->init($rs, $o);
			return $o;
		}
	}

	//Inserting user object into database
	public function insert( $o)
	{
		$data = array();
		$query = $this->getInsertQuery( $o);
		$rs = $this->connection->Execute( $query );
		
		$o->IdUser = $rs;
		
		return $rs;
	}

	//Updating a user object in database
	public function update( $o)
	{
		$data = array();
		$query = $this->getUpdateQuery( $o);
		$rs = $this->connection->Execute( $query );
		return $o;
	}

	//Delete a user by id in database
	public function delete( $id)
	{
		$query = $this->getDeleteQuery( $id);
		$this->connection->Execute( $query);
	}

	//Delete a user by id in database
	public function deleteWhere( $condition)
	{
		$query = $this->getDeleteQueryByCondition( $condition );
		$this->connection->Execute( $query);
	}

	//Create new object of user
	public function createNew()
	{
		$o = new user();
		return $o;
	}


}//End of class

//Adapter for usergroup
class _usergroupAdapter extends SoondaAdapter
{	

	public function sortBy()
	{
		$sortBy = "";
	
		$sortBy .= "IdUserGroup ASC";
	
		return $sortBy;
	}

	//get query to retrieve all usergroup data
	public function getSelectQuery()
	{
		$query = "SELECT * FROM usergroup ";
		return $query;
	}

	//get query to count all usergroup data
	public function getSelectQueryCount()
	{
		$query = "SELECT count(*) as total_data FROM usergroup";
		return $query;
	}

	//Get query for detail usergroup data
	protected function getSelectDetailQuery( $id)
	{
		$condition = "";
	
		$condition .= "IdUserGroup = ".$id;
	
		$query = $this->getSelectQuery( );

		if( $condition != "")
			$condition = " WHERE ".$condition;
		$query = $query.$condition;
		return $query;
	}

	//Get query to insert an usergroup object
	protected function getInsertQuery( $o)
	{
		$columns = "";
		$values = "";
		$condition = "";
		$query = "INSERT INTO usergroup ( ";
	
			
		$columns .= "UserGroup,";
		$values .= "'".SoondaUtil::encloseHTML( $o->UserGroup )."',";
	
			
		$columns .= "UserGroupDesc,";
		$values .= "'".SoondaUtil::encloseHTML( $o->UserGroupDesc )."',";
	
		$columns = substr( $columns, 0, strlen( $columns) - 1);
		$values = substr( $values, 0, strlen( $values) - 1);
		$query = $query.$columns." ) VALUES (".$values.")";
		return $query;
	}

	//Get query to Update an usergroup object
	protected function getUpdateQuery( $o)
	{
		$columnAndValues = "";
		$condition = "";
		$query = "UPDATE usergroup SET ";
	
		$condition .= "IdUserGroup = ".$o->IdUserGroup." AND ";
	
		$columnAndValues .= "UserGroup = '".SoondaUtil::encloseHTML( $o->UserGroup )."',";
	
		$columnAndValues .= "UserGroupDesc = '".SoondaUtil::encloseHTML( $o->UserGroupDesc )."',";
	
		$columnAndValues = substr( $columnAndValues, 0, strlen($columnAndValues) - 1);
		$condition = substr( $condition, 0, strlen($condition) - 4);
		$query = $query.$columnAndValues." WHERE ".$condition;
		return $query;
	}

	//Get query to delete usergroup by id
	protected function getDeleteQuery( $id)
	{
		$condition = "";
		$query = "DELETE FROM usergroup ";
	
		$condition .= "IdUserGroup = ".$id;
	
		$query = $query." WHERE ".$condition;
		return $query;
	}

	//Get query to delete usergroup by condition
	protected function getDeleteQueryByCondition( $condition )
	{
		$query = "DELETE FROM usergroup ";
		$query = $query." WHERE ".$condition;
		return $query;
	}

	//to initialize an usergroup object with data from database
	protected function init($rs, $o)
	{
	
		$o->IdUserGroup = SoondaUtil::decloseHTML( $rs->Fields("IdUserGroup") );
	
		$o->UserGroup = SoondaUtil::decloseHTML( $rs->Fields("UserGroup") );
	
		$o->UserGroupDesc = SoondaUtil::decloseHTML( $rs->Fields("UserGroupDesc") );
	
		return $o;
	}

	//get all the usergroup data from database
	public function getAll( $condition = "", $order="", $offset = "", $limit = "", $returnRecordSet = false)
	{
		$data = array();
		$query = $this->getSelectQuery();
		if( str_replace(" ", "", $condition) != "")
			$condition = " WHERE ".$condition;

		$order = ( $order == "" ) ? $this->sortBy() : $order ;
		if( str_replace(" ", "", $order)!= "")
			$order = " ORDER BY ".$order;

		$query = $query." $condition $order";

		$rs = $this->connection->Execute( $query,  $limit, $offset );

		if($returnRecordSet)
			return $rs;
		else
		{
			while( !$rs->EOF)
			{
				$o = $this->createNew();
				$o = $this->init($rs, $o);
				array_push( $data, $o);
				$rs->MoveNext();
			}

			return $data;
		}
	}

	//get the usergroup total number of data from database
	public function getCount( $condition="")
	{
		//Get data query count for the usergroup data
		$query = $this->getSelectQueryCount();
		if( str_replace(" ", "", $condition) != "")
			$condition = " WHERE ".$condition;
		$query .= $condition;

		//Retrieve the usergroup data count
		$rs = $this->connection->Execute( $query);
		$count = $rs->Fields("total_data");
		return $count;
	}

	//get the detail of usergroup using its id
	public function getDetail( $id, $returnRecordSet = false)
	{
		$data = array();
		$query = $this->getSelectDetailQuery( $id);
		$rs = $this->connection->Execute( $query );

		if($returnRecordSet)
			return $rs;
		else
		{
			$o = $this->createNew();
			$o = $this->init($rs, $o);
			return $o;
		}
	}

	//Inserting usergroup object into database
	public function insert( $o)
	{
		$data = array();
		$query = $this->getInsertQuery( $o);
		$rs = $this->connection->Execute( $query );
		
		$o->IdUserGroup = $rs;
		
		return $rs;
	}

	//Updating a usergroup object in database
	public function update( $o)
	{
		$data = array();
		$query = $this->getUpdateQuery( $o);
		$rs = $this->connection->Execute( $query );
		return $o;
	}

	//Delete a usergroup by id in database
	public function delete( $id)
	{
		$query = $this->getDeleteQuery( $id);
		$this->connection->Execute( $query);
	}

	//Delete a usergroup by id in database
	public function deleteWhere( $condition)
	{
		$query = $this->getDeleteQueryByCondition( $condition );
		$this->connection->Execute( $query);
	}

	//Create new object of usergroup
	public function createNew()
	{
		$o = new usergroup();
		return $o;
	}


}//End of class




?>