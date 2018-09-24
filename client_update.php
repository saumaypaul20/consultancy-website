<?php
session_start();
define('ALL OKAY', TRUE);
require('db.php');
require('nav.php');
 
  

if(isset($_SESSION['email'])){

        $now = $_SESSION['email'];
        $profile_name = "SELECT * FROM users WHERE email='$now'";
        $result1 = mysqli_query($conn,$profile_name) or die(mysqli_error($conn));
        $rows1 = mysqli_fetch_array($result1);
        $now_id=$rows1['user_id'];
 
        $errors = array();

                        if (isset($_POST['save_user_1'])) {
                        //get all inputs
                            $first=mysqli_real_escape_string($conn, $_POST['first']);
                            $last=mysqli_real_escape_string($conn, $_POST['last']);
                            $phone=mysqli_real_escape_string($conn, $_POST['phone']);

                            $gender=mysqli_real_escape_string($conn, $_POST['gender']);
                            $city=mysqli_real_escape_string($conn, $_POST['city']);
                            $state=mysqli_real_escape_string($conn, $_POST['state']);
                            $address=mysqli_real_escape_string($conn, $_POST['address']);
                            
                            $ftname=mysqli_real_escape_string($conn, $_POST['ftname']);
                            $dob=mysqli_real_escape_string($conn, $_POST['dob']);
                            $status=mysqli_real_escape_string($conn, $_POST['status']);
                            $religion=mysqli_real_escape_string($conn, $_POST['religion']);
                            $caste=mysqli_real_escape_string($conn, $_POST['caste']);
                            $nationality=mysqli_real_escape_string($conn, $_POST['nationality']);
                            $country=mysqli_real_escape_string($conn, $_POST['country']);
                            
                            $first = trim($first);
                            $last = trim($last);
                            $phone = trim($phone);
                            $gender = trim($gender);
                            $city = trim($city);
                            $state = trim($state);
                            $address = trim($address);
                            
                            $ftname = trim($ftname);
                            $dob = trim($dob);
                            $status = trim($status);
                            $religion = trim($religion);
                            $nationality = trim($nationality);
                            $country = trim($country);
                            
                            
                            
                            
                             
                         //validate all inputs if empty or case matches  

                            if(empty($first)){
                                array_push($errors, "First name empty");
                            }elseif(!preg_match("/^([a-zA-Z' ]+)/", $first)){
                                array_push($errors, "First name should contain only Alphabets.");  
                            } 

                            if(empty($last)){
                                array_push($errors, "Last name empty");
                            }elseif(!preg_match("/^([a-zA-Z' ]+)$/", $last)){
                                array_push($errors, "Last name should contain only Alphabets.");
                            }  
                            
                            if(empty($ftname)){
                                array_push($errors, "Father's name empty");
                            }elseif(!preg_match("/^([a-zA-Z' ]+)$/", $ftname)){
                                array_push($errors, "Father's Name should contain only Alphabets.");
                            }
                            
                            if(empty($dob)){
                                array_push($errors, "Enter Date of Birth");
                            }elseif(!preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/", $dob)){
                                array_push($errors, "Enter Date of Birth in YYYY-MM-DD format.");
                            }
                            
                            if(empty($status)){
                                array_push($errors, "Enter Marital Status ");
                            }elseif(!preg_match("/^([a-zA-Z' ]+)$/", $status)){
                                array_push($errors, "Last name should contain only Alphabets.");
                            }
                               
                            if(empty($religion)){
                                array_push($errors, "Religion empty");
                            }elseif(!preg_match("/^([a-zA-Z' ]+)$/", $religion)){
                                array_push($errors, "Religion  should contain only Alphabets.");
                            }
                            
                            if(empty($caste)){
                                array_push($errors, "Caste empty");
                            }elseif(!preg_match("/^([a-zA-Z' ]+)$/", $caste)){
                                array_push($errors, "Caste should contain only Alphabets.");
                            }
                               
                               if(empty($nationality)){
                                array_push($errors, "Nationality empty");
                            }elseif(!preg_match("/^([a-zA-Z' ]+)$/", $nationality)){
                                array_push($errors, "Nationality should contain only Alphabets.");
                            }
                               
                                if(empty($country)){
                                array_push($errors, "Country empty");
                            }elseif(!preg_match("/^([a-zA-Z' ]+)$/", $country)){
                                array_push($errors, "Counttry should contain only Alphabets.");
                            }

                            $mobileregex = "/^[0-9][0-9]{9}$/" ;
                            if(empty($phone)){
                                array_push($errors, "Provide Phone Number.");
                            }elseif(!preg_match($mobileregex, $phone)){
                                array_push($errors, "Phone number should contain only numbers");
                            }

                             if(empty($address)){
                                 array_push($errors, "Provide your address");
                             }



                            if(empty($city)){
                                 array_push($errors, "Provide your City");
                             }elseif(!preg_match("/^([a-zA-Z' ]+)$/", $city)){
                                array_push($errors, "Enter your city");  
                            }

                            if(empty($state)){
                                 array_push($errors, "Provide your State");
                             }elseif(!preg_match("/^([a-zA-Z' ]+)$/", $state))
                             {

                                array_push($errors, "Enter your State");  
                            }



                           $str_gen = 'Select Your Gender';
                            if(empty($gender)){
                                array_push($errors, "Select a Gender");
                            }elseif($gender == $str_gen){
                                 array_push($errors, "Select a Gender");
                            }



                            //if no error, proceed
                            if (count($errors) == 0) {

                                
                                    
                        $sql = mysqli_query($conn,"UPDATE users SET fname = '$first', lname= '$last', phone = '$phone', address ='$address',gender='$gender', city='$city', state= '$state', country = '$country', ftname= '$ftname', dob= '$dob', status= '$status', religion= '$religion', caste= '$caste', nationality='$nationality'  WHERE email ='".$_SESSION['email']."'");
                                 header('location: client_update.php');
                            }
                        }


////------------------------------------------ADD EDUCATIoN BUTTON

                        if (isset($_POST['add_edu'])) {
                            $school=mysqli_real_escape_string($conn, $_POST['school']);
                        $degree=mysqli_real_escape_string($conn, $_POST['degree']);
                        $grade=mysqli_real_escape_string($conn, $_POST['grade']);
                        $stream=mysqli_real_escape_string($conn, $_POST['stream']);



                        $docs_id =  $now_id;
                        $school= trim($_POST['school']);
                        $degree= trim($_POST['degree']);
                        $grade= trim($_POST['grade']);
                        $stream= trim($_POST['stream']);
                        
                            
                            
                             
                            
                            
                          $file_name = $_FILES['file']['name'];
                          $file_size =$_FILES['file']['size'];
                          $file_tmp =$_FILES['file']['tmp_name'];
                          $file_type=$_FILES['file']['type'];
                            
                            
                            
                            $tmp = explode('.', $file_name);
                          $file_ext=strtolower(end($tmp));

                          $expensions= array("pdf");

                            
                           if(empty($file_name)){
                                array_push($errors,'Upload Marksheet/Certificate.');
                            }elseif(in_array($file_ext,$expensions) === false ){
                              array_push($errors,'Only PDF files are allowed');
                          }elseif($file_size > 2097152){
                             array_push($errors,'File size must NOT BE greater than 2 MB');
                          }elseif ($_FILES['file']['error'] === UPLOAD_ERR_FORM_SIZE) {
                                     array_push($errors, "File size exceeded");;
                                    } 
                            
    
                        if(empty($school)){
                                array_push($errors, "Enter School/Institute's Name");
                            }

                            if(empty($degree)){
                                array_push($errors, "Select a Degree");
                            }

                            if(empty($grade)){
                                array_push($errors, "Enter your grades in CGPA or Percentage");
                            }

                            if(empty($stream)){
                                array_push($errors, "Select a Stream");
                                
                            }      



                            if (count($errors) == 0) {
                                $new = time().rand();
                            $file_name= $now_id.$new.$_FILES['file']['name'];
                                
                                 move_uploaded_file($file_tmp,"uploads/files/".$file_name);

                             $sql2 = "INSERT INTO docs (u_id,school,degree,grade,stream,file) VALUES ('$docs_id','$school', '$degree', '$grade', '$stream','$file_name')";
                         $result2 = mysqli_query($conn,$sql2);
                         $row2 = mysqli_fetch_array($result2);
                                 header('location: client_update.php');
                    

                            }
                        }

///////////////////////----------------------EXTRAS---------------------------------------------------
    
    
    
    if (isset($_POST['add_exp'])) {
                            $exp=stripslashes ($_POST['exp']);
                        $lang=stripslashes( $_POST['lang']);
                    
                        
    
                         
                       
                         
    
                        if(empty($exp)){
                                array_push($errors, "Enter Experience");
                            }

                            if(empty($lang)){
                                array_push($errors, "Mention atleast one Language you know.");
                            }

                             


                            if (count($errors) == 0) {
                                 

                             $sql2 = "UPDATE users SET exp='$exp', lang='$lang' WHERE  user_id= $now_id";
                         $result2 = mysqli_query($conn,$sql2);
                         $row2 = mysqli_fetch_array($result2);
                                 header('location: client_update.php');
                    

                            }
                        }

    
    
    

////////////-----------------------------  CHANGE PASSWORD
    
    
                        if (isset($_POST['change_psw'])) {
                            
                            
                            $password1 = stripslashes($_POST['opsw']);
                            $password1 = mysqli_real_escape_string($conn,$password1);
                            $password1 = trim($password1);
                            
                            $password2 = stripslashes($_POST['psw']);
                            $password2 = trim($password2);
                            
                            $password3 = stripslashes($_POST['cpsw']);
                            $password3 = trim($password3);
                            
                            
                            if(empty($password1)){
                                array_push($errors, "Enter your current Password.");
                            }
                            
                            if(empty($password2)){
                                array_push($errors, "Enter a Password.");
                            }elseif(!preg_match('/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/', $password2)){
                                array_push($errors, "Password must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters");
                            }  

                            if($password3 != $password2){
                                array_push($errors, "New Passwords did not match. Retype Password");
                            }
                            
                            
                            if (count($errors) == 0) {
                                
                            $p_query = "SELECT password FROM users WHERE email ='".$_SESSION['email']."'";
                            $p_result = mysqli_query($conn,$p_query) or die(mysqli_error($conn));
                            $p_row = mysqli_fetch_array($p_result);
                                
                               
                            
                            if(password_verify($password1,$p_row['password'])){
                                
                                 $pwd=password_hash($password2,PASSWORD_DEFAULT);
                                
                                $p_sql = mysqli_query($conn,"UPDATE users SET password = '$pwd' WHERE email ='".$_SESSION['email']."'");
                            
                            header('location: logout.php');
                            }
 
                        }
 
                    }
    
    
    
    ///////////////////////   ------------------ Add PROOF---------------------------------
    
    
                        if (isset($_POST['add_proof'])) {
                         $query_poi = "SELECT * FROM proof WHERE u_id = '$now_id' AND poi = 'Proof of Identity'" ;
                            $res_poi = mysqli_query($conn, $query_poi);
                            $row_poi= mysqli_num_rows($res_poi);
                            
                        $query_poa = "SELECT * FROM proof WHERE u_id = '$now_id' AND poa = 'Proof of Address'" ;
                            $res_poa = mysqli_query($conn, $query_poa);
                            $row_poa= mysqli_num_rows($res_poa);
                            
                            $proof_cat= mysqli_real_escape_string($conn, $_POST['proof_cat']);
                             $proof_doc= mysqli_real_escape_string($conn, $_POST['proof_doc']);
                       

                        $refer_id =  $now_id;
                         
                        $proof_cat = trim($proof_cat);
                        $proof_doc = trim($proof_doc);
                        
                        
                        
                            
                          $file_name = $_FILES['file2']['name'];
                          $file_size =$_FILES['file2']['size'];
                          $file_tmp =$_FILES['file2']['tmp_name'];
                          $file_type=$_FILES['file2']['type'];
                            
                             $temp = explode(".", $_FILES["file2"]["name"]);

                                $file_name = $now_id . '-' . $proof_cat . '.'.end($temp);

                             
                          $tmp = explode('.', $file_name);
                          $file_ext=strtolower(end($tmp));
                            
                          $expensions= array("pdf");
                            
 
                            
                           if(empty($file_name)){
                                array_push($errors,'Upload Supporting Document');
                            }elseif(in_array($file_ext,$expensions) === false ){
                              array_push($errors,'Only PDF files are allowed');
                          }elseif($file_size >2097152){
                             array_push($errors,'File size must NOT BE greater than 2 MB');
                          }
                            if ($_FILES['file2']['error'] === UPLOAD_ERR_FORM_SIZE) {
                                     array_push($errors, "File size exceeded");;
                                    }   
    
                         
                            if(empty($proof_cat)){
                                array_push($errors, "Select Proof Type");
                            }
                            if(empty($proof_doc)){
                                array_push($errors, "Select a Supporting Proof");
                            }

                            



                            if (count($errors) == 0) {
                                
                                 move_uploaded_file($file_tmp,"uploads/proofs/".$file_name);
                                
                                if($proof_cat == "Proof of Address"){
                                    $q = "UPDATE proof SET poa='$proof_cat' ,poa_file ='$file_name', poa_doc ='$proof_doc' WHERE u_id='$now_id'";
                                    mysqli_query($conn, $q);
                                }else{
                                    $q = "UPDATE proof SET poi='$proof_cat' ,poi_file ='$file_name', poi_doc='$proof_doc' WHERE u_id='$now_id'";
                                    mysqli_query($conn, $q);
                                     header('location: client_update.php');
                                }

                              
                          
                    

                            }
                        }
    
    
     
      
        
     
    
    
    
    
////////---------------------------------------- -PHOTo UPLOAD---------------------------------
    
    
    
    
    if (isset($_POST['add_photo'])) {
        
                              $target = "uploads/photos/";
        
        
        
                   
                                //This gets all the other information from the form
                                $Filename = basename( $_FILES['photo']['name']);
                                $file_size =$_FILES['photo']['size'];
                                $temp = explode(".", $_FILES["photo"]["name"]);

                                $Filename = $now_id . '.'. end($temp);

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
                                 
                                    array_push($errors, "File must NOT be greater than 200KB");
                              }
        
        if ($_FILES['photo']['error'] === UPLOAD_ERR_FORM_SIZE) {
                                     array_push($errors, "File size exceeded");;
                                    }   

             if(count($errors) == 0){
                 
                            move_uploaded_file($_FILES['photo']['tmp_name'], $target . $Filename);
                            $q1="UPDATE users SET photo='$Filename' WHERE user_id = '$now_id'";
                            $res = mysqli_query($conn,$q1);
                 header('location: client_update.php');
                 
             }
                             
                            
                        }
    
    
    
 
