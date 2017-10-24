<?php

class Page {

	private $_top;
	private $_bottom;
  private $_title;
  private $_headSection = "";

function __construct($title = "Default") {
	$this->_title = $title;
}

function getTop() {
	return $this->_top;
}
function getBottom() {
	return $this->_bottom;
}
function setTop() {
	$returnVal = "";
	$returnVal .= "<!doctype html>";
	$returnVal .= "<html>";
	$returnVal .= "<head><title>";
	$returnVal .= $this->_title;
	$returnVal .= "</title>";
  $returnVal .= $this->_headSection;
	$returnVal .= "</head>";
	$returnVal .= "<body>";

	$this->_top = $returnVal;
}

function setBottom() {
	$returnVal = "";
	$returnVal .= "</body>\n";
	$returnVal .= "</html>";

	$this->_bottom = $returnVal;
}

function setHeadSection($include) {
  $this->_headSection .= $include;
} //end function setHeadSection

} // end class

?>
