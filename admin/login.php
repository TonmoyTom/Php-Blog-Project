
<?php
include_once("../library/session.php");
Session::init();
include_once("includes/authheader.php");
include_once("../config/config.php");
include_once("../library/database.php");
include_once("../helpers/format.php");
$db = new Database();
$fm = new Format();


if(isset($_POST['submit'])){
    
    $username = filter_input(INPUT_POST, 'username',FILTER_SANITIZE_STRING);
    $pass = filter_input(INPUT_POST, 'password',FILTER_SANITIZE_STRING);
    $password = sha1($pass);

    $username = mysqli_real_escape_string($db->link,$username);
    $password = mysqli_real_escape_string($db->link,$password);

    if(empty($username)){
        $_SESSION['username'] = " Username & Email not Found";
    }elseif(empty($pass)){
        $_SESSION['password'] = "Passowrd  not Found";
    }else{
        $query = "SELECT * FROM  user where (username='$username' OR email = '$username') AND password='$password'";
        $result = $db->selectDT($query);
      
            if($result != false){
                $value = mysqli_fetch_array($result);
                $row = mysqli_num_rows($result);
                if($value['approve'] == 1){
                    $_SESSION['status'] = "Please Contact to Admin";
                    $_SESSION['status_code'] = "error";
                }else{
                    if($row > 0){
                        $_SESSION['username'] = $value['username'];
                        $_SESSION['userId'] = $value['id'];
                        $_SESSION['userRole'] = $value['role'];
                        Session::set("login", true);
                        // Session::set("user_id", $value["id"]);
                        // Session::set("username", $value["username"]);
                        // Session::set("user_role", $value["role"]);
                        header("location: index.php");
                        // print_r($_SESSION);
                      }else{
                       
                          echo "Not Match";;
                      }
                }
               
            }else{
                $_SESSION['status'] = "Username And Password Not Match";
                $_SESSION['status_code'] = "info";
                
            }
    }


    
}

?>

<?php
if(isset($_SESSION['userId']) == true){
    header("location: index.php");
}else{

?>
<div id="app">
    <section class="section">
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                    <div class="login-brand">
                        <img src="assets/img/avatar/logo.png" alt="logo" width="100" class="shadow-light rounded-circle">
                    </div>
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Login</h4>
                        </div>
                        <div class="card-body">
                           
                            <form method="POST" action="login.php" class="needs-validation" novalidate="">
                                <div class="form-group">
                                    <?php if(isset($_SESSION['username']) && $_SESSION['username'] != ''){
                                        ?>
                                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                            <?php echo $_SESSION['username'];?>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                         </div>
                                        <?php
                                         } 
                                         unset($_SESSION['username']);
                                        ?>

                                    <label for="email">Email & Name</label>
                                    <input id="email" type="text" class="form-control" name="username" tabindex="1" required autofocus>
                                    <div class="invalid-feedback">
                                        Please fill in your email
                                    </div>
                                </div>
                                <div class="form-group">
                                <?php if(isset($_SESSION['password']) && $_SESSION['password'] != ''){
                                        ?>
                                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                            <?php echo $_SESSION['password'];?>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                         </div>
                                        <?php
                                         } 
                                         unset($_SESSION['password']);
                                        ?>
                                    <div class="d-block">
                                        <label for="password" class="control-label">Password</label>
                                        <div class="float-right">
                                            <a href="forgot-password.php" class="text-small">
                                            Forgot Password?
                                            </a>
                                        </div>
                                    </div>
                                    <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                                    <div class="invalid-feedback">
                                        please fill in your password
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="remember" class="custom-control-input" tabindex="3" id="remember-me">
                                        <label class="custom-control-label" for="remember-me">Remember Me</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" name="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                    Login
                                    </button>
                                </div>
                            </form>
                            <div class="text-center mt-4 mb-3">
                                <div class="text-job text-muted">Login With Social</div>
                            </div>
                            <div class="row sm-gutters">
                                <div class="col-6">
                                    <a class="btn btn-block btn-social btn-facebook"><span class="fab fa-facebook"></span> Facebook</a>
                                </div>
                                <div class="col-6">
                                    <a class="btn btn-block btn-social " style="background-color: red;"><span class="fab fa-google"></span> Google</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5 text-muted text-center">
                        Don't have an account? <a href="register.php">Create One</a>
                    </div>
                    <div class="simple-footer">
                        Copyright &copy; CodiePie 2020
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>



<?php
}
include_once("includes/authfootter.php");


?>