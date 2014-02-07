<html>
    <head>
        <title></title>
        <meta http-equiv="content-type
                content="text/html; charset=iso-8859-1" />
    </head>
    <body>
        
<?php

    $pals = array ("racecar",
                    "demon");
    
    foreach($pals as $thisString) {
        
        $backwards = strrev($thisString);
        
        if($thisString == $backwards) {
            
            echo "<p>The word $thisString is a palindrome</p>";
            
        } else {
            
            echo "<p>The word $thisString is not a palindrome";
            
        }
        
    }
?>
        
    </body>
    
</html>