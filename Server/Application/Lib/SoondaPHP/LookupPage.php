<?php

class LookupPage extends SoondaPageView
{
	function render($param)
	{
		$html = SoondaUtil::getContent( dirname(__FILE__)."/LookupPage.html");
		$html = $this->populateData( $param, $html );
		$html = str_replace("{soo:lookuptable}", $param->lookupTable, $html);
		$html = str_replace("{soo:keycolumn}", $param->keyColumn, $html);
		$html = str_replace("{soo:displaycolumn}", $param->displayColumn, $html);
		$html = str_replace("{soo:combo}", $param->combo, $html);

		return $html;
	}

	function populateData( $param, $html)
	{
		$data = $param->data;
		$tmpl = SoondaUtil::getStringBetween( $html, "<soo.data:lookup>", "</soo.data:lookup>");
		$s = "";
		foreach($data as $key => $item)
		{
			eval("\$val = \$item->".$param->keyColumn.";");
			$stmp = str_replace("{soo.data:keycolumn}", $val, $tmpl );
			eval("\$val = \$item->".$param->displayColumn.";");
			$stmp = str_replace("{soo.data:displaycolumn}", $val, $stmp );
			$s .= $stmp;
		}

		$html = str_replace("<soo.data:lookup>".$tmpl."</soo.data:lookup>", $s, $html );
		return $html;
	}
}
?>