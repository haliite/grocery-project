<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Place an Order</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
  </head>
  <body>
    <div class="container-fluid">
        <?php 
        session_start();

        $connection = mysqli_connect('localhost', 'root', '', 'assignment1');
        
        $addUserToDatabase = "insert into users (name, last_name, street_address, suburb, state, postcode, phone_number, email)
                            values ('"
                             .$_POST['fname']."','"
                             .$_POST['lname']."','"
                             .$_POST['street']."','"
                             .$_POST['suburb']."','"
                             .$_POST['state']."','"
                             .$_POST['postcode']."','"
                             .$_POST['num']."','"
                             .$_POST['email']
                             ."')";
        if (mysqli_query($connection, $addUserToDatabase)) {
            //echo "New record created successfully";
        } 
        else {
            //echo "Error: " . $addUserToDatabase . "<br>" . $connection->error;
        }

        mysqli_close($connection);
        ?>
        
        <header>

        <nav class="navbar bg-body-tertiary">
        <div class="container-fluid col-lg-8 p-4">
            <ul class="navbar nav">
            <li class="nav-item">
                <a class="navbar-brand" href="index.php">
                <img src="img/logo.svg" height="80"/>  <!-- logo -->
                </a>
            </li>
            </ul>
                
            <span class="my-auto align-middle px-2">
                Delivery Details
            </span>
        </div>
        </nav>
        </header>
        <div class="container col-lg-8">
            <main class="py-2">
            <h2>Order Confirmed</h2>
            <p>Your receipt has been sent to <?php echo $_POST['email'] ?>. Thank you for ordering!</p>
            <?php
        $connection = mysqli_connect('localhost', 'root', '', 'assignment1');
        if (isset($_SESSION['cart']) && sizeof($_SESSION['cart']) > 0) {
            
              $cart = $_SESSION['cart'];
              $subtotal = 0;
              $cart_array = implode(',', array_keys($_SESSION['cart']));
              $cart_array = str_replace('/', '', $cart_array);
              $query_string = "select * from products where product_id in ($cart_array)";
              $result = mysqli_query($connection, $query_string); ?>

              <table class="table table-hover table-responsive">
                <thead>
                  <tr>
                    <th>Photo</th>
                    <th colspan="3">Product Name</th>
                    <th>Unit Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  while ($row = mysqli_fetch_array($result)) {
                    echo "<tr>";
                    echo "<td>image</td>";
                    echo "<td colspan='3'>".$row['product_name'].' ('.$row['unit_quantity'].')';
                    echo "</td>";
                    echo "<td>".$row['unit_price'].'</td>';
                    foreach($cart as $id => $amt) {
                      if (str_replace('/', '', $id) == $row['product_id']) {
                          echo "<td>".$amt."</td>";
                          echo "<td>".number_format((float)$amt*$row['unit_price'], 2, '.','')."</td>";
                          $subtotal += $amt * $row['unit_price'];
                      }
                    }
                    echo '</tr>';
                  }
                  ?>
                  <tr class="h3">
                    <td colspan="6" class="text-end px-5">
                      <b>Total</b>
                    </td>
                    <td>
                      <?php echo number_format((float)$subtotal, 2, '.',''); }?>
                    </td>
                  </tr>
                </table>
                <?php $_SESSION['cart'] = array(); ?>

                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
            </main>

        </div>
        <?php include('footer.php'); ?>
    </div>
  </body>
</html>