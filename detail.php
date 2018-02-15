<?php
session_start();
include("autoloader.php");
include("build/includes/database.php");
include("build/includes/login-modal.php");
include("build/includes/head.php");
include("build/includes/navigation.php");

//php receives GET parameters as an array $_GET
//check if product id has been set via a get request
if( isset($_GET["id"]) ){
  $product_id = $_GET["id"];
  
    //create instance of products class
    $products = new Products();
    $product = $products -> getProductById( $product_id );
}
else{
  
}

?>

<?php
foreach( $product as $item ){
    $name = $item["name"];
    $brand = $item["brand"];
    $description = $item["description"];
    $price = $item["price"];
    $size = $item["size"];
    $image = $item["image"];
}
?>
<div class="container">
    <div class="row detail-row">
        <div class="col-md-4">
            <?php echo "<img class=\"img-responsive\" src=\"/build/images/products-600x600/$image\">"; ?>
        </div>
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-6">
                    <h2><?php echo $name ?></h2>
                </div>
                <div class="col-md-6">
                    <h2 class="price"><?php echo $price ?></h2>
                </div>
            </div>
            <h3><?php echo $brand ?></h3>
            <h3><?php echo $size ?></h3>
            <p><?php echo $description ?></p>
            <input type="text" name="quantity" value="1">
            <input type="submit" class="btn btn-fabrique" name="add" data-function="basket" value="Add to basket">
        </div>
    </div>
</div>
<div class="container basket">
    <h4>Shopping cart details</h4>
    <div class="row">
        <div class="col-md-4">
            <p>Product name</p>
        </div>
        <div class="col-md-2">
            <p>Quantity</p>
        </div>
        <div class="col-md-2">
            <p>Price</p>
        </div>
        <div class="col-md-2">
            <p>Total price</p>
        </div>
        <div class="col-md-2">
            <p>Remove item</p>
        </div>
    </div>
</div>

<?php
if(!empty($_SESSION["cart"])){
    $total = 0;
    foreach($_SESSION["cart"] as $key => $value){
         
    }
}
?>

<?php 
include("build/includes/footer.php");
?>