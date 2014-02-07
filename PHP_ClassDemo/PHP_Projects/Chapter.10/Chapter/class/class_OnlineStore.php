<?php

    class OnlineStore {
    
        private $DBConnect = NULL;
        private $storeID = "";
        private $inventory = array();
        private $shoppingCart = array();
        
        function __construct() {
            
            include("inc_OnlineStore.php");
            $this->DBConnect = $DBConnect;
            
        } // end __construct()
        
        function __destruct() {
            
            if( !$this->DBConnect->connect_error ) {
                
                $this->DBConnect->close();
            }
            
        } // end __destruct();
        
        public function setStore($storeID) {
            
            if($this->storeID != $storeID) {
                
                $this->storeID = $storeID;
                $SQLString = "SELECT * FROM inventory WHERE storeID = '" . $this->storeID . "'";
                $QueryResult = $this->DBConnect->query($SQLString);
                if($QueryResult === FALSE) {
                    
                    $this->storeID = "";
                    
                }
                else {
                    
                    $this->inventory = array();
                    $this->shoppingCart =  array();
                    while (($Row = $QueryResult->fetch_assoc())) {
                        
                        $this->inventory[ $Row['productID'] ] = array();
                        $this->inventory[ $Row['productID'] ]['name'] = $Row['name'];
                        $this->inventory[ $Row['productID'] ]['description'] = $Row['description'];
                        $this->inventory[ $Row['productID'] ]['price'] = $Row['price'];
                        $this->shoppingCart[$Row['productID']] = 0;
                    }
                    
                }
                
            }
            
        } // end setStore()
        
        public function getStoreInformation() {
            
            $retval = FALSE;
            if ($this->storeID != "") {
                
                $SQLString = "SELECT * FROM store_info WHERE storeID = '" . $this->storeID . "'";
                $QueryResult = @$this->DBConnect->query($SQLString);
                if($QueryResult !== FALSE) {
                    
                    $retval = $QueryResult->fetch_assoc();
                    
                }
                
            }
            return $retval;
            
        } // end getStoreInformation()
        
        public function getProductList() {
            
            $retval = FALSE;
            $subtotal = 0;
            
            if(count($this->inventory) > 0) {
                
                echo "<table width = \"800\">\n";
                echo "<tr><th>Product</th><th>Description</th><th>Price Each</th><th>In Cart</th><th>Total Price</th><th>&nbsp;</th></tr>\n";
                foreach( $this->inventory as $id => $info ) {
                    
                    echo "<tr><td>" . htmlentities($info['name']) . "</td>\n";
                    echo "<td>" . htmlentities($info['description']) . "</td>\n";
                    printf("<td class = \"currency\">$%.2f</td></tr>\n", $info['price']);
                    echo "<td class = \"currency\">" . $this->shoppingCart[$id] . "</td>\n";
                    printf("<td class = \"currency\">$%.2f</td>\n", $info['price'] * $this->shoppingCart[$id]);
                    echo "<td><a href=\"" . $_SERVER['SCRIPT_NAME'] . "?PHPSESSID=" . session_id() . "&itemToAdd=$id\">Add Item</a></td>\n";
                    
                    $subtotal += ($info['price'] * $this->shoppingCart[$id]);
                     
                    
                    //var_dump($Row);
                    
                }
                
                echo "<tr><td colspan = \"4\">Subtotal</td>\n";
                printf("<td class = \"currency\">$%.2f</td>\n", $subtotal);
                echo "<td>&nbsp;</td>\n";
                echo "</table>\n";
                
            }
            
        } // end getProductList
        
        public function addItem() {
            
            $ProdID = $_GET['itemToAdd'];
            if(array_key_exists($ProdID, $this->shoppingCart)) {
                
                $this->shoppingCart[$ProdID] += 1;
                
            }
            
        }
        
    } // end Class definition
    
?>