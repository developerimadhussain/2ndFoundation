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
						<h2 class="wow fadeInUp" data-wow-delay=".2s" style="color:#fdce1b;margin-top:115px;">DONOR INFORMATION</h2>
						<div class="page_link wow fadeInUp" data-wow-delay=".2s">
							<a href="#" style="color:#fdce1b;">Home>></a>
							<a style="color:#fff;" href="donor_info.php">DONOR</a>
						</div>
					</div>
				</div>
            </div>
        </section>
        <!--================End  Banner Area =================-->
        
        
        <!--================Volunteer Registration Form =================-->
        <section class="contact_area p_120">
		
				
<div class="registration_form">
		<div class="container">
		<div class="main_title">
        			<h2 class="wow fadeInUp" data-wow-delay=".2s">DONOR INFORMATION</h2>
        			
					
        		</div>  
				  <div id="message1" style="margin-left:350px;" >

                            <?php
											if(isset($_GET['error']))
											{
												echo '<font class="wow fadeInUp" data-wow-delay=".2s" color="green">'.$_GET['error'].'</font>';
												echo '<br><br>';
											}
											
											
											
										?>
										</div>  
			
			<div class="login-form" style=" width: 90%;">										
                <div class="row">
			   
                  	  
                    <div class="col-lg-12">
                        <form class="row contact_form" action="checkout.php?organization_name=<?php
								echo $_POST['organization_name']; ?>&amount=<?php
								echo $_POST['amount']; ?>" method="POST">                    
                            <div class="col-md-6 wow fadeInUp" data-wow-delay=".2s">
							<div class="form-group">
                        </div>
                                <div class="form-group">
                            <label>Name *</label>
                            <input type="text" name="name"  required="required" class="form-control" >
                        </div> 
                               <div class="form-group">
                            <label>Email *</label>
                            <input type="email" name="email"  class="form-control" required="required">
                        </div>
						
						
                         
                           
							<div class="form-group">
					
                            <label>Mobile *</label>
                            <input type="text" name="mobile" required="required" class="form-control" >
                        </div>
						 </div>
                            <div class="col-md-6 wow fadeInUp" data-wow-delay=".6s">                             
                        <br>
						<div class="form-group">
                            <label>Gender *</label>
                            <select  name="gender" class="form-control">
							<option selected >Select Gender</option>
							<option >Male</option>
							<option>Female</option>
							</select>
                        </div>  
						 <div class="form-group">
                            <label>District *</label>
                            <select  name="district" class="form-control">
							<option selected >Select  District</option>
							<option >Sylhet</option>
							<option>Sunamganj</option>
							<option>Moulvibazar</option>
							<option>Habiganj</option>
							<option>Rangpur</option>
							<option>Rajshahi</option>
							<option>Bogra</option>
							<option>Chittagong</option>
							<option>Comilla</option>
							<option>Dhaka</option>
							<option>Gazipur</option>
							<option>Faridpur</option>
							</select>
                        </div>  
				
                         <div class="form-group">
                            <label> Address *</label>
                            <textarea name="address"  required="required" class="form-control row-19" ></textarea>
                        </div>						
                        </div>						
                            
                            <div class="col-md-12 text-right wow fadeInUp" data-wow-delay=".15s">
                                <button class=" uddonatebtn btn theme-btn" name="next">Donate Now »</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            </div>
            </div>
            </div>
          
        </section>
     
     <?php 
include('includes/footer.php');
?>	  
	