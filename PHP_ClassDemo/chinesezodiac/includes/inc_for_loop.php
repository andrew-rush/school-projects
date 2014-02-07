<?php

    $signs=array("Rat",
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
    
    $images=array("rat.png",
                "ox.png",
                "tiger.png",
                "rabbit.png",
                "dragon.png",
                "snake.png",
                "horse.png",
                "goat.png",
                "monkey.png",
                "rooster.png",
                "dog.png",
                "pig.png");
                    
    
    
    echo "<table border = \"0\">\n<tr>\n";
    
	$startYear = 1912;
    $endYear = date(Y);
	
	for($i = 0; $i < 12; $i++) {
		
		echo "<div class=\"zodiac\"><p><img src=\"images/$images[$i]\" /></p>\n";
		echo "<h3>$signs[$i]</h3>\n<p>\n";
		$tempYear=$startYear + $i;
        
        
        while($tempYear < $endYear) {
        
            echo "$tempYear<br />";
            $tempYear = $tempYear+12;
        
        }
		
		echo "</p></div>\n";
		
	}
	
?>