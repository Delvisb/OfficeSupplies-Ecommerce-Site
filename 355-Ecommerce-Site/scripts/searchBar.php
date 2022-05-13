<?php
if($_POST['searchBtn']){
    $searchTerm = $_POST['searchBar'];
    $searchTerm = mysqli_real_escape_string($dbConnect, $searchTerm);
    $productQuery = "SELECT * FROM Product WHERE productName LIKE '%". $searchTerm ."%' AND productQty != 0";
    header('Location: productsPage.php');
}
?>