<?php

class ImageReplacer
{
	var $imageField;
	var $maxWidth;
	var $maxHeight;
	function ImageReplacer($field, $maxWidth="", $maxHeight="")
	{
		$this->imageField = $field;
		$this->maxHeight = $maxHeight;
		$this->maxWidth = $maxWidth;
	}
	function execute($item, $rowId)
	{
		$h = "";
		$w = "";
		if( $this->maxHeight != "")
			$h = "height='".$this->maxHeight."'";
		if( $this->maxWidth != "")
			$w = "width='".$this->maxWidth."'";

		$f = $this->imageField;
		$val = $item->$f;
		if($val != "")
			$val = "<IMG $w $h src='".$val."'>";
		return $val;
	}
}

class SoondaPageView extends Soonda
{
	var $config;

	public function createAddObjectFromPost( $post, $o )
	{
		return $o;
	}	
	
	public function createEditObjectFromPost( $post, $o )
	{
		return $o;
	}

	function setConfiguration( $config )
	{
		$this->config = $config;
	}

	function getPropArray( $data )
	{
		$oData = $data;
		$vars = "";
		$arr = array();
		if(is_array($data) && count($data) > 0)
			$oData = $data[0];
		if($oData != null)
		{
			if(method_exists( $oData, "_getvars" ))
			{
				$vars = $oData->_getvars();
			}
			else
				$vars = get_object_vars( $oData );
			

			foreach( $vars as $key => $prop )
			{
				$arr [ $key ] = $key;
			}
		}

		return $arr;
	}
	//this function called by children
	function SetOtherThings( $data = "", $html = "", $moduleName = "" )
	{
		//Set the condition hidden input in html

		if( get_class($data) == "pageViewData")
		{
			if($data->condition == "")
				$html = str_replace("{SOO:DATA:CONDITION}", $data->condition, $html); 
			else
				$html = str_replace("{SOO:DATA:CONDITION}", SoondaUtil::SooEncrypt($data->condition), $html); 
		}
		//Set module name in html
		if( isset($this->get["module"]) )
			$html = str_replace( "{SOO:MODULENAME}", $this->get["module"], $html );
		else
			$html = str_replace( "{SOO:MODULENAME}", $moduleName, $html );

		//Hide back button in html if this page is opened by a dialog window
		if( isset( $this->get["hidebuttons"])  || isset( $this->post["hidebuttons"] ) )
		{
			$buttons = $this->get["hidebuttons"];
			if( $buttons == "")
				$buttons = $this->post["hidebuttons"];

			$buttons = explode(",", $buttons);
			foreach( $buttons as $key => $btn)
			{
				$obtn = SoondaUtil::getStringBetween( $html, "<div id=\"$btn\">", "</div>");
				$html = str_replace( "<div id=\"$btn\">".$obtn."</div>", "", $html);
				//$obtn = SoondaUtil::getStringBetween( $html, "<div id=\"$btn2\">", "</div>");
				//$html = str_replace( "<div id=\"$btn2\">".$obtn."</div>", "", $html);
			}
		}
		else
		{
			$btn = "btnAddDetailWrapper";
			$obtn = SoondaUtil::getStringBetween( $html, "<div id=\"$btn\">", "</div>");
			$html = str_replace( "<div id=\"$btn\">".$obtn."</div>", "", $html);
			$btn = "btnEditDetailWrapper";
			$obtn = SoondaUtil::getStringBetween( $html, "<div id=\"$btn\">", "</div>");
			$html = str_replace( "<div id=\"$btn\">".$obtn."</div>", "", $html);
		}
		
		if( isset( $this->post["detailtablename"] ) )
		{
			$dettbl = $this->post["detailtablename"];
			$html = str_replace("{SOO:DETAILTABLENAME}", $dettbl, $html);
		}
		$html = str_replace("{SOO:DETAILTABLENAME}", "", $html);
		if( isset( $this->post["ridx"] ) )
		{
			$ridx = $this->post["ridx"];
			$html = str_replace("{SOO:ridx}", $ridx, $html);
		}

		
		return $html;
	}