///////////////////////////// ----------------------------- TERMS--------------------------
    
    if (isset($_POST['okay_terms'])){
        
        $terms = $_POST['terms'];
        
        if(empty($terms)){
            array_push($errors, "You have not accepted the Terms & Conditions");
        }
        
        if(count($errors) == 0){
             $res209 = mysqli_query($conn, "UPDATE users SET terms='$terms' WHERE user_id='$now_id'");  
        }
        
       
    }
/////-----------------------------------------------------------CV-----------------------------------------
    
    
    
    
                        if (isset($_POST['add_cv'])) {
                         
                            
                            $target= 'uploads/cv/';
                            
                          $file_name = $_FILES['cv']['name'];
                          $file_size =$_FILES['cv']['size'];
                            $temp = explode(".", $_FILES["cv"]["name"]);

                        $file_name ='CV-'. $now_id . '.'. end($temp);
                          $fileTarget = $target.$file_name;
                                $tempFileName = $_FILES["cv"]["tmp_name"];
                              $tmp = explode('.', $_FILES['cv']['name']);
                                    $file_ext=strtolower(end($tmp));
                                
                           
                         
                            
                          $expensions= array("pdf");
                            
 
                            
                           if(empty($file_name)){
                                array_push($errors,'Upload Supporting Document');
                            }elseif(in_array($file_ext,$expensions) === false ){
                              array_push($errors,'Only PDF files are allowed');
                          }elseif($file_size >2097152){
                             array_push($errors,'File size must NOT BE greater than 2 MB');
                          }
                            if ($_FILES['cv']['error'] === UPLOAD_ERR_FORM_SIZE) {
                                     array_push($errors, "File size exceeded");;
                                    }   
                            
     

                            if (count($errors) == 0) {
                                
                                  move_uploaded_file($_FILES['cv']['tmp_name'], $target . $file_name);
                                
                                 
                                    $q = "UPDATE users SET cv='$file_name' WHERE user_id='$now_id'";
                                    mysqli_query($conn, $q);
                            
                          
                    

                            }
                        }
    
    
    
    
    
    
