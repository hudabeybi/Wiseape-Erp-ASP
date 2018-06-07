<?php

//This is a component class 
class SoondaComponent extends Soonda
{
	var $limit = 20;
	var $offset = 0;
	var $orderBy = "";
	var $orderDirection = "";
	var $selectedPage = 1;
	var $dataOrder = "";
	var $componentName = "";
	var $layoutId = "";
	var $summaryId = "";
	var $graphType = "";
	var $condition = "";
	var $Task = "";

	
	function SoondaComponent()
	{
		$this->parameters = array();
	}

	function getComponentName()
	{
		return $this->componentName;
	}
	
	function addParam( $key, $value)
	{
		$this->parameters[$key] = $value;
	}


	//---------------------------------- RETRIEVE DATA --------------------------------------------------------------------------------------------------
	//OVERRIDEN, retrieve list data from datasource (defined by adapter)
	function getListData( $filter )
	{
				
		$logic = $this->getBO();
		$adapter = $this->getAdapter();
		$data = $logic->getAll( $adapter, $filter );
		return $data;
	}

	//OVERRIDEN  to retrieve the total data from database.
	function getTotalViewData( $filter )
	{
		$logic = $this->getBO();
		$adapter = $this->getAdapter();
		$data = $logic->getTotalData( $adapter, $filter );
		return $data;
	}

	//OVERRIDEN, retrieve detail data from database
	function getDetailData( $id )
	{
		$logic = $this->getBO();
		$adapter = $this->getAdapter();
		$data = $logic->getDetail( $adapter, $id );
		return $data;
	}

	function getLookupData( $component = "" )
	{
		$logic = $this->getBO( $component );
		$adapter = $this->getAdapter( $component );
		$lookupData = $logic->getLookupData( $adapter );
		return $lookupData;
	}

	function getChildLookupData()
	{
		$logic = $this->getChildBO();
		$adapter = $this->getChildAdapter();
		$lookupData = $logic->getChildLookupData( $adapter );
		return $lookupData;
	}

	//OVERRIDEN, retrieve detail data from database
	function getMultipleDeleteData( $filter )
	{
		return $filter->selectedItems;
	}

	//OVERRIDEN, retrieve data from POST 
	function getAddPostData( $post, $component = "" )
	{
		//$o = $this->createObjectFromPost(  $post );
		$page = $this->getUIAddPage( $component );
		$o = $this->getDataModel( $component );
		$o = $page->createAddObjectFromPost( $post, $o );
		$o = $this->setAddChildObjectsFromPost( $o );
		return $o;
	}

	//OVERRIDEN, retrieve data from POST 
	function getEditPostData( $post, $component = "" )
	{
		//$o = $this->createObjectFromPost(  $post );
		$page = $this->getUIEditPage($component);
		$o = $this->getDataModel($component);
		$o = $page->createEditObjectFromPost( $post, $o );
		$o = $this->setEditChildObjectsFromPost( $o );
		return $o;
	}

	//OVERRIDEN, validate data before save add
	function validateAddData( $data, $component = "" )
	{
		$logic = $this->getBO($component);
		$adapter = $this->getAdapter($component);
		$result = $logic->validateAdd( $adapter, $data );
		return $result;
	}

	//OVERRIDEN, validate data before save edit
	function validateEditData( $data, $component = "" )
	{
		$logic = $this->getBO($component);
		$adapter = $this->getAdapter($component);
		$result = $logic->validateEdit( $adapter, $data );
		return $result;
	}

	//OVERRIDEN, validate data before save edit
	function validateDeleteData( $id, $component = "" )
	{
		$logic = $this->getBO($component);
		$adapter = $this->getAdapter($component);
		$lookupData = $logic->validateDelete( $adapter, $data );
		return $data;
	}

	//OVERRIDEN, validate data before save edit
	function validateDeleteMultipleData( $data, $component = "" )
	{
		$logic = $this->getBO($component);
		$adapter = $this->getAdapter($component);
		$result = $logic->validateDeleteMultipleData( $adapter, $data );
		return $result;
	}

	//OVERRIDEN, save added data
	function saveAdd( $data, $component = "" )
	{
		$logic = $this->getBO($component);
		$adapter = $this->getAdapter($component);
		$result = $logic->add( $adapter, $data );
		return $result;
	}

	//OVERRIDEN, save edit data
	function saveEdit( $data, $component = "" )
	{
		$logic = $this->getBO($component);
		$adapter = $this->getAdapter($component);
		$result = $logic->update( $adapter, $data );
		return $result;	
	}

	//OVERRIDEN, save delete data
	function saveDelete( $id, $component = "" )
	{
		$logic = $this->getBO($component);
		$adapter = $this->getAdapter($component);
		$o = $logic->getDetail( $adapter, $id );
		$result = $logic->delete( $adapter, $o );
		return $result;
	}

	//OVERRIDEN, save delete multiple data
	function saveDeleteMultiple( $data, $component = "" )
	{
		$logic = $this->getBO($component);
		$adapter = $this->getAdapter($component);
		$result = null;
		
		foreach( $data as $key => $id)
		{
			$o = $logic->getDetail( $adapter, $id);
			$result = $logic->delete( $adapter, $o);
		}
		return $result;
	}

	

/*=================================================================================================*/

