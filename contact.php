<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
?>

		
        <!--================Contact Area =================-->
        <section class="contact_area p_120 wow fadeInUp" data-wow-delay=".2s">
		<section id="google_map">
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2541112.0220195246!2d89.9753810107516!3d25.126121906297197!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x375054d3d270329f%3A0xf58ef93431f67382!2sSylhet!5e0!3m2!1sen!2sbd!4v1562436483782!5m2!1sen!2sbd" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
 
 </section>
            <div class="container">
			
<div class="main_title wow fadeInUp" data-wow-delay=".2s">
        			<h2>LEAVE US A MESSAGE</h2>
        			
        		</div>  
                <div class="row">
                    
                    <div class="col-lg-12 wow fadeInUp" data-wow-delay=".2s">
                        <form class="row contact_form" action="contact_process.php" method="post" id="contactForm" novalidate="novalidate">
                            <div class="col-md-6">
                                <div class="form-group">
                                     <label>Name *</label>
									 
                            <input type="text" name="name" class="form-control" required="required">
                                </div>
                               <div class="form-group">
                            <label>Email *</label>
                            <input type="email" name="email" class="form-control" required="required">
                        </div>
						  <div class="form-group">
                            <label>Subject *</label>
                            <input type="text" name="subject" class="form-control" required="required">
                        </div>
                            </div>
                            <div class="col-md-6">
                               
                        <div class="form-group">
                            <label>Message *</label>
                            <textarea name="message" id="message" required="required" class="form-control" rows="10"></textarea>
                        </div>      
                            </div>
                            <div class="col-md-12 text-right wow fadeInUp" data-wow-delay=".2s">
                                <button type="submit" value="submit" class="btn submit_btn">Send Message</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
			<br>
			<br>
        </section>

	<?php 
include('includes/footer.php');
?>	
	