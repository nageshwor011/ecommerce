<?php
require('top.php');

if (isset($_GET['type']) && $_GET['type'] != '') {
    $type = get_safe_value($con, $_GET['type']);
    if ($type == 'status') {
        $operation = get_safe_value($con, $_GET['operation']);
        $id = get_safe_value($con, $_GET['id']);
        if ($operation == 'active') {
            $status = '1';
        } else {
            $status = '0';
        }
        $update_status_sql = "update product set status='$status' where id='$id'";
        mysqli_query($con, $update_status_sql);
    }

    if ($type == 'delete') {
        $id = get_safe_value($con, $_GET['id']);
        $delete_sql = "delete from product where id='$id'";
        mysqli_query($con, $delete_sql);
    }
}

$sql = "select product.*,categories.categories from product,categories where product.categories_id=categories.id order by product.id desc";
$res = mysqli_query($con, $sql);
?>
 <!-- Page content start -->
 <div class="page-content " id="content">
        <div class=" bg-light pt-3 pb-1">
            <h5 class="mx-5">Product</h5>
            <h6 class="mx-5 "><a class="text-decoration-none " href="manage_product.php">Add Product</a></h6>
        </div>
        <div class="row ml-4">
        <div class="col-lg-12">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Categories</th>
                        <th scope="col">Name</th>
                        <th scope="col">Image</th>
                        <th scope="col">MRP</th>
                        <th scope="col">Price</th>
                        <th scope="col">QTY</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>



                    <?php
                    $i = 1;
                    while ($row = mysqli_fetch_assoc($res)) { ?>
                        <tr>
                            <td><?php echo $row['id'] ?></td>
                            <td><?php echo $row['categories'] ?></td>
                            <td><?php echo $row['name'] ?></td>
                            <td><img src="<?php echo PRODUCT_IMAGE_SITE_PATH . $row['image'] ?>" class="img-fluid" style="width: 50px; height=50px"/></td>
                            <td><?php echo $row['mrp'] ?></td>
                            <td><?php echo $row['price'] ?></td>
                            <td><?php echo $row['qty'] ?></td>
                            <td>
                                <?php
                                if ($row['status'] == 1) {
                                    echo "<a class='btn btn-success' href='?type=status&operation=deactive&id=" . $row['id'] . "'>Active</a>&nbsp;";
                                } else {
                                    echo "<a class='btn btn-secondary' href='?type=status&operation=active&id=" . $row['id'] . "'>Deactive</a>&nbsp;";
                                }
                                echo "<a class='btn btn-info' href='manage_product.php?id=" . $row['id'] . "'>Edit</a>&nbsp;";

                                echo "<a class='btn btn-danger' href='?type=delete&id=" . $row['id'] . "'>Delete</a>";

                                ?>
                            </td>
                        </tr>
                    <?php } ?>

                </tbody>
            </table>
        </div>
        </div>

    </div>
    <!--page content End  -->

<?php require 'footer.php'; ?>