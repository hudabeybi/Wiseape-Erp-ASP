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
* 	Created Date: 6/5/2017 3:40:33 PM
* 
* **********************************************************************/


//Adapter for application
class _applicationAdapter extends SoondaAdapter
{	

	public function sortBy()
	{
		$sortBy = "";
	
		$sortBy .= "IdApplication ASC";
	
		return $sortBy;
	}

	//get query to retrieve all application data
	public function getSelectQuery()
	{
		$query = "SELECT * FROM application ";
		return $query;
	}

	//get query to count all application data
	public function getSelectQueryCount()
	{
		$query = "SELECT count(*) as total_data FROM application";
		return $query;
	}

	//Get query for detail application data
	protected function getSelectDetailQuery( $id)
	{
		$condition = "";
	
		$condition .= "IdApplication = ".$id;
	
		$query = $this->getSelectQuery( );

		if( $condition != "")
			$condition = " WHERE ".$condition;
		$query = $query.$condition;
		return $query;
	}

	//Get query to insert an application object
	protected function getInsertQuery( $o)
	{
		$columns = "";
		$values = "";
		$condition = "";
		$query = "INSERT INTO application ( ";
	
			
		$columns .= "ApplicationName,";
		$values .= "'".SoondaUtil::encloseHTML( $o->ApplicationName )."',";
	
			
		$columns .= "ApplicationTitle,";
		$values .= "'".SoondaUtil::encloseHTML( $o->ApplicationTitle )."',";
	
			
		$columns .= "ApplicationInfo,";
		$values .= "'".SoondaUtil::encloseHTML( $o->ApplicationInfo )."',";
	
			
		$columns .= "ApplicationIconSmall,";
		$values .= "'".SoondaUtil::encloseHTML( $o->ApplicationIconSmall )."',";
	
			
		$columns .= "ApplicationIconMiddle,";
		$values .= "'".SoondaUtil::encloseHTML( $o->ApplicationIconMiddle )."',";
	
			
		$columns .= "ApplicationIconLarge,";
		$values .= "'".SoondaUtil::encloseHTML( $o->ApplicationIconLarge )."',";
	
			
		$columns .= "ApplicationPath,";
		$values .= "'".SoondaUtil::encloseHTML( $o->ApplicationPath )."',";
	
			
		$columns .= "ApplicationFile,";
		$values .= "'".SoondaUtil::encloseHTML( $o->ApplicationFile )."',";
	
			
		$columns .= "ApplicationClass,";
		$values .= "'".SoondaUtil::encloseHTML( $o->ApplicationClass )."',";
	
			
		$columns .= "ApplicationMainFunction,";
		$values .= "'".SoondaUtil::encloseHTML( $o->ApplicationMainFunction )."',";
	
		$columns .= "DisplayIcon,";
		if(str_replace(" ", "",  $o->DisplayIcon) == "")
			$values .= "0,";
		else
			$values .= "".SoondaUtil::encloseHTML( $o->DisplayIcon ).",";
			
	
		$columns .= "IsActive,";
		if(str_replace(" ", "",  $o->IsActive) == "")
			$values .= "0,";
		else
			$values .= "".SoondaUtil::encloseHTML( $o->IsActive ).",";
			
	
		$columns .= "UseWorkflow,";
		if(str_replace(" ", "",  $o->UseWorkflow) == "")
			$values .= "0,";
		else
			$values .= "".SoondaUtil::encloseHTML( $o->UseWorkflow ).",";
			
	
		$columns = substr( $columns, 0, strlen( $columns) - 1);
		$values = substr( $values, 0, strlen( $values) - 1);
		$query = $query.$columns." ) VALUES (".$values.")";
		return $query;
	}

	//Get query to Update an application object
	protected function getUpdateQuery( $o)
	{
		$columnAndValues = "";
		$condition = "";
		$query = "UPDATE application SET ";
	
		$condition .= "IdApplication = ".$o->IdApplication." AND ";
	
		$columnAndValues .= "ApplicationName = '".SoondaUtil::encloseHTML( $o->ApplicationName )."',";
	
		$columnAndValues .= "ApplicationTitle = '".SoondaUtil::encloseHTML( $o->ApplicationTitle )."',";
	
		$columnAndValues .= "ApplicationInfo = '".SoondaUtil::encloseHTML( $o->ApplicationInfo )."',";
	
		$columnAndValues .= "ApplicationIconSmall = '".SoondaUtil::encloseHTML( $o->ApplicationIconSmall )."',";
	
		$columnAndValues .= "ApplicationIconMiddle = '".SoondaUtil::encloseHTML( $o->ApplicationIconMiddle )."',";
	
		$columnAndValues .= "ApplicationIconLarge = '".SoondaUtil::encloseHTML( $o->ApplicationIconLarge )."',";
	
		$columnAndValues .= "ApplicationPath = '".SoondaUtil::encloseHTML( $o->ApplicationPath )."',";
	
		$columnAndValues .= "ApplicationFile = '".SoondaUtil::encloseHTML( $o->ApplicationFile )."',";
	
		$columnAndValues .= "ApplicationClass = '".SoondaUtil::encloseHTML( $o->ApplicationClass )."',";
	
		$columnAndValues .= "ApplicationMainFunction = '".SoondaUtil::encloseHTML( $o->ApplicationMainFunction )."',";
	
		if(str_replace(" ", "",  $o->DisplayIcon) == "")
			$columnAndValues .= "DisplayIcon = 0,";		
		else
			$columnAndValues .= "DisplayIcon = ".SoondaUtil::encloseHTML( $o->DisplayIcon ).",";
	
		if(str_replace(" ", "",  $o->IsActive) == "")
			$columnAndValues .= "IsActive = 0,";		
		else
			$columnAndValues .= "IsActive = ".SoondaUtil::encloseHTML( $o->IsActive ).",";
	
		if(str_replace(" ", "",  $o->UseWorkflow) == "")
			$columnAndValues .= "UseWorkflow = 0,";		
		else
			$columnAndValues .= "UseWorkflow = ".SoondaUtil::encloseHTML( $o->UseWorkflow ).",";
	
		$columnAndValues = substr( $columnAndValues, 0, strlen($columnAndValues) - 1);
		$condition = substr( $condition, 0, strlen($condition) - 4);
		$query = $query.$columnAndValues." WHERE ".$condition;
		return $query;
	}

	//Get query to delete application by id
	protected function getDeleteQuery( $id)
	{
		$condition = "";
		$query = "DELETE FROM application ";
	
		$condition .= "IdApplication = ".$id;
	
		$query = $query." WHERE ".$condition;
		return $query;
	}

	//Get query to delete application by condition
	protected function getDeleteQueryByCondition( $condition )
	{
		$query = "DELETE FROM application ";
		$query = $query." WHERE ".$condition;
		return $query;
	}

	//to initialize an application object with data from database
	protected function init($rs, $o)
	{
	
		$o->IdApplication = SoondaUtil::decloseHTML( $rs->Fields("IdApplication") );
	
		$o->ApplicationName = SoondaUtil::decloseHTML( $rs->Fields("ApplicationName") );
	
		$o->ApplicationTitle = SoondaUtil::decloseHTML( $rs->Fields("ApplicationTitle") );
	
		$o->ApplicationInfo = SoondaUtil::decloseHTML( $rs->Fields("ApplicationInfo") );
	
		$o->ApplicationIconSmall = SoondaUtil::decloseHTML( $rs->Fields("ApplicationIconSmall") );
	
		$o->ApplicationIconMiddle = SoondaUtil::decloseHTML( $rs->Fields("ApplicationIconMiddle") );
	
		$o->ApplicationIconLarge = SoondaUtil::decloseHTML( $rs->Fields("ApplicationIconLarge") );
	
		$o->ApplicationPath = SoondaUtil::decloseHTML( $rs->Fields("ApplicationPath") );
	
		$o->ApplicationFile = SoondaUtil::decloseHTML( $rs->Fields("ApplicationFile") );
	
		$o->ApplicationClass = SoondaUtil::decloseHTML( $rs->Fields("ApplicationClass") );
	
		$o->ApplicationMainFunction = SoondaUtil::decloseHTML( $rs->Fields("ApplicationMainFunction") );
	
		$o->DisplayIcon = SoondaUtil::decloseHTML( $rs->Fields("DisplayIcon") );
	
		$o->IsActive = SoondaUtil::decloseHTML( $rs->Fields("IsActive") );
	
		$o->UseWorkflow = SoondaUtil::decloseHTML( $rs->Fields("UseWorkflow") );
	
		return $o;
	}