?>

<section class="my-top-section probootstrap-bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-12 probootstrap-form">

                <h2> Update Profile</h2>
                <h3> Hello,
                    <?php echo $rows1['fname'],' ',$rows1['lname']  ; ?>!</h3>



                <p><a href="profile.php">Dashboard </a> > Update Profile</p>





                <div class="tab">
                    <button class="tablinks" onclick="openCity(event, 'Terms')" id="Terms1">Terms & Conditions</button>
                    <button class="tablinks" onclick="openCity(event, 'General')" id="General1">General</button>
                    <button class="tablinks" id="Photo1" onclick="openCity(event, 'Photo')">Photo Update</button>
                    <button class="tablinks" id="Education1" onclick="openCity(event, 'Education')">Educational Details</button>
                    <button class="tablinks" id="Experience1" onclick="openCity(event, 'Experience')">Extras</button>
                    <button class="tablinks" id="Proof1" onclick="openCity(event, 'Proof')">Proof Details</button>
                    <button class="tablinks" id="CV1" onclick="openCity(event, 'CV')">Upload CV</button>
                    <button class="tablinks" id="change1" onclick="openCity(event, 'change')">Change Password</button>
                </div>
                <!--------------------------------------TERMS-------------------------------------->
                
                
                
                <form action=" " class="probootstrap-form tabcontent" method="POST" id="Terms" enctype="multipart/form-data">
                    <h3 class="text-black mt0">Terms & Conditions</h3>
                    <?php  if (isset($_POST['okay_terms'])) { include('errors.php');}  ?>
                        
                        <p>
                            
                            1. Each candidate have to register with Rs 200/- (Two hundred Rupees) only which is not refundable.<br>
                            2. 80% of the 1st Salary of the Reffered Job will be taken from the Employed Candidates for placing them into Jobs.<br>
                            3. The amount should be paid before the Employed Candidate joins his/her respective job.<br>
                            4. The firm will not be responsible if the Employed Candidate loss the job due to his/her  own misconduct or irresponsibility.<br>
                            5. If the Candidate agrees with the above mentioned Terms & Conditions then he/she may do the registration.
                            
                            
                            
                        </p>
                                         <div class="form-group " style="text-align:center;font-weight: 600;">
                                          <input type="radio" name="terms"  <?=$rows1['terms']=="I Accept" ? "checked" : ""?> value="I Accept" />
                                             I Accept</div>

                    
                   <div class="form-group ">
                        <input type="submit" class="btn btn-primary" name="okay_terms" value="Save"><br><br>
                        <p><a href="profile.php">BACK</a></p>
                    </div>
                    
                </form>
                
                
                
                
                <!----------------------------------------- General details  ---------------------->
                <form action=" " class="probootstrap-form tabcontent" method="POST" id="General" enctype="multipart/form-data">
                    <h3 class="text-black mt0">General</h3>
                    <?php  if (isset($_POST['save_user_1'])) { include('errors.php');}  ?>



                    <div class="form-group ">
                        <input type="text" class="form-control" placeholder="First Name" name="first" value="<?php echo  $rows1['fname'] ?>" data-toggle="tooltip" title="Edit Your First Name">
                    </div>
                    <div class="form-group ">

                        <input type="text" class="form-control" placeholder="Last Name" name="last" value="<?php echo $rows1['lname'] ?>" data-toggle="tooltip" title="Edit Your Last Name">
                    </div>
                    <div class="form-group ">

                        <input type="text" class="form-control" placeholder="Father's Name" name="ftname" value="<?php echo $rows1['ftname'] ?>" data-toggle="tooltip" title="Enter Father's Name">
                    </div>
                    <div class="form-group ">
                        <input type="email" class="form-control" placeholder="Email" name="email" value="<?php echo $rows1['email'] ?>" disabled data-toggle="tooltip" title="Sorry! You cannot edit your Email!">

                    </div>
                    <div class="form-group ">
                        <input type="text" class="form-control" placeholder="10 digit Phone Number" name="phone" maxlength="10" pattern="^\d{10}$" value="<?php echo $rows1['phone']?>" data-toggle="tooltip" title="Edit Your Phone Number">
                    </div>
                    
                        <div class="form-group ">
                        <input type="text" class="form-control" placeholder="Date of Birth (YYYY-MM-DD)" name="dob" maxlength="10" pattern="^\d{4}\-(0[1-9]|1[012])\-(0[1-9]|[12][0-9]|3[01])$" value="<?php echo $rows1['dob']?>" data-toggle="tooltip" title="Edit Your Date of Birth" >
                    </div>

                    <div class="form-group ">

                        <select name="gender" class="form-control">
                            <option value=" " disabled> Select your gender</option>
                            <option required value="Male" <?=$rows1['gender']=="Male" ? ' selected="selected"' : '' ?>>Male</option>
                            <option required value="Female" <?=$rows1['gender']=="Female" ? ' selected="selected"' : '' ?>>Female</option>
                            <option required value="Others" <?=$rows1['gender']=="Others" ? ' selected="selected"' : '' ?>>Others</option>
                        </select>
                    </div>


                    <div class="form-group ">

                        <input type="text" size="30" class="form-control" placeholder="Enter your Address" name="address" value="<?php echo $rows1['address'] ?>" data-toggle="tooltip" title="Edit Your Address">
                    </div>

                    <div class="form-group ">

                        <input type="text" class="form-control" placeholder="Enter your City" name="city" value="<?php echo $rows1['city'] ?>" data-toggle="tooltip" title="Enter your City">
                    </div>

                    <div class="form-group ">

                        <input type="text" class="form-control" placeholder="Enter your State" name="state" value="<?php echo $rows1['state'] ?>" data-toggle="tooltip" title="Enter your City">
                    </div>

                    <div class="form-group ">

                        <input type="text" class="form-control" name="country" placeholder="Country" value="<?php echo $rows1['country'] ?>" data-toggle="tooltip" title="Enter Country">
                    </div>

                        <div class="form-group ">

                        <input type="text" class="form-control" placeholder="Marital Status" name= "status" value="<?php echo $rows1['status'] ?>" data-toggle="tooltip" title="Marital Status">
                    </div>
                        <div class="form-group ">

                        <input type="text" class="form-control" placeholder="Religion" name="religion" value="<?php echo $rows1['religion'] ?>" data-toggle="tooltip" title="Religion">
                    </div>
                    <div class="form-group ">

                        <input type="text" class="form-control" placeholder="Caste" name="caste" value="<?php echo $rows1['caste'] ?>" data-toggle="tooltip" title="Enter Caste">
                    </div>
                    <div class="form-group ">

                        <input type="text" class="form-control" placeholder="Nationality" name="nationality" value="<?php echo $rows1['nationality'] ?>" data-toggle="tooltip" title="Nationality">
                    </div>


                    <div class="form-group ">
                        <input type="submit" class="btn btn-primary" name="save_user_1" value="Save"><br><br>
                        <p><a href="profile.php">BACK</a></p>
                    </div>

                </form>

                <!----------------------------PHOTO UPDATE---------->


                <form action="" class="probootstrap-form tabcontent" method="POST" id="Photo" enctype="multipart/form-data">
                    <h3 class="text-black mt0">Photo Update</h3>
                    <p>Upload only <strong>Passport Size Photo</strong>. <br>Only <strong>JPEG</strong> Files are allowed.<br> Files must less than<strong> 500KB</strong></p>
                    <?php  if (isset($_POST['add_photo'])) {
        include('errors.php');}   
                if($rows1['photo']){
             $image_src2 = "uploads/photos/".$rows1['photo']; 
             
             ?>

                    <div class="dp">

                        <img src='<?php echo $image_src2; ?>' width="140px" height="180px">
                    </div>



                    <?php }else{
             
             ?>
                    <div class="dp">
                        
                        <h1 class="icon-camera2"></h1>
                        <h4>NO IMAGE UPLOADED</h4>
                    </div>

                    <?php }?>




                    <div class="my-form-section">
                        <div class="my-form-label"> Choose Photo:
                        </div>
                         <input type="hidden" name="MAX_FILE_SIZE" value="512000" />
                        <div class="file-upload"><input type="file" class="my-form-input" name="photo" id="file">
                        </div>
                    </div>





                    <div class="form-group ">
                        <input type="submit" class="btn btn-primary" name="add_photo" value="Update"><br><br>
                        <p><a href="profile.php">BACK</a></p>
                    </div>

                </form>


                <!--------------- UPLOAD Educational Dretails---------------------->


                <form action=" " class="probootstrap-form tabcontent" id="edu-form" method="POST" enctype="multipart/form-data">
                    <h3 class="text-black mt0">Education Details</h3>
                    <h4><em>Upload Certificate or Marksheet for each Qualification you mention.</em></h4>
                    <h4>Only <strong>PDF</strong> Files are allowed. Files must be less than <strong>1MB</strong></h4>
                    


                    <div class="form-group ">
                        <input type="text" class="form-control" placeholder="School/Institute's Name" name="school" value="" data-toggle="tooltip" title="Edit Your First Name" required>
                    </div>
                    <div class="form-group ">
                        <select name="degree" class="form-control" placeholder="Degree">
                            <option value=" "> Select Degree</option>
                            <option required value="10th">10th/Matriculation</option>
                            <option required value="12th/Equivalent">12th/Equivalent</option>
                            <option required value="Graduate">Graduate</option>
                            <option required value="Post-Graduate">Post-Graduate</option>
                            <option required value="Others">Others</option>
                        </select>
                    </div>
                    <div class="form-group ">
                        <input type="text" class="form-control" placeholder="Stream" name="stream" data-toggle="tooltip" title="Enter your Stream" required>

                    </div>
                    <div class="form-group ">
                        <input type="text" class="form-control" placeholder="Grade" name="grade" data-toggle="tooltip" title="Enter Your Grade" required>
                    </div>



                    <div class="my-form-section">
                        <div class="my-form-label"> Upload Your Marksheet/Certificate:
                        </div>
                        <input type="hidden" name="MAX_FILE_SIZE" value="1048576" />
                        <div class="file-upload"><input type="file" class="my-form-input" name="file" id="file">
                        </div>
                    </div>
                    <br>
                    <br>
                    <div class="form-group ">
                        <input type="submit" class="btn btn-primary" name="add_edu" value="Add">
                        <input type="submit" class="btn" onclick="myeduFunction()" value="Back">
                    </div>

                </form>

                <div class="my-container tabcontent" id="Education">
                    <div class="row">

                        <div class="col-md-12  ">
                            <div class=" my-service-inner-item" style="overflow-x:auto;">
