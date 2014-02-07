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
        
		$SignsArray = array(
         		"Rat" => array(
              	"Start Date" => 1900,
              	"End Date" => 2020,
              	"President" => "George Washington"),
				"Ox"=>array(
				"Start Date" => 1901,
              	"End Date" => 2021,
              	"President" => "Barack Obama"),
				"Tiger" => array(
				"Start Date" => 1902,
              	"End Date" => 2022,
              	"President" => "Dwight Eisenhower"),
				"Rabbit" => array(
				"Start Date" => 1903,
              	"End Date" => 2023,
              	"President" => "John Adams"),
				"Dragon" => array(
				"Start Date" => 1904,
              	"End Date" => 2024,
              	"President" => "Abraham Lincoln"),
				"Snake" => array(
				"Start Date" => 1905,
              	"End Date" => 2025,
              	"President" => "John Kennedy"),
				"Horse" => array(
				"Start Date" => 1906,
              	"End Date" => 2026,
              	"President" => "Teddy Roosevelt"),
				"Goat" => array(
				"Start Date" => 1907,
              	"End Date" => 2027,
              	"President" => "James Madison"),
				"Monkey" => array(
				"Start Date" => 1908,
              	"End Date" => 2028,
              	"President" => "Harry Truman"),
				"Rooster" => array(
				"Start Date" => 1909,
              	"End Date" => 2029,
              	"President" => "Grover Cleveland"),
				"Dog" => array(
				"Start Date" => 1910,
              	"End Date" => 2030,
              	"President" => "George W. Bush"),
				"Pig" => array(
				"Start Date" => 1911,
              	"End Date" => 2031,
              	"President" => "Ronald Reagan"));
				
				// print_r($SignsArray);
				
            if( !isset($_POST['year'] )){
                
                echo "<form action = \"BirthYear_switch2.php\" method = \"POST\">\n";
                echo "\t<p>Year of Birth <input type = \"text\" name = \"year\" /></p>\n";
                echo "\t<p><input type = \"submit\" value = \"Submit\" /></p>\n";
                
            } else {
                
                $mod = ($_POST['year'] - 1900) % 12;
                
                // $Mod = ($Year - $StartYear) %12;
                
                switch($mod) {
                    
                    case 0:
						$sign = "Rat";
						$pres = $SignsArray[$sign]['President'];
                        break;
                    case 1:
                        $sign = "Ox";
						$pres = $SignsArray[$sign]['President'];
                        break;
                    case 2:
                        $sign = "Tiger";
						$pres = $SignsArray[$sign]['President'];
                        break;
                    case 3:
                        $sign = "Rabbit";
						$pres = $SignsArray[$sign]['President'];
                        break;
                    case 4:
                        $sign = "Dragon";
						$pres = $SignsArray[$sign]['President'];
                        break;
                    case 5:
                        $sign = "Snake";
						$pres = $SignsArray[$sign]['President'];
                        break;
                    case 6:
                        $sign = "Horse";
						$pres = $SignsArray[$sign]['President'];
                        break;
                    case 7:
                        $sign = "Goat";
						$pres = $SignsArray[$sign]['President'];
                        break;
                    case 8:
                        $sign = "Monkey";
						$pres = $SignsArray[$sign]['President'];
                        break;
                    case 9:
                        $sign = "Rooster";
						$pres = $SignsArray[$sign]['President'];
                        break;
                    case 10:
                        $sign = "Dog";
						$pres = $SignsArray[$sign]['President'];
                        break;
                    case 11:
                        $sign = "Pig";
						$pres = $SignsArray[$sign]['President'];
                        break;
                    default:
                        echo "<p>That was not a valid year. Year must be after 1900.</p>\n";
                        break;
                }
                    
                $year = $_POST['year'];
				$a = key($SignsArray[$mod]);
                echo "<p>You were born in $year. That was the Year of the $sign. President $pres was also born in the year or the $sign!</p>\n";
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