	//get all the application data from database
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

	//get the application total number of data from database
	public function getCount( $condition="")
	{
		//Get data query count for the application data
		$query = $this->getSelectQueryCount();
		if( str_replace(" ", "", $condition) != "")
			$condition = " WHERE ".$condition;
		$query .= $condition;

		//Retrieve the application data count
		$rs = $this->connection->Execute( $query);
		$count = $rs->Fields("total_data");
		return $count;
	}

	//get the detail of application using its id
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

	//Inserting application object into database
	public function insert( $o)
	{
		$data = array();
		$query = $this->getInsertQuery( $o);
		$rs = $this->connection->Execute( $query );
		
		$o->IdApplication = $rs;
		
		return $rs;
	}

	//Updating a application object in database
	public function update( $o)
	{
		$data = array();
		$query = $this->getUpdateQuery( $o);
		$rs = $this->connection->Execute( $query );
		return $o;
	}

	//Delete a application by id in database
	public function delete( $id)
	{
		$query = $this->getDeleteQuery( $id);
		$this->connection->Execute( $query);
	}

	//Delete a application by id in database
	public function deleteWhere( $condition)
	{
		$query = $this->getDeleteQueryByCondition( $condition );
		$this->connection->Execute( $query);
	}

	//Create new object of application
	public function createNew()
	{
		$o = new application();
		return $o;
	}


}//End of class

//Adapter for process
class _processAdapter extends SoondaAdapter
{	

	public function sortBy()
	{
		$sortBy = "";
	
		$sortBy .= "IdProcess ASC";
	
		return $sortBy;
	}

	//get query to retrieve all process data
	public function getSelectQuery()
	{
		$query = "SELECT * FROM process ";
		return $query;
	}

	//get query to count all process data
	public function getSelectQueryCount()
	{
		$query = "SELECT count(*) as total_data FROM process";
		return $query;
	}

	//Get query for detail process data
	protected function getSelectDetailQuery( $id)
	{
		$condition = "";
	
		$condition .= "IdProcess = ".$id;
	
		$query = $this->getSelectQuery( );

		if( $condition != "")
			$condition = " WHERE ".$condition;
		$query = $query.$condition;
		return $query;
	}

	//Get query to insert an process object
	protected function getInsertQuery( $o)
	{
		$columns = "";
		$values = "";
		$condition = "";
		$query = "INSERT INTO process ( ";
	
			
		$columns .= "ProcessNo,";
		$values .= "'".SoondaUtil::encloseHTML( $o->ProcessNo )."',";
	
			
		$columns .= "ProcessName,";
		$values .= "'".SoondaUtil::encloseHTML( $o->ProcessName )."',";
	
			
		$columns .= "ProcessInfo,";
		$values .= "'".SoondaUtil::encloseHTML( $o->ProcessInfo )."',";
	
		$columns .= "ProcessCreatedDate,";
		if( str_replace(" ", "", $o->ProcessCreatedDate) == "")
			$values .= "NULL,";
		else
			$values .= "'".$o->ProcessCreatedDate."',";
	
		$columns .= "ApplicationId,";
		if(str_replace(" ", "",  $o->ApplicationId) == "")
			$values .= "0,";
		else
			$values .= "".SoondaUtil::encloseHTML( $o->ApplicationId ).",";
			
	
		$columns .= "PreviousWorkflowEvaluatorId,";
		if(str_replace(" ", "",  $o->PreviousWorkflowEvaluatorId) == "")
			$values .= "0,";
		else
			$values .= "".SoondaUtil::encloseHTML( $o->PreviousWorkflowEvaluatorId ).",";
			
	
		$columns .= "NextWorkflowEvaluatorId,";
		if(str_replace(" ", "",  $o->NextWorkflowEvaluatorId) == "")
			$values .= "0,";
		else
			$values .= "".SoondaUtil::encloseHTML( $o->NextWorkflowEvaluatorId ).",";
			
	
		$columns .= "WorkflowId,";
		if(str_replace(" ", "",  $o->WorkflowId) == "")
			$values .= "0,";
		else
			$values .= "".SoondaUtil::encloseHTML( $o->WorkflowId ).",";
			
	
		$columns .= "CreatedByUserId,";
		if(str_replace(" ", "",  $o->CreatedByUserId) == "")
			$values .= "0,";
		else
			$values .= "".SoondaUtil::encloseHTML( $o->CreatedByUserId ).",";
			
	
		$columns .= "ProcessGroupId,";
		if(str_replace(" ", "",  $o->ProcessGroupId) == "")
			$values .= "0,";
		else
			$values .= "".SoondaUtil::encloseHTML( $o->ProcessGroupId ).",";
			
	
		$columns = substr( $columns, 0, strlen( $columns) - 1);
		$values = substr( $values, 0, strlen( $values) - 1);
		$query = $query.$columns." ) VALUES (".$values.")";
		return $query;
	}

	//Get query to Update an process object
	protected function getUpdateQuery( $o)
	{
		$columnAndValues = "";
		$condition = "";
		$query = "UPDATE process SET ";
	
		$condition .= "IdProcess = ".$o->IdProcess." AND ";
	
		$columnAndValues .= "ProcessNo = '".SoondaUtil::encloseHTML( $o->ProcessNo )."',";
	
		$columnAndValues .= "ProcessName = '".SoondaUtil::encloseHTML( $o->ProcessName )."',";
	
		$columnAndValues .= "ProcessInfo = '".SoondaUtil::encloseHTML( $o->ProcessInfo )."',";
	
		if(str_replace(" ", "", $o->ProcessCreatedDate) == "")
			$columnAndValues .= "ProcessCreatedDate = NULL,";
		else
			$columnAndValues .= "ProcessCreatedDate = '".$o->ProcessCreatedDate."',";
	
		if(str_replace(" ", "",  $o->ApplicationId) == "")
			$columnAndValues .= "ApplicationId = 0,";		
		else
			$columnAndValues .= "ApplicationId = ".SoondaUtil::encloseHTML( $o->ApplicationId ).",";
	
		if(str_replace(" ", "",  $o->PreviousWorkflowEvaluatorId) == "")
			$columnAndValues .= "PreviousWorkflowEvaluatorId = 0,";		
		else
			$columnAndValues .= "PreviousWorkflowEvaluatorId = ".SoondaUtil::encloseHTML( $o->PreviousWorkflowEvaluatorId ).",";
	
		if(str_replace(" ", "",  $o->NextWorkflowEvaluatorId) == "")
			$columnAndValues .= "NextWorkflowEvaluatorId = 0,";		
		else
			$columnAndValues .= "NextWorkflowEvaluatorId = ".SoondaUtil::encloseHTML( $o->NextWorkflowEvaluatorId ).",";
	
		if(str_replace(" ", "",  $o->WorkflowId) == "")
			$columnAndValues .= "WorkflowId = 0,";		
		else
			$columnAndValues .= "WorkflowId = ".SoondaUtil::encloseHTML( $o->WorkflowId ).",";
	
		if(str_replace(" ", "",  $o->CreatedByUserId) == "")
			$columnAndValues .= "CreatedByUserId = 0,";		
		else
			$columnAndValues .= "CreatedByUserId = ".SoondaUtil::encloseHTML( $o->CreatedByUserId ).",";
	
		if(str_replace(" ", "",  $o->ProcessGroupId) == "")
			$columnAndValues .= "ProcessGroupId = 0,";		
		else
			$columnAndValues .= "ProcessGroupId = ".SoondaUtil::encloseHTML( $o->ProcessGroupId ).",";
	
		$columnAndValues = substr( $columnAndValues, 0, strlen($columnAndValues) - 1);
		$condition = substr( $condition, 0, strlen($condition) - 4);
		$query = $query.$columnAndValues." WHERE ".$condition;
		return $query;
	}

