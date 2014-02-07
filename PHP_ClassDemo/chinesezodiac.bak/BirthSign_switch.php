<!DOCTYPE html PUBLIC "-//W#C//DTD XHTML 1.0 Strict//EN"
                        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title></title>
        <meta http-equiv="content-type
                content="text/html; charset=iso-8859-1" />
    </head>
    <body>
        
        <?php
        
        $Signsarray=array("Rat",
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
        
        $images=array("rat.jpg",
                "ox.jpg",
                "tiger.jpg",
                "rabbit.jpg",
                "dragon.jpg",
                "snake.jpg",
                "horse.jpg",
                "goat.jpg",
                "monkey.jpg",
                "rooster.jpg",
                "dog.jpg",
                "pig.jpg");
        
            if( !isset($_POST['year'] )){
                
                echo "<form action = \"BirthYear_switch.php\" method = \"POST\">\n";
                echo "\t<p>Year of Birth <input type = \"text\" name = \"year\" /></p>\n";
                echo "\t<p><input type = \"submit\" value = \"Submit\" /></p>\n";
                
            } else {
                
                $mod = ($_POST['year'] - 1912) % 12;
                
                $Mod = ($Year - $StartYear) %12;
                
                switch($mod) {
                    
                    case 0:
                        $sign = $SignsArray[0];
                        break;
                    case 1:
                        $sign = $SignsArray[0];
                        break;
                    case 2:
                        $sign = $SignsArray[0];
                        break;
                    case 3:
                        $sign = $SignsArray[0];
                        break;
                    case 4:
                        $sign = $SignsArray[0];
                        break;
                    case 5:
                        $sign = $SignsArray[0];
                        break;
                    case 6:
                        $sign = $SignsArray[0];
                        break;
                    case 7:
                        $sign = $SignsArray[0];
                        break;
                    case 8:
                        $sign = $SignsArray[0];
                        break;
                    case 9:
                        $sign = $SignsArray[0];
                        break;
                    case 10:
                        $sign = $SignsArray[0];
                        break;
                    case 11:
                        $sign = $SignsArray[0];
                        break;
                    default:
                        echo "<p>That was not a valid year. Year must be after 1911</p>\n";
                        break;
                }
                    
                $year = $_POST['year'];
                echo "<p>You were born in $year. That was the Year of the $sign</p>\n";
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
        
    </body>
    
</html>