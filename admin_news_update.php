<?php
session_start();
define('ALL OKAY', TRUE);

include('db.php');
include('nav.php');

$errors = array();



if (isset($_POST['update_news'])) {
//get all inputs
    $title=mysqli_real_escape_string($conn, $_POST['title']);
    $title = trim($title);
	$editor1=$_POST['editor1'];
     
     
     
 //validate all inputs if empty or case matches  
      
    if(empty($title)){
        array_push($errors, "Title is empty");
    } 

    if(empty(editor1)){
        array_push($errors, "Text area is empty");
    } 
      
     
    
    //if no error, proceed
	if (count($errors) == 0) {


      
$sql = mysqli_query($conn,"INSERT INTO news(title, des) VALUES ('$title','$editor1')");
    header('location:admin_news.php');
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
            
            
            <p><a href="admin_dash.php">Control Panel </a> > Add News</p>
            
      <!--           FORM                 -->      
            <form action="" class="probootstrap-form" method="POST">
                    <h2 class="text-black mt0">News</h2>
                    <?php   include('errors.php');  ?>
                    


                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Title Here" name="title"  >
                    </div>
                    <script src="https://cdn.ckeditor.com/4.10.0/standard/ckeditor.js"></script>
                    <textarea name="editor1"></textarea>
		<script>
			CKEDITOR.replace( 'editor1' );
		</script>
                     
                     


                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" name="update_news" value="Update"><br><br>
                        <p><a href="admin_news.php">BACK</a></p>
                    </div>
                       
                </form>
                
            
            <div>
                
                
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
    
    
    
    
    
    
    
    
    
    
    

  