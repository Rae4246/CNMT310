<?php
class HtmlClass {
	function createHeadSection(){
		$headHtml =  "";
		$headHtml .= "<!doctype html><html>";
		$headHtml .= "<head><title>JS Test</title>";
		//$headHtml .= "<script type='text/javascript' src='hello.js'>";
		//$headHtml .= "alert('hello world')";
		//$headHtml .= "</script>";
		$headHtml .= "<link rel='Stylesheet' type='text/css' href='pretty.css'>";
		$headHtml .= "</head>";
		return $headHtml;
	}

	function createBody(){
		$bodyHtml ="";
		$bodyHtml .= "<body>";
		$bodyHtml .= "<form method='post'>";
		$bodyHtml .= "<label>Stack</label><select><option value='op1'>Option 1</option><option value='op2'>Option 2</option><option value='op3'>Option 3</option><option value='op4'>Option 4</option></select>";
		$bodyHtml .= "<label>Song Title</label><input type='text' name='songTitle' required><br>";
		$bodyHtml .= "<label>Song Artist</label><input type='text' name='songArtist' required><br>";
		$bodyHtml .= "<label>Album</label><input type='text' name='album' required><br>";
		$bodyHtml .= "<label>Label</label><input type='text' name='label' required><br>";
		$bodyHtml .= "<input type='submit' name='submit'></form>";
		$bodyHtml .= "</body>";
		return $bodyHtml;
	}

	function createBottomSection(){
		$bottomHtml = "";
		$bottomHtml .= "</html>";
		return $bottomHtml;
	}
} //end class
$html = new HtmlClass();

print $html->createHeadSection();
print $html->createBody();
print $html->createBottomSection();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
	
	$fh = @fopen("/home/dtrap315/webfiles/music.txt","a+"); // file path for school computers
	//$fh = @fopen("/home/dtrap315/webfiles/music.txt","a+"); // file path for xammpp
	
	//checking if $fh exists 
	if (is_resource($fh)) 
	{
			//   
			if (isset($_POST['submit'])){
				
				// grabs the variables
				$songtitle = $_POST['songTitle'];
				$songartist = $_POST['songArtist'];
				$album = $_POST['album'];
				$label = $_POST['label'];
				$list = array( $songtitle, $songartist, $album, $label); // need array to make the delimiter work    			
				
				fputcsv($fh, $list); // writes file in delimited format
				fclose($fh); // close file
				
				// display file
				//file path for school computers("/home/jkiev461/webfiles/music.txt");
				$file = "/home/dtrap315/webfiles/music.txt"; //file path
				$screentext = file_get_contents($file); //file_get_contents — Reads entire file into a string
				$screentext = nl2br($screentext); // nl2br — Inserts HTML line breaks before all newlines in a string
				echo $screentext; // pukes the file out on the screen all nice and formated 
			}

	}// end if 

	
}else{ print"Welcome"; }

?>
