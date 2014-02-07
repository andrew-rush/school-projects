<?php
    
    session_start();
    //require_once("includes/inc_OnlineStoreDB.php");
    //require_once("class/class_OnlineStore.php");
    
    $storeID = "COFFEE";
    $storeInfo = array();
    
    if(class_exists("OnlineStore")) {
        
        if(isset($_SESSION['currentStore'])) {
            $Store = unserialize($_SESSION['currentStore']);
        }
        else {
            $Store = new OnlineStore();
        }
        
        $Store->setStoreID($storeID);
        $storeInfo = $Store->getStoreInformation();
        
    } else {
        
        $ErrorMsgs[] = "OnlineStore.class not available";
        $Store = NULL;
        
    }
    
?>

<!DOCTYPE html PUBLIC "-//W#C//DTD XHTML 1.0 Strict//EN"
                        "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <title><?php echo $storeInfo['name']; ?></title>
        <meta http-equiv="content-type
                content="text/html; charset=iso-8859-1" />
    </head>
    <body>
        
    <h2><?php echo htmlentities($storeInfo['name']); ?></h2>
    <h3><?php echo htmlentities($storeInfo['description']); ?></h3>
    <p><?php echo htmlentities($storeInfo['welcome']); ?></p>
    <?php
    
        $Store->getProductList();
        $_SESSION['currentStore'] = serialize($Store);
    
        
        if(count($ErrorMsgs) == 0) {
            
            $SQLstring = "SELECT * FROM inventory WHERE storeID = 'COFFEE'";
            $QueryResult = $DBConnect->query($SQLstring);
            if ($QueryResult === FALSE) {
                
                $ErrorMsgs[] = "<p>Query failed. " . $DBConnect->errno . ": " . $DBConnect->error . "</p>\n";
                foreach($ErrorMsgs as $thisMsg) {
                
                    echo $thisMsg;
                    
                }
        
            } else {
                
                echo "<table width = \"800\">\n";
                echo "<tr><th>Product</th><th>Description</th><th>Price</th></tr>\n";
                while( $Row = $QueryResult->fetch_assoc() ) {
                    
                    echo "<tr><td>" . htmlentities($Row['name']) . "</td>\n";
                    echo "<td>" . htmlentities($Row['description']) . "</td>\n";
                    printf("<td>$%.2f</td></tr>\n", $Row['price']);
                    
                    
                    //var_dump($Row);
                    
                }
                
                echo "</table>\n";
                
            }
            
            $_SESSION['currentStore'] = serialize($Store);
            
        } else {
            
            
           foreach($ErrorMsgs as $thisMsg) {
                
                echo $thisMsg;
                
            } 
            
            
        }

    ?>
        
    </body>
    
</html>

<?php // $DBConnect->close(); ?>