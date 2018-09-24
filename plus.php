<?php
 define('ALL OKAY', TRUE);
session_start();
include('db.php');
include('nav.php');

$errors = array();

$first = $last = $phone = $email = $role ="";

if (isset($_POST['add_admin'])) {
//get all inputs
    $first=mysqli_real_escape_string($conn, $_POST['first']);
    $first= trim($first);
	$last=mysqli_real_escape_string($conn, $_POST['last']);
    $last= trim($last);
    $phone=mysqli_real_escape_string($conn, $_POST['phone']);
    $phone= trim($phone);
    $email=mysqli_real_escape_string($conn, $_POST['email']);
     
    $pwd=mysqli_real_escape_string($conn, $_POST['psw']);
    $cpwd=mysqli_real_escape_string($conn, $_POST['c_psw']);
    $role=mysqli_real_escape_string($conn, $_POST['role']);
     
 //validate all inputs if empty or case matches  
      
    if(empty($first)){
        array_push($errors, "First name empty");
    }elseif(!preg_match("/^([a-zA-Z' ]+)$/", $first)){
        array_push($errors, "First name should contain only Alphabets.");  
    }

    if(empty($last)){
        array_push($errors, "Last name empty");
    }elseif(!preg_match("/^([a-zA-Z' ]+)$/", $last)){
        array_push($errors, "Last name should contain only Alphabets.");
    }  
      
    $mobileregex = "/^[0-9][0-9]{9}$/" ;
    if(empty($phone)){
        array_push($errors, "Provide Phone Number.");
    }elseif(!preg_match($mobileregex, $phone)){
        array_push($errors, "Phone number should contain only numbers");
    }  
    
    if(empty($email)){
        array_push($errors, "Enter your Email.");
    }
    elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        array_push($errors, "Enter a valid Email.");
    }
        
    if(empty($pwd)){
        array_push($errors, "Enter a Password.");
    }elseif(!preg_match('/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/', $pwd)){
        array_push($errors, "Password must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters");
    }  
    
    if($cpwd != $pwd){
        array_push($errors, "Passwords did not match. Retype Password");
    }
    
    if($role){
        $role = 'admin';
    }else{
         array_push($errors, "Try again!");
    }

    //if no error, proceed
	if (count($errors) == 0) {

    //check existing user
    $sql_u = "SELECT * FROM users WHERE email='$email'";
    $res_u = mysqli_query($conn, $sql_u);

    if (mysqli_num_rows($res_u) > 0) {
  	  
       //user already exits... warn user
        array_push($errors, "It seems Admin with $email already exists");
        
        
        
    }else{
        //continue adding new user
        $pwd=password_hash($_POST['psw'],PASSWORD_DEFAULT);

	$q="INSERT INTO users (fname, lname, phone, email, password, user_type) VALUES ('$first','$last','$phone', '$email', '$pwd','$role')";
	mysqli_query($conn,$q);
	
header('location: admin_dash.php');

	}
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
            
            
            <p><a href="admin_dash.php">Control Panel </a> > Add Admin</p>
          
      <!--           FORM                 -->  
               
            <form action="" class="probootstrap-form" method="POST">
                    <h2 class="text-black mt0">Add New Admin</h2>
                    <?php   include('errors.php');  ?>
                    


                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="First Name" name="first" value="<?php echo $first ?>"  >
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Last Name" name="last" value="<?php echo $last ?>" >
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" placeholder="Email" name="email" value="<?php echo $email ?>" >

                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="10 digit Phone Number" name="phone" maxlength="10" pattern="^\d{10}$" value="<?php echo $phone ?>" >
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Atleast 8 characters Password with 1 number, 1 uppercase and lowercase letter" id="psw" name="psw" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"  >
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" placeholder="Retype Password" name="c_psw" id="c_psw"  >
                    </div>
                    
                    <div class="form-group">
                        <select class="form-control" name="role" >

                        <option>Role: Admin</option>
            

                        </select>
                    </div>


                    <div class="form-group" style="text-align:center;">
                        <input  type="submit" class="btn btn-primary" name="add_admin" value="ADD">
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
    
    
    
    
    
    
    
    
    
    
    

  