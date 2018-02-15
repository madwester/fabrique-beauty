<?php session_start();

include("autoloader.php");
include("build/includes/database.php");
include("build/includes/head.php");
include("build/includes/navigation.php");
include("build/includes/login-modal.php");

$page_title = "Fabrique Beauty - My Account";

?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php 
                // print username if logged in
              if( $_SESSION["account_id"] ){
                echo "<h3> Hello " .  $_SESSION["name"] . "</h3>";
              }            
            echo '<a href="build/includes/logout.php"><button type="submit" name="logout-btn" 
            class="btn btn-default btn-modal btn-fabrique">Log out</button></a>';?>
        </div>
    </div>
</div>
<?php include("build/includes/footer.php");?>   