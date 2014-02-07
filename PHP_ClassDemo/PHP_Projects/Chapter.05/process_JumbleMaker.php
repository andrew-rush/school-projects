<!DOCTYPE html PUBLIC "-//W#C//DTD XHTML 1.0 Strict//EN"
                        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Jumble Maker</title>
        <meta http-equiv="content-type
                content="text/html; charset=iso-8859-1" />
    </head>
    <body>
        
        <?php

        function displayError($fieldName, $errMsg)
        {
            
            global $errCount;
            echo "Error in \"$fieldName\": $errMsg<br />\n";
            ++$errCount;
            
        }
        
        function validWord($data, $fieldName)
        {
            
            global $errCount;
            
            if(empty($data))
            {
                
                displayError($fieldName, "This field is required.");
                $retval = "";
                
            }
            else
            {
                $retval = trim($data);
                $retval = stripslashes($retval);
                
                
                if ( strlen($retval) < 4 || strlen($retval) > 7 )
                {
                    
                    displayError($fieldName, "$retval is too long. Words must be between 4 and 7 characters long");
                }
                
                if(preg_match("/^[a-z]+$/i", $retval) == 0)
                {
                    
                    displayError($fieldName, "Words must be only letters.");
                    
                }
                
                $retval =  strtoupper($retval);
                $retval =  str_shuffle($retval);
                
                return $retval;
            }
            
        }
        
        $errCount = 0;
        $words = array();
        
        $words[] = validWord($_POST['Word1'], "Word 1");
        $words[] = validWord($_POST['Word2'], "Word 2");
        $words[] = validWord($_POST['Word3'], "Word 3");
        $words[] = validWord($_POST['Word4'], "Word 4");
        
        if($errCount > 0)
        {
            
            echo "Please use the back button and re-enter the words.<br>\n";
        }
        else
        {
            
            $wordNum = 0;
            foreach ($words as $thisWord)
            {
                
                echo "Word ". ++$wordNum . ": $thisWord<br />\n";
                
            }
            
        }
        ?>
        
    </body>
    
</html>