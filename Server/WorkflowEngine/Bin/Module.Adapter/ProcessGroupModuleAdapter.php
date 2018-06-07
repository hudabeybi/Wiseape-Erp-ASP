<?php
//This file is generated using SoondaCodeGenerator Pluggin for Huda_AppBuilder.
//Don't modify this file directly. Create new file and class that inherits this class to add functionality and modification.
//This file may be replaced during re-code generation, any changes to this file may be replaced.

//**********************************************************************
//
//	Class Name: ProcessGroupModuleAdapter
//	Created Date: 6/5/2017 3:40:30 PM
//
//**********************************************************************




class ProcessGroupModuleAdapter extends processgroupAdapter
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
	
	//Select Query for ViewProcessGroupModuleData override parent's getSelectQuery()
	public function getSelectQuery()
	{
		$columns = "processgroup.*,";

		$tables = "processgroup,";
		$tables = substr($tables, 0, strlen( $tables) - 1);
		$columns = substr($columns, 0, strlen( $columns) - 1);
		$innerJoins = $this->getInnerJoins();
		$query = "SELECT $columns FROM $tables $innerJoins ";
		return $query;
	}


	//Select Query Count for ViewProcessGroupModuleData override parent's getSelectQueryCount()
	public function getSelectQueryCount()
	{
		$tables = "processgroup,";
		$tables = substr($tables, 0, strlen( $tables) - 1);
		$innerJoins = $this->getInnerJoins();
		$query = "SELECT count(*) as total_data FROM $tables $innerJoins ";
		return $query;
	}

	//Get query for detail ProcessGroupModule data
	public function getSelectDetailQuery( $id)
	{
		$condition = "";
	
		$condition .= "processgroup.IdProcessGroup = ".$id;
	
		$query = $this->getSelectQuery();
		if(str_replace(" ", "", $condition) != "")
			$condition = " WHERE ".$condition;
		$query .= $condition;
		return $query;
	}

	//Initialize View ProcessGroupModule, it initializes from record set the View object for this module
	public function init($rs, $o)
	{
		parent::init( $rs, $o); 
		
		return $o;
	}


	//Insert ProcessGroupModule object to database, inherit from processgroupAdapter
	public function insert( $o )
	{
		$newId = parent::insert( $o);
		$o->IdProcessGroup = $newId;

		$o->setAllProcessModuleParent();
		$adapter = $this->getAdapter("process");
		$adapter->connection = $this->connection;
		$adapter->config = $this->config;
		foreach($o->ProcessModules as $key => $oProcessModule)
		{
			$adapter->insert( $oProcessModule);
		}

	}

	//Update ProcessGroupModule object to database, inherit from processgroupAdapter
	public function update( $o)
	{
		parent::update( $o);

		$adapter = $this->getAdapter("process");
		$adapter->connection = $this->connection;
		$adapter->config = $this->config;		
		$o->setAllProcessModuleParent();
		foreach($o->ProcessModules as $key => $oProcessModule)
		{
			
			if( $oProcessModule->state == "delete")
			{
				$adapter->delete( $oProcessModule->IdProcess );
			}
			else
			{
				if( $oProcessModule->state == "edit")
				{
					$adapter->update( $oProcessModule);
				}
				else
				{
					$newId = $adapter->insert( $oProcessModule);
					$oProcessModule->IdProcess = $newId;
				}

			}
		}

		
	}

	//Delete ProcessGroupModule object to database, inherit from processgroupAdapter
	public function delete( $o)
	{
		//Delete the data by primary key
		parent::delete( $o->IdProcessGroup);

		//Delete the child data by primary key
		if( is_array( $o->ProcessModules ) )
		{
			foreach($o->ProcessModules as $key => $oProcessModule)
			{
				$adapter = $this->getAdapter("process");
				$adapter->connection = $this->connection;
				$adapter->config = $this->config;
				$adapter->delete( $oProcessModule->IdProcess);
			}
		}
	
	}//end of function delete


	//Get list of  ProcessGroupModule objects, override the parent's function
	public function getAll( $condition="", $order="", $offset="", $limit="", $returnRecordSet = false)
	{
		$list = array();
		$order = ( $order == "" ) ? $this->sortBy() : $order ;
		//Get data query for the ProcessGroupModule data
		$query = $this->getSelectQuery();
		if( str_replace(" ", "", $condition) != "")
			$query .= " WHERE ".$condition;
		if( str_replace(" ", "", $order)!= "")
			$query .= " ORDER BY ".$order;

		

		//Retrieve the ProcessGroupModule data
		$rs = $this->connection->Execute( $query, $limit, $offset);
		
		if($returnRecordSet)
			return $rs;
		else
		{
			
			$i = 0;
			include_once( "Bin/Module.DataModel/ProcessGroupModuleData.php");
			while(!$rs->EOF)
			{
				//Instansiate the ProcessGroupModule object
				$o = $this->createNew();

				//Init the ProcessGroupModule object
				$o = $this->init($rs, $o);

				//Assembel the ProcessGroupModule object list
				array_push( $list, $o);

				//Navigate the data source to next data
				$rs->MoveNext();
			}

			//Return the ProcessGroupModule object list
			return $list;
		}
	}

	//Get total data of ProcessGroupModule, override the parent's function
	public function getCount( $condition="")
	{
		//Get data query count for the ProcessGroupModule data
		$query = $this->getSelectQueryCount();
		if( str_replace(" ", "", $condition) != "")
			$query .= " WHERE ".$condition;

		//Retrieve the ProcessGroupModule data
		$rs = $this->connection->Execute( $query);
		$count = $rs->Fields("total_data");
		return $count;
	}

	//Get Detail of ProcessGroupModule Object
	public function getDetail( $id, $returnRecordSet = false)
	{
		$query = $this->getSelectDetailQuery( $id);	
	
		//Retrieve the ProcessGroupModule data
		$rs = $this->connection->Execute( $query);

		if($returnRecordSet)
		{

		//***************** Child objects ***************//

			//Include the ProcessModule adapter file
			//include_once( $this->config["adapter_path"]."/ProcessModuleAdapter.php");

			//Create condition query that retrieve ProcessModule according to parent's primary key: IdProcessGroup.
			$childCondition = "process.ProcessGroupId = ".$rs->Fields("IdProcessGroup");
			$childAdapter = $this->getAdapter("ProcessModule");
			$childAdapter->connection = $this->connection;
			$childAdapter->config = $this->config;
			$childRs = $childAdapter->getAll( $childCondition, $returnRecordSet);
			$rs->childRs = $childRs;

		//***************** Child objects ***************//

			return $rs;
		}
		else
		{
			//Instansiate the ProcessGroupModule object
			$o = $this->createNew();

			//Init the ProcessGroupModule object
			$o = $this->init($rs, $o);

		//***************** Child objects ***************//

		
			//Include the ProcessModule adapter file
			//include_once( $this->config["adapter_path"]."/ProcessModuleAdapter.php");

			//Create condition query that retrieve ProcessModule according to parent's primary key: IdProcessGroup.
			$childCondition = "process.ProcessGroupId = ".$o->IdProcessGroup;
			$childAdapter = $this->getAdapter("ProcessModule");
			$childAdapter->connection = $this->connection;
			$childAdapter->config = $this->config;
			$oProcessModules = $childAdapter->getAll( $childCondition);
			foreach($oProcessModules as $key => $oProcessModule )
			{	
				//Add it to the list
				$o->addProcessModule( $oProcessModule);
			}

		//***************** Child objects ***************//

			return $o;
		}
	}


	//Create new object of ViewProcessGroupModuleData
	function createNew()
	{
		$o = new ViewProcessGroupModuleData();
		return $o;
	}

}//End of class

?>