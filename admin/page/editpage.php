
<?php
include_once("../includes/header.php");
$error = array();
if(!isset($_GET['pageid']) || $_GET['pageid'] == NULL){
    //echo " <script> window.location = 'category.php'; </script>";
  }else{
      $pageid = $_GET['pageid'];
  }

if(isset($_POST['submit'])){

    $page = filter_input(INPUT_POST, 'page',FILTER_SANITIZE_STRING);
    $title = filter_input(INPUT_POST, 'title',FILTER_SANITIZE_STRING);
    $body = filter_input(INPUT_POST, 'body',FILTER_SANITIZE_STRING);
    $status = filter_input(INPUT_POST, 'status',FILTER_SANITIZE_STRING);

    $page = mysqli_real_escape_string($db->link,$page);
    $title = mysqli_real_escape_string($db->link,$title);
    $body = mysqli_real_escape_string($db->link,$body);
    $status = mysqli_real_escape_string($db->link,$status);


        if(empty($page)){
            echo "No Result Found";
        }
        elseif(empty($title)){
            echo "No Result Found";
        }
        elseif(empty($body)){
            echo "No Result Found";
        }
        else{


            $query = "UPDATE pages SET page='$page',title='$title',body='$body',status='$status' WHERE id = '$pageid' ";
      
            $update = $db->update($query);
            if($update){
                echo " Update Sussessfull";
                echo " <script> window.location = 'pages.php'; </script>";
            }else{
                echo "Upadte not Sussessfull";
            }
         
        }

            
        
    
      


     


}
?>



<div class="main-content">
            <section class="section">
                <div class="section-header">
                    <h1>Post</h1>
                    <div class="section-header-breadcrumb">
                        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                        <div class="breadcrumb-item"><a href="#">Page</a></div>
                        <div class="breadcrumb-item">Add Page</div>
                    </div>
                </div>
        <!-- Start app main Content -->
        <div class="section-body">
                    <h2 class="section-title">Edit Page</h2>
                    <p class="section-lead">Edit Your Page.</p>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                            <div class="card-body">

                            <?php
								$querys = " SELECT * FROM pages WHERE id= $pageid";
                                $pages = $db->selectDT($querys);
								if($pages){
									while($result = $pages->fetch_assoc()){		
								?>


                                <form action="editpage.php?pageid=<?php echo $result['id'] ?>" method="POST">
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Page Name</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" class="form-control inputtags" name="page" value="<?php echo $result['page'] ?>" >
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Title</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" class="form-control" name="title" value="<?php echo $result['title'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Content</label>
                                        <div class="col-sm-12 col-md-7">
                                            <textarea class="summernote-simple" name="body"><?php echo $result['body'] ?>"</textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Publish</label>
                                        <div class="col-sm-12 col-md-7">
                                        <select class="form-control " name="status">
                                                <option value="0"
                                                <?php
                                                if($result['status'] == 0){
                                                    echo "selected";
                                                }
                                                
                                                ?>
                                                >Draft</option>
                                                <option value="1"

                                                <?php
                                                if($result['status'] == 1){
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