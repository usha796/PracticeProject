

<?php
include("connection/db.php");

if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $username = $_POST['username']; 
    $password = $_POST['password'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $admin_type = $_POST['admin_type'];

    $query = mysqli_query($conn, "INSERT INTO `admin_login` (`admin_email`, `admin_username`, `admin_pass`, `first_name`, `last_name`, `admin_type`) VALUES ('$email', '$username','$password', '$first_name', '$last_name', '$admin_type')");

    if($query){
        echo "<div class='alert alert-success'>Data has been inserted</div>";
    } else {
        echo "<div class='alert alert-danger'>Error: " . mysqli_error($conn) . "</div>";
    }
}

?>