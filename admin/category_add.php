<?php
include("connection/db.php");

if(isset($_POST['submit'])){
    $category = $_POST['category'];
    $description = $_POST['description']; 
    

    $query = mysqli_query($conn, "INSERT INTO `job_category` (`category`, `description`) VALUES ('$category', '$description')");

    if($query){
        echo "Data has been inserted";
    } else {
        echo  "Error!!";
    }
}
?>

