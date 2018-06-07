<?php

class SoondaApplication extends Soonda
{
	var $Template;
	var $TemplatePages;

	function run( $config)
	{

		$this->setGetAndPost();
		$this->config = $config;
		$this->get = &$_GET;
		$this->post = &$_POST;
		$this->session = &$_SESSION;
		$this->dbConnection = $this->createDbConnection();
		
		if( !isset( $this->session["Template"] )
		{
			$this->Template = $this->getTemplate();
			$this->session["Template"] = $this->Template;
			if($this->Template == null)
				die("No template information is provided in the database. Please create the template first");
			$this->setTemplatePages();
		}
		
		//If served as Web service only
		if( $this->get["framework"] == "no")
		{
			$compname = $this->get["component"];
			$compInfo = explode("/",  $compname);
			$comprealname = $compInfo[ count($compInfo) - 1];

			//file_put_contents("Ddd.txt", $comprealname);

			$compPath = str_replace( $comprealname, "", $compname);
			$compFile = $compPath.$comprealname."/".$comprealname.".php";
			include_once( $compFile);
			$comp = new $comprealname();
			$comp->UniqueId = "";
			$comp->componentName = $comprealname;
			$comp = $this->initGlobalParam( $comp );
			echo $comp->run();
		}
		else
		{

			if($this->config["ajax"] == "0")
			{
				$this->get["ajax"] = "0";
				$this->get["firstload"] = "1";
			}

			$htmls = array();

			//Load components for the current module. If the current module is not set, get from the database. Get the module as default.
			if( !isset($this->get["module"]) || $this->get["module"] == "" )
			{
				$modules = ModuleComponentContainerAdapter::getAll( $this->dbConnection, "IsDefault = 1 and (AppName LIKE '".SoondaUtil::encodeHTML($this->config["appname"])."' or AppName LIKE '".$this->config["appname"]."') "  );
				$defaultModule = $this->getDefaultModule();

				if($defaultModule == null)
					die("No module is specified, and no default module exists");
		
				$this->get["module"] = $defaultModule;
				$_GET["module"] = $defaultModule;
				$_POST["module"] = $defaultModule;
			}
			
			if(isset($this->get["ajax"]) )
			{
				$moduleController = "";
				//Load default application components on first load, if there's no firstload = 1 parameter, the default components are not loaded.
				if( isset($this->get["firstload"])  )
				{
					if(!isset($this->get["simple"]) ||  ( isset($this->get["simple"]) && $this->get["simple"] != "true" ) )
					{
						$htmls = $this->loadApplicationComponents();
					}
				}
	 
				if($this->get["ajax"] == "1")
				{
					$i = 0;
					$sHtml = "";
		 
					foreach($htmls as $key => $html)
					{
		 
						if( $i < count($htmls) - 1)
		 
							$sHtml .= $html."<<||>>";
		 
						else
		 
							$sHtml .= $html;
		 
					}
					$sHtml= str_replace( "{SOO.DATA:OGMETATAGS}", $this->getOgMetaTags(), $sHtml);
					echo $sHtml;
				}
				else
				{
					$tmpl = $this->loadTemplate();
					
					$i = 0;
		 
					foreach($htmls as $key => $html)
					{
						$ss = explode("<-|->", $html);
						if(count($ss) >= 2)
						{
							$id = $ss[0];
							$s = $ss[1];
							$tmpl = SoondaUtil::insertTextIntoElementById( $tmpl, $id, $s );
						}
					}
					$tmpl = str_replace( "{SOO.DATA:OGMETATAGS}", $this->getOgMetaTags(), $tmpl);
					echo $tmpl;
				}
			}
			else
			{
				unset($this->session["layoutId"]);
				unset($this->session["condition"]);
				unset($this->session["summaryId"]);
				unset($this->session["sortdir"]);
				unset($this->session["sortby"]);
				unset($this->session["page"]);
				unset($this->session["limit"]);
				unset($this->session["graphType"]);
				$ss = $this->loadTemplate();
				$ss = str_replace( "{SOO.DATA:OGMETATAGS}", $this->getOgMetaTags(), $ss);
				echo $ss;
				//if( isset($this->get["firstload"]) )
				echo "<script id='10'> document.body.onload = Soonda.loadModule(''); </script>";
	 
			}
		}
 
	}


	//Function to get Default module
	function getDefaultModule()
	{
		$modules = ModuleComponentContainerAdapter::getAll( $this->dbConnection, "IsDefault = 1 and (AppName LIKE '".SoondaUtil::encodeHTML($this->config["appname"])."' or AppName LIKE '".$this->config["appname"]."') "  );

		if(count( $modules) > 0)
			return $modules[0];
		else 
			return null;
	}

	function getTemplate()
	{
		$appname = $this->config["appname"];
		$templateData = AdminApplicationAdapter::getAll( $this->dbConnection, "AppName LIKE '$appname'");

		if(count($templateData) > 0)
		{
			$template = $templateData[0];
			return $template;
		}
		else
			return null;
	}

	function setTemplatePages()
	{
		$idTemplate = $this->Template->IdTemplate;
		$templatePages = TCMS_TemplatePagesAdapter::getAll( $this->dbConnection, "TemplateId = $idTemplate" );
		if(count( $templatePages) > 0)
		{
			$this->TemplatePages = $templatePages;
			$this->session["TemplatePages"] = $templatePages;
		}
		else
			die("No template pages for specific template");
	}
 
	function loadApplicationComponents()
	{
 
		//$components = $this->config["application"]["components"]["default"];
 
		$components = ModuleComponentContainerAdapter::getAll( $this->dbConnection, "ModuleId = 1 AND AppName LIKE '".SoondaUtil::encodeHTML($this->config["appname"])."'" );
 

		if(count($components) == 0)
		{
			$components = ModuleComponentContainerAdapter::getAll( $this->dbConnection, "ModuleId = 1 AND AppName LIKE '".$this->config["appname"]."'" );
		}
		
 
		if( isset($this->config["application"]["page"]["file"]))
		{
			$pageFile = $this->config["application"]["page"]["file"];
			$pageComponent = $this->config["application"]["page"]["class"];
			include_once( $pageFile);
		}
		else
			$pageComponent = "SoondaPage";
  
		$page = new $pageComponent();
		$page = $this->initGlobalParam( $page);

		foreach($components as $key => $component)
		{

			$output = "";
 
			$component->ComponentParam = str_replace("{currentmodule}", $this->get["module"], $component->ComponentParam);
 
			$component->ComponentParam = stripslashes($component->ComponentParam);
 
			if( $component->ComponentParam != "" )
			{
 
				parse_str( $component->ComponentParam, $output);

			}
			 
			include_once("components/".$component->Component."/".$component->Component.".php");

			$this->includeComponentFiles( $component->Component );

			$compName = $component->Component;


			$comp = new $compName();

			$comp->componentName = $compName;

			$comp->UniqueId = $component->IdModuleComponent;
 
			$comp->_ComponentInfo = $component;

			$task = $component->Task;

			$this->get["task".$compName."_".$comp->UniqueId] = $task;
 
			$comp = $this->initGlobalParam( $comp);
 
			if(count($output) > 0 && $output != "")
 
			{
 
				foreach($output as $key => $value)
 
				{
 
					$comp->addParam(stripslashes($key), stripslashes($value));
 
					//$this->post[stripslashes($key)] = stripslashes($value);

					//$this->get[stripslashes($key)] = stripslashes($value);
 
				}
 
			}

			
 
			$page->add( $comp);
 
		}

		return $page->render(); 
	}
 

 
	function loadTemplatePages( $module )
	{
 
		$template = $this->Template;
 
		$content = SoondaUtil::getContent( $template);
 
		$path = pathinfo( $template);
 
		$content = str_replace( "{SOONDA:TEMPLATEPATH}", $path["dirname"], $content);
 
		$content = str_replace( "{SOONDA:APPNAME}", $this->config["appname"], $content);

		return $content;
 
	}
 
}
 
?>