<?php
include('connection/db.php');
include('include/header.php');
include('include/sidebar.php');
?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="admin_dashboard.php">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="#"> Apply Jobs</a></li>
        </ol>
    </nav>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">All Jobs</h1>

        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">
            </div>
            <!-- <a class="btn btn-primary" href="add_job.php">Apply Job</a> -->
        </div>
    </div>

    <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>S.N</th>
                <th>Job Title</th>
                <!-- <th>Description</th> -->
                <th>Job Seeker Name</th> 
                <th>Job Seeker Email</th>
                <th>File</th>
                <!-- <th>Job Seeker Mobile number</th> -->
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $query = mysqli_query($conn, "SELECT job_apply.*, all_jobs.* FROM job_apply LEFT JOIN all_jobs ON 
            job_apply.id_job = all_jobs.job_id WHERE employee_email='{$_SESSION['email']}'");
             $a=1;
            // $query = mysqli_query($conn, "SELECT * FROM job_apply LEFT JOIN all_jobs ON job_apply.id_job = all_jobs.job_id WHERE employee_email='{$_SESSION['email']}'");
            while ($row = mysqli_fetch_array($query)) {
            ?>
                <tr>
                    <td><?php echo $a;?></td>
                    <td><?php echo $row['job_title']; ?></td>
                    <!-- <td><?php echo $row['description']; ?></td> -->
                    <td>  <?php echo $row['first_name']; ?>
                    <?php echo $row['last_name']; ?></td>
                    <td><?php echo $row['job_seeker']; ?></td>
                    

                    <td><a href="http://localhost/job_portal<?php echo $row['file']?>">Download file </a></td>
                   
                    <td>
                        <div class="row">
                            <div class="btn-group">
                                <a href="viewapplied_job.php?id=<?php echo $row['id']; ?>" class="btn btn-success"><span class="glyphicon glyphicon-eye-open"></span></a>
                               
                            </div>
                        </div>
                    </td>
                </tr>
            <?php $a++; } ?>
        </tbody>
        <tfoot>
            <tr>
                <th>#S.N</th>
                <th>Job Title</th>
                <th>Description</th>
                <!-- <th>Job Seeker Name</th> -->
                <th>Job Seeker Email</th>
                <!-- <th>Job Seeker Mobile number</th> -->
                <th>Action</th>
            </tr>
        </tfoot>
    </table>
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
