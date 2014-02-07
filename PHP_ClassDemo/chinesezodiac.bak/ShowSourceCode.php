<!DOCTYPE html PUBLIC "-//W#C//DTD XHTML 1.0 Strict//EN"
                        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Show Source Code</title>
        <meta http-equiv="content-type
                content="text/html; charset=iso-8859-1" />
    </head>
    <body>
        
        <?php
            
            if(isset($_GET['source_file'])) {
                
                $sourceFile = file_get_contents(stripslashes($_GET['source_file']));
                highlight_string($sourceFile);
                
            } else {
                
                echo "<p>No source file name entered</p>\n";
                
            }
            
        ?>
        
    </body>
    
</html>