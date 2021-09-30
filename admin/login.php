<?php
require('connection.inc.php');
require('functions.inc.php');
$msg='';
if(isset($_POST['submit'])){
	$username=get_safe_value($con,$_POST['username']);
	$password=get_safe_value($con,$_POST['password']);
	$sql="select * from admin_users where name='$username'";
	$res=mysqli_query($con,$sql);
	$count=mysqli_num_rows($res); //this function check number of row
	if($count==1){
    $userFetch = mysqli_fetch_assoc($res);
    $db_pass = $userFetch['password'];
    $pass_decode = password_verify($password, $db_pass);
    if($pass_decode){
      $_SESSION['ADMIN_LOGIN']='yes';
      $_SESSION['ADMIN_USERNAME']=$username;
      header('location:categories.php');
      die();
    }else{
      $msg="Please enter correct login details";	
    }

	}else{
		$msg="Please enter correct login details";	
	}
	
}
?>
<!doctype html>
<html class="no-js" lang="">
   <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Login Page</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    
   </head>
   <body class="bg-dark">
      <div class="sufee-login d-flex align-content-center flex-wrap">
      <div class="container">
        <div class="row  mt-5">
            <div class="col-sm-10 col-md-10 col-lg-6 p-4 mx-auto my-auto border border-primary bg-white ">
                <form method="post">
                    <div class="form-group ">
                      <label for="exampleInput">User name: </label>
                      <input type="text" required name="username" placeholder="User name" class="form-control" id="exampleInput" aria-describedby="emailHelp">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Password</label>
                      <input type="password" required name="password" placeholder="password" class="form-control" id="exampleInputPassword1">
                    </div>
                    
                    <button type="submit" name="submit" class="btn btn-success w-100 mb-3 btn-lg">Login</button>
                    <div class="field_error text-danger"><?php echo $msg?></div>
                  </form>  
            </div>
        </div>
    </div>
         
      </div>
      <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

      
   </body>
</html>