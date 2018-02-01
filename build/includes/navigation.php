    <body>
      <nav class="navbar-default">
        <div class="container-fluid">
            <div class="row">
              <!-- Hamburger only is xs -->
              <div class="navbar-header col-xs-2 hidden-sm hidden-md hidden-lg">
                <button type="button" class="navbar-toggle collapsed navbar-left" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
              </div>
                <div class="col-lg-9 col-md-6 col-sm-6 col-xs-5 nav-logo">
                    <a href="index.php">
          <img class="img-responsive" src="build/images/logo-black.png">
      </a>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-5 nav-search">
                  <form>
                    <input type="text" class="search-input" name="search" placeholder="Search..">
                  </form>
                </div>
                </div>
            </div>
       
        </nav>
        </div>
        <nav class="navbar navbar-default navbar-static-top">
  <div class="container-fluid">
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="../face.php">face<span class="sr-only">(current)</span></a></li>
        <li><a href="#">body</a></li>
        <li><a href="#">hair</a></li>
        <li><a href="#">makeup</a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
        <li class="nav-button contact-btn"><a href="../contact.php">contact <i class="icon ion-ios-arrow-forward"></i></a></li>
        <?php
        //check if user is logged in
        if(isset($_SESSION["userid"])){
          echo '<li class="nav-button login-btn"><a href="#">my account (1)<i class="icon ion-ios-arrow-forward"></i></a></li>';            
        }
        else{
          echo '<li class="nav-button login-btn"><a href="#">register / login <i class="icon ion-ios-arrow-forward"></i></a></li>';
        }
        ?>
      </ul>
    </div>
  </div>
</nav>