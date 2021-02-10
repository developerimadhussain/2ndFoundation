<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
?>

         
		
        <!--================Home Banner Area =================-->
        <section class="home_banner_area">
            <div class="banner_inner d-flex align-items-center">
            	<div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""  
				style=" background: #15181d url(image/map-bg.png) center center/auto no-repeat local;"></div>
				<div class="container">
					<div class="banner_content text-center" class="cta-details wow fadeInRightSlow" style="visibility: visible; animation-name: fadeInRightSlow;">
						<h5 class="wow fadeInUp" data-wow-delay=".2s" >We need your Help</h5>
						<h3 class="wow fadeInUp" data-wow-delay=".4s" >Help for poor child education in Bangladesh</h3>
						<p class="wow fadeInUp" data-wow-delay=".7s"  style="font-size: 16px;color: #9da1a9;margin: 0 0 2.5em;">In spite of progress in education, many school-aged children in Bangladesh discontinue school due to poverty.<br> Many non government organization in Sylhet such as KIN School,SWAPNOTTHAN School etc.,in Chittagong such as PURBASHAR ALO ,in Rangpur such as Aparajita Alor Michhil etc.. work for poor child education.Our aim is showing there activity such as their news,events,causes and help them by manage donation.So your donation is play a important role for their. </p>
						
						
					</div>
				</div>
            </div>
            <div class="donation_area">
				<div class="container">
					<div class="row donation_inner">
						<div class="col-lg-3 wow fadeInDown" data-wow-delay=".2s" >
							<div class="dontation_item yellow">
								<div class="media">
									<div class="media-body">
									
											
										<h4>Total Organization</h4>
										
									</div>
									<div class="d-flex">
										<h3><br><br>
										<?php
									$c=0;
											
										
										require('database/Db_Connection.php');
										$query="select * from organization ";
										$res=mysqli_query($con,$query);
											
										while($row=mysqli_fetch_assoc($res))
											{
												
													$c++;
											}
											
										
										echo $c;?>
										
										</h3>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-3 wow fadeInDown" data-wow-delay=".4s">
							<div class="dontation_item pink">
								<div class="media">
									<div class="media-body">
										<h4>Total Volunteer</h4>
										
									</div>
									<div class="d-flex">
										<h3><br><br>
										<?php
									$c=0;
											
										
										require('database/Db_Connection.php');
										$query="select * from user ";
										$res=mysqli_query($con,$query);
											
										while($row=mysqli_fetch_assoc($res))
											{
												
													$c++;
											}
											
										
										echo $c;?></h3>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-3 wow fadeInDown" data-wow-delay=".6s">
							<div class="dontation_item green">
								<div class="media">
									<div class="media-body">
										<h4>Tootal Donor</h4>
										
									</div>
									<div class="d-flex">
										<h3><br><br>
										<?php
									$c=0;
											
										
										require('database/Db_Connection.php');
										$query="select * from donor ";
										$res=mysqli_query($con,$query);
											
										while($row=mysqli_fetch_assoc($res))
											{
												
													$c++;
											}
											
										
										echo $c;?></h3>
									</div>
								</div>
							</div>
						</div><div class="col-lg-3 wow fadeInDown" data-wow-delay=".8s">
							<div class="dontation_item green" style="color:pink;">
								<div class="media">
									<div class="media-body">
										<h4>Tootal Donation</h4>
										
									</div>
									<div class="d-flex">
										<h3><br><br>
										<?php
									$c=0;
											
										
										require('database/Db_Connection.php');
										$query="select amount from payment ";
										$res=mysqli_query($con,$query);
										$tk=0;	
										while($row=mysqli_fetch_assoc($res))
											{
												$tk+=$row['amount'];
													
											}
											
										
										echo $tk;?></h3>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
            </div>
        </section>
		
		 
        <!--================End Home Banner Area =================-->
        
        
