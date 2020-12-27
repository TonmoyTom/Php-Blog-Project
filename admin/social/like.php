<?php

include_once("../includes/header.php");
$userRole = $_SESSION['userRole'];
if($userRole != 1){
    echo " <script> window.location = '../index.php'; </script>";
}

$querys = " SELECT * FROM social WHERE id= '1' ";
$post = $db->selectDT($querys);
    while($result = $post->fetch_assoc()){
        if($result['status'] == 0){
                $query = "UPDATE social SET status= '1'   WHERE id = '1' ";
        
        }else{
            $query = "UPDATE social SET status= '0'   WHERE id = '1' ";
        }
    }
$update = $db->update($query);
if($update){
    echo " Update Sussessfull";
    echo " <script> window.location = 'logo.php'; </script>";
}else{
    echo "Upadte not Sussessfull";
echo " <script> window.location = 'logo.php'; </script>";

}