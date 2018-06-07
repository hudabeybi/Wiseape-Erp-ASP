<?php
//This file is generated using SoondaCodeGenerator Pluggin for Huda_AppBuilder.
//Don't modify this file directly. Create new file and class that inherits this class to add functionality and modification.
//This file may be replaced during re-code generation, any changes to this file may be replaced.

//**********************************************************************
//
//	Created Date: 6/5/2017 3:40:33 PM
//
//**********************************************************************

include_once("_adapter.php");


//Adapter for application
class applicationAdapter extends _applicationAdapter
{	

	//get query to retrieve all data
	public function getSelectQuery()
	{
		$query = parent::getSelectQuery();
		return $query;
	}

	//get query to count all data
	public function getSelectQueryCount( )
	{
		$query = parent::getSelectQueryCount( );
		return $query;
	}

	//Get query for detail data
	protected function getSelectDetailQuery( $id)
	{
		$query = parent::getSelectDetailQuery( $id  );
		return $query;
	}

	//Get query to Update by object
	protected function getInsertQuery( $o)
	{
		$query = parent::getInsertQuery( $o  );
		return $query;
	}

	//Get query to Update by object
	protected function getUpdateQuery( $o)
	{
		$query = parent::getUpdateQuery( $o  );
		return $query;
	}

	//Get query to delete by id
	protected function getDeleteQuery( $id)
	{
		$query = parent::getDeleteQuery( $id  );
		return $query;
	}

	protected function init($rs, $o)
	{
		$o = parent::init($rs, $o);
		return $o;
	}

	public function getAll( $condition = "",$order = "", $offset = "", $limit = "", $returnRecordSet = false)
	{
		$data = parent::getAll( $condition, $order, $offset, $limit, $returnRecordSet);
		return $data;
	}

	public function getCount( $condition = "")
	{
		$data = parent::getCount( $condition);
		return $data;
	}

	public function getDetail( $id, $returnRecordSet = false)
	{
		$data = parent::getDetail( $id, $returnRecordSet);
		return $data;
	}

	public function insert( $o)
	{
		$res = parent::insert( $o);
		return $res;
	}

	public function update( $o)
	{
		$o = parent::update( $o);
		return $o;
	}

	public function delete( $id)
	{
		parent::delete( $id);
	}


}//End of class

//Adapter for process
class processAdapter extends _processAdapter
{	

	//get query to retrieve all data
	public function getSelectQuery()
	{
		$query = parent::getSelectQuery();
		return $query;
	}

	//get query to count all data
	public function getSelectQueryCount( )
	{
		$query = parent::getSelectQueryCount( );
		return $query;
	}

	//Get query for detail data
	protected function getSelectDetailQuery( $id)
	{
		$query = parent::getSelectDetailQuery( $id  );
		return $query;
	}

	//Get query to Update by object
	protected function getInsertQuery( $o)
	{
		$query = parent::getInsertQuery( $o  );
		return $query;
	}

	//Get query to Update by object
	protected function getUpdateQuery( $o)
	{
		$query = parent::getUpdateQuery( $o  );
		return $query;
	}

	//Get query to delete by id
	protected function getDeleteQuery( $id)
	{
		$query = parent::getDeleteQuery( $id  );
		return $query;
	}

	protected function init($rs, $o)
	{
		$o = parent::init($rs, $o);
		return $o;
	}

	public function getAll( $condition = "",$order = "", $offset = "", $limit = "", $returnRecordSet = false)
	{
		$data = parent::getAll( $condition, $order, $offset, $limit, $returnRecordSet);
		return $data;
	}

	public function getCount( $condition = "")
	{
		$data = parent::getCount( $condition);
		return $data;
	}

	public function getDetail( $id, $returnRecordSet = false)
	{
		$data = parent::getDetail( $id, $returnRecordSet);
		return $data;
	}

	public function insert( $o)
	{
		$res = parent::insert( $o);
		return $res;
	}

	public function update( $o)
	{
		$o = parent::update( $o);
		return $o;
	}

	public function delete( $id)
	{
		parent::delete( $id);
	}


}//End of class

//Adapter for processdata
class processdataAdapter extends _processdataAdapter
{	

	//get query to retrieve all data
	public function getSelectQuery()
	{
		$query = parent::getSelectQuery();
		return $query;
	}

