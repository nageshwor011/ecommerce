<?php
require 'top.php';
$uid =  0;
$total = 0;
$email = "";
if (!isset($_SESSION['email'])) {
    header('location:cart.php');
} else {
    $email = $_SESSION['email'];
}
if (!isset($_GET['uid'])) {
    header('location:http://localhost/php/ecom/cart.php');
} else {
    $uid =  $_GET['uid'];
    $paymentType = "COD";
    $grandTotal =  mysqli_fetch_assoc(mysqli_query($con, "select sum(total) from cart where uid=$uid and status = 1;"));
    $total = $grandTotal['sum(total)'];
    $delivery = mysqli_fetch_assoc(mysqli_query($con, "select * from users where id=$uid and status = 1;"));
    $uAddress = $delivery['address'];
    $uName = $delivery['name'];
    $uMobile = $delivery['mobile'];

    $uniqueId = uniqid() . date("Y-m-dh:i:sa");
    if (isset($_POST['COD'])) {

        $insertQuery = "insert into orders( uid, total, paymentType, uniqueId, status, added_on) values( $uid, $total, 'COD', '$uniqueId', 1 ,CURRENT_TIMESTAMP())";
        $success =  mysqli_query($con, $insertQuery);
        $same  = mysqli_real_escape_string($con, $_POST['same']);
        if ($same == "same") {

            $updateCartUniqueID = mysqli_query($con, "update cart set uniqueID='$uniqueId' where uid = $uid and status = 1;");
            $updateCartQuery = mysqli_query($con, "update cart set status= 0 where uid = $uid ;");
            include 'checkDelivery.php';
            mysqli_query($con, "update delivery set uniqueId='$uniqueId' where uid='$uid' and ispaid=0 ");
            mysqli_query($con, "update delivery set ispaid=1 where uid='$uid' and ispaid=0 ");


            $subject = "Product order from koshisale";
            $body = " Thank You for ordering product from koshisale, <br> Your order has been conform we will delever your product with in 2 to 3 days ";

            $sender_email = "From: udemyc011@gmail.com";

            if (mail($email, $subject, $body, $sender_email)) {
                $_SESSION['emailSent'] = "Please check your email. product have been Order with this $email email ID:";
            } else {
                echo "sending failed ";
            }
        }

        header('location:thankcod.php');
    } else {
        $insertQuery = "insert into orders( uid, total, paymentType, uniqueId, status, added_on) values( $uid, $total, 'Online payment', '$uniqueId', 0 ,CURRENT_TIMESTAMP())";
        $success =  mysqli_query($con, $insertQuery);
        $updateCartUniqueID = mysqli_query($con, "update cart set uniqueID='$uniqueId' where uid = $uid and status = 1;");
        include 'checkDelivery.php';
        // mysqli_query($con, "insert into delivery(name, mobile, address) values('$uName', '$uMobile', '$uAddress')");
    }
}




?>
<div style="background-image: url('images/pay/pay4.jpg');">


    <div class="container">

        <div class="row mb-3 mx-auto">
            <div class="col-sm-12 col-md-6 col-lg-5  my-3  py-3">
                <div class="card" style="width: 18rem;">
                    <img src="media/product/product.png" class="card-img-top img-fluid" alt="...">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h5 class="card-title font-weight-bold d-flex">Total RS</h5>
                            <h5 class=" display-5 font-weight-bold  text-danger">
                                <?php echo $total; ?></h5>
                        </div>

                        <p class="card-text text-dark">We will value our customer. Customer satisfaction is our first
                            priority.</p>
                        <a href="index.php" class="btn btn-primary text-center">Continue Shoping</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-6 col-lg-5 mx-auto my-3  py-3">
                <H4 class="text-danger">Select Payment Method And Conform Your Order</H4>
                <form method="POST">
                    <div class="form-check">
                        <input class="form-check-input"  type="radio" checked name="same" id="exampleRadios1" value="same">
                        <label class="form-check-label " for="exampleRadios1"> Deliver in
                            <?php
                            if(isset($_GET['addres'])){
                                echo $_GET['addres'];
                            }else{
                                echo  $delivery['address'];

                            }
                            ?>
                        </label>
                    </div>
                    <div class="form-check">
                        <a href="difffrentAddress.php?uid=<?php echo $uid ?> " target="_blank"> </a>
                        <input class="form-check-input "  type="radio" onclick="redirects()" name="same" required id="exampleRadios2" value="option2">
                        <label class="form-check-label "  for="exampleRadios2">
                            try diffrent one
                        </label>

                    </div>
                    <button type="submit" class="btn btn-primary w-100 my-1" name="COD">PAY ON COD</button>
                </form>
                <form class="text-info" action="https://uat.esewa.com.np/epay/main" method="POST">
                    <input value="<?php echo $total; ?>" name="tAmt" type="hidden">
                    <input value="<?php echo $total; ?>" name="amt" type="hidden">
                    <input value="0" name="txAmt" type="hidden">
                    <input value="0" name="psc" type="hidden">
                    <input value="0" name="pdc" type="hidden">
                    <input value="EPAYTEST" name="scd" type="hidden">
                    <input value="<?php echo $uniqueId ?>" name="pid" type="hidden">
                    <input value="http://localhost/php/ecom/pSuccess.php" type="hidden" name="su">
                    <input value="http://localhost/php/ecom/pFail.php" type="hidden" name="fu">
                    <!-- <input value="Submit" type="submit"> -->
                    <button type="submit" id="" class="btn btn-primary w-100 my-1" name="submit">PAY WITH eSEWA</button>
                </form>

            </div>
        </div>

    </div>
</div>
<script>
function redirects(){
    window.location.href = "difffrentAddress.php?uid=<?php echo $uid ?> ";
}
</script>

<?php
require 'footer.php';
?>