<?php
require('database/Db_Connection.php');
	if(!empty($_POST))
	{
	$msg="";
    $username= $_POST['username'];
    $email= $_POST['email'];
    $password= $_POST['password'];
    $confirmpassword= $_POST['confirmpassword'];
    if ((strlen($username) == 0) || (strlen($email) == 0)|| (strlen($password) == 0) || (strlen($confirmpassword) == 0) ) {
        /* echo '<script language="javascript">';
        echo 'alert("Please fill all the fields")';
        echo '</script>'; */
		$msg.="<li>Please full fill all requirement";
		
    }
     if($confirmpassword!=$password){
			/*   echo '<script language="javascript">';
              echo 'alert("Password not matching")';
              echo '</script>'; */
			  $msg.="<li>Password not matching";
		}
		if($msg!="")
		{
			header("location:add_admin.php?error=".$msg);
		}
				
			  else {
        $query = "SELECT * FROM admin WHERE user_name='$username'";
        $result = mysqli_query($con,$query);      
        $count = mysqli_num_rows($result);    
        if ($count==0) {

         
		 $query1 ='INSERT INTO admin(user_name,user_email,password) VALUES ("'.$username.'","'.$email.'","'.$password.'")';
			
			 mysqli_query($con,$query1)or die("cannot execute query");
			 #header("location:register.php?ok=1");
			 header("location:add_admin.php?ok=1");
        }
        else {
           
			$msg.="<li>Sorry this username and email already exists.";
			header("location:add_admin.php?error=".$msg);
	
        }
    }
	}

?>