<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Untitled Document</title>
</head>

<body>

<?php

	$connect = mysql_connect("localhost", "test", "test");
	
	// $connect = @mysql_connect("cismysql.uma.edu", "andrew.rush", "NpExlgjtgacajKTuq7BpWFJj9gw");
	
	if($connect === FALSE) {
		
		echo "<p>Unable to connect to database server</p>\n <p>Error " . mysql_error($connect) . ": " . mysql_error($connect);
		
	} else {
		
		$db = "guestbook";
		
		if( !mysql_select_db($db, $connect) ) {
		
			echo "<p>Database not found...</p>\n";
			
		} else {
			
			$table = "visitors";
			
			$sql = "SELECT * FROM $table";
			
			$result = @mysql_query($sql, $connect);
			
			if( mysql_num_rows($result) == 0 ) {
				
				echo "<p>There are no entries in the guest book! Oh, noes!</p>\n";
				
			} else {
				
				echo "<p>The following people have signed our guest book!</p>\n";
				echo "<table border = \"1\" padding = \"5\">\n	<tr><td>First Name</td><td>Last Name</td><tr>\n";
				
				while( $row = mysql_fetch_assoc($result) ) {
					
					$fn = $row['first_name'];
					$ln = $row['last_name'];
					echo "<tr><td>$fn</td><td>$ln</td><tr>\n";
					
				}
				
				echo "</table>";
				
			}
			
			mysql_free_result($result);
			
		}
		
		mysql_close($connect);
	}

?>

</body>
</html>