<?php    if (isset($_POST['add_edu'])) {include('errors.php');}  ?>
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
                                            <th style="text-align: center; padding: 20px font-size: 5vh">Marksheet</th>
                                            <th style="text-align: center; padding: 20px font-size: 5vh"></th>
                                        </tr>
                                        <tr>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
		
		while ($row_edu = mysqli_fetch_array($res_edu)){
			//$filename = $row_edu['file'];
           $prefix = "uploads/files";
    
			echo '<tr>
					
					
					<td>'.$row_edu['degree'].'</td>
					<td>'.$row_edu['stream'].'</td>
					<td>'.$row_edu['school'].'</td>
					<td>'.$row_edu['grade'].'</td>
                    <td><a href="delete.php?edu_degree='.$row_edu['degree'].'&amp;edu_id='.$now_id.'">Delete</a></td>
                    
					 
				</tr>';
	
			
		}
             
            
            ?>

                                    </tbody>

                                </table>
                            </div>
                    <p style="padding-top:20px; text-align:center;">Click the ADD button to add a Qualification.</p>
                            <button onclick="myeduFunction()" class="btn btn-primary my-add-button">ADD</button>
                            <script>

                                function myeduFunction() {
    var x = document.getElementById("edu-form");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}</script>
                        </div>
                    </div>




                </div>



