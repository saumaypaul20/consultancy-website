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
          <div class="col-md-12">
            
             
             
             <form action="server.php" class="probootstrap-form" method="POST" >
              <h2 class="text-black mt0">Login</h2>
              
              <?php include('errors.php');?>
              <div class="form-group">
                <input type="email" class="form-control" placeholder="Your Email" name="email" required>
              </div>
              
              <div class="form-group">
                <input type="password" class="form-control" placeholder="Enter Password" id="psw" name="psw" required>
              </div>
              
              
            <div class="form-group">
                <input  type="submit" name="login_btn" class="btn btn-primary" value="Login">
                <div style="margin-left:20px; text-align: center; display:inline-block;">Forgot Password? <a href="forget.php"> Reset Now</a></div>
              </div>
                 <br> 
                 <span style="text-align: center">Not a member? <a href="signup.php"> Register</a></span> 
              
            </form>
            
            
            
          </div>
          
        </div>
      </div>
    </section>
    
    

    
    
    

      <?php 
}

include('footer.php');

?>
    
    