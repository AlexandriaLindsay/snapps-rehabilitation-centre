<?php

  require_once __DIR__ . '/../../configsnapps.php';

  $title = 'add a product';

  use Alex\Validator;
  
  $v = new Validator();

  $clean = $v->getClean();
  $errors = $v->getErrors();
  $completed = false;

  if($_SERVER['REQUEST_METHOD'] == 'POST') {

    $v->required('sku');
    $v->required('name');
    $v->required('short_description');
    $v->required('long_description');
    $v->required('image');
    $v->required('price');
    $v->required('cost');
    $v->required('shipping_cost');
    $v->required('shipping_weight');
    $v->required('product_dimensions');
    $v->required('discount');
    $v->required('availibility');
    $v->required('quantity_remaining');
    $v->required('quantity_sold');
    $v->required('supplier');
    $v->required('category');
    $v->required('brand');
    $v->required('upc');
    $v->required('rating');

    $errors = $v->getErrors();

    if(count($errors) == 0) {
      $completed = true;
    
    
      try {

        $dbh = getConnect();

        $query = "INSERT
                  INTO
                  products
                  (sku, name, short_description, long_description, image, price, cost, shipping_cost, shipping_weight, product_dimensions, discount, availibility, quantity_remaining, quantity_sold, supplier, category, brand, upc, rating)
                  VALUES
                  (:sku, :name, :short_description, :long_description, :image, :price, :cost, :shipping_cost, :shipping_weight, :product_dimensions, :discount, :availibility, :quantity_remaining, :quantity_sold, :supplier, :category, :brand, :upc, :rating)";

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
        ];


        $stmt = $dbh->prepare($query);

        $stmt->execute($params);


      } catch(Exception $e) {
          echo $e->getMessage();
        }
    }
  }

include('includes/header.php');

?>


    <div class="col-sm-8 text-left"> 
      <h1>Add a New Product</h1>

      <?php if(!$completed) : ?>

      <form action="add_product.php" method="post">
        
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
          <input type="submit" value="Submit Product" />
        <p>

        </p>

      </form>

      <div class="error">
        <?php if(isset($errors['sku'])){
          echo $errors['sku'];
        }
        ?><br />
   
        <?php if(isset($errors['name'])){
          echo $errors['name'];
        }
        ?><br />
   
        <?php if(isset($errors['short_description'])){
          echo str_replace('_', ' ', $errors['short_description']);
        }
        ?><br />

        <?php if(isset($errors['long_description'])){
          echo str_replace('_', ' ', $errors['long_description']);
        }
        ?><br />

        <?php if(isset($errors['image'])){
          echo $errors['image'];
        }
        ?><br />

        <?php if(isset($errors['price'])){
          echo $errors['price'];
        }
        ?><br />

        <?php if(isset($errors['cost'])){
          echo $errors['cost'];
        }
        ?><br />

        <?php if(isset($errors['shipping_cost'])){
          echo str_replace('_', ' ', $errors['shipping_cost']);
        }
        ?><br />

        <?php if(isset($errors['shipping_weight'])){
          echo str_replace('_', ' ', $errors['shipping_weight']);
        }
        ?><br />

        <?php if(isset($errors['product_dimensions'])){
          echo str_replace('_', ' ', $errors['product_dimensions']);
        }
        ?><br />

        <?php if(isset($errors['discount'])){
          echo $errors['discount'];
        }
        ?><br />

        <?php if(isset($errors['availibility'])){
          echo $errors['availibility'];
        }
        ?><br />

        <?php if(isset($errors['quantity_remaining'])){
          echo str_replace('_', ' ', $errors['quantity_remaining']);
        }
        ?><br />

        <?php if(isset($errors['quantity_sold'])){
          echo str_replace('_', ' ', $errors['quantity_sold']);
        }
        ?><br />

        <?php if(isset($errors['supplier'])){
          echo $errors['supplier'];
        }
        ?><br />

        <?php if(isset($errors['category'])){
          echo $errors['category'];
        }
        ?><br />

        <?php if(isset($errors['brand'])){
          echo $errors['brand'];
        }
        ?><br />

        <?php if(isset($errors['upc'])){
          echo $errors['upc'];
        }
        ?><br />

        <?php if(isset($errors['rating'])){
          echo $errors['rating'];
        }
        ?>

      </div>
    <?php else : ?>
      <h2>New Product Was Successfully Added</h2>
    <?php endif; ?>
     
      <hr>
    
    </div>
    
    <?php include('includes/footer.php'); ?>
