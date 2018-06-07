<?php

function SoondaErrorHandler($errno, $errstr, $errfile, $errline)
{
	if (!(error_reporting() & $errno)) {
        // This error code is not included in error_reporting
        return;
    }

	switch($errno)
	{
	
	   case E_WARNING:
			echo "<b>[PHP_Warning]<br></b>(".$errno.") -> ".$errstr." in ".$errfile." at line ".$errline."<br/><br/>\n\n";
			break;

		case E_NOTICE:
		   echo "<b>[PHP_Notice]<br></b>(".$errno.") -> ".$errstr." in ".$errfile." at line ".$errline."<br/><br/>\n\n";
			break;

		default:
			echo "<b>[PHP_Error]<br></b>(".$errno.") -> ".$errstr." in ".$errfile." at line ".$errline."<br/><br/>\n\n";
			break;
	}
	

	return true;
}

function shutdown() {
    $isError = false;
	$phperror = "";

    if ($error = error_get_last()){
    switch($error['type']){
    case E_ERROR:
		$phperror = "[PHP_ERROR]";
    case E_CORE_ERROR:
		$phperror = "[PHP_ERROR]";
    case E_COMPILE_ERROR:
		$phperror = "[PHP_ERROR]";
    case E_USER_ERROR:
		$phperror = "[PHP_ERROR]";
    case E_RECOVERABLE_ERROR:
		$phperror = "[PHP_ERROR]";
    case E_CORE_WARNING:
		$phperror = "[PHP_WARNING]";
    case E_COMPILE_WARNING:
		$phperror = "[PHP_WARNING]";
    case E_PARSE:
		$phperror = "[PHP_ERROR]";
        $serror = "$phperror <br>Level:" . $error['type'] . " <br>\n <b>Message : </b>\n" . $error['message'] . ".<br>\n <b>File:</b> <b>" . $error['file'] . "</b> <br>\n <b>Line:</b>" . $error['line'];
        echo $serror;
        }
    }


}

class SoondaApplication extends Soonda
{

	function run( $config )
	{
		if ( !isset( $_SESSION["lang"] ) )
			$_SESSION["lang"] = 1;
		
		$this->turnoff_magic_quote();

		//error and warning handler
		$old_error_handler = set_error_handler("SoondaErrorHandler");

		//error handler that handles errors causing the script terminate
		register_shutdown_function('shutdown');

		
		
		$this->config = $config;
		$this->dbConnection = $this->createDbConnection();
		$this->setPostAndGet();

		
		if( isset($this->get["framework"]) && $this->get["framework"] == "no")
		{
			
			$compname = $this->get["component"];
			$compInfo = explode("/",  $compname);
			$comprealname = $compInfo[ count($compInfo) - 1];

			//file_put_contents("Ddd.txt", $comprealname);

			//$compPath = str_replace( $comprealname, "", $compname);
			//$compFile = $compPath.$comprealname."/".$comprealname.".php";
			
			$compFile = $this->config["component_path"]."/".$comprealname;
			
			include_once( $compFile);
			$comp = new $comprealname();
			$comp->UniqueId = "";
			$comp->componentName = $comprealname;
			$comp = $this->initGlobalParam( $comp );
			$html = $comp->run();

			return $html;
		}
		else
		{

			//First, we should load the application information.
			$app = $this->loadApplicationInfo();
			

			if( (isset($this->get["module"]) && $this->get["module"] == "Login") || ( isset(  $this->config["loginrequired"] ) && $this->config["loginrequired"] == 1 && ( isset( $this->session["loginUser"] ) == false || $this->session["loginUser"] == "" ))  )
			{
				$module = $this->getModule("Login", $app->IdApp);
				$this->get["defferedModule"] = $this->get["module"];
				$components = $this->loadModuleComponentContainers( $module );
				
			}
			else
			{
				//Retrieve current Module and its template pages
				$module = $this->loadModuleAndTemplatePage( $app );
				$this->get["module"] = $module->ModuleName;
				$this->post["module"] = $module->ModuleName;
				$this->pageFile = $module->PageContent;
				
				
			
				//Retrieve DefaultApp module, defaultApp module is the module that will be executed in all over the module.
				//It's used to specified components that will be opened in every page, so it will be easier to define it.
				$defaultAppmodule = $this->loadDefaultAppModule( $app );

				$defaultAppComponents = null;
				if( !isset( $this->get["simple"]  ) )
					$this->get["simple"]  = "false";

				if( $this->get["simple"] != "true" )
				{
				//Retrieve DefaultApp module components
					$defaultAppComponents = $this->loadModuleComponentContainers( $defaultAppmodule );
				}
				//Retrieve module components
				$components = $this->loadModuleComponentContainers( $module );

				if( $defaultAppComponents != null )
				{
					//merge the component arrays
					$components = array_merge( $defaultAppComponents,   $components);
				}

				//echo "php_error";
				//var_dump($components);
			}

			//Process the module and the components
			$html = $this->processModuleAndComponent( $module, $components, $config, $app );

			//return the resulting html

			//unset( $_SESSION["lang"] );

			

			//echo htmlspecialchars($html) ;
			
			$html = $this->setMetaTags( $app, $html );

		
			
			//$html = htmlspecialchars( $html );
			
			return $html;
		}
	}

