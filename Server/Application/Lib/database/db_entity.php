<?

class DbEntity
{
	var $TableName;
	var $Fields = array();
	var $Relations = array();
	var $AddBussinessLogic;
	var $Connection;
	var $GroupBys = array();
	var $OrderBys = array();
	var $WhereExpression = "";
	var $Where;
	var $SortMode = "ASC";
	var $SortImageAsc = "";
	var $SortImageDesc = "";

	var $Name;
	var $Url;
	var $Data = array();

	function DbEntity($TableName="")
	{ 
		$this->SetTableName($TableName);
	}

	function SetTableName($TableName)
	{
		$this->TableName = $TableName;
		$this->Name = "Form".$TableName;
		$this->Url = $_SERVER["PHP_SELF"];
		$this->GenerateFields();
	}
	function &Fields($index)
	{
		if(is_numeric($index))
			return $this->GetRelatedFieldByIndex($this, $index);
		else
			return $this->GetRelatedField($this, $index);

	}
	function AddRelation($relation)
	{
		$relation->Table = $this;
		$this->Relations[ $relation->GetRelationName()] = $relation;
		//array_push($this->Relations, $relation);
	}
	function &GetRelationByField($field)
	{
		foreach($this->Relations as $rel)
		{
			$relation =  $this->GetRelationForPHP4($rel);
			if($relation != "" && $relation->ParentField->FieldName == $field->FieldName)
				return $relation;
		}
		$false = false;
		return $false;
	}
	function SetConnection($dbtype="", $dbserver="", $dbname="",$dbusername="", $dbpassword="")
	{
		//if(is_string($dbtype))
		//echo "$dbtype $dbserver $dbname $dbusername  $dbpassword";
		$this->Connection = new DbConnection($dbtype, $dbserver, $dbname, $dbusername, $dbpassword);
		//else
		//	$this->Connection = $dbtype;
		$this->GenerateFields();
	}
	function SetDisplay( $fields, $display = true)
	{
		foreach($fields as $key=>$field)
		{
			if(is_string($field))
				$f = $this->Fields($field);
			else
			{
				$fieldName = $field->FieldName;
				$f = $this->Fields($fieldName);
			}
			$f->Display = $display;
		}
	}
	function SetRelationFromSchema()
	{
		$conn = $this->Connection;
		$foreignKeys = $conn->GetMetaForeignKeys($this->TableName);
		if(count($foreignKeys) > 0 && $foreignKeys != "")
		{
			//SoondaString::html_print_r($foreignKeys);
			if(count($foreignKeys) == 1)
			{
				//echo "foreign Keys ".$foreignKeys;
				$keys = array_keys($foreignKeys);
				$this->SetMyFieldRelation($keys[0], $foreignKeys[ $keys[0]]);
			}
			else
			{
				foreach($foreignKeys as $relatedTable=>$relatedFields)
				{
					$this->SetMyFieldRelation($relatedTable, $relatedFields);
				}
			}
		}
	}
	function SetMyFieldRelation($relatedTable, $relatedFields)
	{
			$dbEntity = new DbEntity($relatedTable);
			$con = $this->Connection;
			$dbEntity->SetConnection( $con->DbType, $con->DbServer, $con->DbName, $con->DbUsername, $con->DbPassword);
			foreach($relatedFields as $key=>$relatedField)
			{
				$field = explode("=", $relatedField);
				$myField = $this->Fields[$field[0]];
				$myField->Relate($dbEntity->Fields[ $field[1] ]);
			}		
	}

	function GetPrimaryKeyNames()
	{
		$s = array();
		foreach($this->Fields as $f)
		{
			//required for PHP 4. It's very stupidly upsetting!
			//$field = $this->GetFieldForPHP4($f);

			if($f->AsPrimaryKey)
			{
				array_push($s, $f->FieldName);
			}
		}
		return $s;
	}

