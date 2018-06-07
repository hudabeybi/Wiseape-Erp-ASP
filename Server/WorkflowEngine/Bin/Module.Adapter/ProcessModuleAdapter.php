<?php
//This file is generated using SoondaCodeGenerator Pluggin for Huda_AppBuilder.
//Don't modify this file directly. Create new file and class that inherits this class to add functionality and modification.
//This file may be replaced during re-code generation, any changes to this file may be replaced.

//**********************************************************************
//
//	Class Name: ProcessModuleAdapter
//	Created Date: 6/5/2017 3:40:33 PM
//
//**********************************************************************




class ProcessModuleAdapter extends processAdapter
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
	
	//Select Query for ViewProcessModuleData override parent's getSelectQuery()
	public function getSelectQuery()
	{
		$columns = "process.*,";

		$tables = "process,";
		$tables = substr($tables, 0, strlen( $tables) - 1);
		$columns = substr($columns, 0, strlen( $columns) - 1);
		$innerJoins = $this->getInnerJoins();
		$query = "SELECT $columns FROM $tables $innerJoins ";
		return $query;
	}


	//Select Query Count for ViewProcessModuleData override parent's getSelectQueryCount()
	public function getSelectQueryCount()
	{
		$tables = "process,";
		$tables = substr($tables, 0, strlen( $tables) - 1);
		$innerJoins = $this->getInnerJoins();
		$query = "SELECT count(*) as total_data FROM $tables $innerJoins ";
		return $query;
	}

	//Get query for detail ProcessModule data
	public function getSelectDetailQuery( $id)
	{
		$condition = "";
	
		$condition .= "process.IdProcess = ".$id;
	
		$query = $this->getSelectQuery();
		if(str_replace(" ", "", $condition) != "")
			$condition = " WHERE ".$condition;
		$query .= $condition;
		return $query;
	}

	//Initialize View ProcessModule, it initializes from record set the View object for this module
	public function init($rs, $o)
	{
		parent::init( $rs, $o); 
		
		return $o;
	}


	//Insert ProcessModule object to database, inherit from processAdapter
	public function insert( $o )
	{
		$newId = parent::insert( $o);
		$o->IdProcess = $newId;

	}

	//Update ProcessModule object to database, inherit from processAdapter
	public function update( $o)
	{
		parent::update( $o);
		
	}

	//Delete ProcessModule object to database, inherit from processAdapter
	public function delete( $o)
	{
		//Delete the data by primary key
		parent::delete( $o->IdProcess);
	
	}//end of function delete


	//Get list of  ProcessModule objects, override the parent's function
	public function getAll( $condition="", $order="", $offset="", $limit="", $returnRecordSet = false)
	{
		$list = array();
		$order = ( $order == "" ) ? $this->sortBy() : $order ;
		//Get data query for the ProcessModule data
		$query = $this->getSelectQuery();
		if( str_replace(" ", "", $condition) != "")
			$query .= " WHERE ".$condition;
		if( str_replace(" ", "", $order)!= "")
			$query .= " ORDER BY ".$order;

		//Retrieve the ProcessModule data
		$rs = $this->connection->Execute( $query, $limit, $offset);

		if($returnRecordSet)
			return $rs;
		else
		{
			$i = 0;
			include_once("Bin/Module.DataModel/ProcessModuleData.php");
			while(!$rs->EOF)
			{
				//Instansiate the ProcessModule object
				$o = $this->createNew();

				//Init the ProcessModule object
				$o = $this->init($rs, $o);

				//Assembel the ProcessModule object list
				array_push( $list, $o);

				//Navigate the data source to next data
				$rs->MoveNext();
			}

			//Return the ProcessModule object list
			return $list;
		}
	}

	//Get total data of ProcessModule, override the parent's function
	public function getCount( $condition="")
	{
		//Get data query count for the ProcessModule data
		$query = $this->getSelectQueryCount();
		if( str_replace(" ", "", $condition) != "")
			$query .= " WHERE ".$condition;

		//Retrieve the ProcessModule data
		$rs = $this->connection->Execute( $query);
		$count = $rs->Fields("total_data");
		return $count;
	}

	//Get Detail of ProcessModule Object
	public function getDetail( $id, $returnRecordSet = false)
	{
		$query = $this->getSelectDetailQuery( $id);	
	
		//Retrieve the ProcessModule data
		$rs = $this->connection->Execute( $query);

		if($returnRecordSet)
		{

			return $rs;
		}
		else
		{
			//Instansiate the ProcessModule object
			$o = $this->createNew();

			//Init the ProcessModule object
			$o = $this->init($rs, $o);

			return $o;
		}
	}


	//Create new object of ViewProcessModuleData
	function createNew()
	{
		$o = new ViewProcessModuleData();
		return $o;
	}

}//End of class

?>