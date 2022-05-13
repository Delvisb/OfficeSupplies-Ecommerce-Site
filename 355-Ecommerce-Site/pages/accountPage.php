<?php
include('../database/databaseConnect.php');
include('../scripts/sessionVerification.php');
//include('../scripts/accountContent.php');

?>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>TheSupply Account</title>
		<style>
			.naviBar{
				width: 100vw; 
				height: 10vh;
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
				padding: 20px;
			    border: 2px solid white;
				text-decoration: none;
				color: white;
				font-family: sans-serif;
				font-size: 25px;
				height: 30px;
				width: 100px;
			}
			.naviBar a:hover {
				background: white;
				color: rgb(0, 150, 255);
			}
			.naviBar a:active{
			    background: white;
				color: rgb(0, 150, 255);
			}
			.searchBarContainer{
				margin-left: 20%;
				float: right;
				width: 25%;
				height: 75%;
				background: white;
				font-family: sans-serif;
				border-radius: 10px;
				border-width: 5px;
				margin-top: 10px;
			}
			#searchBar{
				margin-left: 10px;
				width: 75%;
				height: 80%;
				font-size: 15px;
				color: black;
				float: left;
				border: none;
				margin-top: 5px;
				border-color: black;
				border-radius: 10px;
			}
			#searchBtn{
				width: 20%;
				height: 80%;
				border-radius: 10px;
				color: rgb(0, 150, 255);
				background: white;
				font-size: 15px;
				float: right;
				margin-top: 5px;
				margin-right: 4px;
				border-color: black;
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
				margin-top: 20px;
				margin-left: 50px;
			}
			.contentContainer{
				margin: 0 auto;
				height: 80vh;
				width: 100vw;
				padding: 10px 50px;
			}
			.leftContainer{
				background:  rgb(0, 150, 255);
				height: 80vh;
				width: 40vw;
				border: 2px solid black;
				border-radius: 10px;
				margin-top: 10px;
				float: left;
				color: white;
				box-shadow: 5px 5px 5px 5px grey;
			}
			.leftContainer table{
			    color: white;
			    font-size: 18px;
			    font-family: sans-serif;
			}
			.rightContainer{
			    background:  rgb(0, 150, 255);
			    float: left;
				height: 80vh;
				width: 40vw;
				border: 2px solid black;
				border-radius: 10px;
				margin-top: 10px;
				margin-left: 100px;
				color: white;
				box-shadow: 5px 5px 5px 5px grey;
				overflow: scroll;
				text-align: center;
			}
			.rightContainer a{
			   color: white;
			   font-size: 18px;
			   font-family: sans-serif;
			}
			table{
			    margin: 0 auto;
			    width: 95%;
			    height: 80%;
			    font-size: 18px;
			}
			
		</style>
			<!--  rgb(0, 150, 255) as primary color-->
	</head>
  <body>
		<!-- -->
		
		<!--Navigation Bar-->
		<div class = "naviBar">
			<!--Route Options for navigation bar-->
			<a href = "homePage.php"> Home </a>
			<a href = "productsPage.php"> Products </a>
			<a href = "accountPage.php"> Account</a>
			<a href = "cartPage.php">Cart</a>
			
			<!--NaviSearch bar -->
			<div class = "searchBarContainer">
				<form method = "post" action="productsPage.php">
    				<input id = "searchBar" type = "text" name = "searchBar" placeholder = "Search for products" autocomplete = "off" required> </input>
    				<input id = "searchBtn" name = "searchBtn" type = "submit" value = "Search"/>
				</form>
			</div>
			
			<form method = "post" >
			    <input class = "signOut" name = "signout" type = "submit" value = "Sign Out" />
			</form>
		
		<!--End of Navigation Bar-->
		</div>

        <div class = "contentContainer">
		    <div class = "leftContainer">
    		<h1 style = "width: 100%; border-bottom: 2px white solid; text-align: center">Account</h1>
    		<?php
    		$query = "SELECT * FROM Customer WHERE userid = '" .$_SESSION['userId']. "'";
            $result = mysqli_query($dbConnect, $query);
            if ($result->num_rows > 0){
        	while ($row = mysqli_fetch_assoc($result)){
            echo  "<table>
                <tr>
                <td>
                Email: 
                </td>
                <td>
                ". $row['email']."
                </td>
                </tr>
                <tr>
                <td>
                Username: 
                </td>
                <td>
                ". $row['username']."
                </td>
            	</tr>
            	<td>
                Name: 
                </td>
                <td>
                ". $row['fName']. " ". $row['lName']."
                </td>
            	</tr>
            	<tr>
                <td>
                Address: 
                </td>
                <td>
                ". $row['address']. $row['aptNum'].  "
                 </td>
                </tr>
            	<tr>
                <td>
                City: 
               </td>
                <td>
                ". $row['city']."
                </td>
            	 </tr>
			    <tr>
    			    <td>
    			        Zip Code: 
    			     </td>
    			     <td>
    			        ". $row['zipCode']."
    			     </td>
			    </tr>
			    <tr>
    			    <td>
    			        State: 
    			     </td>
    			     <td>
    			        ". $row['state']."
    			     </td>
			    </tr>
			    <tr>
    			    <td>
    			        Country: 
    			     </td>
    			     <td>
    			        ". $row['country']."
    			     </td>
			    </tr>
                </table";                			   
                }
            }
            $result->free(); 
    		?>
    		<!-- end of contact left container  -->
    		</div>
    		
    		<div class = "rightContainer">
                <h1 style = "width: 100%; border-bottom: 2px white solid; text-align: center">Orders</h1>		    
                <?php
                $query2 = "SELECT * FROM Orders where userId = '" . $_SESSION['userId'] . "'";
                $result2 = mysqli_query($dbConnect, $query2);
                if ($result2->num_rows > 0){
                	while ($row = mysqli_fetch_assoc($result2)){
                        echo "<a href = 'orderView.php?orderId=" . $row['orderId'] ."'> Order: " . $row['orderId'] ."</a> <br>";
                	}
                }else{
                    echo "<h4 style = 'text-align: center'> No orders placed yet </h4>";
                }
                $result2->free(); 
                $dbConnect->close();    
                ?>
    		</div>
    	</div>

  </body>
</html>