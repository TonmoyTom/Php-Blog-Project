<?php

include_once("../includes/header.php");
if(!isset($_GET['catid']) || $_GET['catid'] == NULL){
  //echo " <script> window.location = 'category.php'; </script>";
}else{
    $catid = $_GET['catid'];
}

	$querys = " SELECT * FROM catagory WHERE id= $catid";
$post = $db->selectDT($querys);
    while($result = $post->fetch_assoc()){
        if($result['status'] == 0){
                $query = "UPDATE catagory SET status= '1' WHERE id = '$catid'";
        
        }else{
            $query = "UPDATE catagory SET status= '0' WHERE id = '$catid'";
        }
    }
$update = $db->update($query);
if($update){
    echo " Update Sussessfull";
    echo " <script> window.location = 'category.php'; </script>";
}else{
    echo "Upadte not Sussessfull";
echo " <script> window.location = 'category.php'; </script>";

}

    