	function GenerateFields()
	{		
		$con = $this->Connection;
		//echo $con." table : ".$this->TableName;
		if($con != null && $this->TableName != "")
		{
			$fields = $con->GetMetaColumns($this->TableName);

			$counter = 0;
			foreach($fields as $key=>$value)
			{
				$field = new DbField($value->name, $value->type, $value->max_length);
				$field->Table = $this;
				$field->Type = DbFieldTypeMapper::GetFieldType($this->Connection->DbType, $value->type);

				if($field->Type == DbFieldType::Text())
					$field->SortAble = false;
				eval("\$this->".$field->FieldName." = &\$field;");

				$this->Fields[$field->FieldName] = $field;
				//$this->Fields[$counter] = $this->Fields[$field->FieldName];
				$counter++;

			}
			$fields = $con->GetMetaPrimaryKeys($this->TableName);

			$this->SetPrimaryKeyFields( $fields);

			$this->Where = new WhereParam();
			$this->Where->Table = $this;
			$this->Where->InitFields();
		}
	}

	function SetPrimaryKeyFields($primaryKeys)
	{
		if($primaryKeys != "")
		{
			foreach($primaryKeys as $value)
			{
				foreach($this->Fields as $f)
				{
					//required for PHP 4. It's very stupidly upsetting!
					$field = $this->GetFieldForPHP4($f);

					if( strtolower($value) == strtolower($field->FieldName))
					{
						$field->AsPrimaryKey = true;	
					}
				}
			}
		}
	}

	function &GetFieldForPHP4($field)
	{
		$f = $this->Fields[$field->FieldName];
		return $f;
	}

	function &GetRelationForPHP4($relation)
	{
		$r = $this->Relations[$relation->GetRelationName()];
		return $r;
	}


	function ShowFields()
	{
		foreach($this->Fields as $f)
		{
			//required for PHP 4. It's very stupidly upsetting!
			$field = $this->GetFieldForPHP4($f);

			echo " : " .$field->FieldName." ".$field->Type." ".$field->AsPrimaryKey."<br>";

		}
	}

	function &GetDefaultDisplayLookupField()
	{
		foreach($this->Fields as $f)
		{
			//required for PHP 4. It's very stupidly upsetting!
			$field = $this->GetFieldForPHP4($f);
			if($field->Type != DbFieldType::Int() && $field->Type != DbFieldType::Text() && $field->AsPrimaryKey == false)
				return $field;
		}
	}

	function GetAllFieldByName($name)
	{
		return $this->GetRelatedField($this, $name);
	}

	function &GetRelatedField($tbl, $name)
	{
		$false = "false";
		foreach($tbl->Fields as $f)
		{
			//required for PHP 4. It's very stupidly upsetting!
			$field = $tbl->GetFieldForPHP4($f);

			if($field->FieldName == $name)
				return $field;
		}
		foreach($tbl->Relations as $rel)
		{
			$relation = $tbl->GetRelationForPHP4($rel);
			$childTable = $relation->ChildField->Table;
			$cField = $this->GetRelatedField($childTable, $name);
			if($cField != "false")
				return $cField;
		}

		return $false;
	}
	function &GetRelatedFieldByIndex($tbl, $index)
	{
		$i = 0;
		$false = "false";

		foreach($tbl->Fields as $f)
		{
			//required for PHP 4. It's very stupidly upsetting!
			$field = $tbl->GetFieldForPHP4($f);

			if($i == $index)
				return $field;
			$i++;
		}
		$i2 = $index - $i - 1;
		foreach($tbl->Relations as $rel)
		{
			$relation = $tbl->GetRelationForPHP4($rel);
			$childTable = $relation->ChildField->Table;
			return $this->GetRelatedFieldByIndex($childTable, $i2);
		}

		return $false;
	}

	function &GetFieldByIndex($index)
	{
		$counter = 0;
		foreach($this->Fields as $f)
		{
			//required for PHP 4. It's very stupidly upsetting!
			$field = $this->GetFieldForPHP4($f);
			
			if($counter == $index)
				return $field;
			$counter ++;
		}
		$false = false;
		return $false;
	}

	function GroupBy($fields)
	{
		foreach($fields as $f)
		{
			//$field = $this->GetFieldForPHP4($f);
			array_push( $this->GroupBys, $f);
		}
	}

