<?php
require 'top.php';

$email ="";
if (!isset($_SESSION['email'])){
    header('location:cart.php');
}
else{
    $email = $_SESSION['email'];
}
?>
<div class="container">
    <div class="row">
        <div class="col-sm-12 col-6 mx-auto">
            <h1 class="text-success text-center">Payment successful </h1>
            <h5 class="text-success"><?php echo $_SESSION['emailSent']; ?></h5>
            <h5 class="text-info">Thank you for buying product from koshisale. we will delivered your product with in 2 to 3 days. </h5>
        </div>
    </div>
</div>


<?php
require 'footer.php';
?>