<?php

include_once("../includes/header.php");

if(!isset($_GET['postid']) || $_GET['postid'] == NULL){
    //echo " <script> window.location = 'category.php'; </script>";
  }else{
      $postid = $_GET['postid'];
  }
    
?>
            
            <div class="main-content">
            <section class="section">
                <div class="section-header">
                    <div class="section-header-breadcrumb">
                        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                        <div class="breadcrumb-item"><a href="#">Contact</a></div>
                        <div class="breadcrumb-item">View Contact</div>
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
                                                <div class="img" id="fine-uploader-gallery" style="display: inline-block; margin-left: 30px;">
                                                    <img  height ="80px" width="100px" src="<?php echo $postresult['image']?>">
                                                </div>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Big Thumbnail</label>
                                            <div id="fine-uploader-gallery"></div>
                                                <div class="img" id="fine-uploader-gallery" style="display: inline-block; margin-left: 40px;">
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
                                        <a href="back.php?postid=<?php echo $postresult['post_id'] ?>"  class="btn btn-primary">Back</a>
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
         
                </div>

        </div>
     </section>
</div>




<?php



include_once("../includes/footter.php");

?>