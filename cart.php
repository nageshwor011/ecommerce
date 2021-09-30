<?php
require 'top.php';
?>
<?php

//session_start();
if (!isset($_SESSION['user'])) { // here full name from db and if not filled rediredt to login field once logout or session destroyed
  echo "you are logged out ";
  header('location:http://localhost/koshisale/login.php');
}

$uid = $_SESSION['userid'];
$updateQuery = "update cart set qty=3 where uid='$uid' and pid=3";
// this function is for deleting from cart
if (isset($_GET['type']) && $_GET['type'] != '') {
  $type = mysqli_real_escape_string($con, $_GET['type']);
  if ($type == 'delete') {
    $id = mysqli_real_escape_string($con, $_GET['id']);
    $delete_sql = "delete from cart where pid='$id' and uid = $uid";
    mysqli_query($con, $delete_sql);
  }
 
}
$query = " select cart.uid, product.id, product.image, product.name, product.price, cart.qty, cart.qty*product.price as 'subTotal' from cart, product where cart.pid = product.id and cart.uid =$uid  and cart.status = 1;";
$queryfire = mysqli_query($con, $query);
$num = mysqli_num_rows($queryfire);


 //total amount of particular users
 $grandTotal =  mysqli_fetch_assoc(mysqli_query($con, "select sum(total) from cart where uid=$uid and status = 1;"));


?>
<div class="row" style="width: 100vw;">
  <img src="images/bg/4.jpg" alt="" class="mx-auto" width="100%" height="200" srcset="">
</div>
<div class="container">

  <div class="row">
    <div class="col-12 my-5">
      <div class="text-center">
        <h1 class="h1 new">New Arrivals</h1>
        <p>Sale sale buy Branded product in best price</p>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-lg-12">
      <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col">Product</th>
            <th scope="col">Name</th>
            <th scope="col">Price</th>
            <th scope="col">QTY</th>
            <th scope="col">Total</th>
            <th scope="col">Remove</th>
          </tr>
        </thead>
        <tbody>
          <?php
          if ($num > 0) {
            while ($product = mysqli_fetch_array($queryfire)) {
          ?>
              <tr>
                <th scope="row"><img alt="" src="<?php echo PRODUCT_IMAGE_SITE_PATH . $product['image'] ?>" width="150" height="250"></th>
                <td class="">
                  <p class="text-center justify-content-center align-items-center"> <?php echo $product['name'] ?></p>
                </td>
                <td class="text-center justify-content-center"><?php echo $product['price'] ?></td>

                <td class="text-center justify-content-center size"><?php echo $product['qty'] ?>  </td>
                <td class="text-center justify-content-center "> <?php echo $product['subTotal'] ?></td>
                <td class="text-center justify-content-center icon size">
                  <?php
                  echo "<a class='btn ' href='?type=delete&id=" . $product['id'] . "'><i class='fas fa-trash-alt  text-danger'></i>Remove</a>";
                  ?>
                </td>
              </tr>
          <?php
            }
          }
          ?>
          <tr>
            <td class="font-weight-bold">Grand Total </td>
            <td class="text-center" colspan="5"> RS <?php echo $grandTotal['sum(total)']; ?> </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
  <div class="d-flex justify-content-between">
    <a href="index.php" class="btn btn-warning mb-3 text-white">CONTINUE SHOPING</a>
    <a href="order.php?uid=<?php echo $uid ?>" class="btn btn-info mb-3 text-white ">PLACE ORDER</a>
  </div>
</div>



<?php
require 'footer.php'; ?>