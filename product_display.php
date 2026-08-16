<?php 
$connection = mysqli_connect('localhost', 'root', '', 'assignment1');
?>
<div class="container-flex">
    <div class="row">
        <div class="col-4 bg-body-tertiary rounded p-2">
            <form id="filter">
                <?php
                    $query_string = "select distinct category from products";
                    $result = mysqli_query($connection, $query_string);
                    $num_rows = mysqli_num_rows($result);

                    if ($num_rows > 0 ) {
                        echo "<ul class='list-unstyled'>";
                        while ($row = mysqli_fetch_array($result)) {
                            // get subcategories of category
                            $s_query = "select distinct subcategory from products where category = '".$row['category']."'";
                            $s_result = mysqli_query($connection, $s_query);
                            $s_num_rows = mysqli_num_rows($s_result);
                            echo "<li class='mb-1'>";
                            echo "<a class='btn' href='?category=".$row['category']."'>";
                            echo $row['category'];
                            echo "</a>";
                            echo "<a class='btn' data-bs-toggle='collapse' href='#".str_replace(' ', '', $row['category'])."' role='button' aria-expanded='false' aria-controls='".str_replace(' ', '', $row['category'])."collapse'>";
                            echo '<i class="bi bi-caret-down-fill"></i>';
                            echo "</a>";

                            echo "<div id='".str_replace(' ', '', $row['category'])."' class='collapse'>";
                            if ($s_num_rows > 0) {
                                echo "<ul class='btn-toggle-nav'>";
                                while ($s_row = mysqli_fetch_array($s_result)) {
                                    echo "<li class='mb-1'>";
                                    echo "<a class='btn rounded' href='?category=".$row['category']."&subcategory=".$s_row['subcategory']."'>".$s_row['subcategory']."</a>";
                                    echo "</li>";
                                }
                                echo "</ul>";
                            }
                            echo "</div>";
                            echo "</li>";
                            
                        }
                        echo "</ul>";
                    }
                ?>
            </form>

        </div>
        
            <div class="col-8 container">
                <?php 
                if (isset($_REQUEST['product_search'])) {
                    $search = $_REQUEST['product_search'];
                    $query_string = "select * from products where product_name like '%$search%'";
                }
                else if (isset($_REQUEST['category'])) {
                    $category = $_REQUEST['category'];
                    $query_string = "select * from products where category = '$category'";
                    if (isset($_REQUEST['subcategory'])) {
                        $subcategory = $_REQUEST['subcategory'];
                        $query_string = "select * from products where category = '$category' and subcategory = '$subcategory'";
                    }
                }
                else {
                    $query_string = "select * from products order by product_name desc";
                }
                
                
                $result = mysqli_query($connection, $query_string);
        
                if (mysqli_num_rows($result) > 0) {
                    $row_count = 1;
                    
                    while ($row = mysqli_fetch_array($result)) {
                        //echo $row_count;
                        if ($row_count % 3 == 1) {
                            //echo "new row";
                            echo "<div class='row justify-content-between gx-4 mb-2'>";
                        }
    
            ?>
                    <div class="col-xl-4 mb-2 mb-lg-0">
                        <div class="item-card card p-3">
                            <img src="img/cheddar.jpg" class="card-img"/>
                            <div class="d-inline-flex justify-items-between">
                                <div class="col-6">
                                    <h5 class="mb-0"><?php echo $row["product_name"]; ?></h5>
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
                            
                            <form method="post" action="index.php" class="d-grid mt-1">
                                <?php 
                                echo "<input type='hidden' name='product_id' value=".$row['product_id']."/>";
                                //echo "<input type='hidden' name='product_name' value=".$row['product_name']."/>";
                                //echo "<input type='hidden' name='unit_price' value=".$row['unit_price']."/>";


                                if ($row['in_stock'] == 0) {
                                    echo "<input type='submit' value='Out of Stock' class='btn btn-success disabled'>";
                                }
                                else {
                                    echo "<input type='submit' value='Add to Cart' class='btn btn-success'>";
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
            
            mysqli_close($connection);
            ?>
            </div>
    </div>  
</div>