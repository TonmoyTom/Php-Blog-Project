
<?php

include_once("../includes/header.php");

$userRole = $_SESSION['userRole'];
if($userRole != 1){
    echo " <script> window.location = '../index.php'; </script>";
}
if(!isset($_GET['contactid']) || $_GET['contactid'] == NULL){
  echo " nONE";
}else{
    $contactid = $_GET['contactid'];
}
    
    if(isset($_POST['submit'])){

        $rfrom = filter_input(INPUT_POST, 'rfrom',FILTER_SANITIZE_STRING);
        $email = filter_input(INPUT_POST, 'email',FILTER_SANITIZE_STRING);
        $rsubject = filter_input(INPUT_POST, 'rsubject',FILTER_SANITIZE_STRING);
        $rmessage = filter_input(INPUT_POST, 'rmessage',FILTER_SANITIZE_STRING);
    
        $rfrom = mysqli_real_escape_string($db->link,$rfrom);
        $email = mysqli_real_escape_string($db->link,$email);
        $rsubject = mysqli_real_escape_string($db->link,$rsubject);
        $rmessage = mysqli_real_escape_string($db->link,$rmessage);
    
    
            if(empty($rfrom)){
                echo "No name Result Found";
            }
            
            elseif(empty($email)){
                echo "No email Result Found";
            }
            elseif(empty($rsubject)){
                echo "No subject Result Found";
            }
            elseif(empty($rmessage)){
                echo "No messgae Result Found";
            }
            else{
    
                $query = "UPDATE contact SET rfrom='$rfrom',email= '$email',rsubject='$rsubject',rmessage='$rmessage' ,rstauts = 3 WHERE id = '$contactid'";
                  $update = $db->update($query);
                  if($update ){
                      echo " <script> window.location = 'rcontact.php'; </script>";
                      echo " Inser Sussesfull";
                  }else{
                      echo "Insert not Sussessfull";
                  }
                  
            }
    
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
                    <p class="section-lead">Contact Message.</p>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                            <div class="card-body">
                           
                                <?php
                                $query = "SELECT * FROM contact  WHERE id = '$contactid'";
                                $contact = $db->selectDT($query);
                                    if($contact){
                                        $i = 0;
                                        while($result = $contact->fetch_assoc()){
                                    
                                    ?>
                                 <form action="reply.php?contactid=<?php  echo $result['id'] ?>" method="POST">
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"> From</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="email" class="form-control inputtags" name="rfrom" >
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Email</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="email" class="form-control" name="email" value="<?php echo $result['email'] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Subject</label>
                                        <div class="col-sm-12 col-md-7">
                                            <input type="text" class="form-control" name="rsubject" >
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Message</label>
                                        <div class="col-sm-12 col-md-7">
                                            <textarea  class="summernote-simple" name="rmessage" ></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row mb-4">
                                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                        <div class="col-sm-12 col-md-7">
                                            <button type="submit" name="submit" class="btn btn-primary">Create Reply</button>
                                            <a href="rcontact.php" class="btn btn-danger">Back</a>
                                        </div>
                                    </div>
                             
                                </div>
                            </div>
                            </form>
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