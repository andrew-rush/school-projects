<?php

    if(isset( $_GET['section'] )) // if we have a global $_GET labelled "section"
    {
    
        switch( $_GET['section'] ) // we we do different things based on the value of $_GET['section']
        {
            case 'zodiac':
                include("includes/inc_chinese_zodiac.php");
                break;
            case 'php':
            
            default:
                include("includes/inc_php_info.php");
                break;
        } // end switch
    
    } // end if
    else
    {
        include("includes/inc_php_info.php");
    } // end else
    
?>