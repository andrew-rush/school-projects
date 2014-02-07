<!DOCTYPE html PUBLIC "-//W#C//DTD XHTML 1.0 Strict//EN"
                        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Gas Prices</title>
        <meta http-equiv="content-type
                content="text/html; charset=iso-8859-1" />
    </head>
    <body>
        
        <?php
        
            $gasPrice = 2.57;
            
            if( ($gasPrice >= 2 ) && ( $gasPrice <= 3 ) ){
                
                echo( "<p>Gas prices are between $2 and $3.</p>" );
                
            } else {
                
                echo( "<p>Gas prices are not between $2 and $3.<p>" );
                
            }
        
        ?>
        
    </body>
    
</html>