<?php
//This file is generated using SoondaCodeGenerator Pluggin for Huda_AppBuilder.
//Don't modify this file directly. Create new file and class that inherits this class to add functionality and modification.
//This file may be replaced during re-code generation, any changes to this file may be replaced.

//**********************************************************************
//
//	Class Name: UserModuleAdapter
//	Created Date: 6/5/2017 5:31:37 PM
//
//**********************************************************************




class UserModuleAdapter extends userAdapter
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
	
	//Select Query for ViewUserModuleData override parent's getSelectQuery()
	public function getSelectQuery()
	{
		$columns = "user.*,";

		$tables = "user,";
		$tables = substr($tables, 0, strlen( $tables) - 1);
		$columns = substr($columns, 0, strlen( $columns) - 1);
		$innerJoins = $this->getInnerJoins();
		$query = "SELECT $columns FROM $tables $innerJoins ";
		return $query;
	}


	//Select Query Count for ViewUserModuleData override parent's getSelectQueryCount()
	public function getSelectQueryCount()
	{
		$tables = "user,";
		$tables = substr($tables, 0, strlen( $tables) - 1);
		$innerJoins = $this->getInnerJoins();
		$query = "SELECT count(*) as total_data FROM $tables $innerJoins ";
		return $query;
	}

	//Get query for detail UserModule data
	public function getSelectDetailQuery( $id)
	{
		$condition = "";
	
		$condition .= "user.IdUser = ".$id;
	
		$query = $this->getSelectQuery();
		if(str_replace(" ", "", $condition) != "")
			$condition = " WHERE ".$condition;
		$query .= $condition;
		return $query;
	}

	//Initialize View UserModule, it initializes from record set the View object for this module
	public function init($rs, $o)
	{
		parent::init( $rs, $o); 
		
		return $o;
	}


	//Insert UserModule object to database, inherit from userAdapter
	public function insert( $o )
	{
		$newId = parent::insert( $o);
		$o->IdUser = $newId;

	}

	//Update UserModule object to database, inherit from userAdapter
	public function update( $o)
	{
		parent::update( $o);
		
	}

	//Delete UserModule object to database, inherit from userAdapter
	public function delete( $o)
	{
		//Delete the data by primary key
		parent::delete( $o->IdUser);
	
	}//end of function delete




	//Get list of  UserModule objects, override the parent's function
	public function getAll( $condition="", $order="", $offset="", $limit="", $returnRecordSet = false)
	{
		$list = array();
		$order = ( $order == "" ) ? $this->sortBy() : $order ;
		//Get data query for the UserModule data
		$query = $this->getSelectQuery();
		if( str_replace(" ", "", $condition) != "")
			$query .= " WHERE ".$condition;
		if( str_replace(" ", "", $order)!= "")
			$query .= " ORDER BY ".$order;

		//Retrieve the UserModule data
		$rs = $this->connection->Execute( $query, $limit, $offset);

		if($returnRecordSet)
			return $rs;
		else
		{
			$i = 0;
			include_once( "Bin/Module.DataModel/UserModuleData.php");
			while(!$rs->EOF)
			{
				//Instansiate the UserModule object
				$o = $this->createNew();

				//Init the UserModule object
				$o = $this->init($rs, $o);

				//Assembel the UserModule object list
				array_push( $list, $o);

				//Navigate the data source to next data
				$rs->MoveNext();
			}

			//Return the UserModule object list
			return $list;
		}
	}

	//Get total data of UserModule, override the parent's function
	public function getCount( $condition="")
	{
		//Get data query count for the UserModule data
		$query = $this->getSelectQueryCount();
		if( str_replace(" ", "", $condition) != "")
			$query .= " WHERE ".$condition;

		//Retrieve the UserModule data
		$rs = $this->connection->Execute( $query);
		$count = $rs->Fields("total_data");
		return $count;
	}

	//Get Detail of UserModule Object
	public function getDetail( $id, $returnRecordSet = false)
	{
		$query = $this->getSelectDetailQuery( $id);	
	
		//Retrieve the UserModule data
		$rs = $this->connection->Execute( $query);

		if($returnRecordSet)
		{

			return $rs;
		}
		else
		{
			//Instansiate the UserModule object
			$o = $this->createNew();

			//Init the UserModule object
			$o = $this->init($rs, $o);

			return $o;
		}
	}


	//Create new object of ViewUserModuleData
	function createNew()
	{
		include_once("Bin/Module.DataModel/UserModuleData.php");
		$o = new ViewUserModuleData();
		return $o;
	}

}//End of class

?>