
<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
?>
		
		
		   <!--================ Banner Area =================-->
        <section class="banner_area">
            <div class="banner_inner d-flex align-items-center">
            	<div class="overlay bg-parallax" ></div>
				<div class="container">
					<div class="banner_content text-center">
						<h2 class="wow fadeInUp" data-wow-delay=".2s" style="color:#fdce1b;margin-top:115px;">Blog</h2>
						<div class="page_link wow fadeInUp" data-wow-delay=".2s">
							<a href="#" style="color:#fdce1b;">Home>></a>
							<a style="color:#fff;" href="#">Blog</a>
						</div>
					</div>
				</div>
            </div>
        </section>
        <!--================Contact Area =================-->
    
		<!-- BLOG -->
	<div id="blog" class="section">
		<!-- container -->
		<div class="container">
		<div class="container">
					 <div class="main_title">
        			<h2 class="wow fadeInUp" data-wow-delay=".2s">Our Blog</h2>
					</div>
			<!-- row -->
			<div class="row" >
			
				<!-- section title -->
				
				<!-- /section title -->

				<!-- blog -->
				
				  <?php 
					
					require "database/Db_Connection.php";
					
					$result1 = $con->query("SELECT * FROM news LIMIT 6");
					 $count=0;
					$delay=.1;
					if($result1->num_rows) {
						
						while($row1 = $result1->fetch_assoc()) {
							$publish=$row1['publish'];
							if($publish==1){
							 $count++;
							$id1=$row1['news_id'];												
							$title=$row1['news_title'];
							$details=$row1['news_detail'];
                            $date=$row1['created_date'];						
							$image=$row1['image'];
							$status=$row1['status'];
							$id=$row1['user_id'];
							$date=date('F j, Y, g:i a ',strtotime($date));
						   $result2 = $con->query("SELECT * FROM user where user_id='$id'");
						  
					
					    if($result2->num_rows) {
						
						while($row2 = $result2->fetch_assoc()) {
							$user_name=$row2['user_name'];
							
							
						}
						}
							if($status=="Approve")
							{
								$delay+=.3;
							
							echo '
							<br>
							<div class="col-md-4 wow fadeInUp" data-wow-delay="'.$delay.'s" style="box-shadow: 0 4px 14px 0px rgba(221, 221, 221, 0.85);margin-top: 20px;">
					<div class="article" class="blog-content aos-init aos-animate" data-aos="fade-right" data-aos-delay="200">
						<div class="article-img">
							<a href="single_blog.php?id='.$id1.'">
								<img style="height:170px;" class="img-fluid rounded" class="d-block w-100" src="image/'.$image.'">
							</a>
						</div>
							
							<div class="article-content">
							<h3 class="article-title"><a href="single
							_blog.php?id='.$id1.'">'.$title.'</a></h3>
							<ul class="article-meta">
								<li style="color:brown ;">'.$date.'</li>
								<br>
								<li style="color: deeppink;">By '.$user_name.'</li>';
								 $c=0;
											
										
										require('database/Db_Connection.php');
										$query="select * from comment where news_id='$id1' AND publish=1";
										$res=mysqli_query($con,$query);
											
										while($row=mysqli_fetch_assoc($res))
											{
												
													$c++;
											}
										
											echo'
										
								
								<li style="color: blueviolet;"> '.$c.' Comments</li>
							</ul>
							<p>';?> <?php echo strip_tags(substr($details,0,238)) ;echo'<a href="single_blog.php?id='.$id1.'" style="color:blue;text-decoration:underline;" id="read_more"> Read More...</a></p>';?>
				 <?php echo'
						</div>
					</div>
			
								</div>';
						  
						}}
						
						
						
					}}
						
						
						
						
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
	
    
	