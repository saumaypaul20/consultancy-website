<?php


if(!defined('ALL OKAY')){
    header('location:index.php');
}


?>




<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Consultancy for Unemployed</title>
    <meta name="description" content="Consultancy for Unemployment">
    <meta name="keywords" content="consultancy">
    <link rel="stylesheet" href="css/mystyle.css">
    <link rel="stylesheet" href="css/styles-merged.css">
    <link rel="stylesheet" href="css/style.min.css">
    <link rel="stylesheet" href="fonts/icomoon/style.css">
      <link href="css/textslider.css" type="text/css" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Ropa+Sans" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Work+Sans:700" rel="stylesheet"> 
       
 <link rel="stylesheet" type="text/css" href="akan.css">
    <!--[if lt IE 9]>
      <script src="js/vendor/html5shiv.min.js"></script>
      <script src="js/vendor/respond.min.js"></script>
    <![endif]-->
    
    
    
    
  </head>
  <body>
    
    <!-- Fixed navbar -->
    <nav class="navbar navbar-default probootstrap-navbar">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <!--logo here-->
          
          <a href="index.php">
              <img src="images/dp1.jpg" alt="" width="100px" style="padding:10px;">

          </a>
          
        </div>

        <div id="navbar-collapse" class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            
            
         
           
           <?php if(isset($_SESSION['email'])){?>
            
            
            <li ><a class="link" href="index.php" >WELCOME</a></li>
            
            <li><a  class="link" href="team.php" >ABOUT</a></li>
            <li><a  class="link" href="news.php" >NEWS</a></li>
          <li ><a class="link" href="help.php"  >HELP</a></li>
            <li ><a class="link" href="profile.php">DASHBOARD</a></li>
            <li ><a class="link" href="logout.php">LOGOUT</a></li>
            
            
     <?php } elseif( isset($_SESSION['user_id'])){
    
    ?>
     <li ><a class="link" href="index.php" >WELCOME</a></li>
            
            <li><a  class="link" href="team.php" >ABOUT</a></li>
            <li><a  class="link" href="news.php" >NEWS</a></li>
          <li ><a class="link" href="help.php"  >HELP</a></li>
            <li ><a class="link" href="admin_dash.php">DASHBOARD</a></li>
            <li ><a class="link" href="logout.php">LOGOUT</a></li>
    
    
    <?php
    
    
}
              
              
              
              
              else{?>
         <li ><a class="link" href="index.php" >WELCOME</a></li>
            
            <li><a  class="link" href="team.php" >ABOUT</a></li>
            <li><a  class="link" href="news.php" >NEWS</a></li>
          <li ><a class="link" href="help.php"  >HELP</a></li>
          <li ><a class="link" href="signup.php"  >ACCOUNT</a></li>
         <?php }
              ?>
          </ul>
        </div>
      </div>
    </nav>
    
   
  
 






















