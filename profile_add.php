






<!doctype html>
<html lang="en" class="h-100">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Cover Template · Bootstrap v5.1</title>

    <!-- Latest compiled and minified CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Favicons -->
<link rel="apple-touch-icon" href="/docs/5.1/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="/docs/5.1/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="/docs/5.1/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="/docs/5.1/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="/docs/5.1/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
<link rel="icon" href="/docs/5.1/assets/img/favicons/favicon.ico">
<meta name="theme-color" content="#7952b3">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="cover.css" rel="stylesheet">
  </head>
  <body class="d-flex h-100 text-center text-white bg-dark">
    
<div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
  <!-- <header class="mb-auto">
    <div>
      <h3 class="float-md-start mb-0">Cover</h3>
      <nav class="nav nav-masthead justify-content-center float-md-end">
        <a class="nav-link active" aria-current="page" href="#">Home</a>
        <a class="nav-link" href="#">Features</a>
        <a class="nav-link" href="#">Contact</a>
      </nav>
    </div>
  </header> -->


  <main class="px-3">
    <!-- <h1>Cover your page.</h1> -->
    
    <?php
session_start();
include('connection/db.php');

if(isset($_POST['submit'])){
    // Check if a file was uploaded
    if(isset($_FILES['img']) && $_FILES['img']['error'] === UPLOAD_ERR_OK) {
        $img = $_FILES['img']['name'];
        $tmp_name = $_FILES['img']['tmp_name'];
        // Move the uploaded file to the profile_img directory
        move_uploaded_file($tmp_name, 'profile_img/' . $img);
    } else {
        echo "Error uploading file. Error code: " . $_FILES['img']['error'];
        exit;
    }
    
    // Get the user's email from the session
    $user_email = $_SESSION['email'];
    
    // Get other form data
    $name = $_POST['name'];
    $dob = $_POST['dob'];
    $number = $_POST['number'];
    $email = $_POST['email'];
    
    // Check if the profile already exists for the user
    $sql = mysqli_query($conn, "SELECT * FROM profile WHERE user_email='{$_SESSION['email']}'");
    $sql_check = mysqli_num_rows($sql);
    
    if($sql_check > 0){
        // If the profile already exists, update it
        $query = mysqli_query($conn," UPDATE `profile` SET `img`='[$img]',`name`='[$name]',`dob`='[$dob]',`number`='[$number]',`email`='[$email]', WHERE `user_email`='[$user_email]' ");
        
        if($query){
            echo "Profile updated Successfully";
        } else {
            echo "Failed to update profile";
        }
    } else {
        // If the profile doesn't exist, insert a new record
        // $query = mysqli_query($conn, "INSERT INTO `profile`(`img`, `name`, `dob`, `number`, `email`, `user_email`) VALUES ('[$img]','[$name]','[$dob]','[$number]','[$email]','[$user_email]'");
        $query = mysqli_query($conn, "INSERT INTO `profile`(`img`, `name`, `dob`, `number`, `email`, `user_email`) VALUES ('$img','$name','$dob','$number','$email','$user_email')");

        if($query){
            echo "Profile added Successfully";
        } else {
            echo "Failed to add profile";
        }
    }
}
?>


<p class="lead">
        <a href="http://localhost/job_portal/profile.php" class="btn btn-lg btn-secondary">Back</a>
    </p>
</main>
</body>
</html>