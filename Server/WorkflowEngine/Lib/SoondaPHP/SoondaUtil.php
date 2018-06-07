<?php

class SoondaUtil
{
	static function getColorCatalog( $i )
	{
		$color = "#000000";
		$arr = array("#cc34aa", "#aa77ff", "#554422", "#cc0087", "#aabb11", "#ccaaff", "#269502", "#ddaaee", "#1100ff", "#ff9912", "#786588", "#6575ff");
		if( $i > count( $arr))
			$color = SoondaUtil::getRandomColor();
		else
			$color = $arr[$i];
		return $color;
	}

	static function insertArray( $original, $inserted, $pos )
	{
		$arr = array_splice( $original, $pos, 0, array($inserted) );
	
		return $original;
	}

	static function getRandomColor()
	{
		mt_srand((double)microtime()*1000000);
		$c = '';
		while(strlen($c)<6){
			$c .= sprintf("%02X", mt_rand(0, 255));
		}
		return $c;
	}

	static function getContent( $filename ) 
	{
		//echo is_file( $filename)." ".$filename."<br>";
		if (is_file( $filename) ) {
			
			ob_start();
			include("$filename");
			$contents = ob_get_contents();
			ob_end_clean();
			return $contents;
		}
		else 
			return false;
	}

	static function var_dump_str( $o)
	{
		ob_start();
		var_dump($o);
		$s = ob_get_contents();
		ob_end_clean();
		return $s;
	}

	static function printr_str( $o)
	{
		ob_start();
		print_r($o);
		$s = ob_get_contents();
		ob_end_clean();
		return $s;
	}

	static function log( $s, $append = true )
	{
		if($append)
			file_put_contents("log.txt", $s, FILE_APPEND);
		else
			file_put_contents("log.txt", $s);

	}

	static function removeHTML($s , $keep = '' , $expand = 'script|style|noframes|select|option'){ 
        /**///prep the string 
        $s = ' ' . $s; 
        
        /**///initialize keep tag logic 
        if(strlen($keep) > 0){ 
            $k = explode('|',$keep); 
            for($i=0;$i<count($k);$i++){ 
                $s = str_replace('<' . $k[$i],'[{(' . $k[$i],$s); 
                $s = str_replace('</' . $k[$i],'[{(/' . $k[$i],$s); 
            } 
        } 
        
        //begin removal 
        /**///remove comment blocks 
        while(stripos($s,'<!--') > 0){ 
            $pos[1] = stripos($s,'<!--'); 
            $pos[2] = stripos($s,'-->', $pos[1]); 
            $len[1] = $pos[2] - $pos[1] + 3; 
            $x = substr($s,$pos[1],$len[1]); 
            $s = str_replace($x,'',$s); 
        } 
        
        /**///remove tags with content between them 
        if(strlen($expand) > 0){ 
            $e = explode('|',$expand); 
            for($i=0;$i<count($e);$i++){ 
                while(stripos($s,'<' . $e[$i]) > 0){ 
                    $len[1] = strlen('<' . $e[$i]); 
                    $pos[1] = stripos($s,'<' . $e[$i]); 
                    $pos[2] = stripos($s,$e[$i] . '>', $pos[1] + $len[1]); 
                    $len[2] = $pos[2] - $pos[1] + $len[1]; 
                    $x = substr($s,$pos[1],$len[2]); 
                    $s = str_replace($x,'',$s); 
                } 
            } 
        } 
        
        /**///remove remaining tags 
        while(stripos($s,'<') > 0){ 
            $pos[1] = stripos($s,'<'); 
            $pos[2] = stripos($s,'>', $pos[1]); 
            $len[1] = $pos[2] - $pos[1] + 1; 
            $x = substr($s,$pos[1],$len[1]); 
            $s = str_replace($x,'',$s); 
        } 
        
        /**///finalize keep tag 
        for($i=0;$i<count($k);$i++){ 
            $s = str_replace('[{(' . $k[$i],'<' . $k[$i],$s); 
            $s = str_replace('[{(/' . $k[$i],'</' . $k[$i],$s); 
        } 
        
        return trim($s); 
    } 

	static function getStringBetween($string, $start, $end)
	{
		$string = " ".$string;
		$ini = strpos($string,$start);
		if ($ini === false) return "";
		$ini += strlen($start);
		$len = strpos($string,$end,$ini) - $ini;
		return substr($string,$ini,$len);
	}

