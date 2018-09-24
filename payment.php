<?php

//header('location: https://imjo.in/UDzvRP');


define('ALL OKAY', TRUE);
session_start();
include('db.php');
include('nav.php');


if(isset($_SESSION['email'])){
    $now = $_SESSION['email'];
 $profile_name = "SELECT * FROM users WHERE email='$now'";
    $result1 = mysqli_query($conn,$profile_name) or die(mysqli_error($conn));
     $rows1 = mysqli_fetch_array($result1);
 



    
   
?>

        <section class="my-top-section probootstrap-bg-light" >
      <div class="container">
        <div class="row">
          <div class="col-md-12 my-section">
 
             <form action=" " class="probootstrap-form my-section"  style="text-align:center">
                
                <?php   
       if($rows1['reg_pay_status'] != 'success'){
           
       
        
    ?>
                
              <a href="https://imjo.in/UDzvRP" class="btn btn-primary">PAY REGISTRATION FEES</a>
              
              
              <?php  }else{
   
                 ?>
                 
                  <a href="https://imjo.in/VtnvfB" class="btn btn-primary">PAY POST JOB FEES</a>
                  <?php }?>
               
            </form> 
          </div>    
        </div>
      </div>
    </section>



















<?php
}
else{
    
    http_response_code(404);
    include('403forbidden.php');
   // header('location: signin.php');
}


include('footer.php');

?>