<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>2nd Foundation</title>
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="css/animate.min.css">		
    </head>
    <body style="background:aliceblue;">
     
 
        <!--================Header Menu Area =================-->
        <header class="header_area">
           	<div class="top_menu row m0">
           		<div class="container">
					<div class="float-left">
						<ul class="list header_social wow fadeInUp" data-wow-delay=".2s">
							<li class="wow fadeInUp" data-wow-delay=".2s"><a href="#"  style="color:#fff;font-size: medium;"><i class="fa fa-phone"></i>+8801729365292</a></li>
							<li class="wow fadeInUp" data-wow-delay=".2s"><a href="#" style="color: #fff;font-size: medium;"><i class="fa fa-envelope"></i>
								2ndfoundationim@gmail.com
							</a></li>
							
						</ul>
						
						
					</div>
					<div class="float-right wow fadeInUp" data-wow-delay=".2s">
					       <?php
								if(session_start()){
									 if(isset($_SESSION['valid'])==True && ($_SESSION['type'])=="volunteer")
									           {            
											echo '
											<a class="wow fadeInUp" data-wow-delay=".2s" style="color:greenyellow;padding:10px;">Welcome '.$_SESSION['username'].'!</a>
											<a class="login_btn" href="volunteer/index.php?page=0"<i class="flaticon-padlock"></i>Dashboard</a>
											<a class="login_btn" href="logout.php"><i class="flaticon-padlock"></i>Logout</a>
											
										
												';

												}
									else if(isset($_SESSION['valid'])==True && ($_SESSION['type'])=="admin")
									           {            
											echo '
											<a style="color:greenyellow;padding:10px;">Welcome '.$_SESSION['username'].'!</a>
											<a class="login_btn" href="Admin/index.php"<i class="flaticon-padlock"></i>Dashboard</a>
											<a class="login_btn" href="logout.php"><i class="flaticon-padlock"></i>Logout</a>
											
										
												';

												}
									else{
										echo '
					
											<a class="login_btn" href="login.php"<i class="flaticon-padlock"></i>Login</a>
											<a class="donate_btn" href="donate.php">Donate Now</a>
												';
					 
								        }	
								}
													 
							?>

					</div>
           		</div>	
           	</div>	