	function setFilter( $html, $data)
	{
		$dataRepeaterTemplate = SoondaUtil::getStringBetween( $html, "<soo:datarepeater:totaldata>", "</soo:datarepeater:totaldata>");
		$opt = ""; //<option value='5'>5</option>\r\n";
		for($i = 1; $i < 6; $i++)
		{
			$selected = "";
			if( ($data->MaxNumberDisplay != 0 && $data->MaxNumberDisplay != "") && $data->MaxNumberDisplay == ($i * 10))
				$selected = "selected";

			$opt .= "<option $selected value='".($i * 10)."'>".($i * 10)."</option>\r\n";
		}
		$html = str_replace( "<soo:datarepeater:totaldata>$dataRepeaterTemplate</soo:datarepeater:totaldata>", $opt, $html);


		$opt = "";
		if( $data->MaxNumberDisplay != 0 && $data->MaxNumberDisplay != "")
			$totPage = floor($data->TotalData / $data->MaxNumberDisplay) + 1;
		else
			$totPage = 1;

		$dataRepeaterTemplate = SoondaUtil::getStringBetween( $html, "<soo:datarepeater:page_of>", "</soo:datarepeater:page_of>");
		for($i = 1; $i < $totPage + 1; $i++)
		{
			$selected = "";
			if( $data->SelectedPage == $i)
				$selected = "selected";

			$opt .= "<option $selected value='".$i."'>".$i."</option>\r\n";
		}
		
		$html = str_replace( "<soo:datarepeater:page_of>$dataRepeaterTemplate</soo:datarepeater:page_of>", $opt, $html);
		$html = str_replace( "{SOO:DATA:TOTALPAGE}", $totPage, $html);

		//------------------------- Table Layout -------------------------------
		$slayouts = "";
		$dataRepeaterTmplate = SoondaUtil::getStringBetween( $html, "<soo:datarepeater:layouts>", "</soo:datarepeater:layouts>" );
		foreach( $data->layoutGroupData as $key => $layout )
		{
			$selected = "";
			if( $layout->IdFieldGrouping == $data->layoutId)
				$selected = "Selected";

			$stmp = $dataRepeaterTmplate;
			$stmp = str_replace("{SOO:DATA:IdFieldGrouping}", $layout->IdFieldGrouping, $stmp);
			$stmp = str_replace("{SOO:DATA:FieldGroupingName}", $layout->FieldGroupingName, $stmp);
			$stmp = str_replace("{SOO:DATA:selected}", $selected, $stmp);

			$slayouts .= $stmp;
		}

		$html = str_replace( "<soo:datarepeater:layouts>".$dataRepeaterTmplate."</soo:datarepeater:layouts>", $slayouts, $html );

		//---------------------------Summary Report--------------------------------
		$sSummarys = "";
		$dataRepeaterTmplate = SoondaUtil::getStringBetween( $html, "<soo:datarepeater:summaries>", "</soo:datarepeater:summaries>" );
		foreach( $data->summaryReportData as $key => $Summary )
		{
			$selected = "";
			if( $Summary->IdSummaryReport == $data->summaryId)
				$selected = "selected";

			$stmp = $dataRepeaterTmplate;
			$stmp = str_replace("{SOO:DATA:IdSummary}", $Summary->IdSummaryReport, $stmp);
			$stmp = str_replace("{SOO:DATA:SummaryName}", $Summary->SummaryName, $stmp);
			$stmp = str_replace("{SOO:DATA:selected}", $selected, $stmp);

			$sSummarys .= $stmp;
		}

		$html = str_replace( "<soo:datarepeater:summaries>".$dataRepeaterTmplate."</soo:datarepeater:summaries>", $sSummarys, $html );
		return $html;
	}


	function joinData( $fieldData, $idx = 0 )
	{
		$ok = false;
		$keys = array_keys( $fieldData );
		$fieldValues = "";

		if( $idx < count($keys) )
		{
			$fieldName = $keys[ $idx ];
			$fieldNameDisplayed = false;
			//dataItem is the single value, i,e 'Lima', 'Paris', 'Jakarta', 'New York', etc.
			foreach( $fieldData[$fieldName] as $keyItem => $dataItem)
			{
				$other = $this->joinData( $fieldData, $idx + 1);

				if( $other != "")
					$fieldValues .= $fieldName.":".$dataItem.";".$other;
				else
				{
					if( $fieldNameDisplayed == false )
					{
						$fieldValues .= $fieldName.":".$dataItem."";
						$fieldNameDisplayed = true;
					}
					else
						$fieldValues .=  ",".$dataItem."";
				}
			}

			$fieldValues .= "|";
		}

		return $fieldValues;
	}

	

