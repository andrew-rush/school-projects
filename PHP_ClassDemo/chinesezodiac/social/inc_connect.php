<?php

$DBConnect = mysql_connect("cismysql.uma.edu", "andrew.rush", "NpExlgjtgacajKTuq7BpWFJj9gw");  //assigns connection information to a variable
//uses a conditional statement to test the connection to the server
if (!$DBConnect)
	{
	echo "<p>Could not connect to the server " . mysql_error() . "</p>\n";
	}
else
	{
		//echo "<p>Connected to the server.</p>\n";

		$DBName = 'andrew-rush_cz_members';


		$DBSelect = mysql_select_db($DBName, $DBConnect);

			if ($DBSelect)
			{
				//echo "Database selected";
			}
			else
			{
			echo "Cannot select database";
    		}

	}
?>
