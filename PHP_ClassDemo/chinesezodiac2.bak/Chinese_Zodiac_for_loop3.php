<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <title>Chinese Zodiac</title>
    <style type="text/css">
        
        #main {
            
            width: 100%;
            
        }
        
        #container {
            
            margin: auto;
            width:  960px;
            
        }
        
        #header {
            
            width: 950px;
            text-align: center;
            
        }
        
        #content {
            
            width: 600px;
            float: left;
            font: normal 1em sans-serif;
            
        }
        
        #footer {
            
            width: 850px;
            clear: both;
            text-align: center;
            
        }
        
        #buttonLinks {
            
            width: 260px;
            float: left;
            
        }
        
        #textLinks {
            
            width: 950px;
            height: 50px;
            text-align: center;
            font: normal 0.8em sans-serif;
            
        }
        
        a.text {
            
            padding: 10px;
            
        }
		
		div.zodiac {
			
			float: left;
			width: 120px;
			margin: 10px;
			border: 2px thin #000;
			clear: none;
		}
        
    </style>
    
</head>
<body>
    <div id="main">
        <div id="container">
            <div id="header">
                <?php
                
                    include("includes/inc_header.php");
                    
                ?>
            </div>
            <div id="textLinks">
                
                <?php
                
                    include("includes/inc_text_links.php");
                    
                ?>
                
            </div>
            <div id="buttonLinks">
                
                <?php
                
                    include("includes/inc_button_nav.php");
                    
                ?>
                
            </div>
            <div id="content">
                
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
                
            
            </div>
            <div id="footer">
                
                <?php
                
                    include("includes/inc_footer.php");
                    
                ?>
                
            </div>
        </div>
    </div>
</body>
</html>
