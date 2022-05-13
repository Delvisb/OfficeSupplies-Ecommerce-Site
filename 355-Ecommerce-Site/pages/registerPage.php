<?php
include('../scripts/registration.php');

?>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>TheSupply Registration</title>
		<style>
			.contentDiv{
				background: white;
				height: 95vh;
				width: 50vw;
				border: rgb(0, 150, 255) solid 2px;
				margin: 0 auto;	
				font-size: 18px;
				padding: 5px;
				border-radius: 10px;
				box-shadow: 5px 5px 5px 5px grey;
				overflow: auto;
			}
			label{
				font-family: sans-serif;
				font-size: 18px;
				margin: 0 auto;
			}
			input, select{
				width: 65%;
				height: 5%;
				border: 2px solid black;
				font-family: sans-serif;
				font-size: 16px;
				margin: 0 auto;
			}
			#registerBtn{
				width: 100px;
				height: 50px;
				border-radius: 10px;
				color: rgb(0, 150, 255);
				background: white;
				font-size: 15px;
				float: right;
				margin-top: 2px;
				margin-right: 20px;
				border: 2px solid black;
			}
			.registerHeader{
				background: rgb(0, 150, 255);
				font-family: sans-serif;
				border-bottom: 2px black solid;
				width: 100%;
				height: 10%;
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
		<h2 style = "text-align: center; color: black;"><?php echo $failed; ?></h2>
		<div class = "contentDiv">
			<div class = "registerHeader">
				<h3>Register for TheSupply</h3>
			</div>
			<form class = "registerForm" method = "POST"  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
				<label style ="margin-top: 20px;">First Name: </label><br>
				<input type = "text" name = "fName" autocomplete = "off" required/><br> 
				<p> <?php echo $fNameError ?></p>
				
				<label>Last Name: </label><br>
				<input type = "text" name = "lName" autocomplete = "off" required/><br> 
				<p> <?php echo $lNameError; ?></p>
				
				<label>Email: </label><br>
				<input type = "email" name = "email" autocomplete = "off" required/><br> 
				<p> <?php echo $emailError; ?></p>
				
				<label>Username: </label><br>
				<input type = "text" name = "username" autocomplete = "off" required/><br> 
				<p> <?php echo $usernameError; ?></p>
				
				<label>Password: </label><br>
				<input type = "password" name = "password" autocomplete = "off" required/><br> 
				<p> <?php echo $passwordError; ?></p>
				
				<label>Confirm Password: </label><br>
				<input type = "password" name = "confirmPassword" autocomplete = "off" required/><br> 
				<p> <?php echo $passwordError2; ?></p>
				
				<label>Address: </label><br>
				<input type = "text" name = "address" autocomplete = "off" required/><br> 
				<p> <?php echo $addressError; ?></p>
				
				<label>Apt. Number: </label><br>
				<input type = "text" name = "aptNum" autocomplete = "off"  /><br> 
				<p> <?php  ?></p>
				
				<label>City: </label><br>
				<input type = "text" name = "city"autocomplete = "off"  required/><br> 
				<p> <?php echo $cityError; ?></p>
				
				<label>State: </label><br>
				<select name="state">
                        <option value="--">--</option>
                        <option value="AL">AL</option>
                        <option value="AK">AK</option>
                        <option value="AZ">AZ</option>
                        <option value="AR">AR</option>
                        <option value="CA">CA</option>
                        <option value="CO">CO</option>
                        <option value="CT">CT</option>
                        <option value="DE">DE</option>
                        <option value="FL">FL</option>
                        <option value="GA">GA</option>
                        <option value="HI">HI</option>
                        <option value="ID">ID</option>
                        <option value="IL">IL</option>
                        <option value="IN">IN</option>
                        <option value="IA">IA</option>
                        <option value="KS">KS</option>
                        <option value="KY">KY</option>
                        <option value="LA">LA</option>
                        <option value="ME">ME</option>
                        <option value="MD">MD</option>
                        <option value="MA">MA</option>
                        <option value="MI">MI</option>
                        <option value="MN">MN</option>
                        <option value="MS">MS</option>
                        <option value="MO">MO</option>
                        <option value="MT">MT</option>
                        <option value="NE">NE</option>
                        <option value="NV">NV</option>
                        <option value="NH">NH</option>
                        <option value="NJ">NJ</option>
                        <option value="NM">NM</option>
                        <option value="NY">NY</option>
                        <option value="NC">NC</option>
                        <option value="ND">ND</option>
                        <option value="OH">OH</option>
                        <option value="OK">OK</option>
                        <option value="OR">OR</option>
                        <option value="PA">PA</option>
                        <option value="RI">RI</option>
                        <option value="SC">SC</option>
                        <option value="SD">SD</option>
                        <option value="TN">TN</option>
                        <option value="TX">TX</option>
                        <option value="UT">UT</option>
                        <option value="VT">VT</option>
                        <option value="VA">VA</option>
                        <option value="WA">WA</option>
                        <option value="WV">WV</option>
                        <option value="WI">WI</option>
                        <option value="WY">WY</option>
                    </select>
				<p> <?php echo $stateError; ?></p>
				
				<label>Country: </label><br>
				<input type = "text" name = "country"  autocomplete = "off" required/><br> 
				<p> <?php echo $countryError; ?></p>
				
				<label>Zip Code: </label><br>
				<input type = "text" name = "zipCode" autocomplete = "off" required/><br> 
				<p> <?php echo $zipCodeError; ?></p>
					
				<input id = "registerBtn" type = "Submit" value ="Register"/>
				<br/>
				<br/>
			</form>
		</div>		 
  </body>
</html>