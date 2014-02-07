<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Box Array</title>
</head>

<body>

<?php

$boxes = array("small" => array("length"=>"12", "width"=>"10", "depth"=>"2.5"), 
				"medium" => array("length"=>"30", "width"=>"20", "depth"=>"4"), 
				"large" => array("length"=>"60", "width"=>"40", "depth"=>"11.5"));

foreach($boxes as $thisKey => $thisBox) {
	
	$volume = $thisBox['length'] * $thisBox['width'] * $thisBox['depth'];
	echo "<p>Volume of the $thisKey box: $volume cubic inches!</p>\n";
		
}

?>

</body>
</html>