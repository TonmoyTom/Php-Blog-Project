
<?php
include_once("../library/session.php");
Session::checkSession();
include_once("../config/config.php");
include_once("../library/database.php");
include_once("../helpers/format.php");
$db = new Database();
$fm = new Format();

header("Cache-Control: no-cache, must-revalidate"); 
header("Pragma: no-cache"); 
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
header("Cache-Control: max-age=2592000"); 

?>

<!DOCTYPE html>
<html lang="en">

<!--   Tue, 07 Jan 2020 03:33:27 GMT -->
<head>
<meta charset="UTF-8">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
<title>Admin &mdash; CodiePie</title>

<!-- General CSS Files -->
<link rel="stylesheet" href="assets/modules/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/modules/fontawesome/css/all.min.css">

<!-- CSS Libraries -->
<link rel="stylesheet" href="assets/modules/jqvmap/dist/jqvmap.min.css">
<link rel="stylesheet" href="assets/modules/summernote/summernote-bs4.css">
<link rel="stylesheet" href="assets/modules/owlcarousel2/dist/assets/owl.carousel.min.css">
<link rel="stylesheet" href="assets/modules/owlcarousel2/dist/assets/owl.theme.default.min.css">
<link rel="stylesheet" href="assets/modules/datatables/datatables.min.css">
<link rel="stylesheet" href="assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css">


<!-- Template CSS -->
<link rel="stylesheet" href="assets/css/style.min.css">
<link rel="stylesheet" href="assets/css/components.min.css">

</head>
<body class="layout-4">
<!-- Page Loader -->
<div class="page-loader-wrapper">
  <span class="loader"><span class="loader-inner"></span></span>
</div>