	//get query to count all data
	public function getSelectQueryCount( )
	{
		$query = parent::getSelectQueryCount( );
		return $query;
	}

	//Get query for detail data
	protected function getSelectDetailQuery( $id)
	{
		$query = parent::getSelectDetailQuery( $id  );
		return $query;
	}

	//Get query to Update by object
	protected function getInsertQuery( $o)
	{
		$query = parent::getInsertQuery( $o  );
		return $query;
	}

	//Get query to Update by object
	protected function getUpdateQuery( $o)
	{
		$query = parent::getUpdateQuery( $o  );
		return $query;
	}

	//Get query to delete by id
	protected function getDeleteQuery( $id)
	{
		$query = parent::getDeleteQuery( $id  );
		return $query;
	}

	protected function init($rs, $o)
	{
		$o = parent::init($rs, $o);
		return $o;
	}

	public function getAll( $condition = "",$order = "", $offset = "", $limit = "", $returnRecordSet = false)
	{
		$data = parent::getAll( $condition, $order, $offset, $limit, $returnRecordSet);
		return $data;
	}

	public function getCount( $condition = "")
	{
		$data = parent::getCount( $condition);
		return $data;
	}

	public function getDetail( $id, $returnRecordSet = false)
	{
		$data = parent::getDetail( $id, $returnRecordSet);
		return $data;
	}

	public function insert( $o)
	{
		$res = parent::insert( $o);
		return $res;
	}

	public function update( $o)
	{
		$o = parent::update( $o);
		return $o;
	}

	public function delete( $id)
	{
		parent::delete( $id);
	}


}//End of class

//Adapter for processgroup
class processgroupAdapter extends _processgroupAdapter
{	

	//get query to retrieve all data
	public function getSelectQuery()
	{
		$query = parent::getSelectQuery();
		return $query;
	}

	//get query to count all data
	public function getSelectQueryCount( )
	{
		$query = parent::getSelectQueryCount( );
		return $query;
	}

	//Get query for detail data
	protected function getSelectDetailQuery( $id)
	{
		$query = parent::getSelectDetailQuery( $id  );
		return $query;
	}

	//Get query to Update by object
	protected function getInsertQuery( $o)
	{
		$query = parent::getInsertQuery( $o  );
		return $query;
	}

	//Get query to Update by object
	protected function getUpdateQuery( $o)
	{
		$query = parent::getUpdateQuery( $o  );
		return $query;
	}

	//Get query to delete by id
	protected function getDeleteQuery( $id)
	{
		$query = parent::getDeleteQuery( $id  );
		return $query;
	}

	protected function init($rs, $o)
	{
		$o = parent::init($rs, $o);
		return $o;
	}

	public function getAll( $condition = "",$order = "", $offset = "", $limit = "", $returnRecordSet = false)
	{
		$data = parent::getAll( $condition, $order, $offset, $limit, $returnRecordSet);
		return $data;
	}

	public function getCount( $condition = "")
	{
		$data = parent::getCount( $condition);
		return $data;
	}

	public function getDetail( $id, $returnRecordSet = false)
	{
		$data = parent::getDetail( $id, $returnRecordSet);
		return $data;
	}

	public function insert( $o)
	{
		$res = parent::insert( $o);
		return $res;
	}

	public function update( $o)
	{
		$o = parent::update( $o);
		return $o;
	}

	public function delete( $id)
	{
		parent::delete( $id);
	}


}//End of class

//Adapter for sysdiagrams
class sysdiagramsAdapter extends _sysdiagramsAdapter
{	

	//get query to retrieve all data
	public function getSelectQuery()
	{
		$query = parent::getSelectQuery();
		return $query;
	}

	//get query to count all data
	public function getSelectQueryCount( )
	{
		$query = parent::getSelectQueryCount( );
		return $query;
	}

	//Get query for detail data
	protected function getSelectDetailQuery( $id)
	{
		$query = parent::getSelectDetailQuery( $id  );
		return $query;
	}

	//Get query to Update by object
	protected function getInsertQuery( $o)
	{
		$query = parent::getInsertQuery( $o  );
		return $query;
	}

