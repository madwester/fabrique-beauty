<?php 
session_start();
include("autoloader.php");
include("build/includes/database.php");
include("build/includes/login-modal.php");
include("build/includes/head.php");
include("build/includes/navigation.php");

$page_title = "Fabrique Beauty";

//create instance of products class
$products = new Products();
$product_items = $products -> getProductsByCategory();

if($_GET["cat_id"]){
    $id = $_GET["cat_id"];
    $categories = new Navigation();
    $cat_array = $categories -> getSubCategories($id);
    $activeCat = $categories -> getActiveCategory($id);
}

?>


<main>

    <div class="container-fluid">
        <div class="row shop-row">
            <nav class="col-lg-2 col-md-2 col-sm-3 side-bar">
                <ul class="nav nav-stacked category-list">
                    <?php
                    if(count($cat_array) > 0){
                      foreach($cat_array as $item){
                        $catId = $item["category_id"];
                        $catName = $item["category_name"];
                        if($activeCat["child_id"] == $_GET["cat_id"]){
                            $active = "class = \"active\"";
                        }
                        else{
                            $active = "";
                        }
                        echo "<li $active><a href=\"category-view.php?cat_id=$catId\">$catName</a></li>";
                      }
                    }
                    ?>
                </ul>
            </nav>
            <div class="col-lg-10 col-md-10 col-sm-9 content">
                <div class="row product-row">
                    <?php
                    if(count($product_items) > 0){
                        foreach( $product_items as $product ){
                            $id = $product["product_id"];
                            $name = $product["name"];
                            $price = $product["price"];
                            $description = $product["description"];
                            $brand = $product["brand"];
                            $image = $product["image"];
                        echo " <div class=\"col-lg-2 col-md-3 col-sm-4 col-xs-6 product-item\">
                                <img class=\"img-responsive\" src=\"/build/images/products-600x600/$image\">
                                <div class=\"product-caption\">
                                    <a href=\"detail.php?id=$id\"><h4>$name</h4></a>
                                    <h6>$brand</h6>
                                    <h6 class=\"price\">$price</h6>
                                </div>
                            </div>";
                        }
                    }
                    else{
                        echo 'no products exist';
                    }
                    ?>
                </div>
            </div>
    </div>
</div>
</main>
<?php include("build/includes/footer.php");?>