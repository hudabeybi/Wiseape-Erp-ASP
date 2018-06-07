<?php

class UserModuleSearchPage extends SoondaPageView
{
	function render( $data = "")
	{
		$html = SoondaUtil::getContent(  "components/com_UserModule/pages/UserModuleSearchPage.html");
		$html = $this->setLookupData( $html );

		$html = parent::SetOtherThings( $data, $html, "UserModule" );
		return $html;
	}

	function setLookupData( $html)
	{

		
		$html = str_replace("{SOO.FUNCTION:Encrypt:FirstName}", $this->enc("FirstName"), $html);
		$html = str_replace("{SOO.FUNCTION:Encrypt:SearchFirstName}", $this->enc("SearchFirstName"), $html);

		//---------------- Set Lookup Data for FirstName --------------
		
		$html = str_replace("{SOO.FUNCTION:Encrypt:LastName}", $this->enc("LastName"), $html);
		$html = str_replace("{SOO.FUNCTION:Encrypt:SearchLastName}", $this->enc("SearchLastName"), $html);

		//---------------- Set Lookup Data for LastName --------------
		
		$html = str_replace("{SOO.FUNCTION:Encrypt:UserRegisteredDate}", $this->enc("UserRegisteredDate"), $html);
		$html = str_replace("{SOO.FUNCTION:Encrypt:SearchUserRegisteredDate}", $this->enc("SearchUserRegisteredDate"), $html);

		//---------------- Set Lookup Data for UserRegisteredDate --------------
		
		$dataRepeaterContent = SoondaUtil::getStringBetween( $html, "<soo:datarepeater:dt_UserRegisteredDateDay0>", "</soo:datarepeater:dt_UserRegisteredDateDay0>");
		$sOptions = "";
		for($i = 1; $i < 32; $i++)
		{
			$stmp = str_replace( "{SOO.DATA:dt_UserRegisteredDateDay0}", $i, $dataRepeaterContent);
			$stmp = str_replace( "{SOO.DATA:dt_UserRegisteredDateDayDisplay0}", ($i < 10) ? "0$i" : $i, $stmp);
			$stmp = str_replace( "{selecteddt_UserRegisteredDateDay0}", ($i == date("d")) ? "selected" : "", $stmp);
			$sOptions .= $stmp;
		}
		$html = str_replace( $dataRepeaterContent, $sOptions, $html);

		$dataRepeaterContent = SoondaUtil::getStringBetween( $html, "<soo:datarepeater:dt_UserRegisteredDateMonth0>", "</soo:datarepeater:dt_UserRegisteredDateMonth0>");
		$sOptions = "";
		for($i = 1; $i < 13; $i++)
		{
			$stmp = str_replace( "{SOO.DATA:dt_UserRegisteredDateMonth0}", $i, $dataRepeaterContent);
			$stmp = str_replace( "{SOO.DATA:dt_UserRegisteredDateMonthDisplay0}", SoondaUtil::getMonthName( $i), $stmp);
			$stmp = str_replace( "{selecteddt_UserRegisteredDateMonth0}", ($i == date("m")) ? "selected" : "", $stmp);
			$sOptions .= $stmp;
		}
		$html = str_replace( $dataRepeaterContent, $sOptions, $html);

		$dataRepeaterContent = SoondaUtil::getStringBetween( $html, "<soo:datarepeater:dt_UserRegisteredDateYear0>", "</soo:datarepeater:dt_UserRegisteredDateYear0");
		$sOptions = "";
		$currentYear = date("Y");
		for($i = $currentYear - 20; $i < $currentYear + 20; $i++)
		{
			$stmp = str_replace( "{SOO.DATA:dt_UserRegisteredDateYear0}", $i, $dataRepeaterContent);
			$stmp = str_replace( "{SOO.DATA:dt_UserRegisteredDateYearDisplay0}", ($i < 10) ? "0$i" : $i, $stmp);
			$stmp = str_replace( "{selecteddt_UserRegisteredDateYear0}", ($i == date("Y")) ? "selected" : "", $stmp);
			$sOptions .= $stmp;
		}
		$html = str_replace( $dataRepeaterContent, $sOptions, $html);

		$dataRepeaterContent = SoondaUtil::getStringBetween( $html, "<soo:datarepeater:dt_UserRegisteredDateHour0>", "</soo:datarepeater:dt_UserRegisteredDateHour0");
		$sOptions = "";
		for($i = 0; $i < 24; $i++)
		{
			$stmp = str_replace( "{SOO.DATA:dt_UserRegisteredDateHour0}", $i, $dataRepeaterContent);
			$stmp = str_replace( "{SOO.DATA:dt_UserRegisteredDateHourDisplay0}", ($i < 10) ? "0$i" : $i, $stmp);
			$stmp = str_replace( "{selecteddt_UserRegisteredDateHour0}", ($i == date("h")) ? "selected" : "", $stmp);
			$sOptions .= $stmp;		
		}
		$html = str_replace( $dataRepeaterContent, $sOptions, $html);

		$dataRepeaterContent = SoondaUtil::getStringBetween( $html, "<soo:datarepeater:dt_UserRegisteredDateMinute0>", "</soo:datarepeater:dt_UserRegisteredDateMinute0>");
		$sOptions = "";
		for($i = 0; $i < 60; $i++)
		{
			$stmp = str_replace( "{SOO.DATA:dt_UserRegisteredDateMinute0}", $i, $dataRepeaterContent);
			$stmp = str_replace( "{SOO.DATA:dt_UserRegisteredDateMinuteDisplay0}", ($i < 10) ? "0$i" : $i, $stmp);
			$stmp = str_replace( "{selecteddt_UserRegisteredDateMinute0}", ($i == date("i")) ? "selected" : "", $stmp);
			$sOptions .= $stmp;		
		}
		$html = str_replace( $dataRepeaterContent, $sOptions, $html);

		$dataRepeaterContent = SoondaUtil::getStringBetween( $html, "<soo:datarepeater:dt_UserRegisteredDateSecond0>", "</soo:datarepeater:dt_UserRegisteredDateSecond0>");

		$sOptions = "";
		for($i = 0; $i < 60; $i++)
		{
			$stmp = str_replace( "{SOO.DATA:dt_UserRegisteredDateSecond0}", $i, $dataRepeaterContent);
			$stmp = str_replace( "{SOO.DATA:dt_UserRegisteredDateSecondDisplay0}", ($i < 10) ? "0$i" : $i, $stmp);
			$stmp = str_replace( "{selecteddt_UserRegisteredDateSecond0}", ($i == date("s")) ? "selected" : "", $stmp);
			$sOptions .= $stmp;			
		}
		$html = str_replace( $dataRepeaterContent, $sOptions, $html);

		$html = str_replace( "{SOO.FUNCTION:SELECTEDDATE:dt_UserRegisteredDate0}", date("Y-m-d h:i:s"), $html);
		
		$dataRepeaterContent = SoondaUtil::getStringBetween( $html, "<soo:datarepeater:dt_UserRegisteredDateDay1>", "</soo:datarepeater:dt_UserRegisteredDateDay1>");
		$sOptions = "";
		for($i = 1; $i < 32; $i++)
		{
			$stmp = str_replace( "{SOO.DATA:dt_UserRegisteredDateDay1}", $i, $dataRepeaterContent);
			$stmp = str_replace( "{SOO.DATA:dt_UserRegisteredDateDayDisplay1}", ($i < 10) ? "0$i" : $i, $stmp);
			$stmp = str_replace( "{selecteddt_UserRegisteredDateDay1}", ($i == date("d")) ? "selected" : "", $stmp);
			$sOptions .= $stmp;
		}
		$html = str_replace( $dataRepeaterContent, $sOptions, $html);

		$dataRepeaterContent = SoondaUtil::getStringBetween( $html, "<soo:datarepeater:dt_UserRegisteredDateMonth1>", "</soo:datarepeater:dt_UserRegisteredDateMonth1>");
		$sOptions = "";
		for($i = 1; $i < 13; $i++)
		{
			$stmp = str_replace( "{SOO.DATA:dt_UserRegisteredDateMonth1}", $i, $dataRepeaterContent);
			$stmp = str_replace( "{SOO.DATA:dt_UserRegisteredDateMonthDisplay1}", SoondaUtil::getMonthName( $i), $stmp);
			$stmp = str_replace( "{selecteddt_UserRegisteredDateMonth1}", ($i == date("m")) ? "selected" : "", $stmp);
			$sOptions .= $stmp;
		}
		$html = str_replace( $dataRepeaterContent, $sOptions, $html);

		$dataRepeaterContent = SoondaUtil::getStringBetween( $html, "<soo:datarepeater:dt_UserRegisteredDateYear1>", "</soo:datarepeater:dt_UserRegisteredDateYear1");
		$sOptions = "";
		$currentYear = date("Y");
		for($i = $currentYear - 20; $i < $currentYear + 20; $i++)
		{
			$stmp = str_replace( "{SOO.DATA:dt_UserRegisteredDateYear1}", $i, $dataRepeaterContent);
			$stmp = str_replace( "{SOO.DATA:dt_UserRegisteredDateYearDisplay1}", ($i < 10) ? "0$i" : $i, $stmp);
			$stmp = str_replace( "{selecteddt_UserRegisteredDateYear1}", ($i == date("Y")) ? "selected" : "", $stmp);
			$sOptions .= $stmp;
		}
		$html = str_replace( $dataRepeaterContent, $sOptions, $html);

		$dataRepeaterContent = SoondaUtil::getStringBetween( $html, "<soo:datarepeater:dt_UserRegisteredDateHour1>", "</soo:datarepeater:dt_UserRegisteredDateHour1");
		$sOptions = "";
		for($i = 0; $i < 24; $i++)
		{
			$stmp = str_replace( "{SOO.DATA:dt_UserRegisteredDateHour1}", $i, $dataRepeaterContent);
			$stmp = str_replace( "{SOO.DATA:dt_UserRegisteredDateHourDisplay1}", ($i < 10) ? "0$i" : $i, $stmp);
			$stmp = str_replace( "{selecteddt_UserRegisteredDateHour1}", ($i == date("h")) ? "selected" : "", $stmp);
			$sOptions .= $stmp;		
		}
		$html = str_replace( $dataRepeaterContent, $sOptions, $html);

		$dataRepeaterContent = SoondaUtil::getStringBetween( $html, "<soo:datarepeater:dt_UserRegisteredDateMinute1>", "</soo:datarepeater:dt_UserRegisteredDateMinute1>");
		$sOptions = "";
		for($i = 0; $i < 60; $i++)
		{
			$stmp = str_replace( "{SOO.DATA:dt_UserRegisteredDateMinute1}", $i, $dataRepeaterContent);
			$stmp = str_replace( "{SOO.DATA:dt_UserRegisteredDateMinuteDisplay1}", ($i < 10) ? "0$i" : $i, $stmp);
			$stmp = str_replace( "{selecteddt_UserRegisteredDateMinute1}", ($i == date("i")) ? "selected" : "", $stmp);
			$sOptions .= $stmp;		
		}
		$html = str_replace( $dataRepeaterContent, $sOptions, $html);

		$dataRepeaterContent = SoondaUtil::getStringBetween( $html, "<soo:datarepeater:dt_UserRegisteredDateSecond1>", "</soo:datarepeater:dt_UserRegisteredDateSecond1>");

		$sOptions = "";
		for($i = 0; $i < 60; $i++)
		{
			$stmp = str_replace( "{SOO.DATA:dt_UserRegisteredDateSecond1}", $i, $dataRepeaterContent);
			$stmp = str_replace( "{SOO.DATA:dt_UserRegisteredDateSecondDisplay1}", ($i < 10) ? "0$i" : $i, $stmp);
			$stmp = str_replace( "{selecteddt_UserRegisteredDateSecond1}", ($i == date("s")) ? "selected" : "", $stmp);
			$sOptions .= $stmp;			
		}
		$html = str_replace( $dataRepeaterContent, $sOptions, $html);

		$html = str_replace( "{SOO.FUNCTION:SELECTEDDATE:dt_UserRegisteredDate1}", date("Y-m-d h:i:s"), $html);
		
		$html = str_replace("{SOO.FUNCTION:Encrypt:UserEmail}", $this->enc("UserEmail"), $html);
		$html = str_replace("{SOO.FUNCTION:Encrypt:SearchUserEmail}", $this->enc("SearchUserEmail"), $html);

		//---------------- Set Lookup Data for UserEmail --------------
		
		$html = str_replace("{SOO.FUNCTION:Encrypt:UserPhone}", $this->enc("UserPhone"), $html);
		$html = str_replace("{SOO.FUNCTION:Encrypt:SearchUserPhone}", $this->enc("SearchUserPhone"), $html);

		//---------------- Set Lookup Data for UserPhone --------------

		return $html;
	}

}


?>