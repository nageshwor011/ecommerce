<?php
require 'top.php';
//session_start();
$errormsg = "";
if(isset($_POST['submit'])){
  //storing html email and password in these variable
    $email = $_POST['email'];
   // $password = $_POST['password'];

     //searching email  query from db
    $email_search = "select * from users where email ='$email' and status =1";
    //executing the query in db through the function
    $querry = mysqli_query($con, $email_search);  
    // this function count number of row where the email are store
    $email_count = mysqli_num_rows($querry); 
   
    if($email_count){
      $user_data = mysqli_fetch_assoc($querry); //this function is fetching * or all column info  from database in array  to check
      $name = $user_data['name'];
      $token = $user_data['token'];

      $subject = "Account password reset ";
      $body = " hello $name Please click on this link to reset your accout password  http://localhost/koshisale/reset.php?token=$token ";
      
      $sender_email = "From: udemyc011@gmail.com";

     if(mail($email, $subject, $body, $sender_email)){
       $_SESSION['msg'] = "Please check your email id $email  to reset your account password";
       header('location:login.php');
     }
     else{
      $errormsg = "sending failed ";
     }
    }
    else{
        $errormsg = "No such email ID is registerd";
    }
}  
?>
<div class="container-fluid " style="background-image: url('images/bg/bg.jpg'); marging-top: -17px; ">
  <div class="row my-3">
    <div class="col-sm-10 col-md-4 col-lg-3 mx-auto my-3 py-3">
      <h4 class=" text-danger text-center">Account Recovery Form</h4>
      <img src="images/bg/forgot.png" class="img-fluid" alt="" srcset="">
      <form method="POST">
        <div class="form-group">
          <label for="exampleInputEmail1">Email address</label>
          <input type="email" class="form-control" name="email" placeholder="Enter your Email" required id="exampleInputEmail1" aria-describedby="emailHelp">
          <span id="emailHelp" class="form-text text-danger"><?php echo $errormsg?></span>
        </div>
        
        <button type="submit" name="submit" class="btn btn-primary w-100">Submit</button>
      </form>
    </div>

  </div>
</div>


<?php
require 'footer.php';
?>