<?php



class LoginForm  {
	
	private $_form;
	private $_loginFormSection = "";
	function getLoginForm() {
		print $this->_form;
	}
	
	function setLoginForm(){	
		
		$this->_form .= "<div id='log-css>";
		$this->_form .= "<form action='inst.php' method='POST'>\n";
		$this->_form .= "Username: <input type='text' name='username'><br />\n";
		$this->_form .= "Password: <input type='password' name='password'><br />\n";
		$this->_form .= "<input type='submit' name='submit'>\n";
		$this->_form .= "</form>\n";
		$this->_form .= $this->_loginFormSection;
	}
	function setLoginFormSection($include) {
	  $this->_loginFormSection .= $include;
	} //end function setBottomSection
	
}

?>
