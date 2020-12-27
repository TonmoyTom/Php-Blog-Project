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
            $query = "INSERT INTO logo( logo) VALUES ('$uploaded_image' )";
        
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
                        <div class="breadcrumb-item">Logo</div>
                    </div>
                   
                </div>
                <div>
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" style="float: right;">Add Logo</button>
                </div>
                <div class="section-body">
                    <h2 class="section-title">DataTables</h2>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-striped v_center" id="table-1">
                                            <thead>
                                                <tr>
                                                <th>Id</th>
                                                <th>Name</th>
                                                <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                    $query = "SELECT * FROM logo WHERE id = 1";
                                                    $post = $db->selectDT($query);
                                                    if($post){
                                                        $i = 0;
                                                        while($result = $post->fetch_assoc()){
                                                            $i++;
                                                ?>
                                            <tr>
                                                <td><?php echo $i; ?></td>
                                                <td  ><img  height ="45px" width="278px" src="<?php echo $result['logo']?>"></td>
                                            
                                                <td>
                                                     <a href="editlogos.php?logoid=<?php echo $result['id'] ?>" class="btn btn-primary"><i class="fas fa-edit"></i></a>
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
                        <form action="logos.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                           <div class="form-group row mb-2">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Logo</label>
                                        <div class="col-sm-12 col-md-7">
                                            <div id="image-preview" class="image-preview">
                                                <label for="image-upload" id="image-label">Choose File</label>
                                                <input type="file" name="logo" id="image-upload" />
                                            </div>
                                        </div>
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