<!----------------------------------------------------------Extras---------------------->
                
                
                <form action=" " class="probootstrap-form tabcontent" id="exp-form" method="POST"  >
                    <h3 class="text-black mt0">Extras </h3>
                    <h4><em>Choose years of Experience.</em></h4>
                    <h4><em>Type the Languages you know seperating by commas(,).</em></h4>
                     
                    


                     
                    <div class="form-group ">
                        <select name="exp" class="form-control" placeholder="Degree">
                            <option value=" "> Select Experience</option>
                            <option required value="NIL">NIL</option>
                            <option required value="0 years">0 years</option>
                            <option required value="1-2 years">1-2 years</option>
                            <option required value="2-5y ears">2-5 years</option>
                            <option required value="5 years & more">More than 5 years</option>
                        </select>
                    </div>
                    <div class="form-group ">
                        <input type="text" class="form-control" placeholder="Languages Known" name="lang" data-toggle="tooltip" title="Enter languages Known" required>

                    </div>
                    



                     
                    
                    <div class="form-group ">
                        <input type="submit" class="btn btn-primary" name="add_exp" value="Add">
                        <input type="submit" class="btn" onclick="myexpFunction()" value="Back">
                    </div>

                </form>

                <div class="my-container tabcontent" id="Experience">
                    <div class="row">

                        <div class="col-md-12  ">
                            <div class=" my-service-inner-item" style="overflow-x:auto;">