	static function getAllStringBetween($string, $start, $end)
	{
		$matches = array();
		$string = " ".$string;
		$ini = strpos($string,$start, 0);
		if ($ini === false) return $matches;

		$i = 0;
		$ini += strlen($start);
		$len = strpos($string,$end,$ini) - $ini;
		$matches [$i]["var"] = substr($string,$ini,$len);
		$matches [$i]["start"] = $ini - strlen($start);
		$matches [$i]["length"] = strlen($start) + strlen($matches [$i]["var"]) + strlen($end);
		$i++;
		
		while( $ini !== false)
		{
			$ini = strpos($string,$start, $ini);
			if ($ini === false) break;
			$ini += strlen($start);
			$len = strpos($string,$end,$ini) - $ini;
			$matches [$i]["var"] = substr($string,$ini,$len);
			$matches [$i]["start"] = $ini - strlen($start);
			$matches [$i]["length"] = strlen($start) + strlen($matches [$i]["var"]) + strlen($end) ;
			$i++;
		}

		return $matches;
	}

	static function replaceStringBetween( $string, $start, $end, $newString )
	{
		$s = SoondaUtil::getStringBetween($string, $start, $end);
		$ss = str_replace( $start.$s.$end, $newString, $string);
		return $ss;
	}

	static function insertTextIntoElementById( $html, $id, $text )
	{
		$s = SoondaUtil::getStringBetween( $html, "id=\"".$id."\">", "</div>");
		$newHtml = str_replace( "id=\"".$id."\">".$s."</div>", "id=\"".$id."\">".$text."</div>", $html);
		return $newHtml;
	}

	static function getMonthName( $i)
	{
		$monthName = array ( "", "Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec");
		return $monthName[ $i];
	}

	static function Encrypt( $s)
	{
		$s = md5( $s);
		return $s;
	}

	static function getRandomString($length = 6) 
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

	static function SooEncrypt( $str)
	{

		////$_SESSION["rand"][ $str ] = SoondaUtil::getRandomString();
		//echo "error ".$_SESSION["rand"];
		//$sRand = base64_encode($_SESSION["rand"][ $str ]);
		$sRand = base64_encode("hA490-9090=AghIJ");
		$s = base64_encode($str).$sRand;
		$s = str_replace( "=", "|", $s);
		return $s;
	}

	static function SooDecrypt( $str)
	{
		$str = str_replace( "\n", "", $str);
		$str = str_replace( "|", "=", $str);
		//$sRand = base64_encode($_SESSION["rand"][ $str ]);
		$sRand = base64_encode("hA490-9090=AghIJ");
		$s = str_replace( $sRand, "", $str);
		$s = base64_decode( $s );
		return $s;
	}

	static function getFileExtension($fn)
	{
		$str=explode('/',$fn);
		$len=count($str);
		$str2=explode('.',$str[($len-1)]);
		$len2=count($str2);
		$ext=$str2[($len2-1)];
		return $ext;
	}

	static function uploadFile( $postFile, $exts, $path, $keepFileName = false )
	{
		if ( ! in_array( $postFile["type"], $exts) )
		{
			if ($postFile["error"] > 0)
			{
				echo "[PHP_ERROR], Code: " . $postFile["error"] . "<br />";
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
				//else 
				//	echo "[PHP_ERROR] no such folder or cannot write : ".."\r\n";

			}	
		}
		else
		{
			echo "[PHP_ERROR]: Invalid file";
		}
	}

	static function uploadFileMobile( $postFile, $exts, $path, $keepFileName = false )
	{
		$sXml = "<?xml version='1.0'?>\r\n";
		$sXml .= "<Object type='UploadResult'>\r\n"; 
		if ( ! in_array( $postFile["type"], $exts) )
		{
			if ($postFile["error"] > 0)
			{
				$sXml .= "<Result>false</Result>\r\n<Error>" . $postFile["error"] . "</Error>\r\n<FileName></FileName><FileSize></FileSize>"; 
				//echo "Error, Code: " . $postFile["error"] . "<br />";
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
				$sXml .= "<Result>true</Result>\r\n<Error></Error>\r\n<FileName>$filename</FileName><FileSize>".($postFile["size"] / 1024)."</FileSize>"; 
			}	
		}
		else
		{
			$sXml .= "<Result>false</Result>\r\n<Error>Invalid file type</Error>\r\n<FileName></FileName><FileSize></FileSize>"; 
		}
		$sXml .= "</Object>";
		return $sXml;
	}

	static function getFriendlyString($s)
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

