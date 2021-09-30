<?php
require('top.php');
$categories = '';
$msg = '';
if (isset($_GET['id']) && $_GET['id'] != '') {
    $id = get_safe_value($con, $_GET['id']);
    $res = mysqli_query($con, "select * from categories where id='$id'");
    $check = mysqli_num_rows($res);
    if ($check > 0) {
        $row = mysqli_fetch_assoc($res);
        $categories = $row['categories'];
    } else {
        header('location:categories.php');
        die();
    }
}

if (isset($_POST['submit'])) {
    $categories = get_safe_value($con, $_POST['categories']);
    $res = mysqli_query($con, "select * from categories where categories='$categories'");
    $check = mysqli_num_rows($res);
    if ($check > 0) {
        if (isset($_GET['id']) && $_GET['id'] != '') {
            $getData = mysqli_fetch_assoc($res);
            if ($id == $getData['id']) {
            } else {
                $msg = "Categories already exist";
            }
        } else {
            $msg = "Categories already exist";
        }
    }

    if ($msg == '') {
        if (isset($_GET['id']) && $_GET['id'] != '') {
            mysqli_query($con, "update categories set categories='$categories' where id='$id'");
        } else {
            mysqli_query($con, "insert into categories(categories,status) values('$categories','1')");
        }
        header('location:categories.php');
        die();
    }
}
?>


 <!-- Page content start -->
 <div class="page-content " id="content">
        <div class=" bg-light pt-3 pb-1">
            <h1 class="mx-5 text-center text-muted">Manage Categories</h1>
        </div>
        <div class="row ml-4">
        <div class="col-lg-12">
            <form method="post">
                <div class="card-body card-block">
                    <div class="form-group">
                        <label for="categories" class=" form-control-label">Categories</label>
                        <input type="text" name="categories" placeholder="Enter categories name" class="form-control" required value="<?php echo $categories ?>">
                    </div>
                    <button id="payment-button" name="submit" type="submit" class="btn btn-lg btn-info btn-block">
                        <span id="payment-button-amount">Submit</span>
                    </button>
                    <div class="field_error text-danger"><?php echo $msg ?></div>
                </div>
            </form>
        </div>
        </div>

    </div>
    <!--page content End  -->
    <?php 
    require 'footer.php';
    ?>