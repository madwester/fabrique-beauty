<?php session_start();
$page_title = "Fabrique Beauty - My Account";
include("autoloader.php");
include("build/includes/database.php");
include("build/includes/head.php");
include("build/includes/navigation.php");
include("build/includes/login-modal.php");
?>
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <?php 
                // print username if logged in
              if( $_SESSION["name"] ){
                echo "<p> Hello " .  $_SESSION["name"] . "</p>";
              }            
            ?>
        </div>
        <div class="col-md-4">
            <?php echo '<a href="build/includes/logout.php"><button type="submit" name="logout-btn" class="btn btn-default btn-modal btn-fabrique">Log out</button></a>';?>
        </div>
    </div>
</div>
<?php include("build/includes/footer.php");?>   