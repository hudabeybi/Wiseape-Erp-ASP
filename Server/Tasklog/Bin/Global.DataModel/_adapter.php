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
* 	Created Date: 7/25/2017 6:13:01 PM
* 
* **********************************************************************/


//Adapter for tasklog
class _tasklogAdapter extends SoondaAdapter
{	

	public function sortBy()
	{
		$sortBy = "";
	
		$sortBy .= "IdTaskLog ASC";
	
		return $sortBy;
	}

	//get query to retrieve all tasklog data
	public function getSelectQuery()
	{
		$query = "SELECT * FROM tasklog ";
		return $query;
	}

	//get query to count all tasklog data
	public function getSelectQueryCount()
	{
		$query = "SELECT count(*) as total_data FROM tasklog";
		return $query;
	}

	//Get query for detail tasklog data
	protected function getSelectDetailQuery( $id)
	{
		$condition = "";
	
		$condition .= "IdTaskLog = ".$id;
	
		$query = $this->getSelectQuery( );

		if( $condition != "")
			$condition = " WHERE ".$condition;
		$query = $query.$condition;
		return $query;
	}

	//Get query to insert an tasklog object
	protected function getInsertQuery( $o)
	{
		$columns = "";
		$values = "";
		$condition = "";
		$query = "INSERT INTO tasklog ( ";
	
			
		$columns .= "TaskTitle1,";
		$values .= "'".SoondaUtil::encloseHTML( $o->TaskTitle1 )."',";
	
			
		$columns .= "TaskTitle2,";
		$values .= "'".SoondaUtil::encloseHTML( $o->TaskTitle2 )."',";
	
			
		$columns .= "TaskTitle3,";
		$values .= "'".SoondaUtil::encloseHTML( $o->TaskTitle3 )."',";
	
			
		$columns .= "TaskTitle4,";
		$values .= "'".SoondaUtil::encloseHTML( $o->TaskTitle4 )."',";
	
		$columns .= "TaskDate,";
		if( str_replace(" ", "", $o->TaskDate) == "")
			$values .= "NULL,";
		else
			$values .= "'".$o->TaskDate."',";
	
		$columns = substr( $columns, 0, strlen( $columns) - 1);
		$values = substr( $values, 0, strlen( $values) - 1);
		$query = $query.$columns." ) VALUES (".$values.")";
		return $query;
	}

	//Get query to Update an tasklog object
	protected function getUpdateQuery( $o)
	{
		$columnAndValues = "";
		$condition = "";
		$query = "UPDATE tasklog SET ";
	
		$condition .= "IdTaskLog = ".$o->IdTaskLog." AND ";
	
		$columnAndValues .= "TaskTitle1 = '".SoondaUtil::encloseHTML( $o->TaskTitle1 )."',";
	
		$columnAndValues .= "TaskTitle2 = '".SoondaUtil::encloseHTML( $o->TaskTitle2 )."',";
	
		$columnAndValues .= "TaskTitle3 = '".SoondaUtil::encloseHTML( $o->TaskTitle3 )."',";
	
		$columnAndValues .= "TaskTitle4 = '".SoondaUtil::encloseHTML( $o->TaskTitle4 )."',";
	
		if(str_replace(" ", "", $o->TaskDate) == "")
			$columnAndValues .= "TaskDate = NULL,";
		else
			$columnAndValues .= "TaskDate = '".$o->TaskDate."',";
	
		$columnAndValues = substr( $columnAndValues, 0, strlen($columnAndValues) - 1);
		$condition = substr( $condition, 0, strlen($condition) - 4);
		$query = $query.$columnAndValues." WHERE ".$condition;
		return $query;
	}

	//Get query to delete tasklog by id
	protected function getDeleteQuery( $id)
	{
		$condition = "";
		$query = "DELETE FROM tasklog ";
	
		$condition .= "IdTaskLog = ".$id;
	
		$query = $query." WHERE ".$condition;
		return $query;
	}

	//Get query to delete tasklog by condition
	protected function getDeleteQueryByCondition( $condition )
	{
		$query = "DELETE FROM tasklog ";
		$query = $query." WHERE ".$condition;
		return $query;
	}

	//to initialize an tasklog object with data from database
	protected function init($rs, $o)
	{
	
		$o->IdTaskLog = SoondaUtil::decloseHTML( $rs->Fields("IdTaskLog") );
	
		$o->TaskTitle1 = SoondaUtil::decloseHTML( $rs->Fields("TaskTitle1") );
	
		$o->TaskTitle2 = SoondaUtil::decloseHTML( $rs->Fields("TaskTitle2") );
	
		$o->TaskTitle3 = SoondaUtil::decloseHTML( $rs->Fields("TaskTitle3") );
	
		$o->TaskTitle4 = SoondaUtil::decloseHTML( $rs->Fields("TaskTitle4") );
	
		$o->TaskDate = $rs->Fields("TaskDate");
	
		return $o;
	}

	//get all the tasklog data from database
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

	//get the tasklog total number of data from database
	public function getCount( $condition="")
	{
		//Get data query count for the tasklog data
		$query = $this->getSelectQueryCount();
		if( str_replace(" ", "", $condition) != "")
			$condition = " WHERE ".$condition;
		$query .= $condition;

		//Retrieve the tasklog data count
		$rs = $this->connection->Execute( $query);
		$count = $rs->Fields("total_data");
		return $count;
	}

	//get the detail of tasklog using its id
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

	//Inserting tasklog object into database
	public function insert( $o)
	{
		$data = array();
		$query = $this->getInsertQuery( $o);
		$rs = $this->connection->Execute( $query );
		
		$o->IdTaskLog = $rs;
		
		return $rs;
	}

	//Updating a tasklog object in database
	public function update( $o)
	{
		$data = array();
		$query = $this->getUpdateQuery( $o);
		$rs = $this->connection->Execute( $query );
		return $o;
	}

	//Delete a tasklog by id in database
	public function delete( $id)
	{
		$query = $this->getDeleteQuery( $id);
		$this->connection->Execute( $query);
	}

	//Delete a tasklog by id in database
	public function deleteWhere( $condition)
	{
		$query = $this->getDeleteQueryByCondition( $condition );
		$this->connection->Execute( $query);
	}

	//Create new object of tasklog
	public function createNew()
	{
		$o = new tasklog();
		return $o;
	}


}//End of class




?>