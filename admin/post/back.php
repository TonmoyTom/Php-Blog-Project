<?php

include_once("../includes/header.php");

if(!isset($_GET['postid']) || $_GET['postid'] == NULL){
    //echo " <script> window.location = 'category.php'; </script>";
  }else{
      $postid = $_GET['postid'];
  }


if($postid){
    echo " <script> window.location = 'post.php'; </script>";
}else{
    echo " <script> window.location = 'view.php'; </script>";
}