	function groupDataFromFieldValues( $data, $fieldValues )
	{
		$tableData = $data->tableData;
		$newData = array();

		// 'City:Jakarta;Status:Capital;TrafficLevel:Good,Stuck,The Cause of Depression|' being exploded by '|'
		$fieldAndValues = array_filter ( explode("|", $fieldValues) ); 

		foreach( $fieldAndValues as $key => $fieldAndValue )
		{
			//'City:Jakarta;Status:Capital;TrafficLevel:Good,Stuck,The Cause of Depression' being exploded by ';'
			$fieldGroups = array_filter ( explode(";", $fieldAndValue) );

			//Get 'TrafficLevel:Good,Stuck,The Cause of Depression'
			$lastFieldGroup = $fieldGroups[ count( $fieldGroups ) - 1 ];
			

			//Get 'City:Jakarta;Status:Capital;
			$theFirstFieldGroups = str_replace(  $lastFieldGroup , "",  $fieldAndValue );
			$lastFieldGroups = explode(":", $lastFieldGroup );

			//Get 'TrafficLevel'
			$lastFieldName = $lastFieldGroups[0];

			//Get 'Good,Stuck,The Cause of Depression' being exploded by ','
			$lastFieldValues = explode(",", $lastFieldGroups[1]);

			foreach( $lastFieldValues as $lkey => $lastFieldValue )
			{
				$FieldGroupAndData = new FieldGroupAndData();
				$FieldGroupAndData->fieldGroups = $theFirstFieldGroups.$lastFieldName.":".$lastFieldValue;

				//Browse the table data
				foreach( $tableData as $okey => $o )
				{
					if( $FieldGroupAndData->isDataBelongToGroup( $o ) )
					{
						$FieldGroupAndData->addData( $o );
					}
				}
				if( count( $FieldGroupAndData->data) > 0)
					array_push( $newData, $FieldGroupAndData );
			}
		}

		return $newData;
	}


	function reGroupData( $data, $layoutId = "" )
	{
		$tableData = $data->tableData;
		$groupData = $data->getLayoutData( $layoutId );
		
		$fields = $groupData->FieldGroups;

		$fieldGroups = explode("->", $fields);
		$fieldGroupsAndData = array();

		$fieldData = array();
		$idx = 0;
		
		foreach( $fieldGroups as $fkey => $fieldName )
		{
			$fieldData[$fieldName] = array();
			foreach( $tableData as $key => $o )
			{
				if( in_array( $o->$fieldName,  $fieldData[$fieldName]  ) == false)
				{
					array_push(  $fieldData[$fieldName], $o->$fieldName );
				}
			}
		}

		//Get tree group header field and data information in the form of 'City:Jakarta;Status:Capital;TrafficLevel:Good,Stuck,The Cause of Depression|'
		$fieldValues = $this->joinData ( $fieldData );
	
		$newData = $this->groupDataFromFieldValues($data, $fieldValues);

		return $newData;
	}

	//To get the datalist template from html, based on module name
	function getDataListTemplate( $html, $moduleName)
	{
		$dataRepeaterTemplate = SoondaUtil::getStringBetween( $html, "<soo:data$moduleName>", "</soo:data$moduleName>");
		return $dataRepeaterTemplate;
	}



	//To get the datalist template from html, based on module name
	function getDataListGroupTemplate( $html, $moduleName)
	{
		$dataRepeaterTemplate = SoondaUtil::getStringBetween( $html, "<soo:datagroup$moduleName>", "</soo:datagroup$moduleName>");
		return $dataRepeaterTemplate;
	}

