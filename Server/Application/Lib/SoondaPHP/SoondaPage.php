<?php

class SoondaPage extends Soonda
{
	var $pages;

	function SoondaPage()
	{
		$this->pages = array();
	}
	function loadTemplate()
	{
		$template = $this->config["template"];
		$content = SoondaUtils::getContent( $template);
		return $content;
	}
	function add( $comp)
	{
		//array_push( $this->pages, $comp);
		$this->pages[] = $comp;
	}

	function render()
	{
		$sHtmls = array();
		foreach($this->pages as $key => $comp)
		{
			$container = $comp->_ComponentInfo->ContainerName;  //$this->getContainerForComponent( $comp);
			//echo $container."<br>";
			if($container != "")
			{
				$html = $comp->run();
				
				//var_dump( $htmls);
				//echo $container."<-->".htmlspecialchars($html)."<br>";
				array_push( $sHtmls, $container."<-|->".$html);
			}
		}
		
		return $sHtmls;
	}

	function getContainerForComponent( $component)
	{
		//$containers = ModuleComponentContainerAdapter::getAll( $this->dbConnection, "ComponentId = '".$component."' and modulename = ''" );;
		foreach($containers as $container => $comps)
		{
			if(in_array( $component, $comps  ))
			{
				return $container;
			}
		}

		return null;
	}


}

?>