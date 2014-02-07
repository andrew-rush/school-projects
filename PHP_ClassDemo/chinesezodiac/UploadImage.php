<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <title>Chinese Zodiac</title>
    <style type="text/css">
        
        #main {
            
            width: 100%;
            
        }
        
        #container {
            
            margin: auto;
            width:  960px;
            
        }
        
        #header {
            
            width: 950px;
            text-align: center;
            
        }
        
        #buttonLinks {
            
            width: 260px;
            float: left;
            
        }
        
        #textLinks {
            
            width: 950px;
            height: 50px;
            text-align: center;
            font: normal 0.8em sans-serif;
            
        }
        
        a.text {
            
            padding: 10px;
            
        }
        
        #content {
            
            width: 600px;
            float: left;
            font: normal 1em sans-serif;
            
        }
        
        #footer {
            
            width: 850px;
            clear: both;
            text-align: center;
            
        }
        
    </style>
    
</head>
<body>
    <div id="main">
        <div id="container">
            <div id="header">
                <?php
                
                    include("includes/inc_header.php");
                    
                ?>
            </div>
            <div id="textLinks">
                
                <?php
                
                    include("includes/inc_text_links.php");
                    
                ?>
                
            </div>
            <div id="buttonLinks">
                
                <?php
                
                    include("includes/inc_button_nav.php");
                    
                ?>
                
            </div>
            <div id="content">
                
			<?php
            
                if(!isset($_POST['upload'])) {
                    
                    echo "<form action = \"UploadImage.php\" method = \"POST\" enctype=\"multipart/form-data\">\n";
                    echo "\t<p><input type = \"hidden\" value =\"MAX_FILE_SIZE\" value = \"75000\" />\n\tFile: <input type = \"file\" name = \"myFile\" /></p>\n";
                    echo "\t<p><input type = \"submit\" name=\"upload\" value = \"Submit\" /></p>\n\t</form>\n";
                    
                } else {
                    
                    $source = $_FILES['myFile']['tmp_name'];
                    $dest = "images/".$_FILES['myFile']['name'];
                    
                    echo "<p>$source: $dest</p>";
                    
                    if( move_uploaded_file($_FILES['myFile']['tmp_name'], "images/".$_FILES['myFile']['name']) == FALSE ) {
                        
                        echo "<p>could not move file to \"images/" . htmlentities($_FILES['myFile']['name']) . "</p>\n";
                        
                    } else {
                        
                        chmod("images/".$_FILES['myFile']['name'], 0644);
                        echo "<p>Upload succeeded!</p>\n";
                        
                    }
                    
                }
        
            ?>
                
            </div>
            <div id="footer">
                
                <?php
                
                    include("includes/inc_footer.php");
                    
                ?>
                
            </div>
        </div>
    </div>
</body>
</html>
