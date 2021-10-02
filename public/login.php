<?php
  
  require_once __DIR__ . '/../configsnapps.php';

  $title = 'login';

  if($_SERVER['REQUEST_METHOD'] == 'POST') {

  	$dbh = new PDO(DB_DSN, DB_USER, DB_PASS);

  	$query = "SELECT
  	          *
  	          FROM
  	          customers
  	          WHERE
  	          email = :email";

  	$params = [

        ':email' => $_POST['email']
  	];

  	$stmt = $dbh->prepare($query);

  	$stmt->execute($params);

  	$user = $stmt->fetch();

  	if($user) {


  		if(password_verify($_POST['password'], $user['password'])) {
  			$_SESSION['logged_in'] = true;
  			$_SESSION['user'] = $user;
        // Test if user is admin
        if($user['email'] == 'admin@hotmail.com') {
          header('Location: admin/index.php');
          die();
        }

  			header('Location: login.php');
  			die;
  		} else {
            $_SESSION['logged_in'] = false;
            echo $errors['password'] = 'Incorrect Password';
  		  }
  	}     else {
  		      echo $errors['password'] = 'Incorrect Password';
  	      }

  
    

  }

  include('includes/header.php');
?>

  <div id="wrapper">
      
      <!-- Start of main content -->
      <main>
        
        <h1><?=$title?></h1>
        
        <div id="innerborder">

        <h2>Please Log in to Your Account</h2>

        <fieldset>
        <!-- Start of form -->
        <form
          action="<?=$_SERVER['PHP_SELF']?>"
          method="post"
          novalidate
         />

        <p>
          <label for="email" name="email">Email:</label>
          <input
            type="text"
            name="email"
            class="login"
          />
        </p>

        <p>
          <label for="password" name="password">Password:</label>
          <input
            type="password"
            name="password"
            class="login"
          />
        </p>

        <p>
          <input 
            type="submit" 
            value="login"
          />
        </p>
          
        </form>
        <!-- End of form -->
        </div>
    
      </fieldset>

      <p class="register">Don't have an account? <a href="register.php">Register Today!</a></p>

      </main>
      
    </div>


<?php
  include('includes/footer.php');
?>