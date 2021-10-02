<!DOCTYPE html>
<html lang="en">
<head>
  <title><?=$title?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <!-- If the title is add a product then this stylesheet will load -->
  <?php if($title == 'add a product') : ?>
    <link type="text/css" rel="stylesheet" href="styles/add_products.css">
  <?php endif; ?>

  <!-- If the title is products then this stylesheet will load -->
  <?php if($title == 'products') : ?>
    <link type="text/css" rel="stylesheet" href="styles/admin_products.css">
  <?php endif; ?>

  <!-- If the title is customers then this stylesheet will load -->
  <?php if($title == 'customers') : ?>
    <link type="text/css" rel="stylesheet" href="styles/customers.css">
  <?php endif; ?>

  <!-- If the title is edit product then this stylesheet will load -->
  <?php if($title == 'edit product') : ?>
    <link type="text/css" rel="stylesheet" href="styles/edit_product.css">
  <?php endif; ?>

  <!-- If the title is dashboard then this stylesheet will load -->
  <?php if($title == 'dashboard') : ?>
    <link type="text/css" rel="stylesheet" href="styles/index.css">
  <?php endif; ?>

  <!-- If the title is orders then this stylesheet will load -->
  <?php if($title == 'orders') : ?>
    <link type="text/css" rel="stylesheet" href="styles/orders.css">
  <?php endif; ?>

</head>

<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="index.php">Home</a></li>
        <li><a href="#">Profile</a></li>
        <li><a href="add_product.php">Add Product</a></li>
      </ul>
      <div class="product_search">
        <form class="form" action="admin_products.php" method="get">
          <input class="search_prod" type="text" name="q" placeholder="Search Products" />&nbsp;
          <input type="submit" value="Search" />
        </form>
      </div>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="../login.php?logout=1"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
      </ul>
    </div>
  </div>
</nav>
  
<div class="container-fluid text-center">    
  <div class="row content">
    <div class="col-sm-2 sidenav">
      <p><a href="customers.php">Customers</a></p>
      <p><a href="admin_products.php">Products</a></p>
      <p><a href="orders.php">Orders</a></p>
    </div>