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
            echo "<h4>Search result for your search: <strong>$searchvalue</strong></h4>";
          }
          ?>
        </div>
      </div>
      <?php
      if($result -> num_rows > 0){
        while( $row = $result -> fetch_assoc() ){
          $id = $row["product_id"];
          $name = $row["name"];
          $brand = $row["brand"];
          $price = $row["price"];
          $image = $row["image"];
          echo "<div class=\"row search-result\">
            <div class=\"col-md-2\">
              <img class=\"img-responsive\" src=\"/build/images/products-600x600/$image\">
            </div>
            <div class=\"col-md-10\">
              <h4>$name</h4>
              <h5>$brand</h5>
              <h5 class=\"price\">$price</h5>
              <a href=\"detail.php?id=$id\">Read More</a>
            </div>
          </div>";
        }
      }
      else{
        echo "Sorry, we couldn't find the product you searched for.";
      }
      ?>
    </div>
<?php include("build/includes/footer.php");?>   