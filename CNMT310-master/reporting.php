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
$login->youLogin();
$page->setHeaderCoverSection("</div>");							  

							  
$page->setTop();
$page->getTop();

$result = null;

if (isset($_SESSION['istrue'])) {

	if (!$db->getConnStatus()) {
	  print "An error has occurred with connection\n";
	  exit;
	}


	print"<form method='post'>";
	print"<label>Top Ten Most Played in last 7 days</label><input type='submit' name='topTen'></n>";// top ten 
	print "<br>";
	print"<label>5 Most Played in last 7 days Stack 1</label><input type='submit' name='mostplayed1'></n>"; /// 5  most played songs 
	print "<br>";
	print"<label>5 Most Played in last 7 days Stack 2</label><input type='submit' name='mostplayed2'></n>"; /// 5  most played songs 
	print "<br>";
	print"<label>5 Most Played in last 7 days Stack 3</label><input type='submit' name='mostplayed3'></n>"; /// 5  most played songs 
	print "<br>";
	print"<label>5 Most Played in last 7 days Stack 4</label><input type='submit' name='mostplayed4'></n>"; /// 5  most played songs 
	print "<br>";
	print"<label>5 Most Played in last 7 days Stack 5</label><input type='submit' name='mostplayed5'></n>"; /// 5  most played songs 
	print"</form>";
	//the where in regards to time needs to be fixed in 
	//each query as well as count needs to be used and displayed in a columb

	if (isset($_POST['topTen'])){ /// if click topten do dis stuff
		$query ="SELECT  distinctrow s.songtitle, s.songartist, s.album , s.stack, COUNT(s.songtitle = a.songtitle) c  
				FROM musiclist s, musiclist a 
				where s.date > (current_date()- interval 7 day) and s.songtitle = a.songtitle 
                and s.album = a.album 
                and s.songartist = a.songartist
                and s.stack = a.stack
                and a.date > (current_date()- interval 7 day)
				GROUP BY s.songtitle, s.date desc
				HAVING c > 0
				order by c desc
				LIMIT 0,10;"; ////// enter all querys here  
		$result = $db->dbCall($query); 
				
	}
	
	if (isset($_POST['mostplayed1'])){ /// if click mostplayed do dis stuff
		$query ="SELECT  distinctrow s.songtitle, s.songartist, s.album , s.stack, COUNT(s.songtitle = a.songtitle) c  
				FROM musiclist s, musiclist a 
				where s.date > (current_date()- interval 7 day) 
                and s.songtitle = a.songtitle 
                and s.album = a.album 
                and s.songartist = a.songartist
                and s.stack = a.stack
                and s.stack =1
                and a.date > (current_date()- interval 7 day)
				GROUP BY s.songtitle, s.date desc
				HAVING c > 0
				order by c desc
				LIMIT 0,5;"; ////// enter all querys here  
		$result = $db->dbCall($query); 
		
	}
	
	if (isset($_POST['mostplayed2'])){ /// if click mostplayed do dis stuff
		$query ="SELECT  distinctrow s.songtitle, s.songartist, s.album , s.stack, COUNT(s.songtitle = a.songtitle) c  
				FROM musiclist s, musiclist a 
				where s.date > (current_date()- interval 7 day) 
                and s.songtitle = a.songtitle 
                and s.album = a.album 
                and s.songartist = a.songartist
                and s.stack = a.stack
                and s.stack =2
                and a.date > (current_date()- interval 7 day)
				GROUP BY s.songtitle, s.date desc
				HAVING c > 0
				order by c desc
				LIMIT 0,5;;"; ////// enter all querys here 
		$result = $db->dbCall($query); 
		
				
	}
	
	if (isset($_POST['mostplayed3'])){ /// if click mostplayed do dis stuff
	
		$query ="SELECT  distinctrow s.songtitle, s.songartist, s.album , s.stack, COUNT(s.songtitle = a.songtitle) c  
				FROM musiclist s, musiclist a 
				where s.date > (current_date()- interval 7 day) 
                and s.songtitle = a.songtitle 
                and s.album = a.album 
                and s.songartist = a.songartist
                and s.stack = a.stack
                and s.stack =3
                and a.date > (current_date()- interval 7 day)
				GROUP BY s.songtitle, s.date desc
				HAVING c > 0
				order by c desc
				LIMIT 0,5;;"; ////// enter all querys here 
		$result = $db->dbCall($query); 		
		
	}
	
	if (isset($_POST['mostplayed4'])){ /// if click mostplayed do dis stuff
	
		$query ="SELECT  distinctrow s.songtitle, s.songartist, s.album , s.stack, COUNT(s.songtitle = a.songtitle) c  
				FROM musiclist s, musiclist a 
				where s.date > (current_date()- interval 7 day) 
                and s.songtitle = a.songtitle 
                and s.album = a.album 
                and s.songartist = a.songartist
                and s.stack = a.stack
                and s.stack =4
                and a.date > (current_date()- interval 7 day)
				GROUP BY s.songtitle, s.date desc
				HAVING c > 0
				order by c desc
				LIMIT 0,5;;"; ////// enter all querys here 
		$result = $db->dbCall($query); 		
			
	}
	
	if (isset($_POST['mostplayed5'])){ /// if click mostplayed do dis stuff

		$query ="SELECT  distinctrow s.songtitle, s.songartist, s.album , s.stack, COUNT(s.songtitle = a.songtitle) c  
				FROM musiclist s, musiclist a 
				where s.date > (current_date()- interval 7 day) 
                and s.songtitle = a.songtitle 
                and s.album = a.album 
                and s.songartist = a.songartist
                and s.stack = a.stack
                and s.stack =5
                and a.date > (current_date()- interval 7 day)
				GROUP BY s.songtitle, s.date desc
				HAVING c > 0
				order by c desc
				LIMIT 0,5;"; ////// enter all querys here  
		$result = $db->dbCall($query); 
			
	}

	if (isset($result)){
		print "<table>
		<tr>
			<th> song title</th>
			<th> song artist</th>
			<th> album</th>
			<th> Times played</th>
		</tr>";
		foreach ($result as $row) { 
		
			print	"<tr>";		
			print		"<td>" .  $row['songtitle'] . "</td>";
			print		"<td>" .  $row['songartist'] . "</td>";
			print		"<td>" .  $row['album'] . "</td>";
			print		"<td>" .  $row['c'] . "</td>";
			print	"</tr>";
		}
		print "</table>";
		exit();
	}

} else{
	echo '<script language="javascript">';
	echo 'alert("YOU ARE NOT LOGINED IN PLASE LOG IN")';
	echo '</script>';
}	//end session if statement




$page->setBottom();
$page->getBottom();

?>