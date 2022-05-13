<?php 
include('../database/databaseConnect.php');
include('../scripts/sessionVerification.php');
session_start();

if($_POST['searchBar']){
    $searchTerm = $_POST['searchBar'];
    $searchTerm = mysqli_real_escape_string($dbConnect, $searchTerm);
    $productQuery = "SELECT * FROM Product WHERE productName LIKE '%". $searchTerm ."%' AND productQty != 0";
}else{
    $productQuery = "SELECT * FROM Product WHERE productQty != '0'";
}


if($_POST['filterBtn']){
    if(isset($_POST['writing'])){
        $productQuery = "SELECT * FROM Product WHERE productCategory = 'Writing' AND productQty != 0";
    }
    if(isset($_POST['paper'])){
        $productQuery = "SELECT * FROM Product WHERE productCategory = 'Paper' AND productQty != 0";
    }
    if(isset($_POST['accessories'])){
        $productQuery = "SELECT * FROM Product WHERE productCategory = 'Accessories' AND productQty != 0";
    }
    if(isset($_POST['electronics'])){
        $productQuery = "SELECT * FROM Product WHERE productCategory = 'Electronics' AND productQty != 0";
    }
    if(isset($_POST['furniture'])){
        $productQuery = "SELECT * FROM Product WHERE productCategory = 'Furniture' AND productQty != 0";
    }
}
?>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale = 1">
    <title>TheSupply Products</title>
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
			.productsPageContainer{
				background: rgb(0, 150, 255);
				border-radius: 10px;
				height: 85vh;
				width: 99vw;
				margin-top: 20px;
			}
			.productsFilterBar{
				float: left;
				margin: 10px;
				border: black solid 2px;
				height: 95%;
				width: 10%;
				background: white;
			}
			.productsContainer{
				float: right;
				border: black solid 2px;
				height: 95%;
				width: 85%;
				background: white;
				overflow: scroll;
				margin: 10px;
                padding: 0;
			}
			#filterBtn{
			    width: 120px;
				height: 40px;
				color: white;
				background: rgb(0, 150, 255);
				font-size: 16px;
				margin: 5;
			}
			table{
			    font-family: sans-serif;
			}
			table td{
			    height: 580px;
			    width: 33%;
			    border: 2px solid black;
			    text-align: center;
			    font-size: 18px;
			}
			table tr{
			    display: inline-block; 
			    width: 33%;
			    height: 580px;
			}
			table img{
			    height: 380px;
			    width: 100%;
			}
			input[type = checkbox], label{
			    font-size: 20px;
			}
			#qtyInput{
			    margin: 0 auto;
			    width: 40px;
			    height: 40px;
				color: black;
				font-size: 13px; 
			}
			#addBtn{
			    display: block;
                margin-right: auto;
                margin-left: auto;
			    margin-top: 2px;
			    width: 100px;
				height: 40px;
				color: white;
				background: rgb(0, 150, 255);
				font-size: 13px;
			}
			#addQty{
			   height: 40px;
			   width: 80px;
			   border: 2px solid black; 
			   margin-top: 4px;
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
		<!--Ending of Navigation Bar-->
		</div>
        <p style = "text-align: center;"> <?php echo $cartMessage; ?></p>
		<!-- Container for products page -->
		<div class = "productsPageContainer">
			<!-- Container products filter bar -->
			<div class = "productsFilterBar">
			   <p style = "width: 100%; border-bottom: 2px solid black; text-align: center; font-size: 25px;"><b>Filter Bar</b></p><br>
			   <form style = "width: 100%; justify-content: center;" method = "post"> <br>
    			   <input type = "checkbox" name = "writing" /> <label>Writing</label><br>
    			   <input type = "checkbox" name = "paper" /> <label>Paper</label><br>
    			   <input type = "checkbox" name = "accessories" /> <label>Accessories</label><br>
    			   <input type = "checkbox" name = "electronics" /> <label>Electronics</label><br>
    			   <input type = "checkbox" name = "furniture" /> <label>Furniture</label><br>
    			   <input type = "submit" name = "filterBtn" id = "filterBtn" value = "Filter"/>
			   </form>
			</div>
			<!-- Container for products -->
			<div class = "productsContainer">
    		   <!-- <table id = "productsTable">	-->	
    			<?php 
                $result = $dbConnect ->query($productQuery);
                if($result->num_rows > 0){
    		        while ($row = mysqli_fetch_assoc($result)){
    			echo "<table>
    			    <tr>
        			    <td>
        			        <form method = 'post' action = '../scripts/cartAdd.php?action=add&id=". $row['productId']."'>
        			        <img src='../graphics/". $row['productImg'] . "'/> <br>
        			        <b>Product Name:</b> ". $row['productName']." <br>
        			        <b>Description:</b> ". $row['productDescription']."<br>
    			            <b>Price:</b> $". $row['productPrice']." <br>.
    			            <input id = 'addQty' type = 'number' name = 'qty' min ='1' max = '". $row['productQty'] ."' required/>
    			            <input type = 'hidden' name = 'hiddenName' value = ". $row['productName']." />
    			            <input type = 'hidden' name = 'hiddenImg' value = ". $row['productImg']." />
    			            <input type = 'hidden' name = 'hiddenPrice' value = ". $row['productPrice']." />
    			            <input id = 'addBtn' type = 'submit' value = 'Add To Cart'/> 
    			            </form>
    			        </td>
    			    </tr>
                    </table";
                    }
                }
                else{
                    echo "<h3 style = 'width: 100%; text-align: center;'> No results found </h3>";
                }
                $result->free(); 
                $dbConnect->close();
    			?>
			</div>
		<!-- End of Container for products page -->
		</div>
		 
  </body>
</html>