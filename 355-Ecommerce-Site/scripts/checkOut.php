<?php
include('../database/databaseConnect.php');
include('../scripts/sessionVerification.php'); 
    //Pulls the userId, and fill sets the user's info for shipment
    $userId = $_SESSION['userId'];
    $customerInfoQuery = "SELECT * FROM Customer where userId = '" . $userId . "'";
    $result = $dbConnect ->query($customerInfoQuery);
    if ($result->num_rows > 0){
        while($row = mysqli_fetch_assoc($result)){
            $aptNum = $row['$aptNum'];
            $shipAddress = $row['address'];
            if(!is_null($aptNum)){
                $shipAddress = $shipAddress . ", Apt. " . $aptNum ;
            }
            $shipCity = $row['city'];
            $shipZip = $row['zipCode'];
            $shipState = $row['state'];
            $shipCountry = $row['country'];
        }
    }
    $orderId = rand(1,500);
    $orderDate = date("m/d/y");
   
    //Insert every item in the cart into the database as an ordered item with the orderId
    foreach($_SESSION['cart'] as $keys => $values){
        $dbConnect->query("INSERT INTO OrderItems VALUES('". $orderId . "', '". $values['productId'] . "', '" . $values['productPrice'] . "', '" . $values['productQty'] . "')");
    }
    
    //Inserts the order information and orderId into the orders table
    $ordersInsert = "INSERT INTO Orders VALUES('". $orderId . "', '". $userId . "', '" . $_SESSION['finalTotal'] . "', '" . $orderDate . "', '" . $shipAddress . "', '" . $shipCity . "', '" . $shipState . "', '" . $shipZip . "', '" . $shipCountry . "')";
    if ($dbConnect->query($ordersInsert)) {
      $result1 = TRUE;
    } else {
      $result1 = FALSE;
    }

    //updates the product inventory in the Product table
    foreach($_SESSION['cart'] as $keys => $values){
        $dbConnect->query("UPDATE Product SET productQty = productQty - '" . $values['productQty'] . "' where productId = '" .$values['productId'] . "'");
    }

    
    if($result1){
        $status = "Your order has been placed!";
    }else{
        $status = "There has been an error!";
    }
    unset($_SESSION['cart']);  
    $dbConnect->close();
?>
<html>
    <head>
    </head>
    
    <body>
        <h1 style = "text-align: center;" > <?php echo $status; ?> <br> <a style = "text-align: center;" href = "../pages/homePage.php">Return to TheSupply</a> </h1>
        
    </body>
</html>