<?php
require_once("../include/initialize.php"); 
   $cart_value = 0;
    if (isset($_SESSION['admin_gcCart'])) { 
        if (!empty($_SESSION['admin_gcCart'])){    
            $count_cart = count($_SESSION['admin_gcCart']); 
            for ($i=0; $i < $count_cart  ; $i++) {  
                   $cart_value  +=  $_SESSION['admin_gcCart'][$i]['qty'];
            }  
        }
    }  
     echo $cart_value;
?>
