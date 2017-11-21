<?php

SESSION_start();
 
require_once("page.php");
require_once("formClass.php");
require_once("DB.class.php");
require_once("login.Class.php");
$page = new Page();
$form = new Form();
$login = new LoginForm();

$login->setLoginForm();
if (isset($_SESSION['istrue'])) {
	$page = new Page();
	$form = new Form();
$page->setHeadSection("<link rel='stylesheet' type='text/css' href='style_log.css'>");
$page->setHeadSection("<link rel='stylesheet' type='text/css' href='style.css'>");
$page->setHeadSection("<link rel='stylesheet' type='text/css' href='style_acc.css'>");
$page->setHeadSection("<link rel='stylesheet' type='text/css' href='style_prev.css'>");
$page->setNavSection("<ul><li><a href='backInTime.php'>Previously Played</a></li><li><a href='#'>Playlist Log</a></li><li><a href='#'>Free-Form Reporting</a></li><li><a href='#'>Admin Edit Page</a></li></ul>");

$page->setHeaderCoverSection("<div class='head-title'><h1>WWSP - 90FM<h1><h2>DJ Hub</h2></div>");
$page->setHeaderCoverSection("<div class='head-logo'><img src='WWSP_90fm_mic.png'></div>");


$page->setHeaderCoverSection("<div class='head-login'>");
$page->setHeaderCoverSection($login->getLoginForm());
$page->setHeaderCoverSection("</div>");
	
	
	
	$page->setTop();
	$page->getTop();

		//$fh = @fopen("../webfiles/music.txt","r"); // file path for school computers
		$file = @fopen("music.txt","r"); // file path for xammpp

	if (is_resource($file)) {
		
		/// CHANGES 
		/// CHECK TO SEE IF DB IS A THERE AND CAN BE CONNNECTED TO!!!
		// THEN MAKE CONNECT LINKS TO QUERYS AND INCREMENT THE VALUES SOMEHOW 
		print "<a href='backInTime.php?a=bob' > Want to go forward in time</a><br>";	
			
		print "<a href='backInTime.php?a=tom'> Want to go back more??</a><br>";	
		
		$currentTime = time();				
		
		while ($line = fgets($file)) {
							
			$timeStamp = explode("|",$line);
			$time = $timeStamp[0];
			 

			if($time < ($currentTime - $_SESSION['angst']) && $time > ($currentTime - $_SESSION['hell']))  {
					
				date_default_timezone_set('America/Chicago');// sets timezone to the America/Chicago timezone 
				$lineParts = explode("|", $line);
				$derp = (date('m/d h:iA ',$lineParts[0])) . ' ' . $lineParts[1] . ' ' . $lineParts[2] . ' ' . $lineParts[3] . ' ' . $lineParts[4] . ' ' . $lineParts[5];
				print nl2br($derp);// nl2br — Inserts HTML line breaks before all newlines in a string

			}
			//var_dump($_GET['a']);

			
		} // end while

		
		if (isset($_GET['a'])){
			
			if($_GET['a'] == 'bob'){
				
				$_SESSION['angst'] -= 3600;
				$_SESSION['hell'] -= 3600;
			
			}else if($_GET['a'] == 'tom'){
				
				$_SESSION['angst'] += 3600;
				$_SESSION['hell'] += 3600;
				
			}
		}
		var_dump($_SESSION['angst']);
		var_dump($_SESSION['hell']);
		
		$page->setBottom();
		$page->getBottom();
		
			fclose($file);
	} else {
			print "unable to open file";
	}// end if is_resource
					
 
} else{
	print "<h1>you are not logged in</h1>";
	print "<a href='login.php'> You need to login!!!!!!!!!!!</a><br>";
}	//end session if statement


?>







