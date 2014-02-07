<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Untitled Document</title>
</head>

<body>

<h3>feedback</h3>

<?php

	include("includes/inc_connect.php");
	
	$query = "SELECT * from feedback WHERE publicMsg = 'Y'";
	$result = mysql_query($query, $conn);
	while( $row = mysql_fetch_assoc($result) ) {
		
		echo "<div class = \"feedback\" style = \"width:300px;border:5px\">\n";
		echo "<ul style = \"list-style-type:none\">\n<li>{$row['sender']}</li>\n";
		echo "<li>{$row['msg']}</li>\n";
		echo "<li>{$row['msgDate']} {$row['msgTime']}</li>\n</ul>\n";
				
	}

?>

</body>
</html>