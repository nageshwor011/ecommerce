<?php require('top.php');
$emailError = "";
$passError = "";

?>
<?php
   // session_start();
    if(isset($_POST['submit'])){
      //storing html email and password in these variable
        $email = $_POST['email'];
        $password = $_POST['password'];

         //searching email  query from db
        $email_search = "select * from users where email ='$email' and status =1";
        //executing the query in db through the function
        $querry = mysqli_query($con, $email_search);  
        // this function count number of row where the email are store
        $email_count = mysqli_num_rows($querry); 
        if($email_count){
          $email_pass = mysqli_fetch_assoc($querry); //this function is fetching * or all column info  from database in array  to check
          $db_pass = $email_pass['password'];// this array store fetch password in variable from db
         $_SESSION['user'] = $email_pass['name'];// created session for home page use
         $_SESSION['email'] = $email_pass['email'];// created session for home page use
          $_SESSION['userid'] = $email_pass['id'];// created session for add to cart function
          
          $pass_decode = password_verify($password, $db_pass); // second argument is hashpasw
          if($pass_decode){
            ?>
            <script>
               location.replace("http://localhost/koshisale/index.php");
            </script>
            <?php
          }
          else{
            $passError = "password is incorrect";
          }
        }
        else{
          $emailError = "invalid, email id ";
        }

    }

?>

<div class="container " >

    <div class="row mb-5 shadow-lg">
      <div class="col-sm-12 col-md-7 col-lg-7 mx-auto  my-3 py-3 bg-light">
        <img src="images/bg/log1.png" class="img-fluid" alt="" srcset="">
      </div>
        <div class="col-sm-12 col-md-5 col-lg-5 mx-auto bg-light my-3 py-3">
        <h4 class=" text-primary text-center">Account Sign in Form</h4>

        <img src="images/bg/login.png" class="img-fluid" alt="" srcset="">

        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" >
              <div class="text-ceter">
              <h4 class=" text-success">
              <?php
              if(isset($_SESSION['msg'])){
                echo $_SESSION['msg'];
              }else{
                 $_SESSION['msg']="";
                 echo $_SESSION['msg'];
              }
                ?>
              
              </h4>
              </div>
                <div class="form-group">
                    <label for="emaillogin">Email ID: *</label>
                    <input type="email" required class="form-control" placeholder="Enter your Email ID" name="email" id="emaillogin">
                    <span id="emailloginError" class="form-text text-danger"><?php echo $emailError?></span>

                </div>
                <div class="form-group">
                    <label for="passwordlogin">Password: *</label>
                    <input type="password" required class="form-control" placeholder="Enter your password" name="password" id="passwordlogin">
                    <span id="passwordloginError" class="form-text text-danger"><?php echo $passError?></sp>
                </div>
                
                <button type="submit" class="btn btn-primary w-100" name="submit">login </button>
                <div class="d-flex ">
                <p class="mt-4 text-secondary">Don't have account?&nbsp;&nbsp;&nbsp; </p> <p class="mt-4"><a  href="http://localhost/koshisale/signUP.php">click here</a></p>
                </div>
                <div class="d-flex text-secondary">
                <p>Forget password don't worry?&nbsp;&nbsp;&nbsp; </p><a href="http://localhost/koshisale/accountRecover.php"> click here</a>
                
                </div>
               
            </form>
        </div>
        
    </div>
</div>
<?php require('footer.php') ?>