<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Test</title>
</head>

<?php

	if(isset($_POST['submit'])) {
		
		print_r($_POST);
		
	}
	
	?>

<form action="test.php" method="POST" name="myForm">

	<p>Name: <input name="" type="text" /><p>
    <p>Age: <input name="" type="text" /></p>
    <p><input name="submit" type="submit" value="Submit" /></p>

</form>

<body>
</body>
</html>