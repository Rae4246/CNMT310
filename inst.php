<?php

SESSION_start();
	
	$_SESSION['angst'] = 0;
	$_SESSION['hell'] = 3600;

require_once("page.php");
require_once("formClass.php");
require_once("DB.class.php");
require_once("login.Class.php");
$page = new Page();
$form = new Form();
$login = new LoginForm();

$login->setLoginForm();


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

// adding music entrys 
if (isset($_SESSION['istrue'])) {

$form->setformSection("<a href='backInTime.php'>Want to go back more??</a>");
$form->setForm();

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		// NEED TO ESTABLISH DATBASE CONNECTION
		if($status = true){
			dbConnect();
			if (isset($_POST['submit'])){
					
					// grabs the variables
					$date = time();
					$announcer = $_SESSION['username'];
					$songtitle = $_POST['songTitle'];
					$songartist = $_POST['songArtist'];
					$album = $_POST['album'];
					$label = $_POST['label'];
					//$list = array( $date, $announcer, $songtitle, $songartist, $album, $label ); // need array to make the delimiter work    			
					$query = "INSERT INTO [ TABLE NAME] (STUFF, STUFF ,STUFFF ,STUFF)
													VALUES (STUFF1, STUFF2, STUFF3, STUFF4)";
			}										
		} else{
			print "can not connect to server";
		}
	} 
} else{
	print "<h1>you are not logged in</h1><br>";
	print "you need to log in<br>";
}	//end session if statement
/*		
		//$fh = @fopen("../webfiles/music.txt","a+"); // file path for school computers
		$fh = @fopen("music.txt","a+"); // file path for xammpp
		
		//checking if $fh exists 
		if (is_resource($fh)) 
		{
				//   
				if (isset($_POST['submit'])){
					
					// grabs the variables
					$date = time();
					$announcer = $_SESSION['username'];
					$songtitle = $_POST['songTitle'];
					$songartist = $_POST['songArtist'];
					$album = $_POST['album'];
					$label = $_POST['label'];
					$list = array( $date, $announcer, $songtitle, $songartist, $album, $label ); // need array to make the delimiter work    			
					
					
					fputcsv($fh, $list, "|"); // writes file in delimited format use pipe | 
					fclose($fh); // close file
					
					//$file = @fopen("../webfiles/music.txt","r"); // file path for school computers
					$file = @fopen("music.txt","r"); // file path for xammpp
					if (is_resource($file)) {
						
						while ($line = fgets($file)) {
							
							$timeStamp = explode("|",$line);
							$time = $timeStamp[0];
							$angst = 3600; // 3600 seconds in an hour ANGST ANGST ANGST ANGST
							if($time > (time() - $angst))
							{
								date_default_timezone_set('America/Chicago');// sets timezone to the America/Chicago timezone 
								$lineParts = explode("|", $line);
								$derp = (date('m/d h:iA ',$lineParts[0])) . ' ' . $lineParts[1] . ' ' . $lineParts[2] . ' ' . $lineParts[3] . ' ' . $lineParts[4] . ' ' . $lineParts[5];
								print nl2br($derp);// nl2br — Inserts HTML line breaks before all newlines in a string
								
							}/// hypr link with a query string to go back to prevous hours 
								
						} // end while
						fclose($file);
					} else {
						print "unable to open file";
					}// end if is_resource
					8
				}

		}// end if resource 
		*/
	


$page->setBottom();
$page->getTop();
$form->getForm();
$page->getBottom();

?>







