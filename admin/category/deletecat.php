<?php

include_once("../includes/header.php");
// if(!isset($_GET['catid']) || $_GET['catid'] == NULL){
//   echo " <script> window.location = 'category.php'; </script>";
// }else{
//     $catid = $_GET['catid'];
// }


if(isset($_POST['submit'])){
  $id = $_POST['delete_id'];
  $query = "DELETE FROM catagory WHERE  id = '$id'";
  $delete = $db->delete($query);
  if($delete){
      echo " Delete Sussessfull";
      echo " <script> window.location = 'category.php'; </script>";
  }else{
      echo "Delete not Sussessfull";
      echo " <script> window.location = 'category.php'; </script>";
  }
}

    