<div id="app">
  <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      
      <!-- Start app top navbar -->
      <nav class="navbar navbar-expand-lg main-navbar">
          <form class="form-inline mr-auto">
              <ul class="navbar-nav mr-3">
                  <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
                  <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
              </ul>
              <div class="search-element">
                  <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="250">
                  <button class="btn" type="submit"><i class="fas fa-search"></i></button>
                  <div class="search-backdrop"></div>
                  <div class="search-result">
                      <div class="search-header">Histories</div>
                      <div class="search-item">
                          <a href="#">How to Used HTML in Laravel</a>
                          <a href="#" class="search-close"><i class="fas fa-times"></i></a>
                      </div>
                      <div class="search-item">
                          <a href=" target="_black">Admincraft Portfolio</a>
                          <a href="#" class="search-close"><i class="fas fa-times"></i></a>
                      </div>
                      <div class="search-item">
                          <a href="#">#CodiePie</a>
                          <a href="#" class="search-close"><i class="fas fa-times"></i></a>
                      </div>
                      <div class="search-header">Result</div>
                      <div class="search-item">
                          <a href="#">
                              <img class="mr-3 rounded" width="30" src="assets/img/products/product-3-50.png" alt="product">
                              oPhone 11 Pro
                          </a>
                      </div>
                      <div class="search-item">
                          <a href="#">
                              <img class="mr-3 rounded" width="30" src="assets/img/products/product-2-50.png" alt="product">
                              Drone Zx New Gen-3
                          </a>
                      </div>
                      <div class="search-item">
                          <a href="#">
                              <img class="mr-3 rounded" width="30" src="assets/img/products/product-1-50.png" alt="product">
                              Headphone JBL
                          </a>
                      </div>
                      <div class="search-header">Projects</div>
                      <div class="search-item">
                          <a href="" target="_black">
                              <div class="search-icon bg-danger text-white mr-3"><i class="fas fa-code"></i></div>
                             ce Laravel - Admin Template Epi
                          </a>
                      </div>
                      <div class="search-item">
                          <a href="" target="_black">
                              <div class="search-icon bg-primary text-white mr-3"><i class="fas fa-laptop"></i></div>
                              Soccer - Admin Template
                          </a>
                      </div>
                  </div>
              </div>
          </form>
          <ul class="navbar-nav navbar-right">
              <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link nav-link-lg message-toggle beep"><i class="far fa-envelope"></i></a>
                  <div class="dropdown-menu dropdown-list dropdown-menu-right">
                  <div class="dropdown-header">Messages
                      <div class="float-right">
                          <a href="#">Mark All As Read</a>
                      </div>
                  </div>
                  <div class="dropdown-list-content dropdown-list-message">
                      <a href="#" class="dropdown-item dropdown-item-unread">
                          <div class="dropdown-item-avatar">
                              <img alt="image" src="assets/img/avatar/avatar-1.png" class="rounded-circle">
                              <div class="is-online"></div>
                          </div>
                          <div class="dropdown-item-desc">
                              <b>Kusnaedi</b>
                              <p>Hello, Bro!</p>
                              <div class="time">10 Hours Ago</div>
                          </div>
                      </a>
                      <a href="#" class="dropdown-item dropdown-item-unread">
                          <div class="dropdown-item-avatar">
                              <img alt="image" src="assets/img/avatar/avatar-2.png" class="rounded-circle">
                          </div>
                          <div class="dropdown-item-desc">
                              <b>Dedik Sugiharto</b>
                              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit</p>
                              <div class="time">12 Hours Ago</div>
                          </div>
                      </a>
                      <a href="#" class="dropdown-item dropdown-item-unread">
                          <div class="dropdown-item-avatar">
                              <img alt="image" src="assets/img/avatar/avatar-3.png" class="rounded-circle">
                              <div class="is-online"></div>
                          </div>
                          <div class="dropdown-item-desc">
                              <b>Agung Ardiansyah</b>
                              <p>Sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                              <div class="time">12 Hours Ago</div>
                          </div>
                      </a>
                      <a href="#" class="dropdown-item">
                          <div class="dropdown-item-avatar">
                              <img alt="image" src="assets/img/avatar/avatar-4.png" class="rounded-circle">
                          </div>
                          <div class="dropdown-item-desc">
                              <b>Ardian Rahardiansyah</b>
                              <p>Duis aute irure dolor in reprehenderit in voluptate velit ess</p>
                              <div class="time">16 Hours Ago</div>
                          </div>
                      </a>
                      <a href="#" class="dropdown-item">
                          <div class="dropdown-item-avatar">
                              <img alt="image" src="assets/img/avatar/avatar-5.png" class="rounded-circle">
                          </div>
                          <div class="dropdown-item-desc">
                              <b>Alfa Zulkarnain</b>
                              <p>Exercitation ullamco laboris nisi ut aliquip ex ea commodo</p>
                              <div class="time">Yesterday</div>
                          </div>
                      </a>
                  </div>
                  <div class="dropdown-footer text-center">
                      <a href="#">View All <i class="fas fa-chevron-right"></i></a>
                  </div>
                  </div>
              </li>
              <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg beep"><i class="far fa-bell"></i></a>
                  <div class="dropdown-menu dropdown-list dropdown-menu-right">
                  <div class="dropdown-header">Notifications
                      <div class="float-right">
                          <a href="#">Mark All As Read</a>
                      </div>
                  </div>
                  <div class="dropdown-list-content dropdown-list-icons">
                      <a href="#" class="dropdown-item dropdown-item-unread">
                          <div class="dropdown-item-icon bg-primary text-white">
                              <i class="fas fa-code"></i>
                          </div>
                          <div class="dropdown-item-desc"> Template update is available now!
                              <div class="time text-primary">2 Min Ago</div>
                          </div>
                      </a>
                      <a href="#" class="dropdown-item">
                          <div class="dropdown-item-icon bg-info text-white">
                              <i class="far fa-user"></i>
                          </div>
                          <div class="dropdown-item-desc">
                              <b>You</b> and <b>Dedik Sugiharto</b> are now friends
                              <div class="time">10 Hours Ago</div>
                          </div>
                      </a>
                      <a href="#" class="dropdown-item">
                          <div class="dropdown-item-icon bg-success text-white">
                              <i class="fas fa-check"></i>
                          </div>
                          <div class="dropdown-item-desc">
                              <b>Kusnaedi</b> has moved task <b>Fix bug header</b> to <b>Done</b>
                              <div class="time">12 Hours Ago</div>
                          </div>
                      </a>
                      <a href="#" class="dropdown-item">
                          <div class="dropdown-item-icon bg-danger text-white">
                              <i class="fas fa-exclamation-triangle"></i>
                          </div>
                          <div class="dropdown-item-desc">
                              Low disk space. Let's clean it!
                              <div class="time">17 Hours Ago</div>
                          </div>
                      </a>
                      <a href="#" class="dropdown-item">
                          <div class="dropdown-item-icon bg-info text-white">
                              <i class="fas fa-bell"></i>
                          </div>
                          <div class="dropdown-item-desc">
                              Welcome to CodiePie template!
                              <div class="time">Yesterday</div>
                          </div>
                      </a>
                  </div>
                  <div class="dropdown-footer text-center">
                      <a href="#">View All <i class="fas fa-chevron-right"></i></a>
                  </div>
                  </div>
              </li>
              <li class="dropdown">
              <?php
                                $profileid = $_SESSION['userId'];

                                $querys = " SELECT * FROM user  WHERE id ='$profileid'";
                                $user = $db->selectDT($querys);
								if($user){
									while($result = $user->fetch_assoc()){		
								?>
                  <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                  <img alt="image" src="assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
                  <div class="d-sm-none d-lg-inline-block">Hi <?php echo $result['username'] ?>'s</div></a>
                  <div class="dropdown-menu dropdown-menu-right">
                      <div class="dropdown-title">Logged in 5 min ago</div>
                      <a href="profile/profile.php" class="dropdown-item has-icon"><i class="far fa-user"></i> Profile</a>
                      <a href="" class="dropdown-item has-icon"><i class="fas fa-cog"></i> Settings</a>
                      <div class="dropdown-divider"></div>
                      <a href="logout.php" class="dropdown-item has-icon text-danger"><i class="fas fa-sign-out-alt"></i> Logout</a>
                  </div>
                  <?php
                     }
                     }
                      ?>
              </li>
          </ul>
      </nav>
        <!-- Start main left sidebar menu -->
