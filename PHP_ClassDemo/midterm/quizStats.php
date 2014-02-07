<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Untitled Document</title>
</head>

<body>

<?php

	$statFile = file("quiz/statistics.txt"); //open the file in an array
	
	// remove the newlines
	foreach($statFile as $a) {
		
		$a = str_replace("\n", "", $a);
		
	}
	
	// each line is a different data set, assign values
	$total = $statFile[0]; // fine the way it is
	
	// getthe question stats and break them into an array
	$questionStats = $statFile[1];
	$questionStatArray = explode(",", $questionStats);
	
	// get the grade stats and break them into an array
	$gradeStats = $statFile[2];
	$gradeStatArray = explode(",", $gradeStats);
	
	// start to display the stats
	echo "<p>The quiz has been taken $total times</p>\n";
	
	// display question stats
	echo "<table border = \"1\" padding = \"10\">\n";
	echo "  <tr>\n";
	echo "\t<td>Question</td><td>Correct Answers</td>\n";
	for($i=0; $i< count($questionStatArray); $i++) {
		
		$qNum = $i + 1;
		echo "  <tr>\n";
		echo "\t<td>Question $qNum</td><td>$questionStatArray[$i]</td>\n";
		echo "  </tr>\n";
	}
	echo "</table>\n"; // end question stats
	
	echo "<br />\n";
	
	// display grade stats
	echo "<table border = \"1\" padding =\"10\">\n";
	echo "  <tr>\n";
	echo "\t<td>Grade</td><td>Times Achieved</td>\n";
	for($i=0; $i< count($questionStatArray); $i++) {
		
		$grade = ($i+1) * 10;
		
		echo "  <tr>\n";
		echo "\t<td>$grade</td><td>$gradeStatArray[$i]</td>\n";
		echo "  </tr>\n";
	}
	echo "</table>\n"; // end grade stats
	
?>

</body>
</html>