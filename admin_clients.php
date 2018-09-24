<?php

session_start();
define('ALL OKAY', TRUE);
include('db.php');
include('nav.php');

if(isset($_SESSION['user_id'])){

    
    
    
    
    
//client sql
  
    
    if (isset($_POST['order_btn'])) {
         
         $order = mysqli_real_escape_string($conn,$_POST['order']);
          
        
         $allusers= "SELECT * FROM users WHERE user_type= ' ' ORDER BY $order ";
        
        if($order == 'reg_pay_status' || $order == 'fin_pay_status' || $order == 'join_date'){
            $allusers= "SELECT * FROM users WHERE user_type= ' ' ORDER BY $order DESC";
        }
         
     }else{
        $allusers = "SELECT * FROM users WHERE user_type=' ' ORDER BY fname";
    }
    
    $result1 = mysqli_query($conn,$allusers) or die(mysqli_error($conn));
    
    
    
    
    //admin sql
    $now = $_SESSION['user_id'];
  $profile_name = "SELECT * FROM users WHERE user_id='$now' AND user_type='admin'";
    $result2 = mysqli_query($conn,$profile_name) or die(mysqli_error($conn));
     $rows2 = mysqli_fetch_array($result2);
 


?>
    
    <section class="my-top-section probootstrap-bg-light" >
      <div class="container">
        <div class="row">
          <div class="col-md-12 probootstrap-form">
            
           <h2 > <span  class=" icon-stats-dots"></span> Dashboard</h2>
            <h3> Hello, <?php echo $rows2['fname'],' ',$rows2['lname']  ; ?>! <span class=" icon-happy2" style="font-size: 20px;"></span></h3>
            <h4> You're the Admin and here is your control panel!</h4>
                <p><a href="admin_dash.php">Dashboard </a> > View Candidates</p>
           
            
            
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="probootstrap-service-item " >
                    <p style="text-align:center;"><a  href="admin_dash.php" ><button class="btn " >Back</button></a></p>
                    <div class="table-responsive my-auto-table">
                        
                        <form action="" name="sort_order" method="post">
                        <p>Sort By:
                        <select style="width:150px; height:45px;" name="order" id="order">
                        <option value="fname" <?php echo (isset($_POST['order']) && $_POST['order'] == 'fname') ? 'selected="selected"' : ''; ?>>First Name</option>
                        <option value="lname"  <?php echo (isset($_POST['order']) && $_POST['order'] == 'lname') ? 'selected="selected"' : ''; ?> >Last Name</option>
                        <option value="gender"  <?php echo (isset($_POST['order']) && $_POST['order'] == 'gender') ? 'selected="selected"' : ''; ?>>Gender</option>
                        <option value="join_date"  <?php echo (isset($_POST['order']) && $_POST['order'] == 'join_date') ? 'selected="selected"' : ''; ?>>Joining Date</option>
                        <option value="city"  <?php echo (isset($_POST['order']) && $_POST['order'] == 'ciy') ? 'selected="selected"' : ''; ?>>City</option>
                        <option value="state"  <?php echo (isset($_POST['order']) && $_POST['order'] == 'state') ? 'selected="selected"' : ''; ?>>State</option>
                        <option value="reg_pay_status"  <?php echo (isset($_POST['order']) && $_POST['order'] == 'reg_pay_status') ? 'selected="selected"' : ''; ?>>Registration Fees</option>
                        <option value="fin_pay_status"  <?php echo (isset($_POST['order']) && $_POST['order'] == 'fin_pay_status') ? 'selected="selected"' : ''; ?>>Post Job Fees</option>
                        
                        
                    </select>
                     <input type="submit" name="order_btn" value="SORT" class="btn btn-primary">
                    </p>
                   
                    </form>
      <table class="table" style="width: 90%; ">
                <thead>
			<tr>
				
				<th>First Name</th>
				<th>Last name</th>
				<th>Phone</th>
				<th>Email</th>
				<th>City/Town</th>
				<th>State</th>
				<th>Joining</th>
				<th>Registration Fees</th>
				<th>Post Job Fees</th>
				<th></th>
			</tr>
            <tr>
                
			</tr>
		</thead>
		<tbody>
		
		<?php
		
		while ($rows1 = mysqli_fetch_array($result1)){
			
    
			echo '<tr>
					
					
					<td style="padding:10px; line-height: 2em">'.$rows1['fname'].'</td>
					<td style="padding:10px; line-height: 2em">'.$rows1['lname'].'</td>
					<td style="padding:10px; line-height: 2em">'.$rows1['phone'].'</td>
					<td style="padding:10px; line-height: 2em">'.$rows1['email'].'</td>
					<td style="padding:10px; line-height: 2em">'.$rows1['city'].'</td>
					<td style="padding:10px; line-height: 2em">'.$rows1['state'].'</td>
					<td style="padding:10px; line-height: 2em">'.$rows1['join_date'].'</td>
					<td style="padding:10px; line-height: 2em">'.$rows1['reg_pay_status'].'</td>
					<td style="padding:10px; line-height: 2em">'.$rows1['fin_pay_status'].'</td>
                    
					<td  ><a href="client_details.php?id='.$rows1['user_id'].'"><button class="icon-eye2" style="border:none; font-size: 20px; padding: 10px"></button></a></td>
				</tr>';
	
			
		}
             
            
            ?>
            
            	</tbody>
            	
      </table>
      
      
                       
    
    </div>
              
               
              
            </div>
            
          </div>
          
          
           
          
        </div>
         
      </div>
   
            
            
            
            
            
            
            
            
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
    
    
    

    
    
    
    
    

  