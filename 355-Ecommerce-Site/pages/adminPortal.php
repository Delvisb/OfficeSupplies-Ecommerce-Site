<?php 
include('../database/databaseConnect.php');
include('../scripts/adminSession.php');
session_start();
?>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>TheSupply Admin</title>
    
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
			.ordersDiv{
				margin: 0 auto;
				height: 65vh;
				width: 65vw;
				margin-top: 20px;
				background: rgb(0, 150, 255);
				box-shadow: 10px 10px 5px grey;
			}
			table{
			    margin: 0 auto;
			    text-align: center;
			    font-size: 18px;
			    color: white;
			    width: 100%;
			}
			a{
			   text-decoration: none; 
			   color: white;
			}
			tr{
			   border-top: 2px solid white;
			   border-bottom: 2px solid white;
			   width: 100%;
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
	
	<div class = "ordersDiv">
	    <h1 style = "width: 100%; color: white; text-align: center;">Orders</h1>
	    <table>
	    <?php
		    $orders = "SELECT * FROM Orders";
            foreach ($dbConnect->query($orders) as $row) {
		     echo" <tr>
		            <td> <a href = 'adminOrderView.php?id=". $row['orderId']."'>" .$row['orderId']." </a> </td>
		            </tr>";
		    $count++;
    		}
            $dbConnect->close();
	    ?>
	    </table>
	</div>
	

  </body>
</html>