<?php
session_start();
define('ALL OKAY', TRUE);
include('nav.php');
include('db.php');


$q121 = "SELECT * FROM news";
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
                            <h3 class="text-uppercase"><font size="22"> News</font> </h3>
                            <p class="p-top-30 half-txt">This page contains the list of important notifications and news from us. </p>
                            
                        </div>
 <?php
                 
                 while($row121 = mysqli_fetch_array($res121)){
                
              
                 ?>
                        
                         <div class="my-news-section" >
					<h3><?php echo $row121['title'];?></h3>
                    <p><?php echo $row121['des']; ?></p>
                         
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