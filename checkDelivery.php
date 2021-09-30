<?php
if (isset($_GET['change'])) {
} else {
    ?>
   
    <?php
    $userQuerry = "select * from delivery where uid = '$uid' and ispaid =0";
    $querry = mysqli_query($con, $userQuerry); //checking in database email is repeated or not through query
    $userCount = mysqli_num_rows($querry); // this function count the number of rows it retten number

    if ($userCount > 0) {
        mysqli_query($con, "update delivery set name='$uName', mobile ='$uMobile', address='$uAddress' where uid='$uid' and ispaid=0");
    } else {
        mysqli_query($con, "insert into delivery(uid, name, mobile, address) values('$uid', '$uName', '$uMobile', '$uAddress')");
    }
}