	//Get query to Update by object
	protected function getUpdateQuery( $o)
	{
		$query = parent::getUpdateQuery( $o  );
		return $query;
	}

	//Get query to delete by id
	protected function getDeleteQuery( $id)
	{
		$query = parent::getDeleteQuery( $id  );
		return $query;
	}

	protected function init($rs, $o)
	{
		$o = parent::init($rs, $o);
		return $o;
	}

	public function getAll( $condition = "",$order = "", $offset = "", $limit = "", $returnRecordSet = false)
	{
		$data = parent::getAll( $condition, $order, $offset, $limit, $returnRecordSet);
		return $data;
	}

	public function getCount( $condition = "")
	{
		$data = parent::getCount( $condition);
		return $data;
	}

	public function getDetail( $id, $returnRecordSet = false)
	{
		$data = parent::getDetail( $id, $returnRecordSet);
		return $data;
	}

	public function insert( $o)
	{
		$res = parent::insert( $o);
		return $res;
	}

	public function update( $o)
	{
		$o = parent::update( $o);
		return $o;
	}

	public function delete( $id)
	{
		parent::delete( $id);
	}


}//End of class

//Adapter for workflow
class workflowAdapter extends _workflowAdapter
{	

	//get query to retrieve all data
	public function getSelectQuery()
	{
		$query = parent::getSelectQuery();
		return $query;
	}

	//get query to count all data
	public function getSelectQueryCount( )
	{
		$query = parent::getSelectQueryCount( );
		return $query;
	}

	//Get query for detail data
	protected function getSelectDetailQuery( $id)
	{
		$query = parent::getSelectDetailQuery( $id  );
		return $query;
	}

	//Get query to Update by object
	protected function getInsertQuery( $o)
	{
		$query = parent::getInsertQuery( $o  );
		return $query;
	}

	//Get query to Update by object
	protected function getUpdateQuery( $o)
	{
		$query = parent::getUpdateQuery( $o  );
		return $query;
	}

	//Get query to delete by id
	protected function getDeleteQuery( $id)
	{
		$query = parent::getDeleteQuery( $id  );
		return $query;
	}

	protected function init($rs, $o)
	{
		$o = parent::init($rs, $o);
		return $o;
	}

	public function getAll( $condition = "",$order = "", $offset = "", $limit = "", $returnRecordSet = false)
	{
		$data = parent::getAll( $condition, $order, $offset, $limit, $returnRecordSet);
		return $data;
	}

	public function getCount( $condition = "")
	{
		$data = parent::getCount( $condition);
		return $data;
	}

	public function getDetail( $id, $returnRecordSet = false)
	{
		$data = parent::getDetail( $id, $returnRecordSet);
		return $data;
	}

	public function insert( $o)
	{
		$res = parent::insert( $o);
		return $res;
	}

	public function update( $o)
	{
		$o = parent::update( $o);
		return $o;
	}

	public function delete( $id)
	{
		parent::delete( $id);
	}


}//End of class

//Adapter for workflowevaluator
class workflowevaluatorAdapter extends _workflowevaluatorAdapter
{	

	//get query to retrieve all data
	public function getSelectQuery()
	{
		$query = parent::getSelectQuery();
		return $query;
	}

	//get query to count all data
	public function getSelectQueryCount( )
	{
		$query = parent::getSelectQueryCount( );
		return $query;
	}

	//Get query for detail data
	protected function getSelectDetailQuery( $id)
	{
		$query = parent::getSelectDetailQuery( $id  );
		return $query;
	}

	//Get query to Update by object
	protected function getInsertQuery( $o)
	{
		$query = parent::getInsertQuery( $o  );
		return $query;
	}

	//Get query to Update by object
	protected function getUpdateQuery( $o)
	{
		$query = parent::getUpdateQuery( $o  );
		return $query;
	}

	//Get query to delete by id
	protected function getDeleteQuery( $id)
	{
		$query = parent::getDeleteQuery( $id  );
		return $query;
	}

	protected function init($rs, $o)
	{
		$o = parent::init($rs, $o);
		return $o;
	}

	public function getAll( $condition = "",$order = "", $offset = "", $limit = "", $returnRecordSet = false)
	{
		$data = parent::getAll( $condition, $order, $offset, $limit, $returnRecordSet);
		return $data;
	}

