<?php
require('connection.inc.php');
require('functions.inc.php');
if(isset($_SESSION['ADMIN_LOGIN']) && $_SESSION['ADMIN_LOGIN']!=''){

}else{
	header('location:login.php');
	die();
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="full bg-primary" >
        <button id="sidebarCollapse" type="button" class="btn btn-light bg-white rounded-pill shadow-sm px-4 mb-4"><i
                class="fa fa-bars mr-2"></i><small class="text-uppercase font-weight-bold"></small></button>

        <h4 class="p-3 text-center text-white ">Admin Dashboard</h4>
    </div>
    <!-- Vertical navbar -->
    <div class="vertical-nav bg-white" id="sidebar" style=" height:100%;">
        <div class="py-4 px-3 mb-4 bg-light">
            <div class="media d-flex align-items-center">
                <div class="media-body">
                    <h4 class="m-0">Control Pannel</h4>
                </div>
            </div>
        </div>

        <p class="text-gray font-weight-bold text-uppercase px-3 small pb-4 mb-0">Admin Dashboard</p>

        <ul class="nav flex-column bg-white mb-0">
            <li class="nav-item">
                <a href="categories.php" class="nav-link text-dark bg-light">
                    <i class="fab fa-cuttlefish  mr-3 text-primary"></i> Categories master
                </a>
            </li>
            <li class="nav-item">
                <a href="product.php" class="nav-link text-dark">
                    <i class="fab fa-product-hunt mr-3 text-primary"></i> Product Master

                </a>
            </li>
            <li class="nav-item">
                <a href="order.php" class="nav-link text-dark bg-light">
                    <i class="fas fa-shopping-cart mr-3 text-primary"></i> Order
                </a>
            </li>
            <li class="nav-item">
                <a href="users.php" class="nav-link text-dark">
                    <i class="fas fa-user-friends mr-3 text-primary"></i>Client users

                </a>
            </li>
            <li class="nav-item">
                <a href="logout.php" class="nav-link text-dark bg-light">
                    <i class="fas fa-user-lock  mr-3 text-primary"></i>Admin logout
                </a>
            </li>
            <li class="nav-item">
                <a href="contact.php" class="nav-link text-dark">
                    <i class="fas fa-comments mr-3 text-primary"></i> </i>Contact us
                </a>
            </li>

        </ul>


    </div>
    <!-- End vertical navbar -->
