<?php
/*
    _.-~~-.__
 _-~ _-=-_   ''-,,
('___ ~~~   0     ~''-_,,,,,,,,,,,,,,,,
 \~~~~~~--'                            '''''''--,,,,
  ~`-,_      ()                                     '''',,,
       '-,_      \                           /             '', _~/|
  ,.       \||/~--\ \_________              / /______...---.  ;  /
  \ ~~~~~~~~~~~~~  \ )~~------~`~~~~~~~~~~~( /----         /,'/ /
   |   -           / /                      \ \           /;/  /
  / -             / /                        / \         /;/  / -.
 /         __.---/  \__                     /, /|       |:|    \  \
/_.~`-----~      \.  \ ~~~~~~~~~~~~~---~`---\\\\ \---__ \:\    /  /
                  `\\\`                     ' \\' '    --\'\, /  /
                                               '\,        ~-_'''"
*/

SESSION_start();

require_once("page.php");
require_once("formClass.php");

if (isset($_SESSION['istrue'])) {
	$page = new Page();
	$form = new Form();
	//$page->addHeadItem("<script type='text/javascript' src=hello.js></script>");
	$page->setHeadSection("<link rel='stylesheet' type='text/css' href='pretty.css'>");

	$page->setTop();
	$page->setBottomSection("<a href='backInTime.php'>Want to go back more??</a><br>");
	//$form->setForm();
	$page->setBottom();

	$page->getTop();
	//$form->getForm();
	$page->getBottom();

		//$fh = @fopen("/home/jkiev461/webfiles/music.txt","r"); // file path for school computers
		$file = @fopen("music.txt","r"); // file path for xammpp
		
	if (is_resource($file)) {
						
		while ($line = fgets($file)) {
							
			$timeStamp = explode("|",$line);
			$time = $timeStamp[0];
			$angst = 3600; // 3600 seconds in an hour ANGST ANGST ANGST ANGST
		
			if($time > (time() - $angst)) {
					
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
					
 
} else{
	print "<h1>you are not logged in</h1>";
}	//end session if statement


?>