<?php    if (isset($_POST['add_exp'])) {include('errors.php');}  ?>
                                <?php
                                    $q_exp = "SELECT * FROM users WHERE user_id= $now_id";    
                                    $res_exp = mysqli_query($conn, $q_exp);
                                    //$row_edu = mysqli_fetch_array($res_edu);
                                         
                                    
                                     ?>


                                <table class="edu-section">

                                     
                                    <tbody>
                                        <?php
		
		while ($row_exp = mysqli_fetch_array($res_exp)){
            if($row_exp['exp'] != "" ){
                
                
            
			//$filename = $row_edu['file'];
            
    
			echo '<tr>
					
					<th>Experience</th>
					<td>'.$row_exp['exp'].'</td>
                    <td><a href="delete.php?exp_id='.$now_id.'">Delete</a></td>
                  </tr>   ';} if($row_exp['lang'] != ""){
                
            echo '
                    <tr>
                 
                    <th>Languages known</th>
					<td>'.$row_exp['lang'].'</td>
				     <td><a href="delete.php?lang_id='.$now_id.'">Delete</a></td>
                    
                    
					 
				</tr>';
	 }
			
		}
             
            
            ?>

                                    </tbody>

                                </table>
                            </div>
                    <p style="padding-top:20px; text-align:center;">Click the ADD button to add a record.</p>
                            <button onclick="myexpFunction()" class="btn btn-primary my-add-button">ADD</button>
                            <script>

                                function myexpFunction() {
    var x = document.getElementById("exp-form");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}</script>
                        </div>
                    </div>




                </div>
                
                <!---------------------------------CV UPLOAD  ------------------------------>
                
                
                
                
                
                
                
                <form action=" " class="probootstrap-form tabcontent" id="cv-form" method="POST" enctype="multipart/form-data">
                    <h3 class="text-black mt0">Upload CV</h3>
                    
                    <h4>Only <strong>PDF</strong> Files are allowed. Files must be less than <strong>1MB</strong></h4>
                    


                     


                    <div class="my-form-section">
                        <div class="my-form-label"> Upload Your CV:
                        </div>
                        <div class="file-upload">
                        <input type="hidden" name="MAX_FILE_SIZE" value="1048576" />
                        <input type="file" class="my-form-input" name="cv" >
                        </div>
                    </div>
                    <br>
                    <br>
                    <div class="form-group ">
                        <input type="submit" class="btn btn-primary" name="add_cv" value="Add">
                        <input type="submit" class="btn" onclick="myeduFunction()" value="Back">
                    </div>

                </form>

                <div class="my-container tabcontent" id="CV">
                    <div class="row">

                        <div class="col-md-12  ">
                            <div class=" my-service-inner-item" style="overflow-x:auto;">
