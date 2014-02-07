<!DOCTYPE html PUBLIC "-//W#C//DTD XHTML 1.0 Strict//EN"
                        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Validate Credit Card</title>
        <meta http-equiv="content-type
                content="text/html; charset=iso-8859-1" />
    </head>
    <body>
        
<?php
    
    // data to test against
    $cardArray = array("",
                       "8910-1234-5678-6543",
                       "OOOO-9123-4567-0123");
    
    // loop through each element of the array
    foreach($cardArray as $thisNumber) {
        
        if(empty($thisNumber)) { // if the string is empty
            
            echo "<p>Invalid card number: the string was empty</p>"; // reject the number
            
        } else { // otherwise, begin processing the string
            
            $cardNumber = $thisNumber;
            $cardNumber = str_replace("-", "", $cardNumber); // remove the dashes
            $cardNumber = str_replace(" ", "", $cardNumber); // remove any stray spaces
            
            if(!is_numeric($cardNumber)) { // if the card is not all numbers
                
                // it must not be valid
                echo "<p>Credit card number ".$cardNumber." is not a valid credit card number because it contains non-numeric characters.</p>";
                    
            } else { // if it does have all numbers
                
                // it might be a valid card number
                echo "<p>Credit card number ".$cardNumber." might be a valid credit card number.</p>";
                
            }
            
        }
        
    }

?>
        
    </body>
    
</html>