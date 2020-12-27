
                                // $query = "SELECT * FROM post WHERE post_id != $id AND cat_id = $catids limit 4";
                              

                              // $post = $db->selectDT($query);
                              // if($post){
                              //     while($result = $post->fetch_assoc()){

                                     
                              ?>

                               <!-- <div class="media post_item">
                                    <img src="img/blog/popular-post/post1.jpg" alt="post">
                                    <div class="media-body">
                                    <a href="post.php?id=<?php //echo $result['post_id'] ?>"><h3><?php //echo $result['title'] ?></h3></a>
                                    <p><?php //echo $fm->formatDate($result['date'])?></p>
                                    </div>
                                </div> -->
                                <?php
                                        // }
										// }
								// 	}else{
                                //             echo "There is no Realtive Post";
                                //     }
								// ?>
                                <!-- <div class="br"></div>
                                </aside> -->
                                <?php

                          //  }else{

                           // }
                           //
                            ?> 

<?php
                            //if(isset($id)){
                                ?>
                            <!-- <aside class="single_sidebar_widget popular_post_widget">
                                <h3 class="widget_title">Relative  Posts</h3> -->
                               <?php
                                if(!isset($_GET['catid']) || $_GET['catid'] == NULL){
                                }else{
                                    $catid = $_GET['catid'];
                                }
                                $query = "SELECT * FROM post JOIN catagory ON post.cat_id = catagory.id ";
								$post = $db->selectDT($query);
									while($result = $post->fetch_assoc()){
                                $catids = str_replace(',', '', $catid);
                                $sql = "SELECT id, name FROM catagory WHERE id IN ({$catids})";
                                $categorys = $db->selectDT($sql);
									while($category = $categorys->fetch_assoc()){
                                        $cat = $category['id'];
                                        $query = "SELECT * FROM post WHERE post_id != $id AND cat_id = $cat limit 4";
                                        $post = $db->selectDT($query);
                                        while($result = $post->fetch_assoc()){
                                        print_r($result['id']);

                                        }



                                    }
													
                                    
                                }
                                  
                                        
                                            
                                        
                                    
                                        
                                 ?>
          
                               
                        