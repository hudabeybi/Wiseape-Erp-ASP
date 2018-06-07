<?php

class GalleryAlbumModuleSearchPage extends SoondaPageView
{
	function render( $data = "")
	{
		$html = SoondaUtil::getContent(  "components/com_GalleryAlbumModule/pages/GalleryAlbumModuleSearchPage.html");
		$html = $this->setLookupData( $html );

		$html = parent::SetOtherThings( $data, $html, "GalleryAlbumModule" );
		return $html;
	}

	function setLookupData( $html)
	{

		
		$html = str_replace("{SOO.FUNCTION:Encrypt:AlbumTitle}", $this->enc("AlbumTitle"), $html);
		$html = str_replace("{SOO.FUNCTION:Encrypt:SearchAlbumTitle}", $this->enc("SearchAlbumTitle"), $html);

		//---------------- Set Lookup Data for AlbumTitle --------------
		
		$html = str_replace("{SOO.FUNCTION:Encrypt:AlbumDescription}", $this->enc("AlbumDescription"), $html);
		$html = str_replace("{SOO.FUNCTION:Encrypt:SearchAlbumDescription}", $this->enc("SearchAlbumDescription"), $html);

		//---------------- Set Lookup Data for AlbumDescription --------------
		
		$html = str_replace("{SOO.FUNCTION:Encrypt:AlbumCreatedDate}", $this->enc("AlbumCreatedDate"), $html);
		$html = str_replace("{SOO.FUNCTION:Encrypt:SearchAlbumCreatedDate}", $this->enc("SearchAlbumCreatedDate"), $html);

		//---------------- Set Lookup Data for AlbumCreatedDate --------------
		
		$dataRepeaterContent = SoondaUtil::getStringBetween( $html, "<soo:datarepeater:dt_AlbumCreatedDateDay0>", "</soo:datarepeater:dt_AlbumCreatedDateDay0>");
		$sOptions = "";
		for($i = 1; $i < 32; $i++)
		{
			$stmp = str_replace( "{SOO.DATA:dt_AlbumCreatedDateDay0}", $i, $dataRepeaterContent);
			$stmp = str_replace( "{SOO.DATA:dt_AlbumCreatedDateDayDisplay0}", ($i < 10) ? "0$i" : $i, $stmp);
			$stmp = str_replace( "{selecteddt_AlbumCreatedDateDay0}", ($i == date("d")) ? "selected" : "", $stmp);
			$sOptions .= $stmp;
		}
		$html = str_replace( $dataRepeaterContent, $sOptions, $html);

		$dataRepeaterContent = SoondaUtil::getStringBetween( $html, "<soo:datarepeater:dt_AlbumCreatedDateMonth0>", "</soo:datarepeater:dt_AlbumCreatedDateMonth0>");
		$sOptions = "";
		for($i = 1; $i < 13; $i++)
		{
			$stmp = str_replace( "{SOO.DATA:dt_AlbumCreatedDateMonth0}", $i, $dataRepeaterContent);
			$stmp = str_replace( "{SOO.DATA:dt_AlbumCreatedDateMonthDisplay0}", SoondaUtil::getMonthName( $i), $stmp);
			$stmp = str_replace( "{selecteddt_AlbumCreatedDateMonth0}", ($i == date("m")) ? "selected" : "", $stmp);
			$sOptions .= $stmp;
		}
		$html = str_replace( $dataRepeaterContent, $sOptions, $html);

		$dataRepeaterContent = SoondaUtil::getStringBetween( $html, "<soo:datarepeater:dt_AlbumCreatedDateYear0>", "</soo:datarepeater:dt_AlbumCreatedDateYear0");
		$sOptions = "";
		$currentYear = date("Y");
		for($i = $currentYear - 20; $i < $currentYear + 20; $i++)
		{
			$stmp = str_replace( "{SOO.DATA:dt_AlbumCreatedDateYear0}", $i, $dataRepeaterContent);
			$stmp = str_replace( "{SOO.DATA:dt_AlbumCreatedDateYearDisplay0}", ($i < 10) ? "0$i" : $i, $stmp);
			$stmp = str_replace( "{selecteddt_AlbumCreatedDateYear0}", ($i == date("Y")) ? "selected" : "", $stmp);
			$sOptions .= $stmp;
		}
		$html = str_replace( $dataRepeaterContent, $sOptions, $html);

		$dataRepeaterContent = SoondaUtil::getStringBetween( $html, "<soo:datarepeater:dt_AlbumCreatedDateHour0>", "</soo:datarepeater:dt_AlbumCreatedDateHour0");
		$sOptions = "";
		for($i = 0; $i < 24; $i++)
		{
			$stmp = str_replace( "{SOO.DATA:dt_AlbumCreatedDateHour0}", $i, $dataRepeaterContent);
			$stmp = str_replace( "{SOO.DATA:dt_AlbumCreatedDateHourDisplay0}", ($i < 10) ? "0$i" : $i, $stmp);
			$stmp = str_replace( "{selecteddt_AlbumCreatedDateHour0}", ($i == date("h")) ? "selected" : "", $stmp);
			$sOptions .= $stmp;		
		}
		$html = str_replace( $dataRepeaterContent, $sOptions, $html);

		$dataRepeaterContent = SoondaUtil::getStringBetween( $html, "<soo:datarepeater:dt_AlbumCreatedDateMinute0>", "</soo:datarepeater:dt_AlbumCreatedDateMinute0>");
		$sOptions = "";
		for($i = 0; $i < 60; $i++)
		{
			$stmp = str_replace( "{SOO.DATA:dt_AlbumCreatedDateMinute0}", $i, $dataRepeaterContent);
			$stmp = str_replace( "{SOO.DATA:dt_AlbumCreatedDateMinuteDisplay0}", ($i < 10) ? "0$i" : $i, $stmp);
			$stmp = str_replace( "{selecteddt_AlbumCreatedDateMinute0}", ($i == date("i")) ? "selected" : "", $stmp);
			$sOptions .= $stmp;		
		}
		$html = str_replace( $dataRepeaterContent, $sOptions, $html);

		$dataRepeaterContent = SoondaUtil::getStringBetween( $html, "<soo:datarepeater:dt_AlbumCreatedDateSecond0>", "</soo:datarepeater:dt_AlbumCreatedDateSecond0>");

		$sOptions = "";
		for($i = 0; $i < 60; $i++)
		{
			$stmp = str_replace( "{SOO.DATA:dt_AlbumCreatedDateSecond0}", $i, $dataRepeaterContent);
			$stmp = str_replace( "{SOO.DATA:dt_AlbumCreatedDateSecondDisplay0}", ($i < 10) ? "0$i" : $i, $stmp);
			$stmp = str_replace( "{selecteddt_AlbumCreatedDateSecond0}", ($i == date("s")) ? "selected" : "", $stmp);
			$sOptions .= $stmp;			
		}
		$html = str_replace( $dataRepeaterContent, $sOptions, $html);

		$html = str_replace( "{SOO.FUNCTION:SELECTEDDATE:dt_AlbumCreatedDate0}", date("Y-m-d h:i:s"), $html);
		
		$dataRepeaterContent = SoondaUtil::getStringBetween( $html, "<soo:datarepeater:dt_AlbumCreatedDateDay1>", "</soo:datarepeater:dt_AlbumCreatedDateDay1>");
		$sOptions = "";
		for($i = 1; $i < 32; $i++)
		{
			$stmp = str_replace( "{SOO.DATA:dt_AlbumCreatedDateDay1}", $i, $dataRepeaterContent);
			$stmp = str_replace( "{SOO.DATA:dt_AlbumCreatedDateDayDisplay1}", ($i < 10) ? "0$i" : $i, $stmp);
			$stmp = str_replace( "{selecteddt_AlbumCreatedDateDay1}", ($i == date("d")) ? "selected" : "", $stmp);
			$sOptions .= $stmp;
		}
		$html = str_replace( $dataRepeaterContent, $sOptions, $html);

		$dataRepeaterContent = SoondaUtil::getStringBetween( $html, "<soo:datarepeater:dt_AlbumCreatedDateMonth1>", "</soo:datarepeater:dt_AlbumCreatedDateMonth1>");
		$sOptions = "";
		for($i = 1; $i < 13; $i++)
		{
			$stmp = str_replace( "{SOO.DATA:dt_AlbumCreatedDateMonth1}", $i, $dataRepeaterContent);
			$stmp = str_replace( "{SOO.DATA:dt_AlbumCreatedDateMonthDisplay1}", SoondaUtil::getMonthName( $i), $stmp);
			$stmp = str_replace( "{selecteddt_AlbumCreatedDateMonth1}", ($i == date("m")) ? "selected" : "", $stmp);
			$sOptions .= $stmp;
		}
		$html = str_replace( $dataRepeaterContent, $sOptions, $html);

		$dataRepeaterContent = SoondaUtil::getStringBetween( $html, "<soo:datarepeater:dt_AlbumCreatedDateYear1>", "</soo:datarepeater:dt_AlbumCreatedDateYear1");
		$sOptions = "";
		$currentYear = date("Y");
		for($i = $currentYear - 20; $i < $currentYear + 20; $i++)
		{
			$stmp = str_replace( "{SOO.DATA:dt_AlbumCreatedDateYear1}", $i, $dataRepeaterContent);
			$stmp = str_replace( "{SOO.DATA:dt_AlbumCreatedDateYearDisplay1}", ($i < 10) ? "0$i" : $i, $stmp);
			$stmp = str_replace( "{selecteddt_AlbumCreatedDateYear1}", ($i == date("Y")) ? "selected" : "", $stmp);
			$sOptions .= $stmp;
		}
		$html = str_replace( $dataRepeaterContent, $sOptions, $html);

		$dataRepeaterContent = SoondaUtil::getStringBetween( $html, "<soo:datarepeater:dt_AlbumCreatedDateHour1>", "</soo:datarepeater:dt_AlbumCreatedDateHour1");
		$sOptions = "";
		for($i = 0; $i < 24; $i++)
		{
			$stmp = str_replace( "{SOO.DATA:dt_AlbumCreatedDateHour1}", $i, $dataRepeaterContent);
			$stmp = str_replace( "{SOO.DATA:dt_AlbumCreatedDateHourDisplay1}", ($i < 10) ? "0$i" : $i, $stmp);
			$stmp = str_replace( "{selecteddt_AlbumCreatedDateHour1}", ($i == date("h")) ? "selected" : "", $stmp);
			$sOptions .= $stmp;		
		}
		$html = str_replace( $dataRepeaterContent, $sOptions, $html);

		$dataRepeaterContent = SoondaUtil::getStringBetween( $html, "<soo:datarepeater:dt_AlbumCreatedDateMinute1>", "</soo:datarepeater:dt_AlbumCreatedDateMinute1>");
		$sOptions = "";
		for($i = 0; $i < 60; $i++)
		{
			$stmp = str_replace( "{SOO.DATA:dt_AlbumCreatedDateMinute1}", $i, $dataRepeaterContent);
			$stmp = str_replace( "{SOO.DATA:dt_AlbumCreatedDateMinuteDisplay1}", ($i < 10) ? "0$i" : $i, $stmp);
			$stmp = str_replace( "{selecteddt_AlbumCreatedDateMinute1}", ($i == date("i")) ? "selected" : "", $stmp);
			$sOptions .= $stmp;		
		}
		$html = str_replace( $dataRepeaterContent, $sOptions, $html);

		$dataRepeaterContent = SoondaUtil::getStringBetween( $html, "<soo:datarepeater:dt_AlbumCreatedDateSecond1>", "</soo:datarepeater:dt_AlbumCreatedDateSecond1>");

		$sOptions = "";
		for($i = 0; $i < 60; $i++)
		{
			$stmp = str_replace( "{SOO.DATA:dt_AlbumCreatedDateSecond1}", $i, $dataRepeaterContent);
			$stmp = str_replace( "{SOO.DATA:dt_AlbumCreatedDateSecondDisplay1}", ($i < 10) ? "0$i" : $i, $stmp);
			$stmp = str_replace( "{selecteddt_AlbumCreatedDateSecond1}", ($i == date("s")) ? "selected" : "", $stmp);
			$sOptions .= $stmp;			
		}
		$html = str_replace( $dataRepeaterContent, $sOptions, $html);

		$html = str_replace( "{SOO.FUNCTION:SELECTEDDATE:dt_AlbumCreatedDate1}", date("Y-m-d h:i:s"), $html);

		return $html;
	}

}


?>