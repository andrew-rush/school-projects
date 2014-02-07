<?php 

	require("includes/inc_site_counter.php"); 
	require("includes/inc_banner_display.php");
	
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <title>Chinese Zodiac</title>
    <link rel="stylesheet" href="css/reset.css" />
    <link rel="stylesheet" href="css/styles.css" />
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
                
                    if(isset($_GET['page'])) // if there is a value in the GET global array labelled page
                    {
                        switch ($_GET['page']) // then we'll include things based on the value of $_GET['page']
                        {
                            case 'site_layout'; 
                                include('includes/inc_site_layout.php');
                                break;
                            case 'control_structures';
                                include('includes/inc_control_structures.php');
                                break;
                            case 'string_functions';
                                include('includes/inc_string_functions.php');
                                break;
                            case 'web_forms';
                                include('includes/inc_web_forms.php');
                                break;
                            case 'midterm_assessment';
                                include('includes/inc_midterm_assessment.php');
                                break;
							case 'while_loop';
                                include('includes/inc_while_loop.php');
                                break;
                            case 'for_loop';
                                include('includes/inc_for_loop.php');
                                break;
                            case 'if_else';
                                include('includes/inc_if_else.php');
                                break;
                            case 'switch';
                                include('includes/inc_switch.php');
                                break;
                            case 'similar_names';
                                include('includes/inc_similar_names.php');
                                break;
                            case 'embedded_words';
                                include('includes/inc_embedded_words.php');
                                break;
                            case 'sort';
                                include('includes/inc_sort.php');
                                break;
                            case 'gallery';
                                include('includes/inc_gallery.php');
                                break;
                            case 'feedback';
                                include('includes/inc_process_feedback.php');
                                break;
                            case 'view_feedback';
                                include('includes/inc_view_feedback.php');
                                break;
                            case 'view_feedback';
                                include('includes/inc_view_feedback.php');
                                break;
                            case 'midterm_quiz';
                                include('includes/inc_midterm.php');
                                break;
                            case 'final';
                                include('includes/inc_final_project.php');
                                break;
                            default:
								//echo "page {$_GET['page']}";
                                include('includes/inc_home.php');
                                break;
                            
                        } // end switch 
                        
                    } // end if
                    else
                    { // the user wants to see the main page
                        include("includes/inc_home.php"); 
                    } // end else
                    
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
