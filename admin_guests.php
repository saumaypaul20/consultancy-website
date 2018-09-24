<?php

session_start();
define('ALL OKAY', TRUE);
include('db.php');
include('nav.php');

if(isset($_SESSION['user_id'])){

    
    
    
    
    
//client sql
  
    
 
        $allusers = "SELECT * FROM guest ORDER BY join_date";
    
    
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
            
            <h2> Dashboard</h2>
            <h3> Hello, <?php echo $rows2['fname'],' ',$rows2['lname']  ; ?>!</h3>
            <h4> You're the Admin and here is your control panel!</h4>
                <p><a href="admin_dash.php">Dashboard </a> > View Guests</p>
           
            
            
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="probootstrap-service-item " >
                    <p style="text-align:center;"><a  href="admin_dash.php" ><button class="btn " >Back</button></a></p>
                    <div class="table-responsive my-auto-table">
                        
                        <form action="" name="sort_order" method="post">
                        <p>Sort By:
                        <select style="width:150px; height:45px;" name="order" id="order">
                        <option value="fname" <?php echo (isset($_POST['order']) && $_POST['order'] == 'name') ? 'selected="selected"' : ''; ?>>Name</option>
                         
                        <option value="gender"  <?php echo (isset($_POST['order']) && $_POST['order'] == 'email') ? 'selected="selected"' : ''; ?>>Email</option>
                        <option value="join_date"  <?php echo (isset($_POST['order']) && $_POST['order'] == 'join_date') ? 'selected="selected"' : ''; ?>> Date</option>
                         
                        
                        
                    </select>
                     <input type="submit" name="order_btn" value="SORT" class="btn btn-primary">
                    </p>
                   
                    </form>
      <table class="table" style="width: 90%; ">
                <thead>
			<tr>
				
				<th>Name</th>
				 
				<th>Phone</th>
				<th>Email</th>
				 
				<th>Query</th>
				<th>Date</th>
				<th></th>
			</tr>
            <tr>
                
			</tr>
		</thead>
		<tbody>
		
		<?php
		
		while ($rows1 = mysqli_fetch_array($result1)){
			
    
			echo '<tr>
					
					
					<td style="padding:10px; line-height: 2em">'.$rows1['name'].'</td>
					 
					<td style="padding:10px; line-height: 2em">'.$rows1['phone'].'</td>
					<td style="padding:10px; line-height: 2em">'.$rows1['email'].'</td>
				 
					<td style="padding:10px; line-height: 2em">'.$rows1['query'].'</td>
					<td style="padding:10px; line-height: 2em">'.$rows1['join_date'].'</td>
                    
                    
                    <td ><a href="delete.php?guest_id='.$rows1['id'].'" ><button class="icon-bin2" style="border:none; font-size: 20px; padding: 8px"></button></a></td>
					 
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
    
    
    

    
    
    
    
    

  