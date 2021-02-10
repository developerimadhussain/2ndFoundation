<?php
require('database/Db_Connection.php');
	
	if(!empty($_POST))
	{
		$msg="";
		
		if(empty($_POST['name'])|| empty($_POST['email']) || empty($_POST['gender']) || empty($_POST['district'])||empty($_POST['mobile'])||empty($_POST['address']))
		{
			$msg.="<li>Please full fill all requirement";
		}
		if(is_numeric($_POST['name']))
		{
			$msg.="<li>Name must be in String Format...";
		}
		
		
		if($msg!="")
		{
			header("location:donor_info.php?error=".$msg);
		}

            $organization_name=$_GET['organization_name'];
		    $amount=$_GET['amount'];
			$donor_name=mysqli_real_escape_string($con,$_POST['name']);	       				
			$email=mysqli_real_escape_string($con,$_POST['email']);
			$gender=mysqli_real_escape_string($con,$_POST['gender']);
			$mobile=mysqli_real_escape_string($con,$_POST['mobile']);
			$district=mysqli_real_escape_string($con,$_POST['district']);
			$address=mysqli_real_escape_string($con,$_POST['address']);
	       /*  echo $donor_name;
	        echo $email;
	        echo $gender;
	        echo $mobile;
	        echo $district;
	        echo $address; */
	}
/* PHP */
$post_data = array();
$post_data['store_id'] = "2ndfo5e2423b1e19a8";
$post_data['store_passwd'] = "2ndfo5e2423b1e19a8@ssl";
$post_data['total_amount'] =$_GET["amount"];
$post_data['currency'] = "BDT";
$post_data['tran_id'] = "SSLCZ_TEST_".uniqid();
$post_data['success_url'] = "http://www.imadhussain.com/2ndFoundation/success.php?donor_name=$donor_name&email=$email&gender=$gender&mobile=$mobile&district=$district&address=$address&organization_name=$organization_name";
$post_data['fail_url'] = "http://www.imadhussain.com/2ndFoundation/fail.php";
$post_data['cancel_url'] = "http://www.imadhussain.com/2ndFoundation/cancel.php";
# $post_data['multi_card_name'] = "mastercard,visacard,amexcard";  # DISABLE TO DISPLAY ALL AVAILABLE

# EMI INFO
$post_data['emi_option'] = "1";
$post_data['emi_max_inst_option'] = "9";
$post_data['emi_selected_inst'] = "9";

# CUSTOMER INFORMATION
$post_data['cus_name'] = $donor_name;
$post_data['cus_email'] = $email;
$post_data['cus_add1'] = $address;
$post_data['cus_add2'] = "Dhaka";
$post_data['cus_city'] = $district;
$post_data['cus_state'] = "Dhaka";
$post_data['cus_postcode'] = "1000";
$post_data['cus_country'] ="Bangladesh";
$post_data['cus_phone'] = $mobile;
$post_data['cus_fax'] = "01711111111";

# SHIPMENT INFORMATION
$post_data['ship_name'] = "test2ndfo2cvg";
$post_data['ship_add1 '] = "Sylhet";
$post_data['ship_add2'] = "Dhaka";
$post_data['ship_city'] = "Dhaka";
$post_data['ship_state'] = "Dhaka";
$post_data['ship_postcode'] = "1000";
$post_data['ship_country'] = "Bangladesh";

# OPTIONAL PARAMETERS
$post_data['value_a'] = "ref001";
$post_data['value_b '] = "ref002";
$post_data['value_c'] = "ref003";
$post_data['value_d'] = "ref004";

# CART PARAMETERS
$post_data['cart'] = json_encode(array(
    array("product"=>"DHK TO BRS AC A1","amount"=>"200.00"),
    array("product"=>"DHK TO BRS AC A2","amount"=>"200.00"),
    array("product"=>"DHK TO BRS AC A3","amount"=>"200.00"),
    array("product"=>"DHK TO BRS AC A4","amount"=>"200.00")
));
$post_data['product_amount'] = "100";
$post_data['vat'] = "5";
$post_data['discount_amount'] = "5";
$post_data['convenience_fee'] = "3";


# REQUEST SEND TO SSLCOMMERZ
$direct_api_url = "https://sandbox.sslcommerz.com/gwprocess/v3/api.php";

$handle = curl_init();
curl_setopt($handle, CURLOPT_URL, $direct_api_url );
curl_setopt($handle, CURLOPT_TIMEOUT, 30);
curl_setopt($handle, CURLOPT_CONNECTTIMEOUT, 30);
curl_setopt($handle, CURLOPT_POST, 1 );
curl_setopt($handle, CURLOPT_POSTFIELDS, $post_data);
curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, FALSE); # KEEP IT FALSE IF YOU RUN FROM LOCAL PC


$content = curl_exec($handle );

$code = curl_getinfo($handle, CURLINFO_HTTP_CODE);

if($code == 200 && !( curl_errno($handle))) {
	curl_close( $handle);
	$sslcommerzResponse = $content;
} else {
	curl_close( $handle);
	echo "FAILED TO CONNECT WITH SSLCOMMERZ API";
	exit;
}

# PARSE THE JSON RESPONSE
$sslcz = json_decode($sslcommerzResponse, true );

if(isset($sslcz['GatewayPageURL']) && $sslcz['GatewayPageURL']!="" ) {
        # THERE ARE MANY WAYS TO REDIRECT - Javascript, Meta Tag or Php Header Redirect or Other
        # echo "<script>window.location.href = '". $sslcz['GatewayPageURL'] ."';</script>";
	echo "<meta http-equiv='refresh' content='0;url=".$sslcz['GatewayPageURL']."'>";
	# header("Location: ". $sslcz['GatewayPageURL']);
	exit;
} else {
	echo "JSON Data parsing error!";
}


?>