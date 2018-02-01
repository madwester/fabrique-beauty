<?php $page_title = "Fabrique Beauty - Face Care";?>
<?php include("build/includes/database.php"); ?>
<?php include("build/includes/login-modal.php"); ?>
<?php include("build/includes/head.php");?>
<?php include("build/includes/navigation.php");?>
<main>
    
    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-2 side-bar">
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
            <div class="col-lg-10 col-md-10 content">
                <div class="row product-row">
                    <div class="col-lg-3 col-md-3 product-item">
                        <img src="http://via.placeholder.com/200x200">
                        <div class="product-caption">
                            <a href="#"><h4>Title</h4></a>
                            <h6>Price</h6>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 product-item">
                    <img src="http://via.placeholder.com/200x200">
                        <div class="product-caption">
                            <a href="#"><h4>Title</h4></a>
                            <h6>Price</h6>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 product-item">  
                        <img src="http://via.placeholder.com/200x200">
                        <div class="product-caption">
                            <a href="#"><h4>Title</h4></a>
                            <h6>Price</h6>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 product-item">
                    <img src="http://via.placeholder.com/200x200">
                        <div class="product-caption">
                            <a href="#"><h4>Title</h4></a>
                            <h6>Price</h6>
                        </div>
                    </div>
            </div>
            <div class="row product-row">
                    <div class="col-lg-3 col-md-3 product-item">
                        <img src="http://via.placeholder.com/200x200">
                        <div class="product-caption">
                            <a href="#"><h4>Title</h4></a>
                            <h6>Price</h6>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 product-item">
                    <img src="http://via.placeholder.com/200x200">
                        <div class="product-caption">
                            <a href="#"><h4>Title</h4></a>
                            <h6>Price</h6>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 product-item">  
                        <img src="http://via.placeholder.com/200x200">
                        <div class="product-caption">
                            <a href="#"><h4>Title</h4></a>
                            <h6>Price</h6>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 product-item">
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

