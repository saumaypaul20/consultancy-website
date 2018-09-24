<?php
  
define('ALL OKAY', TRUE);
include('server.php');

 
    
    
include('nav.php');
    

?>
<style>
    .accordionItem {
        float: left;
        display: block;
        width: 100%;
        height: inherit;


    }

    .accordionItemHeading {
        cursor: pointer;
        margin: 0px 0px 10px 0px;
        padding: 10px;
        background: #273c75;
        color: #fff;
        width: 100%;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        border-radius: 3px;
        box-sizing: border-box;
    }

    .close1 .accordionItemContent {
        height: 0px;
        transition: height 1s ease-out;
        -webkit-transform: scaleY(0);
        -o-transform: scaleY(0);
        -ms-transform: scaleY(0);
        transform: scaleY(0);
        float: left;
        display: block;


    }

    .open .accordionItemContent {
        padding: 20px;
        background-color: #fff;
        border: 1px solid #ddd;
        width: 100%;
        margin: 0px 0px 10px 0px;
        display: block;
        -webkit-transform: scaleY(1);
        -o-transform: scaleY(1);
        -ms-transform: scaleY(1);
        transform: scaleY(1);
        -webkit-transform-origin: top;
        -o-transform-origin: top;
        -ms-transform-origin: top;
        transform-origin: top;

        -webkit-transition: -webkit-transform 0.4s ease-out;
        -o-transition: -o-transform 0.4s ease;
        -ms-transition: -ms-transform 0.4s ease;
        transition: transform 0.4s ease;
        box-sizing: border-box;
    }

    .open .accordionItemHeading {
        margin: 0px;
        -webkit-border-top-left-radius: 3px;
        -webkit-border-top-right-radius: 3px;
        -moz-border-radius-topleft: 3px;
        -moz-border-radius-topright: 3px;
        border-top-left-radius: 3px;
        border-top-right-radius: 3px;
        -webkit-border-bottom-right-radius: 0px;
        -webkit-border-bottom-left-radius: 0px;
        -moz-border-radius-bottomright: 0px;
        -moz-border-radius-bottomleft: 0px;
        border-bottom-right-radius: 0px;
        border-bottom-left-radius: 0px;
        background-color: #273c75;
        color: #fff;
    }
</style>
<!-- END section -->
<section class="my-top-section probootstrap-bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-12">



                
                    <h2 style="text-align:center"><span class="icon icon-question"></span>
                        HELP</h2>
                    <p style="text-align:center"> Welcome to Consultancy for Unemployed. <br>



                    </p>


                    <div class="accordionWrapper ">
                        <div class="accordionItem open">
                            <h4 class="accordionItemHeading">Welcome</h4>
                            <div class="accordionItemContent">
                                <p>Welcome to FAQ page.</p>
                                <p>All FAQs are answered here.</p>
                            </div>
                        </div>

                    <?php
                            $q345 = "SELECT * FROM faq";
                            $res345 = mysqli_query($conn, $q345);
                        while($row345 = mysqli_fetch_array($res345)){
                            
                       
                        ?>


                        <div class="accordionItem close1">
                            <h4 class="accordionItemHeading"> <?php echo $row345['ques'];?></h4>
                            <div class="accordionItemContent">
                                <p><?php echo $row345['ans'];?></p>
                            </div>
                        </div>


        <?php } ?>







                    </div>

              


            </div>

        </div>
    </div>
</section>



<script>
    var accItem = document.getElementsByClassName('accordionItem');
    var accHD = document.getElementsByClassName('accordionItemHeading');
    for (i = 0; i < accHD.length; i++) {
        accHD[i].addEventListener('click', toggleItem, false);
    }

    function toggleItem() {
        var itemClass = this.parentNode.className;
        for (i = 0; i < accItem.length; i++) {
            accItem[i].className = 'accordionItem close1';
        }
        if (itemClass == 'accordionItem close1') {
            this.parentNode.className = 'accordionItem open';
        }
    }
</script>



<?php 
 

include('footer.php');

?>