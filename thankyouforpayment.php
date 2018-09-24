<?php

$trans_id = $_GET['payment_id'];
    $status = $_GET['status'];

session_start();
define('ALL OKAY', TRUE);
include('db.php');
include('nav.php');

 

    

$active_gen=FALSE;    
$active_edu=FALSE;
$active_proof=FALSE;
$active_exp=FALSE;
        
if(isset($_SESSION['email'])){
    $now = $_SESSION['email'];
 $profile_name = "SELECT * FROM users WHERE email='$now'";
    $result1 = mysqli_query($conn,$profile_name) or die(mysqli_error($conn));
     $rows1 = mysqli_fetch_array($result1);
$now_id=$rows1['user_id'];

    
    
    mysqli_query($conn, "UPDATE users SET reg_pay_txn='$trans_id', reg_pay_status='$status' WHERE user_id= '$now_id'");

?>
       
        
       
       
    <section class="my-top-section probootstrap-bg-light" >
      <div class="container">
        <div class="row">
          <div class="col-md-12 my-section">
            
             
             
             <form action=" " class="probootstrap-form my-section"  style="text-align:center">
                 <h2>Thank you for the payment.</h2>
<p>Please click the <strong>BELOW BUTTON</strong> to exit this page.</p>
              <a href="profile.php" class="btn btn-primary">GO TO DASHBOARD</a>
              
            </form>
  
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
    
    