	//Get query to delete process by id
	protected function getDeleteQuery( $id)
	{
		$condition = "";
		$query = "DELETE FROM process ";
	
		$condition .= "IdProcess = ".$id;
	
		$query = $query." WHERE ".$condition;
		return $query;
	}

	//Get query to delete process by condition
	protected function getDeleteQueryByCondition( $condition )
	{
		$query = "DELETE FROM process ";
		$query = $query." WHERE ".$condition;
		return $query;
	}

	//to initialize an process object with data from database
	protected function init($rs, $o)
	{
	
		$o->IdProcess = SoondaUtil::decloseHTML( $rs->Fields("IdProcess") );
	
		$o->ProcessNo = SoondaUtil::decloseHTML( $rs->Fields("ProcessNo") );
	
		$o->ProcessName = SoondaUtil::decloseHTML( $rs->Fields("ProcessName") );
	
		$o->ProcessInfo = SoondaUtil::decloseHTML( $rs->Fields("ProcessInfo") );
	
		$o->ProcessCreatedDate = $rs->Fields("ProcessCreatedDate");
	
		$o->ApplicationId = SoondaUtil::decloseHTML( $rs->Fields("ApplicationId") );
	
		$o->PreviousWorkflowEvaluatorId = SoondaUtil::decloseHTML( $rs->Fields("PreviousWorkflowEvaluatorId") );
	
		$o->NextWorkflowEvaluatorId = SoondaUtil::decloseHTML( $rs->Fields("NextWorkflowEvaluatorId") );
	
		$o->WorkflowId = SoondaUtil::decloseHTML( $rs->Fields("WorkflowId") );
	
		$o->CreatedByUserId = SoondaUtil::decloseHTML( $rs->Fields("CreatedByUserId") );
	
		$o->ProcessGroupId = SoondaUtil::decloseHTML( $rs->Fields("ProcessGroupId") );
	
		return $o;
	}

	//get all the process data from database
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

	//get the process total number of data from database
	public function getCount( $condition="")
	{
		//Get data query count for the process data
		$query = $this->getSelectQueryCount();
		if( str_replace(" ", "", $condition) != "")
			$condition = " WHERE ".$condition;
		$query .= $condition;

		//Retrieve the process data count
		$rs = $this->connection->Execute( $query);
		$count = $rs->Fields("total_data");
		return $count;
	}

	//get the detail of process using its id
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

	//Inserting process object into database
	public function insert( $o)
	{
		$data = array();
		$query = $this->getInsertQuery( $o);
		$rs = $this->connection->Execute( $query );
		
		$o->IdProcess = $rs;
		
		return $rs;
	}

	//Updating a process object in database
	public function update( $o)
	{
		$data = array();
		$query = $this->getUpdateQuery( $o);
		$rs = $this->connection->Execute( $query );
		return $o;
	}

	//Delete a process by id in database
	public function delete( $id)
	{
		$query = $this->getDeleteQuery( $id);
		$this->connection->Execute( $query);
	}

	//Delete a process by id in database
	public function deleteWhere( $condition)
	{
		$query = $this->getDeleteQueryByCondition( $condition );
		$this->connection->Execute( $query);
	}

	//Create new object of process
	public function createNew()
	{
		$o = new process();
		return $o;
	}


}//End of class

//Adapter for processdata
class _processdataAdapter extends SoondaAdapter
{	

	public function sortBy()
	{
		$sortBy = "";
	
		$sortBy .= "IdProcessData ASC";
	
		return $sortBy;
	}

	//get query to retrieve all processdata data
	public function getSelectQuery()
	{
		$query = "SELECT * FROM processdata ";
		return $query;
	}

	//get query to count all processdata data
	public function getSelectQueryCount()
	{
		$query = "SELECT count(*) as total_data FROM processdata";
		return $query;
	}

	//Get query for detail processdata data
	protected function getSelectDetailQuery( $id)
	{
		$condition = "";
	
		$condition .= "IdProcessData = ".$id;
	
		$query = $this->getSelectQuery( );

		if( $condition != "")
			$condition = " WHERE ".$condition;
		$query = $query.$condition;
		return $query;
	}

	//Get query to insert an processdata object
	protected function getInsertQuery( $o)
	{
		$columns = "";
		$values = "";
		$condition = "";
		$query = "INSERT INTO processdata ( ";
	
		$columns .= "PreviousProcessId,";
		if(str_replace(" ", "",  $o->PreviousProcessId) == "")
			$values .= "0,";
		else
			$values .= "".SoondaUtil::encloseHTML( $o->PreviousProcessId ).",";
			
	
			
		$columns .= "Data,";
		$values .= "'".SoondaUtil::encloseHTML( $o->Data )."',";
	
		$columns .= "NextProcessId,";
		if(str_replace(" ", "",  $o->NextProcessId) == "")
			$values .= "0,";
		else
			$values .= "".SoondaUtil::encloseHTML( $o->NextProcessId ).",";
			
	
		$columns .= "WorkflowId,";
		if(str_replace(" ", "",  $o->WorkflowId) == "")
			$values .= "0,";
		else
			$values .= "".SoondaUtil::encloseHTML( $o->WorkflowId ).",";
			
	
			
		$columns .= "SessionCode,";
		$values .= "'".SoondaUtil::encloseHTML( $o->SessionCode )."',";
	
		$columns = substr( $columns, 0, strlen( $columns) - 1);
		$values = substr( $values, 0, strlen( $values) - 1);
		$query = $query.$columns." ) VALUES (".$values.")";
		return $query;
	}

	//Get query to Update an processdata object
	protected function getUpdateQuery( $o)
	{
		$columnAndValues = "";
		$condition = "";
		$query = "UPDATE processdata SET ";
	
		$condition .= "IdProcessData = ".$o->IdProcessData." AND ";
	
		if(str_replace(" ", "",  $o->PreviousProcessId) == "")
			$columnAndValues .= "PreviousProcessId = 0,";		
		else
			$columnAndValues .= "PreviousProcessId = ".SoondaUtil::encloseHTML( $o->PreviousProcessId ).",";
	
		$columnAndValues .= "Data = '".SoondaUtil::encloseHTML( $o->Data )."',";
	
		if(str_replace(" ", "",  $o->NextProcessId) == "")
			$columnAndValues .= "NextProcessId = 0,";		
		else
			$columnAndValues .= "NextProcessId = ".SoondaUtil::encloseHTML( $o->NextProcessId ).",";
	
		if(str_replace(" ", "",  $o->WorkflowId) == "")
			$columnAndValues .= "WorkflowId = 0,";		
		else
			$columnAndValues .= "WorkflowId = ".SoondaUtil::encloseHTML( $o->WorkflowId ).",";
	
		$columnAndValues .= "SessionCode = '".SoondaUtil::encloseHTML( $o->SessionCode )."',";
	
		$columnAndValues = substr( $columnAndValues, 0, strlen($columnAndValues) - 1);
		$condition = substr( $condition, 0, strlen($condition) - 4);
		$query = $query.$columnAndValues." WHERE ".$condition;
		return $query;
	}

