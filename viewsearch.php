<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Search Results</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="css/main.css">
  </head>
  <body>
    <div class="container-fluid">
        <?php include('header.php'); ?>
        <div class="container col-lg-8">
            <main>
                
            <?php

            //Procedural style
            $connection = mysqli_connect('localhost', 'root', '', 'assignment1'); // hostname, username, password, dbname
            
            $search = $_REQUEST['product_search']; // get submitted form data

            $query_string = "select * from products where product_name like '%$search%'";
            
            $result = mysqli_query($connection, $query_string); // retrieve MySQL
            
            $num_rows = mysqli_num_rows($result);
            echo "Displaying the results using associative array";

            // mysql_fetch_assoc(): This function will return a row as an associative array where the column names will be the keys storing corresponding value.
            if ($num_rows > 0 ) {
                $row_count = 1;
                while ($row = mysqli_fetch_array($result)) {
                    if ($row_count % 3 == 1) {
                      //echo "new row";
                      echo "<div class='row justify-content-between gx-4 mb-2'>";
                  } ?>

                  <div class="col-xl-4 mb-2 mb-lg-0">
                        <div class="item-card card p-3">
                            image here
                            <div class="d-inline-flex justify-items-between">
                                <div class="col-6">
                                    <h4 class="mb-0"><?php echo $row["product_name"]; ?></h4>
                                    <p><?php echo $row["unit_quantity"]; ?></p>
                                </div>
                                <div class="col-6 text-end">
                                    <h4 class="mb-0"><?php echo $row["unit_price"]; ?></h4>
                                    <sup>
                                        <?php
                                            if ($row["in_stock"] > 0) {
                                                echo "In stock";
                                            }
                                            else {
                                                echo "Out of stock";
                                            }
                                        ?>
                                    </sup>
                                </div>
                            </div>
                            
                            <form method="post" class="d-grid mt-1">
                                <?php if ($row['in_stock'] == 0) {
                                    echo "<input type='submit' name='row' value='Out of Stock' class='btn btn-success disabled'>";
                                }
                                else {
                                    echo "<input type='submit' name='row' value='Add to Cart' class='btn btn-success'>";
                                }
                                ?>
                            </form>
                        </div>
                    </div>
                    <?php
                    if ($row_count % 3 == 0) {
                        echo "</div>";
                    }
                    $row_count += 1;
                }
            }
            else {
                echo "<div class='col-lg-8 text-center container-fluid'>";
                echo "<h1>No products found.</h1>";
                echo "</div>";
            }
            
            mysqli_close($connection);

            ?>
  
                    
            </div>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
            
        
            </main>
        </div>
        <?php include('footer.php'); ?>
    </div>
  </body>
</html>