<?php
/*
* This file is generated using SoondaCodeGenerator Pluggin for Soonda Application Builder Code Generator.
* Don't modify this file directly.
* This file may be replaced during re-code generation, any changes to this file may be replaced.
* Instead, Create new file and class that inherits this class to add functionality and modification.
*/

/***********************************************************************
* 
* 	File Name: tables.php
* 	Created Date: 7/21/2017 3:23:52 PM
* 
* **********************************************************************/



class application extends SoondaData
{
	//var properties

	var $IdApplication;

	var $ApplicationName;

	var $ApplicationTitle;

	var $ApplicationInfo;

	var $ApplicationIconSmall;

	var $ApplicationIconMiddle;

	var $ApplicationIconLarge;

	var $ApplicationPath;

	var $ApplicationFile;

	var $ApplicationClass;

	var $ApplicationMainFunction;

	var $DisplayIcon;

	var $IsActive;

	var $UseWorkflow;

	function __construct()
	{
	}//end of constructor


	protected function _get_IdApplication()
	{
		return $this->IdApplication;
	}

	protected function _set_IdApplication($value)
	{
		$this->IdApplication = $value;
	}


	protected function _get_ApplicationName()
	{
		return $this->ApplicationName;
	}

	protected function _set_ApplicationName($value)
	{
		$this->ApplicationName = $value;
	}


	protected function _get_ApplicationTitle()
	{
		return $this->ApplicationTitle;
	}

	protected function _set_ApplicationTitle($value)
	{
		$this->ApplicationTitle = $value;
	}


	protected function _get_ApplicationInfo()
	{
		return $this->ApplicationInfo;
	}

	protected function _set_ApplicationInfo($value)
	{
		$this->ApplicationInfo = $value;
	}


	protected function _get_ApplicationIconSmall()
	{
		return $this->ApplicationIconSmall;
	}

	protected function _set_ApplicationIconSmall($value)
	{
		$this->ApplicationIconSmall = $value;
	}


	protected function _get_ApplicationIconMiddle()
	{
		return $this->ApplicationIconMiddle;
	}

	protected function _set_ApplicationIconMiddle($value)
	{
		$this->ApplicationIconMiddle = $value;
	}


	protected function _get_ApplicationIconLarge()
	{
		return $this->ApplicationIconLarge;
	}

	protected function _set_ApplicationIconLarge($value)
	{
		$this->ApplicationIconLarge = $value;
	}


	protected function _get_ApplicationPath()
	{
		return $this->ApplicationPath;
	}

	protected function _set_ApplicationPath($value)
	{
		$this->ApplicationPath = $value;
	}


	protected function _get_ApplicationFile()
	{
		return $this->ApplicationFile;
	}

	protected function _set_ApplicationFile($value)
	{
		$this->ApplicationFile = $value;
	}


	protected function _get_ApplicationClass()
	{
		return $this->ApplicationClass;
	}

	protected function _set_ApplicationClass($value)
	{
		$this->ApplicationClass = $value;
	}


	protected function _get_ApplicationMainFunction()
	{
		return $this->ApplicationMainFunction;
	}

	protected function _set_ApplicationMainFunction($value)
	{
		$this->ApplicationMainFunction = $value;
	}


	protected function _get_DisplayIcon()
	{
		return $this->DisplayIcon;
	}

	protected function _set_DisplayIcon($value)
	{
		$this->DisplayIcon = $value;
	}


	protected function _get_IsActive()
	{
		return $this->IsActive;
	}

	protected function _set_IsActive($value)
	{
		$this->IsActive = $value;
	}


	protected function _get_UseWorkflow()
	{
		return $this->UseWorkflow;
	}

	protected function _set_UseWorkflow($value)
	{
		$this->UseWorkflow = $value;
	}


}



class process extends SoondaData
{
	//var properties

	var $IdProcess;

	var $ProcessNo;

	var $ProcessName;

	var $ProcessInfo;

	var $ProcessCreatedDate;

	var $ApplicationId;

	var $PreviousWorkflowEvaluatorId;

	var $NextWorkflowEvaluatorId;

	var $WorkflowId;

	var $CreatedByUserId;

	var $ProcessGroupId;

	function __construct()
	{
	}//end of constructor


	protected function _get_IdProcess()
	{
		return $this->IdProcess;
	}

	protected function _set_IdProcess($value)
	{
		$this->IdProcess = $value;
	}


	protected function _get_ProcessNo()
	{
		return $this->ProcessNo;
	}

	protected function _set_ProcessNo($value)
	{
		$this->ProcessNo = $value;
	}


	protected function _get_ProcessName()
	{
		return $this->ProcessName;
	}

