<?php

session_start();
define('ALL OKAY', TRUE);
include('db.php');
include('nav.php');

if(isset($_SESSION['user_id'])){

//all employee sql
  $allusers = "SELECT * FROM placed ORDER BY name";
    $result1 = mysqli_query($conn,$allusers) or die(mysqli_error($conn));
    
    
    
    //admin sql
    $now = $_SESSION['user_id'];
  $profile_name = "SELECT * FROM users WHERE user_id='$now' AND user_type= 'admin'";
    $result2 = mysqli_query($conn,$profile_name) or die(mysqli_error($conn));
     $rows2 = mysqli_fetch_array($result2);



?>
    
    <section class="my-top-section probootstrap-bg-light" >
      <div class="container">
        <div class="row">
          <div class="col-md-12 probootstrap-form">
            
            <h2> Dashboard</h2>
            <h3> Hello, <?php echo $rows2['fname'],' ',$rows2['lname']  ; ?>!</h3>
            <h4> You're the Admin and here is your control panel!</h4>
              
            
            
            
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="probootstrap-service-item ">
                    <div style="text-align:center;padding-bottom:20px">
    <a href="admin_placed_plus.php"><button  class="btn btn-primary">ADD</button></a>
       <a href="admin_dash.php"><button  class="btn ">BACK</button></a>
    
          
      </div>
                    <div class="table-responsive my-auto-table">
      <table class="table" style="width: 85%; ">
                <thead>
			<tr>
				
				<th>Name</th>
				 
				<th>Speech</th>
				 
				 
				 
			</tr>
            <tr>
                
			</tr>
		</thead>
		<tbody>
		
		<?php
		
		while ($rows1 = mysqli_fetch_array($result1)){
			
    
			echo '<tr>
					
					
					<td>'.$rows1['name'].'</td>
					 
					<td>'.$rows1['speech'].'</td>
					 
					 
                    <td ><a href="index.php" ><button class="icon-eye2" style="border:none; font-size: 20px; padding: 8px"></button></a> 
					 <a href="delete.php?placed_id='.$rows1['c_id'].'" ><button class="icon-bin2" style="border:none; font-size: 20px; padding: 8px"></button></a></td>
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
    
    
    

    
    
    
    
    

  