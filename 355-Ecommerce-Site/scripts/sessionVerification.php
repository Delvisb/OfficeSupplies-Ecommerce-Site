<?php
session_start();
//if sign out button is clicked, destory the session and reroute to the login
if(isset($_POST['signout'])){
    session_destroy();
    header('location: loginPage.php');
} 
//if someone were to enter without a valid userId, reroute to the login
if(empty($_SESSION['userId'])){
    header('location: loginPage.php');
}
?>