	function OrderBy($fields, $sortMode = "ASC")
	{
		$this->OrderBys = array();
		$this->SortMode = $sortMode;
		foreach($fields as $f)
		{
			//$field = $this->GetFieldForPHP4($f);
			array_push( $this->OrderBys, $f);
		}
	}
	function SelectCount($alias)
	{
		$query = "select count(*) as $alias from ".$this->TableName."";
		return $this->Connection->Execute($query);
	}
	function GetSelectQuery()
	{
		$info = $this->GetSelectInfo($this);
		$joins = " ".$info["joins"];
		$whereExpressions = " ".$info["whereExpressions"];
		$joins = trim($joins);
		$whereExpressions = trim($whereExpressions);

		$groupBys = trim($info["groupBys"], ",");
		$orderBys = trim($info["orderBys"], ",");
		$fieldNames = trim($info["fieldNames"], ",");

		$query = "SELECT $fieldNames FROM ".$this->TableName." ";
		$query .= $joins." ";

		if(strlen($whereExpressions) > 0)
			$query .= " WHERE $whereExpressions ";

		if(strlen($groupBys) > 0)
			$query .= " GROUP BY $groupBys ";
	
		if(strlen($orderBys) > 0)
			$query .= " ORDER BY $orderBys ".$this->SortMode;
		return $query;
	}
	function GetSelectDetailQuery()
	{
		$this->SetPrimaryKeyAsCondition();
		$info = $this->GetSelectDetailInfo($this);
		$joins = " ".$info["joins"];
		$whereExpressions = " ".$info["whereExpressions"];
		$joins = trim($joins);
		$whereExpressions = trim($whereExpressions);

		$groupBys = trim($info["groupBys"], ",");
		$orderBys = trim($info["orderBys"], ",");
		$fieldNames = trim($info["fieldNames"], ",");

		$query = "SELECT $fieldNames FROM ".$this->TableName." ";
		$query .= $joins." ";

		if(strlen($whereExpressions) > 0)
			$query .= " WHERE $whereExpressions ";

		if(strlen($groupBys) > 0)
			$query .= " GROUP BY $groupBys ";
	
		if(strlen($orderBys) > 0)
			$query .= " ORDER BY $orderBys ".$this->SortMode;
		return $query;
	}
	function GetInsertQuery()
	{
		$info = $this->GetScalarQueryInfo();
		$tableName = $info["tableName"];
		$fieldNames = $info["fieldNames"];
		$values = $info["values"];
		$query = "INSERT INTO $tableName ($fieldNames) VALUES ($values)";
		return $query;
	}
	function GetUpdateQuery()
	{
		$info = $this->GetScalarQueryInfo();
		$tableName = $info["tableName"];
		$fieldNamesValues = $info["fieldNamesValues"];
		$whereExpression = $info["whereExpression"];
		$query = "UPDATE $tableName SET $fieldNamesValues WHERE $whereExpression";
		return $query;
	}
	function GetDeleteQuery()
	{
		$info = $this->GetScalarQueryInfo();
		$tableName = $info["tableName"];
		$whereExpression = $info["whereExpression"];
		$query = "DELETE $tableName WHERE $whereExpression";
		return $query;
	}


	function GetGroupByExp()
	{
		$exp = "";
		foreach($this->GroupBys as $field)
		{
			//$field = $this->GetFieldForPHP4($f);
			$exp .= $field->GetFullFieldName().",";
		}
		$exp = trim($exp, ",");
		return $exp;
	}

	function GetOrderByExp()
	{
		$exp = "";
		foreach($this->OrderBys as $field)
		{
			//$field = $this->GetFieldForPHP4($f);
			$exp .= $field->GetFullFieldName().",";
		}
		$exp = trim($exp, ",");
		return $exp;
	}

	function SetPrimaryKeyAsCondition()
	{
		foreach($this->Fields as $f)
		{
			$field = $this->GetFieldForPHP4($f);
			if($field->AsPrimaryKey && $field->Value != "")
			{
				$this->Where->Fields[$field->FieldName]->Equals($field->GetValue());
			}
		}
	}

