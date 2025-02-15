<?php 
   include('include/header.php');
   include('include/sidebar.php');
   ?>

   
    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="admin_dashboard.php">Dashboard</a></li>
          <li class="breadcrumb-item"><a href="#">Category</a></li>
          </ol>
          </nav>
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
          <h1 class="h2">Category</h1>
          
            <div class="btn-toolbar mb-2 mb-md-0">
              <div class="btn-group mr-2">
                
              </div>
             <a class="btn btn-primary" href="add_category.php">Add Category</a>
            </div>
          </div>

          <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>#S.N</th>
                
                <th>Category</th>
                <th>Description</th>
                <th>Action</th>
                
            </tr>
        </thead>
        <tbody>
        <?php
          include('connection/db.php');
          $query=mysqli_query($conn,"select* from job_category");
          while($row=mysqli_fetch_array($query)){

          
          ?>


            <tr>
                <td><?php echo $row ['id'];?></td>
                <td><?php echo $row ['category'];?></td>
                <td><?php echo $row ['description'];?></td>
                
                <td>
                  <div class="row">
                    <div class="btn-group">
                      <a href="category_edit.php?edit=<?php echo $row['id'];?>" class= "btn btn-success"><span class ="glyphicon glyphicon-pencil"></span></a>
                      <a href="category_delete.php?del=<?php echo $row ['id']; ?>" class= "btn btn-danger"><span class ="glyphicon glyphicon-trash"></span></a>

                    </div> 

                  </div>
                   </td>
                
            </tr>
            <?php } ?>
        </tbody>
        <tfoot>
            <tr>
                <th>#S.N</th>  
                <th>Category</th>
                <th>Description</th>
                <th>Action</th>
            </tr>

            
        </tfoot>
    </table>
          <canvas class="my-4" id="myChart" width="900" height="380"></canvas>
          </div>
        </main>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
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
    <!-- <script scr="https://cdn.datatables.net/2.0.6/js/dataTables.js"></script> -->
    <!-- <script scr=""></script> -->
   
    <script>
         new DataTable('#example');
        // $(document).ready(function(){
        //     $('#myTable').DataTable(); 
        // });
        
    </script>
  </body>
</html>


