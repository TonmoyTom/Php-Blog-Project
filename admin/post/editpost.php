
<?php
include_once("../includes/header.php");
  if(!isset($_GET['postid']) || $_GET['postid'] == NULL){
    //echo " <script> window.location = 'category.php'; </script>";
  }else{
      $postid = $_GET['postid'];
  }
  
  $error = array();
  if(isset($_POST['submit'])){

    $category = filter_input(INPUT_POST, 'category',FILTER_SANITIZE_STRING,FILTER_REQUIRE_ARRAY);
    $joincat = join(",",$category);
    $userid =  filter_input(INPUT_POST, 'userid',FILTER_SANITIZE_STRING);
    $title = filter_input(INPUT_POST, 'title',FILTER_SANITIZE_STRING);
    $body = filter_input(INPUT_POST, 'body',FILTER_SANITIZE_STRING);
    $bodys = trim($body);

    $permited_one  = array('jpg', 'jpeg', 'png', 'gif');
    $permited_two  = array('jpg', 'jpeg', 'png', 'gif');
    $filename_one = $_FILES['image']['name'];
   

    if($filename_one ){
        $file_size_one = $_FILES['image']['size'];
        $file_temp_one = $_FILES['image']['tmp_name'];
        $divone = explode('.', $filename_one);
        $file_ext_one = strtolower(end($divone));
        $unique_image_one = substr(md5(time()), 0, 10).'.'.$file_ext_one;
        $uploadone = "uploads/small/";
        $uploaded_image = $uploadone .$unique_image_one;
        move_uploaded_file($file_temp_one, $uploaded_image);

    } 
    $filename_two = $_FILES['image_two']['name'];
    
    if($filename_two){
        $file_size_two =  $_FILES['image_two']['size'];
        $file_temp_two = $_FILES['image_two']['tmp_name'];
        $divtwo = explode('.', $filename_two);
        $file_ext_two = strtolower(end($divtwo));
        $unique_image_two = substr(md5(time()), 0, 15).'.'.$file_ext_two;
        $uploadtwo = "uploads/big/";
        $uploaded_image_two = $uploadtwo .$unique_image_two;
          move_uploaded_file($file_temp_two, $uploaded_image_two);
    }
    

    $author = filter_input(INPUT_POST, 'author',FILTER_SANITIZE_STRING);
    $tag = filter_input(INPUT_POST, 'tag',FILTER_SANITIZE_STRING);
    $publish = filter_input(INPUT_POST, 'publish',FILTER_SANITIZE_STRING);


    $category = mysqli_real_escape_string($db->link,$joincat);
    $userid = mysqli_real_escape_string($db->link,$userid);
    $title = mysqli_real_escape_string($db->link,$title);
    $body = mysqli_real_escape_string($db->link,$bodys);
    $author = mysqli_real_escape_string($db->link,$author);
    $tag = mysqli_real_escape_string($db->link,$tag);
    $publish = mysqli_real_escape_string($db->link,$publish);


    if($error){
        if(empty($title)){
            echo "No Result Found";
        }
        if(empty($category)){
            echo "No Result Found";
        }
        if(empty($body)){
            echo "No Result Found";
        }
        if ($file_size_one >1048567) {
            echo "<span class='error'>Image Size should be less then 1MB!
            </span>";
           } elseif (in_array($file_ext_one, $permited_one) === false) {
            echo "<span class='error'>You can upload only:-"
            .implode(', ', $permited_one)."</span>";
           }

        if ($file_size_two >1048567) {
            echo "<span class='error'>Image Size should be less then 1MB!
            </span>";
           } elseif (in_array($file_ext_two, $permited_two) === false) {
            echo "<span class='error'>You can upload only:-"
            .implode(', ', $permited_two)."</span>";
           }

        if(empty($author)){
            echo "No Result Found";
        }
        if(empty($tag)){
            echo "No Result Found";
        }
       
    }


    if($filename_one && $filename_two){

        $query = "UPDATE post SET  cat_id='$joincat',user_id = '$userid',title='$title',body='$bodys',image='$uploaded_image',image_two='$uploaded_image_two',author='$author',tag='$tag',publish='$publish' WHERE post_id = '$postid'";

    }elseif($filename_one){
        
        $query = "UPDATE post SET  cat_id='$joincat',user_id = '$userid',title='$title',body='$body',image='$uploaded_image',author='$author',tag='$tag',publish='$publish' WHERE post_id = '$postid'";


    }elseif($filename_two){
        $query = "UPDATE post SET  cat_id='$joincat',user_id = '$userid',title='$title',body='$body',image_two='$uploaded_image_two',author='$author',tag='$tag',publish='$publish' WHERE post_id = '$postid'";


    }else{
        $query = "UPDATE post SET  cat_id='$joincat',user_id = '$userid',title='$title',body='$body',author='$author',tag='$tag',publish='$publish' WHERE post_id = '$postid'";
    }

   //  print_r($query);
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
                        <div class="breadcrumb-item"><a href="#">Post</a></div>
                        <div class="breadcrumb-item">Edit Post</div>
                    </div>
                </div>
        <!-- Start app main Content -->
        <div class="section-body">
                    <h2 class="section-title">Add Post</h2>
                    <p class="section-lead">Insert Your Post.</p>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                            <div class="card-body">

                                <?php 

                                
								$querys = " SELECT * FROM post WHERE post_id= $postid"  ;
                                $postedit = $db->selectDT($querys);
								if($postedit){
									while($postresult = $postedit->fetch_assoc()){		
                                        $cat_ids = explode(',', $postresult['cat_id']);
                                        
                                ?>
                                <form action="editpost.php?postid=<?php echo $postresult['post_id'] ?>" class=""  id="my-awesome-dropzone" method="POST" enctype="multipart/form-data">
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Title</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" class="form-control" name="title" value="<?php echo $postresult['title']; ?>"> 
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Category</label>
                                        <div class="col-sm-12 col-md-7">
                                        <select class="form-control selectric" name="category[]" multiple="">
                                        <?php
                                            $query = "SELECT * FROM catagory  ORDER BY id  DESC";
                                            $post = $db->selectDT($query);
                                                while($result = $post->fetch_assoc()){
                                                   
                                            ?>
                                            <option  <?= (in_array($result['id'], $cat_ids) !== false) ? "selected" : ""?> value="<?php  echo $result['id']; ?>"><?php  echo $result['name']; ?></option>
                                           <?php
                                                        }
                                                
                                           ?>
                                        </select>
                                        <p>Must Be Two Category Selected</p>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Content</label>
                                        <div class="col-sm-12 col-md-7">
                                            <textarea class="summernote-simple" name="body">
                                                <?php echo $postresult['body']; ?>
                                            </textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Post Thumbnail</label>
                                        <div class="col-sm- col-md-7">
                                            <div id="image-preview" class="image-preview " >
                                                <label for="image-upload" id="image-label">Choose File</label>
                                                <input type="file" name="image" >    
                                            </div>
                                                <div class="img" id="fine-uploader-gallery" style="display: inline-block;">
                                                    <img  height ="80px" width="100px" src="<?php echo $postresult['image']?>">
                                                </div>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Big Thumbnail</label>
                                        <div class="col-sm-12 col-md-7">
                                            <div id="image-preview" class="image-preview " id="myId">
                                                <label for="image-upload" id="image-label">Choose File</label>
                                                <input type="file" name="image_two" id="image-upload" />
                                            </div>
                                            <div id="fine-uploader-gallery"></div>
                                                <div class="img" id="fine-uploader-gallery">
                                                    <img  height ="80px" width="100px" src="<?php echo $postresult['image_two']?>">
                                                </div>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Author</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" class="form-control inputtags" name="author" value="<?php echo  $_SESSION['username'] ?>"">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tags</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" class="form-control inputtags" name="tag" value="<?php echo $postresult['tag']; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status</label>
                                        <div class="col-sm-12 col-md-7">
                                            <select class="form-control " name="publish">
                                                <option value="0"
                                                <?php
                                                if($postresult['publish'] == 0){
                                                    echo "selected";
                                                }
                                                
                                                ?>
                                                >Draft</option>
                                                <option value="1"

                                                <?php
                                                if($postresult['publish'] == 1){
                                                    echo "selected";
                                                }
                                                
                                                ?>
                                                >Publish</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="hidden" class="form-control inputtags" name="userid" value="<?php echo  $_SESSION['userId'] ?>">
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