<!-- CAUSESS -->
	<div id="causes" style="background:aliceblue;" class="section">
		<!-- container -->
			<div class="container">
					 <h2 style="text-align:center;color:orange;margin-top:20px;"class="causes wow fadeInUp" data-wow-delay=".2s">Our Causes</h2>
					 			
				<div class="row">

				
					
					  <?php 
					
					require "database/Db_Connection.php";
					
					$result1 = $con->query("SELECT * FROM causes LIMIT 3");
					 $count=0;
					 $delay=.0;
					if($result1->num_rows) {
						
						while($row1 = $result1->fetch_assoc()) {
							$publish=$row1['publish'];
							$status=$row1['status'];
							if($publish==1&& $status=="Approve"){
							 $count++;
							 $delay+=.3;
							$cause_id=$row1['id'];												
							$title=$row1['title'];
							$details=$row1['detail'];
                            $date=$row1['created_date'];						
							$image=$row1['image'];
							$id=$row1['user_id'];
							$result2 = $con->query("SELECT * FROM user where user_id='$id'");
							  if($result2->num_rows) {
						
						while($row2 = $result2->fetch_assoc()) {
							$user_name=$row2['user_name'];
							
						}
						}
						  
						echo '
							<div class="col-md-4 wow fadeInUp" data-wow-delay="'.$delay.'s"style="box-shadow: 0 4px 14px 0px rgba(221, 221, 221, 0.85);">
					      <div class="article ">
						<div class="article-img wow fadeInUp">
							<a href="single_blog.php?id='.$cause_id.'">
								<img style="height:170px;" class="img-fluid rounded" class="d-block w-100" src="image/'.$image.'">
							</a>
						</div>
							
							<div class="article-content">
							<h3 class="article-title wow fadeInUp"><a href="single_cause.php?id='.$cause_id.'">'.$title.'</a></h3>
							<ul class="article-meta wow fadeInUp">
								<li style="color:brown ;">'.$date.' </li>
								
								<li class="wow fadeInUp" style="color: deeppink;">By '.$user_name.'</li>';
								
										
											echo'
										
								
								
							</ul>
							<p class="wow fadeInUp">';?>
									   <?php echo strip_tags(substr($details,0,335)) ;echo'...';echo'</p>';?>
				 <?php echo'
				 <div>
						<a href="single_cause.php?id='.$cause_id.'" style="color:blue;text-decoration:underline;" id="read_more"><button class="btn btn-success"> Read More </button> </a>
			
								</div>
						</div>

					</div>
					
								</div>';
						  
								}
						
						
						
					}
					}
					
						
						
						
						?>
	
				
				
					
				
				
			
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /CAUSESS -->
	
	 <?php
								
									 if(!isset($_SESSION['valid'])==True )
									           {     
										   echo'
										   
  <!--================Feature Area =================-->
        <section class="feature_area p_120">
        	<div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
        	<div class="container">
        		<div class="title">
        			<h4 class="wow fadeInUp">JOIN OUR MISSION</h4>
        			<h2 class="wow fadeInUp" style="color:beige;">How Can You Help </h2>
					
        			
        		</div>
        		<div class="row feature_inner">
        			
        			<div class="col-lg-6 wow fadeInUp" data-wow-delay="0.4s">
        				<div class="feature_item">
        					<i class="lnr lnr-coffee-cup"></i>
        					<h4>Donate Money</h4>
        					<p>Contribute in our mission to breaking the cycle of poverty through education.</p>
							<div class=" text-center"style="margin-top: 30px;">
                                <a class="theme-btn"href="donate.php">DONATE</a>
                            </div>
        				</div>
        			</div>
        			<div class="col-lg-6 wow fadeInUp" data-wow-delay="0.8s">
        				<div class="feature_item">
        					<i class="lnr lnr-wheelchair"></i>
        					<h4>Become a Volunteer</h4>
        					<p>Join our Volunteer platform and let us rebuild the nation.</p>
							<div class=" text-center"style="margin-top: 53px;">
                                <a class="theme-btn"href="registration.php">SIGN UP</a>
                            </div>
        				</div>
        			</div>
        		</div>
        	</div>
        </section>
											   
		';
											   }
											   else
												   echo'<br><hr>';
												  
		?>
        <!--================End Feature Area =================-->
     
		<!-- BLOG -->
	<div id="blog" style="background:aliceblue;" class="section">
		<!-- container -->
		<div class="container">
		<div class="container">
					 <h2 style="text-align:center;color:orange;margin-top:20px;"class="causes wow fadeInUp" data-wow-delay="0.4s">Our News</h2>
			<!-- row -->
			<div class="row">
				<!-- section title -->
				
				<!-- /section title -->

				<!-- blog -->
				
				  <?php 
					
					require "database/Db_Connection.php";
					
					$result1 = $con->query("SELECT * FROM news LIMIT 3");
					 $count=0;
					$delay=.1;
					if($result1->num_rows) {
						
						while($row1 = $result1->fetch_assoc()) {
							$publish=$row1['publish'];
							$status=$row1['status'];
							if($publish==1&& $status=="Approve"){
							 $count++;
							 $delay+=.3;
							$news_id=$row1['news_id'];												
							$title=$row1['news_title'];
							$details=$row1['news_detail'];
                            $date=$row1['created_date'];						
							$image=$row1['image'];
							$id=$row1['user_id'];
							$date=date('F j, Y, g:i a',strtotime($date));
						   $result2 = $con->query("SELECT * FROM user where user_id='$id'");
						  
					
					    if($result2->num_rows) {
						
						while($row2 = $result2->fetch_assoc()) {
							$user_name=$row2['user_name'];
							
						}
						}
							
					       
							
							echo '
							<div class="col-md-4 wow fadeInUp" data-wow-delay="'.$delay.'s" style="box-shadow: 0 4px 14px 0px rgba(221, 221, 221, 0.85);">
					<div class="article">
						<div class="article-img">
							<a href="single_blog.php?id='.$news_id.'">
								<img style="height:170px;" class="img-fluid rounded" class="d-block w-100" src="image/'.$image.'">
							</a>
						</div>
							
							<div class="article-content">
							<h3 class="article-title wow fadeInUp"><a href="single_blog.php?id='.$news_id.'">'.$title.'</a></h3>
							<ul class="article-meta wow fadeInUp">
								<li style="color:brown ;" class="wow fadeInUp">'.$date.' </li>
								
								<li style="color: deeppink;" class="wow fadeInUp">By '.$user_name.'</li>';
								 $c=0;
											
										
										require('database/Db_Connection.php');
									$query="select * from comment where news_id='$news_id' AND publish=1";
										$res=mysqli_query($con,$query);
											
										while($row=mysqli_fetch_assoc($res))
											{
												
													$c++;
											}
										
											echo'
										
								
								<li style="color: blueviolet;"> '.$c.' Comments</li>
							</ul>
							<p class="wow fadeInUp">';?>
									   <?php echo strip_tags(substr($details,0,670)) ;echo'<a href="single_blog.php?id='.$news_id.'" style="color:blue;text-decoration:underline;" id="read_more"> Read More...</a></p>';?>
				 <?php echo'
						</div>
					</div>
			
								</div>';
						  
								}
						
						
						
					}
					}
					
						
						
						
						?>
	
				<!-- /blog -->
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	</div>
	<!-- /BLOG -->

	<?php
include('includes/footer.php');
?>
    
    
	