<!DOCTYPE html PUBLIC "-//W#C//DTD XHTML 1.0 Strict//EN"
                        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title></title>
        <meta http-equiv="content-type
                content="text/html; charset=iso-8859-1" />
    </head>
    <body>
        
        <?php
            
            $returnValue = 2 == 3;
            echo "<p>2 == 3: $returnValue</p>";
            
            $returnValue = "2" + "3";
            echo "<p>\"2\" + \"3\": $returnValue</p>";
            
            $returnValue = 2 >= 3;
            echo "<p>2 >= 3: $returnValue</p>";
            
            $returnValue = 2 <= 3;
            echo "<p>2 <= 3: $returnValue</p>";
            
            $returnValue = 2 + 3;
            echo "<p>2 + 3: $returnValue</p>";
            
            $returnValue = (2 >= 3) && (2 > 3);
            echo "<p>(2 >= 3) && (2 > 3): $returnValue</p>";
            
            $returnValue = (2 >= 3) || (2 > 3);
            echo "<p>(2 >= 3) || (2 > 3)$returnValue</p>";
            
            
            
        ?>
        
    </body>
    
</html>