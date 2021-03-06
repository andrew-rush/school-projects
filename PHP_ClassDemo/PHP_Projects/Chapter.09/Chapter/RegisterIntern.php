<?php
session_start();

$Body = "";
$errors = 0;
$email = "";
//validate user e-mail
if (empty($_POST['email'])) {
	++$errors;
	$Body .= "<p>You need to enter an e-mail address.</p>\n";
} //end if (empty($_POST['email']))
else {
	$email = stripslashes($_POST['email']);
	if (preg_match( "/^[\w-]+(\.[\w-]+)*@[\w-]+(\.[\w-]+)*(\.[a-zA-Z]{2,})$/", $email) == 0) {
		++$errors;
		$Body .= "<p>You need to enter a valid e-mail address.</p>\n";
		$email = "";
	} //end if (preg_match(...
} //end else

//validate user password
if (empty($_POST['password'])) {
	++$errors;
	$Body .= "<p>You need to enter a password.</p>\n";
	$password = "";
} //end if (empty($_POST['password']))
else
	$password = stripslashes($_POST['password']);
if (empty($_POST['password2'])) {
	++$errors;
	$Body .= "<p>You need to enter a confirmation password.</p>\n";
	$password2 = "";
} //
else
	$password2 = stripslashes($_POST['password2']);
if ((!(empty($password))) && (!(empty($password2)))) {
	if (strlen($password) < 6) {
		++$errors;
		$Body .= "<p>The password is too short.</p>\n";
		$password = "";
		$password2 = "";
	} //end if (strlen($password) < 6)
	if ($password <> $password2) {
		++$errors;
		$Body .= "<p>The passwords do not match.</p>\n";
		$password = "";
		$password2 = "";
	} //end if ($password <> $password2)
} //end if ((!(empty($_POST['password']))) && (!(empty($_POST['password2']))))

//connect to server and open database
if ($errors == 0) {
	require "inc_connect.php";
	if ($DBConnect === FALSE) {
		$Body .= "<p>Unable to connect to the database server. Error code " . mysql_errno() . ": " . mysql_error() . "</p>\n";
		++$errors;
	} //end if ($DBConnect === FALSE)
	else {
		$DBName = "andrew-rush_internships";
		$result = @mysql_select_db($DBName, $DBConnect);
		if ($result === FALSE) {
			$Body .= "<p>Unable to select the database. Error code " . mysql_errno($DBConnect) . ": " . mysql_error($DBConnect) . "</p>\n";
			++$errors;
		} //end if ($result === FALSE)
	} //end else
} //end if ($errors == 0)

//verify that e-mail address entered is not already in the 'interns' table
$TableName = "interns";
if ($errors == 0) {
	$SQLstring = "SELECT count(*) FROM $TableName WHERE email=$email";
	$QueryResult = @mysql_query($SQLstring, $DBConnect);
	if ($QueryResult !== FALSE) {
		$Row = mysql_fetch_row($QueryResult);
		if ($Row[0]>0) {
			$Body .= "<p>The e-mail address entered (" . htmlentities($email) . ") is already registered.</p>\n";
			++$errors;
		} //end if ($Row[0]>0)
	} //end if ($QueryResult !== FALSE)
} //if ($errors == 0)

//if there are errors, show appropriate message
if ($errors > 0) {
	$Body .= "<p>Please use your browser's BACK button to return to the form and fix the errors indicated.</p>\n";
} //end if ($errors > 0) {

//add new user to 'interns' table
if ($errors == 0) {
	$first = stripslashes($_POST['first']);
	$last = stripslashes($_POST['last']);
	$SQLstring = "INSERT INTO $TableName(first, last, email, password_md5) VALUES('$first', '$last', '$email', '" . md5($password) . "')";
	$QueryResult = @mysql_query($SQLstring, $DBConnect);
	if ($QueryResult === FALSE) {
		$Body .= "<p>Unable to save your registration information. Error code " . mysql_errno($DBConnect) . ": " . mysql_error($DBConnect) . "</p>\n";
		++$errors;
	} //end if ($QueryResult === FALSE)
	else {
		$_SESSION['internID'] = mysql_insert_id($DBConnect);
	} //end else
	//setcookie("internID", $InternID);
	mysql_close($DBConnect);
} //end if ($errors == 0)

if ($errors == 0) {
	$InternName = $first . " " . $last;
	$Body .= "<p>Thank you, $InternName. ";
	$Body .= "Your new Intern ID is <strong>" . $_SESSION['internID'] . "</strong>.</p>\n";
} //end if ($errors == 0)

//if no errors
if ($errors == 0) {
	$Body .= "<form method='post' action='AvailableOpportunities.php?PHPSESSID=" . session_id() . "'>\n";
	$Body .= "<input type='submit' name='submit' value='View Available Opportunities'>\n";
	$Body .= "</form>\n";
} //end if ($errors == 0)
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>College Internships</title>
</head>
<body>
<h1>College Internship</h1>
<h2>Intern Registration</h2>
<?php
echo $Body;
?>
</body>
</html>