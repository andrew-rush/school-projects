<!DOCTYPE html>
<html >
<head>
<title>Create members table (create_members table.php)</title>
</head>
<body>
<h1 align = "center"><strong>Creating the members Table</h1><br /> <br />

<?php
//include database connection information
include "inc_connect.php";

//Create database beginning with username_
$Database = "andrew-rush_cz_members";

//test for database creation
if (mysql_query("CREATE DATABASE `$Database`",$DBConnect))
  {
  echo "Database " . $Database . " created";
  }
else
  {
  echo "Error creating database: " . mysql_error();
  }

//test for database selection
$DBSelect = mysql_select_db($Database, $DBConnect);
if ($DBSelect)
{
	echo "Selected the " . $Database . " database";
}
else
{
	echo "Unable to select the " . $Database . " database";
}
// Create a table for the Chinese Zodiac Social Networking Site
//creates a variable to save the table name
$TableName = "cz_members4";

//tests to see if the table already exists and creates a table only if does not exist
$SQLstring = "SHOW TABLES LIKE 	'$TableName'";

//executes the query and uses the error control operator to suppress error messages
$QueryResult = @mysql_query($SQLstring, $DBConnect);

//uses a conditional statment to test if the table exists
if (mysql_num_rows($QueryResult) > 0)
	{
		echo "<p>" . $TableName . " has already been created.</p>\n";
	}
else
	{
	//if the table does not exist, create the table
	$SQLstring = "CREATE TABLE $TableName(
		id INT NOT NULL AUTO_INCREMENT,
		PRIMARY KEY(id),
		firstName VARCHAR(50),
		lastName VARCHAR(50),
		chineseName VARCHAR(50),
		sign VARCHAR(12),
		element VARCHAR (10),
		compatible VARCHAR (50),
		YinYang VARCHAR (5),
		personality VARCHAR (100),
		image VARCHAR (200),
		userName VARCHAR (50),
		passwordHash VARCHAR (50),
		passwordSalt VARCHAR (50))";
	}
	//executes the query
	$QueryResult = mysql_query($SQLstring, $DBConnect);

	//checks to see if the table was created
	if($QueryResult === FALSE)
	{
	echo "<p>Unable to execute the query.</p>"
		. "<p>Error code " . mysql_errno($DBConnect) . ": " . mysql_error($DBConnect) . "</p>";
	}
	else
	{
		echo "<p>The " . $TableName . " was successfully created.</p>";
	}
?>

</body>
</html>