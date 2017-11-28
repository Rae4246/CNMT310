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


$db->__construct();
$db->getConnStatus();
$db->dbConnect();

print"<form method='post'>";
print"<label>all the music</label><input type='submit' name='everything'></n>";// everything show me everything 
print"</form>";
if (isset($_POST['everything'])){ /// if click everything do dis stuff
	$query = "SELECT * 
			FROM musiclist 
			WHERE date > (sec_to_time(date)-25200) 
			ORDER BY  date DESC"; ////// enter all querys here 
	$result = $db->dbCall($query); 
	
	print "<table>
	<tr>
		<th> date </th>
		<th> announcer</th>
		<th> song title</th>
		<th> song artist</th>
		<th> album</th>
		<th> label</th>

	</tr>";

	foreach ($result as $row) { 
	
		print	"<tr>";		
		print		"<td>" .  $row['date'] . "</td>";
		print		"<td>" .  $row['announcer'] . "</td>";
		print		"<td>" .  $row['songtitle'] . "</td>";
		print		"<td>" .  $row['songartist'] . "</td>";
		print		"<td>" .  $row['album'] . "</td>";
		print		"<td>" .  $row['label'] . "</td></n>";

		print	"</tr>";
	}
	print "</table>";	

	while($row = $result->fetch_assoc()) {
		try {
			echo
			"<br> date: ". $row["date"]. " announcer: ". $row["announcer"]. 
			" songtitle: " . $row["songtitle"] ."songartist" . $row["songartist"] .
			"songartist" . $row["songtitle"] . "album" . $row["album"] . "label" . $row["label"] . "</n>";	
		}catch (Exception $e){
			print "end of dataset or no data";
			break;			
			}
	}

							  
}


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
		header('Location: querys.php');/// redirect to new page
	}
}
/*
	$file = @fopen("/home/jkiev461/webfiles/music.txt","r"); // file path for school computers
	//$file = @fopen("music.txt","r"); // file path for xammpp
	if (is_resource($file)) {
						
		while ($line = fgets($file)) {
							
			$timeStamp = explode("|",$line);
			$time = $timeStamp[0];
								
			date_default_timezone_set('America/Chicago');// sets timezone to the America/Chicago timezone 
			$lineParts = explode("|", $line);
			$derp = (date('m/d/y h:iA ',$lineParts[0])) . ' ' . $lineParts[1] . ' ' . $lineParts[2] . ' ' . $lineParts[3] . ' ' . $lineParts[4] . ' ' . $lineParts[5];
			print nl2br($derp);// nl2br — Inserts HTML line breaks before all newlines in a string
								 
								
		} // end while
			fclose($file);
	} else {
		print "unable to open file";
	}// end if is_resource*/

$page->setBottom();
$page->getBottom();







?>