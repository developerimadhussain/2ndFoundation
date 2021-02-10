<?php
	require('database/Db_Connection.php');
	
	if(!empty($_POST))
	{
		$msg="";
		
		if(empty($_POST['orgname'])||empty($_POST['name'])|| empty($_POST['email']) || empty($_POST['password']) || empty($_POST['dist'])||empty($_POST['mobile'])||empty($_POST['address']))
		{
			$msg.="<li>Please full fill all requirement";
		}
		
		
		
		if(strlen($_POST['password'])>15)
		{
			$msg.="<li>Please Enter Your Password in limited Format....";
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
			$organization_name=mysqli_real_escape_string($con,$_POST['orgname']);	
			$user_name=mysqli_real_escape_string($con,$_POST['name']);	       				
			$email=mysqli_real_escape_string($con,$_POST['email']);
			$password=mysqli_real_escape_string($con,$_POST['password']);
			$mobile=mysqli_real_escape_string($con,$_POST['mobile']);
			$district=mysqli_real_escape_string($con,$_POST['dist']);
			$address=mysqli_real_escape_string($con,$_POST['address']);
		    $sql = "SELECT * FROM user WHERE email='$email' LIMIT 1";
			$result1 = mysqli_query($con, $sql);
            if (mysqli_num_rows($result1) > 0) {
            header("location:registration.php?msg=".$msg);$msg.="<li>Email already exists";
			
            }

			else{
		     //$password=md5($password);
			/*  $token="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890
			 !*()$";
			 $vkey-str_shuffle($token); */
			 $vkey=md5(time().$user_name);
			 $date=date(DATE_RFC822);
			 
				
			 $query="INSERT INTO `user`(`user_id`, `user_name`, `user_email`,`password`,`organization_name`,  `user_mobile`, `user_address`, `district`, `verified`, `vkey`,`created_date`) VALUES (' ' ,'$user_name','$email','$password','$organization_name','$mobile','$address','$district',0,'$vkey','$date')";
			$result=mysqli_query($con,$query);
			if($result){
				$url='http://'.$_SERVER['SERVER_NAME'].'/2ndFoundation/verify.php?vkey='.$vkey;
			$output=' Thank for registering.Please click this link complete this registration. '.$url.'';
			$mailto=$email;
			require 'PHPMailer/PHPMailerAutoload.php';
			$mail = new PHPMailer;

			$mail->isSMTP();                            
			$mail->Host = 'smtp.gmail.com';            
			$mail->SMTPAuth = true;                     
			$mail->Username = '2ndfoundationim@gmail.com';          
			$mail->Password = '2ndfoundation2019'; 
			$mail->SMTPSecure = 'tls';               
			$mail->Port = 587;  
			$mail ->SetFrom("2ndfoundationim@gmail.com");
			$mail ->Subject = 'Registration Confirmation';
		    $mail ->Body =$output;
			$mail ->AddAddress($mailto);

						   if(!$mail->Send())
						   {
							   $error.="<li>wrong";
							
								header("location:registration.php?error=".$error);
							   
							
						   }
						   else
						   {
							  $msg.="<li>Your registration have Successfull .Please verify your account!";
							  header("location:registration.php?msg=".$msg);
						   }	
			}
			else
			{
				 die("Can't Execute Query...");
				
			}
			
			
			
		}}
    }
	else
	{
		header("location:index.php");
	}
?>