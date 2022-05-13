<?php // connects to database 
	$dbConnect = mysqli_connect("localhost","burgosd2_admin","[_3j(yS~PG*.","burgosd2_355-Ecommerce-Site");
    if (mysqli_connect_errno()){
	//echo "Failed to connect to MySQL: " . mysqli_connect_error();
	 $result = "Failed to connect to MySQL: " . mysqli_connect_error();
	die();
    }
?>
