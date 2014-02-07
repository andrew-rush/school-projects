<!DOCTYPE html PUBLIC "-//W#C//DTD XHTML 1.0 Strict//EN"
                        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Sign Guest Book</title>
        <meta http-equiv="content-type
                content="text/html; charset=iso-8859-1" />
    </head>
    <body>
        
        <?php
            
            if( empty($_POST['fName']) || empty($_POST['lName']) ) {
                
                echo "<p>You must enter your first and last name. Click your browser's Back button to return to the Guest Book.</p>";
                
            } else {
                
                $first = addslashes($_POST['fName']);
                $last = addslashes($_POST['lName']);
                
                $guestBook = fopen("guestbook.txt", "ab") or die ("Unable to open the file");
                
                if(is_writable("guestbook.txt")) {
                    
                    if(fwrite($guestBook, $last.", ".$first."\n")){
                        
                        echo "<p>Thank you for signing our Guest Book.</p>";
                        
                    } else {
                        
                        echo "<p>Cannot add your name to the Guest Book.</p>";
                        $perms = fileperms("guestbook.txt");
                        $perms = decoct($perms % 01000);
                        echo "<p>Permissions: 0$perms</p>";
                        
                    }
                    
                } else {
                    
                    echo "<p>Cannot write to guest book.</p>";
                    
                }
                
                
                
                
            }
            
        ?>
        
    </body>
    
</html>