<?php

require_once("page.php");

class Form extends Page {
	
	private $_form;
	private $_formSection = "";
	function getForm() {
		print $this->_form;
	}
	
	function setForm(){	
		
		$this->_form .= "<div id='log-css>";
		$this->_form .= "<form method='post'>";
		$this->_form .= "<div class='row'>";
		$this->_form .= "<div class='row-item'><label>Song Title <input type='text' name='songTitle' required></div>";
		$this->_form .= "<div class='row-item'><label>Song Artist </label><input type='text' name='songArtist' required></div>";
		$this->_form .= "</div>";
		$this->_form .= "<div class='row'>";
		$this->_form .= "<div class='row-item'><label>Album </label><input type='text' name='album' required></div>";
		$this->_form .= "<div class='row-item'><label>Label </label><input type='text' name='label' required></div>";
		$this->_form .= "</div>";
		$this->_form .= "<div class='row'>";
		$this->_form .= "<div class='row-item'><label>Stack </label><select><option value='op1'>Option 1</option><option value='op2'>Option 2</option><option value='op3'>Option 3</option><option  value='op4'>Option 4</option></select></div>";
		$this->_form .= "</div>";
		$this->_form .= "<div class='row'>";
		$this->_form .= "<div class='row-item'><input type='submit' name='submit'></form>";
		$this->_form .= "</div>";
		$this->_form .= "</div>";
		$this->_form .= $this->_formSection;
	}
	function setformSection($include) {
	  $this->_formSection .= $include;
	} //end function setBottomSection
}
?>
