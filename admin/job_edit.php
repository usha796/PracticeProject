<?php
include('connection/db.php');
include('include/header.php');
include('include/sidebar.php');

$id = $_GET['edit'];
$query = mysqli_query($conn, "SELECT * FROM all_jobs WHERE job_id='$id'");
while ($row = mysqli_fetch_array($query)) {
    $job_title = $row['job_title'];
    $description = $row['description'];
    $keyword = $row['keyword'];
    $country = $row['country'];
    $city = $row['city'];
    $category = $row['category'];
}

?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="admin_dashboard.php">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="job_create.php">Job</a></li>
            <li class="breadcrumb-item"><a href="#">Update Job</a></li>
        </ol>
    </nav>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Update Job</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2"></div>
        </div>
    </div>

    <div style="width:30%; height:20; margin-left:20%; background-color:#D5D8DC ;">
        <form action="" method="POST" style="margin:3%; padding:2%;" name="company_form" id="company_form">
            <div id="msg"></div>
            <div class="form-group">
                <label for="Job Title">Job Title</label>
                <input type="text" name="job_title" id="job_title" class="form-control" placeholder="job title" value="<?php echo $job_title; ?>">
            </div>
            <div class="form-group">
                <label for="Description">Description</label>
                <textarea name="description" id="description" class="form-control" cols="30" rows="10"><?php echo $description; ?></textarea>
            </div>
            <div class="form-group">
                <label for="keyword">Keyword</label>
                <input type="text" name="keyword" id="keyword" class="form-control" placeholder="keyword" value="<?php echo $keyword; ?>">
            </div>
            <div class="form-group">
                <label for="country">Country</label>
                <!-- <label for="country">Country</label> -->
                <input type="text" name="country" id="country" class="form-control" placeholder="country" value="<?php echo $country; ?>">
            </div>
            <div class="form-group">
                <label for="city">City</label>
                <input type="text" name="city" id="city" class="form-control" placeholder="city" value="<?php echo $city; ?>">
            </div>
            <div class="form-group">
           <label for="Category">Select category</label>
           <select name="category" class="form-control" id="category">
           <?php 
          // Fetch categories from the database
          $category_query = mysqli_query($conn, "SELECT * FROM job_category");
        
          // Loop through each category and create an option tag
        while ($category_row = mysqli_fetch_array($category_query)) {
            // Check if the current category matches the selected category
            $selected = ($category_row['id'] == $category) ? 'selected' : '';
            ?>
            <option value="<?php echo $category_row['id']; ?>" <?php echo $selected; ?>><?php echo $category_row['category']; ?></option>
           <?php } ?>
          </select>
          </div>
            <!-- <div class="form-group">
            <label for="Category">Select category</label>
            <select name="category" class="form-control" value="<?php echo $category;?>" id="category">
            <option value=""> Select Category </option>
        </select> </div> -->

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
            var job_title = $("#job_title").val();
            var description = $("#description").val();
            var country = $("#country").val();
            var city = $("#city").val();

            if(job_title == ''){
                alert("Job title required");
                return false;
            }
            if(description == ''){
                alert("Description required");
                return false;
            }
            if(keyword == ''){
                alert("keyword required");
                return false;
            }
            if(country == ''){
                alert("Country required");
                return false;
            }
            if(city == ''){
                alert("City required");
                return false;
            }
            if(category == ''){
                alert("category required");
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
    $job_title = $_POST['job_title'];
    $description = $_POST['description'];
    $keyword = $_POST['keyword'];
    $country = $_POST['country'];
    $city = $_POST['city'];
    $category = $_POST['category'];

    $query = mysqli_query($conn, "UPDATE all_jobs SET job_title='$job_title', description='$description', keyword='$keyword', country='$country', city='$city', category='$category' WHERE job_id='$id'");

    if ($query) {
        echo "<script>alert('Record has been updated!')</script>";
        echo "<script>window.location='job_create.php';</script>";
    
    } else {
        echo "<script>alert('Error updating record: " . mysqli_error($conn) . "')</script>";
    }
    
}
?>
