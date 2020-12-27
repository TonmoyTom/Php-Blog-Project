<?php
include_once("../includes/header.php");

if($userRole == 4){
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
                                                <th>Page</th>
                                                <th>Title</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>   <?php
                                                    $query = "SELECT * FROM pages ORDER BY id  DESC";
                                                    $page = $db->selectDT($query);
                                                    if($page){
                                                        $i = 0;
                                                        while($result = $page->fetch_assoc()){
                                                            $i++;
                                                ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $result['page']  ?></td>
                                                <td><?php echo $result['title']  ?></td>
                                                <td>
                                                    <?php 
                                                        if($result['status'] == 1){
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
                                                        if($result['status'] == 1){
                                                            ?>
                                                                 <a href="like.php?pageid=<?php echo $result['id'] ?>" class="btn btn-danger"><i class="fas fa-arrow-down"></i></a>   
                                                            <?php
                                                        }else{
                                                            ?>
                                                                <a href="like.php?pageid=<?php echo $result['id'] ?>" class="btn btn-success"><i class="fas fa-upload"></i></a>
                                                            <?php 
                                                        }
                                                    ?>
                                                     <a href="editpage.php?pageid=<?php echo $result['id'] ?>" class="btn btn-primary"><i class="fas fa-edit"></i></a>

                                                     <?php
                                                    $userRole = $_SESSION['userRole'];
                                                    if($userRole == 1){
                                                    ?>
                                                        <input type="hidden" class="pagedeleted_id" value="<?php echo $result['id'] ?>">
                                                     <a href="javascript:void(0)" class="btn btn-danger pagedelete"><i class="fas fa-trash"></i></a>

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