	//Fill the template with data list and Set key column info in to html
	//html: the html content, moduleName: the module name to be injected in html, sData: table datalist view, keyColumn: key column name for retrieving //detail data from item list, in to html
	function injectTableList( $html, $moduleName, $sData, $keyColumnName)
	{
		$dataRepeaterTemplate = $this->getDataListTemplate( $html, $moduleName);
		$html = str_replace( "<soo:data$moduleName>".$dataRepeaterTemplate."</soo:data$moduleName>", $sData, $html);

		//Set key column info in html
		$html = str_replace("{SOO.FUNCTION:ENCRYPT:$keyColumnName}", $this->enc($keyColumnName), $html); 

		return $html;
	}

	//Function to create HTML options
	function setDateHtmlOptions( $html, $ctrlName, $date = "", $format = "Y-m-d h:i:s")
	{
		if($format == "")
			$format = "Y-m-d h:i:s";
		if($date == "")
			$date = date($format);

		$dataRepeaterContent = SoondaUtil::getStringBetween( $html, "<soo:datarepeater:".$ctrlName."Day>", "</soo:datarepeater:".$ctrlName."Day>");
		$sOptions = "";
		for($i = 1; $i < 32; $i++)
		{
			$stmp = str_replace( "{SOO.DATA:".$ctrlName."Day}", $i, $dataRepeaterContent);
			$stmp = str_replace( "{SOO.DATA:".$ctrlName."DayDisplay}", ($i < 10) ? "0$i" : $i, $stmp);
			$stmp = str_replace( "{selected".$ctrlName."Day}", ($i == date("d", strtotime( $date ) ) ) ? "selected" : "", $stmp);
			$sOptions .= $stmp;
		}
		$html = str_replace( $dataRepeaterContent, $sOptions, $html);

		$dataRepeaterContent = SoondaUtil::getStringBetween( $html, "<soo:datarepeater:".$ctrlName."Month>", "</soo:datarepeater:".$ctrlName."Month>");
		$sOptions = "";
		for($i = 1; $i < 13; $i++)
		{
			$stmp = str_replace( "{SOO.DATA:".$ctrlName."Month}", $i, $dataRepeaterContent);
			$stmp = str_replace( "{SOO.DATA:".$ctrlName."MonthDisplay}", SoondaUtil::getMonthName( $i), $stmp);
			$stmp = str_replace( "{selected".$ctrlName."Month}", ($i == date("m", strtotime( $date ) )) ? "selected" : "", $stmp);
			$sOptions .= $stmp;
		}
		$html = str_replace( $dataRepeaterContent, $sOptions, $html);

		$dataRepeaterContent = SoondaUtil::getStringBetween( $html, "<soo:datarepeater:".$ctrlName."Year>", "</soo:datarepeater:".$ctrlName."Year>");
		$sOptions = "";
		$currentYear = date("Y");
		for($i = $currentYear - 20; $i < $currentYear + 20; $i++)
		{
			$stmp = str_replace( "{SOO.DATA:".$ctrlName."Year}", $i, $dataRepeaterContent);
			$stmp = str_replace( "{SOO.DATA:".$ctrlName."YearDisplay}", ($i < 10) ? "0$i" : $i, $stmp);
			$stmp = str_replace( "{selected".$ctrlName."Year}", ($i == date("Y", strtotime( $date ) )) ? "selected" : "", $stmp);
			$sOptions .= $stmp;
		}
		$html = str_replace( $dataRepeaterContent, $sOptions, $html);

		$dataRepeaterContent = SoondaUtil::getStringBetween( $html, "<soo:datarepeater:".$ctrlName."Hour>", "</soo:datarepeater:".$ctrlName."Hour>");
		$sOptions = "";
		for($i = 0; $i < 24; $i++)
		{
			$stmp = str_replace( "{SOO.DATA:".$ctrlName."Hour}", $i, $dataRepeaterContent);
			$stmp = str_replace( "{SOO.DATA:".$ctrlName."HourDisplay}", ($i < 10) ? "0$i" : $i, $stmp);
			$stmp = str_replace( "{selected".$ctrlName."Hour}", ($i == date("h", strtotime( $date ) )) ? "selected" : "", $stmp);
			$sOptions .= $stmp;		
		}
		$html = str_replace( $dataRepeaterContent, $sOptions, $html);

		$dataRepeaterContent = SoondaUtil::getStringBetween( $html, "<soo:datarepeater:".$ctrlName."Minute>", "</soo:datarepeater:".$ctrlName."Minute>");
		$sOptions = "";
		for($i = 0; $i < 60; $i++)
		{
			$stmp = str_replace( "{SOO.DATA:".$ctrlName."Minute}", $i, $dataRepeaterContent);
			$stmp = str_replace( "{SOO.DATA:".$ctrlName."MinuteDisplay}", ($i < 10) ? "0$i" : $i, $stmp);
			$stmp = str_replace( "{selected".$ctrlName."Minute}", ($i == date("i", strtotime( $date ) )) ? "selected" : "", $stmp);
			$sOptions .= $stmp;		
		}
		$html = str_replace( $dataRepeaterContent, $sOptions, $html);

		$dataRepeaterContent = SoondaUtil::getStringBetween( $html, "<soo:datarepeater:".$ctrlName."Second>", "</soo:datarepeater:".$ctrlName."Second>");
		$sOptions = "";
		for($i = 0; $i < 60; $i++)
		{
			$stmp = str_replace( "{SOO.DATA:".$ctrlName."Second}", $i, $dataRepeaterContent);
			$stmp = str_replace( "{SOO.DATA:".$ctrlName."SecondDisplay}", ($i < 10) ? "0$i" : $i, $stmp);
			$stmp = str_replace( "{selected".$ctrlName."Second}", ($i == date("s", strtotime( $date ) )) ? "selected" : "", $stmp);
			$sOptions .= $stmp;			
		}
		$html = str_replace( $dataRepeaterContent, $sOptions, $html);
		$html = str_replace( "{SOO.FUNCTION:SELECTEDDATE:".$ctrlName."}", date($format, strtotime($date) ), $html);
		return $html;
	}