	//Get query to delete processdata by id
	protected function getDeleteQuery( $id)
	{
		$condition = "";
		$query = "DELETE FROM processdata ";
	
		$condition .= "IdProcessData = ".$id;
	
		$query = $query." WHERE ".$condition;
		return $query;
	}

	//Get query to delete processdata by condition
	protected function getDeleteQueryByCondition( $condition )
	{
		$query = "DELETE FROM processdata ";
		$query = $query." WHERE ".$condition;
		return $query;
	}

	//to initialize an processdata object with data from database
	protected function init($rs, $o)
	{
	
		$o->IdProcessData = SoondaUtil::decloseHTML( $rs->Fields("IdProcessData") );
	
		$o->PreviousProcessId = SoondaUtil::decloseHTML( $rs->Fields("PreviousProcessId") );
	
		$o->Data = SoondaUtil::decloseHTML( $rs->Fields("Data") );
	
		$o->NextProcessId = SoondaUtil::decloseHTML( $rs->Fields("NextProcessId") );
	
		$o->WorkflowId = SoondaUtil::decloseHTML( $rs->Fields("WorkflowId") );
	
		$o->SessionCode = SoondaUtil::decloseHTML( $rs->Fields("SessionCode") );
	
		return $o;
	}

	//get all the processdata data from database
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

	//get the processdata total number of data from database
	public function getCount( $condition="")
	{
		//Get data query count for the processdata data
		$query = $this->getSelectQueryCount();
		if( str_replace(" ", "", $condition) != "")
			$condition = " WHERE ".$condition;
		$query .= $condition;

		//Retrieve the processdata data count
		$rs = $this->connection->Execute( $query);
		$count = $rs->Fields("total_data");
		return $count;
	}

	//get the detail of processdata using its id
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

	//Inserting processdata object into database
	public function insert( $o)
	{
		$data = array();
		$query = $this->getInsertQuery( $o);
		$rs = $this->connection->Execute( $query );
		
		$o->IdProcessData = $rs;
		
		return $rs;
	}

	//Updating a processdata object in database
	public function update( $o)
	{
		$data = array();
		$query = $this->getUpdateQuery( $o);
		$rs = $this->connection->Execute( $query );
		return $o;
	}

	//Delete a processdata by id in database
	public function delete( $id)
	{
		$query = $this->getDeleteQuery( $id);
		$this->connection->Execute( $query);
	}

	//Delete a processdata by id in database
	public function deleteWhere( $condition)
	{
		$query = $this->getDeleteQueryByCondition( $condition );
		$this->connection->Execute( $query);
	}

	//Create new object of processdata
	public function createNew()
	{
		$o = new processdata();
		return $o;
	}


}//End of class

//Adapter for processgroup
class _processgroupAdapter extends SoondaAdapter
{	

	public function sortBy()
	{
		$sortBy = "";
	
		$sortBy .= "IdProcessGroup ASC";
	
		return $sortBy;
	}

	//get query to retrieve all processgroup data
	public function getSelectQuery()
	{
		$query = "SELECT * FROM processgroup ";
		return $query;
	}

	//get query to count all processgroup data
	public function getSelectQueryCount()
	{
		$query = "SELECT count(*) as total_data FROM processgroup";
		return $query;
	}

	//Get query for detail processgroup data
	protected function getSelectDetailQuery( $id)
	{
		$condition = "";
	
		$condition .= "IdProcessGroup = ".$id;
	
		$query = $this->getSelectQuery( );

		if( $condition != "")
			$condition = " WHERE ".$condition;
		$query = $query.$condition;
		return $query;
	}

	//Get query to insert an processgroup object
	protected function getInsertQuery( $o)
	{
		$columns = "";
		$values = "";
		$condition = "";
		$query = "INSERT INTO processgroup ( ";
	
			
		$columns .= "ProcessGroupName,";
		$values .= "'".SoondaUtil::encloseHTML( $o->ProcessGroupName )."',";
	
			
		$columns .= "ProcessGroupTitle,";
		$values .= "'".SoondaUtil::encloseHTML( $o->ProcessGroupTitle )."',";
	
			
		$columns .= "ProcessGroupInfo,";
		$values .= "'".SoondaUtil::encloseHTML( $o->ProcessGroupInfo )."',";
	
			
		$columns .= "IconSmall,";
		$values .= "'".SoondaUtil::encloseHTML( $o->IconSmall )."',";
	
			
		$columns .= "IconMiddle,";
		$values .= "'".SoondaUtil::encloseHTML( $o->IconMiddle )."',";
	
			
		$columns .= "IconLarge,";
		$values .= "'".SoondaUtil::encloseHTML( $o->IconLarge )."',";
	
		$columns .= "IsActive,";
		if(str_replace(" ", "",  $o->IsActive) == "")
			$values .= "0,";
		else
			$values .= "".SoondaUtil::encloseHTML( $o->IsActive ).",";
			
	
		$columns .= "IsDisplay,";
		if(str_replace(" ", "",  $o->IsDisplay) == "")
			$values .= "0,";
		else
			$values .= "".SoondaUtil::encloseHTML( $o->IsDisplay ).",";
			
	
		$columns = substr( $columns, 0, strlen( $columns) - 1);
		$values = substr( $values, 0, strlen( $values) - 1);
		$query = $query.$columns." ) VALUES (".$values.")";
		return $query;
	}

	//Get query to Update an processgroup object
	protected function getUpdateQuery( $o)
	{
		$columnAndValues = "";
		$condition = "";
		$query = "UPDATE processgroup SET ";
	
		$condition .= "IdProcessGroup = ".$o->IdProcessGroup." AND ";
	
		$columnAndValues .= "ProcessGroupName = '".SoondaUtil::encloseHTML( $o->ProcessGroupName )."',";
	
		$columnAndValues .= "ProcessGroupTitle = '".SoondaUtil::encloseHTML( $o->ProcessGroupTitle )."',";
	
		$columnAndValues .= "ProcessGroupInfo = '".SoondaUtil::encloseHTML( $o->ProcessGroupInfo )."',";
	
		$columnAndValues .= "IconSmall = '".SoondaUtil::encloseHTML( $o->IconSmall )."',";
	
		$columnAndValues .= "IconMiddle = '".SoondaUtil::encloseHTML( $o->IconMiddle )."',";
	
		$columnAndValues .= "IconLarge = '".SoondaUtil::encloseHTML( $o->IconLarge )."',";
	
		if(str_replace(" ", "",  $o->IsActive) == "")
			$columnAndValues .= "IsActive = 0,";		
		else
			$columnAndValues .= "IsActive = ".SoondaUtil::encloseHTML( $o->IsActive ).",";
	
		if(str_replace(" ", "",  $o->IsDisplay) == "")
			$columnAndValues .= "IsDisplay = 0,";		
		else
			$columnAndValues .= "IsDisplay = ".SoondaUtil::encloseHTML( $o->IsDisplay ).",";
	
		$columnAndValues = substr( $columnAndValues, 0, strlen($columnAndValues) - 1);
		$condition = substr( $condition, 0, strlen($condition) - 4);
		$query = $query.$columnAndValues." WHERE ".$condition;
		return $query;
	}

	//Get query to delete processgroup by id
	protected function getDeleteQuery( $id)
	{
		$condition = "";
		$query = "DELETE FROM processgroup ";
	
		$condition .= "IdProcessGroup = ".$id;
	
		$query = $query." WHERE ".$condition;
		return $query;
	}

	//Get query to delete processgroup by condition
	protected function getDeleteQueryByCondition( $condition )
	{
		$query = "DELETE FROM processgroup ";
		$query = $query." WHERE ".$condition;
		return $query;
	}

