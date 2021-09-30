<?php
require('top.php');

// if(isset($_GET['type']) && $_GET['type']!=''){
// 	$type=get_safe_value($con,$_GET['type']);
// 	if($type=='delete'){
// 		$id=get_safe_value($con,$_GET['id']);
// 		$delete_sql="delete from contact_us where id='$id'";
// 		mysqli_query($con,$delete_sql);
// 	}
// }
if (isset($_GET['type']) && $_GET['type'] != '') {
    $type = get_safe_value($con, $_GET['type']);
    if ($type == 'status') {
        $operation = get_safe_value($con, $_GET['operation']);
        $oid = get_safe_value($con, $_GET['id']);
        $uid = get_safe_value($con, $_GET['uid']);
        if ($operation == 'active') {
            $status = '1';

        } else {
            $status = '0';
        }
        $update_status_sql = "update orders set isDelivered='$status' where oid='$oid'";
        

        mysqli_query($con, $update_status_sql);
    }
}

$sql="select orders.oid, delivery.name, orders.uid, delivery.mobile, delivery.address, orders.paymentType, orders.total, orders.isDelivered, orders.uniqueID, orders.uid, orders.added_on from delivery, orders where delivery.uniqueId=orders.uniqueId and orders.status = 1 order by oid desc;";
$res=mysqli_query($con,$sql);
?>
 <!-- Page content start -->
 <div class="page-content " id="content">
        <div class=" bg-light pt-3 pb-1">
            <h1 class="mx-5 text-center text-muted">Orders</h1>
        </div>
      
        
        <div class="row ml-4">
        <div class="col-lg-12">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">OID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Mobile</th>
                        <th scope="col">Addrress</th>
                        <th scope="col">payment type</th>
                        <th scope="col">Status</th>
                        <th scope="col">Total Amount</th>
                        <th scope="col">Detail</th>
                        <th scope="col">Order on</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
							$i=1;
							while($row=mysqli_fetch_assoc($res)){?>
							<tr>
							   <td><?php echo $row['oid']?></td>
							   <td><?php echo $row['name']?></td>
							   <td><?php echo $row['mobile']?></td>
							   <td><?php echo $row['address']?></td>
							   <td><?php echo $row['paymentType']?></td>
							   <td>
                               <?php
                               if ($row['isDelivered'] == 1) {
                                    echo "<a class='btn btn-success'  href='?type=status&operation=deactive&id=" . $row['oid']."&uid=". $row['uid'] ."'>Delivered</a>&nbsp;";
                                } else {
                                    echo "<a class='btn btn-secondary' href='?type=status&operation=active&id=" . $row['oid'] ."&uid=". $row['uid'] . "'>Not Delivered</a>&nbsp;";
                                }
                                ?>
                               </td>
							   <td><?php echo $row['total']?></td>
							   <td>
                               <a class="btn btn-outline-primary" href="detail.php?uniqueID=<?php echo $row['uniqueID']; ?>&id=<?php echo $row['uid'] ?>" role="button">Detail</a>
                               </td>
							   <td><?php echo $row['added_on']?></td>
							   
							</tr>
							<?php } ?>
                </tbody>
            </table>
        </div>
        </div>

    </div>
    <!--page content End  -->

<?php
require('footer.php');
?>