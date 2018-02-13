</body>
<?php
$nav = new Navigation();
$nav_items = $nav -> getTopCategories();
?>
<footer class="footer">
        <div class="container-fluid">
            <div class="row wrap-foot">
              <div class="col-md-6 col-sm-8 col-xs-12 category-foot">
                <div class="col-md-4 col-sm-12 col-foot">
                  <h6>Products</h6>
                  <ul>
                    <?php
                    if(count($nav_items) > 0){
                      foreach($nav_items as $item){
                        $navId = $item["category_id"];
                        $navName = $item["category_name"];
                        echo "<li><a href=\"category-view.php?cat_id=$navId\">$navName</a></li>";
                      }
                    }
                    ?>
                  </ul>
                </div>
                <div class="col-md-4 col-sm-12 col-foot">
                  <h6>Info</h6>
                  <ul>
                    <li><a href="#">Terms & Conditions</a></li>
                    <li><a href="#">FAQ</a></li>
                    <li><a href="#">Shipping & Returns</a></li>
                  </ul>
                </div>
                <div class="col-md-4 col-sm-12 col-foot">
                  <h6>Contact</h6>
                  <ul>
                    <li><a href="mailto:info@fabriquebeauty.com">info@fabriquebeauty.com</a></li>
                    <li><a href="tel:0212345678">+61 (02) 1234 567</a></li>
                    <li><a href="https://fabrique-beauty-madwester.c9users.io/phpmyadmin">Database</a></li>
                  </ul>
                </div>
              </div>
              <div class="col-md-6 col-sm-4 col-xs-12 logo-foot">
                 
                 <img src="/build/images/logo-white.png">
                 <div class="social-media">
                    <ul class="social-media-list">
                        <i class="fa fa-facebook" aria-hidden="true"></i>
                        <i class="fa fa-instagram" aria-hidden="true"></i>
                        <i class="fa fa-twitter" aria-hidden="true"></i>
                    </ul>
                </div>
              </div>
            </div>
        </div>
    </footer>
    
<script src="/compontents/jquery/dist/jquery.min.js"></script>
<script src="/compontents/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="/build/js/main.js"></script>