	//to initialize an processgroup object with data from database
	protected function init($rs, $o)
	{
	
		$o->IdProcessGroup = SoondaUtil::decloseHTML( $rs->Fields("IdProcessGroup") );
	
		$o->ProcessGroupName = SoondaUtil::decloseHTML( $rs->Fields("ProcessGroupName") );
	
		$o->ProcessGroupTitle = SoondaUtil::decloseHTML( $rs->Fields("ProcessGroupTitle") );
	
		$o->ProcessGroupInfo = SoondaUtil::decloseHTML( $rs->Fields("ProcessGroupInfo") );
	
		$o->IconSmall = SoondaUtil::decloseHTML( $rs->Fields("IconSmall") );
	
		$o->IconMiddle = SoondaUtil::decloseHTML( $rs->Fields("IconMiddle") );
	
		$o->IconLarge = SoondaUtil::decloseHTML( $rs->Fields("IconLarge") );
	
		$o->IsActive = SoondaUtil::decloseHTML( $rs->Fields("IsActive") );
	
		$o->IsDisplay = SoondaUtil::decloseHTML( $rs->Fields("IsDisplay") );
	
		return $o;
	}

	//get all the processgroup data from database
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

	//get the processgroup total number of data from database
	public function getCount( $condition="")
	{
		//Get data query count for the processgroup data
		$query = $this->getSelectQueryCount();
		if( str_replace(" ", "", $condition) != "")
			$condition = " WHERE ".$condition;
		$query .= $condition;

		//Retrieve the processgroup data count
		$rs = $this->connection->Execute( $query);
		$count = $rs->Fields("total_data");
		return $count;
	}

	//get the detail of processgroup using its id
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

	//Inserting processgroup object into database
	public function insert( $o)
	{
		$data = array();
		$query = $this->getInsertQuery( $o);
		$rs = $this->connection->Execute( $query );
		
		$o->IdProcessGroup = $rs;
		
		return $rs;
	}

	//Updating a processgroup object in database
	public function update( $o)
	{
		$data = array();
		$query = $this->getUpdateQuery( $o);
		$rs = $this->connection->Execute( $query );
		return $o;
	}

	//Delete a processgroup by id in database
	public function delete( $id)
	{
		$query = $this->getDeleteQuery( $id);
		$this->connection->Execute( $query);
	}

	//Delete a processgroup by id in database
	public function deleteWhere( $condition)
	{
		$query = $this->getDeleteQueryByCondition( $condition );
		$this->connection->Execute( $query);
	}

	//Create new object of processgroup
	public function createNew()
	{
		$o = new processgroup();
		return $o;
	}


}//End of class

//Adapter for sysdiagrams
class _sysdiagramsAdapter extends SoondaAdapter
{	

	public function sortBy()
	{
		$sortBy = "";
	
		$sortBy .= "diagram_id ASC";
	
		return $sortBy;
	}

	//get query to retrieve all sysdiagrams data
	public function getSelectQuery()
	{
		$query = "SELECT * FROM sysdiagrams ";
		return $query;
	}

	//get query to count all sysdiagrams data
	public function getSelectQueryCount()
	{
		$query = "SELECT count(*) as total_data FROM sysdiagrams";
		return $query;
	}

	//Get query for detail sysdiagrams data
	protected function getSelectDetailQuery( $id)
	{
		$condition = "";
	
		$condition .= "diagram_id = ".$id;
	
		$query = $this->getSelectQuery( );

		if( $condition != "")
			$condition = " WHERE ".$condition;
		$query = $query.$condition;
		return $query;
	}

	//Get query to insert an sysdiagrams object
	protected function getInsertQuery( $o)
	{
		$columns = "";
		$values = "";
		$condition = "";
		$query = "INSERT INTO sysdiagrams ( ";
	
			
		$columns .= "name,";
		$values .= "'".SoondaUtil::encloseHTML( $o->name )."',";
	
		$columns .= "principal_id,";
		if(str_replace(" ", "",  $o->principal_id) == "")
			$values .= "0,";
		else
			$values .= "".SoondaUtil::encloseHTML( $o->principal_id ).",";
			
	
		$columns .= "version,";
		if(str_replace(" ", "",  $o->version) == "")
			$values .= "0,";
		else
			$values .= "".SoondaUtil::encloseHTML( $o->version ).",";
			
	
			
		$columns .= "definition,";
		$values .= "'".SoondaUtil::encloseHTML( $o->definition )."',";
	
		$columns = substr( $columns, 0, strlen( $columns) - 1);
		$values = substr( $values, 0, strlen( $values) - 1);
		$query = $query.$columns." ) VALUES (".$values.")";
		return $query;
	}

	//Get query to Update an sysdiagrams object
	protected function getUpdateQuery( $o)
	{
		$columnAndValues = "";
		$condition = "";
		$query = "UPDATE sysdiagrams SET ";
	
		$columnAndValues .= "name = '".SoondaUtil::encloseHTML( $o->name )."',";
	
		if(str_replace(" ", "",  $o->principal_id) == "")
			$columnAndValues .= "principal_id = 0,";		
		else
			$columnAndValues .= "principal_id = ".SoondaUtil::encloseHTML( $o->principal_id ).",";
	
		$condition .= "diagram_id = ".$o->diagram_id." AND ";
	
		if(str_replace(" ", "",  $o->version) == "")
			$columnAndValues .= "version = 0,";		
		else
			$columnAndValues .= "version = ".SoondaUtil::encloseHTML( $o->version ).",";
	
		$columnAndValues .= "definition = '".SoondaUtil::encloseHTML( $o->definition )."',";
	
		$columnAndValues = substr( $columnAndValues, 0, strlen($columnAndValues) - 1);
		$condition = substr( $condition, 0, strlen($condition) - 4);
		$query = $query.$columnAndValues." WHERE ".$condition;
		return $query;
	}

	//Get query to delete sysdiagrams by id
	protected function getDeleteQuery( $id)
	{
		$condition = "";
		$query = "DELETE FROM sysdiagrams ";
	
		$condition .= "diagram_id = ".$id;
	
		$query = $query." WHERE ".$condition;
		return $query;
	}

	//Get query to delete sysdiagrams by condition
	protected function getDeleteQueryByCondition( $condition )
	{
		$query = "DELETE FROM sysdiagrams ";
		$query = $query." WHERE ".$condition;
		return $query;
	}

	//to initialize an sysdiagrams object with data from database
	protected function init($rs, $o)
	{
	
		$o->name = SoondaUtil::decloseHTML( $rs->Fields("name") );
	
		$o->principal_id = SoondaUtil::decloseHTML( $rs->Fields("principal_id") );
	
		$o->diagram_id = SoondaUtil::decloseHTML( $rs->Fields("diagram_id") );
	
		$o->version = SoondaUtil::decloseHTML( $rs->Fields("version") );
	
		$o->definition = SoondaUtil::decloseHTML( $rs->Fields("definition") );
	
		return $o;
	}

	//get all the sysdiagrams data from database
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

	//get the sysdiagrams total number of data from database
	public function getCount( $condition="")
	{
		//Get data query count for the sysdiagrams data
		$query = $this->getSelectQueryCount();
		if( str_replace(" ", "", $condition) != "")
			$condition = " WHERE ".$condition;
		$query .= $condition;

		//Retrieve the sysdiagrams data count
		$rs = $this->connection->Execute( $query);
		$count = $rs->Fields("total_data");
		return $count;
	}

	//get the detail of sysdiagrams using its id
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

	//Inserting sysdiagrams object into database
	public function insert( $o)
	{
		$data = array();
		$query = $this->getInsertQuery( $o);
		$rs = $this->connection->Execute( $query );
		
		$o->diagram_id = $rs;
		
		return $rs;
	}

	//Updating a sysdiagrams object in database
	public function update( $o)
	{
		$data = array();
		$query = $this->getUpdateQuery( $o);
		$rs = $this->connection->Execute( $query );
		return $o;
	}

