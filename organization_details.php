
 <?php 

require "database/Db_Connection.php";
					$organization_id=$_GET['id'];
	$query1="SELECT * FROM organization WHERE organization_id='$organization_id'";
	$query2="SELECT * FROM map ";
				$result1 = mysqli_query($con,$query1); 
				$result2 = mysqli_query($con,$query2); 
				
						if($row1 = $result1->fetch_assoc()) {
							$id=$row1['organization_id'];												
							$title=$row1['organization_name'];
							$location=$row1['location'];
							$mobile=$row1['mobile'];
							$contact_person=$row1['contact_person'];
							$target_audience=$row1['target_audience'];														
							$details=$row1['detail'];			
							$image=$row1['image'];		  	
							$map_link=$row1['map_link'];
						}
						/* if($row2 = $result2->fetch_assoc()) {
							$map_link=$row2['map_link'];
							
						} */
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
							<a style="color:#fff;" href="#">Organization Details</a>
						</div>
					</div>
				</div>
            </div>
        </section>
     
      
        <!--================Organization Details =================-->

            <div class="container wow fadeInUp" data-wow-delay="2.32s">
			<div style="float:right;margin-top:500px;">
				
			<?php 
				echo'
              <iframe src="'.$map_link.'" width="640" height="480"></iframe>';
              

				?>
				<br>
				<br>
				
            </div>
                <div style="margin-top:40px;" class="row">
				<?php 
					
					  						
					echo '
                    <div class="col-md-8 wow fadeInUp" data-wow-delay=".2s">
                      <img style="width:600px;height:400px;" src="image/'.$image.'">
                    </div>
                    <div class="col-md-12 event_details wow fadeInUp" data-wow-delay=".2s">
                        <a class="wow fadeInUp" data-wow-delay=".2s" href="#"><h2 class="event_title">'.$title.'</h2></a>
                        <p class="wow fadeInUp" data-wow-delay=".2s">'.$details.'</p>
						<h6 class="wow fadeInUp" data-wow-delay=".2s" style="color:blue;">Contact_person: '.$contact_person .'</h6>
						<h6 class="wow fadeInUp" data-wow-delay=".2s" style="color:blue;">Mobile: '.$mobile.'</h6>
						<h6 class="wow fadeInUp" data-wow-delay=".2s" style="color:blue;">Location: '.$location.'</h6>
						<h6 class="wow fadeInUp" data-wow-delay=".2s" style="color:blue;"> Target_audience: '.$target_audience.'</h6>
						
                       
                    </div>';
					
						
					
					?>
                </div>
            </div>
       
		<br>
		<br>
       
	   <br>
		<br> 
	   <br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
        
    <?php 
include('includes/footer.php');
?>	
	

    
	
     