<?php
include_once("../includes/header.php");




if(isset($_POST['submit'])){
    
    $categoryAdd = filter_input(INPUT_POST, 'catagory',FILTER_SANITIZE_STRING);
    $categoryAdd = mysqli_real_escape_string($db->link,$categoryAdd);
    if(empty($categoryAdd)){
        $errorCat =  "No Category Result Found";
    }else{
        $query = "INSERT INTO catagory( name, status) VALUES ('$categoryAdd', 1)";
        $result = $db->Insert($query);
        if($result ){
            $_SESSION['status'] = "Insert Sussessfull";
            $_SESSION['status_code'] = "success";
        }else{
            $_SESSION['status'] = "Insert not Sussessfull";
            $_SESSION['status_code'] = "error";
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
                        <div class="breadcrumb-item">Category</div>
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
                                                <th>Name</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $query = "SELECT * FROM catagory ORDER BY id DESC";
                                                    $post = $db->selectDT($query);
                                                    if($post){
                                                        $i = 0;
                                                        while($result = $post->fetch_assoc()){
                                                            $i++;
                                                ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td><?php echo $result['name']  ?></td>
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
                                                                 <a href="like.php?catid=<?php echo $result['id'] ?>" class="btn btn-danger"><i class="far fa-thumbs-down"></i></a>   
                                                            <?php
                                                        }else{
                                                            ?>
                                                                <a href="like.php?catid=<?php echo $result['id'] ?>" class="btn btn-success"><i class="far fa-thumbs-up"></i></a>
                                                            <?php 
                                                        }
                                                    ?>
                                                    
                                                     <a href="editcat.php?catid=<?php echo $result['id'] ?>" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                                     <?php
                                                    $userRole = $_SESSION['userRole'];
                                                    if($userRole == 1){
                                                    ?>
                                                        <input type="hidden" class="catdeleted_id" value="<?php echo $result['id'] ?>">
                                                     <a href="javascript:void(0)" class="btn btn-danger catdelete"><i class="fas fa-trash"></i></a>

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
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-body">
                        <form action="category.php" method="POST">
                        <div class="form-group">
                            <label>Category </label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">
                                        <i class="fas fa-envelope"></i>
                                    </div>
                                </div>
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
                                <input type="text" class="form-control" placeholder="Category" name="catagory">
                </div>
                </div>
                       
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="submit" class="btn btn-primary">Save</button>
                    </div>
                    </form>
                    </div>
                   
                </div>
                </div>



    <?php
     include_once("../includes/footter.php");
     
     
     ?>    