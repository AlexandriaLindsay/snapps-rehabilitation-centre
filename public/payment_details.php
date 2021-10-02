<?php
  
  require_once __DIR__ . '/../configsnapps.php';

  $title = 'payment details';

  use Alex\Validator;
  
  $v = new Validator();

  $errors = $v->getErrors();
  $clean = $v->getClean();
  $completed = false;


  if($_SERVER['REQUEST_METHOD'] == 'POST') {

    $v->required('card_name');
    $v->required('card_number');
    $v->required('expiry_date');
    $v->required('cvv2'); 

    $errors = $v->getErrors();

    if(count($errors) == 0) {
      $completed = true;
    }


  } 

  include('includes/header.php');


?>

  <div id="wrapper">
      
      <!-- Start of main content -->
      <main>
        <?php if(!$completed) : ?>
        
        <h1><?=$title?></h1>

        
        <div id="innerborder">

          <form action="payment_details.php" method="post" novalidate>
            
            <p>
              <label for="card_name" name="card_name">Name on Card:</label>
              <input id="card_name" type="text" name="card_name" value="<?php 
        echo (isset($clean['card_name'])) ? $clean['card_name'] : ''; ?>" />
            </p>

            <p>
              <label for="card_number" name="card_number">Credit Card Number:</label>
              <input id="card_number" type="text" name="card_number" value="<?php 
        echo (isset($clean['card_number'])) ? $clean['card_number'] : ''; ?>" />
            </p>

            <div id="credit">

              <img 
                src="images/visa.png"
                id="visa"
                width="64"
                height="64"
                alt="Visa Card Icon"
              />

              <img 
                src="images/mastercard.png"
                id="masterC"
                width="64"
                height="64"
                alt="Mastercard Icon"
              />

            </div>

            <p>
              <label for="expiry_date" name="expiry_date">Expiry Date:</label>
              <input id="expiry_date" type="text" name="expiry_date" value="<?php 
        echo (isset($clean['expiry_date'])) ? $clean['expiry_date'] : ''; ?>" />
            </p>

            <p>
              <label for="cvv2" name="cvv2">CVV2 Number:</label>
              <input id="cvv2" type="text" name="cvv2" value="<?php 
        echo (isset($clean['cvv2'])) ? $clean['cvv2'] : ''; ?>" />
            </p>

            <p>
              <input id="submit_order" type="submit" value="Submit Order" />
            </p>

               <div class="error">
              <?php if(isset($errors['card_name'])){
                echo str_replace('_', ' ', $errors['card_name']);
              }
              ?><br />
         
              <?php if(isset($errors['card_number'])){
                echo str_replace('_', ' ', $errors['card_number']);
              }
              ?><br />
         
              <?php if(isset($errors['expiry_date'])){
                echo str_replace('_', ' ', $errors['expiry_date']);
              }
              ?><br />
         
              <?php if(isset($errors['cvv2'])){
                echo $errors['cvv2'];
              }
              ?>
         </div>
      
          </form>
          <?php else : ?>
            <?php header('Location: invoice.php'); ?>
            <?php die(); ?>
      <?php endif; ?>
        

         </div>
        </main>

        </div>
      
        



<?php
  include('includes/footer.php');
?>