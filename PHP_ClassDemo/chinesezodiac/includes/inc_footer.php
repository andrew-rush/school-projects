<?php
    include("includes/inc_connect.php");
	
	echo "<p>Total vistors to this site: $visitors</p>\n";
	
	$query = "SELECT count(proverb) as count FROM random_proverb";
	$result = mysql_query($query);
	$row = mysql_fetch_assoc($result);
	
	$rand = rand(1, $row['count']);
	
	$query = "SELECT proverb FROM random_proverb WHERE proverbNum = '$rand'";
	$result = mysql_query($query);
	$row = mysql_fetch_array($result);
	echo "<p class =\"smallText\">Randomly selected proverb:<br />{$row['proverb']}</p>\n";
	$query = "UPDATE random_proverb SET displayCount = displayCount + 1 WHERE proverbNum = '$rand'";
	$result = mysql_query($query);
	
	/*
	$myFile = file("proverbs.txt");
    $count = count($myFile);
    $r = rand(0, $count-1);
    echo "<p class =\"smallText\">Randomly chosen proverb read from text file:<br />$myFile[$r]</p>\n";
	*/
	
	// Scan the Images folder for images named dragonx.png, these are the mini dragon pictures
	// $myDir = chdir("images") or die ("Unable to open \"images/\"");
	$dirHandle = opendir("images") or die ("Unable to estable file handle");
	while($myFile = readdir($dirHandle)) {
		
		if(preg_match("/^dragon\d\.png$/", $myFile)) {
			
			$imageArray[]=$myFile;
			
		}
		
	}
	
	shuffle($imageArray);
	echo "<img src=\"images/$imageArray[0]\" alt=\"Dragon Icon\" />\n";
	echo "<p>&copy; ". date("Y") . "</p>\n";
    
?>