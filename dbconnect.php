<?php
$serverName = "localhost";
$userName = "root";
$password = "";
$dbName = "koshisale";

//creating connection
$con = mysqli_connect($serverName, $userName, $password, $dbName);



define('SERVER_PATH', $_SERVER['DOCUMENT_ROOT'] . '/koshisale');
define('SITE_PATH', 'http://127.0.0.1/koshisale/');

define('PRODUCT_IMAGE_SERVER_PATH', SERVER_PATH . 'media/product/');
define('PRODUCT_IMAGE_SITE_PATH', SITE_PATH . 'media/product/');



?>