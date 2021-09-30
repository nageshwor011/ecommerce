<?php require('top.php');
//session_start();
$emailError = "";
$passError = "";
?>
<?php

if (isset($_POST['submit'])) {
  $fullName = mysqli_real_escape_string($con, $_POST['name']);
  $email =  mysqli_real_escape_string($con, $_POST['email']);
  $password = mysqli_real_escape_string($con, $_POST['password']);
  $cpassword = mysqli_real_escape_string($con, $_POST['conformPassword']);
  $mobileNum = mysqli_real_escape_string($con, $_POST['mobile']);
  $address = mysqli_real_escape_string($con, $_POST['address']);

  //passwording hashing
  $pass = password_hash($password, PASSWORD_BCRYPT);
  $cpass = password_hash($cpassword, PASSWORD_BCRYPT);

  $token = bin2hex(random_bytes(15));
  //query is holding in emailquery for ececuting in next function
  $emailQuerry = "select * from users where email = '$email'";
  $querry = mysqli_query($con, $emailQuerry); //checking in database email is repeated or not through query
  $emailCount = mysqli_num_rows($querry); // this function count the number of rows it retten number
  if ($emailCount > 0) {
    $emailError = "email is already registered  try diffrent one";
  } else {
    if ($password === $cpassword) {
      $insertQuery = "insert into users(name, email, password, conform_password, mobile, token, status, address, added_on) values('$fullName', '$email', '$pass', '$cpass', '$mobileNum', '$token', 0, '$address', CURRENT_TIMESTAMP());";
      $iquery = mysqli_query($con, $insertQuery);

      //this
      if ($iquery) {
        // data inserted sucessfully
        $subject = "Account activitation";
        $body = " hello $fullName Please click on this link to activate your account  http://localhost/koshisale/activate.php?token=$token ";

        $sender_email = "From: udemyc011@gmail.com";

        if (mail($email, $subject, $body, $sender_email)) {
          $_SESSION['msg'] = "Please check your email id $email  to activate your account ";
          header('location:login.php');
        } else {
          echo "sending failed ";
        }
      } else {
      }
    } else {
      $passError = "password are not matching";
    }
  }
}
?>

<div class="container " style="margin-top: -0.8rem;">

  <div class="row shadow-lg bg-white rounded">
    <div class="col-sm-12 col-md-6 col-lg-7 mx-auto my-3 bg-light py-3">
    <img src="images/bg/signup.jpg" class="img-fluid" alt="" srcset="">
    </div>
    <div class="col-sm-12 col-md-6 col-lg-5 mx-auto my-3 bg-light py-3 px-4">
      <form action="<?php echo $_SERVER['PHP_SELF']; ?>" onsubmit=" return validation()" method="POST">
        <h4 class="text-ceter text-danger">Account Sign up Form</h4>
        <div class="form-group">
          <label for="fNameSinup">Full Name: *</label>
          <input type="text" required class="form-control" id="fNameSinup" name="name" aria-describedby="emailHelp">
          <span id="errorName" class="form-text text-danger"></span>
        </div>
        <div class="form-group">
          <label for="emailSinup">Email ID: *</label>
          <input type="email" required class="form-control" id="emailSinup" name="email">
          <span id="emailSinupError" class="form-text  text-danger"><?php echo $emailError ?></span>
        </div>

        <div class="form-group">
          <label for="passwordSinup">Password: *</label>
          <input type="password" required class="form-control" id="passwordSinup" name="password">
          <span id="passwordSinupError" class="form-text  text-danger"><?php echo $passError ?></span>

        </div>
        <div class="form-group">
          <label for="conformPasswordSinup">Conform Password: *</label>
          <input type="password" required class="form-control" id="conformPasswordSinup" name="conformPassword">
          <span id="conformPasswordSinupError" class="form-text  text-danger"><?php echo $passError ?></span>

        </div>
        <div class="form-group">
          <label for="mobileNoSinup">Mobile Number: *</label>
          <input type="tel" required class="form-control" id="mobileSinup" name="mobile">
          <span id="errorMobile" class="form-text  text-danger"></span>
        </div>
        <div class="form-group">
          <label for="address">Address: *</label>
          <input type="text" required class="form-control" id="address" name="address">
          <span id="errorAddress" class="form-text  text-danger"></span>

        </div>


        <button type="submit" class="btn btn-outline-danger w-100" name="submit">Submit</button>
      </form>
    </div>
  </div>

</div>
<script>
  

  function validation() {
    let name = document.getElementById('fNameSinup').value.trim();
  let mobile = document.getElementById('mobileSinup').value.trim();
  let address = document.getElementById('address').value.trim();
  let password = document.getElementById('passwordSinup').value.trim();
  let cPassword = document.getElementById('conformPasswordSinup').value.trim();
    if (name == "") {
      document.getElementById('errorName').innerHTML = "Plese fill your name";
      return false;
    }
    if(password ==""){
      document.getElementById('passwordSinupError').innerHTML = "password cannot be blank";
      return false;

    }
    if(cPassword==""){
      document.getElementById('conformPasswordSinupError').innerHTML = "conform password cannot be blank";
        return false;
    }
    if(mobile ==""){
      errorMobile.innerHTML = "Mobile number cannot be blank";
      return false;
    }
   else if (mobile.length != 10) {
     errorMobile.innerHTML = "Please make sure mobile number is 10 digit"
      return false
    }
    else if(isNaN(mobile)){
      errorMobile.innerHTML = "mobile number must not contain alphabet"
    }
    if(address ==""){
    document.getElementById('errorAddress').innerHTML = "please fill the address";
      return false;
    }
  }
</script>
<?php require('footer.php') ?>