	public function getCount( $condition = "")
	{
		$data = parent::getCount( $condition);
		return $data;
	}

	public function getDetail( $id, $returnRecordSet = false)
	{
		$data = parent::getDetail( $id, $returnRecordSet);
		return $data;
	}

	public function insert( $o)
	{
		$res = parent::insert( $o);
		return $res;
	}

	public function update( $o)
	{
		$o = parent::update( $o);
		return $o;
	}

	public function delete( $id)
	{
		parent::delete( $id);
	}


}//End of class

//Adapter for workflowevaluatoritem
class workflowevaluatoritemAdapter extends _workflowevaluatoritemAdapter
{	

	//get query to retrieve all data
	public function getSelectQuery()
	{
		$query = parent::getSelectQuery();
		return $query;
	}

	//get query to count all data
	public function getSelectQueryCount( )
	{
		$query = parent::getSelectQueryCount( );
		return $query;
	}

	//Get query for detail data
	protected function getSelectDetailQuery( $id)
	{
		$query = parent::getSelectDetailQuery( $id  );
		return $query;
	}

	//Get query to Update by object
	protected function getInsertQuery( $o)
	{
		$query = parent::getInsertQuery( $o  );
		return $query;
	}

	//Get query to Update by object
	protected function getUpdateQuery( $o)
	{
		$query = parent::getUpdateQuery( $o  );
		return $query;
	}

	//Get query to delete by id
	protected function getDeleteQuery( $id)
	{
		$query = parent::getDeleteQuery( $id  );
		return $query;
	}

	protected function init($rs, $o)
	{
		$o = parent::init($rs, $o);
		return $o;
	}

	public function getAll( $condition = "",$order = "", $offset = "", $limit = "", $returnRecordSet = false)
	{
		$data = parent::getAll( $condition, $order, $offset, $limit, $returnRecordSet);
		return $data;
	}

	public function getCount( $condition = "")
	{
		$data = parent::getCount( $condition);
		return $data;
	}

	public function getDetail( $id, $returnRecordSet = false)
	{
		$data = parent::getDetail( $id, $returnRecordSet);
		return $data;
	}

	public function insert( $o)
	{
		$res = parent::insert( $o);
		return $res;
	}

	public function update( $o)
	{
		$o = parent::update( $o);
		return $o;
	}

	public function delete( $id)
	{
		parent::delete( $id);
	}


}//End of class

//Adapter for workflowevaluatortype
class workflowevaluatortypeAdapter extends _workflowevaluatortypeAdapter
{	

	//get query to retrieve all data
	public function getSelectQuery()
	{
		$query = parent::getSelectQuery();
		return $query;
	}

	//get query to count all data
	public function getSelectQueryCount( )
	{
		$query = parent::getSelectQueryCount( );
		return $query;
	}

	//Get query for detail data
	protected function getSelectDetailQuery( $id)
	{
		$query = parent::getSelectDetailQuery( $id  );
		return $query;
	}

	//Get query to Update by object
	protected function getInsertQuery( $o)
	{
		$query = parent::getInsertQuery( $o  );
		return $query;
	}

	//Get query to Update by object
	protected function getUpdateQuery( $o)
	{
		$query = parent::getUpdateQuery( $o  );
		return $query;
	}

	//Get query to delete by id
	protected function getDeleteQuery( $id)
	{
		$query = parent::getDeleteQuery( $id  );
		return $query;
	}

	protected function init($rs, $o)
	{
		$o = parent::init($rs, $o);
		return $o;
	}

	public function getAll( $condition = "",$order = "", $offset = "", $limit = "", $returnRecordSet = false)
	{
		$data = parent::getAll( $condition, $order, $offset, $limit, $returnRecordSet);
		return $data;
	}

	public function getCount( $condition = "")
	{
		$data = parent::getCount( $condition);
		return $data;
	}

	public function getDetail( $id, $returnRecordSet = false)
	{
		$data = parent::getDetail( $id, $returnRecordSet);
		return $data;
	}

	public function insert( $o)
	{
		$res = parent::insert( $o);
		return $res;
	}

	public function update( $o)
	{
		$o = parent::update( $o);
		return $o;
	}

	public function delete( $id)
	{
		parent::delete( $id);
	}


}//End of class




?>