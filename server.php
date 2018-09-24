<?php
if(!defined('ALL OKAY')){
    header('location:index.php');
}
session_start();
include('db.php');

$errors = array();

$first = $last = $phone = $email = $role ="";

  if (isset($_POST['register_btn'])) {
//get all inputs
    $first=mysqli_real_escape_string($conn, $_POST['first']);
    $first=trim($first);
	$last=mysqli_real_escape_string($conn, $_POST['last']);
      $last=trim($last);
    $phone=mysqli_real_escape_string($conn, $_POST['phone']);
      $phone=trim($phone);
     
      $email=$_POST['email'];
// Sanitize E-mail Address
      $email =filter_var($email, FILTER_SANITIZE_EMAIL);
// Validate E-mail Address
      
      
    $pwd=mysqli_real_escape_string($conn, $_POST['psw']);
      $pwd=trim($pwd);
    $cpwd=mysqli_real_escape_string($conn, $_POST['c_psw']);
      $cpwd=trim($cpwd);
     
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
    
    if(!$email){
        array_push($errors, "Enter your valid Email.");
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
      

    //if no error, proceed
	if (count($errors) == 0) {

    //check existing user
    $sql_u = "SELECT * FROM users WHERE email='$email'";
    $res_u = mysqli_query($conn, $sql_u);

    if (mysqli_num_rows($res_u) > 0) {
  	  
       //user already exits... warn user
        array_push($errors, "Account with $email already exists!");
        
        
        
    }else{
        //continue adding new user
        $pwd=password_hash($_POST['psw'],PASSWORD_DEFAULT);
            $today = date("Y/m/d");
	$q="INSERT INTO users (fname, lname, phone, email, password, join_date) VALUES ('$first','$last','$phone', '$email', '$pwd','$today')";
	mysqli_query($conn,$q);
	
         
        $rowha= mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM users where email= '$email'"));
        $new_id = $rowha['user_id'];
        
        $q2= "INSERT INTO proof(u_id) VALUES ('$new_id')";
        mysqli_query($conn, $q2);
header('location: signin.php');
        
        
        
         $subj = "Welcome to Consultancy for Unemployed- Welcome Message";
            $msg = "<html><body><h2>Welcome $first!</h2><p>This confirms your registration with us.</p> For any queries, mail us to support@consultancyforunemployed.in</body><html>";
             
             
                 
                 $headers =  'MIME-Version: 1.0' . "\r\n"; 
                
                $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; 
             $headers .= "From: support@consultancyforunemployed.in". "\r\n";
            $headers .= "Reply-To: $email\r\n";
            $headers .= "Return-Path: support@consultancyforunemployed.in\r\n";
            $headers .= "CC: support@consultancyforunemployed.in\r\n";
            

            mail($email,$subj,$msg,$headers);

	}
    }


      
      
  }


// login 



if (isset($_POST['login_btn'])){
       
	$email1 =mysqli_real_escape_string($conn, $_POST['email']);
    
    
    
    
	
	$password1 = stripslashes($_REQUEST['psw']);
	$password1 = mysqli_real_escape_string($conn,$password1);
  
    $a="admin";  
    $query1 = "SELECT * FROM users WHERE email='$email1' AND user_type=' '";
    $query2 = "SELECT * FROM users WHERE email='$email1' AND user_type='$a'";
    
	$result1 = mysqli_query($conn,$query1) or die(mysqli_error($conn));
     $rows1 = mysqli_num_rows($result1);
    
    $result2 = mysqli_query($conn,$query2) or die(mysqli_error($conn));
     $rows2 = mysqli_num_rows($result2);
    
    
    
    
    if($rows1==1){
        $row1=mysqli_fetch_assoc($result1);
	      
        if(password_verify($password1,$row1['password'])){
            
            $_SESSION['email']=$email1;
           header('location: profile.php');
        }else{
            array_push($errors, "Incorrect Password!"); 
         header('location: signin.php');
        }
    }
    elseif($rows2==1){
        $row2=mysqli_fetch_assoc($result2);
	      
        if(password_verify($password1,$row2['password'])){
            
            $_SESSION['user_id']=$row2['user_id'];
           header('location: admin_dash.php');
        }else{
             array_push($errors, "Incorrect Password!"); 
            header('location: signin.php');
        
        }  
    }elseif($rows1 != 1){
        array_push($errors, "No matching email record found.");
    }elseif($rows2 != 1){
        array_push($errors, "No matching email record found.");
    }
   


}







//change password

if (isset($_POST['reset_btn'])){
       
	$email1 =mysqli_real_escape_string($conn, $_POST['email']);
	
	$password1 = stripslashes($_REQUEST['psw']);
	
	$password1 = mysqli_real_escape_string($conn,$password1);
  
    $a="admin";  
    $query1 = "SELECT * FROM users WHERE email='$email1' AND user_type=' '";
    $query2 = "SELECT * FROM users WHERE email='$email1' AND user_type='$a'";
    
	$result1 = mysqli_query($conn,$query1) or die(mysqli_error($conn));
     $rows1 = mysqli_num_rows($result1);
    
    $result2 = mysqli_query($conn,$query2) or die(mysqli_error($conn));
     $rows2 = mysqli_num_rows($result2);
    
    
    if($rows1==1){
        $row1=mysqli_fetch_assoc($result1);
	      
        if(password_verify($password1,$row1['password'])){
            
            $_SESSION['email']=$email1;
           header('location: profile.php');
        }else{
        header('location: signin.php');
        }
    }
    elseif($rows2==1){
        $row2=mysqli_fetch_assoc($result2);
	      
        if(password_verify($password1,$row2['password'])){
            
            $_SESSION['user_id']=$row2['user_id'];
           header('location: admin_dash.php');
        }else{
        header('location: signin.php');
        }  
    }
   
//    else{
//    
//       
//        header('location: signin.php');
//        
//        }

}





?>