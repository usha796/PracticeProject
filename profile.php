
<?php 

include('connection/db.php');
include('include/header.php');
include('include/profile.php');


$query=mysqli_query($conn,"select * from profile where user_email='{$_SESSION['email']}'");
while($row=mysqli_fetch_array($query)){
  $img=$row['img'];
  $name=$row['name'];
  $dob=$row['dob'];
  $number=$row['number'];
  $email=$row['email'];
  

}
?>
<div style="margin-left:25%; width:40%; border: 2px solid gray; padding: 20px;">
  <form action="profile_add.php" method="post" id="profile_form" enctype="multipart/form-data">
    <div style="display: flex; align-items: center;">
      <div style="flex: 0 0 25%;">
        <img src="profile_img/<?php if(!empty($img)){echo $img; } else {echo 'icon.jpg';}?>" class="img-thumbnail" alt="Profile Image">
      </div>
      <div style="flex: 0 0 75%;">
        <input type="file" class="form-control" name="img" id="img" style="width: 50%;">
      </div>
    </div>
    <br>
    <div style="display: flex; align-items: center;">
      <div style="flex: 0 0 25%;">
        <label for="name">Enter Your Name:</label>
      </div>
      <div style="flex: 0 0 75%;">
        <input type="text" name="name" id="name" value="<?php if(!empty($name)) echo$name; ?>" class="form-control" style="width: 60%;">
      </div>
    </div>
    <br>
    <div style="display: flex; align-items: center;">
      <div style="flex: 0 0 25%;">
        <label for="dob">Enter Your DOB:</label>
      </div>
      <div style="flex: 0 0 75%;">
        <input type="date" name="dob" id="dob" value="<?php if(!empty($dob)) echo$dob; ?>"class="form-control" style="width: 60%;">
      </div>
    </div>
    <br>
    <div style="display: flex; align-items: center;">
      <div style="flex: 0 0 25%;">
        <label for="number">Enter Your Mobile Number:</label>
      </div>
      <div style="flex: 0 0 75%;">
        <input type="number" name="number" id="number"value="<?php if(!empty($number)) echo$number; ?>" class="form-control" style="width: 60%;">
      </div>
    </div>
    <br>
    <div style="display: flex; align-items: center;">
      <div style="flex: 0 0 25%;">
        <label for="email">Enter Your Email:</label>
      </div>
      <div style="flex: 0 0 75%;">
        <input type="email" name="email" id="email"value="<?php if(!empty($email)) echo$email; ?>" class="form-control" style="width: 60%;">
      </div>
    </div>
    <br>
    <div style="text-align: center;">
      <input type="submit" name="submit" id="submit" class="btn btn-success" value="Update" style="width: 100px;">
    </div>
  </form>
</div>


<!-- 		
		<section class="ftco-section-parallax">
      <div class="parallax-img d-flex align-items-center">
        <div class="container">
          <div class="row d-flex justify-content-center">
            <div class="col-md-7 text-center heading-section heading-section-white ftco-animate">
              <h2>Subcribe to our Newsletter</h2>
              <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in</p>
              <div class="row d-flex justify-content-center mt-4 mb-4">
                <div class="col-md-8">
                  <form action="#" class="subscribe-form">
                    <div class="form-group d-flex">
                      <input type="text" class="form-control" placeholder="Enter email address">
                      <input type="submit" value="Subscribe" class="submit px-3">
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section> -->

    <?php
   include('include/footer.php');
   ?>
<!--   
<script>
    new DataTable('#example');
</script>
<script>
    $(document).ready(function(){
        $("#submit").click(function(e){
            // Prevent the default form submission
            e.preventDefault();

            // Get the values of form fields
            var name = $("#name").val();
            var dob = $("#dob").val();
            var number = $("#number").val();
            var email = $("#email").val();
            var user_email = $("#email").val();

            // Perform validation or other actions here
            if (name === '' || dob === '' || number === '' || email === '') {
                alert("Please fill in all fields.");
                return;
            }

            // If validation passes, submit the form
            $("#profile_form").submit();
        });
    });
</script> -->
