<?php

include_once("includes/header.php");
include_once("includes/navbar.php");
include_once("includes/banner.php");
include_once("config/config.php");
include_once("library/database.php");
include_once("helpers/format.php");
$db = new Database();
$fm = new Format();
$per_page = 4;
if(isset($_GET['page'])){
	$page = $_GET['page'];
}else{
	$page = 1;
}
$start_form  = ($page-1)*$per_page;

if(!isset($_GET['catid']) || $_GET['catid'] == NULL){
}else{
    $catid = $_GET['catid'];
}


?>
        
        <!--================Blog Area =================-->
        <section class="blog_area p_120">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="blog_left_sidebar">
                            <div class="row">
							<?php
								$query = "SELECT * FROM post JOIN catagory ON post.cat_id = catagory.id WHERE cat_id = $catid AND post.publish = 1 limit $start_form, $per_page";
								$post = $db->selectDT($query);
								if($post){
									while($result = $post->fetch_assoc()){		
								?>
                            	<div class="col-md-6">
                            		<article class="blog_style1 small">
										<div class="blog_img">
											<img class="img-fluid" src="admin/post/<?php echo $result['image'] ?>" alt="">
										</div>
										<div class="blog_text">
											<div class="blog_text_inner">
												<div class="cat" style="display: inline-block; " >
												<div>
													<?php
														$cat_ids = $result['cat_id'];
														$sql = "SELECT id, name FROM catagory WHERE  id IN ({$cat_ids})";
														$categorys = $db->selectDT($sql);
														while($category = $categorys->fetch_assoc()){
													
													?>
														<a class="cat_btn" style="display: inline-block; background: #000000; border:none; color:#fff;"
														 href="catagory.php?catid=<?php echo $category['id'] ?>"><?php echo $category['name'] ?></a>
													<?php
													
														}
														
														?>
													</div>
													<div>
														<a  class="cat_btn"><?php echo $result['author'] ?></a>
													</div>
													<a href="#"><i class="fa fa-calendar" aria-hidden="true"></i>
													<?php echo $fm->formatDate($result['date'])?></a>
													<a href="#"><i class="fa fa-comments-o" aria-hidden="true"></i> 05</a>
												</div>
												<a href="post.php?id=<?php echo $result['post_id'] ?>"><h4><?php echo $result['title'] ?></h4></a>
												<p><?php echo $fm->readmoreData($result['body'], 120) ?></p>
												<a class="blog_btn" href="post.php?id=<?php echo $result['post_id'] ?>">Read More</a>
											</div>
										</div>
									</article>
								</div>
								<?php
										}
									}
								?>
                            </div>
                            <nav class="blog-pagination justify-content-center d-flex">
		                        <ul class="pagination">
									<?php
									$query = "SELECT * FROM post JOIN catagory ON post.cat_id = catagory.id WHERE cat_id = $catid ";
									$result1= $post = $db->selectDT($query);
									if(!$result1){
										Echo "there no Post";
									}else{
									$totla_row = mysqli_num_rows($result1);
									$total_page = ceil($totla_row/$per_page);
									$c="active";
									$pagLink = ""; 
									?>
		                            <li class="page-item <?php if($page <= 1){ echo 'disabled'; } ?>"">
		                                <a href="<?php if($page <= 1){ echo '#'; } else { echo "?page=".($page - 1) ."&catid=".$catid; } ?>"" class="page-link" aria-label="Previous">
		                                    <span aria-hidden="true">
		                                        <span class="lnr lnr-chevron-left"></span>
		                                    </span>
		                                </a>
									</li>
									<?php
								
									for ($i=1; $i<=$total_page; $i++) { 
										if($page==$i)
											{
												$c="active";
											}
											else
											{
												$c="";
											} 
									

										$pagLink .=  '<li class="page-item ' .$c.'"><a class="page-link" href="catagory.php?page='.$i.(isset($_GET['catid']) ? '&catid='.$_GET['catid'] : '').'">'.$i.'</a></li>';
									};  
									echo $pagLink ; 
										
									?>
		                            <li class="page-item <?php if($page >= $total_page){ echo 'disabled'; } ?> ">
		                                <a href="<?php if($page >= $total_page){ echo '#'; } else { echo "?page=".($page + 1) ."&catid=".$catid;; } ?>" class="page-link" aria-label="Next">
		                                    <span aria-hidden="true">
		                                        <span class="lnr lnr-chevron-right"></span>
		                                    </span>
		                                </a>
									</li>
								<?php
									
									}
								?>
								</ul>
		                    </nav>
                        </div>
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