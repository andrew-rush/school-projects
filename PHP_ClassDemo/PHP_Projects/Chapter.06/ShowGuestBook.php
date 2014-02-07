<!DOCTYPE html PUBLIC "-//W#C//DTD XHTML 1.0 Strict//EN"
                        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Show Guest Book</title>
        <meta http-equiv="content-type
                content="text/html; charset=iso-8859-1" />
    </head>
    <body>
        
        <?php
            
            if(!$myFile = fopen("guestbook.txt", "r")) {
                
                echo "<p>Unable to open the Guest Book file.</p>";
                
            } else {
                
                $myGuestBook = file("guestbook.txt");
                foreach($myGuestBook as $myGuest) {
                    
                    $myGuest = stripslashes($myGuest);
                    $myGuestArray = explode(",", $myGuest);
                    echo "<p>$myGuestArray[1] $myGuestArray[0]</p>";
                    
                }
                
            }
            
        ?>
        
    </body>
    
</html>