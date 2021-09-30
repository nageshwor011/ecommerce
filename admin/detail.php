<?php
require('top.php');
if(!isset($_GET['id'])){
    header('location:order.php');
}
$uid = $_GET['id'];
$uniqueID = $_GET['uniqueID'];

 $sql = "select product.image, product.name, product.price, product.mrp, cart.qty, cart.total, orders.status from product, orders, cart where orders.uniqueID ='$uniqueID'  and cart.uniqueID ='$uniqueID' and orders.status =1 and cart.status=0 and cart.pid = product.id ;";
 $deliverySql = "select delivery.name, delivery.address, delivery.mobile from delivery, orders where delivery.uniqueId = '$uniqueID' and delivery.uid= $uid";
$userData = mysqli_fetch_assoc(mysqli_query($con, $deliverySql));

$grandTotal =  mysqli_fetch_assoc(mysqli_query($con, "select sum(total) from cart where cart.uniqueID ='$uniqueID' and status = 0;"));



 $querry = mysqli_query($con, $sql);
 $num = mysqli_num_rows($querry);
//  $product = mysqli_fetch_array($querry)
?>
<!-- Page content start -->
<div class="page-content " id="content">
    <div class=" bg-light pt-3 pb-1">
        <h1 class="mx-5 text-center text-muted">Orders Detail</h1>
    </div>
    <h3 class="text-center text-capitalize"><?php echo $userData['name'];  ?></h3>
    <div class="d-flex mx-3">
        <h5 class="mr-auto  ml-2"><?php echo  $userData['address']; ?></h5>
        <h5 class=" mr-2"><?php echo $userData['mobile']; ?></h5>

    </div>
    <div class="row ml-2 mr-2">


        <div class="col-lg-12">
            <table class="table table-bordered ">
                <thead>
                    <tr>
                        <th scope="col">Product</th>
                        <th scope="col">Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">MRP</th>
                        <th scope="col">QTY</th>
                        <th scope="col">Total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($num > 0) {
                        while ( $product = mysqli_fetch_array($querry)) {
                    ?>
                            <tr>
                                <th scope="row"><img alt="" src="<?php echo PRODUCT_IMAGE_SITE_PATH . $product['image'] ?>" width="150" height="250"></th>
                                <td class="">
                                    <p class="text-center justify-content-center align-items-center"> <?php echo $product['name'] ?></p>
                                </td>
                                <td class="text-center justify-content-center"><?php echo $product['price'] ?></td>
                                <td class="text-center justify-content-center"><?php echo $product['mrp'] ?></td>
                                <td class="text-center justify-content-center size"><?php echo $product['qty'] ?> </td>
                                <td class="text-center justify-content-center "> <?php echo $product['total'] ?></td>
                                
                                
                            </tr>
                    <?php
                        }
                    }
                    ?>
                    <tr>
                        <td class="font-weight-bold">Grand Total </td>
                        <td class="text-center" colspan="5"> RS <?php echo $grandTotal['sum(total)'] ?> </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</div>
<!--page content End  -->

<?php
require('footer.php');
?>