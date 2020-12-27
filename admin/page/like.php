<?php

include_once("../includes/header.php");
if(!isset($_GET['pageid']) || $_GET['pageid'] == NULL){
  //echo " <script> window.location = 'category.php'; </script>";
}else{
    $pageid = $_GET['pageid'];
}

	$querys = " SELECT * FROM pages WHERE id= $pageid";
$post = $db->selectDT($querys);
    while($result = $post->fetch_assoc()){
        if($result['status'] == 0){
                $query = "UPDATE pages SET status= '1' WHERE id = '$pageid'";
        
        }else{
            $query = "UPDATE pages SET status= '0' WHERE id = '$pageid'";
        }
    }
$update = $db->update($query);
if($update){
    echo " Update Sussessfull";
    echo " <script> window.location = 'pages.php'; </script>";
}else{
    echo "Upadte not Sussessfull";
echo " <script> window.location = 'pages.php'; </script>";

}
