<?php
//This file is generated using SoondaCodeGenerator Pluggin for Huda_AppBuilder.
//Don't modify this file directly. Create new file and class that inherits this class to add functionality and modification.
//This file may be replaced during re-code generation, any changes to this file may be replaced.

//**********************************************************************
//
//	Class Name: ProcessModuleAdapter
//	Created Date: 7/21/2017 3:23:48 PM
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


		$innerJoins .= "INNER JOIN application LookupTable_application ON process.ApplicationId = LookupTable_application.IdApplication ";

		$innerJoins .= "INNER JOIN workflow LookupTable_workflow ON process.WorkflowId = LookupTable_workflow.IdWorkflow ";

		$innerJoins .= "INNER JOIN processgroup LookupTable_processgroup ON process.ProcessGroupId = LookupTable_processgroup.IdProcessGroup ";
		return $innerJoins;
	}
	
	//Select Query for ViewProcessModuleData override parent's getSelectQuery()
	public function getSelectQuery()
	{
		$columns = "process.*,";
	
		$columns .= "LookupTable_application.IdApplication as application_IdApplication,";
	
		$columns .= "LookupTable_application.ApplicationName as application_ApplicationName,";
	
		$columns .= "LookupTable_application.ApplicationTitle as application_ApplicationTitle,";
	
		$columns .= "LookupTable_application.ApplicationInfo as application_ApplicationInfo,";
	
		$columns .= "LookupTable_application.ApplicationIconSmall as application_ApplicationIconSmall,";
	
		$columns .= "LookupTable_application.ApplicationIconMiddle as application_ApplicationIconMiddle,";
	
		$columns .= "LookupTable_application.ApplicationIconLarge as application_ApplicationIconLarge,";
	
		$columns .= "LookupTable_application.ApplicationPath as application_ApplicationPath,";
	
		$columns .= "LookupTable_application.ApplicationFile as application_ApplicationFile,";
	
		$columns .= "LookupTable_application.ApplicationClass as application_ApplicationClass,";
	
		$columns .= "LookupTable_application.ApplicationMainFunction as application_ApplicationMainFunction,";
	
		$columns .= "LookupTable_application.DisplayIcon as application_DisplayIcon,";
	
		$columns .= "LookupTable_application.IsActive as application_IsActive,";
	
		$columns .= "LookupTable_application.UseWorkflow as application_UseWorkflow,";
	
		$columns .= "LookupTable_workflow.IdWorkflow as workflow_IdWorkflow,";
	
		$columns .= "LookupTable_workflow.WorkflowNo as workflow_WorkflowNo,";
	
		$columns .= "LookupTable_workflow.WorkflowName as workflow_WorkflowName,";
	
		$columns .= "LookupTable_workflow.WorkflowDesc as workflow_WorkflowDesc,";
	
		$columns .= "LookupTable_processgroup.IdProcessGroup as processgroup_IdProcessGroup,";
	
		$columns .= "LookupTable_processgroup.ProcessGroupName as processgroup_ProcessGroupName,";
	
		$columns .= "LookupTable_processgroup.ProcessGroupTitle as processgroup_ProcessGroupTitle,";
	
		$columns .= "LookupTable_processgroup.ProcessGroupInfo as processgroup_ProcessGroupInfo,";
	
		$columns .= "LookupTable_processgroup.IconSmall as processgroup_IconSmall,";
	
		$columns .= "LookupTable_processgroup.IconMiddle as processgroup_IconMiddle,";
	
		$columns .= "LookupTable_processgroup.IconLarge as processgroup_IconLarge,";
	
		$columns .= "LookupTable_processgroup.IsActive as processgroup_IsActive,";
	
		$columns .= "LookupTable_processgroup.IsDisplay as processgroup_IsDisplay,";

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

		$o->application_IdApplication = SoondaUtil::decodeHTML( $rs->Fields("application_IdApplication") );	

		$o->application_ApplicationName = SoondaUtil::decodeHTML( $rs->Fields("application_ApplicationName") );	

		$o->application_ApplicationTitle = SoondaUtil::decodeHTML( $rs->Fields("application_ApplicationTitle") );	

		$o->application_ApplicationInfo = SoondaUtil::decodeHTML( $rs->Fields("application_ApplicationInfo") );	

		$o->application_ApplicationIconSmall = SoondaUtil::decodeHTML( $rs->Fields("application_ApplicationIconSmall") );	

		$o->application_ApplicationIconMiddle = SoondaUtil::decodeHTML( $rs->Fields("application_ApplicationIconMiddle") );	

		$o->application_ApplicationIconLarge = SoondaUtil::decodeHTML( $rs->Fields("application_ApplicationIconLarge") );	

		$o->application_ApplicationPath = SoondaUtil::decodeHTML( $rs->Fields("application_ApplicationPath") );	

		$o->application_ApplicationFile = SoondaUtil::decodeHTML( $rs->Fields("application_ApplicationFile") );	

		$o->application_ApplicationClass = SoondaUtil::decodeHTML( $rs->Fields("application_ApplicationClass") );	

		$o->application_ApplicationMainFunction = SoondaUtil::decodeHTML( $rs->Fields("application_ApplicationMainFunction") );	

		$o->application_DisplayIcon = SoondaUtil::decodeHTML( $rs->Fields("application_DisplayIcon") );	

		$o->application_IsActive = SoondaUtil::decodeHTML( $rs->Fields("application_IsActive") );	

		$o->application_UseWorkflow = SoondaUtil::decodeHTML( $rs->Fields("application_UseWorkflow") );	

		$o->workflow_IdWorkflow = SoondaUtil::decodeHTML( $rs->Fields("workflow_IdWorkflow") );	

		$o->workflow_WorkflowNo = SoondaUtil::decodeHTML( $rs->Fields("workflow_WorkflowNo") );	

		$o->workflow_WorkflowName = SoondaUtil::decodeHTML( $rs->Fields("workflow_WorkflowName") );	

		$o->workflow_WorkflowDesc = SoondaUtil::decodeHTML( $rs->Fields("workflow_WorkflowDesc") );	

		$o->processgroup_IdProcessGroup = SoondaUtil::decodeHTML( $rs->Fields("processgroup_IdProcessGroup") );	

		$o->processgroup_ProcessGroupName = SoondaUtil::decodeHTML( $rs->Fields("processgroup_ProcessGroupName") );	

		$o->processgroup_ProcessGroupTitle = SoondaUtil::decodeHTML( $rs->Fields("processgroup_ProcessGroupTitle") );	

		$o->processgroup_ProcessGroupInfo = SoondaUtil::decodeHTML( $rs->Fields("processgroup_ProcessGroupInfo") );	

		$o->processgroup_IconSmall = SoondaUtil::decodeHTML( $rs->Fields("processgroup_IconSmall") );	

		$o->processgroup_IconMiddle = SoondaUtil::decodeHTML( $rs->Fields("processgroup_IconMiddle") );	

		$o->processgroup_IconLarge = SoondaUtil::decodeHTML( $rs->Fields("processgroup_IconLarge") );	

		$o->processgroup_IsActive = SoondaUtil::decodeHTML( $rs->Fields("processgroup_IsActive") );	

		$o->processgroup_IsDisplay = SoondaUtil::decodeHTML( $rs->Fields("processgroup_IsDisplay") );	
		
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
			include_once( "Bin/Module.DataModel/ProcessModuleData.php");
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
		include_once( "Bin/Module.DataModel/ProcessModuleData.php");
		$o = new ViewProcessModuleData();
		return $o;
	}

}//End of class

?>