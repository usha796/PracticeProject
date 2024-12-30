    <?php 
   include('include/header.php');
   include('include/sidebar.php');
   ?>
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="admin_dashboard.php">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="employees.php">Employees</a></li>
            <li class="breadcrumb-item"><a href="#">Add Employees</a></li>
        </ol>
    </nav>
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Add Employees</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2"></div>
        </div>
    </div>

    <div style="width:30%; height:20; margin-left:20%; background-color:#D5D8DC ;">
        <form action="employee_add.php" method="POST" style="margin:3%; padding:2%;" name="employee_form" id="employee_form">
            <div id="msg"></div>
            <div class="form-group">
                <label for="Employee email">Email</label>
                <input type="text" name="email" id="email" class="form-control" placeholder="Employee email">
            </div>
            <div class="form-group">
                <label for="Username">Username</label>
                <input type="text" name="username" id="username" class="form-control" placeholder="Employee username">
            </div>
            <div class="form-group">
                <label for="Password">Password</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Employee Password">
            </div>
            <div class="form-group">
                <label for="Firstname">Firstname</label>
                <input type="text" name="first_name" id="first_name" class="form-control" placeholder="Employee Firstname">
            </div>
            <div class="form-group">
                <label for="Lastname">Lastname</label>
                <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Employee Lastname">
            </div>
            <div class="form-group">
                <label for="Admin type">Admin type</label>
                <select name="admin_type" name="admin_type" class="form-control" id="admin_type">
                    <option value="1">Main Admin</option>
                    <option value="2">User Admin</option>
                </select>
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
       // alert("hi");
    $("#submit").click(function(){
    //     event.preventDefault(); 
        
        var email=$("#email").val();
        var username=$("#username").val();
        var password=$("#password").val();
        var first_name=$("#first_name").val();
         var last_name=$("#last_name").val();
        var admin_type=$("#admin_type").val();
        var data=$("#employee_form").serialize();
        
  //       $.ajax({
  //           type: "POST",
  //           url: "employee_add.php",
  //           data: data,
  //           success: function(data) {
  //         //  
  //         alert(data);
  //       }
  //       });
   });

});


    </script>
  </body>
</html>
