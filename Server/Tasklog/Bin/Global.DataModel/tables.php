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
* 	Created Date: 7/25/2017 6:13:00 PM
* 
* **********************************************************************/



class tasklog extends SoondaData
{
	//var properties

	var $IdTaskLog;

	var $TaskTitle1;

	var $TaskTitle2;

	var $TaskTitle3;

	var $TaskTitle4;

	var $TaskDate;

	function __construct()
	{
	}//end of constructor


	protected function _get_IdTaskLog()
	{
		return $this->IdTaskLog;
	}

	protected function _set_IdTaskLog($value)
	{
		$this->IdTaskLog = $value;
	}


	protected function _get_TaskTitle1()
	{
		return $this->TaskTitle1;
	}

	protected function _set_TaskTitle1($value)
	{
		$this->TaskTitle1 = $value;
	}


	protected function _get_TaskTitle2()
	{
		return $this->TaskTitle2;
	}

	protected function _set_TaskTitle2($value)
	{
		$this->TaskTitle2 = $value;
	}


	protected function _get_TaskTitle3()
	{
		return $this->TaskTitle3;
	}

	protected function _set_TaskTitle3($value)
	{
		$this->TaskTitle3 = $value;
	}


	protected function _get_TaskTitle4()
	{
		return $this->TaskTitle4;
	}

	protected function _set_TaskTitle4($value)
	{
		$this->TaskTitle4 = $value;
	}


	protected function _get_TaskDate()
	{
		return $this->TaskDate;
	}

	protected function _set_TaskDate($value)
	{
		$this->TaskDate = $value;
	}


}


?>