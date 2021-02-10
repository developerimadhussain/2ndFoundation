<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
?>	
      <section class="banner_area">
            <div class="banner_inner d-flex align-items-center">
            	<div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
				<div class="container">
					<div class="banner_content text-center wow fadeInUp" data-wow-delay=".2s">
						<h2 style="color:#fdce1b;margin-top:115px">Login</h2>
						<div class="page_link wow fadeInUp" data-wow-delay=".2s">
							<a href="#" style="color:#fdce1b;">Home </a>
							<a style="color:#fff;" href="#">>>Login</a>
						</div>
					</div>
				</div>
            </div>
        </section>
		<div class="login_form">
		<div class="container">
			<div class="main_title wow fadeInUp" data-wow-delay=".2s">
        			<h2>Login</h2>
        		</div>
			<div class="login-form wow fadeInUp" data-wow-delay=".2s">
				<form action="login_process.php" method="post">
					<div class="">
						<p> Email </p>
						<input type="text" class="name" name="email" required="" />
					</div>
					<div class="">
						<p>Password</p>
						<input type="password" class="password" name="password" required="" />
					</div>					
					<div class="login-agileits-bottom wthree">
						<h6>
							<a href="#">Forgot password?</a>
						</h6>
					</div>
					<input type="submit" value="Login">
					<div class="register-forming">
						<p>To Register New Account as a Volunteer--
							<a href="registration.php">Click Here</a>
						</p>
					</div>
				</form>
			</div>

		</div>
	</div>

	<?php 
include('includes/footer.php');
?>	
	    
	