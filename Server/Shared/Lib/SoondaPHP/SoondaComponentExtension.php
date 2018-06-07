<?php

class LookupPageParam
{
	var $data;
	var $keyColumn;
	var $displayColumn;
	var $lookupTable;
	var $combo;
}

class SoondaComponentExtension extends SoondaComponent
{
	function run()
	{
		$task = $this->getTask("view");
		switch($task)
		{
			case "viewLookup":
					$html = $this->viewLookup();
				break;
			case "selectLookupItem":
				break;
			default:
				$html = parent::run( $task );
		}

		return $html;
	}

	function viewLookup()
	{
		$table = $this->post["lookupTable"];
		$keyColumn = $this->post["keyColumn"];
		$dispColumn = $this->post["displayColumn"];
		$combo = $this->post["combo"];

		$bo = $this->getBO( $this->getComponentName() );
		
		$adapter = $this->getAdapter( $this->getComponentName() );
		
		$lookupData = $bo->getLookupDataByTable(  $adapter, $table );
		
		$param = new LookupPageParam();
		$param->data = $lookupData;
		$param->keyColumn = $keyColumn;
		$param->displayColumn = $dispColumn;
		$param->lookupTable = $table;
		$param->combo = $combo;

		$page = new LookupPage();
		$sContent = $page->render( $param );
		$html = $this->showDialogAddEditPage( $sContent );
		return $html;
	}
}



?>