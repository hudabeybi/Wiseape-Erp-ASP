<?php

class FileModuleWS  extends SoondaWS
{
	function upload()
	{
		
		$filename = $this->param["filename"];
		$targetFilename = $this->param["targetfilename"];

		$uploaddir = dirname(__FILE__). '/uploaded/';
		$uploadfile = $uploaddir . basename($targetFilename);

		if (move_uploaded_file($_FILES['uploadedFile']['tmp_name'], $uploadfile)) {
			$res = array( "Result" => true, "Data" => $targetFilename, "Message" => "Ok"  );
		} else {
			$res = array( "Result" => false, "Data" => $targetFilename, "Message" => "Upload failed" .$_FILES["uploadedFile"]["error"] );
		}
		return $res;
	}

	function download()
	{
		$filename = $this->param["filename"];
		$uploaddir = dirname(__FILE__). '/uploaded/';
		$uploadfile = $uploaddir . basename($filename);

		header("Content-type: image/jpeg");
		readfile($uploadfile);


		//$res = array( "Result" => true, "Data" => "http://localhost:8080/Wiseape-Erp-PHP/Server/WebBackend/Bin/Module.WebService/uploaded/".$filename, "Message" => "Ok"  );

		//return $res;
		return null;
	}

	function delete()
	{
		$filename = $this->param["filename"];
		$uploaddir = dirname(__FILE__). '/uploaded/';
		$uploadfile = $uploaddir . basename($filename);
		$res = array( "Result" => true, "Data" => $uploadfile, "Message" => "Deleted"  );
		try
		{
			unlink($uploadfile);
		}
		catch(Exception $e)
		{
			$res = array( "Result" => false, "Data" => $e, "Message" => "Delete fail"  );
		}
		return $res;
	}
}

?>