<?php

class SetSelectedCombo
{
	var $field;
	var $value;

	function SetSelectedCombo( $field, $value)
	{
		$this->field = $field;
		$this->value = $value;
	}
	function execute ( $item, $rowID )
	{
		$result = "";
		$fieldname = $this->field;
		if( $item->$fieldname == $this->value )
			$result = "selected";
		else
			$result = "";
		
		return $result;
	}
}

class ImageRep
{
	var $field ;
	var $width = "200px";

	function ImageRep($f, $w = "")
	{
		$this->field = $f;
		$this->width = $w;
	}
	function execute($item, $rowIdx)
	{
		$f = $this->field;
		$value = $item->$f;
		$s = "";
		if($value != "")
		{
			$s = "<IMG src='".$value."' width='".$this->width."px' onclick=\"Soonda.previewImage('$value')\">";
		}
		return $s;
	}
}

class LinkRep
{
	var $field ;
	
	function LinkRep($f)
	{
		$this->field = $f;
		
	}
	function execute($item, $rowIdx)
	{
		$f = $this->field;
		$value = $item->$f;
		$s = "";
		if($value != "")
		{
			$s = "<A href='".$value."'>".$value."</A>";
		}
		return $s;
	}
}

class DateRep
{
	var $field ;
	function DateRep($f)
	{
		$this->field = $f;
	}
	function execute($item, $rowIdx)
	{
		$f = $this->field;
		$value = $item->$f;
		$s = "";
		if($value != "")
		{
			$s = date( "d-M-Y h:i:s", strtotime( $value) );
			
		}
		return $s;
	}
}


class Soonda
{
	var $get;
	var $post;
	var $session;
	var $config;
	var $dbConnection;
	var $parameters = array();
	var $ogMetaTags = array();
	var $UniqueId = "";
	var $children = array();
	var $pageFile;

	//This function returns the default Business Object for the component.
	//It uses the component name to retrieve the default logic object
	function getBO( $componentName = "", $compModelFile = "" )
	{
		$logicClass = $this->getParam("logic");
		$path = $this->config["logic_path"];
		$filename = $path."/".$logicClass.".php";

		$classFromComp = ( $componentName == "") ? str_replace("com_", "", $this->getComponentName())."BO" : str_replace("com_", "", $componentName)."BO";
		$filenamecomp = $path."/".$classFromComp.".php";
		$logic = null;

		if( $logicClass != "")
		{
			include_once( $filename );
			$logic = new $logicClass();
		}
		else
		{
			include_once( $filenamecomp );
			$logic = new $classFromComp();
		}

		$logic->setConfiguration( $this->config );
		$logic = $this->initGlobalParam( $logic );


		include_once( $this->getDataModelFile( ( $compModelFile == "" ) ? $componentName :  $compModelFile ) );
		return $logic;
	}

	//This function returns the default adapter for the component/
	//It uses component name to retrieve the adapter.
	function getAdapter( $componentName = "" )
	{
		$adapterClass = $this->getParam("adapter");
		$path = $this->config["adapter_path"];
		$filename = $path."/".$adapterClass.".php";

		$classFromComp = ( $componentName == "" ) ? str_replace("com_", "", $this->getComponentName())."Adapter" : str_replace("com_", "", $componentName)."Adapter";
		$filenamecomp = $path."/".$classFromComp.".php";
		$adapter = null;


		if( $adapterClass != "")
		{
			include_once( $filename );
			$adapter = new $adapterClass();
		}
		else
		{
			if(class_exists($classFromComp))
			{
				$adapter = new $classFromComp();
			}
			else
			{
				include_once( $filenamecomp );
				$adapter = new $classFromComp();
			}
		}
		//echo "adsfas";
		
		//var_dump( $adapter );
		$adapter->setConfiguration( $this->config );
		$adapter->connection = $this->dbConnection;
		return $adapter;
	}

