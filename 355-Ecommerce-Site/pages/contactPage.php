<?php 
include('../scripts/sessionVerification.php');
    
 ?>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>TheSupply Cart</title>
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
				margin-left: 30%;
				float: right;
				width: 25%;
				height: 75%;
				background: white;
				font-family: sans-serif;
				border-radius: 10px;
				border-width: 5px;
				margin-top: 10px;
				border-color: black;
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
			.leftContainer{
				background:  rgb(0, 150, 255);
				height: 80vh;
				width: 45vw;
				border: black solid 2px;
				border-radius: 10px;
				margin-top: 10px;
				float: left;
			}
			.rightContainer{
			    
			}
			
			#submitBtn{
				float: right;
				margin-right: 80px;
				border: 2px solid black;
				color: rgb(0, 150, 255);
				font-family: sans-serif;
				border-radius: 10px;
				width: 20%;
				height: 5vh;
				background: white;
				margin-top: 10px;
			}
			#submitBtn:hover{
				opacity: 0.7;
			}
			input, textarea{
				width: 40%;
				border: solid black 2px;
				border-radius: 5px;
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
			
		<!--End of NaviSearch bar -->
		</div>

		<!-- contact left container  -->
		<div class = "leftContainer">
		    
			<!-- end of contact left container  -->
		</div>
		
		<div class = "rightContainer">
		</div> 
  </body>
</html>