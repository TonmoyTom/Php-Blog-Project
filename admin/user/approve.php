<?php
include_once("../includes/header.php");
$userRole = $_SESSION['userRole'];
if($userRole != 1){
    echo " <script> window.location = '../index.php'; </script>";
}

?>

<div id="app">
    <div class="main-wrapper main-wrapper-1">
        <div class="navbar-bg"></div>
        <!-- Start app main Content -->
        <div class="main-content">
            <section class="section">
                <div class="section-header">
                    <h1>Page</h1>
                    <div class="section-header-breadcrumb">
                        <div class="breadcrumb-item active"><a href="index.php">Dashboard</a></div>
                        <div class="breadcrumb-item">Post</div>
                    </div>
                   
                </div>
                <div>
                </div>
                <div class="section-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                <h4>All Post</h4>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped v_center" id="table-1">
                                            <thead>
                                                <tr>
                                                <th>Id</th>
                                                <th>Name</th>
                                                <th>Eamil</th>
                                                <th>Role</th>
                                                <th>AppRove</th>
                                                <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>   <?php
                                                    $query = "SELECT * FROM user ORDER BY id  DESC";
                                                    $page = $db->selectDT($query);
                                                    if($page){
                                                        $i = 0;
                                                        while($result = $page->fetch_assoc()){
                                                            if($result['approve'] == 1){

                                                               

                                                            
                                                            $i++;
                                                ?>
                                            <tr>
                                                <?php
                                                 if($result['status'] == 1){
                                                                    
                                                                
                                                 ?>
                                                <td style="font-weight: bold;"><?php echo $i; ?></td>
                                                <td style="font-weight: bold;">  <?php echo $result['username']  ?></td>
                                                <td style="font-weight: bold;"><?php echo $result['email']  ?></td>
                                                <td style="font-weight: bold;">
                                                <?php
                                                    if($result['role'] == 1){
                                                        echo "Admin";
                                                    }elseif($result['role'] == 2){
                                                        echo "Author";
                                                    }elseif($result['role'] == 3){
                                                        echo "editor";
                                                    }elseif($result['role'] == 4){
                                                        echo "User";
                                                    }else{
                                                        echo "Not Defiend Role";
                                                    }

                                                    ?>
                                                </td>
                                                <td>
                                                <?php 
                                                         
                                                        if($result['approve'] == 2){
                                                            ?>
                                                                 <div class="badge badge-success">Approve</div>        
                                                            <?php
                                                        }else{
                                                            ?>
                                                                 <div class="badge badge-danger">Disapprove</div>        
                                                            <?php 
                                                        }
                                                    
                                                    ?>
                                                </td>
                                                <td>
                                                <?php 
                                                        if($result['approve'] == 2){
                                                            ?>
                                                                 <a href="llikeapprove.php?userid=<?php echo $result['id'] ?>" class="btn btn-danger"><i class="fas fa-arrow-down"></i></a>   
                                                            <?php
                                                        }else{
                                                            ?>
                                                                <a href="likeapprove.php?userid=<?php echo $result['id'] ?>" class="btn btn-success"><i class="fas fa-upload"></i></a>
                                                            <?php 
                                                        }
                                                    ?>
                                                     <a href="edituser.php?userid=<?php echo $result['id'] ?>" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                                     <a href="delete.php?userid=<?php echo $result['id'] ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                                </td>
                                                <?php
                                                
                                                    }else{

                                                        ?>
                                                      <td><?php echo $i; ?></td>
                                                <td><?php echo $result['username']  ?></td>
                                                <td><?php echo $result['email']  ?></td>
                                                <td>
                                                <?php
                                                    if($result['role'] == 1){
                                                        echo "Admin";
                                                    }elseif($result['role'] == 2){
                                                        echo "Author";
                                                    }elseif($result['role'] == 3){
                                                        echo "editor";
                                                    }elseif($result['role'] == 4){
                                                        echo "User";
                                                    }else{
                                                        echo "Not Defiend Role";
                                                    }

                                                    ?>
                                                </td>
                                                <td>
                                                <?php 
                                                         
                                                        if($result['approve'] == 2){
                                                            ?>
                                                                 <div class="badge badge-success">Approve</div>        
                                                            <?php
                                                        }else{
                                                            ?>
                                                                 <div class="badge badge-danger">Disapprove</div>        
                                                            <?php 
                                                        }
                                                    
                                                    ?>
                                                </td>
                                                <td>
                                                <?php 
                                                        if($result['approve'] == 2){
                                                            ?>
                                                                 <a href="llikeapprove.php?userid=<?php echo $result['id'] ?>" class="btn btn-danger"><i class="fas fa-arrow-down"></i></a>   
                                                            <?php
                                                        }else{
                                                            ?>
                                                                <a href="likeapprove.php?userid=<?php echo $result['id'] ?>" class="btn btn-success"><i class="fas fa-upload"></i></a>
                                                            <?php 
                                                        }
                                                    ?>
                                                     <a href="edituser.php?userid=<?php echo $result['id'] ?>" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                                     <a href="delete.php?userid=<?php echo $result['id'] ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                                </td>   

                                                        <?php

                                                    }
                                                
                                                ?>
                                                  
                                            </tr>
                                            <?php
                                                            }
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