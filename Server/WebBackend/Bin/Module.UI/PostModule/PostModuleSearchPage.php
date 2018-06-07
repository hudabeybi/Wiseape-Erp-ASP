<?php

class PostModuleSearchPage extends SoondaPageView
{
	function render( $data = "")
	{
		$html = SoondaUtil::getContent(  "components/com_PostModule/pages/PostModuleSearchPage.html");
		$html = $this->setLookupData( $html );

		$html = parent::SetOtherThings( $data, $html, "PostModule" );
		return $html;
	}

	function setLookupData( $html)
	{

		
		$html = str_replace("{SOO.FUNCTION:Encrypt:PostTitle}", $this->enc("PostTitle"), $html);
		$html = str_replace("{SOO.FUNCTION:Encrypt:SearchPostTitle}", $this->enc("SearchPostTitle"), $html);

		//---------------- Set Lookup Data for PostTitle --------------
		
		$html = str_replace("{SOO.FUNCTION:Encrypt:PostSubTitle}", $this->enc("PostSubTitle"), $html);
		$html = str_replace("{SOO.FUNCTION:Encrypt:SearchPostSubTitle}", $this->enc("SearchPostSubTitle"), $html);

		//---------------- Set Lookup Data for PostSubTitle --------------
		
		$html = str_replace("{SOO.FUNCTION:Encrypt:PostDate}", $this->enc("PostDate"), $html);
		$html = str_replace("{SOO.FUNCTION:Encrypt:SearchPostDate}", $this->enc("SearchPostDate"), $html);

		//---------------- Set Lookup Data for PostDate --------------
		
		$dataRepeaterContent = SoondaUtil::getStringBetween( $html, "<soo:datarepeater:dt_PostDateDay0>", "</soo:datarepeater:dt_PostDateDay0>");
		$sOptions = "";
		for($i = 1; $i < 32; $i++)
		{
			$stmp = str_replace( "{SOO.DATA:dt_PostDateDay0}", $i, $dataRepeaterContent);
			$stmp = str_replace( "{SOO.DATA:dt_PostDateDayDisplay0}", ($i < 10) ? "0$i" : $i, $stmp);
			$stmp = str_replace( "{selecteddt_PostDateDay0}", ($i == date("d")) ? "selected" : "", $stmp);
			$sOptions .= $stmp;
		}
		$html = str_replace( $dataRepeaterContent, $sOptions, $html);

		$dataRepeaterContent = SoondaUtil::getStringBetween( $html, "<soo:datarepeater:dt_PostDateMonth0>", "</soo:datarepeater:dt_PostDateMonth0>");
		$sOptions = "";
		for($i = 1; $i < 13; $i++)
		{
			$stmp = str_replace( "{SOO.DATA:dt_PostDateMonth0}", $i, $dataRepeaterContent);
			$stmp = str_replace( "{SOO.DATA:dt_PostDateMonthDisplay0}", SoondaUtil::getMonthName( $i), $stmp);
			$stmp = str_replace( "{selecteddt_PostDateMonth0}", ($i == date("m")) ? "selected" : "", $stmp);
			$sOptions .= $stmp;
		}
		$html = str_replace( $dataRepeaterContent, $sOptions, $html);

		$dataRepeaterContent = SoondaUtil::getStringBetween( $html, "<soo:datarepeater:dt_PostDateYear0>", "</soo:datarepeater:dt_PostDateYear0");
		$sOptions = "";
		$currentYear = date("Y");
		for($i = $currentYear - 20; $i < $currentYear + 20; $i++)
		{
			$stmp = str_replace( "{SOO.DATA:dt_PostDateYear0}", $i, $dataRepeaterContent);
			$stmp = str_replace( "{SOO.DATA:dt_PostDateYearDisplay0}", ($i < 10) ? "0$i" : $i, $stmp);
			$stmp = str_replace( "{selecteddt_PostDateYear0}", ($i == date("Y")) ? "selected" : "", $stmp);
			$sOptions .= $stmp;
		}
		$html = str_replace( $dataRepeaterContent, $sOptions, $html);

		$dataRepeaterContent = SoondaUtil::getStringBetween( $html, "<soo:datarepeater:dt_PostDateHour0>", "</soo:datarepeater:dt_PostDateHour0");
		$sOptions = "";
		for($i = 0; $i < 24; $i++)
		{
			$stmp = str_replace( "{SOO.DATA:dt_PostDateHour0}", $i, $dataRepeaterContent);
			$stmp = str_replace( "{SOO.DATA:dt_PostDateHourDisplay0}", ($i < 10) ? "0$i" : $i, $stmp);
			$stmp = str_replace( "{selecteddt_PostDateHour0}", ($i == date("h")) ? "selected" : "", $stmp);
			$sOptions .= $stmp;		
		}
		$html = str_replace( $dataRepeaterContent, $sOptions, $html);

		$dataRepeaterContent = SoondaUtil::getStringBetween( $html, "<soo:datarepeater:dt_PostDateMinute0>", "</soo:datarepeater:dt_PostDateMinute0>");
		$sOptions = "";
		for($i = 0; $i < 60; $i++)
		{
			$stmp = str_replace( "{SOO.DATA:dt_PostDateMinute0}", $i, $dataRepeaterContent);
			$stmp = str_replace( "{SOO.DATA:dt_PostDateMinuteDisplay0}", ($i < 10) ? "0$i" : $i, $stmp);
			$stmp = str_replace( "{selecteddt_PostDateMinute0}", ($i == date("i")) ? "selected" : "", $stmp);
			$sOptions .= $stmp;		
		}
		$html = str_replace( $dataRepeaterContent, $sOptions, $html);

		$dataRepeaterContent = SoondaUtil::getStringBetween( $html, "<soo:datarepeater:dt_PostDateSecond0>", "</soo:datarepeater:dt_PostDateSecond0>");

		$sOptions = "";
		for($i = 0; $i < 60; $i++)
		{
			$stmp = str_replace( "{SOO.DATA:dt_PostDateSecond0}", $i, $dataRepeaterContent);
			$stmp = str_replace( "{SOO.DATA:dt_PostDateSecondDisplay0}", ($i < 10) ? "0$i" : $i, $stmp);
			$stmp = str_replace( "{selecteddt_PostDateSecond0}", ($i == date("s")) ? "selected" : "", $stmp);
			$sOptions .= $stmp;			
		}
		$html = str_replace( $dataRepeaterContent, $sOptions, $html);

		$html = str_replace( "{SOO.FUNCTION:SELECTEDDATE:dt_PostDate0}", date("Y-m-d h:i:s"), $html);
		
		$dataRepeaterContent = SoondaUtil::getStringBetween( $html, "<soo:datarepeater:dt_PostDateDay1>", "</soo:datarepeater:dt_PostDateDay1>");
		$sOptions = "";
		for($i = 1; $i < 32; $i++)
		{
			$stmp = str_replace( "{SOO.DATA:dt_PostDateDay1}", $i, $dataRepeaterContent);
			$stmp = str_replace( "{SOO.DATA:dt_PostDateDayDisplay1}", ($i < 10) ? "0$i" : $i, $stmp);
			$stmp = str_replace( "{selecteddt_PostDateDay1}", ($i == date("d")) ? "selected" : "", $stmp);
			$sOptions .= $stmp;
		}
		$html = str_replace( $dataRepeaterContent, $sOptions, $html);

		$dataRepeaterContent = SoondaUtil::getStringBetween( $html, "<soo:datarepeater:dt_PostDateMonth1>", "</soo:datarepeater:dt_PostDateMonth1>");
		$sOptions = "";
		for($i = 1; $i < 13; $i++)
		{
			$stmp = str_replace( "{SOO.DATA:dt_PostDateMonth1}", $i, $dataRepeaterContent);
			$stmp = str_replace( "{SOO.DATA:dt_PostDateMonthDisplay1}", SoondaUtil::getMonthName( $i), $stmp);
			$stmp = str_replace( "{selecteddt_PostDateMonth1}", ($i == date("m")) ? "selected" : "", $stmp);
			$sOptions .= $stmp;
		}
		$html = str_replace( $dataRepeaterContent, $sOptions, $html);

		$dataRepeaterContent = SoondaUtil::getStringBetween( $html, "<soo:datarepeater:dt_PostDateYear1>", "</soo:datarepeater:dt_PostDateYear1");
		$sOptions = "";
		$currentYear = date("Y");
		for($i = $currentYear - 20; $i < $currentYear + 20; $i++)
		{
			$stmp = str_replace( "{SOO.DATA:dt_PostDateYear1}", $i, $dataRepeaterContent);
			$stmp = str_replace( "{SOO.DATA:dt_PostDateYearDisplay1}", ($i < 10) ? "0$i" : $i, $stmp);
			$stmp = str_replace( "{selecteddt_PostDateYear1}", ($i == date("Y")) ? "selected" : "", $stmp);
			$sOptions .= $stmp;
		}
		$html = str_replace( $dataRepeaterContent, $sOptions, $html);

		$dataRepeaterContent = SoondaUtil::getStringBetween( $html, "<soo:datarepeater:dt_PostDateHour1>", "</soo:datarepeater:dt_PostDateHour1");
		$sOptions = "";
		for($i = 0; $i < 24; $i++)
		{
			$stmp = str_replace( "{SOO.DATA:dt_PostDateHour1}", $i, $dataRepeaterContent);
			$stmp = str_replace( "{SOO.DATA:dt_PostDateHourDisplay1}", ($i < 10) ? "0$i" : $i, $stmp);
			$stmp = str_replace( "{selecteddt_PostDateHour1}", ($i == date("h")) ? "selected" : "", $stmp);
			$sOptions .= $stmp;		
		}
		$html = str_replace( $dataRepeaterContent, $sOptions, $html);

		$dataRepeaterContent = SoondaUtil::getStringBetween( $html, "<soo:datarepeater:dt_PostDateMinute1>", "</soo:datarepeater:dt_PostDateMinute1>");
		$sOptions = "";
		for($i = 0; $i < 60; $i++)
		{
			$stmp = str_replace( "{SOO.DATA:dt_PostDateMinute1}", $i, $dataRepeaterContent);
			$stmp = str_replace( "{SOO.DATA:dt_PostDateMinuteDisplay1}", ($i < 10) ? "0$i" : $i, $stmp);
			$stmp = str_replace( "{selecteddt_PostDateMinute1}", ($i == date("i")) ? "selected" : "", $stmp);
			$sOptions .= $stmp;		
		}
		$html = str_replace( $dataRepeaterContent, $sOptions, $html);

		$dataRepeaterContent = SoondaUtil::getStringBetween( $html, "<soo:datarepeater:dt_PostDateSecond1>", "</soo:datarepeater:dt_PostDateSecond1>");

		$sOptions = "";
		for($i = 0; $i < 60; $i++)
		{
			$stmp = str_replace( "{SOO.DATA:dt_PostDateSecond1}", $i, $dataRepeaterContent);
			$stmp = str_replace( "{SOO.DATA:dt_PostDateSecondDisplay1}", ($i < 10) ? "0$i" : $i, $stmp);
			$stmp = str_replace( "{selecteddt_PostDateSecond1}", ($i == date("s")) ? "selected" : "", $stmp);
			$sOptions .= $stmp;			
		}
		$html = str_replace( $dataRepeaterContent, $sOptions, $html);

		$html = str_replace( "{SOO.FUNCTION:SELECTEDDATE:dt_PostDate1}", date("Y-m-d h:i:s"), $html);
		
		$html = str_replace("{SOO.FUNCTION:Encrypt:PostShortText}", $this->enc("PostShortText"), $html);
		$html = str_replace("{SOO.FUNCTION:Encrypt:SearchPostShortText}", $this->enc("SearchPostShortText"), $html);

		//---------------- Set Lookup Data for PostShortText --------------
		
		$html = str_replace("{SOO.FUNCTION:Encrypt:PostText}", $this->enc("PostText"), $html);
		$html = str_replace("{SOO.FUNCTION:Encrypt:SearchPostText}", $this->enc("SearchPostText"), $html);

		//---------------- Set Lookup Data for PostText --------------
		
		$html = str_replace("{SOO.FUNCTION:Encrypt:PostTag}", $this->enc("PostTag"), $html);
		$html = str_replace("{SOO.FUNCTION:Encrypt:SearchPostTag}", $this->enc("SearchPostTag"), $html);

		//---------------- Set Lookup Data for PostTag --------------

		return $html;
	}

}


?>