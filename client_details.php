<?php


session_start();
define('ALL OKAY', TRUE);
include('db.php');
include('nav.php');



 
        
if(isset($_SESSION['user_id'])){
    
    $now= $_GET['id'];
    
 
        $profile_name = "SELECT * FROM users WHERE user_id='$now'";
        $result1 = mysqli_query($conn,$profile_name) or die(mysqli_error($conn));
        $rows1 = mysqli_fetch_array($result1);
    
    
    
        $now_id=$rows1['user_id'];
    
             
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
                      <tr>
                    
                         <th>Photo:</th>
                        <td ><img src="<?php $image_src2 = "uploads/photos/".$rows1['photo'];  echo $image_src2;?>" height="150px"></td>
                        
                      </tr>
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
                                    $q_edu = "SELECT * FROM docs WHERE u_id= $now ORDER BY degree";    
                                    $res_edu = mysqli_query($conn, $q_edu);
                                    //$row_edu = mysqli_fetch_array($res_edu);
                                         
                                    
                                     ?>


                                <table class="edu-section">

                                    <thead>
                                        <tr>

                                            <th style="text-align: center; padding: 20px ">Degree</th>
                                            <th style="text-align: center; padding: 20px ">Stream</th>
                                            <th style="text-align: center; padding: 20px ">School</th>
                                            <th style="text-align: center; padding: 20px ">Grade</th>
                                            <th style="text-align: center; padding: 20px "> Link</th>
                                             
                                        </tr>
                                        <tr>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
		
		while ($row_edu = mysqli_fetch_array($res_edu)){
			//$filename = $row_edu['file'];
         
    
			echo '<tr>
					
					
					<td>'.$row_edu['degree'].'</td>
					<td>'.$row_edu['stream'].'</td>
					<td>'.$row_edu['school'].'</td>
					<td>'.$row_edu['grade'].'</td>
                    <td><a href="uploads/files/'.$row_edu['file'].'" class="btn btn-default">Download</a></td>
                    
                    
					 
				</tr>';
	
			
		}
          
            
            ?>

                                    </tbody>

                                </table>
                     
                     <?php         
            
            ?>
                 </p>
                 
                 
                 
                 
                 
                 
                                <?php     
                                 
                                    $q_proof= "SELECT * FROM proof WHERE u_id= '$now'";    
                                    $res_proof = mysqli_query($conn, $q_proof);
                                     
                                         
                                    
                                     ?>
                 
                 <h4 style="background-color:#e74c3c ; padding: 10px; color: #fff";>Proof Details</h4>
                  <p id="proof">
                    <table class="edu-section">

                                     
                                        <?php
		$proof_array = array();
		while ($row_proof = mysqli_fetch_assoc($res_proof)){



       echo '<tr  style="text-align:justify">
					
					
					<th style="text-align:center; ">'.$row_proof['poi'].'</th>
					<td>'.$row_proof['poi_doc'].'</td>
					<td><a href="uploads/proofs/'.$row_proof['poi_file'].'" class="btn btn-default">Download</a></td>
                     
                   
                    </tr>
                    <tr style="text-align:justify">
				    <th style="text-align:center; ">'.$row_proof['poa'].'</th>
					<td>'.$row_proof['poa_doc'].'</td>
                    <td><a href="uploads/proofs/'.$row_proof['poa_file'].'" class="btn btn-default">Download</a></td>
                    </tr>
                    <tr>
                    
                    
					 
				</tr>';
	 

 }
            
            
           
            
            ?>

                                    

                                </table>
                      <?php  
                     
    
    
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
	 

 }
            
            
           
            
            ?>

                                    

                                </table>
                       
                 </p>
        
            
            
            
            
            <h4 style="background-color:#e74c3c ; padding: 10px; color: #fff";>Payment Details</h4>
                  <p id="proof">
                    <table class="edu-section">

                                     
                                        <?php
		 
		


            if($rows1['reg_pay_status'] == 'success'){
                
            
     ?>            <tr>
					
					
					<th>Registration Fees Payment</th>
					<td><?php echo $rows1['reg_pay_status'];?></td>
                    <th>Registration Fees Transaction ID</th>
					<td><?php echo $rows1['reg_pay_txn'];?></td>
                     
                   
                    </tr>
                    
                    <?php
                    }else{
                        ?>
            
                    <tr>
				    <th>Registration Fees Payment</th>
					<td>NOT DONE</td>
                      <th>Registration Fees Transaction ID</th>
					<td>NULL</td>
                    </tr>
                  
                    
                    
					 
			 <?php }
	 

 
 
            
            ?>

                                   <?php
		 
		 


            if($rows1['fin_pay_status'] == 'success'){
                
            
     ?>            <tr>
					
					
					<th>Post Job Fees Payment</th>
					<td><?php echo $rows1['fin_pay_status'];?></td>
					 <th>Post Job Transaction ID </th>
					<td><?php echo $rows1['fin_pay_txn'];?></td>
                     
                   
                    </tr>
                    
                    <?php
                    }else{
                        ?>
            
                    <tr>
				    <th>Post Job Fees Payment</th>
					<td>NOT DONE</td>
                      <th>Post Job Transaction ID </th>
					<td>NULL</td>
                    </tr>
                  
                    
                    
					 
			 <?php }
	 

 
 
            
            ?>
                                    

                                </table>
                      
                 </p>
        
       
             <p style="text-align:center;"><a class="btn btn-default" href="admin_clients.php">GO BACK</a></p>
             
            
    
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
    
    