<?php
	
	$errorMsgs = array();
	$DBConnect = @new mysqli("cismysql.uma.edu", "andrew.rush", "NpExlgjtgacajKTuq7BpWFJj9gw", "andrew-rush_zodiac");
	
	if($DBConnect->connect_error)  {
		
		$errorMsgs[] = "Database server not available. Connect error: " . $mysqli->connect_errno . " " . $mysqli->connect_error . ".";
		
	}

?>