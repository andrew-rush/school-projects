<html>
    <head>
        <title></title>
        <meta http-equiv="content-type
                content="text/html; charset=iso-8859-1" />
    </head>
    <body>
        
<?php

    // array of test data, one of which is a palindrome
    $pals = array ("Racecar",
                    "Demon");
    
    // loop through the array
    foreach($pals as $thisString) {
        
        // make sure the string uses only lower case letters
        $thisStringLC = strtolower($thisString);
        // invert the text string
        $backwards = strrev($thisStringLC);
        
        // if the backwards string is the same as the original string
        if($thisStringLC == $backwards) {
            
            echo "<p>The word $thisString is a palindrome</p>"; // then we have a palindrome
            
        } else { // otherwise
            
            echo "<p>The word $thisString is not a palindrome"; // the string is not a palindrome
            
        }
        
    }
?>
        
    </body>
    
</html>