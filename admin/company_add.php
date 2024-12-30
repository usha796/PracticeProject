<?php
include("connection/db.php");

if(isset($_POST['submit'])){
    $company = $_POST['company'];
    $description = $_POST['description'];
    $admin = $_POST['admin']; 
    

    $query = mysqli_query($conn, "INSERT INTO `company` (`company`, `description`,`admin`) VALUES ('$company', '$description','$admin')");

    if($query){
        echo "Data has been inserted";
    } else {
        echo  "Error!!";
    }
}
?>

