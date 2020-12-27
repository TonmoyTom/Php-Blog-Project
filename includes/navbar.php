      <!--================Header Menu Area =================-->
	 
	 
	 <?php
	 include_once("config/config.php");
	 include_once("library/database.php");
	 include_once("helpers/format.php");
	 $db = new Database();
	 $fm = new Format();
	 
	 ?> 
	 <header class="header_area">
			<div class="main_menu">
				<nav class="navbar navbar-expand-lg navbar-light">
					<div class="container box_1620">
						<!-- Brand and toggle get grouped for better mobile display -->
						<?php
								$query = "SELECT * FROM logo WHERE id = 1 ";
								$logo = $db->selectDT($query);
                                  while($result = $logo->fetch_assoc()){
                              ?>

						<a class="navbar-brand logo_h" href="index.php"><img height ="45px" width="278px"  src="admin/logos/<?php $result['logo'] ?>" alt=""></a>
						<?php
                               	}
                               // ?>
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
							<ul class="nav navbar-nav menu_nav">
								<li class="nav-item active"><a class="nav-link" href="index.html">Home</a></li> 
								<li class="nav-item submenu dropdown">
									<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Catagory</a>
									<ul class="dropdown-menu">
										<?php
										$query = "SELECT * FROM catagory";
										$post = $db->selectDT($query);
											while($result = $post->fetch_assoc()){
												if($result['status'] == 1){

												
										?>
										<li class="nav-item"><a class="nav-link" href="catagory.php?catid=<?php echo $result['id'] ?>">
									    <?php  echo $result['name'] ?></a></li>
										<?php
											 }
											}
										?>
									</ul>
								</li> 
								<li class="nav-item"><a class="nav-link" href="archive.html">Archive</a></li>
								<li class="nav-item submenu dropdown">
									<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Pages</a>
									<ul class="dropdown-menu">

										<?php
										$query = "SELECT * FROM pages";
										$pages = $db->selectDT($query);
											while($result = $pages->fetch_assoc()){
												if($result['status'] == 1){
										
										?>
										<li class="nav-item"><a class="nav-link" href="pages.php?pageid=<?php echo $result['id']  ?>"><?php echo $result['page'] ?></a></li>

										<?php
												}
												}
										?>
									</ul>
								</li> 
								<li class="nav-item"><a class="nav-link" href="contact.html">Contact</a></li>
							</ul>
							<ul class="nav navbar-nav navbar-right header_social ml-auto">
							<?php
                                $query = "SELECT * FROM social WHERE id = 1 ";
                              
                                $post = $db->selectDT($query);
                                  while($result = $post->fetch_assoc()){
                                    
                                    if($result['status'] == 1){

									
                              ?>
								<li class="nav-item"><a target="_blank" href="<?php echo $result['facebook'] ?>"><i class="fa fa-facebook"></i></a></li>
								<li class="nav-item"><a target="_blank" href="<?php echo $result['twitter'] ?>"><i class="fa fa-twitter"></i></a></li>
								<li class="nav-item"><a  target="_blank" href="<?php echo $result['youtube'] ?>"><i class="fab fa-youtube"></i></a></li>
								<li class="nav-item"><a  target="_blank" href="<?php echo $result['behance'] ?>"><i class="fa fa-behance"></i></a></li>
								<?php
									}
                               	}
                               // ?>
							</ul>
						</div> 
					</div>
				</nav>
			</div>
			<div class="logo_part">
				<div class="container">
					<a class="logo" href="#"><img src="img/logo.png" alt=""></a>
				</div>
			</div>
        </header>