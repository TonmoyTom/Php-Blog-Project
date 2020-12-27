<?php
include_once("../includes/header.php");


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
                                                <th>Title</th>
                                                <th>Category</th>
                                                <th>Image</th>
                                                <th>Author</th>
                                                <th>Tag</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>   <?php
                                                    $query = "SELECT * FROM post ORDER BY post_id DESC";
                                                    $post = $db->selectDT($query);
                                                    if($post){
                                                        $i = 0;
                                                        while($result = $post->fetch_assoc()){
                                                            $i++;
                                                ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $result['title']  ?></td>
                                                <td>
                                                <?php
                                                    $cat_ids = $result['cat_id'];
                                                    $sql = "SELECT id, name FROM catagory WHERE id IN ({$cat_ids})";
                                                    $categorys = $db->selectDT($sql);
                                                    while($category = $categorys->fetch_assoc()){
                                                ?>
                                                <?php echo $category['name'] . ', ' ; ?>
                                                <?php
                                                    }
                                                ?>
                                                </td>
                                                <td height="100px" width="100px" ><img  height ="80px" width="100px" src="<?php echo $result['image']?>"></td>
                                                <td><?php echo  $result['author']   ?></td>
                                                <td><?php echo $result['tag']  ?></td>
                                                <td>
                                                    <?php 
                                                        if($result['publish'] == 1){
                                                            ?>
                                                                 <div class="badge badge-success">Publish</div>        
                                                            <?php
                                                        }else{
                                                            ?>
                                                                 <div class="badge badge-danger">Darft</div>        
                                                            <?php 
                                                        }
                                                    ?>
                                                   
                                                </td>
                                                <td>
                                                    <?php 
                                                    
                                                     $userRole = $_SESSION['userRole'];
                                                     if($_SESSION['userId'] == $result['user_id'] || $userRole == 0 ){
                                                        if($result['publish'] == 1){
                                                            ?>
                                                                 <a href="like.php?postid=<?php echo $result['post_id'] ?>" class="btn btn-danger"><i class="fas fa-arrow-down"></i></a>   
                                                            <?php
                                                        }else{
                                                            ?>
                                                                <a href="like.php?postid=<?php echo $result['post_id'] ?>" class="btn btn-success"><i class="fas fa-upload"></i></a>
                                                            <?php 
                                                        }
                                                    ?>
                                                     <a href="view.php?postid=<?php echo $result['post_id'] ?>" class="btn btn-warning"><i class="fas fa-eye"></i></a>
                                                     <a href="editpost.php?postid=<?php echo $result['post_id'] ?>" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                                     <a href="deletepost.php?postid=<?php echo $result['post_id'] ?>" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                                     <?php
                                                        }else{
                                                            
                                                        }
                                                     ?>
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