<?php
session_start();
error_reporting(0);
include('connection/db.php');

// Prepare the SQL statement with a placeholder for the email
$stmt = mysqli_prepare($conn, "SELECT * FROM profile WHERE user_email = ?");
if ($stmt) {
    // Bind the session email variable to the placeholder
    mysqli_stmt_bind_param($stmt, "s", $_SESSION['email']);

    // Execute the statement
    mysqli_stmt_execute($stmt);

    // Get the result
    $header = mysqli_stmt_get_result($stmt);

    // Fetch the data
    while ($row = mysqli_fetch_array($header)) {
        $img = $row['img'];
        $name = $row['name'];
    }

    // Close the statement
    mysqli_stmt_close($stmt);
} else {
    // Handle the case where the statement preparation fails
    // This could indicate a problem with the database connection or query syntax
    // You may log the error or show an appropriate message to the user
}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <title>JobPortal</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,600,700,800,900" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    
  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
        <a class="navbar-brand" href="index.php">JobPortal</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item <?php if($page=='home'){echo 'active';} ?>"><a href="index.php" class="nav-link">Home</a></li>
                <li class="nav-item <?php if($page=='about'){echo 'active';} ?>"><a href="about.php" class="nav-link">About</a></li>
                <!-- <li class="nav-item <?php if($page=='blog'){echo 'active';} ?>"><a href="blog.php" class="nav-link">Blog</a></li> -->
                <li class="nav-item <?php if($page=='contact'){echo 'active';} ?>"><a href="contact.php" class="nav-link">Contact</a></li>
                <?php if(isset($_SESSION['email'])) {?>
                <li class="nav-item active"><a class="nav-link" href="job_post.php" style="font-weight: bold; color: #5DADE2;"><?php if(empty($name)){ echo $_SESSION['email'];}else{ echo $name;} ?></a></li>

                <li class="nav-item">
                    <div class="dropdown">
                        <img src="profile_img/<?php if(empty($img)){echo "icon.jpg";} else{ echo $img;}?>" class="img-circle dropdown-toggle" type="button" data-toggle="dropdown" alt="" width="50" height="50">
                        <ul class="dropdown-menu">
                            <li> <a href="profile.php">Profile Information</a></li>
                            <li><a href="logout.php">LOGOUT</a></li>
                        </ul>
                    </div>
                </li>
                <?php 
                } else {
                ?>
                <li class="nav-item cta mr-md-2"><a class="nav-link" href="job_post.php">Login</a></li>
                <?php } ?>
            </ul>
        </div>
    </div>
</nav>
                </body>
                </html>