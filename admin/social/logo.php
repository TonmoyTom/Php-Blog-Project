<?php
include_once("../includes/header.php");
$userRole = $_SESSION['userRole'];
if($userRole != 1){
    echo " <script> window.location = '../index.php'; </script>";
}

if(isset($_POST['submit'])){
    
    $categoryAdd = filter_input(INPUT_POST, 'catagory',FILTER_SANITIZE_STRING);
    $categoryAdd = mysqli_real_escape_string($db->link,$categoryAdd);
    if(empty($categoryAdd)){
        echo "No Result Found";
    }else{
        $query = "INSERT INTO catagory( name, status) VALUES ('$categoryAdd', 1)";
        $result = $db->Insert($query);
        if($result ){
            echo " Insert Sussessfull";
        }else{
            echo "Insert not Sussessfull";
        }
    }
    


}
?>

<div id="app">
    <div class="main-wrapper main-wrapper-1">
        <div class="navbar-bg"></div>
        <!-- Start app main Content -->
        <div class="main-content">
            <section class="section">
                <div class="section-header">
                    <h1>Category</h1>
                    <div class="section-header-breadcrumb">
                        <div class="breadcrumb-item active"><a href="index.php">Dashboard</a></div>
                        <div class="breadcrumb-item">Social</div>
                    </div>
                   
                </div>
                <div>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" style="float: right;">Add Category</button>
                </div>
                <div class="section-body">
                    <h2 class="section-title">DataTables</h2>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                <h4>Basic DataTables</h4>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped v_center" id="table-1">
                                            <thead>
                                                <tr>
                                                <th>Id</th>
                                                <th>Facebook</th>
                                                <th>Twitter</th>
                                                <th>Youtube</th>
                                                <th>Behance</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $query = "SELECT * FROM social ORDER BY id DESC";
                                                    $post = $db->selectDT($query);
                                                    if($post){
                                                        $i = 0;
                                                        while($result = $post->fetch_assoc()){
                                                            $i++;
                                                ?>
                                            <tr>
                                                <td ><?php echo $i; ?></td>
                                                <td width = "100px"><?php echo $result['facebook']  ?></td>
                                                <td width = "100px"><?php echo $result['twitter']  ?></td>
                                                <td width = "100px"><?php echo $result['youtube']  ?></td>
                                                <td width = "100px"><?php echo $result['behance']  ?></td>
                                                <td>
                                                    <?php 
                                                        if($result['status'] == 1){
                                                            ?>
                                                                 <div class="badge badge-success">Active</div>        
                                                            <?php
                                                        }else{
                                                            ?>
                                                                 <div class="badge badge-danger">Deactive</div>        
                                                            <?php 
                                                        }
                                                    ?>
                                                   
                                                </td>
                                                <td>
                                                  
                                                <?php 
                                                        if($result['status'] == 1){
                                                            ?>
                                                                 <a href="like.php?socialid=<?php echo $result['id'] ?>" class="btn btn-danger"><i class="far fa-thumbs-down"></i></a>   
                                                            <?php
                                                        }else{
                                                            ?>
                                                                <a href="like.php?socialid=<?php echo $result['id'] ?>" class="btn btn-success"><i class="far fa-thumbs-up"></i></a>
                                                            <?php 
                                                        }
                                                    ?>
                                                     <a href="logoedit.php?socialid=<?php echo $result['id'] ?>" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                                </td>
                                                  
                                            </tr>
                                            <?php
                                                        }
                                                    }
                                            
                                            ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
              



    <?php
     include_once("../includes/footter.php");
     
     
     ?>    