<?php


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
    
            if($rows1['gender'] == NULL || $rows1['address'] == NULL || $rows1['city'] == NULL || $rows1['state'] == NULL || $rows1['phone'] == NULL || $rows1['photo'] == NULL || $rows1['terms'] == NULL || $rows1['cv'] == NULL){
                $active_gen= FALSE;
            }else{
                $active_gen= TRUE;
            }
?>
    
<!--    ".my-top-section"  -> class is used for better view. USE ALWAYS-->
<!--    .my-top-section  is in "css/mystyle.css"-->
    <section class="my-top-section probootstrap-section"  >
      <div class="container">
        <div class="row">
            
             <div class="col-md-12 probootstrap-form">
                <h2 style="text-align:center;font-weight:600">Profile Summary</h2>
                <h4 style="background-color:#e74c3c ; padding: 10px; color: #fff";>General</h4>
                 <p id="general">
                   <table class=" my-auto-table" style="width:100%">
                     <?php  if($rows1['photo'] != NULL){
                
             $image_src2 = "uploads/photos/".$rows1['photo']; ?>
                      <tr>
                    
                         <th>Photo:</th>
                        <td ><img src="<?php echo $image_src2;?>" height="150px"></td>
                        
                      </tr>
                      <?php }else{ ?>
                <tr>
                    
                         <th>Photo:</th>
                        <td >No Photo Uploaded</td>
                        
                      </tr>
            <?php } ?>
                       <tr>
                        <th>Name:</th>
                        <td><?php echo $rows1['fname'].' '.$rows1['lname']?></td>
                      </tr>
                       <tr>
                        <th>Father's Name:</th>
                        <td><?php echo $rows1['ftname']?></td>
                      </tr>
                      <tr>
                        <th>Phone:</th>
                        <td><?php echo $rows1['phone']?></td>
                      </tr>
                      <tr>
                        <th>Email:</th>
                        <td><?php echo $rows1['email']?></td>
                      </tr>
                      <tr>
                        <th>Gender:</th>
                        <td><?php echo $rows1['gender']?></td>
                      </tr>
                      <tr>
                        <th>Address:</th>
                        <td><?php echo $rows1['address']?></td>
                      </tr>
                      <tr>
                        <th>City/Town/Village:</th>
                        <td><?php echo $rows1['city']?></td>
                      </tr>
                      <tr>
                        <th>State:</th>
                        <td><?php echo $rows1['state']?></td>
                      </tr>
                      <tr>
                        <th>Country:</th>
                        <td>India</td>
                      </tr>
                      
                     
                      <tr>
                        <th>DOB:</th>
                        <td><?php echo $rows1['dob']?></td>
                      </tr>
                      <tr>
                        <th>Status:</th>
                        <td><?php echo $rows1['status']?></td>
                      </tr>
                      <tr>
                        <th>Religion:</th>
                        <td><?php echo $rows1['religion']?></td>
                      </tr>
                      <tr>
                        <th>Caste:</th>
                        <td><?php echo $rows1['caste']?></td>
                      </tr>
                      <tr>
                        <th>Nationality:</th>
                        <td><?php echo $rows1['nationality']?></td>
                      </tr>
                      <tr>
                        <th>Terms & Conditions:</th>
                          <td><strong><?php echo $rows1['terms']?></strong></td>
                      </tr>
                      <tr>
                        <th>CV:</th>
                          <td><?php if ($rows1['cv']){echo "Uploaded - ";?> 
                           <a href="uploads/cv/<?php echo $rows1['cv'];?>" target="_blank">View</a><?php }?></td>
                      </tr>
                    </table>
                     
                 </p>
                 
                 
                 
                 
                 
                 <h4 style="background-color:#e74c3c ; padding: 10px; color: #fff";>Education Details</h4>
                  <p id="education">
                     <?php
                                    $q_edu = "SELECT * FROM docs WHERE u_id= $now_id ORDER BY degree";    
                                    $res_edu = mysqli_query($conn, $q_edu);
                                    //$row_edu = mysqli_fetch_array($res_edu);
                                         
                                    
                                     ?>


                                <table class="edu-section">

                                    <thead>
                                        <tr>

                                            <th style="text-align: center; padding: 20px font-size: 5vh">Degree</th>
                                            <th style="text-align: center; padding: 20px font-size: 5vh">Stream</th>
                                            <th style="text-align: center; padding: 20px font-size: 5vh">School</th>
                                            <th style="text-align: center; padding: 20px font-size: 5vh">Grade</th>
                                             
                                        </tr>
                                        <tr>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
		
		while ($row_edu = mysqli_fetch_array($res_edu)){
			//$filename = $row_edu['file'];
           $active_edu = TRUE;
    
			echo '<tr>
					
					
					<td>'.$row_edu['degree'].'</td>
					<td>'.$row_edu['stream'].'</td>
					<td>'.$row_edu['school'].'</td>
					<td>'.$row_edu['grade'].'</td>
                    
                    
					 
				</tr>';
	
			
		}
          
            
            ?>

                                    </tbody>

                                </table>
                     
                     <?php if($active_edu == FALSE){
        echo '<p style="text-align:center; font-size:20px; padding: 30px 0;" >Please add a Qualification(s).</p>';
    }
             
            
            ?>
                 </p>
                 
                 
                 <?php     
                                 
                                    $q_proof= "SELECT * FROM proof WHERE u_id= '$now_id'";    
                                    $res_proof = mysqli_query($conn, $q_proof);
                                     
                                         
                                    
                                     ?>
                 
                 <h4 style="background-color:#e74c3c ; padding: 10px; color: #fff";>Proof Details</h4>
                  <p id="proof">
                    <table class="edu-section">

                                     
                                        <?php
		$proof_array = array();
		while ($row_proof = mysqli_fetch_assoc($res_proof)){



       echo '<tr>
					
					
					<th>'.$row_proof['poi'].'</th>
					<td>'.$row_proof['poi_doc'].'</td>
                     
                   
                    </tr>
                    <tr>
				    <th>'.$row_proof['poa'].'</th>
					<td>'.$row_proof['poa_doc'].'</td>
                      
                    </tr>
                    <tr>
                    
                    
					 
				</tr>';
	if (($row_proof['poa'] == "Proof of Address")  && ($row_proof['poi'] == "Proof of Identity"  )){
        $active_proof = TRUE;
    }else{
    $active_proof  = FALSE;
    }

 }
            
            
           
            
            ?>

                                    

                                </table>
                      <?php if($active_proof == FALSE){
        echo '<p style="text-align:center; font-size:20px; padding: 30px 0;" >Please add Verification Proofs.</p>';
    }
                     
    
    
                     ?>
                 </p>
                 
                 
                 
                 
                 
                 
                 
                 
                 
                 
                 
                 
                 
                 
                 
                                <?php     
                                 
                                    $q_exp= "SELECT * FROM users WHERE user_id= '$now_id'";    
                                    $res_exp = mysqli_query($conn, $q_exp);
                                     
                                         
                                    
                                     ?>
                 
                 <h4 style="background-color:#e74c3c ; padding: 10px; color: #fff";>Extras</h4>
                  <p id="proof">
                    <table class="edu-section">

                                     
                                        <?php
		$proof_array = array();
		while ($row_exp = mysqli_fetch_assoc($res_exp)){



       echo '<tr>
					
					
					<th>Experience</th>
					<td>'.$row_exp['exp'].'</td>
                     
                   
                    </tr>
                    <tr>
				    <th>Languages Known</th>
					<td>'.$row_exp['lang'].'</td>
                      
                    </tr>
                    <tr>
                    
                    
					 
				</tr>';
	if (($row_exp['exp'] != "")  && ($row_exp['lang'] != ""  )){
        $active_exp = TRUE;
    }else{
    $active_exp  = FALSE;
    }

 }
            
            
           
            
            ?>

                                    

                                </table>
                      <?php if($active_exp == FALSE){
        echo '<p style="text-align:center; font-size:20px; padding: 30px 0;" >Please add Experience and Languages Known Details.</p>';
    }
                     
    
    
                     ?>
                 </p>
                 
                 
                 
                 
                 
                 
                 
                 
                 
                 
                 
                 
                 
                 
                 
                 
                 
                
                 
                 <h4 style="background-color:#e74c3c ; padding: 10px; color: #fff";>Payment Details</h4>
                  <p id="proof">
                    <table class="edu-section">

                                     
                                        <?php
		 
		


            if($rows1['reg_pay_status'] == 'success'){
                
            
     ?>            <tr>
					
					
					<th>Registration Fees Payment</th>
					<td><?php echo $rows1['reg_pay_status'];?></td>
                     
                   
                    </tr>
                    
                    <?php
                    }else{
                        ?>
            
                    <tr>
				    <th>Registration Fees Payment</th>
					<td>NOT DONE</td>
                      
                    </tr>
                  
                    
                    
					 
			 <?php }
	 

 
 
            
            ?>

                                   <?php
		 
		 


            if($rows1['fin_pay_status'] == 'success'){
                
            
     ?>            <tr>
					
					
					<th>Post Job Fees Payment</th>
					<td><?php echo $rows1['fin_pay_status'];?></td>
                     
                   
                    </tr>
                    
                    <?php
                    }else{
                        ?>
            
                    <tr>
				    <th>Post Job Fees Payment</th>
					<td>NOT DONE</td>
                      
                    </tr>
                  
                    
                    
					 
			 <?php }
	 

 
 
            
            ?>
                                    

                                </table>
                      
                 </p>
             
             
             <?php
        if(($active_gen == TRUE )&& ($active_edu== TRUE) && ($active_proof == TRUE)){
    
        ?>
           
             
             <p style="text-align:center;"><a class="btn btn-primary" href="payment.php">PROCEED TO PAY</a></p>
             
             
             <?php
        }else{
            
        
        ?>
             <p style="text-align:center;"><a class="btn btn-primary" href="client_update.php">GO BACK</a></p>
            <?php }
        ?>
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
    
    