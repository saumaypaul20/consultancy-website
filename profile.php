<?php

session_start();
define('ALL OKAY', TRUE);
include('db.php');
include('nav.php');

if(!isset($_SESSION['email'])){
    
    http_response_code(404);
    include('403forbidden.php');
    
    
}else{

$now = $_SESSION['email'];
  $profile_name = "SELECT * FROM users WHERE email='$now'";
    $result1 = mysqli_query($conn,$profile_name) or die(mysqli_error($conn));
     $rows1 = mysqli_fetch_array($result1);


?>

    <section class="my-top-section probootstrap-bg-light " >
        <div class="container">
            <div class="row">
                <div class="col-md-12 probootstrap-form">

                    <span class=" icon-equalizer" style="font-size:25px;"></span><h2 style="display:inline"> Dashboard</h2><br><br>
                    <h4> Welcome,
                        <?php echo $rows1['fname'],' ',$rows1['lname']  ; ?> <span class=" icon-happy2" style="font-size: 15px;"></span>
                    </h4>





                    <section class="my-section">
                        <div class="container my-container">
                            <div class="row">
                              
                               <div class="col-md-4 my-service">
                                    <div class="probootstrap-service-item my-service-inner-item">
                                        <a href="guidelines.php">
                                            <h2 ><span class=" icon-file-text"></span> Guidelines</h2>
                                        </a>
                                        <p style="padding-top: 5px;">Click to see the step by step process, Read it very carefuly before paying the fees. 
                                        </p>

                                    </div>
                                </div>
                               
                               
                                <div class="col-md-4 my-service">
                                    <div class="probootstrap-service-item my-service-inner-item" >
                                        <a href="client_update.php">
                                            <h2 > <span class="  icon-profile"></span> Update Profile</h2>
                                        </a>
                                        <p style="padding-top: 5px;">Click to edit or Add your personal information, add qualification details,change your password.
                                        </p>


                                    </div>
                                </div>
                                
                                <div class="col-md-4 my-service">
                                    <div class="probootstrap-service-item my-service-inner-item" >
                                        <a href="final_view.php">
                                            <h2 > <span class=" icon-coin-dollar"></span> Proceed to Pay</h2>
                                        </a>
                                        <p style="padding-top: 5px;">Click to go to the Payment Gateway to pay fees. Please upload all the neccesary documents before paying the fees.
                                        </p>

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
    
}

include('footer.php');

?>