   <?php
 
 if(!isset($_GET['id']) || $_GET['id'] == NULL){

}else{
       $id = $_GET['id'];
} 
   ?>
   
   <div class="col-lg-4">
                        <div class="blog_right_sidebar">
                            <aside class="single_sidebar_widget search_widget">
                                <form action="search.php" method="GET">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search Posts" name="search">
                                    <span class="input-group-btn">
                                        <button class="btn btn-default" type="button"><i class="lnr lnr-magnifier"></i></button>
                                    </span>
                                    </div><!-- /input-group -->
                                </form>    
                                <div class="br"></div>
                            </aside>
                            <aside class="single_sidebar_widget author_widget">
                                <img class="author_img img-fluid" src="img/blog/author.png" alt="">
                                <h4>Charlie Barber</h4>
                                <p>Senior blog writer</p>
                                <p>Boot camps have its supporters andit sdetractors. Some people do not understand why you should have to spend money on boot camp when you can get. Boot camps have itssuppor ters andits detractors.</p>
                                <div class="social_icon">
                                    <a href="#"><i class="fa fa-facebook"></i></a>
                                    <a href="#"><i class="fa fa-twitter"></i></a>
                                    <a href="#"><i class="fa fa-github"></i></a>
                                    <a href="#"><i class="fa fa-behance"></i></a>
                                </div>
                                <div class="br"></div>
                            </aside>
                            <aside class="single_sidebar_widget popular_post_widget">
                                <h3 class="widget_title">Recent Posts</h3>
                                <?php
                                $query = "SELECT * FROM post limit 3";
                                $post = $db->selectDT($query);
                                if($post){
                                    while($result = $post->fetch_assoc()){
                                ?>
                                    <div class="media post_item">
                                        <img src="img/blog/popular-post/post1.jpg" alt="post">
                                            <div class="media-body">
                                            <a href="post.php?id=<?php echo $result['post_id'] ?>"><h3><?php echo $result['title'] ?></h3></a>
                                            <p><?php echo $fm->formatDate($result['date'])?></p>
                                            </div>
                                    </div>
                                    <?php
                                    }
                                }
                                    ?>
                                <div class="br"></div>
                            </aside>

                        <?php
                            if(isset($id)){
                                ?>
                            <aside class="single_sidebar_widget popular_post_widget">
                                <h3 class="widget_title">Relative  Posts</h3>
                               <?php
                                if(!isset($_GET['catid']) || $_GET['catid'] == NULL){
                                }else{
                                    $catid = $_GET['catid'];
                                }
                                
                                $query = "SELECT * FROM post WHERE post_id != $id AND cat_id IN ({$catid}) limit 4 ";
                              
                                $post = $db->selectDT($query);
                              if($post){
                                  while($result = $post->fetch_assoc()){
                                    
                                    
                              ?>

                              <div class="media post_item">
                                   <img src="img/blog/popular-post/post1.jpg" alt="post">
                                   <div class="media-body">
                                   <a href="post.php?id=<?php echo $result['post_id'] ?>"><h3><?php echo $result['title'] ?></h3></a>
                                   <p><?php echo $fm->formatDate($result['date'])?></p>
                                   </div>
                               </div>
                               <?php
                                    }
                                     
                               	}else{
                                           echo "There is no Realtive Post";
                                   }
                               // ?>
                               <div class="br"></div>
                               </aside>
                               <?php

                          }else{

                          }
                          
                           ?> 

                            
                



                            <aside class="single-sidebar-widget newsletter_widget">
                                <h4 class="widget_title">Newsletter</h4>
                                <div class="form-group d-flex flex-row">
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Enter email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email'">
                                    </div>
                                    <a href="#" class="bbtns"><i class="lnr lnr-arrow-right"></i></a>
                                </div>	
                                <div class="br"></div>							
                            </aside>
                            <aside class="single_sidebar_widget post_category_widget">
                                <h4 class="widget_title">Post Catgories</h4>
                                <ul class="list cat-list">
                                <?php
                                $query = "SELECT * FROM catagory limit 8";
                                //$query= "SELECT catagory.*, (SELECT COUNT(id) FROM post AS post WHERE catagory.id = post.cat_id) AS TOTAL_POST FROM catagory AS catagory ORDER BY id DESC";
                                $post = $db->selectDT($query);
                                if($post){
                                    while($result = $post->fetch_assoc()){
                                        if($result['status'] == 1){
                                ?>
                                    <li>
                                        <a href="catagory.php?catid=<?php echo $result['id'] ?>"class="d-flex justify-content-between">
                                            <p><?php  echo $result['name'] ?></p>
                                        </a>
                                    </li>	
                                    
                                    <?php
                                        }
                                    }
                                    }
                                    ?>
                                </ul>
                            </aside>
                        </div>
                    </div>