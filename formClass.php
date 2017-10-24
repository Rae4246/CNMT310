<?php

require_once("page.php");

class Form extends Page {
	
	private $_form;
	
	function getForm() {
		print $this->_form;
	}
	
	function setForm(){	
		
		$this->_form .= "";
		$this->_form .= "<form method='post'>";
		$this->_form .= "<label>Stack </label><select><option value='op1'>Option 1</option><option value='op2'>Option 2</option><option value='op3'>Option 3</option><option  value='op4'>Option 4</option></select></br>";
		$this->_form .= "<label>Song Title </label><input type='text' name='songTitle' required><br>";
		$this->_form .= "<label>Song Artist </label><input type='text' name='songArtist' required><br>";
		$this->_form .= "<label>Album </label><input type='text' name='album' required><br>";
		$this->_form .= "<label>Label </label><input type='text' name='label' required><br>";
		$this->_form .= "<input type='submit' name='submit'></form>";
	}
	
	
}
?>
