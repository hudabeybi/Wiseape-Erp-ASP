<?php 

//This is a class to hold values of data validation result process.
class ValidationResult
{
	var $succeed;
	var $message;
	var $columnName;
}

//This is the base class for all data models
class SoondaData
{
	var $AddNew = 1;
	var $ToBeDeleted = 0;
	//PHP magic function, setter & getter
	/*
	 public function __get($property) 
	 {
		eval("\$methodName = \$this->_get_".$property.";");
		if (property_exists($this, $property) && method_exists($this, $methodName  )) {
		  eval("\$o = \$this->_get_".$property."();");
		  return $o;
		}
		else
			return null;
	  }

	  public function __set($property, $value) 
	  {
		eval("\$methodName = \$this->_set_".$property.";");
		if (property_exists($this, $property)  && method_exists($this, $methodName ) ) {
		  eval("\$this->_set_".$property."(\$value);");
		  return true;
		}
		else
			return false;
	  }
	  */

	public function __get($property) 
	 {

		if (property_exists($this, $property) ) {
		  return $this->$property;
		}
		else
			return null;
	  }

	 public function __set($property, $value) {
		//if (property_exists($this, $property)) {
		  $this->$property = $value;
		//}

		return $this;
	  }

	public function _getvars()
	{
			$arr = get_object_vars( $this );
			return $arr;
	}

	public function toJson()
	{
		return json_encode(get_object_vars($this));
	}
}


//This class is used to filter data in a query by a Business Logic object
class DataFilter
{
	var $condition = "";
	var $sortBy = "";
	var $offset = 0;
	var $maxDisplay = "";
	var $limit = "";
	
	function DataFilter()
	{
	}

	function set( $column )
	{
		$this->condition .= $column;
		return $this;
	}

	function openBracket()
	{
		$this->condition .= " ( ";
		return $this;
	}

	function closeBracket()
	{
		$this->condition .= " ) ";
		return $this;
	}

	function opAnd()
	{
		$this->condition .= " AND ";
		return $this;
	}

	function opOr()
	{
		$this->condition .= " OR ";
		return $this;
	}

	function like($value)
	{
		$this->condition .= " LIKE '".$value."'";
		return $this;
	}

	function notLike($value)
	{
		$this->condition .= " NOT LIKE '".$value."'";
		return $this;
	}

	function eq($value)
	{
		$this->condition .= " = ".$value."";
		return $this;
	}

	function neq($value)
	{
		$this->condition .= " <> ".$value."";
		return $this;
	}

	function gt($value)
	{
		$this->condition .= " > ".$value."";
		return $this;
	}

	function gte($value)
	{
		$this->condition .= " >= ".$value."";
		return $this;
	}

	function lt($value)
	{
		$this->condition .= " < ".$value."";
		return $this;
	}

	function lte($value)
	{
		$this->condition .= " <= ".$value."";
		return $this;
	}

	function in($value)
	{
		$this->condition .= " IN (".$value.")";
		return $this;
	}

	function notIn($value)
	{
		$this->condition .= " NOT IN (".$value.")";
		return $this;
	}

	function between($value1, $value2)
	{
		$this->condition .= " = '".$value1."' AND '".$value2."'";
		return $this;
	}

}



?>