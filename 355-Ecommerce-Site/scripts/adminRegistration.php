<?php
include('../database/databaseConnect.php');

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $fName = $_POST["fName"];
    $lName = $_POST["lName"];
    $email = $_POST["email"];
    $username = $_POST["username"]; 
    
    if(empty(trim($_POST["password"]))){
        $passwordError = "Password Required";
    }elseif(strlen(trim($_POST["password"])) < 6){
        $passwordError = "Password must have atleast 6 characters.";
    }else{
        $password1 = $_POST["password"];
    }
    
    if(empty(trim($_POST["confirmPassword"]))){
        $passwordError2 = "Confirmed Password Required";
    }else{
        $confirmPassword1 = $_POST["confirmPassword"];
    }
    
    if($password1 != $confirmPassword1){
        $passwordError2 = "Passwords Don't Match";
    }else{
        $password = $password1;
        $confirmPassword = $confirmPassword1;
    }
        $address= $_POST["address"];
        $phoneNum = $_POST["phoneNum"];
        $city= $_POST["city"];
        $state = $_POST["state"];
        $country = $_POST["country"];
        $zipCode = $_POST["zipCode"];
    
    
    //userId Generator
    $employeeId = uniqid();
    
    if(($employeeId) and  ($fName) and ($lName) and  ($email) and ($username) and ($password) and ($confirmPassword) and ($address) and ($city) and ($country) and  ($zipCode) and  ($state)){
        $query2 = "INSERT INTO Employee VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        
        $stmt = $dbConnect->prepare($query2);
        $stmt->bind_param('ssssssssssss', $employeeId, $username, $hashed_password, $email, $fName, $lName, $phoneNum, $address, $city, $state, $zipCode, $country);
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $result2 = $stmt->execute();

        if($result2 ){
            $message = "<h2 style = 'text-align: center; color: green;'>NEW EMPOLYEE ADDED</h2>";
        }else{
            $message = "<h2 style = 'text-align: center; color: RED;'>AN ERROR HAS OCCURED</h2>";
        }
        mysqli_close($dbConnect);
        echo "INSERT INTO Customer  VALUES($employeeId, $username, $hashed_password, $email, $fName, $lName, $phoneNum, $address, $city, $state, $zipCode, $country)";

    }
}
?>