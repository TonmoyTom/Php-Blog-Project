<?php

include_once("../includes/header.php");
if($userRole != 1){
    echo " <script> window.location = '../index.php'; </script>";
}
if(!isset($_GET['userid']) || $_GET['userid'] == NULL){
    echo " <script> window.location = 'user.php'; </script>";
  }else{
      $userid = $_GET['userid'];
  }
$query = "DELETE FROM user WHERE  id = '$userid'";
$delete = $db->delete($query);
if($delete){
    echo " Delete Sussessfull";
    echo " <script> window.location = 'user.php'; </script>";
}else{
    echo "Delete not Sussessfull";
    echo " <script> window.location = 'user.php'; </script>";
}
    