	function SetWhereExpression($whereExpression1, $whereExpression2)
	{
		$whereExpression1 = trim($whereExpression1);
		$w1 = explode(" ", $whereExpression1);
		$whereExpression2 = trim($whereExpression2);
		$w2 = explode(" ", $whereExpression2);

		$ww1 = trim($w1[count($w1) - 1]);
		$ww2 = trim($w2[count($w2) - 1]);

		if($ww1 != "AND" && $ww2 != "AND" && $ww1 != "OR" && $ww2 != "OR" && $ww1 != "(" && $ww2 != ")")
			$whereExpression =  $whereExpression1." AND ".$whereExpression2;
		else
			$whereExpression = $whereExpression1." ".$whereExpression2;

		$whereExpression = trim($whereExpression, " ");
		$whereExpression = trim($whereExpression, "AND");
		$whereExpression = trim($whereExpression, "OR");
		$whereExpression = trim($whereExpression, " ");

		return $whereExpression;
	}

	function GetScalarQueryInfo()
	{
		$fieldNames = "";
		$values = "";
		$fieldNamesValues = "";
		$whereExpressions = $this->Where->GetExpression();
		$tableName = $this->TableName;
		foreach($this->Fields as $f)
		{
			$field = $this->GetFieldForPHP4($f);
			if(!$field->AsAutoNumber && $field->Value != null)
			{
				$fieldNames .= $field->FieldName.",";
				$values .= $field->GetValue().",";
				$fieldNamesValues .= $field->GetFieldValueExp().",";
			}
		}
		$fieldNames = trim($fieldNames, ",");
		$fieldNamesValues = trim($fieldNamesValues, ",");
		$values = trim($values, ",");

		$result = array();
		$result["fieldNames"] = $fieldNames;
		$result["fieldNamesValues"] = $fieldNamesValues;
		$result["values"] = $values;
		$result["whereExpression"] = $whereExpressions;
		$result["tableName"] = $tableName;
		return $result;
	}

	function GetSelectInfo($table)
	{
		$childTableInfo = array();
		$fieldNames = "";
		$relationCondition = "";
		$joins = "";
		$groupBys = $table->GetGroupByExp();
		$orderBys = $table->GetOrderByExp();
		$whereExpressions = $table->Where->GetExpression();

		$relations = array();
		foreach($table->Fields as $f)
		{
			if($f->Display)
			{
				$field = $table->GetFieldForPHP4($f);
				$fieldNames .= $field->GetSelectFieldExp().",";
			}
		}
		$fieldNames = trim($fieldNames, ",");
		//$counter = 0;
		foreach($table->Relations as $rel)
		{
			$relation = $table->GetRelationForPHP4($rel);
			$joins .= $relation->GetRelationExp()." ";
			//echo $relation->ChildField->GetFullFieldName()." $joins<br>";
			//$counter++;
			$childTableInfo = $this->GetSelectInfo( $relation->ChildField->Table);
			$joins .= " ".$childTableInfo["joins"];

			$whereExpressions = $this->SetWhereExpression( $whereExpressions, $childTableInfo["whereExpressions"]);

			if(strlen($childTableInfo["groupBys"]) > 0)
				$groupBys .= ", ".$childTableInfo["groupBys"];
			if(strlen($childTableInfo["orderBys"]) > 0)
				$orderBys .= ",  ".$childTableInfo["orderBys"];
			if(strlen($childTableInfo["fieldNames"]) > 0)
				$fieldNames .= ",  ".$childTableInfo["fieldNames"];
		}
		
		$result = array();
		$result["joins"] = $joins;
		$result["fieldNames"] = $fieldNames;
		$result["whereExpressions"] = $whereExpressions;
		$result["orderBys"] = $orderBys;
		$result["groupBys"] = $groupBys;
		return $result;
	}
	function GetSelectDetailInfo($table)
	{
		$childTableInfo = array();
		$fieldNames = "";
		$relationCondition = "";
		$joins = "";
		$groupBys = $table->GetGroupByExp();
		$orderBys = $table->GetOrderByExp();
		$whereExpressions = $table->Where->GetExpression();

		$relations = array();
		foreach($table->Fields as $f)
		{
				$field = $table->GetFieldForPHP4($f);
				$fieldNames .= $field->GetSelectFieldExp().",";
		}
		$fieldNames = trim($fieldNames, ",");
		//$counter = 0;
		foreach($table->Relations as $rel)
		{
			$relation = $table->GetRelationForPHP4($rel);
			$joins .= $relation->GetRelationExp()." ";
			//echo $relation->ChildField->GetFullFieldName()." $joins<br>";
			//$counter++;
			$childTableInfo = $this->GetSelectDetailInfo( $relation->ChildField->Table);
			$joins .= " ".$childTableInfo["joins"];
			$whereExpressions = $this->SetWhereExpression( $whereExpressions, $childTableInfo["whereExpressions"]);

			if(strlen($childTableInfo["groupBys"]) > 0)
				$groupBys .= ", ".$childTableInfo["groupBys"];
			if(strlen($childTableInfo["orderBys"]) > 0)
				$orderBys .= ",  ".$childTableInfo["orderBys"];
			if(strlen($childTableInfo["fieldNames"]) > 0)
				$fieldNames .= ",  ".$childTableInfo["fieldNames"];
		}
		
		$result = array();
		$result["joins"] = $joins;
		$result["fieldNames"] = $fieldNames;
		$result["whereExpressions"] = $whereExpressions;
		$result["orderBys"] = $orderBys;
		$result["groupBys"] = $groupBys;
		return $result;
	}
	function GetField($index)
	{
		$counter = 0;
		foreach($this->Fields as $f)
		{
			$field = $this->GetFieldForPHP4($f);
			if($counter == $index)
				return $field;
			else
				$counter++;
		}
		return null;
	}