	//Delete a sysdiagrams by id in database
	public function delete( $id)
	{
		$query = $this->getDeleteQuery( $id);
		$this->connection->Execute( $query);
	}

	//Delete a sysdiagrams by id in database
	public function deleteWhere( $condition)
	{
		$query = $this->getDeleteQueryByCondition( $condition );
		$this->connection->Execute( $query);
	}

	//Create new object of sysdiagrams
	public function createNew()
	{
		$o = new sysdiagrams();
		return $o;
	}


}//End of class

//Adapter for workflow
class _workflowAdapter extends SoondaAdapter
{	

	public function sortBy()
	{
		$sortBy = "";
	
		$sortBy .= "IdWorkflow ASC";
	
		return $sortBy;
	}

	//get query to retrieve all workflow data
	public function getSelectQuery()
	{
		$query = "SELECT * FROM workflow ";
		return $query;
	}

	//get query to count all workflow data
	public function getSelectQueryCount()
	{
		$query = "SELECT count(*) as total_data FROM workflow";
		return $query;
	}

	//Get query for detail workflow data
	protected function getSelectDetailQuery( $id)
	{
		$condition = "";
	
		$condition .= "IdWorkflow = ".$id;
	
		$query = $this->getSelectQuery( );

		if( $condition != "")
			$condition = " WHERE ".$condition;
		$query = $query.$condition;
		return $query;
	}

	//Get query to insert an workflow object
	protected function getInsertQuery( $o)
	{
		$columns = "";
		$values = "";
		$condition = "";
		$query = "INSERT INTO workflow ( ";
	
			
		$columns .= "WorkflowNo,";
		$values .= "'".SoondaUtil::encloseHTML( $o->WorkflowNo )."',";
	
			
		$columns .= "WorkflowName,";
		$values .= "'".SoondaUtil::encloseHTML( $o->WorkflowName )."',";
	
			
		$columns .= "WorkflowDesc,";
		$values .= "'".SoondaUtil::encloseHTML( $o->WorkflowDesc )."',";
	
		$columns = substr( $columns, 0, strlen( $columns) - 1);
		$values = substr( $values, 0, strlen( $values) - 1);
		$query = $query.$columns." ) VALUES (".$values.")";
		return $query;
	}

	//Get query to Update an workflow object
	protected function getUpdateQuery( $o)
	{
		$columnAndValues = "";
		$condition = "";
		$query = "UPDATE workflow SET ";
	
		$condition .= "IdWorkflow = ".$o->IdWorkflow." AND ";
	
		$columnAndValues .= "WorkflowNo = '".SoondaUtil::encloseHTML( $o->WorkflowNo )."',";
	
		$columnAndValues .= "WorkflowName = '".SoondaUtil::encloseHTML( $o->WorkflowName )."',";
	
		$columnAndValues .= "WorkflowDesc = '".SoondaUtil::encloseHTML( $o->WorkflowDesc )."',";
	
		$columnAndValues = substr( $columnAndValues, 0, strlen($columnAndValues) - 1);
		$condition = substr( $condition, 0, strlen($condition) - 4);
		$query = $query.$columnAndValues." WHERE ".$condition;
		return $query;
	}

	//Get query to delete workflow by id
	protected function getDeleteQuery( $id)
	{
		$condition = "";
		$query = "DELETE FROM workflow ";
	
		$condition .= "IdWorkflow = ".$id;
	
		$query = $query." WHERE ".$condition;
		return $query;
	}

	//Get query to delete workflow by condition
	protected function getDeleteQueryByCondition( $condition )
	{
		$query = "DELETE FROM workflow ";
		$query = $query." WHERE ".$condition;
		return $query;
	}

	//to initialize an workflow object with data from database
	protected function init($rs, $o)
	{
	
		$o->IdWorkflow = SoondaUtil::decloseHTML( $rs->Fields("IdWorkflow") );
	
		$o->WorkflowNo = SoondaUtil::decloseHTML( $rs->Fields("WorkflowNo") );
	
		$o->WorkflowName = SoondaUtil::decloseHTML( $rs->Fields("WorkflowName") );
	
		$o->WorkflowDesc = SoondaUtil::decloseHTML( $rs->Fields("WorkflowDesc") );
	
		return $o;
	}

	//get all the workflow data from database
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

	//get the workflow total number of data from database
	public function getCount( $condition="")
	{
		//Get data query count for the workflow data
		$query = $this->getSelectQueryCount();
		if( str_replace(" ", "", $condition) != "")
			$condition = " WHERE ".$condition;
		$query .= $condition;

		//Retrieve the workflow data count
		$rs = $this->connection->Execute( $query);
		$count = $rs->Fields("total_data");
		return $count;
	}

	//get the detail of workflow using its id
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

	//Inserting workflow object into database
	public function insert( $o)
	{
		$data = array();
		$query = $this->getInsertQuery( $o);
		$rs = $this->connection->Execute( $query );
		
		$o->IdWorkflow = $rs;
		
		return $rs;
	}

	//Updating a workflow object in database
	public function update( $o)
	{
		$data = array();
		$query = $this->getUpdateQuery( $o);
		$rs = $this->connection->Execute( $query );
		return $o;
	}

	//Delete a workflow by id in database
	public function delete( $id)
	{
		$query = $this->getDeleteQuery( $id);
		$this->connection->Execute( $query);
	}

	//Delete a workflow by id in database
	public function deleteWhere( $condition)
	{
		$query = $this->getDeleteQueryByCondition( $condition );
		$this->connection->Execute( $query);
	}

	//Create new object of workflow
	public function createNew()
	{
		$o = new workflow();
		return $o;
	}


}//End of class

//Adapter for workflowevaluator
class _workflowevaluatorAdapter extends SoondaAdapter
{	

	public function sortBy()
	{
		$sortBy = "";
	
		$sortBy .= "IdWorkflowEvaluator ASC";
	
		return $sortBy;
	}

	//get query to retrieve all workflowevaluator data
	public function getSelectQuery()
	{
		$query = "SELECT * FROM workflowevaluator ";
		return $query;
	}

	//get query to count all workflowevaluator data
	public function getSelectQueryCount()
	{
		$query = "SELECT count(*) as total_data FROM workflowevaluator";
		return $query;
	}

	//Get query for detail workflowevaluator data
	protected function getSelectDetailQuery( $id)
	{
		$condition = "";
	
		$condition .= "IdWorkflowEvaluator = ".$id;
	
		$query = $this->getSelectQuery( );

		if( $condition != "")
			$condition = " WHERE ".$condition;
		$query = $query.$condition;
		return $query;
	}

	//Get query to insert an workflowevaluator object
	protected function getInsertQuery( $o)
	{
		$columns = "";
		$values = "";
		$condition = "";
		$query = "INSERT INTO workflowevaluator ( ";
	
			
		$columns .= "EvaluatorOperationType,";
		$values .= "'".SoondaUtil::encloseHTML( $o->EvaluatorOperationType )."',";
	
		$columns .= "ImmediateRunNext,";
		if(str_replace(" ", "",  $o->ImmediateRunNext) == "")
			$values .= "0,";
		else
			$values .= "".SoondaUtil::encloseHTML( $o->ImmediateRunNext ).",";
			
	
		$columns .= "WorkflowId,";
		if(str_replace(" ", "",  $o->WorkflowId) == "")
			$values .= "0,";
		else
			$values .= "".SoondaUtil::encloseHTML( $o->WorkflowId ).",";
			
	
		$columns = substr( $columns, 0, strlen( $columns) - 1);
		$values = substr( $values, 0, strlen( $values) - 1);
		$query = $query.$columns." ) VALUES (".$values.")";
		return $query;
	}

