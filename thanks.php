<?php
  
define('ALL OKAY', TRUE);
include('server.php');

if(isset($_SESSION['email'])){
   http_response_code(404);
    include('403forbidden.php');
}elseif(isset($_SESSION['user_id'])){
     http_response_code(404);
    include('403forbidden.php');
}else{
    
    
include('nav.php');
    

?>
     
    <!-- END section -->
    <section class="my-top-section probootstrap-bg-light" >
      <div class="container">
        <div class="row">
          <div class="col-md-12 my-section">
            
             
             
             <form action=" " class="probootstrap-form my-section"  style="text-align:center">
                 <h3>
              Thank you for your interest.<br> We will get in touch with you shortly.
            
              </h3>
              <p>You can now exit this page by clicking the below button.</p>
              <a href="index.php" class="btn btn-primary">HOME</a>
              
            </form>
            
            
            
          </div>
          
        </div>
      </div>
    </section>
    
    

    
    
    

      <?php 
}

include('footer.php');

?>
    
    