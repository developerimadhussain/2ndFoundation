<?php
require('database/Db_Connection.php');
	if(!empty($_POST))
	{
		$msg="";
    $user_id= $_GET['id'];
    $username= $_POST['username'];
    $email= $_POST['email'];
    $password= $_POST['password'];
    $confirmpassword= $_POST['confirmpassword'];
    if ((strlen($username) == 0) || (strlen($email) == 0)|| (strlen($password) == 0) || (strlen($confirmpassword) == 0) ) {
       
		$msg.="<li>Please full fill all requirement";
		
    }
	 if($confirmpassword!=$password){
			
		$msg.="<li>Password not matching";
		}
	if($msg!="")
	{
		header("location:add_admin.php?error=".$msg);
	}
				
	 else {
        
         
		 $query1 ="UPDATE admin set user_name ='$username',user_email='$email',password='$password' WHERE user_id='$user_id'";
			
			 mysqli_query($con,$query1)or die("cannot execute query");
			 header("location:admin_profile.php?ed=1");
        }
       
    }
	

?>