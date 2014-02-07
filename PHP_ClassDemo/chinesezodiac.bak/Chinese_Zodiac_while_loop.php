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
                    
    echo "<table border = \"1\">\n<tr>\n";
    
    foreach($signs as $thisSign) {
    
        echo("<td width=\"80\">$thisSign</td>\n");
        
    }
    
    echo "</tr>\n<tr>";
    
    foreach($images as $thisImage){
        
        echo("<td width=\"80\"><img src=\"images/$thisImage\" /></td>\n");
    }
    
    echo "</tr>\n<tr>";
    
    $startYear = 1912;
    $endYear = date(Y);
    $i=0;
    while($i < 12) {
    
        $tempYear=$startYear + $i;
        echo "<td>";
        
        while($tempYear < $endYear) {
        
            echo "$tempYear<br />";
            $tempYear = $tempYear+12;
        
        }
        
        echo "</td>";
        $i++;
        
    
    }
    
    echo "</tr></table>"
    
    
    
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
