<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
  </head>
  <body>
    <div class="container-fluid">
        <?php 
        session_start();

        if (isset($_POST['product_id'])) {
          $id = $_POST['product_id'];

          if (isset($_SESSION['cart'])) {
            if (array_key_exists($id, $_SESSION['cart'])) 
            {
              $_SESSION['cart'][$id] += 1;
            }
            else {
              $_SESSION['cart'][$id] = 1;
            }
          }
          else {
            $_SESSION['cart'] = array($id => 1);
          }
        }
        
        include('header.php'); ?>
        <div class="container col-lg-8 py-2">
            <main>
            <?php 
              if (isset($_REQUEST['product_search'])) {
                if ($_REQUEST['product_search'] != '') {
                  echo '<h2>Displaying products containing '.$_REQUEST['product_search'].'</h2>';
                }
              }
              else if (isset($_REQUEST['category'])) {
                  $category = $_REQUEST['category'];
                  $query_string = "select * from products where category = '$category'";
                  echo '<h2>Category: '.$_REQUEST['category'].'</h2>';
                  if (isset($_REQUEST['subcategory'])) {
                      $subcategory = $_REQUEST['subcategory'];
                      $query_string = "select * from products where category = '$category' and subcategory = '$subcategory'";
                      echo '<h4>Subcategory: '.$_REQUEST['subcategory'].'</h4>';
                  }
              }
              else {
                  $query_string = "select * from products order by product_name desc";
              }
            ?>
            <?php include('product_display.php');?>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
            </main>

        </div>
        <?php include('footer.php'); ?>
    </div>
  </body>
</html>