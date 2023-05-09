<!-- header -->
<?php
    session_start();
    if(!isset($_SESSION['username']))
    {
        header("Location: index.php");
    }
    include('header.php');
?>

    <!-- bradcam_area_start -->
    <div class="bradcam_area breadcam_bg_2">
        <h3>Get in Touch</h3>
    </div>
    <!-- bradcam_area_end -->

    <!-- ================ contact section start ================= -->
    <section class="contact-section">
            <div class="container">
    
                <div class="row">
                    <div class="col-12">
                        <h2 class="contact-title">Get in Touch</h2>
                    </div>
                    <div class="col-lg-8">
                       <form action="feedback.php" method="POST" class="form-contact contact_form">
                       <div class="row">
                        <div class="col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control valid border border-dark" name="name" id="name" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'" placeholder="Enter your name">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <input class="form-control border border-dark valid" name="email" id="email" type="email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" placeholder="Email">
                                    </div>
                                </div>
                                </div>
                                <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <input class="form-control border border-dark" name="subject" id="subject" type="text" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Subject'" placeholder="Enter Subject">
                                    </div>
                                </div>
                                </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <textarea class=" border border-dark form-control w-100" name="message" id="message" cols="30" rows="9"  placeholder="Enter Message"></textarea>
                                    </div>
                                </div>
                            </div>
                            <!-- <input type="submit" name="send_feedback"> -->
                            <div class="form-group mt-3">
                                <input type="submit" value="SEND" class="button-contactForm boxed-btn" name="send_feedback">
                            </div>
                       </form>
                    </div>
                    <div class="col-lg-3 offset-lg-1">
                        <div class="media contact-info">
                            <span class="contact-info__icon"><i class="ti-home"></i></span>
                            <div class="media-body">
                                <h3>Buttonwood, California.</h3>
                                <p>Rosemead, CA 91770</p>
                            </div>
                        </div>
                        <div class="media contact-info">
                            <span class="contact-info__icon"><i class="ti-tablet"></i></span>
                            <div class="media-body">
                                <h3>+1 253 565 2365</h3>
                                <p>Mon to Fri 9am to 6pm</p>
                            </div>
                        </div>
                        <div class="media contact-info">
                            <span class="contact-info__icon"><i class="ti-email"></i></span>
                            <div class="media-body">
                                <h3>support@colorlib.com</h3>
                                <p>Send us your query anytime!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <!-- ================ contact section end ================= -->
    <!-- footer -->
   <?php
    include('footer.php');
   ?>