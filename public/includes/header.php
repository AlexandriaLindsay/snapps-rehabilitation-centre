<!DOCTYPE html>
<html ng-app="register" lang="en">
  <head>
    <title><?=$title?></title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.6/angular.min.js"></script>
    <script
      src="https://code.jquery.com/jquery-2.2.4.js"
      integrity="sha256-iT6Q9iMJYuQiMWNd9lDyBUStIq/8PuOW33aOqmvFpqI="
      crossorigin="anonymous"></script>

    <script type="text/javascript">

      var app = angular.module("register", []);
      app.controller("myCtrl", function($scope) {
        $('#submit_form').click(function() {
          var first_name = $('#first_name').val();
          var last_name = $('#last_name').val();
          var street_1 = $('#street_1').val();
          var city = $('#city').val();
          var postal_code = $('#postal_code').val();
          var province = $('#province').val();
          var country = $('#country').val();
          var phone = $('#phone').val();
          var email = $('#email').val();
          var password = $('#password').val();
          var confirm_password = $('#confirm_password').val();
          var data = $('#register').serialize();

          if(first_name == '' || last_name == '' || street_1 == '' || city == '' || postal_code == '' || province == '' || country == '' || phone == '' || email == '' || password == '' || confirm_password == '' ||) {

            $('#msg').html('Please fill all fields');


          } else {
              $.ajax({
                type: 'POST',
                url: 'http://project.local/register.php',
                data: data,
                cache: false,
                success: function(response) {
                  $('#msg').html(response);
                    var first_name = $('#first_name').val('');
                    var last_name = $('#last_name').val('');
                    var street_1 = $('#street_1').val('');
                    var city = $('#city').val('');
                    var postal_code = $('#postal_code').val('');
                    var province = $('#province').val('');
                    var country = $('#country').val('');
                    var phone = $('#phone').val('');
                    var email = $('#email').val('');
                    var password = $('#password').val('');
                    var confirm_password = $('#confirm_password').val('');
                }
              });
          }
          }
          return false;
        });
      });
    </script>

    <link rel="icon" type="image/png" href="../images/favicon_03.png" />
    <link rel="apple-touch-icon" sizes="57x57" href="../images/favicon_03.png" />
    <link rel="apple-touch-icon" type="image/png" href="../images/favicon_03.png" />
    <link rel="apple-touch-icon" type="image/png" href="../images/favicon_03.png" />
    <!-- Link to print style sheet -->
    <link type="text/css" rel="stylesheet" href="styles/print.css" media="print">
    <!-- Google fonts link -->
    <link href="https://fonts.googleapis.com/css?family=Slabo+27px%7cYellowtail" rel="stylesheet">
    <!-- Link to responsive style sheet -->
    <link type="text/css" rel="stylesheet" href="styles/responsive.css">
    <!-- Linked to overall style of the website -->
    <link type="text/css" rel="stylesheet" href="styles/style.css">

    <!-- If the page is chelydra serpentina then this stylesheet will run -->
    <?php if($title == 'chelydra serpentina') : ?>
      <link type="text/css" rel="stylesheet" href="styles/chelydra_serpentina.css">
    <?php endif; ?>

    <!-- If the page is donations then this stylesheet will run -->
    <?php if($title == 'donations') : ?>
      <link type="text/css" rel="stylesheet" href="styles/donations.css">
    <?php endif; ?>

    <!-- If the page is index then this stylesheet will run -->
    <?php if($title == 'home page') : ?>
      <link type="text/css" rel="stylesheet" href="styles/index.css">
    <?php endif; ?>

    <!-- If the page is location then this stylesheet will run -->
    <?php if($title == 'location') : ?>
      <link type="text/css" rel="stylesheet" href="styles/location.css">
    <?php endif; ?>

    <!-- If the page is register then this stylesheet will run -->
    <?php if($title == 'Registration Form') : ?>
      <link type="text/css" rel="stylesheet" href="styles/register.css">
    <?php endif; ?>

    <!-- If the page is login then this stylesheet will run -->
    <?php if($title == 'login') : ?>
      <link type="text/css" rel="stylesheet" href="styles/login.css">
    <?php endif; ?>

    <!-- If the page is products then this stylesheet will run -->
    <?php if($title == 'products') : ?>
      <link type="text/css" rel="stylesheet" href="styles/products.css">
    <?php endif; ?>

    <!-- If the page is checkout then this stylesheet will run -->
    <?php if($title == 'checkout') : ?>
      <link type="text/css" rel="stylesheet" href="styles/checkout.css">
    <?php endif; ?>

    <!-- If the page is payment_details then this stylesheet will run -->
    <?php if($title == 'payment details') : ?>
      <link type="text/css" rel="stylesheet" href="styles/payment_details.css">
    <?php endif; ?>

    <!-- If the page is invoice then this stylesheet will run -->
    <?php if($title == 'invoice') : ?>
      <link type="text/css" rel="stylesheet" href="styles/invoice.css">
    <?php endif; ?>



  </head>

  <body ng-controller="myCtrl">
    <!-- Conditional comment for IE 8 and 9 browsers -->
    <!--[if LTE IE 9]>
      <script>
        document.createElement('header');
        document.createElement('nav');
        document.createElement('footer');
        document.createElement('article');
        document.createElement('section');
        document.createElement('main');
      </script>
      <link type="text/css" rel="stylesheet" href="styles/ie8.css">
    <![endif]-->

    <!-- Start of header -->
    <header>
         <!-- Header needs to extend full width of the page -->
        <div id="innerheader">
          <!-- Social media image link -->
          <a href="#">
          <img
            src="images/green-social-media-icons_03.jpg"
            width="87"
            height="26"
            alt="Social Media"
            id="socialmedia"
          />
          </a>

          <img
            src="images/plant_thing_logo_03.png"
            width="37"
            height="44"
            alt="Snapps Icon"
            id="snappsicon"
          />

          <img
            src="images/turtle_logo_03.png"
            width="204"
            height="52"
            alt="Turtle Logo"
            id="turtlelogo"
          />

          <img
            src="images/main_logo_03.png"
            width="324"
            height="78"
            alt="Snapps Rehabiltation Center"
            id="mainlogo"
          />

          <div class="product_search">

            <form class="form" action="products.php" method="get">

              <input type="text" name="q" placeholder="Search Products" />&nbsp;
              <input type="submit" value="Search" />

            </form>

        </div>
          <!-- Start of header navigation -->
          <ul id="navheader">

          <?php if(!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] == false) : ?>

            <li><a href="donations.php" <?php if($title == 'donations'){ echo 'class="currentHead"';}?>>Donations</a></li>
            <li><a href="login.php" <?php if($title == 'login'){echo 'class="currentHead"';}?>>Login</a></li>
            <li><a href="register.php" <?php if($title == 'Registration Form'){ echo 'class="currentHead"';}?>>Register</a></li>
          <?php else : ?>
            <li><a href="donations.php" <?php if($title == 'donations'){ echo 'class="currentHead"';}?>>Donations</a></li>
            <li><a href="#">Profile</a></li>
            <li><a href="index.php?logout=1">Logout</a></li>
            <li><a href="location.php" <?php if($title == 'location'){ echo 'class="currentHead"';}?>>Location</a></li>
          <?php endif; ?>
          </ul>
          <!-- End of header navigation -->

        </div>
    </header>
    <!-- End of header -->

    <!-- Start of navigation -->
    <nav>
      <div id="innernav">

        <!-- Start of hamburger menu -->
        <a href="#" id="menulink">

          <span id="topbar"></span>
          <span id="middlebar"></span>
          <span id="bottombar"></span>

        </a>
        <!-- End of hamburger menu -->

        <!-- Start of main navigation -->
        <ul id="navlist">

          <li <?php if($title == 'home page'){ echo 'class="current"';}?>><a href="index.php">Home</a></li>
          <!-- Start of history drop down menu -->
          <li <?php if($title == 'chelydra serpentina'){ echo 'class="current"';}?> class="dropdown"><a href="#">History</a>

            <!-- Start of history sublist -->
            <ul id="historysublist">
              <li><a href="chelydra_serpentina.php">Common Snapper</a></li>
              <li><a href="#">Chelus fimbriata</a></li>
            </ul>
            <!-- End of history sublist -->

          </li>
          <!-- End of history drop down menu -->

          <!-- Start of gallery drop down menu -->
          <li class="dropdown"><a href="#">Gallery</a>

            <!-- Start of gallery submenu -->
            <ul id="gallerysublist">
              <li><a href="gallery.php">Common Snapping Turtle</a></li>
              <li><a href="#">Alligator Snapping Turtle</a></li>
            </ul>
            <!-- End of gallery submenu -->

          </li>
          <!-- End of gallery drop down menu -->

          <li <?php if($title == 'products'){ echo 'class="current"';}?>><a href="products.php">Products</a></li>


        </ul>
        <!-- End of main navigation -->

      </div>
    </nav>
    <!-- End of main navigation -->
