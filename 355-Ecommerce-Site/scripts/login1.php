<?php 
include('../database/databaseConnect.php');

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $adminUsername = $_POST['adminUsername'];
    $adminPassword = $_POST['adminPassword'];
	$query = "SELECT employeeId, username, password FROM Employee WHERE username = ?";
    $stmt = mysqli_prepare($dbConnect, $query);
		mysqli_stmt_bind_param($stmt, "s", $param_username);
		$param_username = $adminUsername;
		if(mysqli_stmt_execute($stmt)){
			mysqli_stmt_store_result($stmt);
			if(mysqli_stmt_num_rows($stmt) == 1){  
				mysqli_stmt_bind_result($stmt, $employeeId, $adminUsername, $hashed_password);
					if(mysqli_stmt_fetch($stmt)){
						if(password_verify($adminPassword, $hashed_password)){
						    session_start();
						    $_SESSION['employeeId'] = $employeeId;
					        $_SESSION['username'] = $adminUsername;
					        echo '<META HTTP-EQUIV="refresh" content="0; URL=adminPortal.php">';
						}else{
						    $errorMessage = "Password is incorrect";
						}
			   		}   
				}else{
			    $errorMessage = "Username is incorrect";
		    }
	}
	$dbConnect ->close();
}

?>
