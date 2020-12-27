<?php

include_once("../includes/header.php");
if(!isset($_GET['postid']) || $_GET['postid'] == NULL){
  //echo " <script> window.location = 'category.php'; </script>";
}else{
    $postid = $_GET['postid'];
    $query = "SELECT * FROM post WHERE post_id = '$postid' ";
    $delpost = $db->selectDT($query);
    if($delpost){
        while($post = $delpost->fetch_assoc() ){
            $one_link = $post['image'];
            $two_link = $post['image_two'];
            unlink($one_link);
            unlink($two_link);
        }
    }

    $query = "DELETE FROM `post` WHERE post_id = '$postid'";
    $delete = $db->delete($query);
    if($delete){
        echo " Delete Sussessfull";
        echo " <script> alert('Data Delete Sussessfull.'); </script>";
        echo " <script> window.location = 'post.php'; </script>";

    }else{
        echo "Delete not Sussessfull";
        echo " <script> window.location = 'post.php'; </script>";
    }

}


