<!DOCTYPE html PUBLIC "-//W#C//DTD XHTML 1.0 Strict//EN"
                        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Validate Local Address</title>
        <meta http-equiv="content-type
                content="text/html; charset=iso-8859-1" />
    </head>
    <body>
    <h1>Validate Local Address</h1>
    
<?php
    
    // data to test against, stored in an array
    $email = array("jsmith123@example.org",
                   "john.smith.mail@example.org",
                   "john.smith@example.org",
                   "john.smith@example",
                   "jsmith123@mail.example.org");
    
    // loop through each element of the array
    foreach ($email as $emailAddress) {
        
        echo "<p>The email address &ldquo;".$emailAddress."&rdquo; ";
        
        // if the string satisfies the requirements of our REGEX
        if(preg_match("/^(([A-Za-z]+\d+)|"."([A-Za-z]+\.[A-Za-z]+))"."@((mail\.)?)example\.org$/i", $emailAddress)==1) {
            
            echo "is a valid email address."; // then the string is an acceptable email address
            
        } else { // otherwise, it's not
            
            echo "is not a valid email address.</p>";
            
        }
        
    }

?>
        
    </body>
    
</html>