<div class="main-sidebar sidebar-style-3">
          <aside id="sidebar-wrapper">
              <div class="sidebar-brand">
                  <a href="index-2.html">CodiePie</a>
              </div>
              <div class="sidebar-brand sidebar-brand-sm">
                  <a href="index-2.html">CP</a>
              </div>
              <ul class="sidebar-menu">
                     <?php
                     $userRole = $_SESSION['userRole'];
              if($userRole == 1){
                    ?>
                 <li><a class="nav-link active" href="index.php"><i class="fas fa-pencil-ruler"></i> <span>Dashboard</span></a></li>
                  <li class="dropdown ">
                      <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Post</span></a>
                      <ul class="dropdown-menu">
                          <li><a class="nav-link" href="post/postinsert.php">Add Post</a></li>
                          <li class=""><a class="nav-link" href="post/post.php">Post</a></li>
                      </ul>
                  </li>
                  <li class="dropdown ">
                      <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Category</span></a>
                      <ul class="dropdown-menu">
                          <li><a class="nav-link" href="category/category.php">Alll Category</a></li>
                      </ul>
                  </li>
                  <li class="dropdown ">
                      <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Title & Social</span></a>
                      <ul class="dropdown-menu">
                          <li><a class="nav-link" href="social/logoinsert.php">Add Title</a></li>
                          <li class=""><a class="nav-link" href="social/logo.php">Title</a></li>
                      </ul>
                  </li>
                  <li class="dropdown ">
                      <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Logo</span></a>
                      <ul class="dropdown-menu">
                          <li><a class="nav-link" href="logos/logos.php"> Logo</a></li>
                      </ul>
                  </li>
                  <li class="dropdown ">
                      <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Page</span></a>
                      <ul class="dropdown-menu">
                          <li><a class="nav-link" href="page/pageinsert.php"> Add Page</a></li>
                          <li><a class="nav-link" href="page/pages.php">  Page</a></li>
                      </ul>
                  </li>
                  <li class="dropdown ">
                      <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>User</span></a>
                      <ul class="dropdown-menu">
                          <li><a class="nav-link" href="user/adduser.php"> Add User</a></li>
                          <li><a class="nav-link" href="user/user.php"> User</a></li>
                          <li><a class="nav-link" href="user/approve.php">Approve  User</a></li>
                      </ul>
                  </li>
                  <li class="dropdown ">
                      <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Contact</span></a>
                      <ul class="dropdown-menu">
                          <li><a class="nav-link" href="contact/contact.php">Contact</a></li>
                          <li><a class="nav-link" href="contact/rcontact.php">Reply Message</a></li>
                      </ul>
                  </li>
                  <li><a class="nav-link" href="credits.html"><i class="fas fa-pencil-ruler"></i> <span>Credits</span></a></li>
                <?php
              }elseif($userRole == 2){
                  ?>
                <li><a class="nav-link active" href="index.php"><i class="fas fa-pencil-ruler"></i> <span>Dashboard</span></a></li>
                  <li class="dropdown ">
                      <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Post</span></a>
                      <ul class="dropdown-menu">
                          <li><a class="nav-link" href="post/postinsert.php">Add Post</a></li>
                          <li class=""><a class="nav-link" href="post/post.php">Post</a></li>
                      </ul>
                  </li>
                  <li class="dropdown ">
                      <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Category</span></a>
                      <ul class="dropdown-menu">
                          <li><a class="nav-link" href="category/category.php">Alll Category</a></li>
                      </ul>
                  </li>
                  <li class="dropdown ">
                      <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Page</span></a>
                      <ul class="dropdown-menu">
                          <li><a class="nav-link" href="page/pageinsert.php"> Add Page</a></li>
                          <li><a class="nav-link" href="page/pages.php">  Page</a></li>
                      </ul>
                  </li>
                  <li class="dropdown ">
                      <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>User</span></a>
                      <ul class="dropdown-menu">
                          <li><a class="nav-link" href="user/user.php"> User</a></li>
                      </ul>
                  </li>
                  <?php

              }elseif($userRole == 3){
                ?>
                 <li><a class="nav-link active" href="index.php"><i class="fas fa-pencil-ruler"></i> <span>Dashboard</span></a></li>
                  <li class="dropdown ">
                      <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Post</span></a>
                      <ul class="dropdown-menu">
                          <li><a class="nav-link" href="post/postinsert.php">Add Post</a></li>
                          <li class=""><a class="nav-link" href="post/post.php">Post</a></li>
                      </ul>
                  </li>
                  <li class="dropdown ">
                      <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Category</span></a>
                      <ul class="dropdown-menu">
                          <li><a class="nav-link" href="category/category.php">Alll Category</a></li>
                      </ul>
                  </li>
                  <li class="dropdown ">
                      <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>User</span></a>
                      <ul class="dropdown-menu">
                          <li><a class="nav-link" href="user/user.php"> User</a></li>
                      </ul>
                  </li>
                <?php
              }elseif($userRole == 4){
                ?>
                 <li><a class="nav-link active" href="index.php"><i class="fas fa-pencil-ruler"></i> <span>Dashboard</span></a></li>
                  <li class="dropdown ">
                      <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Post</span></a>
                      <ul class="dropdown-menu">
                          <li><a class="nav-link" href="post/postinsert.php">Add Post</a></li>
                          <li class=""><a class="nav-link" href="post/post.php">Post</a></li>
                      </ul>
                  </li>
                  <li class="dropdown ">
                      <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Category</span></a>
                      <ul class="dropdown-menu">
                          <li><a class="nav-link" href="category/category.php">Alll Category</a></li>
                      </ul>
                  </li>
                <?php
              }
              ?>
              
              </ul>
          </aside>
      </div>

      <?php

    

