<?php
  
  require_once __DIR__ . '/../configsnapps.php';


  $title = 'products';

  if(isset($_GET['products'])) {
    $detail = getDetail($dbh, $_GET['products']);

  }


$results = getProducts($dbh);


  include('includes/header.php');
?>

    <div id="snav">
      <ul class="sidenav">
        <li><a href="products.php?cat=food">Food</a></li>
        <li><a href="products.php?cat=accessories">Accessories</a></li>
        <li><a href="products.php?cat=habitat and decor">Habitat &amp; Decor</a></li>
        <li><a href="products.php?cat=substrate and bedding">Substrate &amp; Bedding</a></li>
        <li><a href="products.php?cat=lights and fixtures">Lights &amp; Fixtures</a></li>
        <li><a href="products.php?cat=vitamins and supplements">Vitamins &amp; Supplements</a></li>
        <li><a href="products.php?cat=sanitizers">Sanitizers</a></li>
        <li><a href="products.php?cat=heaters">Heaters</a></li>
        <li><a href="products.php?cat=terrariums">Terrariums</a></li>
        <li><a href="products.php?cat=humidity and temperature control">Humidity &amp; Temperature Control</a></li>
      </ul>
    </div>

  <div id="wrapper">
      
      <!-- Start of main content -->
      <main>
        
        <h1><?=$title?></h1>

        
        <div id="innerborder">

        <?php if(isset($detail)) : ?>

         <div class="detail detail_name">
           <h2><?=$detail['name']?></h2>
         </div>

        <div class="detail_image">
          <img src="images/<?=$detail['image']?>"/>
        </div>

        <div class="detail detail_category"> 
          <p><strong>Category: </strong><?=$detail['category']?></p>
        </div>

        <div class="detail detail_brand">  
          <p><strong>Brand: </strong><?=$detail['brand']?></p>
        </div>

        <div class="detail detail_price"> 
          <p><strong>Price: </strong><?=$detail['price']?></p>
        </div>

        <div class="detail detail_shipping"> 
          <p><strong>Shipping: </strong><?=$detail['shipping_cost']?></p>
        </div>

        <div class="detail detail_short"> 
          <p><strong>Description: </strong><?=$detail['short_description']?></p>
        </div>

        <div class="detail detail_long">
          <p><strong>Detailed Description: </strong><?=$detail['long_description']?></p>
        </div>

        <form action="products.php" method="post">
          <input type="hidden" name="id" value="<?=$detail['id']?>" />
          <input class="cart" type="submit" name="add_to_cart" value="add to cart" />
        </form>
        

      <?php else : ?>


       <table>
       
         <tr>
           <th></th>
           <th>Name</th>
           <th>Category</th>
           <th>Price</th>
         </tr>

         <?php foreach($results as $row): ?>
           <tr>
             <td class="cover"><a href="products.php?products=<?=$row['id']?>"><img src="images/<?=$row['image']?>" alt="<?=$row['name']?>" /></a></td>
             <td><?=$row['name']?></td>
             <td><?=$row['category']?></td>
             <td class="price"><?=$row['price']?></td>
             <td></td>
           </tr>
         <?php endforeach; ?>
       </table>
      <?php endif; ?>


        </div>



<?php
  include('includes/footer.php');
?>
        <div class="cart">
           <?php if(count($_SESSION['cart']) == 0) : ?>

             <p>Your cart is empty</p>

           <?php else : ?>
           <?php echo 'You have ' . count($_SESSION['cart']) . ' in your cart'?>
           <form action="checkout.php" method="post">
             <input id="checkout" type="submit" value="Checkout" />
           </form>
          <?php endif; ?>
        </div>
