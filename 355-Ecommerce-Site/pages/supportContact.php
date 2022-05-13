<?php
if(isset($_POST['sendBtn'])){
    $email = $_POST['email'];
    $message = $email . " said: " . $_POST['message'];
    $to = "burgosd2@montclair.edu";
    $subject = "An Important Email From " .$email;
    $headers = "From: ". $email;
    mail($to,$subject,$message,$headers);

    mail($to, $subject, $message, $headers);
}
?>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>TheSupply Login</title>
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
			}
			input{
				width: 65%;
				height: 5%;
				border: 2px solid black;
				border-radius: 10px;
				margin: 0 auto;
			}
			textarea{
			    height: 200px;
			    width: 65%;
			    border: 2px solid black;
				border-radius: 10px;
			}
			#sendBtn{
				width: 80px;
				height: 50px;
				border-radius: 10px;
				color: rgb(0, 150, 255);
				background: white;
				font-size: 15px;
				float: right;
				margin-top: 40%;
				margin-right: 20px;
				border: 2px solid black;
			}
			.contactHeader{
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
	</head>
  <body>
		<!-- -->
		<!-- content div -->
		<div class = "contentDiv">
			<div class = "contactHeader">
				<h1>Contact TheSupply Support</h1>
			</div>
			<form class = "contactForm" method = "post"  >
					<label style ="margin-top: 40px;">Email: </label><br>
					<input type = "text" type = "email" name = "email" autocomplete = "off" required/>
					<br> 
					<br>
					<label>Message: </label><br>
					<textarea name = "message" placeholder = "Type your inquires here..."> </textarea>
					<input id = "sendBtn" type = "Submit" value ="Send"/>
			</form>
			<a href= "adminLoginPage.php">Admin Login</a> | 
			<a href = "registerPage.php">Register Here </a> 
		</div>		 
  </body>
</html>
