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
        session_start(); ?>

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
        <div class="container">
        <div class="row py-3 justify-content-between">
          <div class="col-md-8 col-lg-7">
              <main class="py-2">
              <h2>Delivery Details</h2>

              <form class="row g-3 needs-validation" novalidate method="post" action="confirmed.php">
                <div class="col-md-6">
                  <label for="validationCustom01" class="form-label">First name</label>
                  <input type="text" class="form-control" id="validationCustom01" name="fname" required>
                  <div class="valid-feedback">
                    Looks good!
                  </div>
                </div>
                <div class="col-md-6">
                  <label for="validationCustom02" class="form-label">Last name</label>
                  <input type="text" class="form-control" id="validationCustom02" name="lname" required>
                  <div class="valid-feedback">
                    Looks good!
                  </div>
                </div>
                <div class="col-md-6">
                  <label for="validationCustomEmail" class="form-label">Email</label>
                  <div class="input-group has-validation">
                    <input type="email" class="form-control" id="validationCustomEmail" name="email" aria-describedby="inputGroupPrepend" required>
                    <div class="invalid-feedback">
                      Please enter a valid email.
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
                  <label for="validationCustomNumber" class="form-label">Mobile Number</label>
                  <div class="input-group has-validation">
                    <input type="tel" class="form-control" name="num" minlength="10" maxlength="10" id="validationCustomNumber" aria-describedby="inputGroupPrepend" required>
                    <div class="invalid-feedback">
                      Please enter a valid number.
                    </div>
                  </div>
                </div>
                <div class="col-md-12">
                  <label for="validationCustom03" class="form-label">Street Address</label>
                  <input type="text" class="form-control" name="street" id="validationCustom03" required>
                  <div class="invalid-feedback">
                    Please provide a valid street address.
                  </div>
                </div>
                <div class="col-md-6">
                  <label for="suburblabel" class="form-label">Suburb</label>
                  <input type="text" class="form-control" name="suburb" id="suburblabel" required>
                  <div class="invalid-feedback">
                    Please provide a valid suburb.
                  </div>
                </div>
                <div class="col-md-3">
                  <label for="validationCustom04" class="form-label">State</label>
                  <select class="form-select" id="validationCustom04" name="state" required>
                    <option selected disabled value="">Choose...</option>
                      <option value="NSW">NSW</option>
                      <option value="VIC">VIC</option>
                      <option value="QLD">QLD</option>
                      <option value="WA">WA</option>
                      <option value="SA">SA</option>
                      <option value="TAS">TAS</option>
                      <option value="ACT">ACT</option>
                      <option value="NT">NT</option>
                      <option value="Other">Other</option>
                  </select>
                  <div class="invalid-feedback">
                    Please select a valid state.
                  </div>
                </div>
                <div class="col-md-3">
                  <label for="validationCustom05" class="form-label">Postcode</label>
                  <input type="number" name="postcode" min="1000" max="9999" class="form-control" id="validationCustom05" required>
                  <div class="invalid-feedback">
                    Please provide a valid postcode.
                  </div>
                </div>
                <div class="col-12">
                  <button class="btn btn-primary" type="submit">Submit form</button>
                </div>
              </form>


              <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
              <script>
                (() => {
                  'use strict'

                  // Fetch all the forms we want to apply custom Bootstrap validation styles to
                  const forms = document.querySelectorAll('.needs-validation')

                  // Loop over them and prevent submission
                  Array.from(forms).forEach(form => {
                    form.addEventListener('submit', event => {
                      if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                      }

                      form.classList.add('was-validated')
                    }, false)
                  })
                })()

              </script>
              </main>
          </div>
          <div class="col-lg-4 col-md- border rounded">
            <h3 class="my-2">Order Summary</h3>
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
                      <th>Qty</th>
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
          </div>
        </div>
                  </div>
        
        <?php include('footer.php'); ?>
    </div>
  </body>
</html>