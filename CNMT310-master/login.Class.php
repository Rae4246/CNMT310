<?php



class LoginForm  {
	
	private $_form;
	private $_loginFormSection = "";
	function getLoginForm() {
		return $this->_form;
	}
	
	function setLoginForm(){	
		
		
		$this->_form .= "<form action='#' method='POST'>\n";
		$this->_form .= "Username: <input type='text' name='username'><br />\n";
		$this->_form .= "Password: <input type='password' name='password'><br />\n";
		$this->_form .= "<input type='submit' name='submit'>\n";
		$this->_form .= "</form>\n";
		$this->_form .= $this->_loginFormSection;
	}
	function setLoginFormSection($include) {
	  $this->_loginFormSection .= $include;
	} //end function setBottomSection
	

	//private $errors = array();
	//private $loggedIn = false;
	function youLogin(){
		$errors = array();
		$loggedIn = false;
		if (isset($_POST['username'])) {
		//$fh = @fopen("password.txt","r");// xammp file path
		$fh = @fopen("/home/jkiev461/webfiles/password.txt","r"); // school file path
		if (is_resource($fh)) {
			while ($line = fgets($fh)) 
				{
						$creds = explode("|",$line);
						if ($_POST['username'] == rtrim($creds[0]) && 
									$_POST['password'] == rtrim($creds[1]))
						{
								$loggedIn = true;
								$_SESSION['istrue'] = 'its set';
						}  					
				} //end while
		}	
		else {
			print "unable to open  pass file";
		}
		
		if (!$loggedIn) {
			$errors[] = "Username or password incorrect";
		}
		else 
		{
			print "Welcome";
			$_SESSION['istrue'] = 'its set';
			$_SESSION['username'] = $_POST['username'];
			//header('Location: inst.php');/// redirect to new page
		}
		}	
		if (count($errors) > 0 || !isset($_POST['username'])) {
			foreach ($errors as $error) {
				print $error . "<br />\n";
			}
		}
	}//end function
	
	
	
}

?>