	function Select($limit="", $offset="")
	{
		$query = $this->GetSelectQuery();
		$rs = $this->Connection->Execute($query, $limit, $offset);
		return $rs;
	}
	function SelectDetail($primaryKeyValues = "")
	{
		if($primaryKeyValues != "")
		{
			$i = 0;
			$pkNames = $this->GetPrimaryKeyNames();
			foreach($primaryKeyValues as $key=>$value)
			{
				$this->Fields[$pkNames[$i]]->Value = $value;
			}
		}
		$rs = $this->Connection->Execute($this->GetSelectDetailQuery());
		return $rs;
	}
	function Insert()
	{
		$query = $this->GetInsertQuery();
		$id = $this->Connection->Execute($query);
		if($id != "")
		{
			$pks = $this->GetPrimaryKeyNames();
			if(count($pks)>0)
			{
				$this->Fields[$pks[0]]->Value = $id;
			}
		}
		return $id;
	}
	function Update()
	{
		$whereExpression = $this->Where->GetExpression();
		if(strlen($whereExpression) == 0)
			$this->SetPrimaryKeyAsCondition();
		$this->Connection->Execute($this->GetUpdateQuery());
	}
	function Delete()
	{
		$whereExpression = $this->Where->GetExpression();
		if(strlen($whereExpression) == 0)
			$this->SetPrimaryKeyAsCondition();
		$this->Connection->Execute($this->GetDeleteQuery());
	}
}


class WhereParam
{
	var $Table;
	var $Fields;
	var $WhereExpression = array();

	function InitFields()
	{
		foreach($this->Table->Fields as $f)
		{
			$field = $this->Table->GetFieldForPHP4($f);
			$whereObject = new WhereObject();
			$whereObject->Field = $field;
			$whereObject->WhereParam = $this;
			$this->Fields[$field->FieldName] = $whereObject;
			eval("\$this->".$field->FieldName." = \$whereObject;");
		}
	}

	function GetExpression()
	{
		$exp = "";
		$prevWhereObject = "";
		foreach($this->WhereExpression as $whereObject)
		{
			if($prevWhereObject != "" && $prevWhereObject != "AND" && $prevWhereObject != "OR" && $whereObject != "AND" && $whereObject != "OR" && $prevWhereObject != "(" && $whereObject != ")")
				$exp .= " AND ";

			$exp .= $whereObject." ";
			$prevWhereObject = $whereObject;
		}
		if(strlen($exp) > 0)
			$exp = "".$exp;
		return $exp;
	}

