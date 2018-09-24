<?php
if(!defined('ALL OKAY')){
    header('location:index.php');
}
    $database = 'cfu';
   $host = 'localhost';
   $user = 'root';
   $pass = '';

   $conn=mysqli_connect("$host","$user","$pass")or die("Failed To Connect");
mysqli_select_db($conn,"$database")or die("Failed to select database");
   



?>    