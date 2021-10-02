<?php
  
  require_once __DIR__ . '/../configsnapps.php';
  
  use Alex\Validator;
  
  $v = new Validator();
  
  $title = 'Registration Form';
  
  $errors = $v->getErrors();
  $clean = $v->getClean();
  $completed = false;  
  
  // test for a post submission
  if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $street_1 = $_POST['street_1'];
    $city = $_POST['city'];
    $postal_code = $_POST['postal_code'];
    $province = $_POST['province'];
    $country = $_POST['country'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Check if fields are empty
    $v->required('first_name');
    $v->required('last_name');
    $v->required('street_1');
    $v->required('city');
    $v->required('postal_code');
    $v->required('province');
    $v->required('country');
    $v->required('phone');
    $v->required('email');
    $v->required('password');
    $v->required('confirm_password');


    // Check for a valid email
    $v->email('email');

    // Check for a valid password
    $v->validPass('password');
    // Check if passwords match
    $v->confirmPass('password', 'confirm_password', $errors);
    // Check if postal code is valid
    $v->postal('postal_code');
    // Check if phone number is valid
    $v->validPhone('phone');
    
    $errors = $v->getErrors();
    $clean = $v->getClean();


    
  
    // If there are no errors then the form will be completed & submitted to the database
    if(count($errors) == 0){
    
      $completed = true;
      
      try {
      
        $dbh = new PDO(DB_DSN, DB_USER, DB_PASS);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $query = "INSERT 
                  INTO 
                  customers
                  (first_name, last_name, street_1, street_2, city, postal_code, province, country, phone, email, password)
                  VALUES
                  (:first_name, :last_name, :street_1, :street_2, :city, :postal_code, :province, :country, :phone, :email, :password)";
        
        $param = [
        
          ':first_name' => $_POST['first_name'],
          ':last_name' => $_POST['last_name'],
          ':street_1' => $_POST['street_1'],
          ':street_2' => $_POST['street_2'],
          ':city' => $_POST['city'],
          ':postal_code' => $_POST['postal_code'],
          ':province' => $_POST['province'],
          ':country' => $_POST['country'],
          ':phone' => $_POST['phone'],
          ':email' => $_POST['email'],
          ':password' => password_hash($_POST['password'], PASSWORD_DEFAULT)
        ];
        
        // Prepare query
        $stmt = $dbh->prepare($query);
        
        // Execute query
        $stmt->execute($param);
        
        // Select newly inserted customer
        $id = $dbh->lastInsertId();
        
        // create query
        $query = "SELECT * FROM customers
        WHERE id = ?";

        $param = [$id];

        //prepare query
        $stmt = $dbh->prepare($query);

        //execute query
        $stmt->execute($param);

        //fetch results
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        
        $completed = true;
        
      } catch (Exception $e){
        
          echo $e->getMessage();
        }
    }

  }
  
  include('includes/header.php')
