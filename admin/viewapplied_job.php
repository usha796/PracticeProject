d<?php
include('connection/db.php');
include('include/header.php');
include('include/sidebar.php');
?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="admin_dashboard.php">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="#"> Applied Jobs</a></li>
        </ol>
    </nav>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Applied Jobs</h1>

        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">
            </div>
            <!-- <a class="btn btn-primary" href="add_job.php">Apply Job</a> -->
        </div>
    </div>

   <form action=""style="border:2px solid gray; width:80%; margin-left:10%; padding:10px;">
            <?php
            include('connection/db.php');
            $id=$_GET['id'];
            $query = mysqli_query($conn, "SELECT job_apply.*, all_jobs.* FROM job_apply LEFT JOIN all_jobs ON 
            job_apply.id_job = all_jobs.job_id where id='$id'"); // whereemployee_email='{$_SESSION['email']}'

            // $query = mysqli_query($conn, "SELECT * FROM job_apply LEFT JOIN all_jobs ON job_apply.id_job = all_jobs.job_id WHERE employee_email='{$_SESSION['email']}'");
            while ($row = mysqli_fetch_array($query)) {
            ?>
                
                    <div class="form-group"> 
                        <label for=""><b> Job Title:</b></label>
                        <td><?php echo $row['job_title']; ?></td>
                        </div>
                        <div class="form-group"> 
                        <label for=""> <b>Job Description:</b></label>
                        <td><?php echo $row['description']; ?></td>
                        </div>
                        <div class="form-group"> 
                        <label for=""> <b>Job Seeker Name:</b></label>
                        <td>  <?php echo $row['first_name']; ?>  <?php echo $row['last_name']; ?></td>
                        </div>
                        <div class="form-group"> 
                        <label for=""><b> Job Seeker Email:</b></label>
                        <td><?php echo $row['job_seeker']; ?></td>
                        </div>
                        <div class="form-group"> 
                        <label for=""><b> Job Seeker Mobile Number:</b></label>
                        <td><?php echo $row['mobile_number']; ?></td>
                        </div>
                        <div class="form-group"> 
                        <label for=""><b> Job Seeker File:</b></label>
                         <td><a href="http://localhost/job_portal/files/<?php echo $row['file']?>">Download file </a></td>
                        </div>
                   
                   
                

                   
                   
                    
            <?php } ?>
           <a href="send_mail.php?id=<?php echo $id;?>" class="btn btn-success">Accept</a>
           <a href="reject_mail.php?id=<?php echo $id;?>" class="btn btn-danger">Reject</a>
           
            </form>
        
    <canvas class="my-4" id="myChart" width="900" height="380"></canvas>
</main>

<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-H+K5Q5oW2T+eqrj1+n/b6tBf8IlIVqzqvgexjR6J/C4=" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl5+gbg4nMWbQwC6H8ozftK/O56+CgkXtf1rbwA0IV" crossorigin="anonymous"></script>

<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>
