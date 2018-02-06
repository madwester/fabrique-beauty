<?php session_start();
$page_title = "Fabrique Beauty - My Account";
include("build/includes/database.php");
include("build/includes/head.php");
include("build/includes/navigation.php");
include("build/includes/login-modal.php");
$name = $_POST["name"];
?>
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <?php 
                echo $name;            
            ?>
        </div>
        <div class="col-md-4">
            <?php echo '<a href="build/includes/logout.php"><button type="submit" name="logout-btn" class="btn btn-default btn-modal btn-login">Log out</button></a>';?>
        </div>
    </div>
</div>
<?php include("build/includes/footer.php");?>   