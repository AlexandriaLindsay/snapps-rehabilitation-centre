<?php

  require_once __DIR__ . '/../../configsnapps.php';

  $title = 'products';

   if(isset($_GET['product'])) {
    $clean = getDetail($dbh, $_GET['product']);

    }

    $results = getProducts($dbh);


    $dbh = getConnect();

    if(isset($_GET['deleted']) && !empty($_GET['product'])) {

      deleteItem($dbh, $_GET['product']);
    }  

    $results = getProducts($dbh);

  include('includes/header.php');
?>

    <div class="col-sm-8 text-left"> 
      <h1>Products</h1>

      <table>

        <th></th>
        <th>Name</th>
        <th>Category</th>
        <th>Price</th>
        <?php foreach($results as $row) : ?>
          <tr>
            <td><img src="images/<?=$row['image']?>" alt="<?=$row['name']?>" /></td>
            <td><?=$row['name']?></td>
            <td><?=$row['category']?></td>
            <td><?=$row['price']?></td>
            <td><a class="edit" href="edit_product.php?product=<?=$row['id']?>">Edit</a></td>
            <td><a class="delete" name="id" href="admin_products.php?deleted=1&product=<?=$row['id']?>">Remove</a></td>
          </tr>
        <?php endforeach; ?>
      </table>
     
      <hr>
    
    </div>
 <?php include('includes/footer.php'); ?>
