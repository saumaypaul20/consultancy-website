<?php 
define('ALL OKAY', TRUE);

include('server.php'); 
include('nav.php');
if(isset($_SESSION['email'])){
  http_response_code(404);
    include('403forbidden.php');
}elseif(isset($_SESSION['user_id'])){
     http_response_code(404);
    include('403forbidden.php');
}else{

?>
<!-- END section -->
<section class="my-top-section probootstrap-bg-light">
    <div class="container">
        <div class="row">
            
            
            
           <!----  login----->  
            
            <div class="col-md-6">
            
             
             
             <form action="server.php" class="probootstrap-form" method="POST" >
              <h2 class="text-black mt0">Login</h2>
              
              <?php   if(isset($_POST['login_btn'])){
    include('errors.php'); 
}
     ?>
              <div class="form-group">
                <input type="email" class="form-control" placeholder="Your Email" name="email" required>
              </div>
              
              <div class="form-group">
                <input type="password" class="form-control" placeholder="Enter Password" id="psw" name="psw" required>
              </div>
              
              
            <div class="form-group">
                <input  type="submit" name="login_btn" class="btn btn-primary" value="Login">
                <div style="margin-left:20px; text-align: center; display:inline-block; padding-top:5px;">Forgot Password? <a href="forget.php">Reset Now</a></div>
              </div>
                 
              
            </form>
            
            
            
          </div>
           
           
           
           
           
           
           
           
           
           

           
           
           
           
           <!----  register-----> 
            
                       <div class="col-md-6" >    



                <form action="" class="probootstrap-form" method="POST">
                    <h2 class="text-black mt0">Not a Member? Register Now!</h2>
                    <?php   if(isset($_POST['register_btn'])){
    include('errors.php'); 
}
     ?>
                    


                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="First Name" name="first" value="<?php echo $first ?>"  >
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Last Name" name="last" value="<?php echo $last ?>" >
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" placeholder="Your Email" name="email" value="<?php echo $email ?>" >

                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Your 10 digit Phone Number" name="phone" maxlength="10" pattern="^\d{10}$" value="<?php echo $phone ?>" >
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Atleast 8 characters Password with 1 number, 1 uppercase and lowercase letter" id="psw" name="psw" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"  >
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Retype Password" name="c_psw" id="c_psw"  >
                    </div>

                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" name="register_btn" value="Register">
                    </div>
                     
                </form>
            </div>
            
            
            
        </div>  
    </div>
</section>

<?php 
        }
include('footer.php');

?>