<?php    if (isset($_POST['add_cv'])) {include('errors.php');}  ?>
                                <?php
                                    $q_cv= "SELECT * FROM users WHERE user_id= $now_id";    
                                    $res_cv = mysqli_query($conn, $q_cv);
                                    //$row_edu = mysqli_fetch_array($res_edu);
                                        
                                   if( $row_cv = mysqli_fetch_array($res_cv) ){
                                       if($row_cv['cv'] != NULL){
                                     ?>


                                <table class="edu-section">

                                    <thead>
                                        <tr>

                                             
                                            <th style="text-align: center; padding: 20px font-size: 5vh">CV</th>
                                            <th style="text-align: center; padding: 20px font-size: 5vh"></th>
                                            
                                        </tr>
                                        <tr>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
		
		
			//$filename = $row_edu['file'];
           $prefix = "uploads/files";
            
			echo '<tr>
					
					
					 
					<td>'.$row_cv['cv'].'</td>
                    <td>  
                     <a href="uploads/cv/'.$row_cv['cv'].'" target= "blank"><button class="icon-eye2" style="border:none; font-size: 20px; padding: 8px"></button></a></td>
                    
					 
				</tr>
	
			
		';
                                       } }
             
            
            ?>

                                    </tbody>

                                </table>
                            </div>
                    <p style="padding-top:20px; text-align:center;">Click the EDIT button to add/change CV.</p>
                            <button onclick="mycvFunction()" class="btn btn-primary my-add-button">EDIT</button>
                          
                                
                                    <script>

                                function mycvFunction() {
    var x = document.getElementById("cv-form");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}</script>
                       
                       
                        </div>
                    </div>




                </div>
                
                
                
                
                   
                
                
                
                
                
                
                
                
                
                
                
                
                
                
                

                <!-----------------------PROOF DETAILS----------------------------------------->

                <form action=" " class="probootstrap-form tabcontent" id="Proof-details" method="POST" enctype="multipart/form-data">
                    <h3 class="text-black mt0">Proof Details</h3>
                    <h4><em>Upload original scanned document for each Proof you mention.</em></h4>
                    <h4>Only <strong>PDF</strong> Files are allowed. Files must less than <strong>1MB</strong></h4>
                    




                    <div class="form-group ">
                        <select name="proof_cat" id="proof_cat" class="form-control" placeholder="Proof Category" onchange="selectProof(this.options[this.selectedIndex].value)">
                            <option value="default" selected>Select Proof</option>
                            <option required value="Proof of Identity">Proof of Identity</option>
                            <option required value="Proof of Address">Proof of Address</option>

                        </select>

                        <br>
                        <select id="proof_doc" name="proof_doc" class="form-control" placeholder="Proof"> </select>

                    </div>

                    <div class="my-form-section">
                        <div class="my-form-label"> Upload Your Supporting Document:
                        </div>
                         <input type="hidden" name="MAX_FILE_SIZE" value="1048576" />
                        <div class="file-upload"><input type="file" class="my-form-input" name="file2" id="file2">
                       
                        </div>
                    </div>
                    <br>
                    <br>

                    <div class="form-group ">
                        <input type="submit" class="btn btn-primary" name="add_proof" value="Add"><br><br>
                        <input type="submit" class="btn" onclick="myproofFunction()" value="Back">
                    </div>

                </form>


                <div class="my-container tabcontent" id="Proof">
                    <div class="row">

                        <div class="col-md-12  ">
                            <div class=" my-service-inner-item" style="overflow-x:auto;">
            
                                <?php    if (isset($_POST['add_proof'])) {include('errors.php');}  
                                 
                                    $q_proof= "SELECT * FROM proof WHERE u_id= $now_id ";    
                                    $res_proof = mysqli_query($conn, $q_proof);
                                     
                                        $row_proof = mysqli_fetch_array($res_proof); 
                                    
                                     ?>


                                <table class="edu-section">

                                     
                                        <?php
		
	if( $row_proof['poi'] && $row_proof['poa']){
        
    
			//$filename = $row_edu['file'];
           $prefix_proof = "uploads/proofs";
    
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
	
			

           }
            
            ?>

                                    

                                </table>
                            </div>
                            <p style="padding-top:20px; text-align:center;">Click the EDIT button to add a Proof.</p>
                            <button onclick="myproofFunction()" class="btn btn-primary my-add-button">EDIT</button>
                            <script>

                                function myproofFunction() {
    var x = document.getElementById("Proof-details");
    if (x.style.display === "none") {
        x.style.display = "block";
    } else {
        x.style.display = "none";
    }
}</script>
                        </div>
                    </div>




                </div>



                <!------------------------CHANGE PASSWORD------------------------------->


                <form action=" " class="probootstrap-form tabcontent" id="change" method="POST">
                    <h3 class="text-black mt0">Change Password</h3>

                    <?php    if (isset($_POST['change_psw'])) {include('errors.php');}  ?>



                    <div class="form-group ">
                        <input type="password" class="form-control" placeholder="Current Password" name="opsw" data-toggle="tooltip" title="Type your Current Password">
                    </div>
                    <div class="form-group ">
                        <input type="password" class="form-control" placeholder="New Password" name="psw" data-toggle="tooltip" title="Type your New Password">
                    </div>
                    <div class="form-group ">
                        <input type="password" class="form-control" placeholder="Confirm New Password" name="cpsw" data-toggle="tooltip" title="Confirm Your New Password">

                    </div>



                    <div class="form-group ">
                        <input type="submit" class="btn btn-primary" name="change_psw" value="Update"><br><br>
                        <p><a href="profile.php">BACK</a></p>
                    </div>

                </form>










            </div>

        </div>
    </div>


