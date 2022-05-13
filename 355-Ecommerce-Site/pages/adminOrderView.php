<?php 
include('../database/databaseConnect.php');
include('../scripts/adminSession.php');

$orderId = $_GET['id'];
$orderViewQuery = "SELECT
  Product.productImg,
  Product.productId,
  OrderItems.productBoughtQty,
  Orders.userId,
  Orders.orderDate,
  Orders.shipAddress,
  Orders.shipCity,
  Orders.shipState,
  Orders.shipZip,
  Orders.shipCountry
FROM Product
JOIN OrderItems
  ON Product.productId = OrderItems.productId
JOIN Orders
  ON Orders.orderId  = " . $orderId;
  
$result = mysqli_query($dbConnect, $orderViewQuery);
?>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title> Admin Order View</title>
    
        <style>
			.naviBar{
				width: 100vw; 
				height: 100px;
                padding: 5px;
				background: rgb(0, 150, 255);
				font-family: sans-serif;
				border: white solid 2px;
				display: flex;
				align-items: center;
			}
			.naviBar a{
			    text-align: center;
			    padding: 5px;
			    float: left;
				margin-left: 5px;
				padding: 5px;
			    border: 2px solid white;
				text-decoration: none;
				color: white;
				font-family: sans-serif;
				font-size: 18px;
				height: 80px;
				width: 120px;
			}
			.naviBar a:hover {
				background: white;
				color: rgb(0, 150, 255);
			}
			.signOut{
			    color: rgb(0, 150, 255);
			    border-radius: 15px;
			    border: 2px solid white;
				padding: 5px;
				background: white;
				font-family: sans-serif;
				font-size: 13px;
				height: 50px;
				width: 80px;
				margin-left: 50%;
			}
			.orderViewTable{
                margin: 0 auto;
                width: 75vw;
                height: auto;
                overflow: scroll;
                background:  rgb(0, 150, 255);
				border: 2px solid black;
				border-radius: 10px;
				color: white;
				font-size: 20px;
				box-shadow: 5px 5px 5px 5px grey;
            }
            .orderViewTable img{
                height: 200px;
                width: 200px;
            }
    </style>
    </head>
  <body>
	<div class = "naviBar">
    	<a href = "adminPortal.php">View All Orders</a>
    	<a href = "adminAccountsPortal.php">Manage Accounts</a>
    	<a href = "adminRegistrationPortal.php">Register an Account</a>
    	<form method = "post" >
    	    <input class = "signOut" name = "signout" type = "submit" value = "Sign Out" />
    	</form>
	</div>
	

	    <?php
		    echo "<h1 style = 'text-align: center;'>Order: ". $orderId . "</h1>";
            echo "<table class= 'orderViewTable'>";
            echo " <th>Product Image</th> <th>Product ID</th> <th>Product Purchase Quantity</th>";
        	while ($row = mysqli_fetch_assoc($result)){
                echo "<tr>
                        <td> <img src = '../graphics/". $row['productImg']. "'/></td><td>" .$row['productId'] . "</td><td>" .$row['productBoughtQty'] . "</td>
                        </tr>";
            }
            echo "</table>";
            echo "<h1 style = 'text-align: center;'>Shipping Information</h2>";
            echo "<table class= 'orderViewTable'>";
            echo " <th>User Id</th> <th>Order Date</th> <th>Shipping Address</th> <th>Shipping City</th> <th>Shipping State</th> <th>Shipping Zip Code</th> <th>Shipping Country</th>";
            $counter = 1;
            foreach ($dbConnect->query($orderViewQuery) as $value){
              echo "<tr>
                        <td> ". $value['userId']. "</td><td>" .$value['orderDate'] . "</td><td>" .$value['shipAddress'] . "</td><td> " . $value['shipCity']  . "</td><td>" . $value['shipState'] .  "</td><td>" . $value['shipZip'] .  "</td><td>" . $value['shipCountry']. "</td>
                        </tr>";  
                if($counter ==1)
                break;
            }
             echo "</table>";
	    ?>

	

  </body>
</html>