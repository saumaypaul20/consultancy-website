<?php

session_start();
define('ALL OKAY', TRUE);
include('db.php');
include('nav.php');

if(isset($_SESSION['user_id'])){

$now = $_SESSION['user_id'];
  $profile_name = "SELECT * FROM users WHERE user_id='$now'";
    $result1 = mysqli_query($conn,$profile_name) or die(mysqli_error($conn));
     $rows1 = mysqli_fetch_array($result1);


?>
    
    <section class="my-top-section probootstrap-bg-light " >
      <div class="container">
        <div class="row">
          <div class="col-md-12 probootstrap-form">
            
            <h2 > <span  class=" icon-stats-dots"></span> Dashboard</h2>
            <h3> Hello, <?php echo $rows1['fname'],' ',$rows1['lname']  ; ?>! <span class=" icon-happy2" style="font-size: 20px;"></span></h3>
            <h4> You're the Admin and here is your control panel!</h4>
              
            
            
            <section class="my-section"  >
      <div class="container my-container">
        <div class="row">
          
            
            <div class="col-md-4 my-service">
            <div class="probootstrap-service-item my-service-inner-item" >
             
              <a href="admin_update.php"><h2 > <span class=" icon-profile"></span> Update Profile</h2></a>
                <p>Edit or Add your personal information. Change your password.</p>
              
              
            </div>
          </div>
          <div class="col-md-4 my-service">
            <div class="probootstrap-service-item my-service-inner-item " >
                  <a href="admin_guests.php"> <h2 ><span class="icon-bubbles"></span> Guest Queries</h2></a>
              <p>View the Guest list and their queries.</p>
              
            </div>
          </div>
          <div class="col-md-4 my-service " >
            <div class="probootstrap-service-item my-service-inner-item" >
              <a href="admin_news.php">  <h2 ><span class="icon-newspaper"></span> Add/Edit News</h2></a>
              
               <p>Add News or Banners for the Clients.</p>
              
              
            </div>
          </div>
          
          
          <div class="col-md-4 my-service">
            <div class="probootstrap-service-item  my-service-inner-item" >
              <a href="admin_clients.php"><h2 ><span class="icon-user-tie "></span> View Candidates</h2></a>
               <p>View the list of enrolled Clients. View their details.</p>
              
            </div>
          </div>
          <div class="col-md-4 my-service">
            <div class="probootstrap-service-item my-service-inner-item" >
                  <a href="admin_admins.php"> <h2 ><span class=" icon-user2"></span> Edit Admins</h2></a>
              <p>View the list of Admins.</p>
              
            </div>
          </div>
          
          <div class="col-md-4 my-service">
            <div class="probootstrap-service-item my-service-inner-item" >
                  <a href="admin_employee_view.php"> <h2 ><span class=" icon-user2"></span> Edit Team</h2></a>
              <p>View and Edit Team Members to be displayed in Team Page.</p>
              
            </div>
          </div>
          <div class="col-md-4 my-service">
            <div class="probootstrap-service-item my-service-inner-item" >
                  <a href="admin_placed_view.php"> <h2 ><span class=" icon-user2"></span> Edit Reviews</h2></a>
              <p>View and Edit Reviews to be displayed in Review Section of home page.</p>
              
            </div>
          </div>
          
          <div class="col-md-4 my-service">
            <div class="probootstrap-service-item my-service-inner-item" >
                <a href="faq_edit.php"> <h2 ><span class=" icon-question"></span> Edit FAQs</h2></a>
              <p>Edit FAQs for users to be displayed in Help page.</p>
              
            </div>
          </div>
          
           
        </div>
      </div>
    </section>
            
            
            
            
            
            
            
            
            
          </div>
          
        </div>
      </div>
      
      
    </section>
    
    

    <?php 
    
}else{
    
    http_response_code(404);
    include('403forbidden.php');
}


include('footer.php');

?>
    
    
    
    
    
    
    
    
    
    
    

  