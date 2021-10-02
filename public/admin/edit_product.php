<?php

  require_once __DIR__ . '/../../configsnapps.php';

  $title = 'edit product';

  use Alex\Validator;
  
  $v = new Validator();

  $clean = $v->getClean();
  $errors = $v->getErrors();

   if(isset($_GET['product'])) {
    $clean = getDetail($dbh, $_GET['product']);

    }

   if($_SERVER['REQUEST_METHOD'] == 'POST') {

    
    try {

      $dbh = getConnect();

      $query = "UPDATE
                products
                SET
                sku = :sku, 
                name = :name, 
                short_description = :short_description, 
                long_description = :long_description, 
                image = :image, 
                price = :price, 
                cost = :cost, 
                shipping_cost = :shipping_cost, 
                shipping_weight = :shipping_weight, 
                product_dimensions = :product_dimensions, 
                discount = :discount, 
                availibility = :availibility, 
                quantity_remaining = :quantity_remaining, 
                quantity_sold = :quantity_sold, 
                supplier = :supplier, 
                category = :category, 
                brand = :brand, 
                upc = :upc, 
                rating = :rating
                WHERE
                id = :id";

      $params = [
        ':sku' => $_POST['sku'],
        ':name' => $_POST['name'],
        ':short_description' => $_POST['short_description'],
        ':long_description' => $_POST['long_description'],
        ':image' => $_POST['image'],
        ':price' => $_POST['price'],
        ':cost' => $_POST['cost'],
        ':shipping_cost' => $_POST['shipping_cost'],
        ':shipping_weight' => $_POST['shipping_weight'],
        ':product_dimensions' => $_POST['product_dimensions'],
        ':discount' => $_POST['discount'],
        ':availibility' => $_POST['availibility'],
        ':quantity_remaining' => $_POST['quantity_remaining'],
        ':quantity_sold' => $_POST['quantity_sold'],
        ':supplier' => $_POST['supplier'],
        ':category' => $_POST['category'],
        ':brand' => $_POST['brand'],
        ':upc' => $_POST['upc'],
        ':rating' => $_POST['rating'],
        ':id' => $_POST['id']
      ];


      $stmt = $dbh->prepare($query);

      $stmt->execute($params);

      if($stmt->execute($params)) {
        header('Location: admin_products.php');
      }


    } catch(Exception $e) {
        echo $e->getMessage();
      }

  }

  include('includes/header.php');
?>

    <div class="col-sm-8 text-left"> 
      <h1>Edit Product</h1>

      <form action="edit_product.php" method="post">
        
        <p>
          <label for="sku" name="sku">Sku:</label>
          <input type="text" name="sku" value="<?php 
        echo (isset($clean['sku'])) ? $clean['sku'] : ''; ?>" />
        </p>

        <p>
          <label for="name" name="name">Name:</label>
          <input type="text" name="name" value="<?php 
        echo (isset($clean['name'])) ? $clean['name'] : ''; ?>" />
        </p>

        <p>
          <label for="short_description" name="short_description">Short Description:</label>
          <input type="text" name="short_description" value="<?php 
        echo (isset($clean['short_description'])) ? $clean['short_description'] : ''; ?>" />
        </p>

        <p>
          <label for="long_description" name="long_description">Long Description:</label>
          <input type="text" name="long_description" value="<?php 
        echo (isset($clean['long_description'])) ? $clean['long_description'] : ''; ?>" />
        </p>

        <p>
          <label for="image" name="image">Image:</label>
          <input type="text" name="image" value="<?php 
        echo (isset($clean['image'])) ? $clean['image'] : ''; ?>" />
        </p>

        <p>
          <label for="price" name="price">Price:</label>
          <input type="text" name="price" value="<?php 
        echo (isset($clean['price'])) ? $clean['price'] : ''; ?>" />
        </p>

        <p>
          <label for="cost" name="cost">Cost:</label>
          <input type="text" name="cost" value="<?php 
        echo (isset($clean['cost'])) ? $clean['cost'] : ''; ?>" />
        </p>

        <p>
          <label for="shipping_cost" name="shipping_cost">Shipping Cost:</label>
          <input type="text" name="shipping_cost" value="<?php 
        echo (isset($clean['shipping_cost'])) ? $clean['shipping_cost'] : ''; ?>" />
        </p>

        <p>
          <label for="shipping_weight" name="shipping_weight">Shipping Weight:</label>
          <input type="text" name="shipping_weight" value="<?php 
        echo (isset($clean['shipping_weight'])) ? $clean['shipping_weight'] : ''; ?>" />
        </p>

        <p>
          <label for="product_dimensions" name="product_dimensions">Product Dimensions:</label>
          <input type="text" name="product_dimensions" value="<?php 
        echo (isset($clean['product_dimensions'])) ? $clean['product_dimensions'] : ''; ?>" />
        </p>

        <p>
          <label for="discount" name="discount">Discount:</label>
          <input type="text" name="discount" value="<?php 
        echo (isset($clean['first_name'])) ? $clean['first_name'] : ''; ?>" />
        </p>

        <p>
          <label for="availibility" name="availibility">Availibility:</label>
          <input type="text" name="availibility" value="<?php 
        echo (isset($clean['availibility'])) ? $clean['availibility'] : ''; ?>" />
        </p>

        <p>
          <label for="quantity_remaining" name="quantity_remaining">Quantity Remaining:</label>
          <input type="text" name="quantity_remaining" value="<?php 
        echo (isset($clean['quantity_remaining'])) ? $clean['quantity_remaining'] : ''; ?>" />
        </p>

        <p>
          <label for="quantity_sold" name="quantity_sold">Quantity Sold:</label>
          <input type="text" name="quantity_sold" value="<?php 
        echo (isset($clean['quantity_sold'])) ? $clean['quantity_sold'] : ''; ?>" />
        </p>

        <p>
          <label for="supplier" name="supplier">Supplier:</label>
          <input type="text" name="supplier" value="<?php 
        echo (isset($clean['supplier'])) ? $clean['supplier'] : ''; ?>" />
        </p>

        <p>
          <label for="category" name="category">Category:</label>
          <input type="text" name="category" value="<?php 
        echo (isset($clean['category'])) ? $clean['category'] : ''; ?>" />
        </p>

        <p>
          <label for="brand" name="brand">Brand:</label>
          <input type="text" name="brand" value="<?php 
        echo (isset($clean['brand'])) ? $clean['brand'] : ''; ?>" />
        </p>

        <p>
          <label for="upc" name="upc">UPC:</label>
          <input type="text" name="upc" value="<?php 
        echo (isset($clean['upc'])) ? $clean['upc'] : ''; ?>" />
        </p>

        <p>
          <label for="rating" name="rating">Rating:</label>
          <input type="text" name="rating" value="<?php 
        echo (isset($clean['rating'])) ? $clean['rating'] : ''; ?>" />
        </p>

        <p>
          <input type="submit" value="Save Changes" />
          <input type="hidden" name="id" value="<?php 
        echo (isset($clean['id'])) ? $clean['id'] : ''; ?>" />
        </p>


      </form>
     
      <hr>
    
    </div>
    <?php include('includes/footer.php'); ?>
