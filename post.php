<?php

include_once("includes/header.php");
include_once("includes/navbar.php");
include_once("includes/banner.php");
include_once("config/config.php");
include_once("library/database.php");
include_once("helpers/format.php");
$db = new Database();
$fm = new Format();
if(!isset($_GET['id']) || $_GET['id'] == NULL){
   // echo " <script> window.location = '404.php'; </script>";
}else{
    $id = $_GET['id'];
}





?>
<style>
  .replies {padding-left: 30px;}
</style>
        <!--================Blog Area =================-->
        <section class="blog_area p_120 single-post-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                    <?php
                        $query = "SELECT * FROM post JOIN catagory ON post.cat_id = catagory.id WHERE post_id = $id AND post.publish = 1";
                        $post = $db->selectDT($query);
                        if($post){
                            while($result = $post->fetch_assoc()){
                                $catid = $result['cat_id'];
                        ?>
       					<div class="main_blog_details">
       						<img class="img-fluid" src="admin/post/<?php echo $result['image_two'] ?>"alt="">
       						<a href="post.php?id=<?php echo $result['post_id'] ?>"><h4><?php echo $result['title'] ?></h4></a>
       						<div class="user_details">
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
       							<div class="float-right">
       								<div class="media">
       									<div class="media-body">
       										<h5><?php echo $result['author'] ?></h5>
       										<p><?php echo $fm->formatDate($result['date'])?></p>
       									</div>
       									<div class="d-flex">
       										<img src="img/blog/user-img.jpg" alt="">
       									</div>
       								</div>
       							</div>
       						</div>
       						<p><?php echo $result['body'] ?></p>
							<blockquote class="blockquote">
								<p class="mb-0">MCSE boot camps have its supporters and its detractors. Some people do not understand why you should have to spend money on boot camp when you can get the MCSE study materials yourself at a fraction of the camp price. However, who has the willpower to actually sit through a self-imposed MCSE training.</p>
							</blockquote>
							<p><?php echo $result['body'] ?></p>
      						<div class="news_d_footer">
      							<a href="#"><i class="lnr lnr lnr-heart"></i>Lily and 4 people like this</a>
      							<a class="justify-content-center ml-auto" href="#"><i class="lnr lnr lnr-bubble"></i>06 Comments</a>
      							<div class="news_socail ml-auto">
									<a href="#"><i class="fa fa-facebook"></i></a>
									<a href="#"><i class="fa fa-twitter"></i></a>
									<a href="#"><i class="fa fa-youtube-play"></i></a>
									<a href="#"><i class="fa fa-pinterest"></i></a>
									<a href="#"><i class="fa fa-rss"></i></a>
								</div>
      						</div>
       					</div>
                           <?php
										}
									}else{
                                        echo " There was no Post";
                                    }
						   ?>


                        <div class="comments"></div>
                        </div>


                    <?php
					include_once("includes/sidebar.php");

                    ?>
                    </div>
                </div>
            </div>
        </section>
        <script>
            const comments_page_id = <?= $id ?>; // This number should be unique on every page
            fetch("comments.php?post_id=" + comments_page_id).then(response => response.text()).then(data => {
                document.querySelector(".comments").innerHTML = data;
                document.querySelectorAll(".comments .write_comment_btn, .comments .reply_comment_btn").forEach(element => {
                    element.onclick = event => {
                        event.preventDefault();
                        document.querySelectorAll(".comments .write_comment").forEach(element => element.style.display = 'none');
                        document.querySelector("div[data-comment-id='" + element.getAttribute("data-comment-id") + "']").style.display = 'block';
                        document.querySelector("div[data-comment-id='" + element.getAttribute("data-comment-id") + "'] input[name='name']").focus();
                    };
                });
                document.querySelectorAll(".comments .write_comment form").forEach(element => {
                    element.onsubmit = event => {
                        event.preventDefault();
                        fetch("comments.php?post_id=" + comments_page_id, {
                            method: 'POST',
                            body: new FormData(element)
                        }).then(response => response.text()).then(data => {
                            element.parentElement.innerHTML = data;
                        });
                    };
                });
            });

            // -- Cancel Reply
            function cancelReply(){
              document.querySelectorAll(".comments .write_comment").forEach(element => element.style.display = 'none');
              document.querySelector("#baseForm").style.display = 'block';
            }
    </script>


        <!--================Blog Area =================-->

      <!--================Blog Area =================-->
      <?php
		include_once("includes/footter.php");

	  ?>