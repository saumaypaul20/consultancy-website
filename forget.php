<?php
//include('server.php');
define('ALL OKAY', TRUE);
include('db.php');
session_start();
if(isset($_SESSION['email'])){
     http_response_code(404);
    include('403forbidden.php');
}elseif(isset($_SESSION['user_id'])){
      http_response_code(404);
    include('403forbidden.php');
}else{
    
    
    $errors=array();
    
    
    if(isset($_POST['reset_btn'])){
        $mail= mysqli_real_escape_string($conn, $_POST['email']);
        $mail= trim($mail);
        $q = "SELECT * FROM users WHERE email='$mail' AND user_type='' ";
        $res = mysqli_query($conn, $q);
        $row = mysqli_fetch_array($res);
        if(mysqli_num_rows($res) <  0){
            array_push($errors, "Email: $mail is not found in our records.");
            
        } 
        
        
        if(count($errors) == 0){
             if(mysqli_num_rows($res) > 0){
           
            $code = rand( 10000000, 99999999);
                 $pwd=password_hash($code,PASSWORD_DEFAULT);
            
            $subj = "PASSWORD RESET- New Account Password- Consultancy for Unemployed";
            $msg = "<html><body><h2>Password is Changed!</h2><p>Your New Password is $code.<strong>After logging in with this password, please change the password to a new one.</strong></p> </body><html>";
             
             
                 
                 $headers =  'MIME-Version: 1.0' . "\r\n"; 
                $headers .= "From: support@consultancyforunemployed.in". "\r\n";
                $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; 
             
 
            mail($mail,$subj,$msg,$headers);
                 
                 mysqli_query($conn,"UPDATE users SET password = '$pwd' WHERE email= '$mail' ");
                 header('location: check.php');
             }
        }
    }
    
include('nav.php');
    

?>
     
    <!-- END section -->
    <section class="my-top-section probootstrap-bg-light" >
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            
             
             
             <form action=" " class="probootstrap-form" method="POST" >
              <h2 class="text-black mt0">Reset Password</h2>
              <?php include('errors.php');?>
              
              <div class="form-group">
                <input type="email" class="form-control" placeholder="Your Email" name="email" required>
              </div>
              
                          
            <div class="form-group">
                <input  type="submit" name="reset_btn" class="btn btn-primary" value="Submit">
                
              </div>
                <span style="text-align: center">Already a member? <a href="signin.php"> Login</a></span>
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
    
    