<?php

class SoondaWs
{
	var $param;
	function SoondaWS()
	{
		$this->param = array();
	}

	function getAdapter($adapterName, $connection)
	{	
		$dir = dirname(__FILE__);
		include_once($dir."/../../Bin/Module.Adapter/".$adapterName."Adapter.php");
		$adapter = $adapterName."Adapter";
		$adp = new $adapter();
		$adp->connection = $connection;
		return $adp;
	}

	function getLogic($logicName)
	{
		$dir = dirname(__FILE__);
		include_once($dir."/../../Bin/Module.Logic/".$logicName."Logic.php");
		$logic = $logicName."Logic";
		return new $logic();
	}

	function getFilter( $search, $offset, $limit, $sort )
	{
		$filter = new DataFilter();
		$filter->set("FirstName")->like("%".$search."%")->opOr()->set("LastName")->like("%".$search."%");
		$filter->sortBy = "FirstName";
		$filter->offset = $offset;
		$filter->maxDisplay = $limit;
		return $filter;
	}
}

?>