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
        $uName = mysqli_real_escape_string($con, $_POST['name']);
        $uMobile = mysqli_real_escape_string($con, $_POST['mobile']);
        $uAddress = mysqli_real_escape_string($con, $_POST['address']);

        include 'checkDelivery.php';
        $redirec = "location:order.php?change=change&uid=$uid&addres=$uAddress";
        header("$redirec");
    }
}



?>
<div style="background-image: url('images/pay/pay4.jpg'); margin-top: -20px;">

    <div class="container">

        <div class="col-sm-12 col-md-6 col-lg-5 mx-auto my-3  py-3">

            <div class="col-12 mx-auto">
        <H4 class="text-danger">Please Enter Your Delivery Address Detail</H4>

                <form method="POST">

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
    <?php
    require 'footer.php';
    ?>