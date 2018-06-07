<?php

class SoondaUtil
{
	function getContent( $filename ) 
	{
		if (is_file( $filename) ) {
			
			ob_start();
			include_once("$filename");
			$contents = ob_get_contents();
			ob_end_clean();
			return $contents;
		}
		else 
			return false;
	}

	function getStringBetween($string, $start, $end)
	{
		$string = " ".$string;
		$ini = strpos($string,$start);
		if ($ini == 0) return "";
		$ini += strlen($start);
		$len = strpos($string,$end,$ini) - $ini;
		return substr($string,$ini,$len);
	}

	function getMonthName( $i)
	{
		$monthName = array ( "", "Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec");
		return $monthName[ $i];
	}

	function Encrypt( $s)
	{
		$s = md5( $s);
		return $s;
	}

	function getRandomString($length = 6) 
	{
		$validCharacters = "abcdefghijklmnopqrstuxyvwzABCDEFGHIJKLMNOPQRSTUXYVWZ";
		$validCharNumber = strlen($validCharacters);
	 
		$result = "";
	 
		for ($i = 0; $i < $length; $i++) {
			$index = mt_rand(0, $validCharNumber - 1);
			$result .= $validCharacters[$index];
		}
	 
		return $result;
	}

	function SooEncrypt( $str)
	{

		////$_SESSION["rand"][ $str ] = SoondaUtil::getRandomString();
		//echo "error ".$_SESSION["rand"];
		//$sRand = base64_encode($_SESSION["rand"][ $str ]);
		$sRand = base64_encode("hA490-9090=AghIJ");
		$s = base64_encode($str).$sRand;
		$s = str_replace( "=", "|", $s);
		return $s;
	}

	function SooDecrypt( $str)
	{
		$str = str_replace( "\n", "", $str);
		$str = str_replace( "|", "=", $str);
		//$sRand = base64_encode($_SESSION["rand"][ $str ]);
		$sRand = base64_encode("hA490-9090=AghIJ");
		$s = str_replace( $sRand, "", $str);
		$s = base64_decode( $s );
		return $s;
	}

	function getFileExtension($fn)
	{
		$str=explode('/',$fn);
		$len=count($str);
		$str2=explode('.',$str[($len-1)]);
		$len2=count($str2);
		$ext=$str2[($len2-1)];
		return $ext;
	}

	function uploadFile( $postFile, $exts, $path, $keepFileName = false )
	{
		
		if ( ! in_array( $postFile["type"], $exts) )
		{
			if ($postFile["error"] > 0)
			{
				echo "Error, Code: " . $postFile["error"] . "<br />";
			}
			else
			{
				$filename = $postFile["name"];
				
				$ext = SoondaUtil::getFileExtension( $filename);
				if( $keepFileName == false)
					$filename = "IMG_".date("Ymdhis").".".$ext;

				$path = str_replace( "\\", "/", $path);
				if( substr( $path, 0, strlen( $path) - 1) != "/")
					$path .= "/";
				$filename = $path.$filename;
				move_uploaded_file($postFile["tmp_name"],   $filename);
				echo "File:$filename-|-Size:".($postFile["size"] / 1024) . " Kb";
			}	
		}
		else
		{
			echo "Error : Invalid file";
		}
	}

	function getFriendlyString($s)
	{
		$sLine = "";
		for($i = 0; $i < strlen( $s); $i++)
		{
			$char = substr( $s, $i, 1);
			if( $char == strtoupper( $char) && $i > 0 )
				$char = "_".$char;
			$sLine .= $char;
		}

		$sLine = str_replace( "_", " ", $sLine);
		return $sLine;
	}

	function utf8_UrlDecode($str) 
	{
		$str = preg_replace("/%u([0-9a-f]{3,4})/i","&#x\\1;",urldecode($str));
		return html_entity_decode($str,null,'UTF-8');;
	}

	function decodeHTML( $str)
	{
		$html = rawurldecode( $str );
		$html = str_replace("%20", " ", $html);
		$html = str_replace("\\\"", "\"", $html);
		$html = str_replace("\\'", "'", $html);
		return $html;
	}

	function encodeHTML( $str)
	{
		$html =  rawurlencode( $str );
		
		return $html;
	}

	function exportToPDF($html, $pdfFile)
	{
		require_once("libraries/dompdf/dompdf_config.inc.php");
		$dompdf = new DOMPDF();
		$dompdf->load_html($html);
		$dompdf->render();
		file_put_contents($pdfFile, $dompdf->output());
		return $pdfFile;
	}

	function exportToExcel($html, $xlsFile)
	{
		file_put_contents($xlsFile, $html);
		return $xlsFile;
	}


	function phpHeaderSaveFile($fileToRead, $fileToSave, $contentType)
	{
		@header("Last-Modified: " . @gmdate("D, d M Y H:i:s",$_GET['timestamp']) . " GMT");
		@header("Content-type: $contentType");
		// If the file is NOT requested via AJAX, force-download
		if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) || strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) != 'xmlhttprequest') {
				header("Content-Disposition: attachment; filename=$fileToSave");
		}
		$output = file_get_contents("../../".$fileToRead);
		echo $output;
	}
}

?>