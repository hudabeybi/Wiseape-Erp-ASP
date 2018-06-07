<?php


class ImageRenderer
{
	var $imageField;
	var $maxWidth;
	var $maxHeight;
	function ImageRenderer($field, $maxWidth="", $maxHeight="")
	{
		$this->imageField = $field;
		$this->maxHeight = $maxHeight;
		$this->maxWidth = $maxWidth;
	}
	function render($item, $rowId)
	{
		$h = "";
		$w = "";
		if( $this->maxHeight != "")
			$h = "height='".$this->maxHeight."'";
		if( $this->maxWidth != "")
			$w = "width='".$this->maxWidth."'";

		$f = $this->imageField;
		$val = $item->$f;
		if($val != "")
			$val = "<IMG $w $h src='".$val."'>";
		return $val;
	}
}

class DateRenderer
{
	var $field;
	var $format;
	function DateRenderer($field, $format="dd-M-yyyy")
	{
		$this->field = $field;
		$this->format = $format;
	}
	function render($item, $rowId)
	{
		
		$f = $this->field;
		$val = $item->$f;
		if($val != "")
			$val = date( $this->format, strtotime($val));
		return $val;
	}
}

?>