</section>










<script>
    function openCity(evt, cityName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {

            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
        document.cookie = "cityName=" + cityName + "1; expires=Thu, 18 Dec 2090 12:00:00 UTC; path=/";
    }



    ///////
    document.addEventListener("DOMContentLoaded", function() {
        // Handler when the DOM is fully loaded
        var selectedCity = getCookie("cityName");
        if (selectedCity != "") {
            document.getElementById(selectedCity).click();
        }
    });

    function getCookie(cname) {
        var name = cname + "=";
        var decodedCookie = decodeURIComponent(document.cookie);
        var ca = decodedCookie.split(';');
        for (var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
            }
        }
        return "";
    }
</script>










<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
<!-----------------           dropdown PROOF------->
<script>
    $(function() {
        var sel, i,
            list = ['Proof of Identity', 'Proof of Address'],
            poi = ['AADHAR- 12 Digit UIN', 'Driving License', 'PAN Card', 'Passport', 'Voter ID Card'],
            poa = ['Driving License', 'Passport', 'Voter ID Card'],

            poi_default = '<option value="default" selected>Select your ID proof</option>',
            poa_default = '<option value="default" selected>Select your Address Proof</option>';

        proof_doc = $('#proof_doc');


        $('select').change(function() {
            switch (this.id) {
                case 'proof_cat':
                    $('.proof_doc').hide();
                    proof_doc.find('option').remove();
                    proof_doc.append(poi_default);
                    proof_doc.show();
                    if (this.value == 'Proof of Identity') {
                        for (i = 0; i < poi.length; i++) {
                            $("#proof_doc").append(
                                '<option value="' + poi[i] + '">' + poi[i] + '</option>'
                            );
                        }
                    } else if (this.value == 'Proof of Address') {
                        for (i = 0; i < poa.length; i++) {
                            $("#proof_doc").append(
                                '<option value="' + poa[i] + '">' + poa[i] + '</option>'
                            );
                        }
                    }


            }
        });

    });
</script>







<?php 
    
}else{
    
    http_response_code(404);
    include('403forbidden.php');
   // header('location: signin.php');
}


include('footer.php');

?>