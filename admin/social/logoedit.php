<?php
include_once("../includes/header.php");
$userRole = $_SESSION['userRole'];
if($userRole != 1){
    echo " <script> window.location = '../index.php'; </script>";
}
$error = array();
if(isset($_POST['submit'])){

    // $permited_one  = array('jpg', 'jpeg', 'png', 'gif');
    //     $filename_one = $_FILES['image']['name'];
        

    //     if($filename_one ){
    //         $file_size_one = $_FILES['image']['size'];
    //         $file_temp_one = $_FILES['image']['tmp_name'];
    //         $divone = explode('.', $filename_one);
    //         $file_ext_one = strtolower(end($divone));
    //         $unique_image_one = substr(md5(time()), 0, 10).'.'.$file_ext_one;
    //         $uploadone = "uploads/small/";
    //         $uploaded_image = $uploadone .$unique_image_one;
    //         move_uploaded_file($file_temp_one, $uploaded_image);

    //     }
    

    $facebook = filter_input(INPUT_POST, 'facebook',FILTER_SANITIZE_STRING);
    $twitter = filter_input(INPUT_POST, 'twitter',FILTER_SANITIZE_STRING);
    $youtube = filter_input(INPUT_POST, 'youtube',FILTER_SANITIZE_STRING);
    $behance = filter_input(INPUT_POST, 'behance',FILTER_SANITIZE_STRING);


    $facebook = mysqli_real_escape_string($db->link,$facebook);
    $twitter = mysqli_real_escape_string($db->link,$twitter);
    $youtube = mysqli_real_escape_string($db->link,$youtube);
    $behance = mysqli_real_escape_string($db->link,$behance);


    if($error){

    // if(empty($image)){
    //     echo "No Result Found";
    // }elseif ($file_size_one >1048567) {
    //     echo "<span class='error'>Image Size should be less then 1MB!
    //     </span>";
    //    } elseif (in_array($file_ext_one, $permited_one) === false) {
    //     echo "<span class='error'>You can upload only:-"
    //     .implode(', ', $permited_one)."</span>";
    //    }
        if(empty($facebook)){
            echo "No Result Found";
        }
        if(empty($twitter)){
            echo "No Result Found";
        }
        if(empty($youtube)){
            echo "No Result Found";
        }
        if(empty($behance)){
            echo "No Result Found";
        }
       

     
       
    }
    $query = "UPDATE social SET  facebook='$facebook',twitter='$twitter',youtube='$youtube',behance='$behance'";
   
       $update = $db->update($query);
       if($update ){
           echo " Insert Sussessfull";
       }else{
           echo "Insert not Sussessfull";
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
                        <div class="breadcrumb-item">Add  Social</div>
                    </div>
                </div>
        <!-- Start app main Content -->
        <div class="section-body">
                    <h2 class="section-title">Add social</h2>
                    <p class="section-lead">Insert Your Social.</p>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                            <div class="card-body">
                            <?php
								$querys = " SELECT * FROM social WHERE id= '1' ";
                                $social = $db->selectDT($querys);
								if($social){
									while($result = $social->fetch_assoc()){		
								?>
                                <form action="logoedit.php?postid=<?php echo $result['id'] ?>" method="POST" >
                                  
                                   
                                    <!-- <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Logo</label>
                                        <div class="col-sm-12 col-md-7">
                                            <div id="image-preview" class="image-preview">
                                                <label for="image-upload" id="image-label">Choose File</label>
                                                <input type="file" name="logo" id="image-upload" />
                                            </div>
                                        </div>
                                    </div> -->
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Facebook</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" class="form-control inputtags" value="<?php echo $result['facebook'] ;?>"  name="facebook">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Twitter</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" class="form-control inputtags" value="<?php echo $result['twitter'] ;?>" name="twitter">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Youtube</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" class="form-control inputtags"value="<?php echo $result['youtube'] ;?>" name="youtube">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Behance</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" class="form-control inputtags" value="<?php echo $result['behance'] ;?>" name="behance">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                        <div class="col-sm-12 col-md-7">
                                            <button type="submit" name="submit" class="btn btn-primary">Create Post</button>
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