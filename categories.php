<?php 
require('top.php');
$cat_id = $_GET['id'];
?>
  <!-- starting of mindex php -->
  

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


    <?php 
    $query = " select id, categories_id, name, image, price, mrp from product where categories_id = $cat_id and status = 1 order by id desc; ";
  
    $queryfire = mysqli_query($con, $query);
  
    $num = mysqli_num_rows($queryfire);

    if($num > 0){
      while($product = mysqli_fetch_array($queryfire)){
   
    ?>

       <div class="col-sm-6 col-md-4 col-lg-3 mb-3">
          <div class="card">
           <a href="product.php?id=<?php echo $product['id'] ?>" role="button">
              <img src="<?php echo PRODUCT_IMAGE_SITE_PATH .$product['image'] ?>" class="card-img-top " alt="product images">
              <div class="card-body">
                <h5 class="card-title">
                  <?php echo $product['name'] ?>
                </h5>
                <p class="card-text text-muted">
                  MRP
                  <?php echo $product['mrp'] ?>
                </p>
                <p class="card-text">
                  Price Rs
                  <?php echo $product['price'] ?>
                </p>

              </div>
           </a>
          </div>
          
        </div>
        <?php 
      }
    }
    else{
      echo "<h5 class='text-danger pb-3 mx-auto'>Currently no product are avaliable in this categories </h5>";
      
    }
    ?>
    </div>

    


  </div>


  <!-- ending of mindex php -->
 <?php require('footer.php') ?>