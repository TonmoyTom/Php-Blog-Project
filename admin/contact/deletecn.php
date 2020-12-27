<?php

include_once("../includes/header.php");
$userRole = $_SESSION['userRole'];
if($userRole != 1){
    echo " <script> window.location = '../index.php'; </script>";
}
if(!isset($_GET['contactid']) || $_GET['contactid'] == NULL){
  echo " <script> window.location = 'category.php'; </script>";
}else{
    $contactid = $_GET['contactid'];
}
$query = "DELETE FROM contact WHERE  id = '$contactid'";
$delete = $db->delete($query);
if($delete){
    echo " Delete Sussessfull";
    echo " <script> window.location = 'contact.php'; </script>";
}else{
    echo "Delete not Sussessfull";
    echo " <script> window.location = 'contact.php'; </script>";
}
    
?>

