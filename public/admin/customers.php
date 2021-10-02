<?php

  require_once __DIR__ . '/../../configsnapps.php';

  $title = 'customers';

  $query = "SELECT
                *
                FROM
                customers
                ORDER BY first_name ASC";

  $stmt = $dbh->prepare($query);

  $params = [];

  $stmt->execute($params);

  $results = $stmt->fetchAll(PDO::FETCH_ASSOC);


  include('includes/header.php');
?>

    <div class="col-sm-8 text-left"> 
      <h1>Customers</h1>

      <table>

        <tr>
          <th>First Name:</th>
          <th>Last Name:</th>
          <th>Street 1:</th>
          <th>Street 2:</th>
          <th>City:</th>
          <th>Postal Code:</th>
          <th>Province:</th>
          <th>Country:</th>
          <th>Phone:</th>
          <th>Email:</th>
          <th>Created At:</th>
        </tr>
        <?php foreach($results as $row) : ?>

          <tr>
            <td><?=$row['first_name']?></td>
            <td><?=$row['last_name']?></td>
            <td><?=$row['street_1']?></td>
            <td><?=$row['street_2']?></td>
            <td><?=$row['city']?></td>
            <td><?=$row['postal_code']?></td>
            <td><?=$row['province']?></td>
            <td><?=$row['country']?></td>
            <td><?=$row['phone']?></td>
            <td><?=$row['email']?></td>
            <td><?=$row['created_at']?></td>
          </tr>
        <?php endforeach; ?>
      </table>
     
      <hr>
    
    </div>
   <?php include('includes/footer.php'); ?>
