<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Available Opportunities</title>
</head>
<body>
<h1>College Internship</h1>
<h2>Available Opportunities</h2>
<?php
//connect to server and open database
$errors = 0;

//YOU MAY REQUIRE inc_connect.php
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

//retrieve user's info from 'interns' table
$TableName = "interns";
if ($errors == 0) {
	$SQLstring = "SELECT * FROM $TableName WHERE internID='" . $_SESSION['internID'] . "'";
	$QueryResult = @mysql_query($SQLstring, $DBConnect);
	if ($QueryResult === FALSE) {
		echo "<p>Unable to execute the query Error code " . mysql_errno($DBConnect) . ": " . mysql_error($DBConnect) . "</p>\n";
		++$errors;
	} //end if ($QueryResult === FALSE)
	else {
		if (mysql_num_rows($QueryResult) == 0) {
			echo "<p>Invalid Intern ID!</p>";
			++$errors;
		} //end if (mysql_num_rows($QueryResult) == 0)
	} //end else
} //end if ($errors == 0)

//retrieve user's first and last names from resultset
if ($errors == 0) {
	$Row = mysql_fetch_assoc($QueryResult);
	$InternName = $Row['first'] . " " . $Row['last'];
} //end if ($errors == 0)
else
	$InternName = "";

//check 'assigned_opportunities' table to see if current intern ID has been approved for an opportunity
$TableName = "assigned_opportunities";
$ApprovedOpportunities =  0;
$SQLstring = "SELECT COUNT(opportunityID) FROM $TableName WHERE internID='" . $_SESSION['internID'] . "' AND date_approved IS NOT NULL";
$QueryResult = @mysql_query($SQLstring, $DBConnect);
if (mysql_num_rows($QueryResult) > 0) {
	$Row = mysql_fetch_row($QueryResult);
	$ApprovedOpportunities = $Row[0];
	mysql_free_result($QueryResult);
} //end if (mysql_num_rows($QueryResult) > 0)

//retrieve list of opportunity IDs selected for current intern ID
$SelectedOpportunities = array();
$SQLstring = "SELECT opportunityID FROM $TableName WHERE internID='" . $_SESSION['internID'] . "'";
$QueryResult = @mysql_query($SQLstring, $DBConnect);
if (mysql_num_rows($QueryResult) > 0) {
	while (($Row = mysql_fetch_row($QueryResult)) !== FALSE)
		$SelectedOpportunities[]  = $Row[0];
		mysql_free_result($QueryResult);
} //end if (mysql_num_rows($QueryResult) > 0)

//retrieve list of opportunity IDs selected for any intern ID
$AssignedOpportunities = array();
$SQLstring = "SELECT opportunityID FROM $TableName WHERE date_approved IS NOT NULL";
$QueryResult = @mysql_query($SQLstring, $DBConnect);
if (mysql_num_rows($QueryResult) > 0) {
	while (($Row = mysql_fetch_row($QueryResult)) !== FALSE)
		$AssignedOpportunities[]  = $Row[0];
		mysql_free_result($QueryResult);
} //end if (mysql_num_rows($QueryResult) > 0)

//retrieve list of opportunities from the 'opportunities' table
$TableName = "opportunities";
$Opportunities = array();
$SQLstring = "SELECT opportunityID, company, city, start_date, end_date, position, description FROM $TableName";
$QueryResult = @mysql_query($SQLstring, $DBConnect);
if (mysql_num_rows($QueryResult) > 0) {
	while (($Row = mysql_fetch_assoc($QueryResult)) !== FALSE)
		$Opportunities[]  = $Row;
		mysql_free_result($QueryResult);
} //end if (mysql_num_rows($QueryResult) > 0)

//close database connection
mysql_close($DBConnect);

//build a table of available opportunities
echo "<table border='1' width='100%'>\n";
echo "<tr>\n";
echo "<th style='background-color:cyan'>Company</th>\n";
echo "<th style='background-color:cyan'>City</th>\n";
echo "<th style='background-color:cyan'>Start Date</th>\n";
echo "<th style='background-color:cyan'>End Date</th>\n";
echo "<th style='background-color:cyan'>Position</th>\n";
echo "<th style='background-color:cyan'>Description</th>\n";
echo "<th style='background-color:cyan'>Status</th>\n";
echo "</tr>\n";
foreach ($Opportunities as $Opportunity) {
	if (!in_array($Opportunity['opportunityID'], $AssignedOpportunities)) {
		echo "<tr>\n";
		echo "<td>" . htmlentities($Opportunity['company']) . "</td>\n";
		echo "<td>" . htmlentities($Opportunity['city']) . "</td>\n";
		echo "<td>" . htmlentities($Opportunity['start_date']) . "</td>\n";
		echo "<td>" . htmlentities($Opportunity['end_date']) . "</td>\n";
		echo "<td>" . htmlentities($Opportunity['position']) . "</td>\n";
		echo "<td>" . htmlentities($Opportunity['description']) . "</td>\n";
		echo "<td>";
		if (in_array($Opportunity['opportunityID'], $SelectedOpportunities))
			echo "Selected<br /> .
			<a href='CancelSelection.php?" . SID . "&opportunityID=" . $Opportunity['opportunityID'] . "'>Cancel Selection</a>";
		else {
			if ($ApprovedOpportunities > 0)
				echo "Open";
			else
				echo "<a href='RequestOpportunity.php?internID=" . $_SESSION['internID'] . "&opportunityID=" . $Opportunity['opportunityID'] . "'>Available</a>";
		} //end else
		echo "</td>\n";
		echo "</tr>\n";
	} //end if (!in_array($Opportunity['opportunityID'], $AssignedOpportunities))
} //end foreach
echo "</table>\n";
echo "<p><a href='InternLogin.php'>Log Out</a></p>\n";
?>
</body>
</html>