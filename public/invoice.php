<?php
  
  require_once __DIR__ . '/../configsnapps.php';


  $title = 'invoice';

  $dbh = new PDO(DB_DSN, DB_USER, DB_PASS);
  $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $cart = $_SESSION['cart'];

  $sub_total = getTotal();
  $gst = $sub_total * GST;
  $pst = $sub_total * PST;
  $final_total = $sub_total + $gst + $pst;



    $user = $_SESSION['user'];

try {

      // insert order
      $query = "INSERT
                into
                orders
                (first_name, last_name, street_1, street_2, city, postal_code, province, country, phone, email, sub_total, gst, pst, total)
                VALUES
                (:first_name, :last_name, :street_1, :street_2, :city, :postal_code, :province, :country, :phone, :email, :sub_total, :gst, :pst, :total)";

                $params = [
          
                  ':first_name' => $user['first_name'],
                  ':last_name' => $user['last_name'],
                  ':street_1' => $user['street_1'],
                  ':street_2' => $user['street_2'],
                  ':city' => $user['city'],
                  ':postal_code' => $user['postal_code'],
                  ':province' => $user['province'],
                  ':country' => $user['country'],
                  ':phone' => $user['phone'],
                  ':email' => $user['email'],
                  ':sub_total' => $sub_total,
                  ':pst' => $pst,
                  ':gst' => $gst,
                  ':total' => $final_total        
                ];
                

                $stmt = $dbh->prepare($query);


                $stmt->execute($params);


                $id = $dbh->lastInsertId();


                // insert line items
                $query = "INSERT
                          into
                          line_items
                          (product_id, order_id, quantity, unit_price, product_name)
                          VALUES
                          (:product_id, :order_id, :quantity, :unit_price, :product_name)";


                $stmt = $dbh->prepare($query);

                $params = [];


                foreach($_SESSION['cart'] as $item) {

                  
                  $params[':product_id'] = $item['id'];
                  $params[':order_id'] = $id;
                  $params[':quantity'] = 1;
                  $params[':unit_price'] = $item['price'];
                  $params[':product_name'] = $item['name'];

                  $stmt->execute($params);

                }

$order_detail = orderDetail($dbh, $id);
$line_items = itemDetail($dbh, $id);


    } catch(Exception $e) {
        $e->getMessage();
    }

    



  include('includes/header.php');


?>

  <div id="wrapper">
      
      <!-- Start of main content -->
      <main>

        
        <h1><?=$title?></h1>

        
        <div id="innerborder">

          <h2>Thank you for your purchase</h2>

          <h3>Customer Info</h3>

            <div id="customer_info">
              <p><strong>First Name:</strong>&nbsp;&nbsp;&nbsp;<?=$order_detail['first_name']?></p>
              <p><strong>Last Name:</strong>&nbsp;&nbsp;&nbsp;<?=$order_detail['last_name']?></p>
              <p><strong>Street 1:</strong>&nbsp;&nbsp;&nbsp;<?=$order_detail['street_1']?></p>
              <p><strong>Street 2:</strong>&nbsp;&nbsp;&nbsp;<?=$order_detail['street_2']?></p>
              <p><strong>City:</strong>&nbsp;&nbsp;&nbsp;<?=$order_detail['city']?></p>
              <p><strong>Postal Code:</strong>&nbsp;&nbsp;&nbsp;<?=$order_detail['postal_code']?></p>
              <p><strong>Province:</strong>&nbsp;&nbsp;&nbsp;<?=$order_detail['province']?></p>
              <p><strong>Country:</strong>&nbsp;&nbsp;&nbsp;<?=$order_detail['country']?></p>
              <p><strong>Phone:</strong>&nbsp;&nbsp;&nbsp;<?=$order_detail['phone']?></p>
              <p><strong>Email:</strong>&nbsp;&nbsp;&nbsp;<?=$order_detail['email']?></p>
              <p><strong>Sub Total:</strong>&nbsp;&nbsp;&nbsp;<?=$order_detail['sub_total']?></p>
              <p><strong>GST:</strong>&nbsp;&nbsp;&nbsp;<?=$order_detail['gst']?></p>
              <p><strong>PST:</strong>&nbsp;&nbsp;&nbsp;<?=$order_detail['pst']?></p>
              <p><strong>Total:</strong>&nbsp;&nbsp;&nbsp;<?=$order_detail['total']?></p>
            </div>


          <table>
            
            <tr>
              <th>Product ID:</th>
              <th>Order ID:</th>
              <th>Quantity:</th>
              <th>Unit Price:</th>
              <th>Product Name:</th>
            </tr>

          <?php foreach($line_items as $item) :?>

              <tr>
                <td><?=$item['product_id']?></td>
                <td><?=$item['order_id']?></td>
                <td><?=$item['quantity']?></td>
                <td><?=$item['unit_price']?></td>
                <td><?=$item['product_name']?></td>
              </tr>
          <?php endforeach; ?>
          </table>


           
          </div>



            <h3>
          </div>
       

  


        </div>
        </main>

        </div>




<?php
  include('includes/footer.php');
?>