	//Get query to Update an workflowevaluator object
	protected function getUpdateQuery( $o)
	{
		$columnAndValues = "";
		$condition = "";
		$query = "UPDATE workflowevaluator SET ";
	
		$condition .= "IdWorkflowEvaluator = ".$o->IdWorkflowEvaluator." AND ";
	
		$columnAndValues .= "EvaluatorOperationType = '".SoondaUtil::encloseHTML( $o->EvaluatorOperationType )."',";
	
		if(str_replace(" ", "",  $o->ImmediateRunNext) == "")
			$columnAndValues .= "ImmediateRunNext = 0,";		
		else
			$columnAndValues .= "ImmediateRunNext = ".SoondaUtil::encloseHTML( $o->ImmediateRunNext ).",";
	
		if(str_replace(" ", "",  $o->WorkflowId) == "")
			$columnAndValues .= "WorkflowId = 0,";		
		else
			$columnAndValues .= "WorkflowId = ".SoondaUtil::encloseHTML( $o->WorkflowId ).",";
	
		$columnAndValues = substr( $columnAndValues, 0, strlen($columnAndValues) - 1);
		$condition = substr( $condition, 0, strlen($condition) - 4);
		$query = $query.$columnAndValues." WHERE ".$condition;
		return $query;
	}

	//Get query to delete workflowevaluator by id
	protected function getDeleteQuery( $id)
	{
		$condition = "";
		$query = "DELETE FROM workflowevaluator ";
	
		$condition .= "IdWorkflowEvaluator = ".$id;
	
		$query = $query." WHERE ".$condition;
		return $query;
	}

	//Get query to delete workflowevaluator by condition
	protected function getDeleteQueryByCondition( $condition )
	{
		$query = "DELETE FROM workflowevaluator ";
		$query = $query." WHERE ".$condition;
		return $query;
	}

	//to initialize an workflowevaluator object with data from database
	protected function init($rs, $o)
	{
	
		$o->IdWorkflowEvaluator = SoondaUtil::decloseHTML( $rs->Fields("IdWorkflowEvaluator") );
	
		$o->EvaluatorOperationType = SoondaUtil::decloseHTML( $rs->Fields("EvaluatorOperationType") );
	
		$o->ImmediateRunNext = SoondaUtil::decloseHTML( $rs->Fields("ImmediateRunNext") );
	
		$o->WorkflowId = SoondaUtil::decloseHTML( $rs->Fields("WorkflowId") );
	
		return $o;
	}

	//get all the workflowevaluator data from database
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

	//get the workflowevaluator total number of data from database
	public function getCount( $condition="")
	{
		//Get data query count for the workflowevaluator data
		$query = $this->getSelectQueryCount();
		if( str_replace(" ", "", $condition) != "")
			$condition = " WHERE ".$condition;
		$query .= $condition;

		//Retrieve the workflowevaluator data count
		$rs = $this->connection->Execute( $query);
		$count = $rs->Fields("total_data");
		return $count;
	}

	//get the detail of workflowevaluator using its id
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

	//Inserting workflowevaluator object into database
	public function insert( $o)
	{
		$data = array();
		$query = $this->getInsertQuery( $o);
		$rs = $this->connection->Execute( $query );
		
		$o->IdWorkflowEvaluator = $rs;
		
		return $rs;
	}

	//Updating a workflowevaluator object in database
	public function update( $o)
	{
		$data = array();
		$query = $this->getUpdateQuery( $o);
		$rs = $this->connection->Execute( $query );
		return $o;
	}

	//Delete a workflowevaluator by id in database
	public function delete( $id)
	{
		$query = $this->getDeleteQuery( $id);
		$this->connection->Execute( $query);
	}

	//Delete a workflowevaluator by id in database
	public function deleteWhere( $condition)
	{
		$query = $this->getDeleteQueryByCondition( $condition );
		$this->connection->Execute( $query);
	}

	//Create new object of workflowevaluator
	public function createNew()
	{
		$o = new workflowevaluator();
		return $o;
	}


}//End of class

//Adapter for workflowevaluatoritem
class _workflowevaluatoritemAdapter extends SoondaAdapter
{	

	public function sortBy()
	{
		$sortBy = "";
	
		$sortBy .= "IdWorkflowEvaluatorItem ASC";
	
		return $sortBy;
	}

	//get query to retrieve all workflowevaluatoritem data
	public function getSelectQuery()
	{
		$query = "SELECT * FROM workflowevaluatoritem ";
		return $query;
	}

	//get query to count all workflowevaluatoritem data
	public function getSelectQueryCount()
	{
		$query = "SELECT count(*) as total_data FROM workflowevaluatoritem";
		return $query;
	}

	//Get query for detail workflowevaluatoritem data
	protected function getSelectDetailQuery( $id)
	{
		$condition = "";
	
		$condition .= "IdWorkflowEvaluatorItem = ".$id;
	
		$query = $this->getSelectQuery( );

		if( $condition != "")
			$condition = " WHERE ".$condition;
		$query = $query.$condition;
		return $query;
	}

	//Get query to insert an workflowevaluatoritem object
	protected function getInsertQuery( $o)
	{
		$columns = "";
		$values = "";
		$condition = "";
		$query = "INSERT INTO workflowevaluatoritem ( ";
	
			
		$columns .= "WorkflowEvaluatorExpression,";
		$values .= "'".SoondaUtil::encloseHTML( $o->WorkflowEvaluatorExpression )."',";
	
		$columns .= "NextProcessId,";
		if(str_replace(" ", "",  $o->NextProcessId) == "")
			$values .= "0,";
		else
			$values .= "".SoondaUtil::encloseHTML( $o->NextProcessId ).",";
			
	
		$columns .= "WorkflowEvaluatorId,";
		if(str_replace(" ", "",  $o->WorkflowEvaluatorId) == "")
			$values .= "0,";
		else
			$values .= "".SoondaUtil::encloseHTML( $o->WorkflowEvaluatorId ).",";
			
	
		$columns = substr( $columns, 0, strlen( $columns) - 1);
		$values = substr( $values, 0, strlen( $values) - 1);
		$query = $query.$columns." ) VALUES (".$values.")";
		return $query;
	}

	//Get query to Update an workflowevaluatoritem object
	protected function getUpdateQuery( $o)
	{
		$columnAndValues = "";
		$condition = "";
		$query = "UPDATE workflowevaluatoritem SET ";
	
		$condition .= "IdWorkflowEvaluatorItem = ".$o->IdWorkflowEvaluatorItem." AND ";
	
		$columnAndValues .= "WorkflowEvaluatorExpression = '".SoondaUtil::encloseHTML( $o->WorkflowEvaluatorExpression )."',";
	
		if(str_replace(" ", "",  $o->NextProcessId) == "")
			$columnAndValues .= "NextProcessId = 0,";		
		else
			$columnAndValues .= "NextProcessId = ".SoondaUtil::encloseHTML( $o->NextProcessId ).",";
	
		if(str_replace(" ", "",  $o->WorkflowEvaluatorId) == "")
			$columnAndValues .= "WorkflowEvaluatorId = 0,";		
		else
			$columnAndValues .= "WorkflowEvaluatorId = ".SoondaUtil::encloseHTML( $o->WorkflowEvaluatorId ).",";
	
		$columnAndValues = substr( $columnAndValues, 0, strlen($columnAndValues) - 1);
		$condition = substr( $condition, 0, strlen($condition) - 4);
		$query = $query.$columnAndValues." WHERE ".$condition;
		return $query;
	}

	//Get query to delete workflowevaluatoritem by id
	protected function getDeleteQuery( $id)
	{
		$condition = "";
		$query = "DELETE FROM workflowevaluatoritem ";
	
		$condition .= "IdWorkflowEvaluatorItem = ".$id;
	
		$query = $query." WHERE ".$condition;
		return $query;
	}