	function OpAnd()
	{
		array_push($this->WhereExpression, "AND");
		return $this;
	}
	function OpOr()
	{
		array_push($this->WhereExpression, "OR");
		return $this;
	}
	function OpenParenthesis()
	{
		array_push($this->WhereExpression, "(");
		return $this;
	}
	function CloseParenthesis()
	{
		array_push($this->WhereExpression, ")");
		return $this;
	}

	function AddExpression($exp)
	{
		array_push($this->WhereExpression, $exp);
		return $this;
	}
	function RemoveExpression()
	{
		array_pop($this->WhereExpression);
		return $this;
	}

}


class WhereObject
{
	var $Field;
	var $WhereParam;

	function WhereObject()
	{
	}

	function Like($exp)
	{
		$this->WhereParam->AddExpression($this->Field->GetFullFieldName()." LIKE $exp");
		return $this;
	}
	function Equals($exp)
	{
		$this->WhereParam->AddExpression($this->Field->GetFullFieldName()." = $exp");
		return $this;
	}
	function GreaterThan($exp)
	{
		$this->WhereParam->AddExpression($this->Field->GetFullFieldName()." > $exp");
		return $this;
	}
	function GreaterOrEqual($exp)
	{
		$this->WhereParam->AddExpression($this->Field->GetFullFieldName()." >= $exp");
		return $this;
	}
	function LessThan($exp)
	{
		$this->WhereParam->AddExpression($this->Field->GetFullFieldName()." < $exp");
		return $this;
	}
	function LessThanOrEqual($exp)
	{
		$this->WhereParam->AddExpression($this->Field->GetFullFieldName()." <= $exp");
		return $this;
	}
	function OpAnd()
	{
		array_push($this->WhereParam->WhereExpression, "AND");
		return $this;
	}
	function OpOr()
	{
		array_push($this->WhereParam->WhereExpression, "OR");
		return $this;
	}
	function RemoveExpression()
	{
		$this->WhereParam->RemoveExpression();
		return $this;
	}
}


class DbFieldType
{
	function Int()
	{
		return 0;
	}
	function String()
	{
		return 1;
	}
	function Text()
	{
		return 2;
	}
	function DateTime()
	{
		return 3;
	}
}

class DbFieldTypeMapper
{
	function GetFieldType($dbType, $fieldType)
	{
		switch($fieldType)
		{
			case "varchar" :
			case "nvarchar" :
			case "char":
				return DbFieldType::String();
				break;
			case "int" :
			case "double" :
			case "decimal":
				return DbFieldType::Int();
				break;
			case "date":
			case "datetime":
				return DbFieldType::DateTime();
				break;
			default:
				return DbFieldType::Text(); 
		}
	}
}

class DbField
{
	var $FieldName;
	var $FieldAlias;
	var $SortAble;
	var $ViewDisplay;
	var $DetailDisplay;
	var $AddDisplay;
	var $EditDisplay;
	var $DeleteDisplay;
	var $Value;
	var $Label;
	var $Display;

	var $Width;
	var $Height;

	var $Type;
	var $MaxLength;
	var $AsPrimaryKey;
	var $AsAutoNumber;
	var $Table;
	var $Required = true;

	var $AggregateFunction = null;

	function DbField($fieldName="", $type="varchar", $maxLength)
	{
		$this->FieldName = $fieldName;
		$this->Type = $type;
		$this->MaxLength = $maxLength;
		$this->SortAble = true;
		$this->Display = true;
		$this->Value = null;
	}

	function SetRelationFromSchema()
	{
		$conn = $this->Table->Connection;
		$foreignKeys = $conn->GetMetaForeignKeys($this->Table->TableName);
		if(count($foreignKeys) > 0)
		{
			foreach($foreignKeys as $relatedTable=>$relatedFields)
			{
				$dbEntity = new DbEntity($relatedTable);
				$con = $this->Table->Connection;
				$dbEntity->SetConnection( $con->DbType, $con->DbServer, $con->DbName, $con->DbUsername, $con->DbPassword);
				foreach($relatedFields as $key=>$relatedField)
				{
					$field = explode("=", $relatedField);
					if(strtolower($field[0]) == strtolower($this->FieldName))
					{
						$this->Relate($dbEntity->Fields[ $field[1] ]);
					}
				}
			}
		}
	}

