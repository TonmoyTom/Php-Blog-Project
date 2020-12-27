<?php

include_once("../includes/header.php");
if(!isset($_GET['postid']) || $_GET['postid'] == NULL){
  //echo " <script> window.location = 'category.php'; </script>";
}else{
    $postid = $_GET['postid'];
}

$querys = " SELECT * FROM post WHERE post_id = $postid";
$post = $db->selectDT($querys);
    while($result = $post->fetch_assoc()){
        if($result['publish'] == 0){
                $query = "UPDATE post SET publish = '1' WHERE post_id = '$postid'";
        
        }else{
            $query = "UPDATE post SET publish = '0' WHERE post_id = '$postid'";
        }
    }
$update = $db->update($query);
if($update){
    echo " Update Sussessfull";
    echo " <script> window.location = 'post.php'; </script>";
}else{
    echo "Upadte not Sussessfull";
echo " <script> window.location = 'post.php'; </script>";

}
