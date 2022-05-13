<?php
include('../database/databaseConnect.php');
include('../scripts/sessionVerification.php');
$orderId = $_GET['orderId'];
$orderViewQuery = "SELECT * FROM Product p, OrderItems ot WHERE p.productId = ot.productId AND orderId = '" . $orderId. "'";
// //SELECT Orders.OrderID, Customers.CustomerName, Orders.OrderDateFROM OrdersINNER JOIN Customers ON Orders.CustomerID=Customers.CustomerID;

$result= mysqli_query($dbConnect, $orderViewQuery);
?>
<html>
    <head>
        <style>
            .orderViewTable{
                margin: 0 auto;
                width: 75vw;
                height: 80vh;
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
        <?php
        if ($result->num_rows > 0){
            echo "<h1 style = 'text-align: center;'>Order: ". $orderId . "</h2>";
            echo "<table class= 'orderViewTable'>";
            echo "<th>Product Image</th> <th>Product Name</th> <th>Product Price</th> <th>Product Quantity</th>";
        	while ($row = mysqli_fetch_assoc($result)){
                echo "<tr>
                        <td> <img src = '../graphics/". $row['productImg']. "'/></td><td>" .$row['productName'] . "</td><td> $" . $row['productPrice']  . "</td><td>" . $row['productBoughtQty'] . "</td>
                        </tr>";
            }
            echo "</table>";
        }
        $result->free(); 
        $dbConnect->close();
        ?>
    </body>
</html>