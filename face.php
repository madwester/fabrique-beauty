<?php 
session_start();
$page_title = "Fabrique Beauty - Face Care";
include("build/includes/database.php");
include("build/includes/login-modal.php");
include("build/includes/head.php");
include("build/includes/navigation.php");?>
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
                    <li><a href="#">Face</a></li>
                    <li><a href="#">Body</a></li>
                    <li><a href="#">Hair</a></li>
                    <li><a href="#">Makeup</a></li>
                </ul>
            </nav>
            <div class="col-lg-10 col-md-10 col-sm-9 content">
                <div class="row product-row">
                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 product-item">
                        <img src="http://via.placeholder.com/200x200">
                        <div class="product-caption">
                            <a href="#"><h4>Title</h4></a>
                            <h6>Price</h6>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 product-item">
                    <img src="http://via.placeholder.com/200x200">
                        <div class="product-caption">
                            <a href="#"><h4>Title</h4></a>
                            <h6>Price</h6>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 product-item">  
                        <img src="http://via.placeholder.com/200x200">
                        <div class="product-caption">
                            <a href="#"><h4>Title</h4></a>
                            <h6>Price</h6>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 product-item">
                    <img src="http://via.placeholder.com/200x200">
                        <div class="product-caption">
                            <a href="#"><h4>Title</h4></a>
                            <h6>Price</h6>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 product-item">
                        <img src="http://via.placeholder.com/200x200">
                        <div class="product-caption">
                            <a href="#"><h4>Title</h4></a>
                            <h6>Price</h6>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 product-item">
                    <img src="http://via.placeholder.com/200x200">
                        <div class="product-caption">
                            <a href="#"><h4>Title</h4></a>
                            <h6>Price</h6>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 product-item">  
                        <img src="http://via.placeholder.com/200x200">
                        <div class="product-caption">
                            <a href="#"><h4>Title</h4></a>
                            <h6>Price</h6>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12 product-item">
                    <img src="http://via.placeholder.com/200x200">
                        <div class="product-caption">
                            <a href="#"><h4>Title</h4></a>
                            <h6>Price</h6>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>
</main>
<?php include("build/includes/footer.php");?>   

