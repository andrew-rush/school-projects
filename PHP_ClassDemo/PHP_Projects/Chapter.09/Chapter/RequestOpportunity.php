<?php
session_start();

//validate submitted data
$Body = "";
$errors = 0;
$InternID = 0;
if (!isset($_SESSION['internID'])) {
	$Body .= "<p>You have not logged in or registered. Please return to the <a href='InternLogin.php'>Registration / Log In page</a>.</p>";
	++$errors;
} //end if (!isset($_SESSION['internID']))
if ($errors == 0) {
	if (isset($_GET['opportunityID']))
		$OpportunityID = $_GET['opportunityID'];
	else {
		$Body .= "<p>You have not selected an opportunity. Please return to the <a href='AvailableOpportunities.php?PHPSESSID=". session_id() . "'>Available Opportunities page</a>.</p>";
		++$errors;
	} //end else
} //end if ($errors == 0)

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

//mark opportunity as selected in the 'assigned_opportunities' table
$DisplayDate = date("l, F j, Y, g:i A");
$DatabaseDate = date("Y-m-d H:i:s");
if ($errors == 0){
	$TableName = "assigned_opportunities";
	$SQLstring = "INSERT INTO $TableName(opportunityID, internID, date_selected) VALUES($OpportunityID, " . $_SESSION['internID'] . ", '$DatabaseDate')";
	$QueryResult =@mysql_query($SQLstring, $DBConnect);
	if ($QueryResult === FALSE) {
		          echo "<p>Unable to execute the query. " .
               "Error code " . mysql_errno($DBConnect) . ": " .
               mysql_error($DBConnect) . "</p>\n";
          ++$errors;
	} //end if ($QueryResult === FALSE)
     else {
		$Body .= "<p>Your request for opportunity # $OpportunityID has been entered on $DisplayDate.</p>\n";
	 } //end else
	 mysql_close($DBConnect);
} //end if ($errors == 0)

//link back to 'Available Opportunities' page if Intern ID is valid or to 'Registration/Log In' page if not valid
if ($_SESSION['internID'] >0)
	$Body .= "<p>Return to the <a href='AvailableOpportunities.php?PHPSESSID=" . session_id() . "'>Available Opportunities</a> page.</p>\n";
else
	$Body .= "<p>Please <a href='InternLogin.php?'>Register or Log In</a> to use this page.</p>\n";

/*create a persistent cookie (using urlencode() function for special characters needed for date and time) set to expire in one week */
if ($errors == 0)
	setcookie("LastRequestDate", urlencode($DisplayDate), time()+60*60*24*7);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://w3.org/1999/xhtml">
<head>
<title>Request Opportunity</title>
</head>
<body>
<h1>College Internship</h1>
<h2>Opportunity Requested</h2>
<?php
echo $Body;
?>
</body>
</html>