	protected function _set_ProcessName($value)
	{
		$this->ProcessName = $value;
	}


	protected function _get_ProcessInfo()
	{
		return $this->ProcessInfo;
	}

	protected function _set_ProcessInfo($value)
	{
		$this->ProcessInfo = $value;
	}


	protected function _get_ProcessCreatedDate()
	{
		return $this->ProcessCreatedDate;
	}

	protected function _set_ProcessCreatedDate($value)
	{
		$this->ProcessCreatedDate = $value;
	}


	protected function _get_ApplicationId()
	{
		return $this->ApplicationId;
	}

	protected function _set_ApplicationId($value)
	{
		$this->ApplicationId = $value;
	}


	protected function _get_PreviousWorkflowEvaluatorId()
	{
		return $this->PreviousWorkflowEvaluatorId;
	}

	protected function _set_PreviousWorkflowEvaluatorId($value)
	{
		$this->PreviousWorkflowEvaluatorId = $value;
	}


	protected function _get_NextWorkflowEvaluatorId()
	{
		return $this->NextWorkflowEvaluatorId;
	}

	protected function _set_NextWorkflowEvaluatorId($value)
	{
		$this->NextWorkflowEvaluatorId = $value;
	}


	protected function _get_WorkflowId()
	{
		return $this->WorkflowId;
	}

	protected function _set_WorkflowId($value)
	{
		$this->WorkflowId = $value;
	}


	protected function _get_CreatedByUserId()
	{
		return $this->CreatedByUserId;
	}

	protected function _set_CreatedByUserId($value)
	{
		$this->CreatedByUserId = $value;
	}


	protected function _get_ProcessGroupId()
	{
		return $this->ProcessGroupId;
	}

	protected function _set_ProcessGroupId($value)
	{
		$this->ProcessGroupId = $value;
	}


}



class processdata extends SoondaData
{
	//var properties

	var $IdProcessData;

	var $PreviousProcessId;

	var $Data;

	var $NextProcessId;

	var $WorkflowId;

	var $SessionCode;

	function __construct()
	{
	}//end of constructor


	protected function _get_IdProcessData()
	{
		return $this->IdProcessData;
	}

	protected function _set_IdProcessData($value)
	{
		$this->IdProcessData = $value;
	}


	protected function _get_PreviousProcessId()
	{
		return $this->PreviousProcessId;
	}

	protected function _set_PreviousProcessId($value)
	{
		$this->PreviousProcessId = $value;
	}


	protected function _get_Data()
	{
		return $this->Data;
	}

	protected function _set_Data($value)
	{
		$this->Data = $value;
	}


	protected function _get_NextProcessId()
	{
		return $this->NextProcessId;
	}

	protected function _set_NextProcessId($value)
	{
		$this->NextProcessId = $value;
	}


	protected function _get_WorkflowId()
	{
		return $this->WorkflowId;
	}

	protected function _set_WorkflowId($value)
	{
		$this->WorkflowId = $value;
	}


	protected function _get_SessionCode()
	{
		return $this->SessionCode;
	}

	protected function _set_SessionCode($value)
	{
		$this->SessionCode = $value;
	}


}



class processgroup extends SoondaData
{
	//var properties

	var $IdProcessGroup;

	var $ProcessGroupName;

	var $ProcessGroupTitle;

	var $ProcessGroupInfo;

	var $IconSmall;

	var $IconMiddle;

	var $IconLarge;

	var $IsActive;

	var $IsDisplay;

	function __construct()
	{
	}//end of constructor


	protected function _get_IdProcessGroup()
	{
		return $this->IdProcessGroup;
	}

	protected function _set_IdProcessGroup($value)
	{
		$this->IdProcessGroup = $value;
	}


	protected function _get_ProcessGroupName()
	{
		return $this->ProcessGroupName;
	}

	protected function _set_ProcessGroupName($value)
	{
		$this->ProcessGroupName = $value;
	}


	protected function _get_ProcessGroupTitle()
	{
		return $this->ProcessGroupTitle;
	}

	protected function _set_ProcessGroupTitle($value)
	{
		$this->ProcessGroupTitle = $value;
	}


	protected function _get_ProcessGroupInfo()
	{
		return $this->ProcessGroupInfo;
	}

	protected function _set_ProcessGroupInfo($value)
	{
		$this->ProcessGroupInfo = $value;
	}


	protected function _get_IconSmall()
	{
		return $this->IconSmall;
	}

	protected function _set_IconSmall($value)
	{
		$this->IconSmall = $value;
	}


	protected function _get_IconMiddle()
	{
		return $this->IconMiddle;
	}

	protected function _set_IconMiddle($value)
	{
		$this->IconMiddle = $value;
	}


