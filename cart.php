<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="css/main.css">
  </head>
  <body>
    <div class="container-fluid">
        <?php
        session_start();
        include('header.php'); ?>
    
        <main class="container col-lg-8">

        <h1>My Cart</h1>
        <?php
        $connection = mysqli_connect('localhost', 'root', '', 'assignment1');
        if (isset($_POST['clear'])) {
          unset($_SESSION['cart']);
        }
        if (isset($_POST['quantityChange']) && $_POST['quantityChange'] == 0) {
          unset($_SESSION['cart'][$_POST['idToChange'].'/']);
        }
        if (isset($_POST['idToRemove'])) {
          unset($_SESSION['cart'][$_POST['idToRemove'].'/']);
        }
        if (isset($_SESSION['cart']) && sizeof($_SESSION['cart']) > 0) {
            
              $cart = $_SESSION['cart'];
              $subtotal = 0;
              //echo $_SESSION['cart'];
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
                    //echo $row['product_id'].' ';
                    echo "<td colspan='3'>".$row['product_name'].' ('.$row['unit_quantity'].')';?>
                    <form action="cart.php" method="post">
                      <input type="hidden" value="<?php echo $row['product_id']?>" name="idToRemove">
                      <small>
                        <input type="submit" class="btn btn-link p-0 small" value="Remove Item"></input>
                    </form>
                    <?php
                    echo "</td>";
                    echo "<td>".$row['unit_price'].'</td>';
                    //echo $row['unit_price'].' ';
                    foreach($cart as $id => $amt) {
                      if (str_replace('/', '', $id) == $row['product_id']) {
                        if (isset($_POST['quantityChange']) && $_POST['idToChange'] == $row['product_id']) {
                          $amt = $_POST['quantityChange'];
                          $_SESSION['cart'][$id] = $amt;
                          
                        }
                        //echo "<td>".$amt."</td>";?>
                          <td>
                            <form action="cart.php" method="post">
                              <input type="hidden" value="<?php echo $row['product_id']?>" name="idToChange">
                              <input class="text-center" type="text" size=3 minlength="1" maxlength="2" value="<?php echo $amt; ?>" name="quantityChange">
                            </form>
                          </td>
                          <?php
                          echo "<td>".number_format((float)$amt*$row['unit_price'], 2, '.','')."</td>";
                          $subtotal += $amt * $row['unit_price'];
                      }
                    }
                    echo '</tr>';
                  }
                  ?>
                  <tr class="h3">
                    <td colspan="6" class="text-end px-5">
                      <b>Subtotal</b>
                    </td>
                    <td>
                      <?php echo number_format((float)$subtotal, 2, '.',''); ?>
                    </td>
                  </tr>
                </tbody>
              </table>
              <div class="text-end justify-content-end d-flex">
                <form class="mx-3" action="cart.php" method="post">
                  <input type="submit" value="Clear Cart" name="clear" class="btn btn-outline-danger btn-lg"></input>
                </form>
                <div>
                  <a href="deliverydetails.php"><button class="btn btn-success btn-lg d-inline-flex">Place an order</button></a>
                </div>
              </div>
              <?php
        }
        else {?>
          <p>There are no items in your cart. Please add an item.</p>
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
              <tr>
                <td></td>
                <td colspan="3"></td>
                <td></td>
                <td></td>
                <td></td>
              </tr>
              <tr class="h3">
                <td colspan="6" class="text-end px-5">Subtotal</td>
                <td>0.00</td>
              </tr>
            </tbody>
          </table>
          <div class="text-end">
            <button class="btn btn-success btn-lg disabled">Place an order</button>
          </div>
          <?php
        }
        ?>
        
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        
        </main>

        <?php include('footer.php'); ?>
    </div>
  </body>
</html>