<?php
  
  require_once __DIR__ . '/../configsnapps.php';

  $title = 'checkout';

  $sub_total = getTotal();
  $gst = $sub_total * GST;
  $pst = $sub_total * PST;
  $final_total = $sub_total + $gst + $pst;
  
  include('includes/header.php');


?>

  <div id="wrapper">
      
      <!-- Start of main content -->
        
        <h1><?=$title?></h1>
        <?php if($_SESSION['logged_in'] == false) : ?>
          <?php header('Location: login.php'); ?>
        <?php else : ?>

        
        <div id="innerborder">

        <?php if(empty($_SESSION['cart'])) : ?>

          <main class="empty_cart">
            <h2>Your cart is currently empty</h2>
          </main>

        <?php else : ?>

        <table class="checkout">

          <th></th>
          <th>Name</th>
          <th>Price</th>

          <?php foreach($_SESSION['cart'] as $item): ?>
            <tr>
              <td><img class="checkout" src="images/<?=$item['image']?>"/></td>
              <td><?=$item['name']?></td>
              <td class="price"><?=$item['price']?></td>
              <td>
                <form action="checkout.php" method="post">
                  <input type="hidden" name="delete_from_cart" value="<?=$item['id']?>" />
                  <input class="cart_delete" type="submit" value="Remove" />
                </form>
              </td>
            </tr>
          <?php endforeach; ?>
        </table>

        <table id="total">

        <tr>
          <th class="total">Subtotal(CA):</th>
          <td class="total"><?=$sub_total?></td>
        </tr>

        <tr>
          <th class="total">GST:</th>
          <td class="total"><?=number_format((float)$gst, 2)?></td>
        </tr>

        <tr>
          <th class="total">PST:</th>
          <td class="total"><?=number_format((float)$pst, 2)?></td>
        </tr>

        <tr>
          <th class="total">Total:</th>
          <td class="total"><?=number_format((float)$final_total, 2)?></td>
        </tr>
    
      </table>

      <a id="payment" href="payment_details.php">Confirm Order</a>

        <?php endif; ?>
        <?php endif; ?>

  


        </div>

        </div>



<?php
  include('includes/footer.php');
?>
      