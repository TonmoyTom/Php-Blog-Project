<?php

include_once("../includes/header.php");
// if(!isset($_GET['pageid']) || $_GET['pageid'] == NULL){
//     echo " <script> window.location = 'pages.php'; </script>";
//   }else{
//       $pageid = $_GET['pageid'];
//   }


if(isset($_POST['submit'])){


$id = filter_input(INPUT_POST, 'delete_id',FILTER_SANITIZE_NUMBER_INT);
$id = mysqli_real_escape_string($db->link,$id);
$query = "DELETE FROM pages WHERE  id = '$id'";
$delete = $db->delete($query);
if($delete){
    echo " Delete Sussessfull";
    echo " <script> window.location = 'pages.php'; </script>";
}else{
    echo "Delete not Sussessfull";
    echo " <script> window.location = 'pages.php'; </script>";
}
}
    
