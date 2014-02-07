<?php

	if( isset($_COOKIE['lastVisit']) ) {
	
		$lastVisit = "<p>Your last visit was on {$_COOKIE['lastVisit']}</p>\n";	
		
	} else {
		
		$lastVisit = "<p>This is your first visit!</p>\n";
			
	}
	
	setcookie( "lastVisit", date("F j, Y, g:i a"), time()+60*60*24*365 );

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Untitled Document</title>
</head>

<body>

<?php
	
	echo $lastVisit;

?>

</body>
</html>