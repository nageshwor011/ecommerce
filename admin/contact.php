<?php
require('top.php');

if(isset($_GET['type']) && $_GET['type']!=''){
	$type=get_safe_value($con,$_GET['type']);
	if($type=='delete'){
		$id=get_safe_value($con,$_GET['id']);
		$delete_sql="delete from contact_us where id='$id'";
		mysqli_query($con,$delete_sql);
	}
}

$sql="select * from contact_us order by id desc";
$res=mysqli_query($con,$sql);
?>
 <!-- Page content start -->
 <div class="page-content " id="content">
        <div class=" bg-light pt-3 pb-1">
            <h1 class="mx-5 text-center text-muted">Contact us</h1>
        </div>
        <div class="row ml-4">
        <div class="col-lg-12">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Mobile</th>
                        <th scope="col">Query</th>
                        <th scope="col">Date</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
							$i=1;
							while($row=mysqli_fetch_assoc($res)){?>
							<tr>
							   <td><?php echo $row['id']?></td>
							   <td><?php echo $row['name']?></td>
							   <td><?php echo $row['email']?></td>
							   <td><?php echo $row['mobile']?></td>
							   <td><?php echo $row['comment']?></td>
							   <td><?php echo $row['added_on']?></td>
							   <td>
								<?php
								echo "<a class='btn btn-danger' href='?type=delete&id=".$row['id']."'>Delete</a>";
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

<?php
require('footer.php');
?>