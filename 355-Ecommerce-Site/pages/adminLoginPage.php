<?php
include('../scripts/login1.php');
?>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>TheSupply AdminLogin</title>
		<style>
	
			.contentDiv{
				background: white;
				height: 80vh;
				width: 45vw;
				border: rgb(0, 150, 255) solid 2px;
				margin: 0 auto;	
				font-size: 18px;
				padding: 5px;
				border-radius: 10px;
				box-shadow: 5px 5px 5px 5px grey;
			}
			label{
				font-family: sans-serif;
				font-size: 18px;
				margin: 0 auto;
			}
			input{
				width: 65%;
				height: 5%;
				border: 2px solid black;
				border-radius: 10px;
				margin: 0 auto;
			}
			#loginBtn{
				width: 80px;
				height: 50px;
				border-radius: 10px;
				color: rgb(0, 150, 255);
				background: white;
				font-size: 15px;
				float: right;
				margin-top: 10px;
				margin-right: 20px;
				border: 2px solid black;
			}
			.loginHeader{
				background: rgb(0, 150, 255);
				font-family: sans-serif;
				border-bottom: 2px black solid;
				width: 100%;
				height: 20%;
				color: white;
				display: flex;
				justify-content: center;
				align-items: center;
			}
			a{
				color: rgb(0, 150, 255);
				font-size: 18px;
			}
			
	
		
		</style>
			<!--  rgb(0, 150, 255) as primary color-->
	</head>
  <body>
		<!-- -->
		<!-- content div -->
		<div class = "contentDiv">
			<div class = "loginHeader">
				<h1>TheSupply Admin</h1>
			</div>
			<form class = "loginForm" method = "post"  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
				<p> <?php echo $errorMessage ?></p>
				<label style ="margin-top: 20px;">Username: </label><br>
				<input type = "text" name = "adminUsername" required/>
				<br> 
				<br>
				<label>Password: </label><br>
				<input type = "password" name = "adminPassword" required/>
				<br>
				<input id = "loginBtn" type = "Submit" value ="Sign in"/>
			</form>
			<a href= "loginPage.php">Customer Login</a> 
		</div>		 
  </body>
</html>