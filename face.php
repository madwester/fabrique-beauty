<?php 
session_start();
include("autoloader.php");
include("build/includes/database.php");
include("build/includes/login-modal.php");
include("build/includes/head.php");
include("build/includes/navigation.php");

$page_title = "Fabrique Beauty - Face Care";

//create instance of products class
$products = new Products();
$product_items = $products -> getProducts();

?>

<main>
    <div class="container-fluid bread">
        <h6>Category > Sub Category</h6>
    </div>
    <div class="container-fluid">
        <div class="row">
            <nav class="col-lg-2 col-md-2 col-sm-3 side-bar">
                <ul class="nav nav-stacked category-list">
                    <?php
                    //make sure to check the length when using foreach
                        if (count( $cat_array ) > 0){
                            foreach( $cat_array as $cat_nav_item ){
                                $id = $cat_nav_item["id"];
                                $name = $cat_nav_item["name"];
                                $count = $cat_nav_item["cat_count"];
                                echo "<li><a href=\"index.php?category=$id\">$name</a> </li>";
                            }
                        }
                    ?>
                    <li><a href="#">Cleaners</a></li>
                    <li><a href="#">Moisturisers</a></li>
                    <li><a href="#">Mask</a></li>
                    <li><a href="#">Eye Care</a></li>
                </ul>
            </nav>
            <div class="col-lg-10 col-md-10 col-sm-9 content\">
                <div class="row product-row">
                    <?php
                    if( count($product_items) > 0){
                        foreach( $product_items as $product ){
                            $id = $product["product_id"];
                            $name = $product["name"];
                            $price = $product["price"];
                            $description = $product["description"];
                            $brand = $product["brand"];
                            $image = $product["image"];
                        echo "  <div class=\"col-lg-2 col-md-3 col-sm-4 col-xs-6 product-item\">
                                <img class=\"img-responsive\" src=\"/build/images/products-600x600/$image\">
                                <div class=\"product-caption\">
                                    <a href=\"#\">
                                    <h4>$name</h4></a>
                                    <h6>$price</h6>
                                </div>
                            </div>";
                        }
                    }
    ?>
                </div>
            </div>
    </div>
</div>
</main>
<?php include("build/includes/footer.php");?>