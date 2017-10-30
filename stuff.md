	function setForm(){	
		
		$this->_form .= "<div id='log-css>";
		$this->_form .= "<form method='post'>";
		$this->_form .= "<div class='row'>";
		$this->_form .= "<div class='row-item'><label>Song Title <input type='text' name='songTitle' required></div>";
		$this->_form .= "<div class='row-item'><label>Song Artist </label><input type='text' name='songArtist' required></div>";
		$this->_form .= "</div>";
		$this->_form .= "<div class='row'>";
		$this->_form .= "<div class='row-item'><label>Album </label><input type='text' name='album' required></div>";
		$this->_form .= "<div class='row-item'><label>Label </label><input type='text' name='label' required></div>";
		$this->_form .= "</div>";
		$this->_form .= "<div class='row'>";
		$this->_form .= "<div class='row-item'><label>Stack </label><select><option value='op1'>Option 1</option><option value='op2'>Option 2</option><option value='op3'>Option 3</option><option  value='op4'>Option 4</option></select></div>";
		$this->_form .= "</div>";
		$this->_form .= "<div class='row'>";
		$this->_form .= "<div class='row-item'><input type='submit' name='submit'></form>";
		$this->_form .= "</div>";
		$this->_form .= "</div>";
		$this->_form .= $this->_formSection;
	}
  
  
 
		while ($line = fgets($file)) {
							
			$timeStamp = explode("|",$line);
			$time = $timeStamp[0];
			 
			$_SESSION["angst"] = 3600;
			$_SESSION["hell"] = 7200;
			if($time < (time() - $_SESSION["angst"]) && $time > (time() - $_SESSION["hell"]))  {
					
				date_default_timezone_set('America/Chicago');// sets timezone to the America/Chicago timezone 
				$lineParts = explode("|", $line);
				$derp = (date('m/d h:iA ',$lineParts[0])) . ' ' . $lineParts[1] . ' ' . $lineParts[2] . ' ' . $lineParts[3] . ' ' . $lineParts[4] . ' ' . $lineParts[5];
				print nl2br($derp);// nl2br — Inserts HTML line breaks before all newlines in a string
				//$_SESSION["angst"] += 3600;
				//$_SESSION["hell"] += 3600;

			} else {
				print ' test fail ';
			} 

			
		} // end while
