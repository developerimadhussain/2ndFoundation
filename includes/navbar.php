   <div class="main_menu">
            	<nav class="navbar navbar-expand-lg navbar-light">
					<div class="container wow fadeInUp" data-wow-delay=".2s">
						<a class="title wow fadeInUp" href="#"id="title">2nd Foundation</a>
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<div class="collapse navbar-collapse offset" id="navbarSupportedContent">
							<ul class="nav navbar-nav menu_nav ml-auto">
								<li class="nav-item active"><a class="nav-link" href="index.php">Home</a></li> 
								<li class="nav-item"><a class="nav-link" href="gallery.php">Gallery</a></li>
							
								<li class="nav-item"><a class="nav-link" href="organization.php" >Our Organization</a></li>
									 <?php
								
									 if(isset($_SESSION['valid'])==False)
									           {     
											echo'										   
							
										<li class="nav-item submenu dropdown">
											<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Join Us</a>
											<ul class="dropdown-menu">
												<li class="nav-item"><a class="nav-link" href="registration.php" >Volunteer</a></li>
												<li class="nav-item"><a class="nav-link" href="#">Donor</a></li>
											</ul>
										</li> ';
											   }
											   
										?>
								
								
							<li class="nav-item"><a class="nav-link" href="blog.php">Blog</a></li>
	                   <li class="nav-item"><a class="nav-link" href="event.php">Events</a></li>


								<li class="nav-item "><a class="nav-link" href="contact.php">Contact</a></li>								
								<li class="nav-item submenu dropdown">
									<a href="about.php" class="nav-link dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">About</a>
									
								</li> 
							</ul>
							<ul class="nav navbar-nav navbar-right">
								<li class="nav-item"><a href="#" class="search"><i class="lnr lnr-magnifier"></i></a></li>
							</ul>
						</div> 
					</div>
            	</nav>
            </div>
        </header>