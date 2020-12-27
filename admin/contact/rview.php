<?php

include_once("../includes/header.php");

$userRole = $_SESSION['userRole'];
if($userRole != 1){
    echo " <script> window.location = '../index.php'; </script>";
}
if(!isset($_GET['contactid']) || $_GET['contactid'] == NULL){
  echo " <script> window.location = 'contact.php'; </script>";
}else{
    $contactid = $_GET['contactid'];
}
    


if(isset($contactid)){
    $query = "UPDATE contact SET rstauts= '4' WHERE id = '$contactid'";
    $update = $db->update($query);
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
                    <h2 class="section-title">View Contact</h2>
                    <p class="section-lead">Reply Message.</p>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                            <div class="card-body">
                                <?php
                                $query = "SELECT * FROM contact  WHERE id = '$contactid'";
                                $contact = $db->view($query);
                                    if($contact){
                                        $i = 0;
                                        while($result = $contact->fetch_assoc()){
                                    
                                    ?>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"> Name</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" class="form-control inputtags" name="cname" value="<?php echo $result['rfrom'] ?>" disabled>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Email</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="email" class="form-control" name="email" value="<?php echo $result['email'] ?> "disabled>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Subject</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" class="form-control" name="csubject" value="<?php echo $result['rsubject'] ?>"disabled>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Message</label>
                                        <div class="col-sm-12 col-md-7">
                                            <textarea  class="summernote-simple" name="cmessage" disabled ><?php echo $result['rmessage'] ?></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                        <div class="col-sm-12 col-md-7">
                                        <a href="rback.php?contactid=<?php echo $result['id'] ?>"  class="btn btn-primary">Back</a>
                                        </div>
                                    </div> 
                                </div>
                            </div>
                            <?php

                                        }
                                        }
                            ?>
                        </div>
                    </div>
            </section>
                </div>

        </div>
</div>





<?php



include_once("../includes/footter.php");

?>