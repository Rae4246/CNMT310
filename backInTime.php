<?php

SESSION_start();
 
require_once("page.php");
require_once("formClass.php");

if (isset($_SESSION['istrue'])) {
	$page = new Page();
	$form = new Form();
	$page->setHeadSection("<link rel='stylesheet' type='text/css' href='pretty.css'>");

	
	
	
	$page->setTop();
	$page->getTop();

		//$fh = @fopen("../webfiles/music.txt","r"); // file path for school computers
		$file = @fopen("music.txt","r"); // file path for xammpp

	if (is_resource($file)) {
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







