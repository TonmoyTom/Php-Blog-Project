
        
  <?php

include_once("includes/header.php");
include_once("includes/navbar.php");
include_once("includes/banner.php");
include_once("config/config.php");
include_once("library/database.php");
include_once("helpers/format.php");
$db = new Database();
$fm = new Format();

if(isset($_POST['submit'])){

    $cname = filter_input(INPUT_POST, 'cname',FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email',FILTER_SANITIZE_STRING);
    $csubject =  filter_input(INPUT_POST, 'csubject',FILTER_SANITIZE_STRING);
    $cmessgae = filter_input(INPUT_POST, 'cmessage',FILTER_SANITIZE_STRING);

    $cname = mysqli_real_escape_string($db->link,$cname);
    $email = mysqli_real_escape_string($db->link,$email);
    $csubject = mysqli_real_escape_string($db->link,$csubject);
    $cmessgae = mysqli_real_escape_string($db->link,$cmessgae);


        if(empty($cname)){
            echo "No name Result Found";
        }
        elseif(empty($email)){
            echo "No email Result Found";
        }
        elseif(empty($csubject)){
            echo "No subject Result Found";
        }
        elseif(empty($cmessgae)){
            echo "No message Result Found";
        }
        else{


            $query = "INSERT INTO contact(cname, email, csubject, cmessage) VALUES ('$cname','$email','$csubject','$cmessgae')";
      
              $result = $db->Insert($query);
              if($result ){
                  echo " Insert Sussessfull";
                  echo " <script> window.location = 'index.php'; </script>";
              }else{
                  echo "Insert not Sussessfull";
              }
         
   }


}


?>
        <!--================Header Menu Area =================-->
     
        <section class="contact_area p_120">
            <div class="container">
                <div id="mapBox" class="mapBox">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d922.6224895519009!2d91.80676881702483!3d22.335121356350626!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30acd9835c4f80ef%3A0x3b9bf438fc66c2d!2z4KaF4Kae4KeN4Kac4Kay4Ka_IOCmueCni-CmruCmv-CmkyDgpqvgpr7gprDgp43gpq7gp4fgprjgpr8!5e0!3m2!1sen!2sbd!4v1603548597214!5m2!1sen!2sbd" width="1170" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                        <div class="contact_info">
                            <div class="info_item">
                                <i class="lnr lnr-home"></i>
                                <h6>California, United States</h6>
                                <p>Santa monica bullevard</p>
                            </div>
                            <div class="info_item">
                                <i class="lnr lnr-phone-handset"></i>
                                <h6><a href="#">00 (440) 9865 562</a></h6>
                                <p>Mon to Fri 9am to 6 pm</p>
                            </div>
                            <div class="info_item">
                                <i class="lnr lnr-envelope"></i>
                                <h6><a href="#">support@colorlib.com</a></h6>
                                <p>Send us your query anytime!</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <form class="row contact_form" action="contact.php" method="POST" >
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input type="text" class="form-control"  name="cname" placeholder="Enter your name">
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control"  name="email" placeholder="Enter email address">
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="csubject" placeholder="Enter Subject">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <textarea class="form-control" name="cmessage"  rows="1" placeholder="Enter Message"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12 text-right">
                                <button type="submit" name="submit" class="btn submit_btn">Send Message</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!--================Blog Area =================-->
        <!--================Blog Area =================-->
<?php
include_once("includes/footter.php");

?>
