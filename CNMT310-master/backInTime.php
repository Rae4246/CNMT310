<?php

SESSION_start();

	//$_SESSION['time1'] = 10;
	//$_SESSION['time2'] = -1;
require_once("page.php");
require_once("formClass.php");
require_once("DB.class.php");
require_once("login.Class.php");
$page = new Page();
$form = new Form();
$login = new LoginForm();
$db = new DB();
$login->setLoginForm();

	$page = new Page();
	$form = new Form();
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
	if (isset($_SESSION['istrue'])) {
		
		print "<a href='backInTime.php?a=bob' > Want to go forward in time</a><br>";	
				
		print "<a href='backInTime.php?a=tom'> view the last hour</a><br>";

		print "<a href='backInTime.php?a=rob'> Want to go back more??</a><br>";
		
				if (isset($_GET['a'])){
				
			if($_GET['a'] == 'bob'){
					
				$_SESSION['time1'] -= 1;
				$_SESSION['time2'] -= 1;
				
			}else if($_GET['a'] == 'tom'){
					
				$_SESSION['time1'] = 1;
				$_SESSION['time2'] = -1;
					
				
			}else if($_GET['a'] == 'rob'){
					
				$_SESSION['time1'] += 1;
				$_SESSION['time2'] += 1;
					
			}		
		
		}
			//var_dump($_SESSION['time1']);
			//var_dump($_SESSION['time2']);
		
		if (isset($_GET['a'])){ /// if click everything do dis stuff
			$time1= $_SESSION['time1'];
			$time2= $_SESSION['time2'];
			//var_dump($_SESSION['time1']);
			//var_dump($_SESSION['time2']);
			$query = "SELECT  distinctrow s.songtitle, s.songartist, s.album , s.stack, s.date, s.announcer, s.label   
				FROM musiclist s, musiclist a 
				where s.date > (current_date()- interval'". $time1 ."' day)
                and s.date < (current_date()- interval '". $time2 ."' day)
                and s.songtitle = a.songtitle 
                and s.album = a.album 
                and s.songartist = a.songartist
                and s.stack = a.stack
				GROUP BY s.songtitle, s.date desc
				order by s.date desc;"; ////// enter all querys here 
			$result = $db->dbCall($query); 
			//var_dump($result);
			
			
			print "<table>
			<tr>
				<th> date </th>
				<th> announcer</th>
				<th> song title</th>
				<th> song artist</th>
				<th> album</th>
				<th> label</th>
				<th> Stack</th>

			</tr>";

			foreach ($result as $row) { 
			
				print	"<tr>";		
				print		"<td>" .  $row['date'] . "</td>";
				print		"<td>" .  $row['announcer'] . "</td>";
				print		"<td>" .  $row['songtitle'] . "</td>";
				print		"<td>" .  $row['songartist'] . "</td>";
				print		"<td>" .  $row['album'] . "</td>";
				print		"<td>" .  $row['label'] . "</td></n>";
				print		"<td>" .  $row['stack'] . "</td></n>";
				print	"</tr>";
			}
			print "</table>";

			exit();
		}
			
			

		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
/*	
		
		
		$file = @fopen("/home/jkiev461/webfiles/music.txt","r"); // file path for school computers
		//$file = @fopen("music.txt","r"); // file path for xammpp

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
	*/				
 
	} else{
		echo '<script language="javascript">';
		echo 'alert("YOU ARE NOT LOGINED IN PLASE LOG IN")';
		echo '</script>';
	}	//end session if statement


?>
