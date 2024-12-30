<?php
include('connection/db.php');
include('include/header.php');
include('include/sidebar.php');

$id = $_GET['edit'];
$query = mysqli_query($conn, "SELECT * FROM company WHERE company_id='$id'");
while ($row = mysqli_fetch_array($query)) {
    $company = $row['company'];
    $description = $row['description'];
    $admin = $row['admin'];

}

?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="admin_dashboard.php">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="create_company.php">Company</a></li>
            <li class="breadcrumb-item"><a href="#">Update Company</a></li>
        </ol>
    </nav>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Update Company</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2"></div>
        </div>
    </div>

    <div style="width:30%; height:20; margin-left:20%; background-color:#D5D8DC ;">
        <form action="" method="POST" style="margin:3%; padding:2%;" name="company_form" id="company_form">
            <div id="msg"></div>
            <div class="form-group">
                <label for="Company Name">Company Name</label>
                <input type="text" name="company" id="company" class="form-control" placeholder="Company name" value="<?php echo $company; ?>">
            </div>
            <div class="form-group">
                <label for="Description">Description</label>
                <textarea name="description" id="description" class="form-control" cols="30" rows="10"><?php echo $description; ?></textarea>
            </div>

            <div class="form-group">
                <label for="Select admin">Select Company Admin</label>
                <select name="admin" id="admin" class="form-control">
                    <?php
                    include('connection/db.php');
                    $sql=mysqli_query($conn, " select * from admin_login where admin_type='2'");
                    while($row=mysqli_fetch_array($sql)){
                        ?>
                        <option value="<?php echo $row['admin_email']; ?>"><?php echo $row['admin_email']; ?></option>
                  <?php  }
                    ?>
                </select>
               </div>

            <input type="hidden" name="id" id="id" value="<?php echo $_GET['edit']; ?>">
            <div class="form-group">
                <input type="submit" class="btn btn-block btn-success" value="Update" name="submit" id="submit">
            </div>
        </form>
    </div>
    <canvas class="my-4" id="myChart" width="900" height="380"></canvas>
</main>
</div>
</div>
<!-- Bootstrap core JavaScript ================================================== -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
<script src="../../assets/js/vendor/popper.min.js"></script>
<script src="../../dist/js/bootstrap.min.js"></script>
<!-- Icons -->
<script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
<script>feather.replace()</script>
<!-- datatable plugins -->
<script src="https://cdn.datatables.net/2.0.6/js/dataTables.js"></script>
<script>new DataTable('#example');</script>

<script>
    $(document).ready(function() {
        $("#submit").click(function() {
            var company = $("#company").val();
            var description = $("#description").val();

            if (company == '') {
                alert("Company name required");
                return false;
            }
            if (description == '') {
                alert("Description required");
                return false;
            }
        });
    });
</script>
</body>
</html>

<?php

include('connection/db.php');

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $company = $_POST['company'];
    $description = $_POST['description'];
    $admin = $_POST['admin'];

    $query = mysqli_query($conn, "UPDATE company SET company='$company', description='$description',admin='$admin' WHERE company_id='$id'");

    if ($query) {
        echo "<script>alert('Record has been updated!')</script>";
        echo "<script>window.location='create_company.php';</script>";
    
    } else {
        echo "<script>alert('Error updating record: " . mysqli_error($conn) . "')</script>";
    }
    
}
?>