	function getConditionQueryFromParam()
	{
		$condition = "";
		foreach( $this->parameters as $key => $fieldValue)
		{
			if( strpos( $fieldValue, "no_db:") === false)
			{
				$op = " = ";
				if( substr($fieldValue,0,1) == "'")
					$op = " LIKE ";
				$condition .= $key." $op ".$fieldValue." AND ";
			}
		}
		//echo $condition;
		if( strlen($condition) > 0)
			$condition = substr( $condition, 0, strlen($condition) - 4);
		return $condition;
	}




	function getDefaultPageViewData( $moduleName, $data, $offset, $limit, $totalData, $condition, $layoutId, $summaryId, $graphType )
	{
		$pageViewData = new pageViewData();
		$adapter = new FieldGroupingAdapter();
		$adapter->connection = $this->dbConnection;
		$layoutGroups = $adapter->getAll(  "ModuleName LIKE '$moduleName'");
		if($offset == "")
			$offset = 0;
		if($limit != "" && $limit != 0 && $limit != -1)
			$pageViewData->SelectedPage = floor($offset / $limit) + 1 ;
		else
		{
			$limit = "";
			$pageViewData->SelectedPage = 1;
		}

		include_once("components/com_SummaryReport/data/SummaryReportAdapter.php");

		$adapter = new SummaryReportAdapter();
		$adapter->connection = $this->dbConnection;
		$summaryReports = $adapter->getAll( "ModuleName LIKE '$moduleName'");

		$pageViewData->MaxNumberDisplay = $limit;
		$pageViewData->TotalData = $totalData;
		$pageViewData->condition = $condition;
		$pageViewData->tableData = $data;
		$pageViewData->layoutId = $layoutId;
		$pageViewData->summaryId = $summaryId;
		$pageViewData->graphType = $graphType;
		$pageViewData->layoutGroupData = $layoutGroups;
		$pageViewData->summaryReportData = $summaryReports;
		return $pageViewData;
	}

	function setViewParamFromPost()
	{
		//echo "error ".$this->session["layoutId"] ;

		if( isset( $this->post["layoutId"]) )
			$this->layoutId = $this->post["layoutId"];
		else
		{
			if( isset( $this->session["layoutId"] ))
				$this->layoutId = $this->session["layoutId"];
		}
		$this->session["layoutId"] = $this->layoutId;


		if( isset( $this->post["summaryId"]) )
			$this->summaryId = $this->post["summaryId"];
		else
		{
			if( isset( $this->session["summaryId"] ))
				$this->summaryId = $this->session["summaryId"];
		}
		$this->session["summaryId"] = $this->summaryId;

		if( isset( $this->post["graphType"]) )
			$this->graphType = $this->post["graphType"];
		else
		{
			if( isset( $this->session["graphType"] ))
				$this->graphType = $this->session["graphType"];
		}
		$this->session["graphType"] = $this->graphType;

		if( isset( $this->post["limit"]) )
			$this->limit = $this->post["limit"];
		else
		{
			if( isset( $this->session["limit"] ))
				$this->limit = $this->session["limit"];
		}
		$this->session["limit"] = $this->limit;
		if($this->limit == -1)
			$this->limit = "";

		if( isset( $this->post["page"]) )
			$pg = $this->post["page"];
		else
		{
			if( isset( $this->session["page"] ))
				$pg = $this->session["page"] ;
			else
				$pg = $this->selectedPage;
		}
		$this->session["page"] = $pg;

		$this->selectedPage = $pg;
		$dataStart = ($pg - 1) * $this->limit;
		$this->offset = $dataStart;
		
		if( isset( $this->post["sortby"]) )
			$this->orderBy = SoondaUtil::SooDecrypt($this->post["sortby"]);
		else
		{
			if( isset($this->session["sortby"]))
				$this->orderBy = $this->session["sortby"];
		}
		$this->session["sortby"] = $this->orderBy;

		//echo "error ".$this->post["sortby"]." == {".$this->orderBy."}";
		if( isset( $this->post["sortdir"]) )
			$this->orderDirection = $this->post["sortdir"];
		else
		{
			if( isset($this->session["sortdir"]))
				$this->orderDirection = $this->session["sortdir"];
		}
		$this->session["sortdir"] = $this->orderDirection;
		$this->dataOrder = $this->orderBy." ".$this->orderDirection;

		if( isset($this->post["condition"]) && $this->post["condition"] != "" )
			$this->condition = SoondaUtil::SooDecrypt($this->post["condition"]);
		else
		{
			if( isset($this->session["condition"]))
				$this->condition = $this->session["condition"];
		}
		$this->session["condition"] = $this->condition;

		//echo "error ".$this->condition;

		if( isset( $this->post["reset"] ) && $this->post["reset"] == "1" )
		{
			unset($this->session["layoutId"]);
			unset($this->session["condition"]);
			unset($this->session["summaryId"]);
			unset($this->session["sortdir"]);
			unset($this->session["sortby"]);
			unset($this->session["page"]);
			//unset($this->session["limit"]);
			unset($this->session["graphType"]);

			$this->layoutId = "";
			$this->condition = "";
			$this->summaryId = "";
			$this->orderBy = "";
			$this->orderDirection = "";
			$this->dataOrder = "";
			$this->selectedPage = 0;
			$this->offset = 0;
			//$this->limit = "";
		}
	}


