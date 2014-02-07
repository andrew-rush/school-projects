<!DOCTYPE html PUBLIC "-//W#C//DTD XHTML 1.0 Strict//EN"
                        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Odd Numbers</title>
        <meta http-equiv="content-type
                content="text/html; charset=iso-8859-1" />
    </head>
    <body>
        
        <?php
        
        $i = 1;
        
        while ( $i < 100 ) {
            
            if( $i % 2 != 0 ) {
                
                echo( "<p>$i</p>" );
                
            }
            
            $i++;
            
        }

        ?>
        
    </body>
    
</html>