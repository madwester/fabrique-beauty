<?php 
session_start();
include("autoloader.php");
include("build/includes/database.php");
include("build/includes/login-modal.php");
include("build/includes/head.php");
include("build/includes/navigation.php");
include("build/includes/full-carousel.php");

$page_title = "Fabrique Beauty";

//create instance of products class
$topProducts = new Products();
$topProductsItems = $topProducts -> getTopProducts();

?>

<div class="container image-container">
  <div class="row image-row">
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
      <div class="image-col" style="background-image: url('build/images/image-row/hair-800-500.jpg');">
        <div class="image-caption left">
          <p>Aenean non elit felis. Donec at nisi auctor, congue ligula ut, molestie.</p>
          <a href="category-view.php?cat_id=3">hair <i class="icon ion-ios-arrow-forward"></i></a>
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
      <div class="image-col" style="background-image: url('build/images/image-row/plants-500-400.jpg');">
        <div class="image-caption centered">
          <p>Did you know that all our products are organic? Just because you shouldn't put anything but that on your skin.</p>
          <a href="category-view.php?cat_id=2">body <i class="icon ion-ios-arrow-forward"></i></a>
        </div>
      </div>
    </div>
  </div>
  <div class="row image-row">
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
      <div class="image-col" style="background-image: url('build/images/image-row/makeup-400-500.jpg');">
        <div class="image-caption centered">
          <p>Take your look into new dimensions. Find all the secrets to an amazingly beautiful make up.</p>
          <a href="category-view.php?cat_id=4">makeup <i class="icon ion-ios-arrow-forward"></i></a>
        </div>
      </div>
    </div>
    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
      <div class="image-col" style="background-image: url('build/images/image-row/micro-plants-800-500.jpg');">
          <div class="image-caption left">
          <p>Aenean non elit felis. Donec at nisi auctor, congue ligula ut, molestie.</p>
          <a href="category-view.php?cat_id=1">face <i class="icon ion-ios-arrow-forward"></i></a>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="container top-pick-container">
  <div class="row top-pick-row">
    <h3 class="top-pick-heading">Our top favourite products we need to tell you about.</h3>
<?php
if( count($topProductsItems) > 0){
    foreach( $topProductsItems as $topProduct ){
        $id = $topProduct["product_id"];
        $name = $topProduct["name"];
        $price = $topProduct["price"];
        $description = $topProduct["description"];
        $brand = $topProduct["brand"];
        $image = $topProduct["image"];
    echo "<div class=\"col-lg-2 col-md-4 col-sm-4 col-xs-6 top-pick-col\">
            <img src=\"/build/images/products-600x600/$image\">
              <div class=\"top-pick-caption\">
                  <a href=\"detail.php?id=$id\"><h4>$name</h4></a>
                  <h5>$brand</h5>
                  <h6 class=\"price\">$price</h6>
              </div>
        </div>";
    }
}
?>
  </div>
</div>

<?php include("build/includes/footer.php");?> 
</div>
</html>