	function turnoff_magic_quote()
	{
		//Set magic quote off
		if ( in_array( strtolower( ini_get( 'magic_quotes_gpc' ) ), array( '1', 'on' ) ) )
		{
			foreach( $_POST as $key => $post )
			{
				if( is_array( $post ) )
				{
					foreach( $post as $key2 => $subPost )
					{
						if ( !is_array( $subPost ) )
						{
							$_POST[ $key ][ $key2 ] = stripslashes( $_POST[ $key ][ $key2 ] );
						}
					}
				}
				else
				{
					$_POST[ $key ] = stripslashes( $_POST[ $key ] );
				}
			}

			foreach( $_GET as $key => $GET )
			{
				if( is_array( $GET ) )
				{
					foreach( $GET as $key2 => $subGET )
					{
						if ( !is_array( $subGET ) )
						{
							$_GET[ $key ][ $key2 ] = stripslashes( $_GET[ $key ][ $key2 ] );
						}
					}
				}
				else
				{
					$_GET[ $key ] = stripslashes( $_GET[ $key ] );
				}
			}


			foreach( $_COOKIE as $key => $COOKIE )
			{
				if( is_array( $COOKIE ) )
				{
					foreach( $COOKIE as $key2 => $subCOOKIE )
					{
						if ( !is_array( $subCOOKIE ) )
						{
							$_COOKIE[ $key ][ $key2 ] = stripslashes( $_COOKIE[ $key ][ $key2 ] );
						}
					}
				}
				else
				{
					$_COOKIE[ $key ] = stripslashes( $_COOKIE[ $key ] );
				}
			}

		}
	}

	function setMetaTags($app, $html)
	{
		$html = str_replace( "{SOO:Title}", $app->Title, $html);

		$meta = "<meta name=\"keywords\" content=\"{SOO.DATA:Keywords}\">\r\n<meta name=\"description\" content=\"{SOO.DATA:Description}\">";
		$meta = str_replace( "{SOO.DATA:Keywords}", $app->Title, $meta);
		$meta = str_replace( "{SOO.DATA:Description}", $app->MetaDescription, $meta);
		
		$html = str_replace("{SOO:MetaTag}", $meta, $html);
		$html = str_replace("{SOO:Icon}", $app->MetaImage, $html);
		
		return $html;
	}

	function setPostAndGet()
	{
		foreach($_POST as $key => $post )
		{
			$_GET[$key] = $post;
		}

		foreach($_GET as $key => $get )
		{
			$_POST[$key] = $get;
		}
		
	}

	function loadApplicationInfo()
	{
		//Retrieve Application information
		$adapter = new AdminApplicationAdapter();
		$adapter->connection = $this->dbConnection;
		$apps = $adapter->getAll( "AppName LIKE '".$this->config["appname"]."'");
		if(count( $apps) > 0)
			$app = $apps[0];
		else
			die("Error : No application information is defined in database! Please define the application information first");
		
		return $app;
	}

	function getModule( $moduleName, $appId)
	{
		$adapter = new AdminModuleAdapter();
		$adapter->connection = $this->dbConnection;
		$modules = $adapter->getAll( "ModuleName = '".$moduleName."' and AppId = ".$appId );
		if(count($modules) == 0)
		{
			die("Error : No specified module is defined to be opened.");
		}
		else
		{
			$module = $modules[0];
			return $module;
		}
	}


	function loadModuleAndTemplatePage( $app )
	{
		//If not module is defined, retrieve default module.
		if( !isset( $this->get["module"]) || $this->get["module"] == ""  )
		{
			$adapter = new AdminModuleAdapter();
			$adapter->connection = $this->dbConnection;
			$modules = $adapter->getAll( "IsDefault = 1 and AppId = ".$app->IdApp );
			if(count($modules) == 0)
			{
				die("Error : No module is defined to be opened. Trying to retrieve default module, but failed!");
			}
			else
			{
				$module = $modules[0];
				return $module;
			}
		}
		else //if module is specified in url query
		{

			return $this->getModule ( $this->get["module"], $app->IdApp );
		}
		return null;
	}