	function Relate($field, $fieldDisplay=null, $relationType="one-to-many")
	{
		$relation = new DbRelation($this, $field);
		if($fieldDisplay != null)
			$relation->FieldDisplay = $fieldDisplay;
		$this->Table->AddRelation($relation);
	}
	
	function Sum()
	{
		$aggregate = new AggregateParam();
		$aggregate->Field = $this;
		$aggregate->Type = "sum";
		$aggregate->FieldAlias = "sum_".$this->FieldName;
		$this->AggregateFunction = $aggregate;
	}
	function SumAs($fieldAlias)
	{
	}

	function Count()
	{
		$aggregate = new AggregateParam();
		$aggregate->Field = $this;
		$aggregate->Type = "count";
		$this->AggregateFunction = $aggregate;
	}
	function Avg()
	{
		$aggregate = new AggregateParam();
		$aggregate->Field = $this;
		$aggregate->Type = "avg";
		$this->AggregateFunction = $aggregate;
	}

	function &GetLookupField()
	{
		$rel = $this->Table->GetRelationByField($this);
		if($rel != "")
		{
			$childField = $rel->ChildField;
			return $childField;
		}
		else
		{
			$false = "false";
			return $false;
		}
	}

	function GetFullFieldName()
	{
		return $this->Table->TableName.".".$this->FieldName;
	}
	
	function GetFullFieldAlias()
	{
		return $this->Table->TableName.".".$this->FieldAlias;
	}

	function GetSelectFieldExp()
	{
		if($this->AggregateFunction != null)
		{
			$exp = $this->AggregateFunction->Type."(".$this->GetFullFieldName().") AS ".$this->AggregateFunction->FieldAlias;
		}
		else
		{
			if( strlen($this->FieldAlias) > 0 )
				return $this->GetFullFieldName()." AS ".$this->GetFullFieldAlias();
			else
				return $this->GetFullFieldName();
		}
	}

	function GetFieldValueExp()
	{
		$value = $this->GetValue();
		return $this->GetFullFieldName()." = ".$value;
	}

	function GetValue()
	{
		if($this->Type == DbFieldType::Int())
			return $this->Value;
		else
			return "'".$this->Value."'";		
	}


	function IsUpperCase($s)
	{
		if(ord($s) >= 65 && ord($s) <= 90)
			return true;
		else 
			return false;
	}
	function IsLowerCase($s)
	{
		if(ord($s) >= 97 && ord($s) <= 122)
			return true;
		else 
			return false;
	}
	function GetLabel()
	{
		if(strlen($this->Label) == 0)
		{
			$s = $this->FieldName;
			$stmp = array();
			$counter =0;
			for($i=0; $i<strlen($s); $i++)
			{
				$c = substr($s, $i, 1);
				$c2 = substr($s, $i + 1, 1);
				if( ($this->IsUpperCase($c2) && $this->IsLowerCase($c)) )
				{
					$stmp[$counter] = $i + 1;
					$counter++;
				}
			}
			
			$c = 0;
			for($i=0;$i<count($stmp);$i++)
			{

					$s = substr($s, 0, $stmp[$i] + $c)." ".substr($s, $stmp[$i] + $c); 
					$c ++;

			}
			$s = str_replace("_", "", $s);
			$s = ltrim($s);

		}
		else
			$s = $this->Label;
		return $s;
	}
}

class DbRelation
{
	var $ParentField;
	var $ChildField;
	var $FieldDisplay;
	var $Table;

	function DbRelation($ParentField, $ChildField)
	{
		$this->ParentField = $ParentField;
		$this->ChildField = $ChildField;
	}

	function GetRelationExp()
	{
		$fieldName = $this->ParentField->GetFullFieldName();
		$childFieldName = $this->ChildField->GetFullFieldName();
		$exp = "INNER JOIN ".$this->ChildField->Table->TableName." ON ".$fieldName." = ".$childFieldName;
		return $exp;
	}

	function GetRelationName()
	{
		return $this->ParentField->GetFullFieldName()."_".$this->ChildField->GetFullFieldName();
	}
	function GetRelationType()
	{
	}
}


?>