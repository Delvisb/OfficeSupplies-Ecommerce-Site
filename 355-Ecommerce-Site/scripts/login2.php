<?php 
include('../database/databaseConnect.php');
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $userName = $_POST['userName'];
    $userPassword = $_POST['userPassword'];
	$query = "SELECT userId, email, username, password FROM Customer WHERE username = ?";
    if($stmt = mysqli_prepare($dbConnect, $query)){
		mysqli_stmt_bind_param($stmt, "s", $param_username);
		$param_username = $userName;
		if(mysqli_stmt_execute($stmt)){
			mysqli_stmt_store_result($stmt);
			if(mysqli_stmt_num_rows($stmt) == 1){  
				mysqli_stmt_bind_result($stmt, $userId, $email, $userName, $hashed_password);
					if(mysqli_stmt_fetch($stmt)){
						if(password_verify($userPassword, $hashed_password)){
							 session_start();
							 $_SESSION['userName'] = $userName;
							 $_SESSION['userId'] = $userId;
							 echo '<META HTTP-EQUIV="refresh" content="0; URL=homePage.php">';
						}else{
						    $errorMessage = "Password is incorrect";
						}
			   		}   
			}else{
			    $errorMessage = "Username is incorrect";
		    }
	    }   
    }
    $dbConnect ->close();
}
?>
