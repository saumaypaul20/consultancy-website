<?php


session_start();
define('ALL OKAY', TRUE);
include('nav.php');
include('db.php');
?>

<section class="probootstrap-hero prohttp://localhost/probootstrap/frame/#featuresbootstrap-slant" style="background-image: url(img/image_1.jpg);" data-stellar-background-ratio="0.5">
    <div class="container">
        <div class="row intro-text">
            <div class="col-md-8 col-md-offset-2 text-center">
                <h1 class="  probootstrap-animate my-heading-index">
                    <ul id="slides">
                        <li class=" slide showing"><strong>GIVING OUR BEST FOR <br><strong style="color:#e74c3c"> YOUR SUCCESS</strong> </strong>
                            <p style="font-size:20px; font-weight: 200;">Make a decision to succeed.</p>
                        </li>
                        <li class=" slide"><strong>TURN <strong style="color:#e74c3c">TO US </strong><br> FOR <strong style="color:#e74c3c">DIRECTION</strong> </strong>
                            <p style="font-size:20px; font-weight: 200;">We'll raise you up.</p>
                        </li>
                        <li class=" slide"><strong>WE MAKE IT <strong style="color:#e74c3c">HAPPEN. </strong><br> <strong style="color:#e74c3c">BETTER</strong> </strong>
                            <p style="font-size:20px; font-weight: 200;">Let us revive your dream</p>
                        </li>

                    </ul>

                </h1>

                <script>

                    var slides = document.querySelectorAll('#slides .slide');
var currentSlide = 0;
var slideInterval = setInterval(nextSlide,5000);

function nextSlide(){
	slides[currentSlide].className = 'slide';
	currentSlide = (currentSlide+1)%slides.length;
	slides[currentSlide].className = 'slide showing';
}
                
              </script>
 



                <div class="probootstrap-subheading center ">

                    <?php if(isset($_SESSION['email'])){?>

                    <p class="probootstrap-animate"><a href="<?php echo ('profile.php');?>" role="button" class="btn btn-primary">Go to Dashboard</a>

                        <?php }elseif(isset($_SESSION['user_id'])){?>
                        <p class="probootstrap-animate"><a href="<?php echo ('admin_dash.php');?>" role="button" class="btn btn-primary">Go to Dashboard</a>


                            <?php
                    
                    
                }
        else {?>


                            <p class="probootstrap-animate"><a href="signup.php" role="button" class="btn btn-primary">REGISTER NOW</a><a href="signin.php" class="btn btn-default smoothscroll" role="button">LOGIN</a></p>

                            <?php }
            
        ?>

                </div>
            </div>
        </div>
    </div>


</section>



<?php
$qq= "SELECT * FROM news";
$res321= mysqli_query($conn, $qq);

 

?>




 


<section class="probootstrap-section">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="probootstrap-service-item probootstrap-animate" data-animate-effect="fadeIn">
                    <span class="icon  icon-briefcase3"></span>
                    <h2>Guaranteed Jobs</h2>
                    <p>Our mission is to make you sure never sit back unemployed. We make sure that you get your desired job. Sign up now to get started!</p>
                     <p><a href="signup.php" class="probootstrap-link">Sign Me Up!<i class="icon-chevron-right"></i></a></p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="probootstrap-service-item probootstrap-animate" data-animate-effect="fadeIn">
                    <span class="icon icon-wallet2"></span>
                    <h2>Pay Small, Do More</h2>
                    <p>A small fee can change your future. A little investment is worth a chace to make a secure future. And that's what we do. We just want you to join us, and we make sure you never remain socially idle.</p>
                    <p><a href="terms_and_conditions.php" class="probootstrap-link">How this works?<i class="icon-chevron-right"></i></a></p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="probootstrap-service-item probootstrap-animate" data-animate-effect="fadeIn">
                    <span class="icon icon-linegraph"></span>
                    <h2>Grow High</h2>
                    <p>If you are lost in the ocean, we make sure that you get into the shore where magic happens. We make sure you never remain lost, present you a boat and sail you the the shore. We are the best sailors you got now. Don't miss the boat! </p>
                   <p><a href="team.php" class="probootstrap-link">Learn More<i class="icon-chevron-right"></i></a></p>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="my-section">

    <div class="container">
        <div class="row">
            <div class="col-md-12">
               <h2 style="font-size: 50px; text-align:center; color:#e74c3c">Latest News</h2>
                <div class="probootstrap-service-item probootstrap-animate" data-animate-effect="fadeIn">
                    
                    <div class="microsoft container12">

                        <?php while($row321 = mysqli_fetch_array($res321)){?>

                        <h3 class="marquee">
                            <?php echo $row321['title'];?>
                            <br> <a style="font-size: 15px;" href="news.php">Learn More</a> </h3><br>

                        <?php } ?>

                    </div>
                    <p class="probootstrap-animate" style="text-align:center;"><a href="news.php" class="btn-primary  " style="padding: 10px;">View All News</a></p>
                </div>
            </div>
        </div>
    </div>
</section>







 
<?php

$q23="SELECT * FROM placed";
$res23 = mysqli_query($conn, $q23);
?>

<section class="my-top-section probootstrap-bg-light" data-section="reviews">
    <div class="container">
        <div class="row text-center mb100">
            <div class="col-md-8 col-md-offset-2 probootstrap-section-heading probootstrap-animate">
                <h2 class="mb30 text-black probootstrap-heading">From nowhere to the Podium</h2>
                <p>Read what candidates say about us after being placed into thier suitable companies. <br>Join now and we will make you do something with your life.</p>
            </div>
        </div>
        <!-- END row -->
        <div class="row ">


            <?php while($row23 = mysqli_fetch_array($res23)){
         
              $image_src2 = "uploads/placed/".$row23['photo'];   
         ?>
            <div class="col-md-4 col-sm-6 col-xs-12 probootstrap-animate">
                <div class="probootstrap-testimonial">
                    <p><img src="<?php echo $image_src2 ;?>" class="img-responsive img-circle probootstrap-author-photo"></p>
                    <p class="mb10 probootstrap-rate">
                        <i class="icon-star"></i>
                        <i class="icon-star"></i>
                        <i class="icon-star"></i>
                        <i class="icon-star"></i>
                        <i class="icon-star"></i>
                    </p>
                    <blockquote>
                        <p>
                            <?php echo $row23['speech'];?>
                        </p>
                    </blockquote>
                    <p class="mb0">&mdash;
                        <?php echo $row23['name'];?>
                    </p>
                </div>
            </div>

            <div class="clearfix visible-sm-block"></div>



            <?php }?>


        </div>
    </div>
</section>
 
<?php 
    if(isset($_SESSION['email'])){
        
    }elseif(isset($_SESSION['user_id'])){
        
    }
else{
    

?>
<section class="my-top-section probootstrap-bg-light" data-section="contact">
    <div class="container">
        <div class="row">
            <div class="col-md-12 probootstrap-animate">
                <form action="guest.php" class="probootstrap-form" method="post">
                    <h2 class="text-black mt0">Get In Touch</h2>
                    <div class="form-group">
                        <input type="text" class="form-control" name="name" placeholder="Your Name">
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" name="email" placeholder="Your Email">
                    </div>
                   <div class="form-group">
                        <input type="text" class="form-control" placeholder="10 digit Phone Number" name="phone" maxlength="10" pattern="^\d{10}$"   >
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" cols="30" rows="10" name="message" placeholder="Write a Message"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" name="guest_btn" value="Send Message">
                    </div>
                </form>
            </div>

        </div>
    </div>
</section>



<?php 
}

include('footer.php');

?>