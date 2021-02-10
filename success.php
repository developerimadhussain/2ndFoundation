
	<?php
	#header("Refresh: 1; URL =contact.php");
include('includes/header.php'); 
include('includes/navbar.php'); 
?>


 
        <!--================FAIL=================-->
            <div class="container">
                <div style="width:100%;text-align:center;">
				 
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		<br>
		
       <div><img style="margin-left:10px; width:20%" class="wow fadeInUp" data-wow-delay=".2s" src="image/smile2.png" alt=""> 
			  <h1 class="wow fadeInUp" data-wow-delay=".2s" style="font-size: 72px;
				font-weight: bold;
				color: orange;
				margin: 0px;">Your  Transaction is Succeeded</h1>
				<br>	
		<br>
		<br>
				 <a href="index.php" class=" uddonatebtn btn theme-btn wow fadeInUp" data-wow-delay=".2s"  name="next">GO BACK »</a>
				
				</div>
           
                   
                    </div> 
                    </div> 
               
                </div>
            </div>
    
		<br>	
		<br>
		<br>
		
		
   
    
	

<?php


$val_id=urlencode($_POST['val_id']);
$store_id=urlencode("2ndfo5e2423b1e19a8");
$store_passwd=urlencode("2ndfo5e2423b1e19a8@ssl");
$requested_url = ("https://sandbox.sslcommerz.com/validator/api/validationserverAPI.php?val_id=".$val_id."&store_id=".$store_id."&store_passwd=".$store_passwd."&v=1&format=json");

$handle = curl_init();
curl_setopt($handle, CURLOPT_URL, $requested_url);
curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
curl_setopt($handle, CURLOPT_SSL_VERIFYHOST, false); # IF YOU RUN FROM LOCAL PC
curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, false); # IF YOU RUN FROM LOCAL PC

$result = curl_exec($handle);

$code = curl_getinfo($handle, CURLINFO_HTTP_CODE);

if($code == 200 && !( curl_errno($handle)))
{

	# TO CONVERT AS ARRAY
	# $result = json_decode($result, true);
	# $status = $result['status'];

	# TO CONVERT AS OBJECT
	$result = json_decode($result);

	# TRANSACTION INFO
	$status= $result->status;
	$tran_date=$result->tran_date;
	$tran_id=$result->tran_id;
	$val_id =$result->val_id;
	$amount =$result->amount;
	$store_amount = $result->store_amount;
	$bank_tran_id = $result->bank_tran_id;
	$card_type = $result->card_type;

	# EMI INFO
	$emi_instalment = $result->emi_instalment;
	$emi_amount = $result->emi_amount;
	$emi_description = $result->emi_description;
	$emi_issuer = $result->emi_issuer;

	# ISSUER INFO
	$card_no = $result->card_no;
	$card_issuer = $result->card_issuer;
	$card_brand = $result->card_brand;
	$card_issuer_country = $result->card_issuer_country;
	$card_issuer_country_code = $result->card_issuer_country_code;

	# API AUTHENTICATION
	$APIConnect = $result->APIConnect;
	$validated_on = $result->validated_on;
	$gw_version = $result->gw_version;
	
	#echo $status." ".$tran_date." ".$card_type." ".$tran_id;
	         require('database/Db_Connection.php');
			 $organization_name=$_GET['organization_name'];
				$donor_name=$_GET['donor_name'];
				$email=$_GET['email'];
				$mobile=$_GET['mobile'];
				$gender=$_GET['gender'];
				$district=$_GET['district'];
				$address=$_GET['address'];
				$donor_name;
				
	
	         	 			
			 $query="INSERT INTO `donor`(`donor_id`, `name`, `email`,`mobile`,`gender`, `district`,`address`,`date`) VALUES (' ' ,'$donor_name','$email','$mobile','$gender','$district','$address','$tran_date')";
			$result2=mysqli_query($con,$query);
			if($result2){
							   
							  #$msg.="<li>Successfull";
							  $query2= "SELECT * FROM donor WHERE email='$email'";
			                  $result2 = mysqli_query($con, $query2);
							  if($row=mysqli_fetch_assoc($result2)){
							  $donor_id=$row['donor_id'];	
                             					  
							  #header("location:donate.php?donor_id=$donor_id");
							  }
							  $query3="INSERT INTO `payment`(`donor_id`,`organization_name`,`account_type`, `amount`, `tran_id`, `status`, `tran_date`) VALUES ('$donor_id','$organization_name','$card_type','$amount','$tran_id ','$status','$tran_date')";
			                  mysqli_query($con,$query3);
							  
						   	
			}
			else
			{
				 die("Can't Execute Query...");
				
			}


} else {

	echo "Failed to connect with SSLCOMMERZ";
}
	
	
?>

<?php
include('includes/footer.php');
?>
 