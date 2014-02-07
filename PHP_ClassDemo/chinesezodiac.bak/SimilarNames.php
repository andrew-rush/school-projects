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
                $SignNames = array(
                         "Rat",
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
                         
                $LevenshteinSmallest = 999999;
                $SimilarTextLargest = 0;
                         
                for ($i=0; $i<11; ++$i) {
                     for ($j=$i+1; $j<12; ++$j) {
                          $LevenshteinValue = levenshtein($SignNames[$i], $SignNames[$j]);
                          if ($LevenshteinValue < $LevenshteinSmallest) {
                               $LevenshteinSmallest = $LevenshteinValue;
                               $LevenshteinWord1 = $SignNames[$i];
                               $LevenshteinWord2 = $SignNames[$j];
                          }
                          $SimilarTextValue =  similar_text($SignNames[$i], $SignNames[$j]); 
                          if ($SimilarTextValue > $SimilarTextLargest) {
                               $SimilarTextLargest = $SimilarTextValue;
                               $SimilarTextWord1 = $SignNames[$i];
                               $SimilarTextWord2 = $SignNames[$j];
                          }
                     }
                }
                
                echo "<p>The levenshtein() function has determined that &quot;$LevenshteinWord1&quot; 
                      and &quot;$LevenshteinWord2&quot; are the most similar names.</p>\n";
                echo "<p>The similar_text() function has determined that &quot;$SimilarTextWord1&quot; 
                      and &quot;$SimilarTextWord2&quot; are the most similar names.</p>\n";
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
