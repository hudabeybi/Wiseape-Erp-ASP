<?php
//This file is generated using SoondaCodeGenerator Pluggin for Huda_AppBuilder.
//Don't modify this file directly. Create new file and class that inherits this class to add functionality and modification.
//This file may be replaced during re-code generation, any changes to this file may be replaced.

//**********************************************************************
//
//	Class Name: SoondaModuleContoller
//	Default Module Controller for soonda php framework 
//
//**********************************************************************

class SoondaModuleContoller extends Soonda
{
	var $post;
	var $get;
	var $session;
	var $config;

	function run()
	{

		$html = "";
		$task = "default";
		if(isset( $this->get["task"]))
			$task = $this->get["task"];

		//create Page Controller
		if( isset($this->config["modules"][$this->get["module"]]["page"]["file"]))
		{
			$pageFile = $this->config["modules"][$this->get["module"]]["page"]["file"];
			$pageComponent = $this->config["modules"][$this->get["module"]]["page"]["class"];
			include_once( $pageFile);
		}
		else
			$pageComponent = "SoondaPage";

		$page = new $pageComponent();
		
		//If simple is set, only load the components for current module, else it loads all, including default components for all module
		if(!isset($this->get["simple"]) )
				$this->get["simple"] = false;
		
		//Load all components
		$htmls = $this->loadModuleComponents($page, $this->get["module"], $task, $this->get["simple"]);
		
		return $htmls;
	}

	function loadModuleComponents( $page, $module, $task, $isSimple = false)
	{
		//Load components for the current module. If the current module is not set, get from the database. Get the module as default.
		if( !isset($this->get["module"]) || $this->get["module"] == "" )
		{
			$modules = ModuleComponentContainerAdapter::getAll( $this->dbConnection, "IsDefault = 1 and (AppName LIKE '".SoondaUtil::encodeHTML($this->config["appname"])."' or AppName LIKE '".$this->config["appname"]."') "  );
			$this->get["module"] = $modules[0]->ModuleName;
			$_GET["module"] = $modules[0]->ModuleName;
			$_POST["module"] = $modules[0]->ModuleName;
		}

		if( $isSimple == false)
		{
			//Load default components for all modules. ModuleId = 2, DefaultModule Module.
			$components = ModuleComponentContainerAdapter::getAll( $this->dbConnection, "ModuleId = 2 AND AppName LIKE '".SoondaUtil::encodeHTML($this->config["appname"])."'" );
			if(count($components) == 0)
			{
				$components = ModuleComponentContainerAdapter::getAll( $this->dbConnection, "ModuleId = 2 AND AppName LIKE '".$this->config["appname"]."'" );
			}
			foreach($components as $key => $component)
			{
				$output = "";
				$component->ComponentParam = str_replace("{currentmodule}", $this->get["module"], $component->ComponentParam);
				//echo "error ".$component->Component." - ".$component->ComponentParam;
				if( $component->ComponentParam != "" )
				{
					parse_str( $component->ComponentParam, $output);
				}
				
				include_once("./components/".$component->Component."/".$component->Component.".php");
				$this->includeComponentFiles( $component->Component );

				$compName = $component->Component;

				$comp = new $compName();

				$comp->_ComponentInfo = $component;

				
				$comp->UniqueId = $component->IdModuleComponent;

				$comp->componentName = $compName;

				$task = $component->Task;

				$this->get["task".$compName."_".$comp->UniqueId] = $task;

				$comp = $this->initGlobalParam( $comp );


 

				if(count($output) > 0)
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
		}



		//Load all the components for the current module.
		$query = "ModuleName LIKE '".$this->get["module"]."' AND AppName LIKE '".SoondaUtil::encodeHTML($this->config["appname"])."'";
		//echo "<br>========NGENTOOOOT========<br>";
		$components = ModuleComponentContainerAdapter::getAll( $this->dbConnection,  $query);

		if(count($components) == 0)
		{
			$query = "ModuleName LIKE '".$this->get["module"]."' AND AppName LIKE '".$this->config["appname"]."'";
			$components = ModuleComponentContainerAdapter::getAll( $this->dbConnection,  $query);
		}

		//var_dump($components);
		//echo "error $query ".count($components);
		foreach($components as $key => $component)
		{
			
			$output = "";
			$component->ComponentParam = str_replace(" ","", $component->ComponentParam);
            $component->ComponentParam = stripslashes($component->ComponentParam);
			if( $component->ComponentParam != "" )
			{
				parse_str( $component->ComponentParam, $output);
			}
			
			//Include the current module's component files.
			//echo $component->Component."<br>";
			include_once("components/".$component->Component."/".$component->Component.".php");
			$this->includeComponentFiles( $component->Component );

			$compName = $component->Component;
			//echo "ddd <br>";
			//var_dump($component);
			$comp = new $compName();
			//$comp->get["module"] = $component->ModuleName;
			$comp->_ComponentInfo = $component;
			
			$comp = $this->initGlobalParam( $comp );

			$comp->UniqueId = $component->IdModuleComponent;

			$comp->componentName = $compName;


			$task = $component->Task;

			$this->get["task".$compName."_".$comp->UniqueId] = $task;

			if(count($output) > 0 && $output != "")
			{
				foreach($output as $key => $value)
				{
					if($key != "")
					{
						$comp->addParam(stripslashes($key), stripslashes($value));

						//$this->post[stripslashes($key)] = stripslashes($value);

						//$this->get[stripslashes($key)] = stripslashes($value);
					}
				}
			}

			
			$page->add( $comp);
			
		}
						

		$s = $page->render();
		//echo htmlspecialchars(SoondaUtil::var_dump_str( $s));


		return $s;
	}
}


?>