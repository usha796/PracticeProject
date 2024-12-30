<?php 
   include('include/header.php');
   include('include/sidebar.php');
?>
<main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="admin_dashboard.php">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="category.php">Category</a></li>
            <li class="breadcrumb-item"><a href="#">Add Category</a></li>
        </ol>
    </nav>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Add Category</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2"></div>
        </div>
    </div>

    <div style="width:30%; height:20; margin-left:20%; background-color:#D5D8DC ;">
        <form action="category_add.php" method="POST" style="margin:3%; padding:2%;" name="category_form" id="category_form">
            <div id="msg"></div>
            <div class="form-group">
                <label for="Category">Category</label>
                <input type="text" name="category" id="category" class="form-control" placeholder="Category name">
            </div>
            <div class="form-group">
                <label for="Description">Description</label>
                <textarea name="description" id="description" class="form-control" cols="20" rows="10"></textarea>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-block btn-success" value="Submit" name="submit" id="submit">
            </div>
        </form>
    </div>
    <canvas class="my-4" id="myChart" width="900" height="380"></canvas>
</main>
</div>
</div>
<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha384-KyZXEAg3QhqLMpG8r+Knujsl5+z8vwu7+0iXY4fXg0oK7abK41JStQIAqVgRVzI6" crossorigin="anonymous"></script> -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>

<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
<script src="../../assets/js/vendor/popper.min.js"></script>
<script src="../../dist/js/bootstrap.min.js"></script>

<!-- Icons -->
<script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
<script>
  feather.replace()
</script>
<!-- datatable plugins -->
<script src="https://cdn.datatables.net/2.0.6/js/dataTables.js"></script>

<script>
    new DataTable('#example');
</script>
<script>
    $(document).ready(function(){
        $("#submit").click(function(){
            var category = $("#category").val();
            var description = $("#description").val();
            
            if(company == ''){
                alert("Category name required");
                return false;
            }
            if(description == ''){
                alert("Description required");
                return false;
            }
        });
    });
</script>
</body>
</html>
