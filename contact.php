 
<?php


session_start();
define('ALL OKAY', TRUE);
include('nav.php');
include('db.php');
?>


 



<section class="my-top-section probootstrap-bg-light" data-section="contact">
    <div class="container">
        <div class="row">
            <div class="col-md-6 probootstrap-animate">
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

       
       
       <div class="col-md-6 probootstrap-animate">
                 <h2>Contact Us</h2>
                 
                 <p><strong>Phone:</strong> <br>+91-9127068456</p>
                 <p><strong>Email:</strong><br> support@consultancyforunemployed.in</p>
           <p><strong>Address: </strong><br>Consultancy for Unemployed,<br>Khaliamari, Dibrugarh, Assam, 786001<br> <em>Govt. Regd. No.3604/09/2016</em></p>
            </div>

        </div>
    </div>
</section>



<?php 
 

include('footer.php');

?>