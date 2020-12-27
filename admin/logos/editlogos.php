<?php
include_once("../includes/header.php");
$userRole = $_SESSION['userRole'];
if($userRole != 1){
    echo " <script> window.location = '../index.php'; </script>";
}

$error = array();
if(isset($_POST['submit'])){
    
  
            $permited_one  = array('jpg', 'jpeg', 'png', 'gif');
            $filename_one = $_FILES['logo']['name'];
            $file_size_one = $_FILES['logo']['size'];
            $file_temp_one = $_FILES['logo']['tmp_name'];
            $divone = explode('.', $filename_one);
            $file_ext_one = strtolower(end($divone));
            $unique_image_one = substr(md5(time()), 0, 10).'.'.$file_ext_one;
            $uploadone = "logo/";
            $uploaded_image = $uploadone .$unique_image_one;
            move_uploaded_file($file_temp_one, $uploaded_image);

        if(empty($filename_one)){
            echo "No Result Found";
        }elseif ($file_size_one >1048567) {
            echo "<span class='error'>Image Size should be less then 1MB!
            </span>";
           } elseif (in_array($file_ext_one, $permited_one) === false) {
            echo "<span class='error'>You can upload only:-"
            .implode(', ', $permited_one)."</span>";
           }else{
               $query = "UPDATE logo SET logo='$uploaded_image' WHERE id = 1";
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
								$querys = " SELECT * FROM logo WHERE id= 1";
                                $logos = $db->selectDT($querys);
								if($logos){
									while($result = $logos->fetch_assoc()){		
								?>
                        <form action="editlogos.php?logoid=<?php echo $result['id'] ?>" method="POST" enctype="multipart/form-data">
                        <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Logo </label>
                                        <div class="col-sm- col-md-7">
                                            <div id="image-preview" class="image-preview " >
                                                <label for="image-upload" id="image-label">Choose File</label>
                                                <input type="file" name="logo" >    
                                            </div>
                                                <div class="img" id="fine-uploader-gallery" style="display: inline-block;">
                                                    <img height ="45px" width="278px" src="<?php echo $result['logo']?>">
                                                </div>
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