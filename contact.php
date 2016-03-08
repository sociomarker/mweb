<?php
	$thisPage = 'contact';
    include_once "newapp/web/logincheck2.php";    
	include "header.php";
	include "menu.php";
?>
    <div class="main">
        <div class="main-inner">
            <div class="container">
                <div class="content">

    <div class="document-title">
        <h1>Contact Us</h1>

        <ul class="breadcrumb">
            <li><a href="index.php">Home</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
    </div>          <!--           /.document-title -->

<div class="row">
    <div class="col-sm-12">
        <div class="row">
						<div class="col-sm-6">
        <h3>We’d love to hear from you</h3>

        <div class="contact-form-wrapper clearfix background-white p30">
            <form class="contact-form" method="post" action="?">
                    <div class="form-group">
                        <label for="contact-form-name">Name</label>
                        <input type="text" name="name" id="contact-form-name" class="form-control">
                    </div><!-- /.form-group -->

                    <div class="form-group">
                        <label for="contact-form-subject">Subject</label>
                        <input type="text" name="subject" id="contact-form-subject" class="form-control">
                    </div><!-- /.form-group -->

                    <div class="form-group">
                        <label for="contact-form-email">E-mail</label>
                        <input type="text" name="email" id="contact-form-email" class="form-control">
                    </div><!-- /.form-group -->

                <div class="form-group">
                    <label for="contact-form-message">Message</label>
                    <textarea class="form-control" id="contact-form-message" rows="6"></textarea>
                </div><!-- /.form-group -->

                <button class="btn btn-primary pull-right">Post Message</button>
            </form><!-- /.contact-form -->
        </div><!-- /.contact-form-wrapper -->
    </div>
            <div class="col-sm-6">
                <h3>Addresses</h3>

                <p>
					<b>Powai</b><br/>
                    Office No 135, 1st Floor, Powai Plaza, Hiranandani Opposite Pizza Hut, Mumbai 400076
                </p>
				<p>
					<b>Borivali</b><br/>
                    8-B Sharma Compound, 1st Floor, Old Nagardas Road, Andheri East,Mumbai- 400069
                </p>
				<p>
					<b>Andheri</b><br/>
                    Ajanta Industrial Estate, 4th Floor, <br />Flat No.13,Gulmohar Road, Borivli West, Mumbai – 400 092.
                </p>
				<br />
				<h3>Email</h3>
                <p>
                    info@miamia.co.in
                </p>
				<br />
				<h3>Social Profiles</h3>

                <ul class="social-links nav nav-pills">
                    <li><a target='_blank' href="https://en-gb.facebook.com/people/Mia-Mia/100009912524333"><i class="fa fa-facebook"></i></a></li>
						<li><a target='_blank' href="https://www.instagram.com/miamia.co.in/"><i class="fa fa-instagram"></i></a></li>
					<!--<li><a href="#"><i class="fa fa-twitter"></i></a></li>
                    
                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                    <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                    <li><a href="#"><i class="fa fa-dribbble"></i></a></li>-->
                </ul>
            </div><!-- /.col-sm-4 -->

        </div><!-- /.row -->
    </div>

    
</div><!-- /.row -->


<?php
include "footer.php";
include "js.php";
?>
