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

	if(isset($_POST['signs'])) {
		
		$signs = $_POST['signs'];
		
		$signs = explode(",", $signs);
		
		for($i = 0; $i < count($signs); $i++) {
			
			$signs[$i] = trim($signs[$i]);
			
		}
		
		sort($signs);
		
		$signs = implode(", ", $signs);
		
		echo "<p>Your string sorted:\n";
		echo "<blockquote>$signs</blockquote>\n";
		echo "</p>\n";
		
	}

?>

<p>Please enter the signs of the Chinese zodiac in random order in the text box below. Please be sure that it looks like the string below, with commas between the signs. Feel free to copy and paste the provided string into the form if you want want minimize your typing.</p>
<p>Rat, Ox, Tiger, Rabbit, Dragon, Snake, Horse, Goat, Monkey, Rooster, Dog, Pig</p>


<form id="zodiacSigns" name="form1" method="POST" action="">
  <p><textarea name="signs" cols="35" rows="15"></textarea></p>
  <p><input name="submit" type="submit" value="Submit Signs for Sorting" /></p>
</form>

<p>P.S. This form will sort any string of comma-separated values, not just the signs of the Chinese zodiac.
                
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
