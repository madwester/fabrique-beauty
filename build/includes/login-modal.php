<?php
//
//LOGIN PROCESS
//
if($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["login-name"] == "login-value"){
    $email = $_POST["email"];
    $password = $_POST["password"];
    $query = "SELECT account_id, name, email, password FROM accounts WHERE email=?";
    $statement1 = $connection -> prepare($query);
    $statement1 -> bind_param("s", $email);
    //execute runs the query with the parameter, it return true or false
    if( $statement1 -> execute() ){
        $result = $statement1 -> get_result();
        //check if a result is returned (number of rows)
        if( $result -> num_rows > 0 ){ 
            //if greater than zero, user exist
            $user = $result -> fetch_assoc(); //converting result to associative array, an array that doesnt have index, it has names instead
            $account_id = $user["account_id"];
            $email = $user["email"];
            $name = $user["name"];
            $hash = $user["password"];
            //then we have to check if password matches
            if( password_verify( $password, $hash) ){
                //password is correct, so we are creating user session variables
                $_SESSION["account_id"] = $account_id;
                $_SESSION["name"] = $name;
                $_SESSION["email"] = $email;
            }
            else{
                //password is incorrect
                echo "password is incorrect";
            }
            //log user in 
        }
        else{
            //account doesnt exist
            echo "account doesn't exist";
        }
    }
}
?>

<?php
//
// REGISTER PROCESS
//
if($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["register-name"] == "register-value"){
    //array to store errors in registration
    $errors = array();
    $name = $_POST["name"];
    //verify so the email address is valid 
    $email = $_POST["email"];
    if( filter_var($email,FILTER_VALIDATE_EMAIL) == false ){
        $errors["email"] = "Invalid email address";
    }
    //check password
    $password1 = $_POST["password1"]; //storing first password
    $password2 = $_POST["password2"]; //storing second password
    $password_errors = array();
    if( $password1 !== $password2 ){
        $password_errors["equal"] = "Your two passwords does not match!";
    }
    if( strlen($password1) < 8 || strlen($password2) < 8 ){
        $password_errors["length"] = "Your password must be at least 8 characters. Try again!";
    }
    if( count($password_errors) > 0 ){
        $errors["password"] = implode(" ,", $password_errors);
    }
    //count the numbers of errors, if 0 then proceed
    if(count($errors) == 0){
        //hash the password
        $hashed = password_hash($password, PASSWORD_DEFAULT);
        //create a query
        $query = "INSERT INTO accounts 
        (name, email, password, active)
        VALUES(?,?,?,1)";
        $statement = $connection -> prepare($query); 
        $statement -> bind_param("sss",$name, $email, $hashed); //sss = string, string, string
        //accounts have been created
        if( $statement -> execute() ){
            $message["type"] = "success";
            $message["text"] = "Congratulations! Your account has successfully been registered!";
            $id = $connection -> insert_id;
            $_SESSION["userid"] = $id; //userid is a string 
            $_SESSION["name"] = $name; //name is a string 
        }
        else{
            //errno is one of the properties of the class mysqli_connect
            if($connection -> errno == "1022"){
                //either email or username exist in the database
                $dberror = $connection -> error;
                if(strstr($dberror,"username")){
                    //duplicate username
                    $errors["username"] = "Sorry, the username already exist, choose another one!";
                }
                elseif(strstr($dberror,"email")){
                    //duplicate email
                    $errors["email"] = "Email already exist..";
                }
            }
            $message["type"] = "danger";
            $message["text"] = "We couldn't create your account..";
        }
    }
}
?>
<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <div class="wrap-tabs">
    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
      <li role="presentation" class="active"><a href="#register" aria-controls="register" role="tab" data-toggle="tab">Create new account</a></li>
      <li role="presentation"><a href="#signin" aria-controls="signin" role="tab" data-toggle="tab">Sign in</a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
            <!-- REGISTER TAB -->
            <div role="tabpanel" class="tab-pane active" id="register">
              <h4 class="modal-title">Hey there, beauty lover!</h4>
              <p>Welcome to our community of beauty chasers, we only need a few details from you before we can log you in!</p>
              <form id="register-form" method="post" action="/face.php">
                <?php
                            if( count($message) > 0 ){
                                $class = "alert-" . $message["type"];
                                $text = $message["text"];
                                echo "<div class=\"alert $class\">$text</div>";
                            }
                        ?>
                        <div class="form-group">
                            <input class="form-control" type="text" name="name" id="register-name" placeholder="Your name"> 
                        </div>
                        <!--Email-->
                        <?php
                            if($errors["email"]){
                                $error_class = "has-error";
                            }
                            else{
                                $error_class = "";
                            }
                        ?>
                        <div class="form-group <?php echo $error_class; ?>">
                            <input class="form-control" type="email" name="email" id="register-email" placeholder="Your email.." value="<?php echo $email;?>"> 
                            <span class="help-block"><?php echo $errors["email"]; ?></span>
                        </div>
                        <!--Password-->
                        <?php
                            if($errors["password"]){
                                $error_class = "has-error";
                            }
                            else{
                                $error_class = "";
                            }
                        ?>
                        <div class="form-group <?php echo $error_class; ?>">
                            <input class="form-control" type="password" name="password1" id="password1" placeholder="Password..">
                            <input class="form-control" type="password" name="password2" id="password2" placeholder="Retype Password..">
                            <span class="help-block"><?php echo $errors["password"]; ?></span>
                        </div>
                <button type="submit" value="register-value" name="register-name" class="btn btn-default btn-modal btn-yellow">Create an account</button>
              </form>
                  </div>
      <div role="tabpanel" class="tab-pane" id="signin">
        <h5 class="modal-title">Welcome back, beauty friend!</h5>
            <div class="login-group">
                <form id="login-form" method="post" action="/category-view.php?cat_id=1">
                    <div class="form-group">
                        <input type="text" class="form-control" id="email" name="email" placeholder="Your email">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Your password">
                        <button type="submit" value="login-value" name="login-name" class="btn btn-default btn-modal btn-yellow">Log in</button>
                        <button type="submit" name="#" class="btn btn-default btn-modal btn-gray">Forgot your password?</button>
                    </div>
                </form>
            </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