	function run( )
	{
		$task = $this->getTask("view");
		$tableName = "";
		$formName = "";

		if( isset( $this->post["detailtable"] ))
			$tblName = $this->post["detailtable"];

		if( isset( $this->post["formname"] ))
			$formName = $this->post["formname"];

								
		$html = "";
		$this->setViewParamFromPost();
		$order = $this->orderBy." ".$this->orderDirection;
		if($this->getComponentName() != "com_FieldGrouping" && $this->getComponentName() != "com_SummaryReport")
		{
			switch( $task )
			{
				case "addFieldGrouping":
					$sContent = $this->addFieldGroupingPage();
					$sContent = "encoded:".SoondaUtil::encodeHTML( $sContent );
					$w = isset($this->post["width"]) ? $this->post["width"] : 400;
					$h = isset($this->post["width"]) ? $this->post["height"] : 400;
					$html = "<:nochange:><script> SooDialog.showWindow('".$sContent."'); </script>";
				break;
				case "saveAddFieldGrouping":
					$result = $this->saveAddFieldGrouping();
					if($result[0] == true)
						$html = "<:nochange:><script> Soonda.loadModuleByFilter('{SOO:MODULENAME}', 'view{SOO:MODULENAME}', 'cmbTotalDisplay', 'cmbPage', 'cmbLayout', 'cmbSummary', 'cmbGraphType', 'txtCondition', this, DefaultAnimatorContent, '{SOO:COMPONENTNAME}'); Soonda.showAlert('The new data is saved! Thank you.'); </script>";
					else
					{
						$error = $result[1];
						$html = "<:nochange:><script>  Soonda.displayInvalidInput( '$formName', 'lblInvalid".$this->Enc($result[2])."', '$error');  </script>";
					}
				break;
				case "deleteFieldGrouping":
					$this->deleteFieldGrouping();
					$html = "<:nochange:><script> Soonda.loadModuleByFilter('{SOO:MODULENAME}', 'view{SOO:MODULENAME}', 'cmbTotalDisplay', 'cmbPage', 'cmbLayout', 'cmbGraphType', 'txtCondition', this, DefaultAnimatorContent, '{SOO:COMPONENTNAME}')</script>";
					
				break;	
				case "addSummaryReport":
					$sContent = $this->addSummaryReportPage();
					$sContent = "encoded:".SoondaUtil::encodeHTML( $sContent );
					$w = isset($this->post["width"]) ? $this->post["width"] : 400;
					$h = isset($this->post["width"]) ? $this->post["height"] : 400;
					$html = "<:nochange:><script> SooDialog.showWindow('".$sContent."'); </script>";
				break;
				case "saveAddSummaryReport":
					$result = $this->saveAddSummaryReport();
					if($result[0] == true)
						$html = "<:nochange:><script> Soonda.loadModuleByFilter('{SOO:MODULENAME}', '', 'cmbTotalDisplay', 'cmbPage', 'cmbLayout', 'cmbSummary', 'cmbGraphType', 'txtCondition', this, DefaultAnimatorContent, '{SOO:COMPONENTNAME}'); Soonda.showAlert('The new data is saved! Thank you.'); </script>";
					else
					{
						$error = $result[1];
						$html = "<:nochange:><script>  Soonda.displayInvalidInput( '$formName', 'lblInvalid".$this->Enc($result[2])."', '$error');  </script>";
					}
				break;
				case "deleteSummaryReport":
					$this->deleteSummaryReport();
					$html = "<:nochange:><script> Soonda.loadModuleByFilter('{SOO:MODULENAME}', '', 'cmbTotalDisplay', 'cmbPage', 'cmbLayout', 'cmbSummary', 'cmbGraphType', 'txtCondition', this, DefaultAnimatorContent, '{SOO:COMPONENTNAME}')</script>";
					
				break;	
				case "viewSummary":
					$html = $this->viewSummaryReport();		
					//echo "error $html";
				break;	
			}
		}

		
		
		if( $this->getParam("LinkedModule") != null )
			$html = str_replace("{SOO:MODULENAME}", $this->post["LinkedModule"], $html);
		else
			$html = str_replace("{SOO:MODULENAME}", $this->get["module"], $html);
		//echo "error $html";
		


		return $html;
	}


	function addFieldGroupingPage()
	{
		$component = "com_FieldGrouping";
		include_once("components/".$component."/$component.php");
		
		$comp = new $component();
		$comp = $this->initGlobalParam( $comp );
		$comp->get["taskcom_FieldGrouping"] = "addFieldGrouping"; 
		
		$html = $comp->run();
		return $html;
	}

	function saveAddFieldGrouping()
	{
		$component = "com_FieldGrouping";
		include_once("components/".$component."/$component.php");
		
		$comp = new $component();
		$comp = $this->initGlobalParam( $comp );
		$result = $comp->saveAddFieldGrouping();
		
		return $result;
	}

	function deleteFieldGrouping()
	{
		$component = "com_FieldGrouping";
		include_once("components/".$component."/data/FieldGroupingAdapter.php");

		$id = $this->post["idgroup"];
		$adapter = new FieldGroupingAdapter();
		$adapter->connection = $this->dbConnection;
		$adapter->delete(  $id );
	}

	function addSummaryReportPage()
	{
		$component = "com_SummaryReport";
		include_once("components/".$component."/$component.php");
		
		$comp = new $component();
		$comp = $this->initGlobalParam( $comp );
		$comp->get["taskcom_SummaryReport"] = "addSummaryReport"; 
		
		$html = $comp->run();
		return $html;
	}

	function saveAddSummaryReport()
	{
		$component = "com_SummaryReport";
		include_once("components/".$component."/$component.php");
		
		$comp = new $component();
		$comp = $this->initGlobalParam( $comp );
		$result = $comp->saveAddSummaryReport();
		
		return $result;
	}

