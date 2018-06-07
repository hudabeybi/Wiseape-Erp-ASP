<?php
//This file is generated using SoondaCodeGenerator Pluggin for Huda_AppBuilder.
//Don't modify this file directly. Create new file and class that inherits this class to add functionality and modification.
//This file may be replaced during re-code generation, any changes to this file may be replaced.

//**********************************************************************
//
//	Class Name: UserGroupModuleAdapter
//	Created Date: 6/5/2017 5:31:52 PM
//
//**********************************************************************




class UserGroupModuleAdapter extends usergroupAdapter
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
	
	//Select Query for ViewUserGroupModuleData override parent's getSelectQuery()
	public function getSelectQuery()
	{
		$columns = "usergroup.*,";

		$tables = "usergroup,";
		$tables = substr($tables, 0, strlen( $tables) - 1);
		$columns = substr($columns, 0, strlen( $columns) - 1);
		$innerJoins = $this->getInnerJoins();
		$query = "SELECT $columns FROM $tables $innerJoins ";
		return $query;
	}


	//Select Query Count for ViewUserGroupModuleData override parent's getSelectQueryCount()
	public function getSelectQueryCount()
	{
		$tables = "usergroup,";
		$tables = substr($tables, 0, strlen( $tables) - 1);
		$innerJoins = $this->getInnerJoins();
		$query = "SELECT count(*) as total_data FROM $tables $innerJoins ";
		return $query;
	}

	//Get query for detail UserGroupModule data
	public function getSelectDetailQuery( $id)
	{
		$condition = "";
	
		$condition .= "usergroup.IdUserGroup = ".$id;
	
		$query = $this->getSelectQuery();
		if(str_replace(" ", "", $condition) != "")
			$condition = " WHERE ".$condition;
		$query .= $condition;
		return $query;
	}

	//Initialize View UserGroupModule, it initializes from record set the View object for this module
	public function init($rs, $o)
	{
		parent::init( $rs, $o); 
		
		return $o;
	}


	//Insert UserGroupModule object to database, inherit from usergroupAdapter
	public function insert( $o )
	{
		$newId = parent::insert( $o);
		$o->IdUserGroup = $newId;

	}

	//Update UserGroupModule object to database, inherit from usergroupAdapter
	public function update( $o)
	{
		parent::update( $o);
		
	}

	//Delete UserGroupModule object to database, inherit from usergroupAdapter
	public function delete( $o)
	{
		//Delete the data by primary key
		parent::delete( $o->IdUserGroup);
	
	}//end of function delete




	//Get list of  UserGroupModule objects, override the parent's function
	public function getAll( $condition="", $order="", $offset="", $limit="", $returnRecordSet = false)
	{
		$list = array();
		$order = ( $order == "" ) ? $this->sortBy() : $order ;
		//Get data query for the UserGroupModule data
		$query = $this->getSelectQuery();
		if( str_replace(" ", "", $condition) != "")
			$query .= " WHERE ".$condition;
		if( str_replace(" ", "", $order)!= "")
			$query .= " ORDER BY ".$order;

		//Retrieve the UserGroupModule data
		$rs = $this->connection->Execute( $query, $limit, $offset);

		if($returnRecordSet)
			return $rs;
		else
		{
			$i = 0;
			include_once( "Bin/Module.DataModel/UserGroupModuleData.php");
			while(!$rs->EOF)
			{
				//Instansiate the UserGroupModule object
				$o = $this->createNew();

				//Init the UserGroupModule object
				$o = $this->init($rs, $o);

				//Assembel the UserGroupModule object list
				array_push( $list, $o);

				//Navigate the data source to next data
				$rs->MoveNext();
			}

			//Return the UserGroupModule object list
			return $list;
		}
	}

	//Get total data of UserGroupModule, override the parent's function
	public function getCount( $condition="")
	{
		//Get data query count for the UserGroupModule data
		$query = $this->getSelectQueryCount();
		if( str_replace(" ", "", $condition) != "")
			$query .= " WHERE ".$condition;

		//Retrieve the UserGroupModule data
		$rs = $this->connection->Execute( $query);
		$count = $rs->Fields("total_data");
		return $count;
	}

	//Get Detail of UserGroupModule Object
	public function getDetail( $id, $returnRecordSet = false)
	{
		$query = $this->getSelectDetailQuery( $id);	
	
		//Retrieve the UserGroupModule data
		$rs = $this->connection->Execute( $query);

		if($returnRecordSet)
		{

			return $rs;
		}
		else
		{
			//Instansiate the UserGroupModule object
			$o = $this->createNew();

			//Init the UserGroupModule object
			$o = $this->init($rs, $o);

			return $o;
		}
	}


	//Create new object of ViewUserGroupModuleData
	function createNew()
	{
		$o = new ViewUserGroupModuleData();
		return $o;
	}

}//End of class

?>