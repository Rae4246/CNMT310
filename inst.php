<?php

SESSION_start();

require_once("page.php");
require_once("formClass.php");

if (isset($_SESSION['istrue'])) {
$page = new Page();
$form = new Form();
//$page->addHeadItem("<script type='text/javascript' src=hello.js></script>");
$page->setHeadSection("<link rel='stylesheet' type='text/css' href='pretty.css'>");
$page->setTop();
$form->setForm();
$page->setBottom();




$page->getTop();
$form->getForm();
$page->getBottom();


	


	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		
		//$fh = @fopen("/home/jkiev461/webfiles/music.txt","a+"); // file path for school computers
		$fh = @fopen("music.txt","a+"); // file path for xammpp
		
		//checking if $fh exists 
		if (is_resource($fh)) 
		{
				//   
				if (isset($_POST['submit'])){
					
					// grabs the variables
					$announcer = $_SESSION['username'];
					$songtitle = $_POST['songTitle'];
					$songartist = $_POST['songArtist'];
					$album = $_POST['album'];
					$label = $_POST['label'];
					$list = array( $announcer, $songtitle, $songartist, $album, $label); // need array to make the delimiter work    			
					
					
					fputcsv($fh, $list); // writes file in delimited format
					fclose($fh); // close file
					
					// display file
					//file path for school computers("/home/jkiev461/webfiles/music.txt");
					$file = "music.txt"; //file path
					$screentext = file_get_contents($file); //file_get_contents — Reads entire file into a string
					$screentext = nl2br($screentext); // nl2br — Inserts HTML line breaks before all newlines in a string
					echo $screentext; // pukes the file out on the screen all nice and formated 
				}

		}// end if 
	}
} else{
	print "<h1>you are not logged in</h1>";
}	//end session if statement

?>