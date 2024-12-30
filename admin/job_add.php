<?php
session_start();

include("connection/db.php");

if(isset($_POST['submit'])){
   // $employee_email = $_POST['employee_email'];
    $login =$_SESSION['email'];
    $job_title = $_POST['job_title'];
    $description = $_POST['description'];
    $keyword=$_POST['keyword'];
    $country = $_POST['country']; 
    $city = $_POST['city']; 
    $category=$_POST['category'];
    

    $query = mysqli_query($conn, "INSERT INTO `all_jobs` (`employee_email`,`job_title`, `description`,`keyword`, `country`, `city`,`category`) VALUES ('$login','$job_title', '$description','$keyword', '$country', '$city', '$category')");

    if($query){
        echo "Data has been inserted";
    } else {
        echo  "Error!!";
    }
}
?>

