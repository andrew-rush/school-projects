<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Verify Intern Login</title>
</head>
<body>
<h1>College Internship</h1>
<h2>Verify Intern Login</h2>
<?php
//connect to server and open database
$errors = 0;
require "inc_connect.php";
if ($DBConnect === FALSE) {
	echo "<p>Unable to connect to the database server. Error code " . mysql_errno() . ": " . mysql_error() . "</p>\n";
	++$errors;
} //end if ($DBConnect === FALSE)
else {
	$DBName = "andrew-rush_internships";
	$result = @mysql_select_db($DBName, $DBConnect);
	if ($result === FALSE) {
		echo "<p>Unable to select the database. Error code " . mysql_errno($DBConnect) . ": " . mysql_error($DBConnect) . "</p>\n";
		++$errors;
	} //end if ($result === FALSE)
} //end else

//verify that user e-mail and password are in the 'interns' table
$TableName = "interns";
if ($errors == 0) {
	$SQLstring = "SELECT internID, first, last FROM $TableName WHERE email='" . stripslashes($_POST['email']) . "' and password_md5='" .md5(stripslashes($_POST['password'])) . "'";
	$QueryResult = @mysql_query($SQLstring, $DBConnect);
	if (mysql_num_rows($QueryResult) == 0) {
		echo "<p>The e-mail address/password combination entered is not valid.</p>\n";
		++$errors;
	} //end if (mysql_num_rows($QueryResult) == 0)
	else {
		$Row = mysql_fetch_assoc($QueryResult);
		$_SESSION['internID'] = $Row['internID'];
		$InternName = $Row['first'] . " " . $Row['last'];
		echo "<p>Welcome back, $InternName!</p>\n";
	} //end else
} //if ($errors == 0)

//if there are errors, show appropriate message
if ($errors > 0) {
	echo "<p>Please use your browser's BACK button to return to the form and fix the errors indicated.</p>\n";
} //end if ($errors > 0) {

//if no errors, include hidden field
if ($errors == 0) {
	// echo "<form method='post' action='AvailableOpportunities.php'>\n";
	// echo "<input type='hidden' name='internID' value='$InternID'>\n";
	// echo "<input type='submit' name='submit' value='View Available Opportunities'>\n";
	// echo "</form>\n";
	//p.516 replace above form w/following text and elements
	echo "<p><a href='AvailableOpportunities.php?PHPSESSID=" . session_id() . "'>Available Opportunities</a></p>\n";
} //end if ($errors == 0)
?>
</body>
</html>