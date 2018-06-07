<?php

class ProcessModuleDetailPage extends SoondaPageView
{
	function render( $pageParam, $filename = "" )
	{
		$html = parent::render( $pageParam, $filename );
		$html = $this->displayData( $html, $pageParam->Data );

		$html = parent::SetOtherThings( $pageParam, $html, "ProcessModule" );
		return $html;
	}

	function displayData( $html, $data)
	{

		$html = str_replace( "{SOO.DATA:ProcessNo}", $data->ProcessNo, $html);

		$html = str_replace( "{SOO.DATA:ProcessName}", $data->ProcessName, $html);

		$html = str_replace( "{SOO.DATA:ProcessInfo}", $data->ProcessInfo, $html);

		$html = str_replace( "{SOO.DATA:ProcessCreatedDate}", date("d M Y h:i:s", strtotime($data->ProcessCreatedDate)), $html);					

		$html = str_replace( "{SOO.DATA:ApplicationId}", $data->application_ApplicationName, $html);

		$html = str_replace( "{SOO.DATA:PreviousWorkflowEvaluatorId}", $data->PreviousWorkflowEvaluatorId, $html);

		$html = str_replace( "{SOO.DATA:NextWorkflowEvaluatorId}", $data->NextWorkflowEvaluatorId, $html);

		$html = str_replace( "{SOO.DATA:WorkflowId}", $data->workflow_WorkflowName, $html);

		$html = str_replace( "{SOO.DATA:CreatedByUserId}", $data->CreatedByUserId, $html);

		$html = str_replace( "{SOO.DATA:ProcessGroupId}", $data->processgroup_ProcessGroupName, $html);

		return $html;
	}


/*
	Function: getButtonContainer()
	Desc	: this function overrides parent's getButtonContainer() function. 
	This function will be called by  parent's render function. It returns the HTML element ID that will hold the buttons.
	Param	: 
	- 
	Return :
	-	ID string of HTML element that holds the buttons.
	*/
	public function getButtonContainer()
	{
		return "div-button-container";
	}

	/*
	Function: addButtons()
	Desc	: this function overrides parent's addButtons() function. This function will be called by  parent's render function.	  
	Param	: 
	- 
	*/
	public function addButtons()
	{
		//Add default 'Back' Button
		parent::addButtons();
	}
}

?>