	function loadDefaultAppModule( $app )
	{
		$adapter = new AdminModuleAdapter();
		$adapter->connection = $this->dbConnection;
		$modules = $adapter->getAll( "ModuleName = 'DefaultApp' and AppId = ".$app->IdApp );
		
		if(count($modules) > 0)
		{
			$module = $modules[0];
			return $module;
		}
		else
			return null;
	}

	function loadModuleComponentContainers( $module )
	{
		if($module != null)
		{
			$adapter = new ModuleComponentContainerAdapter();
			$adapter->connection = $this->dbConnection;
			$components = $adapter->getAll( "ModuleId = '".$module->IdModule."' " );
			//echo "Error ".$module->ModuleName." - ".count($components)."\r\n";
			return $components;
		}
		else
		{
			return null;
		}
	}

	function processModuleAndComponent( $module, $components, $config, $app )
	{
		$html = "";
		
		if( $config["ajax"] == "1")
		{
			$html = $this->processModuleAndComponentInAjaxEnvironment( $module, $components, $app );
			
		}
		else
		{
			$html = $this->processModuleAndComponentInNonAjaxEnvironment( $module, $components, $app );
			
		}

		$html = str_replace("{SOO:TEMPLATEPATH}",  $this->config["template_path"], $html);
		$html = str_replace("{SOO:UIPATH}",  $this->config["ui_path"], $html);
		$html = str_replace("{SOO:APPLIBPATH}",  $this->config["applib_path"], $html);
		$html = str_replace("{SOO:SHAREDLIBPATH}",  $this->config["sharedlib_path"], $html);
		$html = str_replace("{SOO:SHAREDRESOURCEPATH}",  $this->config["sharedresource_path"], $html);

		$dirname = $this->config["template_path"];
		$tmplPath = dirname($dirname."/". $module->PageContent);
		$html = str_replace("{SOO:USEDTEMPLATEPATH}",  $tmplPath, $html);
		$this->pageFile = $module->PageContent;

		return $html;
	}

	
	function processModuleAndComponentInNonAjaxEnvironment( $module, $components, $app )
	{
		//Get the page content
		$dirname = $this->config["template_path"];
		$tmpl = SoondaUtil::getContent( $dirname."/". $module->PageContent );
		//echo "TMPL :".$module->PageContent."<br>";
		
		//process each component item
		foreach( $components as $key => $componentInfo )
		{
			$containerName = $componentInfo->ContainerName;
			$component = $this->createTheComponent( $componentInfo );
			$component->pageFile = $this->pageFile;
			$resultHtml = $component->run();
			$resultHtml = $component->setModuleName( $resultHtml );

			$resultHtml = str_replace("{SOO:website}", $this->config["application"]["url"], $resultHtml);
			$resultHtml = str_replace("{SOO:APPLICATION}", $this->config["application"]["name"], $resultHtml);
			$resultHtml = str_replace("{SOO:UIPATH}", $this->config["ui_path"], $resultHtml);
			//Inject the component html result into the container
			
			$tmpl = SoondaUtil::insertTextIntoElementById( $tmpl, $containerName, $resultHtml );
		}
		return $tmpl;
	}

