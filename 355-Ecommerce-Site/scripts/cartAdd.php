<?php   
session_start();

if($_GET['action'] == "add"){
      if(isset($_SESSION["cart"]))  {  
           $cartId = array_column($_SESSION["cart"], "productId");  
           if(!in_array($_GET["id"], $cartId)) {  
                $count = count($_SESSION["cart"]);  
                $productArray = array(  
                    'productId' => $_GET["id"],  
                    'productImg' => $_POST["hiddenImg"],
                    'productName' => $_POST["hiddenName"],  
                    'productPrice' => $_POST["hiddenPrice"],  
                    'productQty' => $_POST["qty"]  
                );  
                $_SESSION["cart"][$count] = $productArray;
           }  
           else{  
                $cartMessage = "Item Already Added";
           } 
      }  
      else{  
           $productArray = array(  
                'productId' => $_GET["id"],  
                'productImg' => $_POST["hiddenImg"],
                'productName' => $_POST["hiddenName"],  
                'productPrice' => $_POST["hiddenPrice"],  
                'productQty' => $_POST["qty"]  
           );  
           $_SESSION["cart"][0] = $productArray;
      } 
    header('Location: ../pages/productsPage.php');
}

if($_GET['action'] == "remove"){
        foreach($_SESSION['cart'] as $keys => $values){
            if($values['productId'] == $_GET['id']){
                unset($_SESSION['cart'][$keys]);
            }
        }
    header('Location: ../pages/cartPage.php');
}
?>