	//Get query to delete workflowevaluatoritem by condition
	protected function getDeleteQueryByCondition( $condition )
	{
		$query = "DELETE FROM workflowevaluatoritem ";
		$query = $query." WHERE ".$condition;
		return $query;
	}

	//to initialize an workflowevaluatoritem object with data from database
	protected function init($rs, $o)
	{
	
		$o->IdWorkflowEvaluatorItem = SoondaUtil::decloseHTML( $rs->Fields("IdWorkflowEvaluatorItem") );
	
		$o->WorkflowEvaluatorExpression = SoondaUtil::decloseHTML( $rs->Fields("WorkflowEvaluatorExpression") );
	
		$o->NextProcessId = SoondaUtil::decloseHTML( $rs->Fields("NextProcessId") );
	
		$o->WorkflowEvaluatorId = SoondaUtil::decloseHTML( $rs->Fields("WorkflowEvaluatorId") );
	
		return $o;
	}

	//get all the workflowevaluatoritem data from database
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

	//get the workflowevaluatoritem total number of data from database
	public function getCount( $condition="")
	{
		//Get data query count for the workflowevaluatoritem data
		$query = $this->getSelectQueryCount();
		if( str_replace(" ", "", $condition) != "")
			$condition = " WHERE ".$condition;
		$query .= $condition;

		//Retrieve the workflowevaluatoritem data count
		$rs = $this->connection->Execute( $query);
		$count = $rs->Fields("total_data");
		return $count;
	}

	//get the detail of workflowevaluatoritem using its id
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

	//Inserting workflowevaluatoritem object into database
	public function insert( $o)
	{
		$data = array();
		$query = $this->getInsertQuery( $o);
		$rs = $this->connection->Execute( $query );
		
		$o->IdWorkflowEvaluatorItem = $rs;
		
		return $rs;
	}

	//Updating a workflowevaluatoritem object in database
	public function update( $o)
	{
		$data = array();
		$query = $this->getUpdateQuery( $o);
		$rs = $this->connection->Execute( $query );
		return $o;
	}

	//Delete a workflowevaluatoritem by id in database
	public function delete( $id)
	{
		$query = $this->getDeleteQuery( $id);
		$this->connection->Execute( $query);
	}

	//Delete a workflowevaluatoritem by id in database
	public function deleteWhere( $condition)
	{
		$query = $this->getDeleteQueryByCondition( $condition );
		$this->connection->Execute( $query);
	}

	//Create new object of workflowevaluatoritem
	public function createNew()
	{
		$o = new workflowevaluatoritem();
		return $o;
	}


}//End of class

//Adapter for workflowevaluatortype
class _workflowevaluatortypeAdapter extends SoondaAdapter
{	

	public function sortBy()
	{
		$sortBy = "";
	
		$sortBy .= "IdWorkflowEvaluatorType ASC";
	
		return $sortBy;
	}

	//get query to retrieve all workflowevaluatortype data
	public function getSelectQuery()
	{
		$query = "SELECT * FROM workflowevaluatortype ";
		return $query;
	}

	//get query to count all workflowevaluatortype data
	public function getSelectQueryCount()
	{
		$query = "SELECT count(*) as total_data FROM workflowevaluatortype";
		return $query;
	}

	//Get query for detail workflowevaluatortype data
	protected function getSelectDetailQuery( $id)
	{
		$condition = "";
	
		$condition .= "IdWorkflowEvaluatorType = ".$id;
	
		$query = $this->getSelectQuery( );

		if( $condition != "")
			$condition = " WHERE ".$condition;
		$query = $query.$condition;
		return $query;
	}

	//Get query to insert an workflowevaluatortype object
	protected function getInsertQuery( $o)
	{
		$columns = "";
		$values = "";
		$condition = "";
		$query = "INSERT INTO workflowevaluatortype ( ";
	
		$columns .= "IdWorkflowEvaluatorType,";
		if(str_replace(" ", "",  $o->IdWorkflowEvaluatorType) == "")
			$values .= "0,";
		else
			$values .= "".SoondaUtil::encloseHTML( $o->IdWorkflowEvaluatorType ).",";
			
	
			
		$columns .= "EvaluatorType,";
		$values .= "'".SoondaUtil::encloseHTML( $o->EvaluatorType )."',";
	
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

	//Get query to Update an workflowevaluatortype object
	protected function getUpdateQuery( $o)
	{
		$columnAndValues = "";
		$condition = "";
		$query = "UPDATE workflowevaluatortype SET ";
	
		$condition .= "IdWorkflowEvaluatorType = ".$o->IdWorkflowEvaluatorType." AND ";
	
		$columnAndValues .= "EvaluatorType = '".SoondaUtil::encloseHTML( $o->EvaluatorType )."',";
	
		if(str_replace(" ", "",  $o->IsActive) == "")
			$columnAndValues .= "IsActive = 0,";		
		else
			$columnAndValues .= "IsActive = ".SoondaUtil::encloseHTML( $o->IsActive ).",";
	
		$columnAndValues = substr( $columnAndValues, 0, strlen($columnAndValues) - 1);
		$condition = substr( $condition, 0, strlen($condition) - 4);
		$query = $query.$columnAndValues." WHERE ".$condition;
		return $query;
	}

	//Get query to delete workflowevaluatortype by id
	protected function getDeleteQuery( $id)
	{
		$condition = "";
		$query = "DELETE FROM workflowevaluatortype ";
	
		$condition .= "IdWorkflowEvaluatorType = ".$id;
	
		$query = $query." WHERE ".$condition;
		return $query;
	}

	//Get query to delete workflowevaluatortype by condition
	protected function getDeleteQueryByCondition( $condition )
	{
		$query = "DELETE FROM workflowevaluatortype ";
		$query = $query." WHERE ".$condition;
		return $query;
	}

	//to initialize an workflowevaluatortype object with data from database
	protected function init($rs, $o)
	{
	
		$o->IdWorkflowEvaluatorType = SoondaUtil::decloseHTML( $rs->Fields("IdWorkflowEvaluatorType") );
	
		$o->EvaluatorType = SoondaUtil::decloseHTML( $rs->Fields("EvaluatorType") );
	
		$o->IsActive = SoondaUtil::decloseHTML( $rs->Fields("IsActive") );
	
		return $o;
	}

	//get all the workflowevaluatortype data from database
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

	//get the workflowevaluatortype total number of data from database
	public function getCount( $condition="")
	{
		//Get data query count for the workflowevaluatortype data
		$query = $this->getSelectQueryCount();
		if( str_replace(" ", "", $condition) != "")
			$condition = " WHERE ".$condition;
		$query .= $condition;

		//Retrieve the workflowevaluatortype data count
		$rs = $this->connection->Execute( $query);
		$count = $rs->Fields("total_data");
		return $count;
	}

	//get the detail of workflowevaluatortype using its id
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

	//Inserting workflowevaluatortype object into database
	public function insert( $o)
	{
		$data = array();
		$query = $this->getInsertQuery( $o);
		$rs = $this->connection->Execute( $query );
		
		$o->IdWorkflowEvaluatorType = $rs;
		
		return $rs;
	}

	//Updating a workflowevaluatortype object in database
	public function update( $o)
	{
		$data = array();
		$query = $this->getUpdateQuery( $o);
		$rs = $this->connection->Execute( $query );
		return $o;
	}

	//Delete a workflowevaluatortype by id in database
	public function delete( $id)
	{
		$query = $this->getDeleteQuery( $id);
		$this->connection->Execute( $query);
	}

	//Delete a workflowevaluatortype by id in database
	public function deleteWhere( $condition)
	{
		$query = $this->getDeleteQueryByCondition( $condition );
		$this->connection->Execute( $query);
	}

	//Create new object of workflowevaluatortype
	public function createNew()
	{
		$o = new workflowevaluatortype();
		return $o;
	}


}//End of class




?>