<?php

	$dbName = "andrew-rush_zodiac";
	
	// $conn = mysql_connect("localhost", "test", "test");
	
	$DBConnect = @mysql_connect("cismysql.uma.edu", "andrew.rush", "NpExlgjtgacajKTuq7BpWFJj9gw");
	
	if($conn === FALSE) {
		
		echo "<p>Database connection failed!\n<br /> Error " . mysql_errno($conn) . ": " . mysql_error($conn);
		
	} else {
		
		$db = mysql_select_db("andrew-rush_zodiac", $DBConnect);
		
		if($db === FALSE) {
			
			echo "<p>Unable to connect to database server\n<br />Error " . mysql_errno($conn) . ": " . mysql_error($conn);
			mysql_close($conn);
			
			$conn = FALSE;
		
		}
		
	}
	
?>