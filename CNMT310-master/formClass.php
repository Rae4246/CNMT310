<?php
require_once("page.php");
class Form extends Page {
	
	private $_form;
	private $_songContainer;
	private $_songSection ="";
	private $_formSection = "";
	function getSongs() {
		echo "$this->_songContainer";
	}
	function getForm() {
		echo "$this->_form";
	}
	
	function setForm(){	
		
		$this->_form .= "<div class='log-css'>";
		$this->_form .= "<form method='post'>";
		$this->_form .= "<div class='row'>";
		$this->_form .= "<div class='row-item'><label>Song Title </label> <input type='text' name='songTitle' required></div>";
		$this->_form .= "<div class='row-item'><label>Song Artist </label><input type='text' name='songArtist' required></div>";
		$this->_form .= "</div>";
		$this->_form .= "<div class='row'>";
		$this->_form .= "<div class='row-item'><label>Album </label><input type='text' name='album' required></div>";
		$this->_form .= "<div class='row-item'><label>Label </label><input type='text' name='label' required></div>";
		$this->_form .= "</div>";
		$this->_form .= "<div class='row'>";
		$this->_form .= "<div class='row-item'><label>Stack </label><select name='stack'>
																			<option value='1'>Option 1</option>
																			<option value='2'>Option 2</option>
																			<option value='3'>Option 3</option>
																			<option  value='4'>Option 4</option>
																			<option  value='5'>Option 5</option>
																			</select></div>";
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
	
	
	function setSongContainer(){
		
		$this->_songContainer .= "<div id='song_container'>";
		$this->_songContainer .= "<div class='colors rec-0 rec-1'>";
		$this->_songContainer .= "<div class='song_content'>";
		$this->_songContainer .= "Songs go here";
		$this->_songContainer .= "</div></div>";// Ends container and colors
		$this->_songContainer .= $this->songSection;
	}
	
	
	function setSongSection($include) {
		$this->_songContainer .= $include;
	}
}
?>