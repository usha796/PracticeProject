



<!doctype html>
<html lang="en" class="h-100">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title></title>

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
    include ('connection/db.php');

    if(isset($_POST['submit'])){

        
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $dob = $_POST['dob'];
        $id_job = $_POST['id_job'];
        $job_seeker = $_POST['job_seeker'];
        $number=$_POST['number'];
        $q="select * from job_apply where job_seeker='$job_seeker'and id_job='$id_job'";
        $sql=mysqli_query($conn,$q);
        if(mysqli_num_rows($sql)>0){
            
           echo"<h1> You already applied this job</h1>";

        }else{

        

        // File upload handling
        if(isset($_FILES['file']['name']) && !empty($_FILES['file']['name'])) {
            $file = $_FILES['file']['name'];
            $tmp_name = $_FILES['file']['tmp_name'];
            
            // Move uploaded file to destination directory
            if(move_uploaded_file($tmp_name, 'files/' . $file)) {
                // File uploaded successfully, proceed with SQL insertion
                $query = "INSERT INTO job_apply (first_name, last_name, dob, file,id_job, job_seeker,mobile_number) VALUES ('$first_name', '$last_name', '$dob', '$file','$id_job', '$job_seeker','$number')";
                $result = mysqli_query($conn, $query);
                
                // Check if the query was successful or not
                if($result) {
    ?>
                    <div class="alert alert-success" role="alert">
                        Successfully Added
                    </div>
    <?php
                } else {
    ?>
                    <div class="alert alert-danger" role="alert">
                        Error: <?php echo mysqli_error($conn); ?>
                    </div>
    <?php
                }
            } else {
    ?>
                <div class="alert alert-danger" role="alert">
                    Error uploading file
                </div>
    <?php
            }
        } else {
    ?>
            <div class="alert alert-danger" role="alert">
                Please choose a file
            </div>
    <?php
        }
    } }
    ?>
    
    <p class="lead">
        <a href="http://localhost/job_portal/" class="btn btn-lg btn-secondary">Back</a>
    </p>
</main>
