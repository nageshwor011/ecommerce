<?php require 'top.php'; 
session_start();
if(isset($_GET['token'])){
    $token = $_GET['token'];
    $updateQuery = "update users set status = 1 where token = '$token' ";
    $query = mysqli_query($con, $updateQuery);
    
    if($query){
        if(isset($_SESSION['msg'])){
            $_SESSION['msg'] = "Please login your account is activated ";
            header('location:login.php');
        }
        else{
            $_SESSION['msg'] ="you are logout please login";
            header('location:login.php');
        }
    }
    else{
        $_SESSION['msg'] = " account not activated ";
        header('location:signup.php');
    }
}

?>

<div class="container">
<div class="row">

</div>
</div>
<?php require 'footer.php'; ?>
