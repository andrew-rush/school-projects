<!DOCTYPE html PUBLIC "-//W#C//DTD XHTML 1.0 Strict//EN"
                        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title>Paycheck Data</title>
        <meta http-equiv="content-type
                content="text/html; charset=iso-8859-1" />
    </head>
    <body>
        
<?php

    if( isset($_POST['submit'] )) // If the form was submitted
    {

        if( !is_numeric($_POST['hours']) || !is_numeric($_POST['wage']) ) // if the form values were not numbers we have an error
        {
            echo "<p>Error: The submitted values were not numbers.</p>\n";
        }
        else // if the form values were numbers, process the form
        {
            
            if($_POST['hours'] > 40) // More than 40 hours means overtime
            {
                // overtime calculation is: (40 * wage) + ([(hours-40) * 1.5] * wage)
                $totalWage = (40 * $_POST['wage']) + ( ( ( $_POST['hours'] - 40 ) * 1.5 ) * $_POST['wage']); 
            } 
            else // no overtime
            {
                // calculation is wage * hours
                $totalWage = $_POST['hours'] * $_POST['wage'];
            }
            
            // output the total wages
            echo "<p>Total Wages: $totalWage</p>\n";            
            
        } 
        
        
    } // end if form submit
    else
    {
        echo "<p>No data was submitted.</p>\n";
    }
    
?>
        
    </body>
    
</html>