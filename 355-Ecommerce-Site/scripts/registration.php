<?php 
include('../database/databaseConnect.php');

if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(empty(trim($_POST["fName"]))){
        $fNameError = "First Name Required";
    }else{
        $fName = $_POST["fName"];
    }
    
    if(empty(trim($_POST["lName"]))){
        $lNameError = "Last Name Required";
    }else{
        $lName = $_POST["lName"];
    }
    
    if(empty(trim($_POST["email"]))){
        $emailError = "Email Required";
    }else{
        $email = $_POST["email"];
    }
    
    if(empty(trim($_POST["username"]))){
        $usernameError = "Username Required";
    }else{
        $username = $_POST["username"];
    }
    
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
    
    if(empty(trim($_POST["address"]))){
        $addressError = "Address Required";
    }else{
        $address= $_POST["address"];
    }
    
    if(empty(trim($_POST["aptNum"]))){
        $aptNum = null;
    }else{
        $aptNum = $_POST["aptNum"];
    }
    
    if(empty(trim($_POST["city"]))){
        $cityError = "City Required";
    }else{
        $city= $_POST["city"];
    }
    
    if(empty(trim($_POST["state"]))){
        $stateError = "State Required";
    }else{
        $state = $_POST["state"];
    }
    
    if(empty(trim($_POST["country"]))){
        $countryError = "Country Required";
    }else{
        $country = $_POST["country"];
    }
    
    if(empty(trim($_POST["zipCode"]))){
        $zipCodeError = "Zip Code Required";
    }else{
        $zipCode = $_POST["zipCode"];
    }
    
    $query = "SELECT username FROM Customer WHERE username= '$username' LIMIT 1";
    $result = mysqli_query($dbConnect, $query);
    if(mysqli_num_rows($result) > 0){
        $usernameError = "Username already in use";
    }
    //userId Generator
    $userId = uniqid();
    
    if(($userId) and  ($fName) and ($lName) and  ($email) and ($username) and ($password) and ($confirmPassword) and ($address) and ($city) and ($country) and  ($zipCode) and  ($state)){
        $query2 = "INSERT INTO Customer VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        
        $stmt = $dbConnect->prepare($query2);
        $stmt->bind_param('ssssssssssss', $userId, $email, $username, $hashed_password, $fName, $lName, $address, $aptNum, $city, $zipCode, $state, $country);
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $result2 = $stmt->execute();

        // if the query was inserted, reroute the login page 
        if($result2 ){
            header("Location: loginPage.php");
        }else{
            $failed = "An error has occured";
        }
        $dbConnect->close();
    }
}
?>