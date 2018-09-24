<?php

session_start();
define('ALL OKAY', TRUE);
include('db.php');
include('nav.php');


$news_id = $_GET['news_id'];


if(isset($_SESSION['user_id'])){

//all news sql
  $allusers = "SELECT * FROM news WHERE news_id='$news_id'";
    $result1 = mysqli_query($conn,$allusers) or die(mysqli_error($conn));
    
    
    
    //admin sql
    $now = $_SESSION['user_id'];
  $profile_name = "SELECT * FROM users WHERE user_id='$now' AND user_type= 'admin'";
    $result2 = mysqli_query($conn,$profile_name) or die(mysqli_error($conn));
     $rows2 = mysqli_fetch_array($result2);



?>
    
    <section class="my-top-section probootstrap-bg-light" >
      <div class="container">
        <div class="row">
          <div class="col-md-12 probootstrap-form">
            
            <h2 > <span  class=" icon-stats-dots"></span> Dashboard</h2>
            <h3> Hello, <?php echo $rows2['fname'],' ',$rows2['lname']  ; ?>! <span class=" icon-happy2" style="font-size: 20px;"></span></h3>
            <h4> You're the Admin and here is your control panel!</h4>
              
            
            
            
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="probootstrap-service-item " >
                      <div style="text-align:center">
    
      
    
          
      </div>
                   
     
                
			 
		
		<?php
		
		while ($rows1 = mysqli_fetch_array($result1)){
			
    
			echo ' 
					
					<div class="my-news-section" >
					<h3>'.$rows1['title'].'</h3>
                    <p>'.$rows1['des'].' </p>
					 
 
					   <a href="admin_news.php"><button  class="btn btn-default ">BACK</button></a>
                        <a href="delete.php?news_id='.$rows1['news_id'].'" ><button class="btn btn-primary" >Delete</button></a></div>
				';
	
			
		}
             
            
            ?>  
       
    
      
              
              
              
            </div>
           
          </div>
          
          
           
          
        </div>
         
      </div>
   
            
            
            
            
            
            
            
            
          </div>
          
        </div>
      </div>
      
      
    </section>
    
    

    <?php 
    
}else{
    http_response_code(404);
    include('403forbidden.php');
   // header('location: signin.php');
}


include('footer.php');

?>
    
    
    

    
    
    
    
    

  