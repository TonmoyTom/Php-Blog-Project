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


if($contactid){
    echo " <script> window.location = 'contact.php'; </script>";
}else{
    echo " <script> window.location = 'reply.php'; </script>";
}