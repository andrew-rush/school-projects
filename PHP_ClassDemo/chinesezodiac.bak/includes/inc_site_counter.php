<?php

	include("includes/inc_connect.php");
	
	
	
	if( empty($_COOKIE['visits']) ) {
		
		$sql = "UPDATE visit_counter SET counter = counter + 1 WHERE id = 1";
		$update = mysql_query($sql) or die(mysql_error());
		$result = mysql_query("SELECT counter from visit_counter where id = 1") or die(mysql_error());
		
		if( ($row = mysql_fetch_assoc($result)) !== FALSE) {
			
			$visitors = $row['counter'];
			
		} else {
			
			$visitors = 1;
			
		}
		
		setcookie( "visits", $visitors, time() + 60*60*24 );
		
	} else {
		
		$visitors = $_COOKIE['visits'];
		
	}
	
?>