<?php

require('top.php') ?>

<!-- starting of mindex php -->
<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="images/slider/slide.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5>Collection of 2021</h5>
                <h1>Koshisale</h1>
            </div>
        </div>
        <div class="carousel-item">
            <img src="images/slider/slide2.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption  d-md-block">
                <h5>Koshi sale</h5>
                <p>We will value our customer. Customer satisfaction is our first priority.</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="images/slider/slide3.jpg" class="d-block w-100" alt="...">
            <div class="carousel-caption  d-md-block">
                <h5>Koshi sale</h5>
                <p>We will value our customer. Customer satisfaction is our first priority.</p>
            </div>
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
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
        <?php
    //$query = " SELECT  `id`, `name`, `mrp`, `price`,`image` FROM `product` ORDER by id DESC; ";
    $query = "SELECT id, name, mrp, price, image FROM product WHERE status = 1 ORDER BY id desc;";

    $queryfire = mysqli_query($con, $query);

    $num = mysqli_num_rows($queryfire);

    if ($num > 0) {
      while ($product = mysqli_fetch_array($queryfire)) {
        //cloc tak baki 
    ?>

        <div class="col-sm-6 col-md-4 col-lg-3 mb-3">
            <div class="card">
                <a href="product.php?id=<?php echo $product['id'] ?>" role="button">

                    <img src="<?php echo PRODUCT_IMAGE_SITE_PATH . $product['image'] ?>" class="card-img-top "
                        alt="product images">
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
                    <div class="btn-group  d-flex">
                </a>
            </div>
        </div>
    </div>
    <?php
      }
    } ?>
</div>




</div>



<!-- ending of mindex php -->
<?php require('footer.php') ?>