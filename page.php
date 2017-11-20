<?php

class Page {
	private $_top;
	private $_bottom;
	private $_title;
	private $_headSection = "";
	private $_bottomSection = "";
	private $_headerCoverSection = "";
	private $_navSection = "";
	private $_logFormSection = "";
	private $_songContainerSection = "";
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
		$returnVal .= "</head>";//ends head section
		$returnVal .= "<body><div class='wrapper'>";//Wrapper goes around EVERYTHING 
		$returnVal .= "<header>";//Header goes around Header cover and Nav
		$returnVal .= "<div class='header-cover'>";
		$returnVal .= $this->_headerCoverSection;
		$returnVal .= "</div><nav>";//start of Nav
		$returnVal .= $this->_navSection;
		$returnVal .= "</nav></header>";//Ends nav and header
		$returnVal .= "<section class='main-container'>";//opens main container section
		$returnVal .= "<div class='title-wrapper'><h2>Page title</h2></div>";
		$returnVal .= "<div class='main-content'>";
		$returnVal .= $this->_logFormSection;
		$returnVal .= $this->_songContainerSection;
		$returnVal .= "</div>";//ends main content section
		$this->_top = $returnVal;
	}
	function setBottom() {
		$returnVal = "";
		$returnVal .= "<h1> The bottom is working</h1>";
		$returnVal .= $this->_bottomSection;
		$returnVal .= "</div></body>\n";
		$returnVal .= "</html>";
		$this->_bottom = $returnVal;
	}
	function setHeadSection($include) {
	  $this->_headSection .= $include;
	} //end function setHeadSection
	
	function setHeaderCoverSection($include) {
	  $this->_headerCoverSection .= $include;
	} //end function setHeaderCoverSection
	
	function setNavSection($include) {
	  $this->_navSection .= $include;
	} //end function setNavSection
		
	function setLogFormSection($include) {
	  $this->_logFormSection .= $include;
	} //end function setLogFormSection
	
	function setSongContainerSection($include) {
	  $this->_songContainerSection .= $include;
	} //end function setSongContainerSection
	
	function setBottomSection($include) {
	  $this->_bottomSection .= $include;
	} //end function setBottomSection
} // end class


?>