	//This function retrieves default data model for the component,
	//Using component name
	function getDataModel( $componentName = "" )
	{
		$datamodelClass = $this->getParam("datamodel");
		$path = $this->config["datamodel_path"];
		$filename = $path."/".$datamodelClass.".php";

		$classFromComp = ( $componentName == "" ) ? str_replace("com_", "", $this->getComponentName())."Data" : str_replace("com_", "", $componentName)."Data";
		$filenamecomp = $path."/".$classFromComp.".php";
		$datamodel = null;

		if( $datamodelClass != "")
		{
			include_once( $filename );
			$datamodel = new $datamodelClass();
		}
		else
		{
			include_once( $filenamecomp );
			$datamodel = new $classFromComp();
		}
		
		//$datamodel->setConfiguration( $this->config );
		return $datamodel;
	}

	//This function returns the default data model file for this component
	function getDataModelFile( $componentName = "" )
	{
		$file = "";
		$datamodelClass = $this->getParam("datamodel");
		$path = $this->config["datamodel_path"];
		$filename = $path."/".$datamodelClass.".php";

		$classFromComp = ( $componentName == "") ? str_replace("com_", "", $this->getComponentName())."Data" : str_replace("com_", "", $componentName)."Data";
		$filenamecomp = $path."/".$classFromComp.".php";
		$datamodel = null;


		if( $datamodelClass != "")
		{
			$file = $filename;
		}
		else
		{
			$file = $filenamecomp;
		}
		
		
		return $file;
	}

	//This function return the page object for a given page name and the component.
	function getPage( $page, $componentName = "")
	{
		$simpComp = ( $componentName == "" ) ? str_replace("com_", "", $this->getComponentName()) : str_replace("com_", "", $componentName);
		$path = $this->config["ui_path"];
		$filename = $path."/".$simpComp."/".$page.".php";
		//echo "File Name : ".$filename;
		if( file_exists($filename))
		{
				include_once( $filename );
				$page = new $page();
		}
		else
		{
				$filename = $this->config["sharedlib_path"]."/Shared.UI/".$simpComp."/".$page.".php";
				include_once( $filename );
				$page = new $page();
		}

		return $page;
	}

	//This function returns the default UI List page for this component
	function getUIListPage(  $componentName = "" )
	{
		$simpComp = ( $componentName == "" ) ? str_replace("com_", "", $this->getComponentName()) : str_replace("com_", "", $componentName);
		$pageClass = $this->getParam("listpage");
		$path = $this->config["ui_path"];
		$filename = $path."/".$simpComp."/".$pageClass.".php";

		$classFromComp = $simpComp."ListPage";
		$filenamecomp = $path."/".$simpComp."/".$classFromComp.".php";
		$page = null;
		if( $pageClass != "")
		{

			include_once( $filename );
			$page = new $pageClass();
		}
		else
		{
			if( file_exists( $filenamecomp ) )
			{
				include_once( $filenamecomp );
				$page = new $classFromComp();
			}
			else
			{
				$path = $this->config["sharedlib_path"]."/Shared.UI";
				include_once( $path."/SoondaList/SoondaListPage.php");
				$page = new ListPage();
			}
		}

		$page->setConfiguration( $this->config );
		$page = $this->initGlobalParam( $page );
		return $page;
	}

	//This function returns the default html filename for this component
	function getUIListHTMLPage(  $componentName = "" )
	{
		$simpComp = ( $componentName == "" ) ? str_replace("com_", "", $this->getComponentName()) : str_replace("com_", "", $componentName);
		$pageClass = $this->getParam("listhtml");
		$path = $this->config["ui_path"];
		$filename = $path."/".$simpComp."/".$pageClass.".html";

		if( $pageClass == "")
		{
			$classFromComp = $simpComp."ListPage";
			$filename = $path."/".$simpComp."/".$classFromComp.".html";
			if( file_exists( $filename ) == false )
			{
				$path = $this->config["sharedlib_path"]."/Shared.UI";
				$filename = $path."/SoondaList/SoondaListPage.html";
			}
		}

		return $filename;
	}

