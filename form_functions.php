<?php
// create a function to check for errors
function required($field_name, $errors){
  
  if(empty($_POST[$field_name]))
  {
    $errors[$field_name] = "$field_name is a required field";
  }
      return $errors;
  
}


// function to validate email
function email($field1, $errors){

  if(filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) != $_POST['email']){
  
    $errors['email'] = '<p>Invalid email</p>';
  }
  return $errors;
}


// function to validate phone number
function phone($field1, $errors){

  if(is_numeric($_POST['phone']) != $_POST['phone']){
  
    $errors['phone'] = '<p>Invalid phone number</p>';

  }
  return $errors;
}


// Function to get the list of products
function getProducts($dbh) {
  if(isset($_GET['cat']) && !empty($_GET['cat'])) {
    $cat = $_GET['cat'];
  }

  if(isset($_GET['q'])) {
    $q = $_GET['q'];
  }

  if(isset($cat)) {

    $query = "SELECT
              *
              FROM
              products
              WHERE
              category = :cat
              AND
              deleted = 0
              ORDER BY name ASC";

    $params = [':cat' => $cat];

  } elseif(isset($q)) {

      $query = "SELECT
                *
                FROM
                products
                WHERE
                (
                name LIKE :string
                OR
                category LIKE :string
                OR
                brand LIKE :string
                OR
                short_description LIKE :string
                OR
                long_description LIKE :string
                )
                AND
                deleted = 0";

      $params = [':string' => '%' . $q . '%'];

  } else {

      $query = "SELECT
                *
                FROM
                products
                WHERE
                deleted = 0
                ORDER BY name ASC";

      $params = [];
  }

  $stmt = $dbh->prepare($query);

  $stmt->execute($params);

  $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

  return $results;
}// End of getProducts



// Function for product details
function getDetail($dbh, $id) {

  $query = "SELECT
            *
            FROM
            products
            WHERE
            id = ?";

  $params = [intval($id)];

  $stmt = $dbh->prepare($query);

  $stmt->execute($params);

  $detail = $stmt->fetch(PDO::FETCH_ASSOC);

  return $detail;
}// End of getDetail


function orderDetail($dbh, $id) {

  $query = "SELECT
            *
            FROM
            orders
            WHERE
            id = ?";

  $stmt = $dbh->prepare($query);

  $param = [intval($id)];

  $stmt->execute($param);

  $order_detail = $stmt->fetch(PDO::FETCH_ASSOC);

  return $order_detail;
}


// function to get the details for line items
function itemDetail($dbh, $id) {

  $query = "SELECT
              *
              FROM
              line_items
              WHERE
              order_id = ?";

  $stmt = $dbh->prepare($query);

  $param = [intval($id)];

  $stmt->execute($param);

  $item_detail = $stmt->fetchAll(PDO::FETCH_ASSOC);

  return $item_detail;
}// end of line items function



// function for dbh connection
function getConnect()
{
  $dbh = new PDO(DB_DSN, DB_USER, DB_PASS);
  $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  return $dbh;
}// end dbh connect function



// function to get the total of every item in cart
function getTotal() {
  $total = 0;
  foreach ($_SESSION['cart'] as $item) {
    $total += floatval($item['price']);
  }
  return $total;
}// end of total cart function



// function to check if user is logged in
function loggedIn() {
  if(isset($_SESSION['logged_in']) == true) {
    return true;
  } else {
    return false;
  }

}// end of logged in function



// function to delete a product from the database
function deleteItem($dbh, $id) {

  $query = "UPDATE
            products
            SET
            deleted = 1
            WHERE
            id = ?";

  $stmt = $dbh->prepare($query);

  $param = [intval($id)];

  $deleted_item = $stmt->execute($param); 

  return $deleted_item;

}// end of delete function




// function to grab the number of products
function numberProducts($dbh) {

  $query = "SELECT
            count(name) as name
            FROM
            products";

  $stmt = $dbh->prepare($query);

  $stmt->execute();

  $number_products = $stmt->fetchAll(PDO::FETCH_ASSOC);

  return $number_products;

}// end of number products function



// function to grab the highest product price
function highestProduct($dbh) {

  $query = "SELECT
            Max(price) as price
            FROM
            products;";

  $stmt = $dbh->prepare($query);

  $stmt->execute();

  $highest_product = $stmt->fetchAll(PDO::FETCH_ASSOC);

  return $highest_product;

}// end of highest product price



// function to grab the lowest product price
function lowestProduct($dbh) {

  $query = "SELECT
            MIN(price) as price
            FROM
            products;";

  $stmt = $dbh->prepare($query);

  $stmt->execute();

  $lowest_product = $stmt->fetchAll(PDO::FETCH_ASSOC);

  return $lowest_product;

}// end of lowest product price



// function to grab the number of orders
function numberOrders($dbh) {

  $query = "SELECT
            count(first_name) as name
            FROM
            orders";

  $stmt = $dbh->prepare($query);

  $stmt->execute();

  $number_orders = $stmt->fetchAll(PDO::FETCH_ASSOC);

  return $number_orders;

}// end of number orders function



// function to grab the highest price of order
function highestOrders($dbh) {

  $query = "SELECT
            MAX(total) as total
            FROM
            orders";

  $stmt = $dbh->prepare($query);

  $stmt->execute();

  $highest_order = $stmt->fetchAll(PDO::FETCH_ASSOC);

  return $highest_order;

}// end of highest orders function



// function to grab the latest order submited
function latestOrder($dbh) {

  $query = "SELECT
            created_at
            FROM
            orders
            ORDER BY created_at 
            DESC
            LIMIT 1";

  $stmt = $dbh->prepare($query);

  $stmt->execute();

  $latest_order = $stmt->fetchAll(PDO::FETCH_ASSOC);

  return $latest_order;

}// end of latest order function



// function to grab the number of customers
function totalCustomers($dbh) {

  $query = "SELECT
            COUNT(first_name) as first_name
            FROM
            customers";

  $stmt = $dbh->prepare($query);

  $stmt->execute();

  $total_customers = $stmt->fetchAll(PDO::FETCH_ASSOC);

  return $total_customers;

}// end of totalCustomers function



// function to grab the latest customer 
function latestCustomer($dbh) {

  $query = "SELECT
            created_at
            FROM
            customers
            ORDER BY created_at
            LIMIT 1";

  $stmt = $dbh->prepare($query);

  $stmt->execute();

  $latest_customer = $stmt->fetchAll(PDO::FETCH_ASSOC);

  return $latest_customer;

}// end of latest customer function



// function to grab number of line items
function numberLineItems($dbh) {

  $query = "SELECT
            COUNT(product_name) as product_name
            FROM
            line_items";

  $stmt = $dbh->prepare($query);

  $stmt->execute();

  $total_line_items = $stmt->fetchAll(PDO::FETCH_ASSOC);

  return $total_line_items;

}// end of numberLineItems function



// function to grab the highest price of line items
function highestLineItems($dbh) {

  $query = "SELECT
            MAX(unit_price) as unit_price
            FROM
            line_items";

  $stmt = $dbh->prepare($query);

  $stmt->execute();

  $highest_line_item = $stmt->fetchAll(PDO::FETCH_ASSOC);

  return $highest_line_item;

}// end of highestLineItems function



// function to grab the lowest price of line items
function lowestLineItems($dbh) {

  $query = "SELECT
            MIN(unit_price) as unit_price
            FROM
            line_items";

  $stmt = $dbh->prepare($query);

  $stmt->execute();

  $lowest_line_item = $stmt->fetchAll(PDO::FETCH_ASSOC);

  return $lowest_line_item;

}// end of lowestLineItems function










