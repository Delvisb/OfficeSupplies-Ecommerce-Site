<?php
session_start();

if(isset($_POST['signout'])){
    session_destroy();
    header('location: adminLoginPage.php');
} 

if(empty($_SESSION['employeeId'])){
    header('location: adminLoginPage.php');
}

?>