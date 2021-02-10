<?php 
require "database/Db_Connection.php";				
	$query1="SELECT * FROM map ";
				$result1 = mysqli_query($con,$query1); 


	
							
						
include('includes/header.php'); 
include('includes/navbar.php'); 
?>
		   <!--================ Banner Area =================-->
        <section class="banner_area">
            <div class="banner_inner d-flex align-items-center">
            	<div class="overlay bg-parallax" ></div>
				<div class="container">
					<div class="banner_content text-center">
						<h2 class="wow fadeInUp" data-wow-delay=".2s" style="color:#fdce1b;margin-top:115px;">Our Organization</h2>
						<div class="page_link wow fadeInUp" data-wow-delay=".2s">
							<a class="wow fadeInUp" data-wow-delay=".10s"  href="#" style="color:#fdce1b;">Home>></a>
							<a class="wow fadeInUp" data-wow-delay=".12s" style="color:#fff;" href="#">Organization</a>
						</div>
					</div>
				</div>
            </div>
        </section>
     
      
        <!--================Organization Details =================-->
         
            <div class="container">
			
			<div style="float:right; margin-top:70px;">

				
			<?php 
				echo'
              <iframe class="wow fadeInUp" data-wow-delay="2.30s" src="https://www.google.com/maps/d/u/3/embed?mid=1avs6R8d4ot6DyU8geM6cL_kv2U8MuA6T" width="640" height="480"></iframe>';

				?>
		
            </div>
			
                <div class="row">
					<h3  class="wow fadeInUp" data-wow-delay=".3s" style="font-size: 1.6rem;margin-top:30px;     background-color: #609513 !important;color: #fff;width: 250px;text-align: center;"><span class="fresh" >Organization List</span></h2>
				<?php 
					
					require "database/Db_Connection.php";
					
					$result = $con->query("SELECT * FROM organization ");
				
						$delay=.1;
						while($row1 = $result->fetch_assoc()) {		
						$delay+=.2;
						$id=$row1['organization_id'];								
						$title=$row1['organization_name'];
								  						
					echo '								
					    <div class="col-md-12 event_details wow fadeInUp" data-wow-delay="'.$delay.'s">
                        <a  href="organization_details.php?id='.$id.'"><h2 style="font-size: 1.1233rem;" >'.$title.'</h2></a>
                       
                       
                    </div>';
						
			
					
						}
					
					?>
                </div>
                </div>        
<br><br><br><br><br><br><br><br><br><br>
<br><br><br><br><br><br><br><br><br><br>

    
<?php 
include('includes/footer.php');
?>	
        
       
	