	static function utf8_UrlDecode($str) 
	{
		$str = preg_replace("/%u([0-9a-f]{3,4})/i","&#x\\1;",urldecode($str));
		return html_entity_decode($str,null,'UTF-8');
	}

	static function decodeHTML( $str)
	{
		$html = "";
		if( is_string( $str) )
		{
			$html = rawurldecode( $str );
			$html = str_replace("%20", " ", $html);
			$html = str_replace("%2F", "/", $html);
			$html = str_replace("%21", "!", $html );
			$html = str_replace("%2A", "*", $html);
			$html = str_replace("%28", "(", $html);
			$html = str_replace("%29", ")", $html);
			$html = str_replace("%27", "'", $html);
			$html = str_replace("%7E", "~", $html);
			$html = str_replace("%20", " ", $html);
			$html = str_replace("%HX", "`", $html);
			$html = str_replace("%HZ", "—", $html);
			$html = str_replace("%2F", "/", $html);
			$html = str_replace("\\\"", "\"", $html);
			$html = str_replace("\\'", "'", $html);
		}
		else
			$html = $str;

		return $html;
	}

	static function encodeHTML( $str)
	{
		$html =  rawurlencode( $str );
		return $html;
	}

	static function encloseHTML( $string )
	{
		$string = addslashes($string);
		return $string;
	}

	static function decloseHTML( $string )
	{
		$string = SoondaUtil::decodeHTML($string);
		return $string;
	}

	static function exportToPDF($html, $pdfFile)
	{
		require_once("libraries/dompdf/dompdf_config.inc.php");
		$dompdf = new DOMPDF();
		$dompdf->load_html($html);
		$dompdf->render();
		file_put_contents($pdfFile, $dompdf->output());
		return $pdfFile;
	}

	static function exportToExcel($html, $xlsFile)
	{
		file_put_contents($xlsFile, $html);
		return $xlsFile;
	}


	static function phpHeaderSaveFile($fileToRead, $fileToSave, $contentType)
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

	static function CheckEmpty($s)
	{
		if(strlen($s) == 0)
			return true;
		else
			return false;
	}

	static function CheckEmail($email) 
	{
		if(!filter_var($email, FILTER_VALIDATE_EMAIL))
		{
			
			return true;
		}
		return false;
	}

	static function sendMail($from, $to, $subject, $message, $fromComplete="" )
	{
		$headers = "From:" . $from;
		$headers .= "Reply-To: ".$fromComplete."" . "\r\n" .
			"X-Mailer: SoondaPHP-M-Huda/" . phpversion();
		return mail($to,$subject,$message,$headers);
	}

	static function getUrlQuery($gets)
	{
		$query = "";
		foreach($gets as $key => $get)
		{
			if( is_string( $get ))
			{
				if( $key != "currentmodule" && $key != "ajax" && $key != "simple" && $key != "uid"  && $key != "TemplateChange")
					$query .= $key."=".$gets[$key]."&";
			}
		}
		
		return $query;
	}

	static function debug( $o )
	{
		if( ! is_string( $o ))
			$o = SoondaUtil::var_dump_str( $o );

		$o = addslashes( $o );
		$o = str_replace( "\r\n", "", $o);
		$o = str_replace( "\n", "", $o);
		return "<script> alert('".$o."'); </script>";
	}

	static function unzip($file, $to)
	{
		$zip = new ZipArchive;
		$res = $zip->open($file);
		if ($res === true) 
		{
		  // extract it to the path we determined above
		  $zip->extractTo($to);
		  $folder = $zip->getNameIndex( 0 );
		  $zip->close();  
		  return $folder;
		} 
		else 
		{
		  return false;
		}
	}

	static function filename($path) 
	{ 
		$separator = " qq "; 
		//$path = preg_replace("/[^ ]/u", $separator."\\$0".$separator, $path); 
		$base = basename($path); 
		//$base = str_replace($separator,"",$base); 
		return $base; 
	} 

	static function directory( $path )
	{
		$filename = SoondaUtil::filename( $path );
		//echo "filename : $path ".$filename."<br>";
		$path = str_replace( $filename, "", $path );
		return substr($path, 0, strlen( $path ) - 1);
	}

