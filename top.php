<!DOCTYPE html>
<?php include 'dbconnect.php'; 
session_start();


?>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
  <script src="https://khalti.s3.ap-south-1.amazonaws.com/KPG/dist/2020.12.17.0.0.0/khalti-checkout.iffe.js"></script>

  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
  <link rel="stylesheet" href="css/mystyle.css">
  <title>Document</title>
  <style>


  </style>
</head>

<body>
  <header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="index.php"><img src="images/logo/koshi.png" class="koshilogo" alt="logo images"></a>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" id="home" href="index.php">Home <span class="sr-only"></span></a>
          </li>

          <?php
          $query = "select * from categories where status=1 order by categories asc;";
          $queryfire = mysqli_query($con, $query);
          $num = mysqli_num_rows($queryfire);

          if ($num > 0) {
            while ($navlink = mysqli_fetch_array($queryfire)) {

          ?>
              <li class="nav-item ">
                <a class="nav-link text-capitalize" id="nav" href="categories.php?id=<?php echo $navlink['id'] ?>"><?php echo $navlink['categories'] ?> <span class="sr-only"></span></a>
              </li>
          <?php
            }
          } ?>
          <li class="nav-item"><a class="nav-link text-capitalize" href=" contact.php">contact</a></li>
        </ul>

        <form class="form-inline my-2 my-lg-0" action="search.php" method="GET">
            <li class="nav-item dropdown me-2 mb-3" style="list-style: none; margin-top: 17px;">
              <a href="" class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user"></i></a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                
                <?php
               
               if (!isset($_SESSION['user'])) { // session
               
                ?>
                <a class="hovermuted  dropdown-item" href="http://localhost/koshisale/login.php">Sign in</a>
                <a class="hovermuted  dropdown-item" href="http://localhost/koshisale/signup.php">Sign up</a>

               <?php
               
              } else {
                ?>
                <a class="hovermuted  dropdown-item" href="http://localhost/koshisale/logout.php">Sign out</a>
                <a class="hovermuted  dropdown-item" href="http://localhost/koshisale/profile.php"><?php echo $_SESSION['user'];?></a>
                <?php
              }
                ?>
              </div>
            </li>
          <div class=" nav-item mr-5 mb">
              <a href="cart.php"><i class="far fa-shopping-bag mybag"></i></a>
            </div>
          <input class="form-control mr-sm-2 mt-4" type="search" required name="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
      </div>
    </nav>
  </header>
  

  <!-- end of top php -->