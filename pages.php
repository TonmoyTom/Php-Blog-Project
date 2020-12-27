<?php

include_once("includes/header.php");
include_once("includes/navbar.php");
include_once("includes/banner.php");
include_once("config/config.php");
include_once("library/database.php");
include_once("helpers/format.php");
$db = new Database();
$fm = new Format();

if(!isset($_GET['pageid']) || $_GET['pageid'] == NULL){
    //echo " <script> window.location = 'category.php'; </script>";
  }else{
      $pageid = $_GET['pageid'];
  }
?>
        
        <!--================Blog Area =================-->
        <section class="blog_area p_120">
            <div class="container">
                <div class="row">
                <div class="col-md-8">
                <?php
                    $query = "SELECT * FROM pages WHERE id = '$pageid'";
                    $pages = $db->selectDT($query);
                        while($result = $pages->fetch_assoc()){
                            if($result['status'] == 1){

                ?>
                     <h1 class="typo-list text-center"><?php  echo $result['page']  ?></h1>
                     <h3 class="text-heading title_color text-center "><?php  echo $result['title']  ?></h3>
					  <p class="sample-text"> <?php echo $result['body']  ?> </p>
                    

                    <?php
                    
                            }
                        }
                    
                    ?>
                </div>
                    <?php
					include_once("includes/sidebar.php");
					
					?>
                </div>
            </div>
        </section>
        <!--================Blog Area =================-->
        
        <!--================ start footer Area  =================-->	
        <?php
		include_once("includes/footter.php");
		
		?>