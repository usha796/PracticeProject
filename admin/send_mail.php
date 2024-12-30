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
        <h1 class="h2">Send Email</h1>

        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">
            </div>
            <!-- <a class="btn btn-primary" href="add_job.php">Apply Job</a> -->
        </div>
    </div>

   <form action="phpmailer.php" method="post" style="border:2px solid gray; width:50%; margin-left:10%; padding:10px;">
            <?php
            include('connection/db.php');
            $id = $_GET['id'];
$sql = "SELECT job_apply.*, all_jobs.* FROM job_apply LEFT JOIN all_jobs ON 
            job_apply.id_job = all_jobs.job_id WHERE id='$id'";
$query = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_array($query)) {
            ?>
            <h1><?php echo strtoupper($row['first_name']);?> <?php echo strtoupper($row['last_name']);?></h1>

            
            <input type="hidden" id="id" name="id" value="<?php echo $id;?>">
                
                    <div class="form-group"> 
                        <label for=""><b> To:</b></label>
                        <td><input type="email" id="to" name="to" value="<?php echo $row['job_seeker'];?>"></td>
                        </div>
                        <div class="form-group"> 
                        <label for=""> <b>From:</b></label>
                        <td><input type="email" id="from" name="from" class="form-control" placeholder="From?"></td>
                        </div>
                        <div class="form-group"> 
                        <label for=""> <b>Body:</b></label>
                        <td><textarea name="body" id="body"class="form-control" cols="20" rows="20">Dear <?php echo strtoupper($row['first_name']);?><?php echo strtoupper($row['last_name']);?>
            </textarea></td>
                        </div>
                   
                   
                

                   
                   
                    
            <?php } ?>
           <input type="submit" class="btn btn-success btn-block" name="submit" id="submit" value="Send">
           
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
