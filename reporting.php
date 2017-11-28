<?php
SESSION_start();
	
require_once("page.php");
require_once("formClass.php");
require_once("DB.class.php");
require_once("login.Class.php");
$page = new Page();
$form = new Form();
$login = new LoginForm();
$db = new DB();
$page->getTop();
$login->setLoginForm();


$page->setHeadSection("<link rel='stylesheet' type='text/css' href='style_log.css'>");
$page->setHeadSection("<link rel='stylesheet' type='text/css' href='style.css'>");
$page->setHeadSection("<link rel='stylesheet' type='text/css' href='style_acc.css'>");
$page->setHeadSection("<link rel='stylesheet' type='text/css' href='style_prev.css'>");
$page->setNavSection("<ul><li><a href='inst.php'>Music Entry</a></li><li><a href='backInTime.php'>Previously Played</a></li><li><a href='querys.php'>Playlist Log</a></li><li><a href='reporting.php'>Free-Form Reporting</a></li><li><a href='adminedit.php'>Admin Edit Page</a></li></ul>");

$page->setHeaderCoverSection("<div class='head-title'><h1>WWSP - 90FM<h1><h2>DJ Hub</h2></div>");
$page->setHeaderCoverSection("<div class='head-logo'><img src='WWSP_90fm_mic.png'></div>");


$page->setHeaderCoverSection("<div class='head-login'>");
$page->setHeaderCoverSection($login->getLoginForm());
$page->setHeaderCoverSection("</div>");							  

							  
$page->setTop();
$page->getTop();


if (!$db->getConnStatus()) {
  print "An error has occurred with connection\n";
  exit;
}

print"<form method='post'>";
print"<label>Top Ten</label><input type='submit' name='topTen'></n>";// top ten 
print "<br>";
print"<label>5 Most Played Stack 1</label><input type='submit' name='mostplayed1'></n>"; /// 5  most played songs 
print "<br>";
print"<label>5 most played Stack 2</label><input type='submit' name='mostplayed2'></n>"; /// 5  most played songs 
print "<br>";
print"<label>5 most played Stack 3</label><input type='submit' name='mostplayed3'></n>"; /// 5  most played songs 
print "<br>";
print"<label>5 most played Stack 4</label><input type='submit' name='mostplayed4'></n>"; /// 5  most played songs 
print "<br>";
print"<label>5 most played Stack 5</label><input type='submit' name='mostplayed5'></n>"; /// 5  most played songs 
print"</form>";


//the where in regards to time needs to be fixed in 
//each query as well as count needs to be used and displayed in a columb

if (isset($_POST['topTen'])){ /// if click topten do dis stuff
	$count = 2;
	$query = "SELECT *
			  FROM musiclist 
			  WHERE (sec_to_time(date)-25200) > 0
			  LIMIT 0,10 ; "; ////// enter all querys here 
	$result = $db->dbCall($query); 
	
	print "<table>
	<tr>
		<th> Date</th>
		<th> song title</th>
		<th> song artist</th>
		<th> album</th>
		<th> count</th>
	</tr>";

	foreach ($result as $row) { 
	
		print	"<tr>";	
		print		"<td>" .  $row['date'] . "</td>";
		print		"<td>" .  $row['songtitle'] . "</td>";
		print		"<td>" .  $row['songartist'] . "</td>";
		print		"<td>" .  $row['album'] . "</td>";
		print		"<td>" .  $count . "</td>";
		print	"</tr>";
	}
	print "</table>";	
	
	exit();		
}

if (isset($_POST['mostplayed1'])){ /// if click mostplayed do dis stuff
	$count = 2;
	$query = "SELECT * 
			  FROM musiclist  
			  WHERE stack = 1 
			  AND (sec_to_time(date)-25200) > 0 
			  LIMIT 0,5 ; "; ////// enter all querys here 
	$result = $db->dbCall($query); 
	
	print "<table>
	<tr>
		<th> song title</th>
		<th> song artist</th>
		<th> album</th>
		<th> count</th>
	</tr>";

	foreach ($result as $row) { 
	
		print	"<tr>";		
		print		"<td>" .  $row['songtitle'] . "</td>";
		print		"<td>" .  $row['songartist'] . "</td>";
		print		"<td>" .  $row['album'] . "</td>";
		print		"<td>" .  $count . "</td>";
		print	"</tr>";
	}
	print "</table>";	
	
	exit();		
}

