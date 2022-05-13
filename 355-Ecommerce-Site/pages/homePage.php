<?php 
include('../database/databaseConnect.php');
include('../scripts/sessionVerification.php');
session_start();
?>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>TheSupply</title>
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
			.contentDiv{
				margin: 0 auto;
				height: 65vh;
				width: 95vw;
				margin-top: 20px;
				background: rgb(0, 150, 255);
				box-shadow: 10px 10px 5px grey;
			}
			table{
			    margin: 0 auto;
			    text-align: center;
			    font-size: 18px;
			    color: white;
			}
			img{
			    height: 450px;
			    width: 400px;
			}
			
	
		
		</style>
			<!--  rgb(0, 150, 255) as primary color-->
	</head>
  <body>
		<!-- -->
		<h2 style = "border-bottom: 2px solid black; width: 100%; text-align: center;"><?php echo "Welcome " . $_SESSION['userName'] . "!" ;?></h2>
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

		<div class = "contentDiv">
		    <h1 style = "border-bottom: 2px solid white; width: 100%; text-align: center; color: white">Top Sellers</h1> 
		    <table>
		        <tr>
    		    <?php
    		    $homePageQuery = "SELECT * FROM Product ORDER BY productQty ASC LIMIT 4";
                foreach ($dbConnect->query($homePageQuery) as $row) {
    		    //query chooses top four products with the lower quantities classified as "top sellers"
    		       print "<td> <img src='../graphics/". $row['productImg'] . "'/> <br>" .$row['productName'] . "<br>$" .$row['productPrice'] ."</td>";
        		}
                $dbConnect->close();
    		    ?>
		        </tr>
		    </table>
		</div>
		
		 
  </body>
</html>