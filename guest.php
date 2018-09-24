<?php
 
include('db.php');
 if(isset($_SESSION['email'])){
   http_response_code(404);
    include('index.php');
}elseif(isset($_SESSION['user_id'])){
     http_response_code(404);
    include('index.php');
}else{
$errors = array();

$first = $last = $phone = $email = $msg ="";

  if (isset($_POST['guest_btn'])) {
//get all inputs
    $first=mysqli_real_escape_string($conn, $_POST['name']);
    $first=trim($first);
	 
    $phone=mysqli_real_escape_string($conn, $_POST['phone']);
      $phone=trim($phone);
     
      $email=$_POST['email'];
// Sanitize E-mail Address
      $email =filter_var($email, FILTER_SANITIZE_EMAIL);
// Validate E-mail Address
      $email= filter_var($email, FILTER_VALIDATE_EMAIL);
       $msg = $_POST['message'];
    
 //validate all inputs if empty or case matches  
      
    if(empty($first)){
        array_push($errors, "Name empty");
    }elseif(!preg_match("/^([a-zA-Z' ]+)$/", $first)){
        array_push($errors, "Name should contain only Alphabets.");  
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
     
        
     
      

    //if no error, proceed
	if (count($errors) == 0) {
 
            $today = date("Y/m/d");
	$q="INSERT INTO guest (name,phone, email, query, join_date) VALUES ('$first', '$phone', '$email', '$msg','$today')";
	mysqli_query($conn,$q);
	
       
 

        
         $subj = "Thank You Response- Consultancy for Unemployed";
            $msg = "<html><body><h3>Thank you for showing your interest!</h3><p>We will get in touch with you shortly.</p> </body><html>";
             
             
                 
                 $headers =  'MIME-Version: 1.0' . "\r\n"; 
                
                $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n"; 
            $headers .= "From: support@consultancyforunemployed.in". "\r\n";
            $headers .= "Reply-To: $email\r\n";
            $headers .= "Return-Path: support@consultancyforunemployed.in\r\n";
            $headers .= "CC: support@consultancyforunemployed.in\r\n";
 
            mail($email,$subj,$msg,$headers);
        
          header('location: thanks.php');
        
        
        
        
        
	 
    }


      
      
  }


 }


?>