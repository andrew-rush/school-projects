<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Untitled Document</title>
</head>

<body>

<?php

	print_r($_POST);

	if( empty($_POST['first_name']) || empty($_POST['last_name']) ) {
		
		echo "<p>You first and last name are required to sign the guestbook. Click the back button to try again.</p>\n";
	
	} else {
		
		// $DBConnect = @mysql_connect("cismysql.uma.edu", "andrew.rush", "NpExlgjtgacajKTuq7BpWFJj9gw");
		
		$DBConnect = @mysql_connect("localhost", "test", "test");
		
		if($DBConnect === FALSE) {
		
			echo "<p>Unable to connect to database...</p>\n";
			
			echo "Error " . mysql_errno() . ": " . mysql_error() . "</p>\n";
		
		} else {
			
			$DBName = "guestbook";
			
			if(!mysql_select_db($DBName, $DBConnect)) {
				
				$SQLString = "CREATE DATABASE `$DBName`";
				$QueryResult - @mysql_query($SQLString, $DBConnect);
				
				if($QueryResult === FALSE) {
					
					echo "<p>Unable to run query...</p>\n<p>Error " . mysql_errno($DBConnect) . ": " . mysql_error($DBConnect) . "</p>\n";
					
				} else {
					
					echo "<p>You are the first vistor</p>\n";
					
				}
				
				mysql_select_db($DBName, $DBConnect) or die( "ERROR " . mysql_errno() .": " . mysql_error() );
				
			}
			
			$TableName = "visitors";
			$SQLString = "SHOW TABLES LIKE '$TableName'";
			$QueryResult = @mysql_query($SQLString, $DBConnect);
			
			if(mysql_num_rows($QueryResult) == 0) {
				
				$SQLString = "CREATE TABLE $TableName ( countID SMALLINT NOT NULL AUTO_INCREMENT PRIMARY KEY, 
														first_name VARCHAR(40),
														last_name VARCHAR(40) )";
														
				$QueryResult = @mysql_query($SQLString, $DBConnect);
				
				if($QueryResult === FALSE) {
					
					echo "<p>Query was: $SQLString</p>\n";
					
					echo "<p>Unable to create table...</p>\n<p>Error " . mysql_errno() . ": " . mysql_error() . "</p>\n";
					
				}
					
				
			}
			
			$lastName = mysql_real_escape_string($_POST['last_name']);
			$firstName = mysql_real_escape_string($_POST['first_name']);
			
			$SQLString = "INSERT INTO $TableName (first_name, last_name) VALUES ('$firstName', '$lastName')";
			$QueryResult = @mysql_query($SQLString, $DBConnect);
			
			if($QueryResult === FALSE) {
				
				echo "<p>Error " . mysql_errno() . ": " . mysql_error() . "</p>\n<p>Query $SQLString</p>\n";
				
			} else {
				
				echo "<p>Thank you for signing our guest book!</p>\n";
				
			}
			
		}
		
	}
					
					
		
?>

</body>
</html>