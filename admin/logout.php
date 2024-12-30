<?php
session_start();
session_unset();
header('Location: admin_dashboard.php');
include('connection/db.php');
$query=mysqli_query($conn,"select * from admin_login where admin_email='{$_SESSION['email']}'  and admin_type='2'");
// and admin_type='2'
if($query){
    header('Location:http://localhost/job_portal/');
}else{
    header('Location: admin_dashboard.php');
}


?>


