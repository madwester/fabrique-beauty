<?php session_start();
include("autoloader.php");
include("build/includes/database.php");
include("build/includes/login-modal.php");
$page_title = "Fabrique Beauty - Search result";

if( isset($_GET["search"]) ){
  $search_words = "%" . $_GET["search"] . "%";
  //query
  $search_query = "SELECT product_id,name,price,brand,image FROM products WHERE name LIKE ? OR description LIKE ?";
  $statement = $connection -> prepare($search_query);
  $statement -> bind_param("ss",$search_words, $search_words);
  $statement -> execute();
  $result = $statement -> get_result();
}
?>
<!doctype html>
<html>
<?php
include("build/includes/head.php");
include("build/includes/navigation.php");
?>
<div class="container">
      <div class="row">
        <div class="col-md-12">
          <?php
          if( isset($searchvalue) ){
            echo "<h4 class=\"search-result\">Search result '$searchvalue'</h4>";
          }
          ?>
        </div>
      </div>
      <div class="row search-row">
      <?php
      if($result -> num_rows > 0){
        while( $row = $result -> fetch_assoc() ){
          $id = $row["product_id"];
          $name = $row["name"];
          $brand = $row["brand"];
          $price = $row["price"];
          $image = $row["image"];
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
        echo "Sorry, we couldn't find the product you searched for.";
      }
      ?>
      </div>
    </div>
<?php include("build/includes/footer.php");?>   