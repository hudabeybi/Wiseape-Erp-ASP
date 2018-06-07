<?php

class TasklogModuleSearchPage extends SoondaPageView
{
	function render( $data = "")
	{
		$html = SoondaUtil::getContent(  "components/com_TasklogModule/pages/TasklogModuleSearchPage.html");
		$html = $this->setLookupData( $html );

		$html = parent::SetOtherThings( $data, $html, "TasklogModule" );
		return $html;
	}

	function setLookupData( $html)
	{

		
		$html = str_replace("{SOO.FUNCTION:Encrypt:TaskTitle1}", $this->enc("TaskTitle1"), $html);
		$html = str_replace("{SOO.FUNCTION:Encrypt:SearchTaskTitle1}", $this->enc("SearchTaskTitle1"), $html);

		//---------------- Set Lookup Data for TaskTitle1 --------------
		
		$html = str_replace("{SOO.FUNCTION:Encrypt:TaskTitle2}", $this->enc("TaskTitle2"), $html);
		$html = str_replace("{SOO.FUNCTION:Encrypt:SearchTaskTitle2}", $this->enc("SearchTaskTitle2"), $html);

		//---------------- Set Lookup Data for TaskTitle2 --------------
		
		$html = str_replace("{SOO.FUNCTION:Encrypt:TaskTitle3}", $this->enc("TaskTitle3"), $html);
		$html = str_replace("{SOO.FUNCTION:Encrypt:SearchTaskTitle3}", $this->enc("SearchTaskTitle3"), $html);

		//---------------- Set Lookup Data for TaskTitle3 --------------
		
		$html = str_replace("{SOO.FUNCTION:Encrypt:TaskTitle4}", $this->enc("TaskTitle4"), $html);
		$html = str_replace("{SOO.FUNCTION:Encrypt:SearchTaskTitle4}", $this->enc("SearchTaskTitle4"), $html);

		//---------------- Set Lookup Data for TaskTitle4 --------------
		
		$html = str_replace("{SOO.FUNCTION:Encrypt:TaskDate}", $this->enc("TaskDate"), $html);
		$html = str_replace("{SOO.FUNCTION:Encrypt:SearchTaskDate}", $this->enc("SearchTaskDate"), $html);

		//---------------- Set Lookup Data for TaskDate --------------
		
		$dataRepeaterContent = SoondaUtil::getStringBetween( $html, "<soo:datarepeater:dt_TaskDateDay0>", "</soo:datarepeater:dt_TaskDateDay0>");
		$sOptions = "";
		for($i = 1; $i < 32; $i++)
		{
			$stmp = str_replace( "{SOO.DATA:dt_TaskDateDay0}", $i, $dataRepeaterContent);
			$stmp = str_replace( "{SOO.DATA:dt_TaskDateDayDisplay0}", ($i < 10) ? "0$i" : $i, $stmp);
			$stmp = str_replace( "{selecteddt_TaskDateDay0}", ($i == date("d")) ? "selected" : "", $stmp);
			$sOptions .= $stmp;
		}
		$html = str_replace( $dataRepeaterContent, $sOptions, $html);

		$dataRepeaterContent = SoondaUtil::getStringBetween( $html, "<soo:datarepeater:dt_TaskDateMonth0>", "</soo:datarepeater:dt_TaskDateMonth0>");
		$sOptions = "";
		for($i = 1; $i < 13; $i++)
		{
			$stmp = str_replace( "{SOO.DATA:dt_TaskDateMonth0}", $i, $dataRepeaterContent);
			$stmp = str_replace( "{SOO.DATA:dt_TaskDateMonthDisplay0}", SoondaUtil::getMonthName( $i), $stmp);
			$stmp = str_replace( "{selecteddt_TaskDateMonth0}", ($i == date("m")) ? "selected" : "", $stmp);
			$sOptions .= $stmp;
		}
		$html = str_replace( $dataRepeaterContent, $sOptions, $html);

		$dataRepeaterContent = SoondaUtil::getStringBetween( $html, "<soo:datarepeater:dt_TaskDateYear0>", "</soo:datarepeater:dt_TaskDateYear0");
		$sOptions = "";
		$currentYear = date("Y");
		for($i = $currentYear - 20; $i < $currentYear + 20; $i++)
		{
			$stmp = str_replace( "{SOO.DATA:dt_TaskDateYear0}", $i, $dataRepeaterContent);
			$stmp = str_replace( "{SOO.DATA:dt_TaskDateYearDisplay0}", ($i < 10) ? "0$i" : $i, $stmp);
			$stmp = str_replace( "{selecteddt_TaskDateYear0}", ($i == date("Y")) ? "selected" : "", $stmp);
			$sOptions .= $stmp;
		}
		$html = str_replace( $dataRepeaterContent, $sOptions, $html);

		$dataRepeaterContent = SoondaUtil::getStringBetween( $html, "<soo:datarepeater:dt_TaskDateHour0>", "</soo:datarepeater:dt_TaskDateHour0");
		$sOptions = "";
		for($i = 0; $i < 24; $i++)
		{
			$stmp = str_replace( "{SOO.DATA:dt_TaskDateHour0}", $i, $dataRepeaterContent);
			$stmp = str_replace( "{SOO.DATA:dt_TaskDateHourDisplay0}", ($i < 10) ? "0$i" : $i, $stmp);
			$stmp = str_replace( "{selecteddt_TaskDateHour0}", ($i == date("h")) ? "selected" : "", $stmp);
			$sOptions .= $stmp;		
		}
		$html = str_replace( $dataRepeaterContent, $sOptions, $html);

		$dataRepeaterContent = SoondaUtil::getStringBetween( $html, "<soo:datarepeater:dt_TaskDateMinute0>", "</soo:datarepeater:dt_TaskDateMinute0>");
		$sOptions = "";
		for($i = 0; $i < 60; $i++)
		{
			$stmp = str_replace( "{SOO.DATA:dt_TaskDateMinute0}", $i, $dataRepeaterContent);
			$stmp = str_replace( "{SOO.DATA:dt_TaskDateMinuteDisplay0}", ($i < 10) ? "0$i" : $i, $stmp);
			$stmp = str_replace( "{selecteddt_TaskDateMinute0}", ($i == date("i")) ? "selected" : "", $stmp);
			$sOptions .= $stmp;		
		}
		$html = str_replace( $dataRepeaterContent, $sOptions, $html);

		$dataRepeaterContent = SoondaUtil::getStringBetween( $html, "<soo:datarepeater:dt_TaskDateSecond0>", "</soo:datarepeater:dt_TaskDateSecond0>");

		$sOptions = "";
		for($i = 0; $i < 60; $i++)
		{
			$stmp = str_replace( "{SOO.DATA:dt_TaskDateSecond0}", $i, $dataRepeaterContent);
			$stmp = str_replace( "{SOO.DATA:dt_TaskDateSecondDisplay0}", ($i < 10) ? "0$i" : $i, $stmp);
			$stmp = str_replace( "{selecteddt_TaskDateSecond0}", ($i == date("s")) ? "selected" : "", $stmp);
			$sOptions .= $stmp;			
		}
		$html = str_replace( $dataRepeaterContent, $sOptions, $html);

		$html = str_replace( "{SOO.FUNCTION:SELECTEDDATE:dt_TaskDate0}", date("Y-m-d h:i:s"), $html);
		
		$dataRepeaterContent = SoondaUtil::getStringBetween( $html, "<soo:datarepeater:dt_TaskDateDay1>", "</soo:datarepeater:dt_TaskDateDay1>");
		$sOptions = "";
		for($i = 1; $i < 32; $i++)
		{
			$stmp = str_replace( "{SOO.DATA:dt_TaskDateDay1}", $i, $dataRepeaterContent);
			$stmp = str_replace( "{SOO.DATA:dt_TaskDateDayDisplay1}", ($i < 10) ? "0$i" : $i, $stmp);
			$stmp = str_replace( "{selecteddt_TaskDateDay1}", ($i == date("d")) ? "selected" : "", $stmp);
			$sOptions .= $stmp;
		}
		$html = str_replace( $dataRepeaterContent, $sOptions, $html);

		$dataRepeaterContent = SoondaUtil::getStringBetween( $html, "<soo:datarepeater:dt_TaskDateMonth1>", "</soo:datarepeater:dt_TaskDateMonth1>");
		$sOptions = "";
		for($i = 1; $i < 13; $i++)
		{
			$stmp = str_replace( "{SOO.DATA:dt_TaskDateMonth1}", $i, $dataRepeaterContent);
			$stmp = str_replace( "{SOO.DATA:dt_TaskDateMonthDisplay1}", SoondaUtil::getMonthName( $i), $stmp);
			$stmp = str_replace( "{selecteddt_TaskDateMonth1}", ($i == date("m")) ? "selected" : "", $stmp);
			$sOptions .= $stmp;
		}
		$html = str_replace( $dataRepeaterContent, $sOptions, $html);

		$dataRepeaterContent = SoondaUtil::getStringBetween( $html, "<soo:datarepeater:dt_TaskDateYear1>", "</soo:datarepeater:dt_TaskDateYear1");
		$sOptions = "";
		$currentYear = date("Y");
		for($i = $currentYear - 20; $i < $currentYear + 20; $i++)
		{
			$stmp = str_replace( "{SOO.DATA:dt_TaskDateYear1}", $i, $dataRepeaterContent);
			$stmp = str_replace( "{SOO.DATA:dt_TaskDateYearDisplay1}", ($i < 10) ? "0$i" : $i, $stmp);
			$stmp = str_replace( "{selecteddt_TaskDateYear1}", ($i == date("Y")) ? "selected" : "", $stmp);
			$sOptions .= $stmp;
		}
		$html = str_replace( $dataRepeaterContent, $sOptions, $html);

		$dataRepeaterContent = SoondaUtil::getStringBetween( $html, "<soo:datarepeater:dt_TaskDateHour1>", "</soo:datarepeater:dt_TaskDateHour1");
		$sOptions = "";
		for($i = 0; $i < 24; $i++)
		{
			$stmp = str_replace( "{SOO.DATA:dt_TaskDateHour1}", $i, $dataRepeaterContent);
			$stmp = str_replace( "{SOO.DATA:dt_TaskDateHourDisplay1}", ($i < 10) ? "0$i" : $i, $stmp);
			$stmp = str_replace( "{selecteddt_TaskDateHour1}", ($i == date("h")) ? "selected" : "", $stmp);
			$sOptions .= $stmp;		
		}
		$html = str_replace( $dataRepeaterContent, $sOptions, $html);

		$dataRepeaterContent = SoondaUtil::getStringBetween( $html, "<soo:datarepeater:dt_TaskDateMinute1>", "</soo:datarepeater:dt_TaskDateMinute1>");
		$sOptions = "";
		for($i = 0; $i < 60; $i++)
		{
			$stmp = str_replace( "{SOO.DATA:dt_TaskDateMinute1}", $i, $dataRepeaterContent);
			$stmp = str_replace( "{SOO.DATA:dt_TaskDateMinuteDisplay1}", ($i < 10) ? "0$i" : $i, $stmp);
			$stmp = str_replace( "{selecteddt_TaskDateMinute1}", ($i == date("i")) ? "selected" : "", $stmp);
			$sOptions .= $stmp;		
		}
		$html = str_replace( $dataRepeaterContent, $sOptions, $html);

		$dataRepeaterContent = SoondaUtil::getStringBetween( $html, "<soo:datarepeater:dt_TaskDateSecond1>", "</soo:datarepeater:dt_TaskDateSecond1>");

		$sOptions = "";
		for($i = 0; $i < 60; $i++)
		{
			$stmp = str_replace( "{SOO.DATA:dt_TaskDateSecond1}", $i, $dataRepeaterContent);
			$stmp = str_replace( "{SOO.DATA:dt_TaskDateSecondDisplay1}", ($i < 10) ? "0$i" : $i, $stmp);
			$stmp = str_replace( "{selecteddt_TaskDateSecond1}", ($i == date("s")) ? "selected" : "", $stmp);
			$sOptions .= $stmp;			
		}
		$html = str_replace( $dataRepeaterContent, $sOptions, $html);

		$html = str_replace( "{SOO.FUNCTION:SELECTEDDATE:dt_TaskDate1}", date("Y-m-d h:i:s"), $html);

		return $html;
	}

}


?>