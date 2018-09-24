<?php
session_start();
define('ALL OKAY', TRUE);

include('db.php');
include('nav.php');

$errors = array();



if (isset($_POST['update_admin'])) {
//get all inputs
    $first=mysqli_real_escape_string($conn, $_POST['first']);
    $first = trim($first);
	$last=mysqli_real_escape_string($conn, $_POST['last']);
    $last = trim($last);
    $phone=mysqli_real_escape_string($conn, $_POST['phone']);
     
    $phone = trim($phone);
     
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
    
    //if no error, proceed
	if (count($errors) == 0) {


      
$sql = mysqli_query($conn,"UPDATE users SET fname = '$first', lname= '$last', phone = '$phone' WHERE user_id ='".$_SESSION['user_id']."'");
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
                                
                            $p_query = "SELECT password FROM users WHERE user_id ='".$_SESSION['user_id']."'";
                            $p_result = mysqli_query($conn,$p_query) or die(mysqli_error($conn));
                            $p_row = mysqli_fetch_array($p_result);
                                
                               
                            
                            if(password_verify($password1,$p_row['password'])){
                                
                                 $pwd=password_hash($password2,PASSWORD_DEFAULT);
                                
                                $p_sql = mysqli_query($conn,"UPDATE users SET password = '$pwd' WHERE user_id ='".$_SESSION['user_id']."'");
                            
                            header('location: logout.php');
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
            
            <h2> Dashboard</h2>
            <h3> Hello, <?php echo $rows1['fname'],' ',$rows1['lname']  ; ?>!</h3>
            <h4> You're the Admin and here is your control panel!</h4>
            
            
            <p><a href="admin_dash.php">Dashboard </a> > Update Profile</p>
            
            <div class="tab">
                    <button class="tablinks" onclick="openCity(event, 'General')" id="General1">General</button>
                    
                    <button class="tablinks" id="change1" onclick="openCity(event, 'change')">Change Password</button>
                </div>
            
      <!--           FORM                 -->      
            <form action="" class="probootstrap-form tabcontent" method="POST" id="General">
                    <h3 class="text-black mt0">General</h3>
                    <?php   include('errors.php');  ?>
                    


                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="First Name" name="first" value="<?php echo  $rows1['fname'] ?>"  >
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Last Name" name="last" value="<?php echo $rows1['lname'] ?>" >
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" placeholder="Email" name="email" value="<?php echo $rows1['email'] ?>" disabled>

                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="10 digit Phone Number" name="phone" maxlength="10" pattern="^\d{10}$" value="<?php echo $rows1['phone'] ?>" >
                    </div>


                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" name="update_admin" value="Update"><br><br>
                        <p><a href="admin_dash.php" class="">BACK</a></p>
                    </div>
                       
                </form>
            
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
                        <p><a href="admin_dash.php" class="">BACK</a></p>
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
    

    <?php 
    
}else{
    
    http_response_code(404);
    include('403forbidden.php');
   // header('location: signin.php');
}


include('footer.php');

?>
    
    
    
    
    
    
    
    
    
    
    

  