	function deleteSummaryReport()
	{
		$component = "com_SummaryReport";
		include_once("components/".$component."/data/SummaryReportAdapter.php");

		$id = $this->summaryId;
		$adapter = new SummaryReportAdapter();
		$adapter->connection = $this->dbConnection;
		$adapter->delete($id );
	}

	function viewSummaryReport()
	{
		$html = "";
		$summaryId = $this->post["summaryId"];
		$graphType = $this->post["graphType"];

		if($summaryId != "0" && $summaryId != "" && $graphType != "0" && $graphType != "")
		{
			$component = "com_SummaryReport";
			include_once("components/".$component."/data/SummaryReportAdapter.php");

			$adapter = new SummaryReportAdapter();
			$adapter->connection = $this->dbConnection;

			$oSummary = $adapter->getDetail( $summaryId );
			$fields = "";
			$groups = "";
			$aggregate = "";
			$sfield1 = explode( ":", $oSummary->SummaryXAxisFields );
			$sfield2 = explode( ":", $oSummary->SummaryYAxisField );

			$sfieldResult = explode( ":", $oSummary->SummaryResultFields );
			$faggregate = $sfieldResult[0];
			$fieldResult = $sfieldResult[1];

			if($faggregate == "COUNT")
				$aggregate = $faggregate."(*) AS ".$faggregate."_OF_".$fieldResult;
			else
				$aggregate = $faggregate."(".$fieldResult.") AS ".$faggregate."_OF_".$fieldResult;

			$agregateField = $faggregate."_OF_".$fieldResult;

			$module = $oSummary->ModuleName;
			$comp = $this->getComponentName();
			$module = str_replace( "com_", "", $comp);

			include_once("components/".$comp."/data/".$module."Adapter.php");
			$adapter = $module."Adapter";

			$condition = "";
			if(isset($this->post["condition"]) && $this->post["condition"] != "")
				$condition = SoondaUtil::SooDecrypt($this->post["condition"]);

			$orderBy = $this->orderBy;

			$order = $this->dataOrder;
			$offset = $this->offset;
			$limit = $this->limit;
			$layoutId = $this->layoutId;
			
			$adp = new $adapter();
			$query = $adp->getSelectQuery();
			//eval("\$query = ".$adapter."::getSelectQuery();");
			if( str_replace(" ", "", $condition) != "")
				$query .= " WHERE ".$condition;
			//if( str_replace(" ", "", $orderBy) != "")
			//	$query .= " ORDER BY ".$orderBy;

			$fields .= ($sfield1[0] == "true") ? $sfield1[1]."," : "";
			$fields .= ($sfield2[0] == "true") ? $sfield2[1] : "";
			$groups .= ($sfield1[0] == "true") ? "GROUP BY ".$sfield1[1]."," : "";
			$groups .= ($sfield2[0] == "true") ? $sfield2[1] : "";

			if( substr( $fields, strlen($fields) - 1, 1) == ",")
				$fields = substr( $fields, 0, strlen($fields) - 1);

			if( substr( $groups, strlen($groups) - 1, 1) == ",")
				$groups = substr( $groups, 0, strlen($groups) - 1);


			$query = "select $fields, $aggregate from ($query) as T $groups";
			
			//Retrieve the Summary data
			$rs = $this->dbConnection->Execute( $query );
			$rs2 = $this->dbConnection->Execute( $query );
		
			$singleOrMulti = "";
			$xml = "";			
			$usedGraph = false;
			if( count( explode(",", $fields ) ) == 1)
			{
				$singleOrMulti = "Single Series Data";
				$usedGraph = $this->getGraphType("single", $this->graphType );
				$xml = $this->generateSingleSeriesXml( $oSummary->SummaryName, $oSummary->SummaryDesc, $fields, $agregateField, $query, $rs);
			}
			else
			{
				$singleOrMulti = "Multi Series Data";
				$usedGraph = $this->getGraphType("multi", $this->graphType );
				$xml = $this->generateMultiSeriesXml( $oSummary->SummaryName, $oSummary->SummaryDesc, $fields, $agregateField, $query, $rs, $rs2);
			}


			$xml = str_replace("\r\n", "", $xml);
			$xml = str_replace("\n", "", $xml);
			$xml = str_replace("\t", "", $xml);
			
			if($usedGraph != false && $usedGraph != "")
			{
				$html = "<:nochange:><script>
									var myChart = new FusionCharts(\"libraries/js/FusionCharts/".$usedGraph."\", \"myChartId\", \"780\", \"480\");
									myChart.setDataXML(\"".$xml."\");
									myChart.render(\"summaryGraphContent\");
									Soonda.selectTab('summaryTab', 'viewTab', 'divSummary', 'divTableData');
								</script>";
			}
			else
			{
				//echo "error here $usedGraph";
				$html = "<:nochange:><script> alert(\"Can not diplay data. The Chart Type doesn't support $singleOrMulti\"); </script>";
			}

		}
		else
			$html = "<:nochange:>";

		return $html;
	}

	function getGraphType( $singleOrMulti = "single", $graphType )
	{
		$graphTypes = explode(",", $graphType);
		foreach( $graphTypes as $key => $typeInfo )
		{
			$typeInfoArr = explode( ":", $typeInfo );
			if( str_replace(" ", "", strtolower($typeInfoArr[0])) == str_replace(" ", "", strtolower($singleOrMulti) ) )
			{
				return $typeInfoArr[1];
			}
		}

		return false;
	}

	function generateSingleSeriesXml( $title, $subtitle, $fields, $fiedlNames, $agregateField, $aggregateNames, $query, $rs)
	{
		$xml = "";
		$template = SoondaUtil::getContent($this->config["applib_path"]."/SoondaPHP/Graph.Singleseries.XML.Template.xml");
		$datarepeater = SoondaUtil::getStringBetween( $template, "<soo.datarepeater:datafield1>", "</soo.datarepeater:datafield1>" );
		$rs->MoveFirst();
		$i = 0;
		$sData = "";
		while(!$rs->EOF)
		{
			$stmp = $datarepeater;
			$stmp = str_replace( "{SOO.DATA:fieldvalue}", $rs->Fields($fields), $stmp);
			$stmp = str_replace( "{SOO.DATA:aggregatevalue}", $rs->Fields($agregateField), $stmp);
			$stmp = str_replace( "{SOO.DATA:color}", SoondaUtil::getColorCatalog($i), $stmp);
			$sData .= $stmp;
			$rs->MoveNext();
			$i++;
		}

		$xml = str_replace( "<soo.datarepeater:datafield1>".$datarepeater."</soo.datarepeater:datafield1>", $sData, $template);
		$xml = str_replace( "{SOO.DATA:title}", $title, $xml );
		$xml = str_replace( "{SOO.DATA:subtitle}", $subtitle, $xml );
		$xml = str_replace( "{SOO.DATA:xaxisname}", $fiedlNames, $xml );
		$xml = str_replace( "{SOO.DATA:yaxisname}", $aggregateNames, $xml );
		return $xml;
	}

	function generateMultiSeriesXml( $title, $subtitle, $fields, $fiedlNames, $agregateField, $aggregateNames, $query, $rs, $rs2)
	{
		$arrFields = explode(",", $fields );
		$template = SoondaUtil::getContent($this->config["applib_path"]."/SoondaPHP/Graph.Multiseries.XML.Template.xml");

		$res = $this->generateField1Xml($template, $arrFields[0], $agregateField, $query, $rs);
		$xml = $res[0];
		$xml = $this->generateField2Xml($xml, $arrFields[0], $res[1], $arrFields[1], $agregateField, $query, $rs, $rs2);
		$xml = str_replace( "{SOO.DATA:title}", $title, $xml );
		$xml = str_replace( "{SOO.DATA:subtitle}", $subtitle, $xml );
		$xml = str_replace( "{SOO.DATA:xaxisname}", $fiedlNames, $xml );
		$xml = str_replace( "{SOO.DATA:yaxisname}", $aggregateNames, $xml );
		return $xml;
	}

	function generateField1Xml( $template, $field1, $agregateField, $query, $rs)
	{
		$xml = "";
		$datarepeater = SoondaUtil::getStringBetween( $template, "<soo.datarepeater:datafield1>", "</soo.datarepeater:datafield1>" );
		$rs->MoveFirst();
		$i = 0;
		$sData = "";
		$arrSavedValues = array();
		while(!$rs->EOF)
		{
			$stmp = $datarepeater;
			$val = $rs->Fields( $field1 );

			if( in_array( $val, $arrSavedValues ) == false )
			{
				$stmp = str_replace( "{SOO.DATA:shortvaluefield1}", $val, $stmp);
				$stmp = str_replace( "{SOO.DATA:valuefield1}", $val, $stmp);
				$sData .= $stmp;
				array_push( $arrSavedValues, $val);
			}
			$rs->MoveNext();
			$i++;
		}

		$xml = str_replace( "<soo.datarepeater:datafield1>".$datarepeater."</soo.datarepeater:datafield1>", $sData, $template);
		return array($xml, $arrSavedValues);
	}

	function generateField2Xml( $template, $field1, $field1Values, $field2, $agregateField, $query, $rs, $rsClone)
	{
		$xml = "";
		$datarepeater = SoondaUtil::getStringBetween( $template, "<soo.datarepeater:datafield2>", "</soo.datarepeater:datafield2>" );
		$rs->MoveFirst();
		$i = 0;
		$sData = "";
		$arrSavedValues = array();
		while(!$rs->EOF)
		{
			$stmp = $datarepeater;
			$val = $rs->Fields( $field2 );

			if( in_array( $val, $arrSavedValues ) == false )
			{
				$stmp = str_replace( "{SOO.DATA:shortvaluefield2}", $val, $stmp);
				$stmp = str_replace( "{SOO.DATA:valuefield1}", $val, $stmp);
				$stmp = str_replace( "{SOO.DATA:color}", SoondaUtil::getColorCatalog($i), $stmp);
				$stmp = $this->generateFieldAggregateXml (  $stmp, $field1, $field1Values, $field2, $val, $agregateField, $query, $rsClone);
				$sData .= $stmp;
				array_push( $arrSavedValues, $val);
				$i++;
			}
			$rs->MoveNext();
			
		}

		$xml = str_replace( "<soo.datarepeater:datafield2>".$datarepeater."</soo.datarepeater:datafield2>", $sData, $template);
		return $xml;
	}

	function generateFieldAggregateXml (  $template, $field1, $field1Values, $field2, $field2Value, $agregateField, $query, $rs)
	{
		$xml = "";
		$datarepeater = SoondaUtil::getStringBetween( $template, "<soo.datarepeater:aggregatevalue>", "</soo.datarepeater:aggregatevalue>" );
		$rs->MoveFirst();
		$i = 0;
		$sData = "";
		$arrSavedValues = array();
		
		foreach($field1Values as $key => $value)
		{
			$rs->MoveFirst();
			$exists = false;
			while(!$rs->EOF)
			{
				$stmp = $datarepeater;
				$val = $rs->Fields( $agregateField );

				if( $rs->Fields($field1) == $value && $rs->Fields($field2) == $field2Value )
				{
					$stmp = str_replace( "{SOO.DATA:aggregatevalue}", $val, $stmp);					
					$sData .= $stmp;
					$exists = true;
				}
				
				array_push( $arrSavedValues, $val);
				$rs->MoveNext();
				$i++;
			}
			if( $exists == false )
			{
				$stmp = $datarepeater;
				$stmp = str_replace( "{SOO.DATA:aggregatevalue}", 0, $stmp);					
				$sData .= $stmp;
			}
		}

		$xml = str_replace( "<soo.datarepeater:aggregatevalue>".$datarepeater."</soo.datarepeater:aggregatevalue>", $sData, $template);
		return $xml;
	}

	function showValidationResult( $result, $msg = "The Data has been saved. Thank you.", $isSaved = true, $moduleName = "", $childModuleName = "", $isEdit = false )
	{
		$html = "";
		$tblName = $this->post["detailtable"];
		$formName = $this->post["formname"];
		if($result[0] == true && $isSaved)
		{
			$html = "<:nochange:><script> Soonda.showAlert('$msg'); </script>";
		}
		else if($result[0] == true && $isSaved == false && $isEdit == false)
		{
			
			$html = "<:nochange:><script> Soonda.addDetailItem('$formName', '$tblName', '$moduleName', '$childModuleName'); </script>";
		}
		else if($result[0] == true && $isSaved == false && $isEdit == true)
		{
			$html = "<:nochange:><script> Soonda.editDetailItem('$formName', '$tblName', '$moduleName', '$childModuleName',".$this->post["ridx"]."); </script>";
		}
		else
		{
			$error = $result[1];
			$html = "<:nochange:><script>  Soonda.displayInvalidInput( '$formName', 'lblInvalid".$this->Enc($result[2])."', '$error'); Soonda.alert('$error'); </script>";		
		}
		return $html;
	}

	function showDialogAddEditPage( $sContent, $callback = "", $preScript = "" )
	{
		

		$sContent = str_replace("{SOO:TEMPLATEPATH}",  $this->config["template_path"], $sContent);
		$sContent = str_replace("{SOO:UIPATH}",  $this->config["ui_path"], $sContent);
		$sContent = str_replace("{SOO:APPLIBPATH}",  $this->config["applib_path"], $sContent);
		$sContent = str_replace("{SOO:SHAREDLIBPATH}",  $this->config["sharedlib_path"], $sContent);
		$sContent = str_replace("{SOO:SHAREDRESOURCEPATH}",  $this->config["sharedresource_path"], $sContent);

		$dirname = $this->config["template_path"];
		//echo "php_error";
		//var_dump($this->pageFile);
		$tmplPath = dirname($dirname."/". $this->pageFile);
		$sContent = str_replace("{SOO:USEDTEMPLATEPATH}",  $tmplPath, $sContent);

		$sContent = "encoded:".SoondaUtil::encodeHTML( $sContent );
		$w = isset($this->post["width"]) ? $this->post["width"] : 400;
		$h = isset($this->post["width"]) ? $this->post["height"] : 400;

		if($callback != "")
			$callback = ",$callback";
		$html = "<:nochange:><script> $preScript; SooDialog.showWindow('".$sContent."', $w, $h $callback ); </script>";
		return $html;
	}

	function setModuleName($html)
	{
		if($this->getParam("COMPID") != "")
			$this->UniqueId = $this->getParam("COMPID");

		$id = $this->UniqueId;
		if($this->getParam("LINKEDID") != "")
			$id = $this->getParam("LINKEDID");

		//echo "Linked Module ".$this->getParam("LinkedModule")."---".$this->UniqueId."<br>";

		$op = "{";
		$end = "}";
		$dot = ":";

		$encoded = false;
		if(strpos( $html, "encoded:") !== false )
		{
			$encoded = true;
			$op = SoondaUtil::encodeHTML("{");
			$end = SoondaUtil::encodeHTML("}");
			$dot = SoondaUtil::encodeHTML(":");
		}

		//if( $this->getParam("LinkedModule") != null )
		//	$html = str_replace($op."SOO".$dot."MODULENAME".$end, $this->getParam("LinkedModule"), $html);
		//else if( isset($this->get["LinkedModule"]) )
		//	$html = str_replace($op."SOO".$dot."MODULENAME".$end, $this->get["LinkedModule"], $html);
		//else
		$html = str_replace($op."SOO".$dot."MODULENAME".$end, $this->get["module"], $html);

		if( $this->getParam("LinkedModule") != null )
			$html = str_replace($op."SOO".$dot."LINKEDMODULENAME".$end, $this->getParam("LinkedModule"), $html);
		else if( isset($this->get["LinkedModule"]) )
			$html = str_replace($op."SOO".$dot."LINKEDMODULENAME".$end, $this->get["LinkedModule"], $html);
		else
			$html = str_replace($op."SOO".$dot."LINKEDMODULENAME".$end, $this->get["module"], $html);

		$html = str_replace($op."SOO".$dot."CURRENTMODULENAME".$end, $this->get["module"], $html);
		$html = str_replace($op."SOO".$dot."CurrentModuleName".$end, $this->get["module"], $html);

		$sc = $this->getParam("script");

		if($sc != "")
			$html .= "<script> $sc; </script>";

		if( $this->getParam("Template") != null)
			$html = str_replace( $op."SOO".$dot."Template".$end, $this->getParam("Template"), $html);
		else if(isset( $this->get["Template"] ))
			$html = str_replace( $op."SOO".$dot."Template".$end, $this->get["Template"], $html);
		else if( isset($this->config["application"]["template"] ))
			$html = str_replace( $op."SOO".$dot."Template".$end, $this->config["application"]["template"] , $html);

		if( $this->getParam("Template") != null)
			$html = str_replace( $op."SOO".$dot."TEMPLATE".$end, $this->getParam("Template"), $html);
		else if(isset( $this->get["Template"] ))
			$html = str_replace( $op."SOO".$dot."TEMPLATE".$end, $this->get["Template"], $html);
		else if( isset($this->config["application"]["template"] ))
			$html = str_replace( $op."SOO".$dot."TEMPLATE".$end, $this->config["application"]["template"] , $html);

		if(isset( $this->get["Template"] ))
			$html = str_replace($op."SOO".$dot."CURRENTTEMPLATE".$end, $this->get["Template"], $html);
		else if( isset($this->config["application"]["template"] ))
			$html = str_replace($op."SOO".$dot."CURRENTTEMPLATE".$end, $this->config["application"]["template"], $html);

		if(isset( $this->get["Template"] ))
			$html = str_replace($op."SOO".$dot."CurrentTemplate".$end, $this->get["Template"], $html);
		else if( isset($this->config["application"]["template"] ))
			$html = str_replace($op."SOO".$dot."CurrentTemplate".$end, $this->config["application"]["template"], $html);

		$otherParam = "";
		if( $this->getParam("OtherParam") != null)
			$otherParam = $this->getParam("OtherParam");
		else if(isset( $this->get["OtherParam"] ))
			$otherParam = $this->get["OtherParam"];
		$otherParam = str_replace("[eq]", "=", $otherParam);
		$otherParam = str_replace("[quote]", "'", $otherParam);

		$templateChange = "";
		if( $this->getParam("TemplateChange") != null)
			$templateChange = $this->getParam("TemplateChange");
		else if(isset( $this->get["TemplateChange"] ))
			$templateChange = $this->get["TemplateChange"];
		$templateChange = str_replace("[eq]", "=", $templateChange);
		$templateChange = str_replace("[quote]", "'", $templateChange);

		if($otherParam != "")
			$otherParam = "&".$otherParam;

		if($templateChange != "")
			$templateChange = "&TemplateChange=".$templateChange;
		else
			$templateChange = "&TemplateChange=1";


		$html = str_replace( $op."SOO".$dot."OtherParam".$end, $otherParam, $html);
		$html = str_replace( $op."SOO".$dot."TemplateChange".$end, $templateChange, $html);
		$html = str_replace($op."SOO".$dot."UNIQUEID".$end, $this->UniqueId, $html);
		$html = str_replace($op."SOO".$dot."UniqueId".$end, $this->UniqueId, $html);
		$html = str_replace($op."SOO".$dot."LINKEDID".$end, $id, $html);
		$html = str_replace($op."SOO".$dot."LinkedId".$end, $id, $html);
		$html = str_replace($op."SOO".$dot."linkedid".$end, $id, $html);
		$html = str_replace($op."SOO".$dot."COMPONENTNAME".$end, $this->getComponentName(), $html);
		$html = str_replace($op."SOO".$dot."URLQUERY".$end, SoondaUtil::getUrlQuery($this->get), $html);

		$html = str_replace($op."SOO".$dot."UIPATH".$end, $this->config["ui_path"], $html);
		$html = str_replace($op."SOO".$dot."LOGICPATH".$end, $this->config["logic_path"], $html);
		$html = str_replace($op."SOO".$dot."COMPONENTPATH".$end, $this->config["component_path"], $html);
		$tplatepath = dirname( $this->config["template_path"]."/".$this->pageFile );
		$html = str_replace($op."SOO".$dot."USEDTEMPLATEPATH".$end, $tplatepath, $html);
		//echo "error ".$op."SOO".$dot."COMPONENTNAME".$end;
		return $html;
	}

	function getParamInfo()
	{
		return "LinkedModule: Module that will be opened when link is clicked.<br>COMPID: Id for this component, the default is assigned by system.<br>LINKEDID: component unique id which is linked by this component.<br>TemplateChange: Is template should be changed or not, the default is 0<br>OtherParam: Other Query Parameters";
	}

	function getSQLConditionFromParameter( $paramName = "Filter")
	{
		$filter = $this->getParam( $paramName );
		if($filter == "")
			if(isset( $this->get["Filter"]))
				$filter = $this->get["Filter"];
		//echo "php_error ".$filter;
		
		$filter = str_replace("[dbeq]", "=", $filter);
		$filter = str_replace("[dblike]", "LIKE", $filter);
		$filter = str_replace("[dbnotlike]", "NOT LIKE", $filter);
		$filter = str_replace("[s]", "%20", str_replace("[eq]", "=", str_replace("[quote]", "'", $filter) ) );
		$filter = str_replace("\\'", "'", $filter );
		$filter = str_replace("DBSEL", "SELECT", $filter);
		if($filter != "")
		{
			$matches = SoondaUtil::getAllStringBetween( $filter, "[get]", "[/get]" );
			$resCode = "";
			if( count( $matches) > 0)
			{
				foreach($matches as $key => $item )
				{
					$code = $item["var"];
					$resCode = $this->get[$code];
					$resCode = str_replace(" ", "%20", $resCode);
					$filter = str_replace("[get]".$code."[/get]", $resCode, $filter);
				}
			}

			$matches = SoondaUtil::getAllStringBetween( $filter, "[session]", "[/session]" );
			$resCode = "";
			if( count( $matches) > 0)
			{
				foreach($matches as $key => $item )
				{
					$code = $item["var"];
					$resCode = $this->session[$code];
					$resCode = str_replace(" ", "%20", $resCode);
					$filter = str_replace("[session]".$code."[/session]", $resCode, $filter);
				}
			}
			
			$filter = str_replace("[persen]", "%", $filter);
		}

		return $filter;
	}

	function getTask( $default = "")
	{
		$task = "";

		if($this->getParam("COMPID") != "")
			$this->UniqueId = $this->getParam("COMPID");

		//echo isset( $this->post["task".$this->getComponentName()."_".$this->UniqueId] ) ."+++".$this->get["task".$this->getComponentName()."_".$this->UniqueId] ."+\n\n";
		//echo "task".$this->getComponentName()."_".$this->UniqueId;
		
		if( isset( $this->get["task".$this->getComponentName()."_".$this->UniqueId] ) &&   $this->get["task".$this->getComponentName()."_".$this->UniqueId] != "")
		{
			$task = $this->get["task".$this->getComponentName()."_".$this->UniqueId];
		}
		else if ( isset( $this->post["task".$this->getComponentName()."_".$this->UniqueId] ) && $this->post["task".$this->getComponentName()."_".$this->UniqueId] != ""  )
		{
			$task =  $this->post["task".$this->getComponentName()."_".$this->UniqueId];
		}
		else if( $this->getParam("task".$this->getComponentName()."_".$this->UniqueId ) != null )
			$task = $this->getParam("task".$this->getComponentName()."_".$this->UniqueId );
		else if( isset( $this->get["task".$this->getComponentName()] ) && $this->get["task".$this->getComponentName()] != "" )
			$task = $this->get["task".$this->getComponentName()];
		else if ( isset( $this->post["task".$this->getComponentName()] ) && $this->post["task".$this->getComponentName()] != "" )
			$task =  $this->post["task".$this->getComponentName()];
		else if( $this->getParam("task".$this->getComponentName() ) != null )
			$task = $this->getParam("task".$this->getComponentName() );

	

		if($task == "")
			$task = $default;
		return $task;
	}

	function getLimit( $default = "")
	{
		if( isset( $this->get["limit".$this->getComponentName()] ) )
		{
			$task = $this->get["limit".$this->getComponentName()];
		}
		else if ( isset( $this->post["limit".$this->getComponentName()] ) )
		{
			$task =  $this->post["limit".$this->getComponentName()];
		}
		else if( $this->getParam("limit".$this->getComponentName() ) != null )
		{
			$task = $this->getParam("limit".$this->getComponentName() );
		}
		else
		{
			if( isset( $this->get["limit".$this->getComponentName()."_".$this->UniqueId] ) )
			{
				$task = $this->get["limit".$this->getComponentName()."_".$this->UniqueId];
			}
			else if ( isset( $this->post["limit".$this->getComponentName()."_".$this->UniqueId] ) )
			{
				$task =  $this->post["limit".$this->getComponentName()."_".$this->UniqueId];
			}
			else if( $this->getParam("limit".$this->getComponentName()."_".$this->UniqueId ) != null )
			{
				$task = $this->getParam("limit".$this->getComponentName()."_".$this->UniqueId );
			}
			else
			{
				$task = $default;
			}
		}
		
		if($task == "")
			$task = $default;

		//echo "Error ". $task;
		return $task;
	}

	function getOffset( $default = "")
	{
		if( isset( $this->get["offset".$this->getComponentName()] ) )
			$task = $this->get["offset".$this->getComponentName()];
		else if ( isset( $this->post["offset".$this->getComponentName()] ) )
			$task =  $this->post["offset".$this->getComponentName()];
		else if( $this->getParam("offset".$this->getComponentName() ) != null )
			$task = $this->getParam("offset".$this->getComponentName() );
		else
		{
			if( isset( $this->get["offset".$this->getComponentName()."_".$this->UniqueId ] ) )
				$task = $this->get["offset".$this->getComponentName()."_".$this->UniqueId ];
			else if ( isset( $this->post["offset".$this->getComponentName()."_".$this->UniqueId ] ) )
				$task =  $this->post["offset".$this->getComponentName()."_".$this->UniqueId ];
			else if( $this->getParam("offset".$this->getComponentName()."_".$this->UniqueId  ) != null )
				$task = $this->getParam("offset".$this->getComponentName()."_".$this->UniqueId  );
			else
				$task = $default;
		}
		if($task == "")
			$task = $default;
		return $task;
	}
	
	function getPage($pageName)
	{
		return parent::getPage( $pageName, $this->getComponentName());
	}
	
	function getHTMLPage($pageName)
	{
		$compName = $this->getComponentName();
		$compName = str_replace("com_", "", $compName);
		$filename = $this->config["ui_path"]."/".$compName."/".$pageName.".html";
		if(file_exists($filename) == false)
		{
			$filename = $this->config["sharedlib_path"]."/Shared.UI/".$compName."/".$pageName.".html";
		}
		return $filename;
	}
}

?>