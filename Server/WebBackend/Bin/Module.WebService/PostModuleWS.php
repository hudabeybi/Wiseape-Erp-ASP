<?php

class PostModuleWS extends SoondaWS
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

		$adapter = $this->getAdapter( "PostModule", $this->dbConnection);
		$adapter->connection = $this->dbConnection;
		$data	 = $adapter->getAll( $this->param["condition"], $this->param["order"], $offset, $limit );
		
		$res = array( "Result" => true, "Data" => $data, "Message" => "Ok" );
		return $res;
	}

	function detailData()
	{
		$adapter = $this->getAdapter( "PostModule", $this->dbConnection);
		$adapter->connection = $this->dbConnection;
		$data	 = $adapter->getDetail( $this->param["Soonda_Library.BO.ModuleColumn"] );
		if($data == null)
			$res = array("Result" => true, "Data"=> null, "Message" => "0 results" );
		else			
			$res = array( "Result" => true, "Data" => $data, "Message" => "Ok" );
		return $res;
	}


	function saveAddData()
	{
		$adapter = $this->getAdapter( "PostModule", $this->dbConnection);
		$adapter->connection = $this->dbConnection;

		$o		 = $adapter->createNew();
		$o		 = $this->setObjectFromPost( $o );
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

	function saveEditData()
	{
		$adapter = $this->getAdapter( "PostModule", $this->dbConnection);
		$adapter->connection = $this->dbConnection;

		$o		 = $adapter->createNew();
		$o		 = $this->setObjectFromPost( $o );
		$validat = $this->validateEdit( $adapter, $o );
		if( $validat->succeed )
		{
			$adapter->update( $o );
			$res	 = array( "Result" => true, "Data" => $o, "Message" => "The data has been added");
		}
		else
		{
			$res	 = array( "Result" => false, "Data" => $o, "Message" => $validat->message );
		}
		
		return $res;
	}

	function deleteData()
	{
		$adapter = $this->getAdapter( "PostModule", $this->dbConnection);
		$adapter->connection = $this->dbConnection;
	
		if( file_exists( $o->PostMainImage ) )
		{
			unlink($o->PostMainImage);
		}
	

	}


	/*
	*	Function: getLookups( )
	*	Return value: array of all lookup data for Post form. 
	*	Description:
	*	Return all lookup data for Post form. These lookup data will be used for lookup comboboxes.
	*/
	public function getLookups()
	{
		$lookups = array();
	
		return $lookups;
	}


	/*
	*	Function: validateAdd( $adapter, $o )
	*	Parameter: 
	*	- $adapter, data adapter object that will be used by the function. 
	*	- $o, object to be processed.
	*	Return value: boolean true or false. 
	*	Description:
	*	This function vailidate Post data during add operation. Return true if ok, false of not ok.
	*	When it returns false, the insert operation will halt.
	*/
	public function validateAdd( $adapter, $o )
	{
		$result = new ValidationResult();

		//Check Post Title
		if(SoondaUtil::CheckEmpty( $o->PostTitle, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:PostTitle}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "PostTitle";
			return $result;
		}

		//Check Post Sub Title
		if(SoondaUtil::CheckEmpty( $o->PostSubTitle, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:PostSubTitle}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "PostSubTitle";
			return $result;
		}

		//Check Post Date
		if(SoondaUtil::CheckEmpty( $o->PostDate, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:PostDate}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "PostDate";
			return $result;
		}

		//Check Post Short Text
		if(SoondaUtil::CheckEmpty( $o->PostShortText, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:PostShortText}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "PostShortText";
			return $result;
		}

		//Check Post Text
		if(SoondaUtil::CheckEmpty( $o->PostText, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:PostText}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "PostText";
			return $result;
		}

		//Check Post Main Image
		if(SoondaUtil::CheckEmpty( $o->PostMainImage, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:PostMainImage}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "PostMainImage";
			return $result;
		}

		//Check Posted By Id
		if(SoondaUtil::CheckEmpty( $o->PostedById, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:PostedById}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "PostedById";
			return $result;
		}

		//Check Is Active
		if(SoondaUtil::CheckEmpty( $o->IsActive, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:IsActive}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "IsActive";
			return $result;
		}

		//Check Post Tag
		if(SoondaUtil::CheckEmpty( $o->PostTag, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:PostTag}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "PostTag";
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
	*	This function vailidate Post data during edit operation. Return true if ok, false of not ok.
	*	When it returns false, the insert operation will halt.
	*/
	public function validateEdit( $adapter, $o )
	{
		$result = new ValidationResult();

		//Check Post Title
		if(SoondaUtil::CheckEmpty( $o->PostTitle, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:PostTitle}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "PostTitle";
			return $result;
		}

		//Check Post Sub Title
		if(SoondaUtil::CheckEmpty( $o->PostSubTitle, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:PostSubTitle}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "PostSubTitle";
			return $result;
		}

		//Check Post Date
		if(SoondaUtil::CheckEmpty( $o->PostDate, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:PostDate}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "PostDate";
			return $result;
		}

		//Check Post Short Text
		if(SoondaUtil::CheckEmpty( $o->PostShortText, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:PostShortText}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "PostShortText";
			return $result;
		}

		//Check Post Text
		if(SoondaUtil::CheckEmpty( $o->PostText, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:PostText}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "PostText";
			return $result;
		}

		//Check Post Main Image
		if(SoondaUtil::CheckEmpty( $o->PostMainImage, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:PostMainImage}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "PostMainImage";
			return $result;
		}

		//Check Posted By Id
		if(SoondaUtil::CheckEmpty( $o->PostedById, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:PostedById}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "PostedById";
			return $result;
		}

		//Check Is Active
		if(SoondaUtil::CheckEmpty( $o->IsActive, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:IsActive}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "IsActive";
			return $result;
		}

		//Check Post Tag
		if(SoondaUtil::CheckEmpty( $o->PostTag, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:PostTag}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "PostTag";
			return $result;
		}

		$result->succeed = true;
		$result->message = "Ok";
		return $result;
	}

}

?>