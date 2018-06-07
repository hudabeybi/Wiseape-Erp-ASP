<?php

class ApplicationModuleWS extends SoondaWS
{
	function index()
	{
		return $this->listData();
	}

	function listData()
	{
		$offset = (isset($this->param["offset"])) ? $this->param["offset"] : 0 ;
		$limit	= (isset($this->param["limit"])) ? $this->param["limit"] : 5 ;
		
		$adapter = $this->getAdapter( "ApplicationModule", $this->dbConnection);
		$adapter->connection = $this->dbConnection;
		$data	 = $adapter->getAll( $this->param["condition"], $this->param["order"], $offset, $limit );
		
		$res = array( "Result" => true, "Data" => $data, "Message" => "Ok" );
		return $res;
	}

	function findByName()
	{
		$name = $this->param["condition"];
		$this->param["condition"] = "ApplicationName LIKE '".$name."'";
		$res = $this->listData();
		$data = $res["Data"];
		
		if(count($data) > 0)
			$res["Data"] = $data[0];
		else
			$res["Data"] = array();
		return $res;
	}

	function detailData()
	{
		$adapter = $this->getAdapter( "ApplicationModule", $this->dbConnection);
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
		$adapter = $this->getAdapter( "ApplicationModule", $this->dbConnection);
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
		$adapter = $this->getAdapter( "ApplicationModule", $this->dbConnection);
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
		$adapter = $this->getAdapter( "ApplicationModule", $this->dbConnection);
		$adapter->connection = $this->dbConnection;
	
		if( file_exists( $o->ApplicationIconSmall ) )
		{
			unlink($o->ApplicationIconSmall);
		}
		if( file_exists( $o->ApplicationIconMiddle ) )
		{
			unlink($o->ApplicationIconMiddle);
		}
		if( file_exists( $o->ApplicationIconLarge ) )
		{
			unlink($o->ApplicationIconLarge);
		}
	

	}

	/*
	*	Function: validateAdd( $adapter, $o )
	*	Parameter: 
	*	- $adapter, data adapter object that will be used by the function. 
	*	- $o, object to be processed.
	*	Return value: boolean true or false. 
	*	Description:
	*	This function vailidate Application Module data during add operation. Return true if ok, false of not ok.
	*	When it returns false, the insert operation will halt.
	*/
	public function validateAdd( $adapter, $o )
	{
		$result = new ValidationResult();

		//Check Application Name
		if(SoondaUtil::CheckEmpty( $o->ApplicationName, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:ApplicationName}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "ApplicationName";
			return $result;
		}

		//Check Application Title
		if(SoondaUtil::CheckEmpty( $o->ApplicationTitle, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:ApplicationTitle}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "ApplicationTitle";
			return $result;
		}

		//Check Application Info
		if(SoondaUtil::CheckEmpty( $o->ApplicationInfo, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:ApplicationInfo}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "ApplicationInfo";
			return $result;
		}

		//Check Application Icon Small
		if(SoondaUtil::CheckEmpty( $o->ApplicationIconSmall, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:ApplicationIconSmall}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "ApplicationIconSmall";
			return $result;
		}

		//Check Application Icon Middle
		if(SoondaUtil::CheckEmpty( $o->ApplicationIconMiddle, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:ApplicationIconMiddle}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "ApplicationIconMiddle";
			return $result;
		}

		//Check Application Icon Large
		if(SoondaUtil::CheckEmpty( $o->ApplicationIconLarge, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:ApplicationIconLarge}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "ApplicationIconLarge";
			return $result;
		}

		//Check Application Path
		if(SoondaUtil::CheckEmpty( $o->ApplicationPath, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:ApplicationPath}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "ApplicationPath";
			return $result;
		}

		//Check Application File
		if(SoondaUtil::CheckEmpty( $o->ApplicationFile, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:ApplicationFile}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "ApplicationFile";
			return $result;
		}

		//Check Application Class
		if(SoondaUtil::CheckEmpty( $o->ApplicationClass, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:ApplicationClass}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "ApplicationClass";
			return $result;
		}

		//Check Application Main Function
		if(SoondaUtil::CheckEmpty( $o->ApplicationMainFunction, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:ApplicationMainFunction}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "ApplicationMainFunction";
			return $result;
		}

		//Check Display Icon
		if(SoondaUtil::CheckEmpty( $o->DisplayIcon, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:DisplayIcon}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "DisplayIcon";
			return $result;
		}

		//Check Is Active
		if(SoondaUtil::CheckEmpty( $o->IsActive, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:IsActive}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "IsActive";
			return $result;
		}

		//Check Use Workflow
		if(SoondaUtil::CheckEmpty( $o->UseWorkflow, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:UseWorkflow}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "UseWorkflow";
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
	*	This function vailidate Application Module data during edit operation. Return true if ok, false of not ok.
	*	When it returns false, the insert operation will halt.
	*/
	public function validateEdit( $adapter, $o )
	{
		$result = new ValidationResult();

		//Check Application Name
		if(SoondaUtil::CheckEmpty( $o->ApplicationName, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:ApplicationName}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "ApplicationName";
			return $result;
		}

		//Check Application Title
		if(SoondaUtil::CheckEmpty( $o->ApplicationTitle, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:ApplicationTitle}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "ApplicationTitle";
			return $result;
		}

		//Check Application Info
		if(SoondaUtil::CheckEmpty( $o->ApplicationInfo, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:ApplicationInfo}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "ApplicationInfo";
			return $result;
		}

		//Check Application Icon Small
		if(SoondaUtil::CheckEmpty( $o->ApplicationIconSmall, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:ApplicationIconSmall}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "ApplicationIconSmall";
			return $result;
		}

		//Check Application Icon Middle
		if(SoondaUtil::CheckEmpty( $o->ApplicationIconMiddle, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:ApplicationIconMiddle}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "ApplicationIconMiddle";
			return $result;
		}

		//Check Application Icon Large
		if(SoondaUtil::CheckEmpty( $o->ApplicationIconLarge, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:ApplicationIconLarge}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "ApplicationIconLarge";
			return $result;
		}

		//Check Application Path
		if(SoondaUtil::CheckEmpty( $o->ApplicationPath, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:ApplicationPath}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "ApplicationPath";
			return $result;
		}

		//Check Application File
		if(SoondaUtil::CheckEmpty( $o->ApplicationFile, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:ApplicationFile}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "ApplicationFile";
			return $result;
		}

		//Check Application Class
		if(SoondaUtil::CheckEmpty( $o->ApplicationClass, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:ApplicationClass}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "ApplicationClass";
			return $result;
		}

		//Check Application Main Function
		if(SoondaUtil::CheckEmpty( $o->ApplicationMainFunction, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:ApplicationMainFunction}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "ApplicationMainFunction";
			return $result;
		}

		//Check Display Icon
		if(SoondaUtil::CheckEmpty( $o->DisplayIcon, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:DisplayIcon}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "DisplayIcon";
			return $result;
		}

		//Check Is Active
		if(SoondaUtil::CheckEmpty( $o->IsActive, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:IsActive}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "IsActive";
			return $result;
		}

		//Check Use Workflow
		if(SoondaUtil::CheckEmpty( $o->UseWorkflow, "") ) 
		{	$result->succeed = false;
			$result->message = "<b> <b>{SOO.LANG:UseWorkflow}</b> </b> {SOO.LANG:cannotempty}!";
			$result->columnName = "UseWorkflow";
			return $result;
		}

		$result->succeed = true;
		$result->message = "Ok";
		return $result;
	}

}

?>