<?php 

require "database/Db_Connection.php";
					$id=$_GET['id'];
				$query="SELECT * FROM causes WHERE id='$id'";
				$result = mysqli_query($con,$query); 
				
						if($row1 = $result->fetch_assoc()) {															
							$id=$row1['id'];												
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
						}
include('includes/header.php'); 
include('includes/navbar.php'); 
?>
		   <!--================ Banner Area =================-->
        <section class="banner_area">
            <div class="banner_inner d-flex align-items-center">
            	<div class="overlay bg-parallax" ></div>
				<div class="container">
					<div class="banner_content text-center wow fadeInUp" data-wow-delay=".2s">
						<h2 style="color:#fdce1b;margin-top:115px;"><?php  echo$title;?></h2>
						<div class="page_link wow fadeInUp" data-wow-delay=".2s">
							<a href="#" style="color:#fdce1b;">Home>></a>
							<a style="color:#fff;" href="#">Single Causes</a>
						</div>
					</div>
				</div>
            </div>
        </section>


	<div class="section">
	
		<div class="container">
			<div class="row">
<?php 

							
															
							echo '
					<main id="main" class="col-md-9 wow fadeInUp" data-wow-delay=".2s">
					<div class="article">
				
						<div class="article-img wow fadeInUp" data-wow-delay=".2s">
							<img src="image/'.$image.'" alt="">
						</div>
						<div class="article-content">			
							<h2 class="article-title wow fadeInUp" data-wow-delay=".2s"  style="color:blue">'.$title.'</h2>
							<ul class="article-meta wow fadeInUp" data-wow-delay=".2s">
								<li  class="wow fadeInUp" data-wow-delay=".2s" style="color:brown ;">'.$date.'</li>
							
								<li class="wow fadeInUp" data-wow-delay=".2s" style="color: deeppink;">By '.$user_name.'</li>
								 
							</ul>

							<p class="wow fadeInUp" data-wow-delay=".2s">'.$details.'</p>
							
								';
								
						
								?>
						</div>
						
						

						<!-- /article reply form -->
					</div>
					<!-- /article -->
				</main>
			

				<!-- ASIDE -->
				<aside id="aside" class="col-md-3">
				

				
					<div class="widget wow fadeInUp" data-wow-delay=".2s">
						<h3 class="widget-title wow fadeInUp" data-wow-delay=".2s">Latest Causes</h3>
						<!-- single post -->
						 <?php 
					
					require "database/Db_Connection.php";
					$status="Approve";
					
					$result1 = $con->query("SELECT * FROM causes where status='$status' ORDER BY created_date DESC LIMIT 6");
					 $count=0;
					$delay=.1;
					if($result1->num_rows) {
						
						while($row1 = $result1->fetch_assoc()) {
							
							 $count++;
							$id1=$row1['id'];	
							$delay+=.3;											
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
						
						
						echo'
							
						<div class="widget-post wow fadeInUp" data-wow-delay="'.$delay.'s">
							<a href="#">
								<div class="widget-img">
									<img src="./image/'.$image.'" alt="">
								</div>
								<div class="widget-content">
									'.$title.'
								</div>
							</a>
							<ul class="article-meta">
								<li style="color: deeppink;"> By '.$user_name.'  </li>
								
								<li style="color: blue;">'.$date.'</li>
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
	
	
	