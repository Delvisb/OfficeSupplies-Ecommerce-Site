<?php 
include('../database/databaseConnect.php');
include('../scripts/adminSession.php');
session_start();

if($_POST['searchBtn']){
    $searchType = $_POST['searchType'];
    $searchValue = $_POST['searchValue'];
}
if(isset($_POST['deleteUser'])){
    $deleteUserId = $_POST['userId'];
    $deleteUser = "DELETE FROM Customer WHERE userId='" .$deleteUserId."'";
    if (mysqli_query($dbConnect, $deleteUser)) {
        $delete = "User was deleted";
    }else{
        $delete = "There was an error";
    }
}
?>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>TheSupply Admin</title>
    
        <style>
			.naviBar{
				width: 100vw; 
				height: 100px;
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
				padding: 5px;
			    border: 2px solid white;
				text-decoration: none;
				color: white;
				font-family: sans-serif;
				font-size: 18px;
				height: 80px;
				width: 120px;
			}
			.naviBar a:hover {
				background: white;
				color: rgb(0, 150, 255);
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
				margin-left: 50%;
			}
			.accountsDiv{
				margin: 0 auto;
				height: auto;
				width: 95vw;
				margin-top: 20px;
				background: rgb(0, 150, 255);
				box-shadow: 10px 10px 5px grey;
			}
			table{
			    margin: 0 auto;
			    text-align: center;
			    width: 100%;
			}
			tr{
			   border-top: 2px solid white;
			   border-bottom: 2px solid white;
			   width: 100%;
			}
			.searchForm {
			    background: white;
			    margin: 0 auto;
			    height: 200px;
			    width: 250px;
			    border: 2px solid rgb(0, 150, 255);
			    padding-left: 20px;
			}
			select{
			    width: 180px;
			    border: 2px solid rgb(0, 150, 255);;
				border-radius: 10px;
			}
			input[type=text]{
				width: 180px;
				border: 2px solid rgb(0, 150, 255);;
				border-radius: 10px;
			}
			#searchBtn{
			    color: rgb(0, 150, 255);
			    border-radius: 15px;
			    border: 2px solid black;
				padding: 5px;
				background: white;
				font-family: sans-serif;
				font-size: 13px;
				height: 50px;
				width: 80px;
			}
		    
    </style>
    </head>
  <body>
	<div class = "naviBar">
    	<a href = "adminPortal.php">View All Orders</a>
    	<a href = "adminAccountsPortal.php">Manage Accounts</a>
    	<a href = "adminRegistrationPortal.php">Register an Account</a>
    	<form method = "post" >
    	    <input class = "signOut" name = "signout" type = "submit" value = "Sign Out" />
    	</form>
	</div>
	
	<form class = "searchForm" method = "post">
        <label>Search a customer: </label><br>
        <select name = "searchType" required>
            <option value = "userId">User Id</option>
            <option value = "email">Email</option>
            <option value = "username">Username</option>
        </select><br><br>
        <input name = "searchValue" type = "text" required><br><br>
        <input id =  "searchBtn" name = "searchBtn" type = "submit">
    </form>
	<h2 style = 'text-align: center; color: red;'><?php echo $delete; ?></h2>
	<div class = "accountsDiv">
	    <?php
	    $accounts = "SELECT * FROM Customer WHERE ".$searchType." like '%".$searchValue."%'"; 
        $result = $dbConnect->query($accounts);
        $num_results = $result->num_rows;
        if($_POST['searchBtn']){
            echo "<h2 style = 'text-align: center;'>Number of Customer found: ".$num_results."</h2>";
            echo "<table>";
            for ($i=0; $i <$num_results; $i++) {
                $row = $result->fetch_assoc();
                echo "<tr>
                        <td>User Id: ". $row['userId'] ." </td><td>Email: ". $row['email'] ." </td><td>Username: ". $row['username'] ." </td><td><form method = 'post'><input type = 'hidden' name = 'userId' value = '". $row['userId'] ."' /> <input type = 'submit' id = 'deleteBtn' name = 'deleteUser' value = 'Delete User'/></form></td>
                    </tr>";
            }
        }
		$accounts -> free();
        $dbConnect->close();
	    ?>
	    </table>
	</div>
	

  </body>
</html>