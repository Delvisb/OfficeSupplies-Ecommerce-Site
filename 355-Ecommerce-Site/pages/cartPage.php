<?php 
include('../database/databaseConnect.php'); 
include('../scripts/sessionVerification.php'); 
include('../graphics');
?>
    <html>
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width"> <title>TheSupply Cart</title>
        <style>
        .naviBar{
            padding: 5px;
            width: 100vw; 
            height: 10vh;
            background: rgb(0, 150, 255);
            font-family: sans-serif; 
            border: white solid 2px; 
            display: flex;
            align-items: center; 
            margin-bottom: 10px;
        }
        .naviBar a{
            text-align: center; 
            padding: 5px; 
            float: left;
            margin-left: 5px;
            padding: 20px; border: 2px solid white;
            text-decoration: none;
             color: white; 
             font-family: sans-serif; 
            font-size: 25px; height: 30px;
            width: 100px;
        }
        .naviBar a:hover {
            background: white; color: rgb(0, 150, 255);
        }
        .naviBar a:active{
            background: white;
            color: rgb(0, 150, 255);
        } .searchBarContainer{
            margin-left: 20%; 
            float: right;
            width: 25%;
            height: 75%; 
            background: white; 
            font-family: sans-serif; 
            border-radius: 10px; 
            border-width: 5px; 
            margin-top: 10px;
        } #searchBar{
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
        } #searchBtn{
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
            padding: 5px; background: 
            white; font-family: sans-serif; 
            font-size: 13px; 
            height: 50px;
            width: 80px; 
            margin-top: 20px;
            margin-left: 50px;
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
        .contentContainer{
            height: 800px;
            width: 100vw; }
        .cartContainer{ 
            margin: 0 auto; 
            height: 600px; 
            width: 75%; 
            overflow: scroll;
        }
        .cartContainer table{
            margin: 0 auto; 
            width: 100%; 
            color: black; 
            font-size: 20px;
        }
        .cartContainer td{ 
            text-align: center;
            vertical-align: middle; 
        } 
        .cartContainer img{
            height: 200px; 
            width: 200px; 
            border-radius: 25px;
        }
        .removeBtn{     
            background: rgb(0, 150, 255);
            color: white;
            padding: 14px 25px; 
            text-align: center; 
            text-decoration: none; 
            display: inline-block; 
            border: 2px solid black;
        } 
        .paymentContainer{
            height: 300px;
            margin: 0 auto;
            width: 75vw;
            border: 2px solid black;
        }
        #checkOutBtn{
            background: rgb(0, 150, 255);
            color: white;
            height: 60px;
            width: 120px; 
            border-radius: 20px; 
            margin-left: 50%; 
            margin-right: 50%; 
            font-size: 18px;
        }
        </style>
    </head> 
    <body>
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
    <!--End of NaviSearch bar --> 
    </div>
    
        <div class = "cartContainer">
        <?php 
        if(!empty($_SESSION['cart'])){
            echo "<form method = 'post' action = '../scripts/checkOut.php'>";
            echo "<table>";
            echo "<tr> <th><u>Product</u></th> <th><u>Price</u></th> <th><u>Quantity</u></th> <th><u>Total</u></th>
            <th><u>Remove</u></th> </tr>";
        foreach($_SESSION['cart'] as $keys => $values){
        $total = 0;
        $total = $total + ($values["productQty"] * $values["productPrice"]); 
        echo"
            <tr>
            <td><img src='../graphics/". $values['productImg'] . "'" . $values['productName'] . "/></td> 
            <td>$" . $values['productPrice'] ." </td>
            <td> <input type = 'number' name = 'qty' value = '" . $values['productQty'] ."' /> </td> 
            <td> $total </td>
            <td> <a class = 'removeBtn' href = '../scripts/cartAdd.php?action=remove&id=".$values['productId']."'>Remove</a> </td> 
            </tr>";
        $finalTotal += $total;
        }
        $_SESSION['finalTotal'] = $finalTotal;
        echo "</table>";
        echo "<h3 style = 'text-align: center;'> Total amount: $" . $finalTotal . "</h3>"; echo "<p style = 'width: 100%; border-bottom: 2px solid black;'></p>
                <br>
             <input type = 'submit' id = 'checkOutBtn' value = 'Buy Now' /> </form>";
        }
        else{
            echo "<h1 style = 'text-align: center;'>Your cart is empty</h1>"; 
        }
        //$dbConnect->close(); 
        ?>
    </div>
    </body> 
</html>