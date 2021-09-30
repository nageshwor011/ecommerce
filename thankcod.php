<?php
require 'top.php';
if (!isset($_SESSION['email'])) {
    header('location:cart.php');
} else {
    $email = $_SESSION['email'];
}

?>
<div class="container backImg mb-3">

    <div class="row">
        <div class="col-sm-12 col-lg-6">
            <img src="images/bg/delivery.jpg" class="img-fluid" alt="">

        </div>
        <div class="col-sm-12 col-lg-6 mx-auto">
            <h1 class="text-success text-center">Order successful</h1>
            <h5 class="text-success"><?php echo $_SESSION['emailSent']; ?></h5>
            <h5 class="text-info">Thank you for ordering product from koshisale. we will delivered your product with in 2 to 3 days. </h5>
        </div>
    </div>
</div>

<script>
setTimeout(() =>{
    // window.location.href = "http://localhost/koshisale/cart.php";
}, 5000);


</script>
<?php
require 'footer.php';
?>