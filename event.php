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
						<h2 class="wow fadeInUp" data-wow-delay=".2s"  style="color:#fdce1b;margin-top:115px;"> Events</h2>
						<div class="page_link wow fadeInUp" data-wow-delay=".2s" >
							<a class="wow fadeInUp" data-wow-delay=".2s"  href="#" style="color:#fdce1b;">Home>></a>
							<a  class="wow fadeInUp" data-wow-delay=".2s"  style="color:#fff;" href="#">Events</a>
						</div>
					</div>
				</div>
            </div>
        </section>
     
      
       
        
        
        <!--================Event Blog Area=================-->
        <section class="event_blog_area section_gap">
            <div class="container">
                <div class="row event_two">
				 <?php 
					
					require "database/Db_Connection.php";
					
					$result1 = $con->query("SELECT * FROM event LIMIT 6");
					 $count=0;
					$delay=.1;
					if($result1->num_rows) {
						
						while($row1 = $result1->fetch_assoc()) {
							$publish=$row1['publish'];
							if($publish==1){
							$delay+=.3;
							$id=$row1['event_id'];												
							$title=$row1['title'];
							$details=$row1['details'];
                            $date=$row1['date'];						
							$image=$row1['image'];	
							$date=date('F j, Y, g:i a ',strtotime($date));							
							$location=$row1['location'];
							if ($count>6)
								break;
						else
						{
							echo '
							 <div class="col-lg-4 col-sm-6 wow fadeInUp" data-wow-delay="'.$delay.'s">
                        <div class="event_post">
						<a>
							<img class="wow fadeInUp" data-wow-delay=".2s" src="image/'.$image.'" alt="">
							</a>
						   <a href="event_details.php?id='.$id.'"><h2 class="event_title wow fadeInUp" data-wow-delay=".2s" >'.$title.'</h2></a>
                            <ul class="event_date_location">
                                <li class="wow fadeInUp" data-wow-delay=".2s"  id="list" ><i class="fa fa-clock-o" id="icon" ></i>'.$date.'</li>
                                
                                <li class="wow fadeInUp" data-wow-delay=".2s"  id="list"><i class="fa fa-map-marker"  id="icon"></i>'.$location.'</li>
                            </ul>
                           <a href="event_details.php?id='.$id.'" class="btn_details">View Details</a>
						   
						          
                    </div>
                 
                   
                </div>';
							}}
				
				
				
                       
						  
								}
						
						
						
					}
						
						
						
						
						?>
				
				
				
				
				
                   
                        
                   
            </div>
            </div>
        </section>
		<br>	
		<br>
		
    <?php 
include('includes/footer.php');
?>	   
	