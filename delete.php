<?php

if(!defined('ALL OKAY')){
    header('location:index.php');
}
include('db.php');


$lang_id = $_GET['lang_id'];
$exp_id = $_GET['exp_id'];
$faq_id = $_GET['faq_id'];

$placed_id = $_GET['placed_id'];
$employee_id = $_GET['employee_id'];
$guest_id = $_GET['guest_id'];
$edu_id = $_GET['edu_id'];
$edu_degree = $_GET['edu_degree'];
$admin_id= $_GET['admin_id'];
$news_id= $_GET['news_id'];
$cat= $_GET['cat'];
$id= $_GET['id'];
  if($cat){      
        $sql11 = "DELETE FROM proof WHERE proof_cat='$cat' AND u_id='$id'" ;
        $result11 = mysqli_query($conn,$sql11);
     header('location: client_update.php');    

}

if($admin_id){
    
        
        
        $sql11 = "DELETE FROM users WHERE user_id='$admin_id' AND user_type='admin'" ;
        $result11 = mysqli_query($conn,$sql11);
     header('location: admin_admins.php');    
}

if($news_id){
    
        
        
        $sql11 = "DELETE FROM news WHERE news_id='$news_id'" ;
        $result11 = mysqli_query($conn,$sql11);
     header('location: admin_news.php');    
}

if($edu_degree){
    if($edu_id){
        
   
    $q="SELCT * FROM docs WHERE degree = '$edu_degree' AND u_id='$edu_id'";
     $res = mysqli_query($conn,$q);
    $row = mysqli_fetch_array($res);
    $item = $row['file'];
    unlink('uploads/files/'.$item);
    
    $sql11 = "DELETE FROM docs WHERE degree='$edu_degree'" ;
        $result11 = mysqli_query($conn,$sql11);
     header('location: client_update.php');
         }
}

if($guest_id ){
    
     $sql11 = "DELETE FROM guest WHERE id='$guest_id'" ;
        $result11 = mysqli_query($conn,$sql11);
     header('location: admin_guests.php');   
}

if($employee_id ){
    
     $sql11 = "DELETE FROM team WHERE id='$employee_id'" ;
        $result11 = mysqli_query($conn,$sql11);
     header('location: admin_employee_view.php');   
}

if($placed_id ){
    
     $sql11 = "DELETE FROM placed WHERE c_id='$placed_id'" ;
        $result11 = mysqli_query($conn,$sql11);
     header('location: admin_placed_view.php');   
}


if($lang_id){
    $sql11 = "UPDATE users SET lang='' WHERE user_id='$lang_id'" ;
        $result11 = mysqli_query($conn,$sql11);
     header('location: client_update.php');   
}

if($exp_id){
    $sql11 = "UPDATE users SET exp='' WHERE user_id='$exp_id'" ;
        $result11 = mysqli_query($conn,$sql11);
     header('location: client_update.php');   
}

if($faq_id){
    $sql11 = "DELETE FROM faq WHERE id='$faq_id'" ;
        $result11 = mysqli_query($conn,$sql11);
     header('location: faq_edit.php');   
}
?>