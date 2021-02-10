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
			header("location:registration.php?error=".$msg);
		}
		else
		{
				
			$donor_name=mysqli_real_escape_string($con,$_POST['name']);	       				
			$email=mysqli_real_escape_string($con,$_POST['email']);
			$gender=mysqli_real_escape_string($con,$_POST['gender']);
			$mobile=mysqli_real_escape_string($con,$_POST['mobile']);
			$district=mysqli_real_escape_string($con,$_POST['district']);
			$address=mysqli_real_escape_string($con,$_POST['address']);
		    $sql = "SELECT * FROM donor WHERE email='$email' LIMIT 1";
			$result1 = mysqli_query($con, $sql);
            if (mysqli_num_rows($result1) > 0) {
            header("location:donor_info.php?msg=".$msg);$msg.="<li>Email already exists";
			
            }

			else{
			 date_default_timezone_set('Asia/Dhaka');
			 #$date=date('F j, Y, g:i A', time() - (3*3600));
			 $date=date('F j, Y, g:i A', time() - (0));		 			
			echo $donor_name;
				echo $email;
				echo $gender;
				echo $mobile;
				echo $district;
				echo $address;
				echo $date;
			$query1 ='INSERT INTO donor(donor_id,name,email,mobile,gender,district,address) VALUES ("'.$donor_name.'","'.$email.'","'.$mobile.'","'.$gender.'","'.$district.'","'.$address.'")';
            $result1=mysqli_query($con,$query1);
			if($result1){
							echo 'ok' ; 
			}
			else
			{
				 die("Can't Execute Query...");
				
			}
			
			
			
		}}
    }
	else
	{
		header("location:donor_info.php");
	}
?>