	function renderTableListByGroup( $data, $dataRepeaterGroupTemplate, $dataRepeaterTemplate, $startRowNumber = 0 )
	{	
		$headers = array();
		$dataGroups = $this->reGroupData ( $data, $data->layoutId );
		foreach( $dataGroups as $key => $dataGroup )
		{
			$sRows = "";
			$c = $dataGroup->getFieldGroupCount();
			for($i = 0; $i < $c; $i++)
			{
				$stmp = $dataRepeaterGroupTemplate;

				$info = $dataGroup->getFieldInfoByIndex( $i );
				$value = $info[1];
				
				if( $value != $headers[ $i ])
				{
					$colTotal = $dataGroup->getDataItemCount() + 3;
					$space = "";
					$w = 0;
					for($sp = 0; $sp < $i; $sp++)
						$w += 20;

						$space .= "<img align='left' border='0' vspace='0' hspace='0' src='images/blank.png' style='position:relative;background-color: #fff;width:".$w."px;height:100%;margin-left:-10px;'>";

					$stmp = str_replace( "{SOO.DATA:COLCOUNT}", $colTotal, $stmp);
					$stmp = str_replace( "{SOO.DATA:i}", $i, $stmp);
					$stmp = str_replace( "{SOO.DATA:GROUPTEXTDATA}", $space."&nbsp;&nbsp;&nbsp;".$value, $stmp);

					$sRows .= $stmp;
				}
				$headers[$i] = $value;
			}

			$member = $this->renderTableList( $dataGroup->data, $dataRepeaterTemplate, 0, $c );
			$sList .= $sRows.$member;		
		}

		return $sList;
	}

