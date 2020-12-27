<?php

include_once("../includes/header.php");
$userRole = $_SESSION['userRole'];
if($userRole != 1){
    echo " <script> window.location = '../index.php'; </script>";
}
if(!isset($_GET['userid']) || $_GET['userid'] == NULL){
  //echo " <script> window.location = 'category.php'; </script>";
}else{
    $userid = $_GET['userid'];
}

$querys = " SELECT * FROM user WHERE id = $userid";
$post = $db->selectDT($querys);
    while($result = $post->fetch_assoc()){
        if($result['approve'] == 1){
                $query = "UPDATE user SET approve = '2', status = 2 WHERE id = '$userid'";
        
        }else{
            $query = "UPDATE user SET approve = '1' status = 2 WHERE id = '$userid'";
        }
    }
$update = $db->update($query);
if($update){
    echo " Update Sussessfull";
    echo " <script> window.location = 'user.php'; </script>";
}else{
    echo "Upadte not Sussessfull";
echo " <script> window.location = 'user.php'; </script>";
}
