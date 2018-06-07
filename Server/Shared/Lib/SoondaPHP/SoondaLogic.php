<?php


class SoondaLogic extends Soonda
{
	var $config;

	public function setConfiguration( $config )
	{
		$this->config = $config;
	}

	protected function getCondition( $filter )
	{
		
		return  $filter->condition;
	}
	
	public function getAll( $adapter, $filter = null)
	{
		$cond = ($filter == null) ? "" : $this->getCondition( $filter );
		$order = $filter->sortBy;
		
		$data = $adapter->getAll( $cond, $order, $filter->offset, $filter->maxDisplay );
		//echo "======".$cond."========<br>";
		//var_dump ($data );
		return $data;
	}

	public function getTotalData( $adapter, $filter )
	{
		$cond = $this->getCondition( $filter );
		$data = $adapter->getCount( $cond );
		return $data;
	}

	public function getDetail( $adapter, $id )
	{
		$data = $adapter->getDetail( $id);
		return $data;
	}

	public function getLookupData(  $adapter )
	{
		return null;
	}

	/*
	*	Function: getLookupDataByTable( $adapter, $table )
	*	Parameter: 
	*	- $adapter, data adapter object that will be used by the function. 
	*	- $table, name of the table that will be retrieved.
	*	Return value: array of all lookup data for <% Response.Write( Module.ModuleText); %> form. 
	*	Description:
	*	Return all lookup data for <% Response.Write( Module.ModuleText); %> form. These lookup data will be used for lookup comboboxes.
	*/
	public function getLookupDataByTable(  $adapter, $table )
	{

		eval("\$lAdapter = new ".$table."Adapter();");
		$lAdapter->connection = $adapter->connection;
		$data = $lAdapter->getAll();
		
		return $data;
	}

	public function validateAdd( $adapter, $o )
	{
		$result = new ValidationResult();

		$result->succeed = true;
		$result->Message = "Ok";
		return $result;
	}

	public function validateEdit( $adapter, $o )
	{
		$result = new ValidationResult();

		$result->succeed = true;
		$result->Message = "Ok";
		return $result;
	}

	public function add( $adapter, $o )
	{
		$result = $this->validateAdd( $adapter, $o );
		if( $result->succeed )
			$adapter->insert(   $o );
		return $result;
	}

	public function update( $adapter, $o )
	{
		$result = $this->validateEdit( $adapter, $o );
		if( $result->succeed )
			$adapter->update(   $o );
		return $result;
	}

	public function delete( $adapter, $o )
	{
		$adapter->delete(   $o );
		$result = new ValidationResult();

		$result->succeed = true;
		$result->Message = "Ok";
		return $result;
		
	}

	public function createAddObjectFromPost( $post )
	{
	}

	public function createEditObjectFromPost( $post )
	{
	}

}


?>