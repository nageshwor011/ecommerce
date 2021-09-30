<?php
require 'top.php';

$uid =  $_SESSION['userid'];
$select = "select name, email, mobile, address from users where id = $uid; ";
$selectQuery = mysqli_query($con, $select);
$showValue =  mysqli_fetch_assoc($selectQuery);
$name = $showValue['name'];
$email = $showValue['email'];
$mobile = $showValue['mobile'];
$address = $showValue['address'];
if (!isset($_SESSION['user'])) {
  header('location:http://localhost/php/ecom/index.php');
} else {
  if (isset($_POST['submit'])) {
    $fullName = mysqli_real_escape_string($con, $_POST['name']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $mobile = mysqli_real_escape_string($con, $_POST['mobile']);
    $address = mysqli_real_escape_string($con, $_POST['address']);

    $updateQuery = "update users set name = '$fullName', email = '$email', mobile = '$mobile', address = '$address', added_on = CURRENT_TIMESTAMP()  where id = $uid ;";

    $iquery = mysqli_query($con, $updateQuery);
?>
    <script>
      alert('account updated successfully');
    </script>
<?php

  }
}
?>
<div class="container-fluid" style="margin-top:-15px;  background-image: url('images/bg/profile.jpg');background-repeat: no-repeat;background-size: cover; background-attachment: fixed;">
  <div class="container">

    <div class="row  py-5  mx-auto ">
      
      <div class="col-sm-10 col-md-6 col-lg-4 py-3 mx-auto border border-primary">
      <div class=" mx-auto mb-5 text-center">
        <h4 class="text-white">User Profile</h4>
        <img src="images/bg/b.png" class="img-fluid mx-auto" alt="..." style="width: 200px; height: 200px; border-radius: 50%;  border: rgb(0, 0, 0) 1px solid;">
        <h5 class="mt-3"> wel come <?php echo $_SESSION['user']; ?> in koshisale</h5>
      </div>
        <form method="POST">
          <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" required value="<?php echo $email ?>">
          </div>
          <div class="form-group">
            <label for="exampleInputName">Name:</label>
            <input type="text" name="name" class="form-control" id="exampleInputName" required value="<?php echo $name ?>">
          </div>
          <div class="form-group">
            <label for="exampleInputMobile">Mobile:</label>
            <input type="text" name="mobile" class="form-control" id="exampleInputMobile" required value="<?php echo $mobile ?>">
          </div>
          <div class="form-group">
            <label for="exampleInputAddress">Address:</label>
            <input type="text" name="address" class="form-control" id="exampleInputAddress" required value="<?php echo $address ?>">
          </div>

          <button type="submit" name="submit" class="btn btn-primary w-100 btn-lg">Submit</button>
        </form>
      </div>
    </div>
  </div>
</div>

<?php
require 'footer.php';
?>