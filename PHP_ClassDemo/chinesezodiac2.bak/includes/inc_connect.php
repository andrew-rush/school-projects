<?php

	$conn = mysql_connect("localhost", "test", "test");
	
	// $conn = @mysql_connect("cismysql.uma.edu", "andrew.rush", "NpExlgjtgacajKTuq7BpWFJj9gw") or die(mysql_errno());
	
	if($conn === FALSE) {
		
		echo "<p>Database connection failed!\n<br /> Error " . mysql_errno($conn) . ": " . mysql_error($conn);
		
	} else {
		
		$db = mysql_select_db("andrew-rush_zodiac", $conn);
		
		if($db === FALSE) {
			
			echo "<p>Unable to connect to database server\n<br />Error " . mysql_errno($conn) . ": " . mysql_error($conn);
			mysql_close($conn);
			
			$conn = FALSE;
		
		}
		
	}
	
?>