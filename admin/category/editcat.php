<?php
include_once("../includes/header.php");
if(!isset($_GET['catid']) || $_GET['catid'] == NULL){
//  echo " <script> window.location = 'category.php'; </script>";
}else{
    $catid = $_GET['catid'];
}

if(isset($_POST['submit'])){

    $categoryAdd = filter_input(INPUT_POST, 'catagory',FILTER_SANITIZE_STRING);
    $categoryAdd = mysqli_real_escape_string($db->link,$categoryAdd);
    if(empty($categoryAdd)){
        $errorCat =  "No Category Result Found";
    }else{
        $query = "UPDATE catagory SET name= '$categoryAdd' WHERE id = '$catid'";
        $update = $db->update($query);
        if($update){
            $_SESSION['status'] = "Update Sussessfull";
            $_SESSION['status_code'] = "success";
        }else{
            $_SESSION['status'] = "Update Not Sussessfull";
            $_SESSION['status_code'] = "error";
        }
     echo " <script> window.location = 'category.php'; </script>";
     exit();
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
                    <div class="section-header-breadcrumb">
                        <div class="breadcrumb-item active"><a href="index.php">Dashboard</a></div>
                        <div class="breadcrumb-item">Update Category</div>
                    </div>
                </div>
                <div>
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-body">
                    <?php
								$querys = " SELECT * FROM catagory WHERE id= $catid";
                                $categorys = $db->selectDT($querys);
								if($categorys){
									while($result = $categorys->fetch_assoc()){
								?>
                        <form action="editcat.php?catid=<?php echo $result['id'] ?>" method="POST">
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
                                <input type="text" class="form-control" placeholder="Category" name="catagory" value="<?php echo $result['name'] ;?>">
                </div>
                </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" name="submit" class="btn btn-primary">Save</button>
                    </div>
                    </form>
                    <?php
                                    }
                                }
                    ?>
                    </div>

                </div>
                </div>
            </section>
        </div>






    <?php
    include_once("../includes/footter.php");


     ?>