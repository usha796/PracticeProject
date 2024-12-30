<?php session_start(); ?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="/docs/4.0/assets/img/favicons/favicon.ico">

    <title>Signin </title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/sign-in/">

    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="sign.css" rel="stylesheet">
  </head>
  <!-- <div class="form-container"> -->
  <body class="text-center">
  <div class="form-container">
  <form class="form-signin" action="job_post.php" method="post" style="max-width: 330px; padding: 50px; margin: auto;">
    <img class="mb-6" src="images/signin.jpg" alt="" width="100" height="100">
    <h1 class="h3 mb-3 font-weight-normal" style="color: #333; font-size: 24px; text-align: center;">Please sign in</h1>
    <label for="inputEmail" class="sr-only">Email address</label>
    <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required autofocus style="margin-bottom: 10px;">
    <label for="Password" class="sr-only">Password</label>
    <input type="password" id="password" name="password" class="form-control" placeholder="Password" required style="margin-bottom: 10px;">
    <!-- <div class="checkbox mb-3">
        <label>
            <input type="checkbox" value="remember-me"> Remember me
        </label>
    </div> -->
    <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit" style="background-color: #007bff; border-color: #007bff; color: #fff;">Sign in</button>
    <p style="margin-top: 10px; text-align: center;">Don't have an account?<br> <a href="signup.php" style="color: #007bff; text-decoration: none;">Create one now</a></p>
</form>
</div>
  </body>
</html>
<?php
include('connection/db.php');

if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = mysqli_query($conn, "SELECT * FROM jobseeker WHERE email='$email' AND password='$password'");
if ($query){


    if (mysqli_num_rows($query) > 0) {
        $_SESSION['email']=$email;

        header('Location: index.php');
    }else{
        
        echo "<script> alert('Email or password is incorrect, please try again')</script>";
    }
}
}

?>
