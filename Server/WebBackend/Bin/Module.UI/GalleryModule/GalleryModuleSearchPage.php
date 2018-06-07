<?php

class GalleryModuleSearchPage extends SoondaPageView
{
	function render( $data = "")
	{
		$html = SoondaUtil::getContent(  "components/com_GalleryModule/pages/GalleryModuleSearchPage.html");
		$html = $this->setLookupData( $html );

		$html = parent::SetOtherThings( $data, $html, "GalleryModule" );
		return $html;
	}

	function setLookupData( $html)
	{

		
		$html = str_replace("{SOO.FUNCTION:Encrypt:GalleryCaption}", $this->enc("GalleryCaption"), $html);
		$html = str_replace("{SOO.FUNCTION:Encrypt:SearchGalleryCaption}", $this->enc("SearchGalleryCaption"), $html);

		//---------------- Set Lookup Data for GalleryCaption --------------
		
		$html = str_replace("{SOO.FUNCTION:Encrypt:ImageDate}", $this->enc("ImageDate"), $html);
		$html = str_replace("{SOO.FUNCTION:Encrypt:SearchImageDate}", $this->enc("SearchImageDate"), $html);

		//---------------- Set Lookup Data for ImageDate --------------
		
		$dataRepeaterContent = SoondaUtil::getStringBetween( $html, "<soo:datarepeater:dt_ImageDateDay0>", "</soo:datarepeater:dt_ImageDateDay0>");
		$sOptions = "";
		for($i = 1; $i < 32; $i++)
		{
			$stmp = str_replace( "{SOO.DATA:dt_ImageDateDay0}", $i, $dataRepeaterContent);
			$stmp = str_replace( "{SOO.DATA:dt_ImageDateDayDisplay0}", ($i < 10) ? "0$i" : $i, $stmp);
			$stmp = str_replace( "{selecteddt_ImageDateDay0}", ($i == date("d")) ? "selected" : "", $stmp);
			$sOptions .= $stmp;
		}
		$html = str_replace( $dataRepeaterContent, $sOptions, $html);

		$dataRepeaterContent = SoondaUtil::getStringBetween( $html, "<soo:datarepeater:dt_ImageDateMonth0>", "</soo:datarepeater:dt_ImageDateMonth0>");
		$sOptions = "";
		for($i = 1; $i < 13; $i++)
		{
			$stmp = str_replace( "{SOO.DATA:dt_ImageDateMonth0}", $i, $dataRepeaterContent);
			$stmp = str_replace( "{SOO.DATA:dt_ImageDateMonthDisplay0}", SoondaUtil::getMonthName( $i), $stmp);
			$stmp = str_replace( "{selecteddt_ImageDateMonth0}", ($i == date("m")) ? "selected" : "", $stmp);
			$sOptions .= $stmp;
		}
		$html = str_replace( $dataRepeaterContent, $sOptions, $html);

		$dataRepeaterContent = SoondaUtil::getStringBetween( $html, "<soo:datarepeater:dt_ImageDateYear0>", "</soo:datarepeater:dt_ImageDateYear0");
		$sOptions = "";
		$currentYear = date("Y");
		for($i = $currentYear - 20; $i < $currentYear + 20; $i++)
		{
			$stmp = str_replace( "{SOO.DATA:dt_ImageDateYear0}", $i, $dataRepeaterContent);
			$stmp = str_replace( "{SOO.DATA:dt_ImageDateYearDisplay0}", ($i < 10) ? "0$i" : $i, $stmp);
			$stmp = str_replace( "{selecteddt_ImageDateYear0}", ($i == date("Y")) ? "selected" : "", $stmp);
			$sOptions .= $stmp;
		}
		$html = str_replace( $dataRepeaterContent, $sOptions, $html);

		$dataRepeaterContent = SoondaUtil::getStringBetween( $html, "<soo:datarepeater:dt_ImageDateHour0>", "</soo:datarepeater:dt_ImageDateHour0");
		$sOptions = "";
		for($i = 0; $i < 24; $i++)
		{
			$stmp = str_replace( "{SOO.DATA:dt_ImageDateHour0}", $i, $dataRepeaterContent);
			$stmp = str_replace( "{SOO.DATA:dt_ImageDateHourDisplay0}", ($i < 10) ? "0$i" : $i, $stmp);
			$stmp = str_replace( "{selecteddt_ImageDateHour0}", ($i == date("h")) ? "selected" : "", $stmp);
			$sOptions .= $stmp;		
		}
		$html = str_replace( $dataRepeaterContent, $sOptions, $html);

		$dataRepeaterContent = SoondaUtil::getStringBetween( $html, "<soo:datarepeater:dt_ImageDateMinute0>", "</soo:datarepeater:dt_ImageDateMinute0>");
		$sOptions = "";
		for($i = 0; $i < 60; $i++)
		{
			$stmp = str_replace( "{SOO.DATA:dt_ImageDateMinute0}", $i, $dataRepeaterContent);
			$stmp = str_replace( "{SOO.DATA:dt_ImageDateMinuteDisplay0}", ($i < 10) ? "0$i" : $i, $stmp);
			$stmp = str_replace( "{selecteddt_ImageDateMinute0}", ($i == date("i")) ? "selected" : "", $stmp);
			$sOptions .= $stmp;		
		}
		$html = str_replace( $dataRepeaterContent, $sOptions, $html);

		$dataRepeaterContent = SoondaUtil::getStringBetween( $html, "<soo:datarepeater:dt_ImageDateSecond0>", "</soo:datarepeater:dt_ImageDateSecond0>");

		$sOptions = "";
		for($i = 0; $i < 60; $i++)
		{
			$stmp = str_replace( "{SOO.DATA:dt_ImageDateSecond0}", $i, $dataRepeaterContent);
			$stmp = str_replace( "{SOO.DATA:dt_ImageDateSecondDisplay0}", ($i < 10) ? "0$i" : $i, $stmp);
			$stmp = str_replace( "{selecteddt_ImageDateSecond0}", ($i == date("s")) ? "selected" : "", $stmp);
			$sOptions .= $stmp;			
		}
		$html = str_replace( $dataRepeaterContent, $sOptions, $html);

		$html = str_replace( "{SOO.FUNCTION:SELECTEDDATE:dt_ImageDate0}", date("Y-m-d h:i:s"), $html);
		
		$dataRepeaterContent = SoondaUtil::getStringBetween( $html, "<soo:datarepeater:dt_ImageDateDay1>", "</soo:datarepeater:dt_ImageDateDay1>");
		$sOptions = "";
		for($i = 1; $i < 32; $i++)
		{
			$stmp = str_replace( "{SOO.DATA:dt_ImageDateDay1}", $i, $dataRepeaterContent);
			$stmp = str_replace( "{SOO.DATA:dt_ImageDateDayDisplay1}", ($i < 10) ? "0$i" : $i, $stmp);
			$stmp = str_replace( "{selecteddt_ImageDateDay1}", ($i == date("d")) ? "selected" : "", $stmp);
			$sOptions .= $stmp;
		}
		$html = str_replace( $dataRepeaterContent, $sOptions, $html);

		$dataRepeaterContent = SoondaUtil::getStringBetween( $html, "<soo:datarepeater:dt_ImageDateMonth1>", "</soo:datarepeater:dt_ImageDateMonth1>");
		$sOptions = "";
		for($i = 1; $i < 13; $i++)
		{
			$stmp = str_replace( "{SOO.DATA:dt_ImageDateMonth1}", $i, $dataRepeaterContent);
			$stmp = str_replace( "{SOO.DATA:dt_ImageDateMonthDisplay1}", SoondaUtil::getMonthName( $i), $stmp);
			$stmp = str_replace( "{selecteddt_ImageDateMonth1}", ($i == date("m")) ? "selected" : "", $stmp);
			$sOptions .= $stmp;
		}
		$html = str_replace( $dataRepeaterContent, $sOptions, $html);

		$dataRepeaterContent = SoondaUtil::getStringBetween( $html, "<soo:datarepeater:dt_ImageDateYear1>", "</soo:datarepeater:dt_ImageDateYear1");
		$sOptions = "";
		$currentYear = date("Y");
		for($i = $currentYear - 20; $i < $currentYear + 20; $i++)
		{
			$stmp = str_replace( "{SOO.DATA:dt_ImageDateYear1}", $i, $dataRepeaterContent);
			$stmp = str_replace( "{SOO.DATA:dt_ImageDateYearDisplay1}", ($i < 10) ? "0$i" : $i, $stmp);
			$stmp = str_replace( "{selecteddt_ImageDateYear1}", ($i == date("Y")) ? "selected" : "", $stmp);
			$sOptions .= $stmp;
		}
		$html = str_replace( $dataRepeaterContent, $sOptions, $html);

		$dataRepeaterContent = SoondaUtil::getStringBetween( $html, "<soo:datarepeater:dt_ImageDateHour1>", "</soo:datarepeater:dt_ImageDateHour1");
		$sOptions = "";
		for($i = 0; $i < 24; $i++)
		{
			$stmp = str_replace( "{SOO.DATA:dt_ImageDateHour1}", $i, $dataRepeaterContent);
			$stmp = str_replace( "{SOO.DATA:dt_ImageDateHourDisplay1}", ($i < 10) ? "0$i" : $i, $stmp);
			$stmp = str_replace( "{selecteddt_ImageDateHour1}", ($i == date("h")) ? "selected" : "", $stmp);
			$sOptions .= $stmp;		
		}
		$html = str_replace( $dataRepeaterContent, $sOptions, $html);

		$dataRepeaterContent = SoondaUtil::getStringBetween( $html, "<soo:datarepeater:dt_ImageDateMinute1>", "</soo:datarepeater:dt_ImageDateMinute1>");
		$sOptions = "";
		for($i = 0; $i < 60; $i++)
		{
			$stmp = str_replace( "{SOO.DATA:dt_ImageDateMinute1}", $i, $dataRepeaterContent);
			$stmp = str_replace( "{SOO.DATA:dt_ImageDateMinuteDisplay1}", ($i < 10) ? "0$i" : $i, $stmp);
			$stmp = str_replace( "{selecteddt_ImageDateMinute1}", ($i == date("i")) ? "selected" : "", $stmp);
			$sOptions .= $stmp;		
		}
		$html = str_replace( $dataRepeaterContent, $sOptions, $html);

		$dataRepeaterContent = SoondaUtil::getStringBetween( $html, "<soo:datarepeater:dt_ImageDateSecond1>", "</soo:datarepeater:dt_ImageDateSecond1>");

		$sOptions = "";
		for($i = 0; $i < 60; $i++)
		{
			$stmp = str_replace( "{SOO.DATA:dt_ImageDateSecond1}", $i, $dataRepeaterContent);
			$stmp = str_replace( "{SOO.DATA:dt_ImageDateSecondDisplay1}", ($i < 10) ? "0$i" : $i, $stmp);
			$stmp = str_replace( "{selecteddt_ImageDateSecond1}", ($i == date("s")) ? "selected" : "", $stmp);
			$sOptions .= $stmp;			
		}
		$html = str_replace( $dataRepeaterContent, $sOptions, $html);

		$html = str_replace( "{SOO.FUNCTION:SELECTEDDATE:dt_ImageDate1}", date("Y-m-d h:i:s"), $html);

		return $html;
	}

}


?>