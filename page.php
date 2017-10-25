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
	print $this->_top;
}
function getBottom() {
	print $this->_bottom;
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
	$returnVal .= "<h1> The top is working</h1>";
	$this->_top = $returnVal;
}
function setBottom() {
	$returnVal = "";
	$returnVal .= "<h1> The bottom is working</h1>";
	$returnVal .= "</body>\n";
	$returnVal .= "</html>";
	$this->_bottom = $returnVal;
}
function setHeadSection($include) {
  $this->_headSection .= $include;
} //end function setHeadSection
} // end class


?>