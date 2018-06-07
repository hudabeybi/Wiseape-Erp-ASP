<?php

class SoondaAdapter extends Soonda
{

	var $config;
	var $connection;

	function SoondaAdapter()
	{
		global $config;
		$this->config = $config;
		$this->createDbConnection();
	}

	function setConfiguration($config)
	{
		$this->config = $config;
	}

	public function getTotal(  $cond)
	{
	
	}

	public function getAll( $cond, $offset, $limit )
	{
		
	}
	
	public function getDetail( $id )
	{
		
	}

	public function insert( $o )
	{
		
	}

	public function update( $o )
	{
		
	}

	public function delete( $id )
	{
		
	}

}

?>