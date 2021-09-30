<?php require 'top.php';
$msg = "";
$errormsg = "";
if (isset($_GET['token'])) {
  $token = $_GET['token'];

  if (isset($_SESSION['msg'])) {
    $_SESSION['msg'] = "Please update your pasword";
    $msg = $_SESSION['msg'];
    if (isset($_POST['submit'])) {

      $password = mysqli_real_escape_string($con, $_POST['password']);
      $cpassword = mysqli_real_escape_string($con, $_POST['cPassword']);
      if ($password === $cpassword) {
        //passwording hashing
        $pass = password_hash($password, PASSWORD_BCRYPT);
        $cpass = password_hash($cpassword, PASSWORD_BCRYPT);

        //updating password
        $updateQuery = "update users set password='$pass', conform_password='$cpass' where token='$token';";
        $querry = mysqli_query($con, $updateQuery); //checking in database email is repeated or not through query
        if($querry){
          $_SESSION['msg'] = "";
          header('location:login.php');
        }
      }
      else{
         $errormsg = "Please make sure both password are matching";
      }
    }
  } else {
    header('location:login.php');
  }
}
?>
<div class="container">
  <div class="row my-3">
    <div class="col-sm-10 col-md-8 col-lg-6 mx-auto bg-light my-3 py-3">
      <h4 class=" text-success text-center">
        <?php
        if (isset($_SESSION['msg'])) {
         
          echo $_SESSION['msg'];
        }
        ?>
      </h4>
      <h4 class=" text-danger ">Password Reset Form</h4>
      <form method="POST">
        <div class="form-group">
          <label for="password">Password:</label>
          <input type="password" class="form-control" name="password" placeholder="Enter new password" required id="password" aria-describedby="emailHelp">
        </div>
        <div class="form-group">
          <label for="cPassword">Conform Password:</label>
          <input type="password" class="form-control" name="cPassword" placeholder="conform your password" required id="cPassword" aria-describedby="emailHelp">
          <small id="emailHelp" class="form-text text-danger"><?php echo $errormsg?></small>
        </div>

        <button type="submit" name="submit" class="btn btn-primary w-100">Submit</button>
      </form>
    </div>

  </div>
</div>
<?php 
require 'footer.php';

?>