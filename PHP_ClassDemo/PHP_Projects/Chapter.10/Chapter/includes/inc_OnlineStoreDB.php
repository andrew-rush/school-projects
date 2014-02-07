<?

    $ErrorMsgs = array();
    
    $DBConnect = @new mysqli("localhost", "test", "test", "online_stores");
    
    if($DBConnect->connect_errno) {
        
        $ErrorMsgs[] = "MySQL is not available. Error Code " . $DBConnect->connect_errno . ": " . $DBConnect->connect_error;
        
    }   
    
?>