	static function parentdir( $path )
	{
		if( substr($path, strlen( $path ) - 1, 1) == "/" )
		{
			$path = substr($path, 0, strlen( $path ) - 1);
		}

		if( substr($path, strlen( $path ) - 1, 1) == "\\" )
		{
			$path = substr($path, 0, strlen( $path ) - 1);
		}


		$spath = explode("/", $path);
		//var_dump ($spath );

		if( count( $spath ) == 1)
			$spath = explode("\\", $path );

		$lastDir = $spath[ count( $spath ) - 1 ];
		//echo "last dir ".$lastDir."<br>";
		$path = str_replace( $lastDir, "", $path);

		if( substr($path, strlen( $path ) - 1, 1) == "/" )
		{
			$path = substr($path, 0, strlen( $path ) - 1);
		}

		if( substr($path, strlen( $path ) - 1, 1) == "\\" )
		{
			$path = substr($path, 0, strlen( $path ) - 1);
		}

		return $path;
	}

	static function getDirectoryFiles( $dir, $ext = "*" )
	{
		$dh  = opendir($dir);
		while (false !== ($filename = readdir($dh))) {
			$pathInfo = pathinfo( $dir."/".$filename);
			$extension = $pathInfo["extension"];
			if( strtolower( $extension ) == $ext || $ext == "*")
				$files[] = $filename;
		}

		return $files;
	}

	public static function deleteDir($dirPath) {
		if (! is_dir($dirPath)) 
		{
			continue;
		}
		else
		{
			if (substr($dirPath, strlen($dirPath) - 1, 1) != '/') {
				$dirPath .= '/';
			}
			$files = glob($dirPath . '*', GLOB_MARK);
			foreach ($files as $file) {
				if (is_dir($file)) {
					self::deleteDir($file);
				} else {
					unlink($file);
				}
			}
			rmdir($dirPath);
		}
	}

	
	public static function includeComponentFiles( $componentName, $config )
	{
		$baseName = str_replace("com_", "", $componentName);
		$logicpath = $config["logic_path"];
		$datamodelpath = $config["datamodel_path"];
		$comppath = $config["component_path"];
		$adapterpath = $config["adapter_path"];
		
		include_once( $logicpath. "/".$baseName."BO.php");
		include_once( $adapterpath. "/".$baseName."Adapter.php");
		include_once( $datamodelpath. "/".$baseName."Data.php");
		include_once( $comppath. "/com_".$baseName.".php");

	}

	public static function renderBetween( $html, $tag, $data, $formater = null )
	{
		$s = "";
		$tmpl = SoondaUtil::getStringBetween( $html, "<".$tag.">", "</".$tag.">" );
		foreach( $data as $key => $item )
		{
			$vars = $item->_getvars();
			$stmp = "";
			foreach($vars as $key => $prop )
			{
					$val = $item->$key;
					if( $formater != null)
					{
						$oFormater = $formater[$prop];
						$val = $oFormater->format($val);
					}
				
					if( $stmp == "")
						$stmp = str_replace("{SOO.DATA:".$key."}", $val, $tmpl);
					else
						$stmp = str_replace("{SOO.DATA:".$key."}", $val, $stmp);
				
			}
			//echo htmlspecialchars( $stmp );
			$s .= $stmp;
		}
		return $s;
	}

}

class Formatter
{
	function format($val)
	{
	}
}

class XMLSerializer
{
	static function objToXML( $o)
	{
		$xml = "<?xml version='1.0' encoding='UTF-8' ?>\r\n";
		$xml .= self::getXMLFromObj( $o );
		return $xml;
	}
	static function getXMLFromObj( $o )
	{
		$xml = "<".get_class( $o ).">\r\n";
		$arr = get_object_vars($o);

		if( $arr != null)
		{
			foreach( $arr as $key => $var )
			{
				if( get_class( $o->$key ) == null &&  is_array( $o->$key ) == false )
					$xml .= "<".$key.">\r\n".$var."</".$key.">\r\n";
				else if( is_array( $o->$key ) )
				{
					$xml .= self::getXmlFromArray($o->$key, $key);
				}
				else
					$xml .= self::getXMLFromObj( $o->$key );
			}
		}
		$xml .= "</".get_class( $o ).">\r\n";
		return $xml;
	}

	static function getXmlFromArray($arr, $varname)
	{
		$scontent = "";
		$i = 0;
		foreach( $arr as $keyc => $valc )
		{
			if( get_class ( $valc ) != null  )
				$scontent .= self::getXMLFromObj( $valc );
			else if( is_array ( $valc )   )
				$scontent .= self::getXmlFromArray( $valc, $varname."_".$i."_detail"  );
			else
				$scontent .= "<".$varname.">\r\n".$valc."</".$varname.">\r\n";
		}
		$xml .= "<".$varname."s>\r\n".$scontent."</".$varname."s>\r\n";
		return $xml;
	}



}





?>