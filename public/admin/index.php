<?php

  require_once __DIR__ . '/../../configsnapps.php';

  $title = 'dashboard';

  $dbh = getConnect();

  $results = getProducts($dbh);

  $number_products = numberProducts($dbh);
  $highest_product = highestProduct($dbh);
  $lowest_product = lowestProduct($dbh);
  $number_orders = numberOrders($dbh);
  $highest_order = highestOrders($dbh);
  $latest_order = latestOrder($dbh);
  $total_customers = totalCustomers($dbh);
  $latest_customer = latestCustomer($dbh);
  $latest_customer = latestCustomer($dbh);
  $total_line_items = numberLineItems($dbh);
  $highest_line_item = highestLineItems($dbh);
  $lowest_line_item = lowestLineItems($dbh);

  include('includes/header.php');
?>

    <div class="col-sm-8 text-left"> 
      <h1>Dashboard</h1>

      <h2>Summary</h2>

      <table class="products">

        <tr>
          <th>Products Details</th>
        </tr>

        <tr>
          <td>Number of Products</td>
          <td>Highest Product Price</td>
          <td>Lowest Product Price</td>
        </tr>
        
        <tr>
          <?php foreach($number_products as $row) : ?>
            <td><?=$row['name']?></td>
          <?php endforeach; ?>

      
          <?php foreach($highest_product as $row) : ?>
            <td>$<?=$row['price']?></td>
          <?php endforeach; ?>

          <?php foreach($lowest_product as $row) : ?>
            <td>$<?=$row['price']?></td>
          <?php endforeach; ?>
        </tr>

      </table>

      <table class="orders">

        <tr>
          <th>Order Details</th>
        </tr>

        <tr>
          <td>Number of Orders</td>
          <td>Highest Price of Orders</td>
          <td>Latest Order Created</td>
        </tr>

        <tr>
          <?php foreach($number_orders as $row) : ?>
            <td><?=$row['name']?></td>
          <?php endforeach; ?>

          <?php foreach($highest_order as $row) : ?>
            <td>$<?=$row['total']?></td>
          <?php endforeach; ?>

          <?php foreach($latest_order as $row) : ?>
            <td><?=$row['created_at']?></td>
          <?php endforeach; ?>
        </tr>

      </table>

      <table class="customers">

        <tr>
          <th>Customer Details</th>
        </tr>

        <tr>
          <td>Total Number of customers</td>
          <td>Latest Registered Customer</td>
        </tr>

        <tr>
          <?php foreach($total_customers as $row) : ?>
            <td><?=$row['first_name']?></td>
          <?php endforeach; ?>

          <?php foreach($latest_customer as $row) : ?>
            <td><?=$row['created_at']?></td>
          <?php endforeach; ?>
        </tr>

      </table>

      <table class=" line_items">

        <tr>
          <th>Line Item Details</th>
        </tr>

        <tr>
          <td>Number of Line Items</td>
          <td>Highest Price of Line Items</td>
          <td>Lowest Price of Line Items</td>
        <tr>

        <tr>
          <?php foreach($total_line_items as $row) : ?>
            <td><?=$row['product_name']?></td>
          <?php endforeach; ?>

          <?php foreach($highest_line_item as $row) : ?>
            <td>$<?=$row['unit_price']?></td>
          <?php endforeach; ?>

            <?php foreach($lowest_line_item as $row) : ?>
              <td>$<?=$row['unit_price']?></td>
            <?php endforeach; ?>
        </tr>
      </table>

    </div>
    
<?php include('includes/footer.php'); ?>