	//This function returns the default detail page for this component
	function getUIDetailPage( $componentName = ""  )
	{
		$simpComp = ( $componentName == "" ) ? str_replace("com_", "", $this->getComponentName()) : str_replace("com_", "", $componentName);
		$pageClass = $this->getParam("detailpage");
		$path = $this->config["ui_path"];
		$filename = $path."/".$simpComp."/".$pageClass.".php";

		$classFromComp =$simpComp."DetailPage";
		$filenamecomp = $path."/".$simpComp."/".$classFromComp.".php";
		$page = null;
		if( $pageClass != "")
		{
			include_once( $filename );
			$page = new $pageClass();
		}
		else
		{
			include_once( $filenamecomp );
			$page = new $classFromComp();
		}

		$page->setConfiguration( $this->config );
		$page = $this->initGlobalParam( $page );
		return $page;
	}


	//This function returns the default UI Detail html filename for this component
	function getUIDetailHTMLPage( $componentName = "" )
	{
		$simpComp = ( $componentName == "" ) ? str_replace("com_", "", $this->getComponentName()) : str_replace("com_", "", $componentName);
		$pageClass = $this->getParam("detailhtml");
		$path = $this->config["ui_path"];
		$filename = $path."/".$simpComp."/".$pageClass.".html";

		if( $pageClass == "")
		{
			$classFromComp = $simpComp."DetailPage";
			$filename = $path."/".$simpComp."/".$classFromComp.".html";
		}

		return $filename;
	}

	//This function return the default UI Add Page for this component
	function getUIAddPage( $componentName = "" )
	{

		$simpComp = ( $componentName == "" ) ? str_replace("com_", "", $this->getComponentName()) : str_replace("com_", "", $componentName);
		$pageClass = $this->getParam("addpage");
		$path = $this->config["ui_path"];
		$filename = $path."/".$simpComp."/".$pageClass.".php";

		$classFromComp = $simpComp."AddPage";
		$filenamecomp = $path."/".$simpComp."/".$classFromComp.".php";
		$page = null;
		if( $pageClass != "")
		{
			include_once( $filename );
			$page = new $pageClass();
		}
		else
		{
			include_once( $filenamecomp );
			$page = new $classFromComp();
		}

		$page->setConfiguration( $this->config );
		$page = $this->initGlobalParam( $page );
		return $page;
	}

	//This function returns default UI Add html filename
	function getUIAddHTMLPage( $componentName = "" )
	{
		$simpComp = ( $componentName == "" ) ? str_replace("com_", "", $this->getComponentName()) : str_replace("com_", "", $componentName);
		$pageClass = $this->getParam("addhtml");
		$path = $this->config["ui_path"];
		$filename = $path."/".$simpComp."/".$pageClass.".html";

		if( $pageClass == "")
		{
			$classFromComp = $simpComp."AddPage";
			$filename = $path."/".$simpComp."/".$classFromComp.".html";
		}

		return $filename;
	}

	//This function returns the default UI Edit page object for this component
	function getUIEditPage( $componentName = "" )
	{
		$simpComp = ( $componentName == "" ) ? str_replace("com_", "", $this->getComponentName()) : str_replace("com_", "", $componentName);
		$pageClass = $this->getParam("editpage");
		$path = $this->config["ui_path"];
		$filename = $path."/".$simpComp."/".$pageClass.".php";

		$classFromComp = $simpComp."EditPage";
		$filenamecomp = $path."/".$simpComp."/".$classFromComp.".php";
		$page = null;
		if( $pageClass != "")
		{
			include_once( $filename );
			$page = new $pageClass();
		}
		else
		{
			include_once( $filenamecomp );
			$page = new $classFromComp();
		}

		$page->setConfiguration( $this->config );
		$page = $this->initGlobalParam( $page );
		return $page;
	}

	//This function returns the default UI Edit html file name for this component
	function getUIEditHTMLPage( $componentName = "")
	{
		$simpComp = ( $componentName == "" ) ? str_replace("com_", "", $this->getComponentName()) : str_replace("com_", "", $componentName);
		$pageClass = $this->getParam("edithtml");
		$path = $this->config["ui_path"];
		$filename = $path."/".$simpComp."/".$pageClass.".html";

		if( $pageClass == "")
		{
			$classFromComp = $simpComp."EditPage";
			$filename = $path."/".$simpComp."/".$classFromComp.".html";
		}

		return $filename;
	}

