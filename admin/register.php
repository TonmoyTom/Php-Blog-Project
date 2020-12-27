<?php
include_once("../library/session.php");
Session::init();
include_once("includes/authheader.php");
include_once("../config/config.php");
include_once("../library/database.php");
include_once("../helpers/format.php");
$db = new Database();
$fm = new Format();
$error = array();

if(isset($_POST['submit'])){
    
    $username = filter_input(INPUT_POST, 'username',FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email',FILTER_SANITIZE_STRING);
    $pass = filter_input(INPUT_POST, 'password',FILTER_SANITIZE_STRING);
    $pass_con = filter_input(INPUT_POST, 'password_confirm',FILTER_SANITIZE_STRING);
    $password = sha1($pass);
    $confirm_password = sha1($pass_con);
    if(empty($username)){
        $errorname =  "No user namResult Found";
    }
    elseif(empty($email)){
        $errorEmail =  "No email Result Found";
    }
    elseif(empty($pass)){
        $errorPass =  "No pass Result Found";
    }
    elseif($password !== $confirm_password){
        $_SESSION['status'] = "Your passwords did not match";
        $_SESSION['status_code'] = "error";
    }else{
        $username = mysqli_real_escape_string($db->link,$username);
        $email = mysqli_real_escape_string($db->link,$email);
        $password = mysqli_real_escape_string($db->link,$password);
        $query = "INSERT INTO user (username, email , password ) VALUES ('$username','$email','$password', )";

        $result = $db->Insert($query);
        if($result ){
            $_SESSION['status'] = "Insert Sussessfull";
            $_SESSION['status_code'] = "success";
            
        }else{
            $_SESSION['status'] = "Insert not Sussessfull";
            $_SESSION['status_code'] = "error";
        }
        echo " <script> window.location = 'login.php'; </script>";
    }

}
?>
<div id="app">
    <section class="section">
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
                    <div class="login-brand">
                    <img src="assets/img/avatar/logo.png" alt="logo" width="100" class="shadow-light rounded-circle">
                    </div>
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Register</h4>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="register.php">
                                    <div class="form-group ">
                                    <?php if(isset($errorname) && $errorname != ''){
                                        ?>
                                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                            <?php echo $errorname;?>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                         </div>
                                        <?php
                                         } 
                                       
                                        ?>
                                        <label >User Name</label>
                                        <input type="text" class="form-control" name="username">
                                    </div>
                                <div class="form-group">
                                <?php if(isset($errorEmail) && $errorEmail != ''){
                                        ?>
                                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                            <?php echo $errorEmail ;?>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                         </div>
                                        <?php
                                         } 
                                         
                                        ?>
                                    <label for="email">Email</label>
                                    <input id="email" type="email" class="form-control" name="email">
                                    <div class="invalid-feedback">
                                    </div>
                                </div>
                                <div class="row">
                                <?php if(isset($errorPass) && $errorPass != ''){
                                        ?>
                                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                            <?php echo $errorPass;?>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                         </div>
                                        <?php
                                         } 
                                     
                                        ?>
                                    <div class="form-group col-6">
                                        <label for="password" class="d-block">Password</label>
                                        <input id="password" type="password" class="form-control pwstrength" data-indicator="pwindicator" name="password">
                                        <div id="pwindicator" class="pwindicator">
                                            <div class="bar"></div>
                                            <div class="label"></div>
                                        </div>
                                    </div>
                                    <div class="form-group col-6">
                                    <?php if(isset($errorCpassword) && $errorCpassword != ''){
                                        ?>
                                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                            <?php echo $errorCpassword;?>
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                         </div>
                                        <?php
                                         } 
                                        
                                        ?>
                                        <label for="password2" class="d-block">Password Confirmation</label>
                                        <input id="password2" type="password" class="form-control" name="password_confirm">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" name="submit" class="btn btn-primary btn-lg btn-block">Register</button>
                                </div>
                            </form>
                        </div>
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

include_once("includes/authfootter.php");


?>