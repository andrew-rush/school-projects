<?php

	include("includes/inc_connect.php");
	
	$query = "SELECT * from feedback WHERE publicMsg = 'Y'";
	$result = mysql_query($query, $conn);
	while( $row = mysql_fetch_assoc($result) ) {
		
		echo "<div class = \"feedback\" style = \"width:300px;border:1px solid black;margin:10px\">\n";
		echo "<ul style = \"list-style-type:none\">\n<li>{$row['sender']}</li>\n";
		echo "<li>{$row['msg']}</li>\n";
		echo "<li>{$row['msgDate']} {$row['msgTime']}</li>\n</ul>\n";
		echo "</div>\n";
				
	}

?>