	//This function returns the default UI delete page object for this component
	function getUIDeletePage($componentName = "")
	{
		$simpComp = ( $componentName == "" ) ? str_replace("com_", "", $this->getComponentName()) : str_replace("com_", "", $componentName);
		$pageClass = $this->getParam("deletepage");
		$path = $this->config["ui_path"];
		$filename = $path."/".$simpComp."/".$pageClass.".php";

		$classFromComp = $simpComp."DeletePage";
		$filenamecomp = $path."/".$simpComp."/".$classFromComp.".php";
		$page = null;
		if( $pageClass != "")
		{
			include_once( $filename );
			$page = new $pageClass();
		}
		else
		{
			include_once( $filenamecomp );
			$page = new $classFromComp();
		}

		$page->setConfiguration( $this->config );
		$page = $this->initGlobalParam( $page );
		return $page;
	}

	//This function returns the default UI Delete page object for this component
	function getUIDeleteHTMLPage($componentName = "")
	{
		$simpComp = ( $componentName == "" ) ? str_replace("com_", "", $this->getComponentName()) : str_replace("com_", "", $componentName);
		$pageClass = $this->getParam("deletehtml");
		$path = $this->config["ui_path"];
		$filename = $path."/".$simpComp."/".$pageClass.".html";

		if( $pageClass == "")
		{
			$classFromComp = $simpComp."DeletePage";
			$filename = $path."/".$simpComp."/".$classFromComp.".html";
		}

		return $filename;
	}

	//This function returns the default UI Multiple delete page object for this component
	function getUIMultipleDeletePage($componentName = "")
	{
		$simpComp = ( $componentName == "" ) ? str_replace("com_", "", $this->getComponentName()) : str_replace("com_", "", $componentName);
		$pageClass = $this->getParam("multipledeletepage");
		$path = $this->config["ui_path"];
		$filename = $path."/".$simpComp."/".$pageClass.".php";

		$classFromComp = $simpComp."MultipleDeletePage";
		$filenamecomp = $path."/".$simpComp."/".$classFromComp.".php";
		$page = null;
		if( $pageClass != "")
		{
			include_once( $filename );
			$page = new $pageClass();
		}
		else
		{
			include_once( $filenamecomp );
			$page = new $classFromComp();
		}

		$page->setConfiguration( $this->config );
		$page = $this->initGlobalParam( $page );
		return $page;
	}

	function getUIMultipleDeleteHTMLPage($componentName = "")
	{
		$simpComp = ( $componentName == "" ) ? str_replace("com_", "", $this->getComponentName()) : str_replace("com_", "", $componentName);
		$pageClass = $this->getParam("multideletehtml");
		$path = $this->config["ui_path"];
		$filename = $path."/".$simpComp."/".$pageClass.".html";

		if( $pageClass == "")
		{
			$classFromComp = $simpComp."MultipleDeletePage";
			$filename = $path."/".$simpComp."/".$classFromComp.".html";
		}

		return $filename;
	}





	function addParam( $key, $fieldValue)
	{
		//echo "error ".$key."->".$fieldValue;
		$this->parameters [ $key] = $fieldValue;

		if($this->getParam("COMPID") != "")
			$this->UniqueId = $this->getParam("COMPID");
	}

	function getParam( $key)
	{
		//echo "Error ".$key." ".$this->parameters[$key]."<br>:";
		foreach( $this->parameters as $pkey => $value)
		{
			if( strtolower( $pkey ) == $key )
				return $value;
		}
		if(isset($this->parameters[$key]))
			return $this->parameters[$key];
		else
			return null;
	}

	function getModuleName()
	{
		if(isset($this->get["module"]))
			return $this->get["module"];
		else
		{
			return $this->post["module"];
		}
	}

	function getParamInfo()
	{
		return "Parameter Information";
	}

