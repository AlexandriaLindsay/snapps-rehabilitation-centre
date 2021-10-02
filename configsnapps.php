<?php

//Config file

session_start();


if(isset($_GET['logout'])) {
	session_destroy();
	header('Location: login.php');
	die();
}

ob_start();


// Display Errors
ini_set('error_reporting',E_ALL);
ini_set('display_errors',1);

//MySQL Connection Contstants

define('DB_DSN','mysql:host=localhost;dbname=capstone_alex');
define('DB_NAME','capstone_alex');
define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS','Alexia888');
define('GST',.05);
define('PST',.08);

require_once('form_functions.php');
require_once('Alex/Validator.php');

$dbh = getConnect();

// Session cart
if(!isset($_SESSION['cart'])) {
	$_SESSION['cart'] = [];

}

if(isset($_POST['add_to_cart'])) {


	$products = getDetail($dbh, $_POST['id']);

	$item = [];

    $item['id'] = $products['id'];
    $item['image'] = $products['image'];
  	$item['name'] = $products['name'];
    $item['price'] = $products['price'];


    $_SESSION['cart'][$products['id']] = $item;

}

 if(isset($_GET['delete_from_cart'])) {
    $id = intval($_GET['delete_from_cart']);
    unset($_SESSION['cart'][$id]);
  }

  if(isset($_POST['delete_from_cart'])) {
    $id = intval($_POST['delete_from_cart']);
    unset($_SESSION['cart'][$id]);
  }
