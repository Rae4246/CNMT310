<?php
SESSION_start();
	
require_once("page.php");
require_once("formClass.php");
require_once("DB.class.php");
require_once("login.Class.php");
$page = new Page();
$form = new Form();
$login = new LoginForm();
$database = new DB();
$page->getTop();
$login->setLoginForm();


$page->setHeadSection("<link rel='stylesheet' type='text/css' href='style_log.css'>");
$page->setHeadSection("<link rel='stylesheet' type='text/css' href='style.css'>");
$page->setHeadSection("<link rel='stylesheet' type='text/css' href='style_acc.css'>");
$page->setHeadSection("<link rel='stylesheet' type='text/css' href='style_prev.css'>");
$page->setNavSection("<ul><li><a href='inst.php'>Music Entry</a></li><li><a href='backInTime.php'>Previously Played</a></li><li><a href='querys.php'>Playlist Log</a></li><li><a href='reporting.php'>Free-Form Reporting</a></li><li><a href='adminedit.php'>Admin Edit Page</a></li></ul>");

$page->setHeaderCoverSection("<div class='head-title'><h1>WWSP - 90FM<h1><h2>DJ Hub</h2></div>");
$page->setHeaderCoverSection("<div class='head-logo'><a href='https://youtu.be/dQw4w9WgXcQ'><img src='WWSP_90fm_mic.png'></a> </div>");


$page->setHeaderCoverSection("<div class='head-login'>");
$page->setHeaderCoverSection($login->getLoginForm());
$login->youLogin();
$page->setHeaderCoverSection("</div>");							  

							  
$page->setTop();
$page->getTop();
if (isset($_SESSION['istrue'])) {
	$database->__construct();
	$database->getConnStatus();
	$database->dbConnect();
	//var_dump($database->dbConnect());
	// adding music entrys 

	print "in the future you can do admin stuff here";

} else{
	echo '<script language="javascript">';
	echo 'alert("YOU ARE NOT LOGINED IN PLASE LOG IN")';
	echo '</script>';
}


$page->setBottom();
$page->getBottom();



?>