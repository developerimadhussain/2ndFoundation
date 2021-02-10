<?php 

require "database/Db_Connection.php";
					$news_id=$_GET['id'];
				$query="SELECT * FROM news WHERE news_id='$news_id'";
				$result = mysqli_query($con,$query); 
						if($row1 = $result->fetch_assoc()) {															
							$id=$row1['news_id'];												
							$title=$row1['news_title'];
							$details=$row1['news_detail'];
                            $date=$row1['created_date'];						
							$image=$row1['image'];
							$user_id=$row1['user_id'];
							$date=date('F j, Y, g:i a',strtotime($date));
						   $result2 = $con->query("SELECT * FROM user where user_id='$id'");
						  
					
					    if($result2->num_rows) {
						
						while($row2 = $result2->fetch_assoc()) {
							$user_name=$row2['user_name'];
							
							
						}
						}
						}

include('includes/header.php'); 
include('includes/navbar.php'); 
?>
		
		   <!--================ Banner Area =================-->
        <section class="banner_area">
            <div class="banner_inner d-flex align-items-center">
            	<div class="overlay bg-parallax" ></div>
				<div class="container">
					<div class="banner_content text-center">
						<h2 class="wow fadeInUp" data-wow-delay=".2s" style="color:#fdce1b;margin-top:115px;"><?php  echo$title;?></h2>
						<div class="page_link wow fadeInUp" data-wow-delay=".2s">
							<a class="wow fadeInUp" data-wow-delay=".2s" href="#" style="color:#fdce1b;">Home>></a>
							<a class="wow fadeInUp" data-wow-delay=".2s" style="color:#fff;" href="#">Single Blog</a>
						</div>
					</div>
				</div>
            </div>
        </section>


	<div class="section">
	
		<div class="container">
			<div class="row">
				
<?php 