if (isset($_POST['mostplayed2'])){ /// if click mostplayed do dis stuff
	$count = 2;
	$query = "SELECT * 
			  FROM musiclist 
			  WHERE stack = 2  
			  AND (sec_to_time(date)-25200) > 0 
			  LIMIT 0,5 ; "; ////// enter all querys here 
	$result = $db->dbCall($query); 
	
	print "<table>
	<tr>
		<th> song title</th>
		<th> song artist</th>
		<th> album</th>
		<th> count</th>
	</tr>";

	foreach ($result as $row) { 
	
		print	"<tr>";		
		print		"<td>" .  $row['songtitle'] . "</td>";
		print		"<td>" .  $row['songartist'] . "</td>";
		print		"<td>" .  $row['album'] . "</td>";
		print		"<td>" .  $count . "</td>";
		print	"</tr>";
	}
	print "</table>";	
	
	exit();		
}

if (isset($_POST['mostplayed3'])){ /// if click mostplayed do dis stuff
	$count = 2;
	$query = "SELECT *
			  FROM musiclist  
			  WHERE stack = 3  
			  AND (sec_to_time(date)-25200) > 0 
			  LIMIT 0,5 ; "; ////// enter all querys here 
	$result = $db->dbCall($query); 
	
	print "<table>
	<tr>
		<th> song title</th>
		<th> song artist</th>
		<th> album</th>
		<th> count</th>
	</tr>";

	foreach ($result as $row) { 
	
		print	"<tr>";		
		print		"<td>" .  $row['songtitle'] . "</td>";
		print		"<td>" .  $row['songartist'] . "</td>";
		print		"<td>" .  $row['album'] . "</td>";
		print		"<td>" .  $count . "</td>";
		print	"</tr>";
	}
	print "</table>";		
	
	exit();		
}

if (isset($_POST['mostplayed4'])){ /// if click mostplayed do dis stuff
	$count = 2;
	$query = "SELECT *
			  FROM musiclist  
			  WHERE stack = 4 
			  AND (sec_to_time(date)-25200) > 0 
			  LIMIT 0,5 ; "; ////// enter all querys here 
	$result = $db->dbCall($query); 
	
	print "<table>
	<tr>
		<th> song title</th>
		<th> song artist</th>
		<th> album</th>
		<th> count</th>
	</tr>";

	foreach ($result as $row) { 
	
		print	"<tr>";		
		print		"<td>" .  $row['songtitle'] . "</td>";
		print		"<td>" .  $row['songartist'] . "</td>";
		print		"<td>" .  $row['album'] . "</td>";
		print		"<td>" .  $count . "</td>";
		print	"</tr>";
	}
	print "</table>";		
	
	exit();		
}

if (isset($_POST['mostplayed5'])){ /// if click mostplayed do dis stuff
	
	$count = 2;
	$query = "SELECT * 
			  FROM musiclist  
			  WHERE stack = 5  
			  AND (sec_to_time(date)-25200) > 0 
			  LIMIT 0,5 ; "; ////// enter all querys here 
	$result = $db->dbCall($query); 
	
	print "<table>
	<tr>
		<th> song title</th>
		<th> song artist</th>
		<th> album</th>
		<th> count</th>
	</tr>";

	foreach ($result as $row) { 
	
		print	"<tr>";		
		print		"<td>" .  $row['songtitle'] . "</td>";
		print		"<td>" .  $row['songartist'] . "</td>";
		print		"<td>" .  $row['album'] . "</td>";
		print		"<td>" .  $count . "</td>";
		print	"</tr>";
	}
	print "</table>";		
	
	exit();		
}

/////// log in stuff/////
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
		header('Location: reporting.php');/// redirect to new page
	}
}
if (count($errors) > 0 || !isset($_POST['username'])) {
  foreach ($errors as $error) {
    print $error . "<br />\n";
  }
}
////// end of log in stuff

$page->setBottom();
$page->getBottom();

?>