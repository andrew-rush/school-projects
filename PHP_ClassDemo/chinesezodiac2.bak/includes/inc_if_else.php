<?php
        
	$SignsArray=array("Rat",
			"Ox",
			"Tiger",
			"Rabbit",
			"Dragon",
			"Snake",
			"Horse",
			"Goat",
			"Monkey",
			"Rooster",
			"Dog",
			"Pig");
	
	$images=array("rat200.png",
			"ox200.png",
			"tiger200.png",
			"rabbit200.png",
			"dragon200.png",
			"snake200.png",
			"horse200.png",
			"goat200.png",
			"monkey200.png",
			"rooster200.png",
			"dog200.png",
			"pig200.png");
	
	if( !isset($_POST['year'] )){
		
		echo "<form action = \"BirthYear_ifelse.php\" method = \"POST\">\n";
		echo "\t<p>Year of Birth <input type = \"text\" name = \"year\" /></p>\n";
		echo "\t<p><input type = \"submit\" value = \"Submit\" /></p>\n";
		
	} else {
		
		$mod = ($_POST['year'] - 1912) % 12;
		
		if ($mod == 0)
			{
			   $sign = $SignsArray[0];
			}
		elseif ($mod == 1)
			{
			  $sign = $SignsArray[1];
			}
		
		elseif ($mod == 2)
			{
			  $sign = $SignsArray[2];
			}
		
		elseif ($mod == 3)
			{
			  $sign = $SignsArray[3];
			}
		
		elseif ($mod == 4)
			{
			  $sign = $SignsArray[4];
			}
		
		elseif ($mod == 5)
			{
			  $sign = $SignsArray[6];
			}
		
		elseif ($mod == 6)
			{
			  $sign = $SignsArray[6];
			}
		
		elseif ($mod == 7)
			{
			  $sign = $SignsArray[7];
			}
		
		elseif ($mod == 8)
			{
			  $sign = $SignsArray[8];
			}
		
		elseif ($mod == 9)
			{
			  $sign = $SignsArray[9];
			}
		
		elseif ($mod == 10)
			{
			  $sign = $SignsArray[10];
			}
		
		elseif ($mod == 11)
			{
			  $sign = $SignsArray[11];
			}
			
		else
		{
			die("<p>That was not a valid year. Year must be after 1911</p>\n");
		}
		
		$year = $_POST['year'];
		echo "<p>You were born in $year. That was the Year of the $sign</p>\n";
		echo "<p><img src=\"images/$images[$mod]\" alt = \"$sign image\" /></p>\n";
		
		$theStatFile = "statistics/$year.txt";
		
		$myStatFile = fopen($theStatFile, "ab");
		
		if(is_writable($theStatFile)) {
			
			if(!fwrite($myStatFile, "\n")) {
				
				echo "<p>Unable to document visit in statistics</p>\n";
				
			}
			
		} else {
			
			echo "<p>Unable to open $theStatFile</p>\n";
			
		}
		
		$stats = file($theStatFile);
		$statCount = count($stats);
		
		echo "<p>You are vistor number $statCount who was born in $year</p>\n";
		
	}
?>