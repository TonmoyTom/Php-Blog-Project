<?php
include_once("../includes/header.php");
$error = array();


$profileid = $_SESSION['userId'];
$userRole = $_SESSION['userRole'];




if(isset($_POST['submit'])){
    
    $username = filter_input(INPUT_POST, 'username',FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email',FILTER_SANITIZE_STRING);
    $pass = filter_input(INPUT_POST, 'password',FILTER_SANITIZE_STRING);
    $pass_con = filter_input(INPUT_POST, 'password_confirm',FILTER_SANITIZE_STRING);
    $password = sha1($pass);
    $confirm_password = sha1($pass_con);
    if(empty($username)){
        echo "No username Result Found";
    }
    elseif(empty($email)){
        echo "No email Result Found";
    }
    elseif(empty($pass)){
        echo "No password Result Found";
    }
    else if($password !== $confirm_password){
        echo "Your passwords did not match";
    }else{
        $username = mysqli_real_escape_string($db->link,$username);
        $email = mysqli_real_escape_string($db->link,$email);
        $password = mysqli_real_escape_string($db->link,$password);
        $query = "UPDATE user SET username='$username',email='$email',password='$password' WHERE id = '$profileid'";
        $result = $db->Insert($query); 
        if($result ){
            echo " Insert Sussessfull";
        }else{
            echo "Insert not Sussessfull";
        }
        echo " <script> window.location = '../user/user.php'; </script>";
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
                        <div class="breadcrumb-item"><a href="#">Post</a></div>
                        <div class="breadcrumb-item">Add Post</div>
                    </div>
                </div>
        <!-- Start app main Content -->
        <div class="section-body">
                    <h2 class="section-title">Profile</h2>
                    <p class="section-lead">Edit Profile.</p>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                            <div class="card-body">
                                <p>Pasword Must Be Required</p>
                            <?php
                            print_r($userRole);
                                $querys = " SELECT * FROM user  WHERE id ='$profileid' AND role = '$userRole'";
                                $user = $db->selectDT($querys);
								if($user){
									while($result = $user->fetch_assoc()){		
								?>

                                <form action="profile.php?profileid=<?php echo $result['id'] ?>" method="POST" enctype="multipart/form-data">
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