	function createObject( $file )
	{
		include_once( $file );
		//echo "error $file";
		$s = explode("/", $file);
		$filename = $s[ count($s) - 1 ];
		$className = str_replace( ".php", "", $filename );
		$obj = new $className();
		$obj = $this->initGlobalParam( $obj );
		return $obj;
	}
	
	function getOgMetaTags()
	{
		$s = "";
		if( isset($this->session["og"]))
		{
			foreach( $this->session["og"] as $key => $content)
			{
				$content = str_replace("\"", "", $content);
				$content = str_replace("\r\n", "", $content);
				$content = str_replace("\n", "", $content);
				$content = str_replace("\t", "", $content);
				$s .= "<meta property=\"".$key."\" content=\"".$content."\"/>\r\n";
			}
		}
		unset($this->session["og"]);
		return $s;
	}
	
	function addOgMetaTag( $key, $content )
	{
		$this->session["og"][$key] = $content;
	}

	function includeComponentFiles( $comp )
	{
		$compShort = str_replace("com_", "", $comp);
		if(file_exists( "components/".$comp."/data/".$compShort."Adapter.php" ))
			include_once("components/".$comp."/data/".$compShort."Adapter.php");
	
		if(file_exists( "components/".$comp."/pages/".$compShort."Page.php" ))
			include_once("components/".$comp."/pages/".$compShort."Page.php");
	}

	function crtDrArray( $tbl )
	{
		$arr = array();
		$fields = $this->dbConnection->GetMetaColumns($tbl);
		foreach($fields as $key => $f)
		{
			$arr[ $f->name ] = $f->name;
		}
		return $arr;
	}

	function setGetAndPost()
	{
		foreach( $_POST as $key => $post)
		{
			$_GET[$key] = $_POST[$key];
		}
		foreach( $_GET as $key => $get)
		{
			$_POST[$key] = $_GET[$key];
		}
	}

	function initGlobalParam($o)
	{
		$o->get = &$this->get;
		$o->post = &$this->post;
		$o->session = &$this->session;
		$o->config = $this->config;
		$o->dbConnection = &$this->dbConnection;
		$o->connection = &$this->dbConnection;
		$o->parameters = $this->parameters;
		return $o;
	}

	function urlQueryToPost( $query )
	{
		unset($this->post["addnew"]);
		unset($this->post["tobedeleted"]);

		$query = str_replace("[equal]", "=", $query);
		$query = str_replace("[and]", "&", $query);
		$arr = array();
		parse_str( $query, $arr );
		foreach( $arr as $key => $item )
		{
			$this->post[ $key ] = $item;
		}
	}

 
	function createDbConnection()
	{
 
		$dbengine = $this->config["dbengine"];
 
		$dbHost = $this->config["dbhost"];
 
		$dbDatabase = $this->config["dbdatabase"];
 
		$dbUser = $this->config["dbuser"];
 
		$dbPassword = $this->config["dbpassword"];

		$dbCon = new DbConnection( $dbengine, $dbHost, $dbDatabase, $dbUser, $dbPassword);
 
		return $dbCon;
 
	}

	protected function getRsXml( $rs, $primaryKey = "" )
	{
		$sXml = "";
		$rs->MoveFirst();

		//Column Info
		$sXml .= "<ColumnInfo>\r\n";
		for($i = 0; $i < $rs->FieldCount(); $i++)
		{
			$fld = $rs->FetchField($i);
			$fieldName = $fld->name;
			$type = $rs->MetaType($fld->type);
			$maxLength = $fld->max_length;
		
			$primary = "no";
			if( $fieldName == $primaryKey )
				$primary = "yes";

			$sXml .= "\t<Column idx='".$i."' name='".$fieldName."' encryptedName='".$this->enc($fieldName)."' type='".$type."' length='".$maxLength."' primarykey='".$primary."'></Column>\r\n";
		}
		$sXml .= "</ColumnInfo>\r\n";

		//Data
		$rowIdx = 0;
		$sXml .= "<Data>\r\n";
		while(!$rs->EOF)
		{
			$sXml .= "\t<Row idx='".$rowIdx."'>\r\n";
			for($i = 0; $i < $rs->FieldCount(); $i++)
			{
				$fld = $rs->FetchField($i);
				$fieldName = $fld->name;
				$value = $rs->Fields($fieldName);
				$value = str_replace("<br>", "\r\n", $value);
				$value = SoondaUtil::removeHTML( $value );
				$sXml .= "\t\t<Cell idx='".$i."' fieldName='".$fieldName."' encryptedFieldName='".$this->enc($fieldName)."' >".$value."</Cell>\r\n";
			}
			$sXml .= "\t</Row>\r\n";
			$rowIdx++;
			$rs->MoveNext();
		}
		$sXml .= "</Data>\r\n";
		return $sXml;
	}

