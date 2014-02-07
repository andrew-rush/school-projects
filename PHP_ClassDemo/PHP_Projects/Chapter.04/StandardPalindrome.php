<html>
    <head>
        <title></title>
        <meta http-equiv="content-type
                content="text/html; charset=iso-8859-1" />
    </head>
    <body>
        
<?php
    
    // array of test data
    $pals = array ("Never odd or even.",
                   "Madam, I'm Adam.",
                    "Always odd or even.");
    
    // loop through the array
    foreach($pals as $thisString) {
        
        // put the string in lower case
        $thisStringLC = strtolower($thisString);
        // remove anything that is not a letter
        $thisStringLC = preg_replace("/[^a-zA-Z]+/", " ", $thisStringLC);
        // remove any spaces in the string
        $forward = str_replace(" ", "", $thisStringLC);
        // revers the string
        $backwards = strrev($forward);
        
        // if the string is the same backwards and forwards
        if($forward == $backwards) {
            
            echo "<p>The phrase \"$thisString\" is a palindrome</p>"; // then it is a palindrome
            
        } else { // otherwise
            
            echo "<p>The phrase \"$thisString\"is not a palindrome"; // it is not a palindrome
            
        }
        
    }
?>
        
    </body>
    
</html>