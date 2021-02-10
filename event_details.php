
 <?php 

require "database/Db_Connection.php";
					$event_id=$_GET['id'];
				$query="SELECT * FROM event WHERE event_id='$event_id'";
				$result = mysqli_query($con,$query); 
				
						if($row = $result->fetch_assoc()) {															
							$id=$row['event_id'];												
							$title=$row['title'];
							$details=$row['details'];
                            $date=$row['date'];	
							$date=date('F j, Y, g:i a ',strtotime($date));							
							$image=$row['image'];							
							$location=$row['location'];
							
							
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
						<h2 style="color:#fdce1b;margin-top:115px;"><?php echo$title ;?></h2>
						<div class="page_link wow fadeInUp" data-wow-delay=".2s">
							<a href="#" style="color:#fdce1b;">Home>></a>
							<a style="color:#fff;" href="#">Event Details</a>
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
					<main id="main" class="col-md-9">
					<div class="article">
				
						<div class="article-img wow fadeInUp" data-wow-delay=".2s">
							<img src="image/'.$image.'" alt="">
						</div>
						<div class="article-content">			
							<h2 class="article-title wow fadeInUp" data-wow-delay=".2s"  style="color:blue">'.$title.'</h2>
							</br>
							<li id="list" ><i class="fa fa-clock-o wow fadeInUp" data-wow-delay=".2s"id="icon" ></i>'.$date.'</li>
                                
                            <li id="list"><i class="fa fa-map-marker wow fadeInUp" data-wow-delay=".2s"  id="icon"></i>'.$location.'</li>
								</br>
								
						

							<p class="wow fadeInUp" data-wow-delay=".2s">'.$details.'</p>
							
								';
								
						
								?>
						</div>



						</div>
				
				</main>

      
  
		
				<!-- ASIDE -->
				<aside id="aside" class="col-md-3">
				

				
					<div class="widget wow fadeInUp" data-wow-delay=".2s">
						<h3 class="widget-title wow fadeInUp" data-wow-delay=".2s">Upcoming Event</h3>
					
						 <?php 
					
					require "database/Db_Connection.php";
					$status="Approve";
					
					$result1 = $con->query("SELECT * FROM event where status='$status' ORDER BY date DESC LIMIT 3");
					if($result1->num_rows) {
						$delay=.1;
						while($row1 = $result1->fetch_assoc()) {
							$id1=$row1['event_id'];	
							$delay+=.3;												
							$title=$row1['title'];
							$details=$row1['details'];
                            $date=$row1['date'];						
							$image=$row1['image'];
							$id=$row1['user_id'];
							$date=date('F j, Y ',strtotime($date));
							$date1=date(DATE_RFC822);
					        $date1=date('F j, Y ',strtotime($date1));
	 
			           if($date>$date1)
					   {
						echo'
							
						<div class="widget-post  wow fadeInUp" data-wow-delay="'.$delay.'s">
							<a href="event_details.php?id='.$id1.'">
								<div class="widget-img">
									<img src="./image/'.$image.'" alt="">
								</div>
								<div class="widget-content">
									'.$title.'
								</div>
							</a>
							<li id="list" ><i class="fa fa-clock-o" id="icon" ></i>'.$date.'</li>
                                
                            <li id="list"><i class="fa fa-map-marker"  id="icon"></i>'.$location.'</li>
								</br>
							
							
						</div>';
						
						}
					}}
					?>
						
					</div>
					
				</aside>
				
		
                </div>
				
            </div>
            </div>
       
     <?php 
include('includes/footer.php');
?>	   
    

        
