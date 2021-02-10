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
						<h2 class="wow fadeInUp" data-wow-delay=".2s" style="color:#fdce1b;margin-top:115px;">Our Gallery</h2>
						<div class="page_link wow fadeInUp" data-wow-delay=".6s">
							<a  href="#" style="color:#fdce1b;">Home>></a>
							<a  class="wow fadeInUp" data-wow-delay=".10s" style="color:#fff;" href="#">Gallery</a>
						</div>
					</div>
				</div>
            </div>
        </section>
     
      
       
        
        
        <!--================Gallery=================-->
            <div class="container">
                <div class="row event_two">
				 <?php 

                   require "database/Db_Connection.php";					
	               $query="SELECT * FROM news";
				   $result = mysqli_query($con,$query); 
					$delay=.1;
						while($row1 = $result->fetch_assoc()) {		
							$image=$row1['image'];	
						
							$delay+=.3;
							     
						
                  echo'  <div class="col-lg-4 col-sm-6 wow fadeInUp" data-wow-delay="'.$delay.'s">
                    
                           <div class="event_post">	
                         
              <div> <a href="./image/'.$image.'" data-rel="prettyPhoto" class="media-box"> <img src="./image/'.$image.'"alt=""> </a> </div>
           
                   
                    </div> 
                    </div> ';
					}
						?>
				
               
                </div>
            </div>
    
		<br>	
		<br>
	<?php 
include('includes/footer.php');
?>	
	