?>
  
    <div id="wrapper">
      
      <!-- Start of main content -->
      <main>
        <!-- If form is not complete then we will remain on this page -->
        <?php if(!$completed) : ?>
        
        <h1><?=$title?></h1>

        <div id="innerborder">

          <span id="msg"></span>
        
          <div class="error">
              <?php if(isset($errors['first_name'])){
                echo str_replace('_', ' ', $errors['first_name']);
              }
              ?><br />
         
              <?php if(isset($errors['last_name'])){
                echo str_replace('_', ' ', $errors['last_name']);
              }
              ?><br />
         
              <?php if(isset($errors['street_1'])){
                echo str_replace('_', ' ', $errors['street_1']);
              }
              ?><br />
         
              <?php if(isset($errors['street_2'])){
                echo str_replace('_', ' ', $errors['street_2']);
              }
              ?><br />
         
              <?php if(isset($errors['city'])){
                echo str_replace('_', ' ', $errors['city']);
              }
              ?><br />
         
              <?php if(isset($errors['postal_code'])){
                echo str_replace('_', ' ', $errors['postal_code']);
              }
              ?><br />
         
              <?php if(isset($errors['province'])){
                echo str_replace('_', ' ', $errors['province']);
              }
              ?><br />
         
              <?php if(isset($errors['country'])){
                echo str_replace('_', ' ', $errors['country']);
              }
              ?><br />
         
              <?php if(isset($errors['phone'])){
                echo str_replace('_', ' ', $errors['phone']);
              }
              ?><br />
         
              <?php if(isset($errors['email'])){
                echo str_replace('_', ' ', $errors['email']);
              }
              ?><br />
         
              <?php if(isset($errors['password'])){
                echo str_replace('_', ' ', $errors['password']);
              }
              ?><br />
         
              <?php if(isset($errors['confirm_password'])){
                echo str_replace('_', ' ', $errors['confirm_password']);
              }
              ?>
         </div>
   
        <fieldset>
  
        <form
          method="post"
          action="register.php"
          id="register"
          novalidate
        >
        
          <p>
            <label for="first_name" name="first_name">First Name:</label>
            <input
              type="text"
              name="first_name"
              id="first_name"
              value="<?php 
        echo (isset($clean['first_name'])) ? $clean['first_name'] : ''; ?>"
            />
          </p> 
          
          <p>
            <label for="last_name" name="last_name">Last Name:</label>
            <input
              type="text"
              name="last_name"
              id="last_name"
              value="<?php 
        echo (isset($clean['last_name'])) ? $clean['last_name'] : ''; ?>"
            />
          </p> 
          
          <p>
            <label for="street_1" name="street_1">Street 1:</label>
            <input
              type="text"
              name="street_1"
              id="street_1"
              value="<?php 
        echo (isset($clean['street_1'])) ? $clean['street_1'] : ''; ?>"
            />
          </p> 
          
          <p>
            <label for="street_2" name="street_2">Street 2:</label>
            <input
              type="text"
              name="street_2"
              value="<?php 
        echo (isset($clean['street_2'])) ? $clean['street_2'] : ''; ?>"
            />
          </p> 
          
          <p>
            <label for="city" name="city">City:</label>
            <input
              type="text"
              name="city"
              id="city"
              value="<?php 
        echo (isset($clean['city'])) ? $clean['city'] : ''; ?>"
            />
          </p> 
          
          <p>
            <label for="postal_code" name="postal_code">Postal Code:</label>
            <input
              type="text"
              name="postal_code"
              id="postal_code"
              value="<?php 
        echo (isset($clean['postal_code'])) ? $clean['postal_code'] : ''; ?>"
            />
          </p> 
          
          <p>
            <label for="province" name="province">Province:</label>
            <input
              type="text"
              name="province"
              id="province"
              value="<?php 
        echo (isset($clean['province'])) ? $clean['province'] : ''; ?>"
            />
          </p> 
          
          <p>
            <label for="country" name="country">Country:</label>
            <input
              type="text"
              name="country"
              id="country"
              value="<?php 
        echo (isset($clean['country'])) ? $clean['country'] : ''; ?>"
            />
          </p> 
          
          <p>
            <label for="phone" name="phone">Phone:</label>
            <input
              type="text"
              name="phone"
              id="phone"
              value="<?php 
        echo (isset($clean['phone'])) ? $clean['phone'] : ''; ?>"
            />
          </p> 
          
          <p>
            <label for="email" name="email">Email:</label>
            <input
              type="text"
              name="email"
              id="email"
              value="<?php 
        echo (isset($clean['email'])) ? $clean['email'] : ''; ?>"
            />
          </p> 
          
          <p>
            <label for="password" name="password">Password:</label>
            <input
              type="password"
              name="password"
              id="password"
              value="<?php 
        echo (isset($clean['password'])) ? $clean['password'] : ''; ?>"
            />
          </p> 
          
          <p>
            <label for="confirm_password" name="confirm_password">Confirm Password:</label>
            <input
              type="password"
              name="confirm_password"
              id="confirm_password"
              value="<?php 
        echo (isset($clean['confirm_password'])) ? $clean['confirm_password'] : ''; ?>"
            />
          </p>
          
          <p>
            <input id="submit_form" type="submit" value="Submit" />
          </p>
        
        </form>
        </fieldset>
        
        <!-- If form is complete then information will be sent to the databse and information will be displayed -->
        <?php else : ?>

          <!-- hide the passwords on the displayed information -->
          <?php if(isset($clean['password']) || (isset($clean['confirm_password']))) : ?>

             <?=$clean['password'] = '';?>
             <?=$clean['confirm_password'] = '';?>

          <?php endif;?>
        
          <h1 class="else">Thank you for registering</h1>
          
          <h2 class="else"><strong>Your Information</strong></h2>
          
          <p class="else">

            <?php foreach($clean as $key => $value) : ?>

            <?php $label = ucwords( str_replace('_',' ', $key) ); ?>

            <strong><?=$label?>:</strong> <?=$value?><br />

            <?php endforeach; ?>
          </p>
    
    <?php endif; ?>
        
      </main>
      
    </div>
   
    
    <?php
      include('includes/footer.php');
    ?>