	function processModuleAndComponentInAjaxEnvironment( $module, $components, $app )
	{

		/*$currentPageName = "";
		echo "php_error ".$this->get["TemplateChange"]." ". $this->get["currentmodule"]." ".$module->ModuleName;
		if( isset( $this->get["currentmodule"]) && $this->get["currentmodule"] != $module->ModuleName)
		{
			$currentModule = $this->getModule($this->get["currentmodule"], $app->IdApp);
			$currentPageName = $currentModule->PageName;

			if( $currentPageName != $module->PageName )
			{
				$this->post["TemplateChange"] = 1;
				$this->get["TemplateChange"] = 1;
				
			}	
		}*/

		if( !isset( $this->get["currentmodule"] ))
			$this->get["currentmodule"] = "";


		if( !isset( $this->get["TemplateChange"] ))
		{
			if(isset( $this->post["TemplateChange"] ))
				$this->get["TemplateChange"] =  $this->post["TemplateChange"];
			else
			{
				$this->get["TemplateChange"] = "";
				$this->post["TemplateChange"] = $this->get["TemplateChange"];
			}
		}
		
		$this->post["TemplateChange"] = $this->get["TemplateChange"];


		if( ($this->get["currentmodule"] != $module->ModuleName && ($this->get["TemplateChange"] != "0" || $this->get["TemplateChange"] == "") ) || ( $this->get["currentmodule"] == $module->ModuleName && $this->get["TemplateChange"] == "1") )
		{
			//echo "hereee";

			unset($this->session["layoutId"]);
			unset($this->session["condition"]);
			unset($this->session["summaryId"]);
			unset($this->session["sortdir"]);
			unset($this->session["sortby"]);
			unset($this->session["page"]);
			unset($this->session["limit"]);
			unset($this->session["graphType"]);

			$html = $this-> processModuleAndComponentInNonAjaxEnvironment( $module, $components, $app );
			$html = str_replace("{SOO:website}", $this->config["application"]["url"], $html);
			$html = str_replace("{SOO:APPLICATION}", $this->config["application"]["name"], $html);
			$html = str_replace("{SOO:UIPATH}", $this->config["ui_path"], $html);

			$currentPageName = $module->PageContent;
			$html .= "<script> Soonda.currentModuleName = '".$module->ModuleName."';  Soonda.toAjaxLink(); </script>";
			return $html;

			/*$tmpl = SoondaUtil::getContent( $module->PageName );

			
			$param = "";
			foreach( $this->get as $key => $get )
			{
				if($key != "ajax" && $key != "module" && $key != "currentmodule" && $key != "simple")
					$param .= $key."=".$get."&";
			}
			/*foreach( $this->post as $key => $post )
			{
				if($key != "ajax" && $key != "module" && $key != "currentmodule" && $key != "simple")
					$param .= $key."=".$post."&";
			}*/
			//echo "error $param";
			//$tmpl .= "<script> Soonda.loadModule('".$module->ModuleName."', '', '$param', DefaultAnimatorContent, false); </script>";
			//echo htmlspecialchars( $tmpl );
			//return $tmpl;*/
		}
		else
		{
			//echo "hereee hghg";
			$tmpl = "";
			//process each component item
			foreach( $components as $key => $componentInfo )
			{
				$containerName = $componentInfo->ContainerName;
				$component = $this->createTheComponent( $componentInfo );
				$component->pageFile = $this->pageFile;
				$resultHtml = $component->run();
				$resultHtml = $component->setModuleName( $resultHtml );
				$resultHtml = str_replace("{SOO:website}", $this->config["application"]["url"], $resultHtml);
				$resultHtml = str_replace("{SOO:APPLICATION}", $this->config["application"]["name"], $resultHtml);
				//<|> is a separator for container and its content, <<|>> is separator between components. It will be processed by client's javascript.
				$tmpl .= $containerName."<-|->".$resultHtml."<<||>>";
			}
			//Cut the last trailling separator
			$tmpl = substr( $tmpl, 0, strlen( $tmpl) - strlen("<<||>>"));
			
			//return the result to browser
			return $tmpl;
		}
	}

	function createTheComponent( $componentInfo )
	{
		$componentName = $componentInfo->Component;
		//echo __SOO_COMPONENT_PATH__."/".$componentName."/".$componentName.".php";
		//include_once( __SOO_COMPONENT_PATH__."/".$componentName."/".$componentName.".php");
		include_once( $this->config["component_path"]."/".$componentName.".php");

		$component = new $componentName();
		$component->connection = $this->dbConnection;
		$component->componentName = $componentName;
		$component = $this->initGlobalParam( $component );
		$component = $this->parseComponentParams( $componentInfo->ComponentParam, $component );
		$component->UniqueId = $componentInfo->IdModuleComponent;
		$component->_ComponentInfo = $componentInfo;
		$component->pageFile = $this->pageFile;
		$task = $component->Task;

		$this->get["task".$componentName."_".$component->UniqueId] = $task;
		if( isset( $this->get["defferedModule"] ) )
			$component->get["defferedModule"] = $this->get["defferedModule"];
		else
			$component->get["defferedModule"] = "";
		
		return $component;
	}

	//Parse component parameters and add it to the component
	function parseComponentParams( $parameter, $component)
	{
		$output = "";
		if( $parameter != "")
		{
			parse_str( $parameter, $output);
			foreach( $output as $key => $value)
			{
				//echo "error huhu ".$component->componentName." -> $key ".SoondaUtil::decodeHTML($value) ;
				$key = str_replace("{SOO:UniqueId}", $component->UniqueId, $key);
				$key = str_replace("{SOO:UNIQUEID}", $component->UniqueId, $key);
				$component->addParam( $key, SoondaUtil::decodeHTML($value) );
			}
		}
		return $component;
	}
}


class TemplateChangeClass
{
	var $templateChange;
	function TemplateChangeClass($templateChange)
	{
		$this->templateChange = $templateChange;
	}
	function execute( $item, $row)
	{
		return ($this->templateChange != "") ? "&TemplateChange=".$this->templateChange : "";
	}
}

?>