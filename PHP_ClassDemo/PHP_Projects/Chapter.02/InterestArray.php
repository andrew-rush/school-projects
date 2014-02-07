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
            
            $interestRate1 = .0725;
            $interestRate2 = .0750;
            $interestRate3 = .0775;
            $interestRate4 = .0800;
            $interestRate5 = .0825;
            $interestRate6 = .0850;
            $interestRate7 = .0875;
            
            $ratesArray = array($interestRate1,
                                $interestRate2,
                                $interestRate3,
                                $interestRate4,
                                $interestRate5,
                                $interestRate6,
                                $interestRate7);
            
            echo "<pre>";
            print_r($ratesArray);
            echo "</pre>";
            
        ?>
        
    </body>
    
</html>