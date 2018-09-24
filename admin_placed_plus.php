<?php
 define('ALL OKAY', TRUE);
session_start();
include('db.php');
include('nav.php');

$errors = array();
  

if (isset($_POST['add_placed'])) {
//get all inputs
    $first=mysqli_real_escape_string($conn, $_POST['name']);
 
    $speech=mysqli_real_escape_string($conn, $_POST['speech']);
   
     
     //photo
    
     $target = "uploads/placed/";
        
        
        
                   
                                //This gets all the other information from the form
                                $Filename = basename($_FILES['photo']['name']);
                                $file_size =$_FILES['photo']['size'];
                                $temp = explode(".", $_FILES["photo"]["name"]);

                                

                                $fileTarget = $target.$Filename;
                                $tempFileName = $_FILES["photo"]["tmp_name"];
        
                                    $tmp = explode('.', $_FILES['photo']['name']);
                                    $file_ext=strtolower(end($tmp));
                                
                                 
      
                                $expensions= array("jpeg");
                                    
                                $check = getimagesize($_FILES["photo"]["tmp_name"]);
        
                                if($check == false){
                                    array_push($errors, "Upload an JPEG Image File");
                                }
      
                                if(in_array($file_ext,$expensions)=== false){
                                    array_push($errors, "Choose a JPEG file format");
                                    
                                }
                                if($file_size > 204800){
                                 
                                    array_push($errors, "File must NOT be greater than 500KB");
                              }
     
 //validate all inputs if empty or case matches  
      
    if(empty($first)){
        array_push($errors, "Name is empty");
    }elseif(!preg_match("/^([a-zA-Z' ]+)$/", $first)){
        array_push($errors, "Name should contain only Alphabets.");  
    }

       
   
    
    if(empty($speech)){
        array_push($errors, "Speech is empty.");
    }
    
    

    //if no error, proceed
	if (count($errors) == 0) {
 
	$q="INSERT INTO placed (name, speech, photo) VALUES ( '$first','$speech', '$Filename')";
	mysqli_query($conn,$q) ;
        move_uploaded_file($_FILES['photo']['tmp_name'], $target . $Filename);
	
header('location: admin_placed_view.php');

	 
    }
      
  }





if(isset($_SESSION['user_id'])){

$now = $_SESSION['user_id'];
  $profile_name = "SELECT * FROM users WHERE user_id='$now'";
    $result1 = mysqli_query($conn,$profile_name) or die(mysqli_error($conn));
     $rows1 = mysqli_fetch_array($result1);


?>
    
    <section class="my-top-section probootstrap-bg-light" >
      <div class="container">
        <div class="row">
          <div class="col-md-12 probootstrap-form">
            
             <h2 > <span  class=" icon-stats-dots"></span> Dashboard</h2>
            <h3> Hello, <?php echo $rows1['fname'],' ',$rows1['lname']  ; ?>! <span class=" icon-happy2" style="font-size: 20px;"></span></h3>
            <h4> You're the Admin and here is your control panel!</h4>
            
            
            <p><a href="admin_dash.php">Control Panel </a> > Edit Reviewers</p>
          
      <!--           FORM                 -->  
               
            <form action="" class="probootstrap-form" method="POST" enctype="multipart/form-data">
                    <h2 class="text-black mt0">Add Team Member</h2>
                    <?php   include('errors.php');  ?>
                    


                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Name" name="name"    >
                    </div>
                     
                    <div class="form-group">
                        <textarea class="form-control" placeholder="Speech" name="speech"  rows="3"></textarea>

                    </div>
                    
                    
                    
                   
                     <div class="my-form-section">
                       
                        <div class="my-form-label"> Choose Photo:
                        </div>
                        <div class="file-upload">
                        <input type="file" class="my-form-input" name="photo" >
                        </div>
                         <p>Only <strong>JPEG</strong> Files are allowed. Files must less than<strong> 200KB</strong>/ Try t Upload a <strong>Square Pic.</strong></p>
                    </div>

                    

                    <div class="form-group" style="text-align:center;">
                        <input  type="submit" class="btn btn-primary" name="add_placed" value="ADD">
                       <p style="padding-top:10px;"> <a href="admin_dash.php">BACK</a></p>
                    </div>
                       
                </form>
            
           <div style="text-align:center;">
                
                
            </div>
            
            
            
            
            
            
            
          </div>
          
        </div>
      </div>
      
      
    </section>
    
    

    <?php 
    
}else{
    
  http_response_code(404);
    include('403forbidden.php');
}


include('footer.php');

?>
    
    
    
    
    
    
    
    
    
    
    

  