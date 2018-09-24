<?php
session_start();
define('ALL OKAY', TRUE);
include('nav.php');
include('db.php');


$q121 = "SELECT * FROM team";
$res121 = mysqli_query($conn, $q121);
 


?>






<section class="my-top-section probootstrap-bg-light" >
      <div class="container">
        <div class="row">
          <div class="col-md-12 my-section">
            
             
             
             <div class="probootstrap-form my-section" style="text-align:center;">
             
             
            
             
      <div class="containerS">
                    <div class="row">
                        <div class="heading-title text-center">
                            <h3 class="text-uppercase"><font size="22"> About</font> </h3>
                            <p class="p-top-30 half-txt">We are a Govt. Regd. Consultancy bearing Govt. Regd. No. 3604/09/2016. We are a team of energetic personal having well knowledge and skills that have been highly recommended by management who has engaged us. </p>
                            <p>We provide jobs wherever there is a vacancy in respective companies. </p><p>Please check our <a href="terms_and_conditions.php">Terms & Conditions</a> for a better understanding.   </p>
                        </div>
 <?php
                 
                 while($row121 = mysqli_fetch_array($res121)){
                      $image_src2 = "uploads/team/".$row121['photo']; 
              
                 ?>
                        <div class="col-md-4 col-sm-4">
                            <div class="team-member" style="margin: 0 auto;">
                                <div class="team-img">
                                    <img src="<?php echo $image_src2 ;?>"  class="img-responsive">
                                </div>
                                <div class="team-hover">
                                    <div class="desk">
                                         
                                        <p style="margin-bottom: 0"><?php echo $row121['speech'];?></p>
                                    </div>
                                    <div class="s-link">
                                        <a href="#"><i class="fa fa-facebook"></i></a>
                                        <a href="#"><i class="fa fa-twitter"></i></a>
                                        <a href="#"><i class="fa fa-google-plus"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="team-title">
                                <h5><?php echo $row121['name'];?></h5>
                                <span><?php echo $row121['designation'];?></span>
                            </div>
                        </div>
                         
                         
                        <?php } ?>   
                         
						 

                    </div>

                </div>
      
                 
    </div>
            
            
            
          </div>
          
        </div>
      </div>
    </section>
    













<?php

include('footer.php');

?>