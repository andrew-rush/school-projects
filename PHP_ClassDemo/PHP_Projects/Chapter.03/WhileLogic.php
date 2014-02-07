<!DOCTYPE html PUBLIC "-//W#C//DTD XHTML 1.0 Strict//EN"
                        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>While Logic</title>
        <meta http-equiv="content-type
                content="text/html; charset=iso-8859-1" />
    </head>
    <body>
        
        <?php
        
            $count = 0;
            while ( $count < 100 ) {
                
                $numbers[] = $count;
                $count++;
                
            }
            
            foreach ($numbers as $curNum) {
                
                echo( "<p>$curNum</p>" );
                
            }
        ?>
        
    </body>
    
</html>