	function renderList( $html, $repeaterTmpl, $data, $arr = "", $offset = 0, $limit = "" )
	{
		if( $arr == "")
			$arr = $this->getPropArray( $data );
		$repeater = SoondaUtil::getStringBetween( $html, "<$repeaterTmpl>", "</$repeaterTmpl>");
		//echo "error";
		//echo "[".htmlspecialchars( $repeater )."]---<br>---";

		$s = "";
		$rowNo = 0;
		$start = 0;
		if( $data != "")
		{
			foreach($data as $key => $item)
			{
				if( $rowNo == $offset || $offset == "")
					$start = 1;

				if($limit != "" && $offset + $limit < $rowNo)
					break;

				if( $start == 1)
				{
					$stmp = $repeater;
					$i = 0;
					$hhoo = "";
					
					foreach( $arr as $fkey => $tmplItem )
					{

						$field = $tmplItem;
						if( is_string( $field ) == false && is_int( $field ) == false &&  is_float( $field ) == false &&  is_bool( $field ) == false &&  is_array( $field ) == false  )
						{
							$value = $field->execute(  $item, $rowNo );
						}
						else
						{
							if( strpos( $field, "value:") !== false )
							{
								$value = str_replace( "value:", "", $field );
							}
							else if( strpos( $field, "function:") !== false )
							{
								$field = str_replace( "function:", "", $field );
								eval("\$value = ".$field."");
							}
							else
							{
								$value =  $item->$field;
							}
						}
						//echo "error "."{SOO.DATA:".$fkey."}".$value."<br>";
						$stmp = str_replace( "{SOO.DATA:".$fkey."}", $value, $stmp);
						$i++;
					}
					//end of foreach

					$stmp = str_replace( "{SOO.DATA:rowIdx}", $rowNo, $stmp);
					$s .= $stmp;

				}//End of if start == 1
				$rowNo ++;

			}//end of foreach data

			
		}
		//echo "error ".htmlspecialchars
		$html = str_replace( "<$repeaterTmpl>".$repeater."</$repeaterTmpl>", $s, $html );
		return $html;
	}

	function renderItem( $html, $data, $arr = "")
	{
		if( $arr == "")
			$arr = $this->getPropArray( $data );
		$i = 0;
		foreach( $arr as $fkey => $tmplItem )
		{
			$field = $tmplItem;
			
			if( is_string( $field ) == false && is_int( $field ) == false &&  is_float( $field ) == false &&  is_bool( $field ) == false &&  is_array( $field ) == false  )
			{
				$value = $field->execute( $data, 0 );
			}
			else
				$value = $data->$field;
			$html = str_replace( "{SOO.DATA:".$fkey."}", $value, $html);
			$i++;
		}
		return $html;
	}
	
	/*function render($data, $filename, $exceptions = NULL)
	{
		$html = SoondaUtil::getContent($filename);
		$qparam = "";
		foreach($_GET as $key => $value)
		{
			if($exceptions == NULL || ( $exceptions != NULL && in_array( $key, $exceptions) == FALSE ) )
				$qparam .= $key."=".$value."&";
		}	
		$qparam = substr( $qparam, 0, strlen($qparam) - 1);
		$html = str_replace("{SOO.DATA:queryparam}", $qparam, $html);
		return $html;
	}*/
	

}


class ViewPageParameter
{
	//For the old version
	var $Filter;
	var $Data;
	var $KeyField;
	var $PageValues;
	var $PageLayoutValues;
	var $SummaryReports;
	var $MaxDisplayValues;
	
	//For the later version
	var $data;
	var $filter;
	var $keyField;
	var $pageValues;
	var $pageLayoutValues;
	var $maxDisplayValues;
	
	function ViewPageParameter( )
	{

	}
}

class SaveResult
{
	var $succeed;
	var $errorMessage;
	var $data;
}


//Extend this detail data for your purpose. This class is detail data for a form including lookup and its existing data
class GeneralPageParameter
{
	var $LookupData;
	var $Data;
	var $Filter;
	var $KeyField;
	var $Lookups;
	var $ChildPages = array();

	var $data;
	var $filter;
	var $keyField;
	var $pageValues;
	var $pageLayoutValues;
	var $maxDisplayValues;
	var $lookups;
	var $childPages = array();
	var $lookupData;

	function GeneralPageParameter ( $data)
	{
		$this->Data = $data;
		$this->LookupData = array();
		$this->Lookups = array();
		
		$this->data = $data;
		$this->lookupData = array();
		$this->lookups = array();
	}
	
	function addLookup( $key, $data )
	{
		$this->LookupData [ $key ] = $data;
		$this->lookupData [ $key ] = $data;
	}
}

class DeletePage
{
	function render( $param )
	{
		return "<:nochange:> <script> Soonda.confirm('Are you sure to delete this item?'); </script>";
	}
}

class NoPage
{
	function render( $param )
	{
		return "No Page renderer is defined.";
	}
}


class DetailPageParam
{
	var $data;
	var $relatedData;
}

class ViewPageParam
{
	var $offsetPrevious;
	var $offsetNext;
	var $layout;
	var $rowCount;
	var $colCount;
	var $data;
}

?>