	protected function _get_IconLarge()
	{
		return $this->IconLarge;
	}

	protected function _set_IconLarge($value)
	{
		$this->IconLarge = $value;
	}


	protected function _get_IsActive()
	{
		return $this->IsActive;
	}

	protected function _set_IsActive($value)
	{
		$this->IsActive = $value;
	}


	protected function _get_IsDisplay()
	{
		return $this->IsDisplay;
	}

	protected function _set_IsDisplay($value)
	{
		$this->IsDisplay = $value;
	}


}



class workflow extends SoondaData
{
	//var properties

	var $IdWorkflow;

	var $WorkflowNo;

	var $WorkflowName;

	var $WorkflowDesc;

	function __construct()
	{
	}//end of constructor


	protected function _get_IdWorkflow()
	{
		return $this->IdWorkflow;
	}

	protected function _set_IdWorkflow($value)
	{
		$this->IdWorkflow = $value;
	}


	protected function _get_WorkflowNo()
	{
		return $this->WorkflowNo;
	}

	protected function _set_WorkflowNo($value)
	{
		$this->WorkflowNo = $value;
	}


	protected function _get_WorkflowName()
	{
		return $this->WorkflowName;
	}

	protected function _set_WorkflowName($value)
	{
		$this->WorkflowName = $value;
	}


	protected function _get_WorkflowDesc()
	{
		return $this->WorkflowDesc;
	}

	protected function _set_WorkflowDesc($value)
	{
		$this->WorkflowDesc = $value;
	}


}



class workflowevaluator extends SoondaData
{
	//var properties

	var $IdWorkflowEvaluator;

	var $EvaluatorOperationType;

	var $ImmediateRunNext;

	var $WorkflowId;

	function __construct()
	{
	}//end of constructor


	protected function _get_IdWorkflowEvaluator()
	{
		return $this->IdWorkflowEvaluator;
	}

	protected function _set_IdWorkflowEvaluator($value)
	{
		$this->IdWorkflowEvaluator = $value;
	}


	protected function _get_EvaluatorOperationType()
	{
		return $this->EvaluatorOperationType;
	}

	protected function _set_EvaluatorOperationType($value)
	{
		$this->EvaluatorOperationType = $value;
	}


	protected function _get_ImmediateRunNext()
	{
		return $this->ImmediateRunNext;
	}

	protected function _set_ImmediateRunNext($value)
	{
		$this->ImmediateRunNext = $value;
	}


	protected function _get_WorkflowId()
	{
		return $this->WorkflowId;
	}

	protected function _set_WorkflowId($value)
	{
		$this->WorkflowId = $value;
	}


}



class workflowevaluatoritem extends SoondaData
{
	//var properties

	var $IdWorkflowEvaluatorItem;

	var $WorkflowEvaluatorExpression;

	var $NextProcessId;

	var $WorkflowEvaluatorId;

	function __construct()
	{
	}//end of constructor


	protected function _get_IdWorkflowEvaluatorItem()
	{
		return $this->IdWorkflowEvaluatorItem;
	}

	protected function _set_IdWorkflowEvaluatorItem($value)
	{
		$this->IdWorkflowEvaluatorItem = $value;
	}


	protected function _get_WorkflowEvaluatorExpression()
	{
		return $this->WorkflowEvaluatorExpression;
	}

	protected function _set_WorkflowEvaluatorExpression($value)
	{
		$this->WorkflowEvaluatorExpression = $value;
	}


	protected function _get_NextProcessId()
	{
		return $this->NextProcessId;
	}

	protected function _set_NextProcessId($value)
	{
		$this->NextProcessId = $value;
	}


	protected function _get_WorkflowEvaluatorId()
	{
		return $this->WorkflowEvaluatorId;
	}

	protected function _set_WorkflowEvaluatorId($value)
	{
		$this->WorkflowEvaluatorId = $value;
	}


}



class workflowevaluatortype extends SoondaData
{
	//var properties

	var $IdWorkflowEvaluatorType;

	var $EvaluatorType;

	var $IsActive;

	function __construct()
	{
	}//end of constructor


	protected function _get_IdWorkflowEvaluatorType()
	{
		return $this->IdWorkflowEvaluatorType;
	}

	protected function _set_IdWorkflowEvaluatorType($value)
	{
		$this->IdWorkflowEvaluatorType = $value;
	}


	protected function _get_EvaluatorType()
	{
		return $this->EvaluatorType;
	}

	protected function _set_EvaluatorType($value)
	{
		$this->EvaluatorType = $value;
	}


	protected function _get_IsActive()
	{
		return $this->IsActive;
	}

	protected function _set_IsActive($value)
	{
		$this->IsActive = $value;
	}


}


?>