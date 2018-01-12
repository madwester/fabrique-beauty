<?php $page_title = "Fabrique Beauty";?>
<?php include("includes/head.php");?>
<?php include("includes/navigation.php");?>
<div class="container-fluid feature">
  <img src="images/nature.jpg" class="img-responsive">
  <div class="about col-md-12">
    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's 
    standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make 
    a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, 
    remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing 
    Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions 
    of Lorem Ipsum.
    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's 
    standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make 
    a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, 
    remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing 
    Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions 
    of Lorem Ipsum.</p>
  </div>
</div>
<?php include("includes/footer.php");?>   
    <!-- MODAL !! -->
    <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              </div>
              <div class="modal-body">
                <h4 class="modal-title">Welcome back!</h4>
                <div class="login-group">
                    <input type="text" class="form-control" id="userid" name="userid" placeholder="Username">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                    <p>
                      <a href="#">Forgot your password?</a>
                      </p>
                    <p>  
                      <button type="submit" name="login" class="btn btn-default btn-modal btn-login">Log in</button>
                    </p>
                    <p>  
                      <button type="submit" name="register" class="btn btn-default btn-modal btn-register">Create an account</button>
                    </p>
                </div>
              </div>
            </div><!-- /.modal-content -->
          </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
        <script src="/compontents/jquery/dist/jquery.min.js"></script>
        <script src="/compontents/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="js/main.js"></script>
    </body>
</html>