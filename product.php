<?php
require('top.php');
//session_start();
$pro_id = $_GET['id'];
$query = " select id, name, image, price, mrp, description from product where id = $pro_id; ";
$queryfire = mysqli_query($con, $query);
$product = mysqli_fetch_array($queryfire);
$price =  $product['price'];
$uid = 0;
$msg = "";
$errmsg = "";


if (isset($_POST['submit'])) {

  if (!isset($_SESSION['userid'])) { // session
    echo "you are logged out ";
    ?>
    <script>
    alert('please login first');
    </script>
    <?php
    header('location:http://localhost/koshisale/login.php');
  } else {
    $uid = $_SESSION['userid'];
  }

  //searching same product  query in  db
  $product_search = "select * from cart where uid ='$uid' and pid = $pro_id and status = 1;";
  $querry = mysqli_query($con, $product_search);
  // this function count number of row where the product id is store
  $product_count = mysqli_num_rows($querry);
  $quanty = mysqli_real_escape_string($con, $_POST['quantity']);

  if ($product_count == 0) {
    $insertCartQuery = "insert into cart(pid, uid, qty, total, status) values('$pro_id', '$uid', $quanty, ($price*$quanty), 1);";
    mysqli_query($con, $insertCartQuery);
    $msg = "Product added in cart";
  } elseif ($product_count == 1) {
    $selectQuery = "select * from cart where pid=$pro_id and uid=$uid and qty=$quanty and status = 1;";
    $selectFetch = mysqli_query($con, $selectQuery);
    $selectValue =  mysqli_fetch_assoc($selectFetch);
  
    if ($quanty == $selectValue['qty']) {
      $errmsg = "Product is already added in cart";
    } else {
      $UpdatecartQuery = "update cart set qty = $quanty, total =($price*$quanty) where uid = $uid and pid = $pro_id and status = 1;";
      mysqli_query($con, $UpdatecartQuery);
      $msg = "Product quantity is updated to $quanty in cart";
    }
  } 
}

?>

<div class="container">
  <div class="row">
    <div class="col-12 my-5 mx-auto">
      <div class="text-center">
        <h1 class="h1 new">New Arrivals</h1>
        <p>Sale sale buy Branded product in best price</p>
      </div>
    </div>
  </div>

  <div class="row  mt-3 mx-auto">
    <div class=" col-sm-10 col-md-6 col-lg-4 mb-5">
      <img src="<?php echo PRODUCT_IMAGE_SITE_PATH . $product['image'] ?>" class="img-fluid mx-auto" alt="...">
    </div>
    <div class="col-sm-10 col-md-6 col-lg-7">
      <h4 class=""><?php echo $product['name']; ?></h4>
      <h4 class="text-muted ">MRP<?php echo $product['mrp']; ?></h4>
      <p class="h5 ">Price RS <?php echo $product['price']; ?></p>
      <form method="POST">
        <h4 class="d-inline"> Quantity</h4> &nbsp;&nbsp;&nbsp;<input class="qty bg-light text-center" type="number" name="quantity" value="1" id="" min="1"><br>
        <button type="submit" class="btn btn-primary my-3" name="submit">Add to cart</button>
      </form>
      <p class="text-success "><?php echo $msg; ?></p>
      <p class="text-danger "><?php echo $errmsg; ?></p>
      <h4>Description</h4>
      <p class="text-justify">
        <?php echo $product['description']; ?>
      </p>
    </div>
  </div>


</div>
<?php require('footer.php') ?>