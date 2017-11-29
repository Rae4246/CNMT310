<?php

SESSION_start();
	
	$_SESSION['angst'] = 0;
	$_SESSION['hell'] = 3600;
	$_SESSION['time1'] = 10;
	$_SESSION['time2'] = -1;
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

$page->setHeaderCoverSection("<div class='head-title'><h1>WWSP - 90FM</h1><h2>DJ Hub</h2></div>");
$page->setHeaderCoverSection("<div class='head-logo'><img src='WWSP_90fm_mic.png' alt='90fm mic'></div>");


$page->setHeaderCoverSection("<div class='head-login'>");
$page->setHeaderCoverSection($login->getLoginForm());
$login->youLogin();
$page->setHeaderCoverSection("</div>");							  

							  
$page->setTop();

$page->getTop();

$db->__construct();
$db->getConnStatus();
$db->dbConnect();
//var_dump($db->dbConnect()); 



if (isset($_SESSION['istrue'])) {

//$form->setformSection("<a href='backInTime.php'>Want to go back more??</a>");
$form->setForm();

	if ($_SERVER["REQUEST_METHOD"] == "POST") {
			
			
			
			if($status = true){
				//$db->dbConnect();
				if (isset($_POST['submit'])){
					
						$link = $db->returnDB();
						$announcers = mysqli_real_escape_string($link, $_SESSION['username']);
						$songtitles = mysqli_real_escape_string($link, $_POST['songTitle']);
						$sartist = mysqli_real_escape_string($link, $_POST['songArtist']);
						$albums = mysqli_real_escape_string($link, $_POST['album']);
						$labels = mysqli_real_escape_string($link, $_POST['label']);
						$stacks = mysqli_real_escape_string($link, $_POST['stack']);
						$query = "INSERT INTO musiclist (date, announcer, songtitle, songartist, album, label, stack) ";   
						$query .= " VALUES ( NOW(),  '" . $announcers . "' , '" . $songtitles . "' , '" . $sartist . "' , '" . $albums . "' , '" . $labels . "' , '". $stacks . "' )";
						//SELECT DATE_FORMAT(NOW(),'%Y%m%d%H%i%s')
						//print $query;
						$result = $db->dbCall($query);
						
						//var_dump($result);
			
				}										
			} else{
				print "can not connect to server";
			}
	} 
} else{
	echo '<script language="javascript">';
	echo 'alert("YOU ARE NOT LOGINED IN PLASE LOG IN")';
	echo '</script>';
}	//end session if statement

$page->setBottom();

$form->getForm();
$page->getBottom();

?>







