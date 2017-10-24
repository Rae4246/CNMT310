<?php
SESSION_start();
require_once "Page.php";
$page = new Page("Form");
$page->setTop();
$page->setBottom();
$errors = array();
$loggedIn = false;
print $page->getTop();
//improve this logic! it is terrible
if (isset($_POST['username']))
{
		$fh = @fopen("password.txt","r");
		if (is_resource($fh))
		{
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
		else
		{
			print "unable to open file";
		}
	if (!$loggedIn) {
		$errors[] = "Username or password incorrect";
	}
	else 
	{
		print "Welcome";
		$_SESSION['istrue'] = 'its set';
		$_SESSION['username'] = $_POST['username'];
		header('Location: inst.php');/// redirect to new page
	}
}
if (count($errors) > 0 || !isset($_POST['username'])) 
{
  foreach ($errors as $error) {
    print $error . "<br />\n";
  }
  print "<form action='form.php' method='POST'>\n";
  print "Username: <input type='text' name='username'><br />\n";
  print "Password: <input type='password' name='password'><br />\n";
  print "<input type='submit' name='submit'>\n";
  print "</form>\n";
}
print $page->getBottom();
?>