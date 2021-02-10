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
						<h2 class="wow fadeInUp" data-wow-delay=".2s" style="color:#fdce1b;margin-top:115px;">Donate</h2>
						<div class="page_link wow fadeInUp" data-wow-delay=".6s">
							<a  href="#" style="color:#fdce1b;">Home>></a>
							<a  class="wow fadeInUp" data-wow-delay=".10s" style="color:#fff;" href="#">Donate</a>
						</div>
					</div>
				</div>
            </div>
        </section>
		
	
		<div  style="background:aliceblue;" >
			<!-- container -->
				<div class=" wow fadeInUp" data-wow-delay=".2s">
						 <h2 style="text-align:center;color:orange;margin-top:50px; margin-left:30px;margin-bottom:20px;"class="wow fadeInUp" data-wow-delay=".2s">Donation Information</h2>
									
					<div class="row">
		<form action="donor_info.php" method="post">
			<div style="margin-left:510px;">
			<div class="form-group">
			
			<div class=" wow fadeInUp" data-wow-delay=".2s">
			
			<label >How much would you like to donate?</label>
			</div>
			<div class=" wow fadeInUp" data-wow-delay=".2s">
			<label  id="miglad_amount"></label>
			 Reason given for stop? <br>
			<div class="radio-inline selected " style="float:left; margin-right:40px;">
			<label  style="background-color:#eeeeee;border: 1px solid #b0b0b0;">
			<input id="rb1" type="radio" value="1000" name="amount" >
			<span >৳</span>1,000<span ></span><span ></span>
			</label>
			</div>
			<div class="radio-inline  " style="float:left; margin-right:40px;">
			<label  style="background-color:#eeeeee;border: 1px solid #b0b0b0;">
			<input id="rb2" type="radio" value="2000" name="amount" >
			<span >৳</span>2,000<span></span><span ></span>
			</label>
			</div>
			<div class="radio-inline" style="float:left;  margin-right:40px;">
			<label style="background-color:#eeeeee;border: 1px solid #b0b0b0;">
			<input  id="rb3" type="radio" value="5000" name="amount">
			<span >৳</span>5,000<span ></span><span class=""></span>
			</label>
			</div>
			<div class="radio-inline  " style="float:left;  margin-right:40px;">
			<label style="background-color:#eeeeee;border: 1px solid #b0b0b0;">
			<input id="rb4" type="radio" value="10000" name="amount" >
			<span >৳</span>10,000<span></span><span class=""></span>
			</label>
			</div>
			<div class="radio-inline">Or</div>
			<div class="radio-inline" style="padding-top: 20px;">
			<label style="background-color:#eeeeee;border: 1px solid #b0b0b0;">
			<input id="rb5" type="radio" value="" name="amount1" >
			Custom Amount (৳) <input id="rb5" type="text" name="amount1" >
			</label> 
			</div>
			</div>
			</div>
			<div class="form-group">
			<div class=" wow fadeInUp" data-wow-delay=".2s">
			<label class="mg_control-label  mg_campaign-switcher">Would you like to donate for this Organization?</label>
			</div>
			<div>
			<label style="display:none" ></label>
			<select id ="organization_name" name="organization_name" >
			<option selected value="Select Donation Type">Select Organization</option>
			<?php 
					
					    require "database/Db_Connection.php";
					
				    	$result = $con->query("SELECT * FROM organization ");
				
						
						while($row1 = $result->fetch_assoc()) {																$id=$row1['organization_id'];											
							$title=$row1['organization_name'];
							echo'
                           
							
							<option >'.$title.'</option>';
						}
						
						?>
								<option>Others</option>

			</select>
			</div>
			<div><div style="padding-top: 15px;">
			<button class=" uddonatebtn btn theme-btn"  name="next">Donate Now »</button>
			</div></div>
		
			</div>
<!--Payment Methood Image onclick="fn1()"-->
<div  class="wow fadeInUp" data-wow-delay=".2s">
<p>We Accept</p>
   <ul style="list-style:none;">
       <li style="float:left;  margin-right:40px;"><img style="width: 70px;
    height: 59px;" src="image/bkash.png" alt="bkash"></li>
	    <li style="float:left;  margin-right:40px;"><img style="width: 70px;
    height: 59px;" src="image/roket.png" alt="roket"></li>
		 <li style="float:left;  margin-right:40px;"><img style="width: 70px;
    height: 59px;" src="image/skril.png" alt="skrill"></li>
	
		  
   </ul>
   
</div><!--End of Payment Methood Image-->

			</div>
			
			</form>		 
				
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div> 
	</br>
	</br>
	   
	<!-- <script type="text/javascript">
	
	function fn1()
	{
		var rb1=document.getElementById("rb1");
		var rb2=document.getElementById("rb2");
		var rb3=document.getElementById("rb3");
		var rb4=document.getElementById("rb4");
		var rb5=document.getElementById("rb5");
		var organization_name=document.getElementById("organization_name");
		
		if(ganization_name.selected==true)
			alert(ganization_name.value);
		if(rb1.checked==true)
			alert(rb1.value);
		else if(rb2.checked==true)
			alert(rb2.value);	
		else if(rb3.checked==true)
			alert(rb3.value);
		else if(rb4.checked==true)
			alert(rb4.value); 
        else if(rb5.checked==true)
			alert(rb5.value);		
		
	}
	</script> -->
	  
	   	<?php 
include('includes/footer.php');
?>	
	