<?php
include_once("../includes/header.php");
$userRole = $_SESSION['userRole'];
if($userRole != 1){
    echo " <script> window.location = '../index.php'; </script>";
}
$error = array();
if(!isset($_GET['userid']) || $_GET['userid'] == NULL){
    echo " <script> window.location = 'user.php'; </script>";
  }else{
      $userid = $_GET['userid'];
  }




if(isset($_POST['submit'])){
    
    $username = filter_input(INPUT_POST, 'username',FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email',FILTER_SANITIZE_STRING);
    $pass = filter_input(INPUT_POST, 'password',FILTER_SANITIZE_STRING);
    $pass_con = filter_input(INPUT_POST, 'password_confirm',FILTER_SANITIZE_STRING);
    $role = $_POST['role'];
    $password = sha1($pass);
    $confirm_password = sha1($pass_con);
    if(empty($username)){
        echo "No  username Result Found";
    }
    elseif(empty($email)){
        echo "No email Result Found";
    }
    elseif(empty($pass)){
        echo "No password Result Found";
    }
    elseif(empty($role)){
        echo "No role Result Found";
    }
    else if($password !== $confirm_password){
        echo "Your passwords did not match";
    }else{
        $username = mysqli_real_escape_string($db->link,$username);
        $email = mysqli_real_escape_string($db->link,$email);
        $password = mysqli_real_escape_string($db->link,$password);
        $role = mysqli_real_escape_string($db->link,$role);
        $query = "UPDATE user SET username='$username',email='$email',password='$password',role='$role',approve = 2 ,status = 2 WHERE id = '$userid'";
        //print_r($query);
        $result = $db->update($query);
        if($result ){
            echo " upadate Sussessfull";
        }else{
            echo "update not Sussessfull";
        }
        echo " <script> window.location = 'user.php'; </script>";
    }

}

?>



<div id="app">

<div class="main-content">
            <section class="section">
                <div class="section-header">
                    <h1>Post</h1>
                    <div class="section-header-breadcrumb">
                        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                        <div class="breadcrumb-item"><a href="#">User</a></div>
                        <div class="breadcrumb-item">Edit User</div>
                    </div>
                </div>
        <!-- Start app main Content -->
        <div class="section-body">
                    <h2 class="section-title">Add Post</h2>
                    <p class="section-lead">Insert Your Post.</p>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                            <div class="card-body">
                            <?php
								$querys = " SELECT * FROM user WHERE id= $userid";
                                $user = $db->selectDT($querys);
								if($user){
									while($result = $user->fetch_assoc()){		
								?>

                                <form action="edituser.php?userid=<?php echo $result['id'] ?>" method="POST" >
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Name</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" class="form-control" name="username" value="<?php echo $result['username'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Email</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" class="form-control" name="email"  value="<?php echo $result['email'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Password</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="password" class="form-control" name="password">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Confirm Password</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="password" class="form-control" name="password_confirm">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Role</label>
                                        <div class="col-sm-12 col-md-7">
                                            <select class="form-control " name="role">
                                                 <option>Select Role</option>
                                                    <option value="1"
                                                    <?php
                                                        if($result['role'] == 1){
                                                            echo "selected";
                                                        }
                                                        
                                                    ?>
                                                    >Admin</option>
                                                    <option value="2"
                                                    <?php
                                                    if($result['role'] == 2){
                                                        echo "selected";
                                                    }
                                                    
                                                    ?>
                                                    >Author</option>
                                                    <option value="3"
                                                    <?php
                                                    if($result['role'] == 3){
                                                        echo "selected";
                                                    }
                                                    
                                                    ?>
                                                    >Editor</option>
                                                    <option value="4"
                                                    <?php
                                                    if($result['role'] == 4){
                                                        echo "selected";
                                                    }
                                                    
                                                    ?>
                                                    >User</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                        <div class="col-sm-12 col-md-7">
                                            <button type="submit" name="submit" class="btn btn-primary">Edit  User</button>
                                        </div>
                                    </div>
                                </form>

                                <?php
                                    }
                                }
                                ?>
                                </div>
                            </div>
                            
                        </div>
                    </div>
            </section>
                </div>

        </div>
</div>
<?php
     include_once("../includes/footter.php");
     
     
     ?>    