	function createViewDataXML( $rs, $pk, $condition = "", $offset = 0, $limit = 20 )
	{
		$sXml = "<?xml version='1.0'?>\r\n";
		$sXml .= "<Object type='FormViewData'>\r\n";
		$sXml .= "<ViewData>".$this->getRsXml($rs, $pk)."</ViewData>\r\n";
		$sXml .= "<Condition>".$condition."</Condition>\r\n";
		$sXml .= "<Offset>".$offset."</Offset>\r\n";
		$sXml .= "<Limit>".$limit."</Limit>\r\n";
		$sXml .= "</Object>\r\n";

		return $sXml;
	}

	function createFormAddDataXML( $rsDetail, $pk, $rsLookupInfos)
	{
		//var_dump($rsDetail);
		$sXml = "<?xml version='1.0'?>\r\n";
		$sXml .= "<Object type='FormAddData'>\r\n";
		$sXml .= "<DetailData>".$this->getRsXml($rsDetail, $pk)."</DetailData>\r\n";

		$xmlLookups = "";
		$i = 0;
		foreach( $rsLookupInfos as $key => $rsLookupInfo )
		{
			$xmlLookups .= "<Lookup name='".$rsLookupInfo["name"]."'>".$this->getRsXml( $rsLookupInfo["rs"], $rsLookupInfo["pk"] )."</Lookup>";
			$i++;
		}
		$sXml .= "<Lookups>".$xmlLookups."</Lookups>\r\n";
		$sXml .= "</Object>\r\n";

		return $sXml;
	}

	function createFormEditDataXML( $rsDetail, $pk, $rsLookupInfos)
	{
		$sXml = "<?xml version='1.0'?>\r\n";
		$sXml .= "<Object type='FormAddData'>\r\n";
		$sXml .= "<DetailData>".$this->getRsXml($rsDetail, $pk)."</DetailData>\r\n";

		$xmlLookups = "";
		$i = 0;
		foreach( $rsLookupInfos as $key => $rsLookupInfo )
		{
			$xmlLookups .= "<Lookup name='".$rsLookupInfo["name"]."'>".$this->getRsXml( $rsLookupInfo["rs"], $rsLookupInfo["pk"] )."</Lookup>";
			$i++;
		}
		$sXml .= "<Lookups>".$xmlLookups."</Lookups>\r\n";
		$sXml .= "</Object>\r\n";

		return $sXml;
	}

	function createSaveResultDataXML( $result )
	{
		$sXml = "<?xml version='1.0'?>\r\n";
		$sXml .= "<Object type='SaveResultData'>\r\n";
		$sXml .= "<Result>".$result[0]."</Result>\r\n";
		$sXml .= "<Error>".$result[1]."</Error>\r\n";
		$sXml .= "</Object>";

		return $sXml;
	}

	function createDeleteResultDataXML( )
	{
		$sXml = "<?xml version='1.0'?>\r\n";
		$sXml .= "<Object type='SaveResultData'>\r\n";
		$sXml .= "<Result>true</Result>\r\n";
		$sXml .= "<Error></Error>\r\n";
		$sXml .= "</Object>";

		return $sXml;
	}
	function enc($s)
	{
		return "_".SoondaUtil::Encrypt($s);
	}

}



?>