require "database/Db_Connection.php";
					$news_id=$_GET['id'];
				$query="SELECT * FROM news WHERE news_id='$news_id'";
				$result = mysqli_query($con,$query); 
						$delay=.1;
						if($row1 = $result->fetch_assoc()) {			
						 $delay+=.2;												
							$news_id=$row1['news_id'];												
							$title=$row1['news_title'];
							$details=$row1['news_detail'];
                            $date=$row1['created_date'];						
							$image=$row1['image'];
							$date=date('F j, Y, g:i a',strtotime($date));
							$id=$row1['user_id'];
						   $result2 = $con->query("SELECT * FROM user where user_id='$id'");
						  
					
					    if($result2->num_rows) {
						
						while($row2 = $result2->fetch_assoc()) {
							$user_name=$row2['user_name'];
							$user_id=$row2['user_id'];
							
						}
						}
							
															
							echo '
					<main id="main" class="col-md-9 wow fadeInUp" data-wow-delay="'.$delay.'s">
					<div class="article">
				
						<div class="article-img wow fadeInUp" data-wow-delay=".2s" >
							<img src="image/'.$image.'" alt="">
						</div>
						<div class="article-content">			
							<h2 class="article-title wow fadeInUp" data-wow-delay=".2s"   style="color:blue">'.$title.'</h2>
							<ul class="article-meta">
								<li class="wow fadeInUp" data-wow-delay=".2s"  style="color:brown ;">'.$date.'</li>
							
								<li class="wow fadeInUp" data-wow-delay=".2s" style="color: deeppink;">By '.$user_name.'</li>';
								 $c=0;
											
										
										require('database/Db_Connection.php');
										$query="select * from comment where news_id='$news_id' AND publish=1";
										$res=mysqli_query($con,$query);
											
										while($row=mysqli_fetch_assoc($res))
											{
												
													$c++;
											}
										
											echo'
										
								
								<li class="wow fadeInUp" data-wow-delay=".2s"  style="color: blueviolet;"> '.$c.' Comments</li>
							</ul>

							<p class="wow fadeInUp" data-wow-delay=".2s" >'.$details.'</p>
							
								';
								
						}
								?>
						</div>
						
						<div class="article-comments wow fadeInUp" data-wow-delay=".2s">
						<?php
											
											if(isset($_GET['p']))
											{
												echo '<font class="wow fadeInUp" data-wow-delay=".2s" color="green">Your comment  Pending for Approval</font>';
												echo '<br><br>';
											}
											
											
										?>
							<h3 class="wow fadeInUp" data-wow-delay=".2s">Comments (<?php echo $c;?>)</h3>
							
                <?php 
				require "database/Db_Connection.php";
				$query="select * from comment where news_id='$news_id'AND publish=1";
				$result = mysqli_query($con,$query); 
					$delay=.1;
						while($row1 = $result->fetch_assoc()) {				
						$delay+=.3;												
							$id=$row1['id'];												
							$name=$row1['name'];
							$email=$row1['email'];
                            $message=$row1['message'];						
							
						  
						
									
										echo'
										
										<div class="media wow fadeInUp" data-wow-delay="'.$delay.'s">
								<div class="media-left">
									
								</div>
								<div class="media-body wow fadeInUp" data-wow-delay=".2s">
									<div class="media-heading">
													
										<h4 style="color:cadetblue;">'.$name.'</h4>
										<span class="time">2 min ago</span>
										<a href="#reply" class="reply">Reply</a>
									</div>
									<p>'.$message.'</p>
									
										
								</div>

							
							</div>
									';
									
						}
									
									?>
									
									
								
							
						</div>
					

						<!-- article reply form -->
						<div id="reply" class="article-reply">
							<h3 class="wow fadeInUp" data-wow-delay=".12s">Leave a Comment</h3>
							 <div class="row">
                    
                    <div class="col-lg-12 wow fadeInUp" data-wow-delay=".2s">
                        <form class="row contact_form" action="comment_process.php?id=<?php echo $_GET['id'];?>&user_id=<?php echo $user_id;?>" method="post" id="contactForm" novalidate="novalidate">
                            <div class="col-md-6">
                                <div class="form-group">
                                     <label>Name *</label>
									 
                            <input type="text" name="name" class="form-control" required="required">
                                </div>
                               <div class="form-group">
                            <label>Email *</label>
                            <input type="email" name="email" class="form-control" required="required">
                        </div>
						 
                            </div>
                            <div class="col-md-6">
                               
                        <div class="form-group">
                            <label>Message *</label>
                            <textarea name="message" id="message" required="required" class="form-control" rows="10"></textarea>
                        </div>      
                            </div>
                            <div class="col-md-12 text-right">
                                <button type="submit" value="submit" class="btn submit_btn">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
				             	
						</div>
						<!-- /article reply form -->
					</div>
					<!-- /article -->
				</main>
			

				<!-- ASIDE -->
				<aside id="aside" class="col-md-3">
				

				
					<div class="widget">
						<h3 class="widget-title wow fadeInUp" data-wow-delay=".2s">Latest News</h3>
						<!-- single post -->
						 <?php 
					
					require "database/Db_Connection.php";
						$status="Approve";
					$result1 = $con->query("SELECT * FROM news where status='$status' ORDER BY created_date DESC LIMIT 6");
					 $count=0;
					$delay=.1;
					if($result1->num_rows) {
						
						while($row1 = $result1->fetch_assoc()) {
							$delay+=.3;
							 $count++;
							$id1=$row1['news_id'];												
							$title=$row1['news_title'];
							$details=$row1['news_detail'];
                            $date=$row1['created_date'];						
							$image=$row1['image'];
							$id=$row1['user_id'];
							$date=date('F j, Y ',strtotime($date));
						   $result2 = $con->query("SELECT * FROM user where user_id='$id'");
						  
					
					    if($result2->num_rows) {
						
						while($row2 = $result2->fetch_assoc()) {
							$user_name=$row2['user_name'];
							
						}
						}
						
						
						echo'
							
						<div class="widget-post wow fadeInUp" data-wow-delay="'.$delay.'s">
							<a href="single_blog.php?id='.$id1.'">
								<div class="widget-img wow fadeInUp" data-wow-delay=".2s" >
									<img src="./image/'.$image.'" alt="">
								</div>
								<div class="widget-content wow fadeInUp" data-wow-delay=".2s" >
									'.$title.'
								</div>
							</a>
							<ul class="article-meta">
								<li class="wow fadeInUp" data-wow-delay=".2s" style="color: deeppink;"> By  '.$user_name.'  </li>
								
								<li class="wow fadeInUp" data-wow-delay=".2s"  style="color: blue;">'.$date.'</li>
							</ul>
						</div>';
						
						}
					}
					?>
						
					</div>
					
				</aside>
				
			</div>
			
		</div>
		
	</div>
	<?php 
include('includes/footer.php');
?>	
	
	