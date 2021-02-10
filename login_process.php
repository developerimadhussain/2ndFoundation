<?php session_start();

require('database/Db_Connection.php');
	
	if(!empty($_POST))
	{
		$msg="";
		if(empty($_POST['email']))
			
		{
			$msg[]="Email field empty";
		}
		
		if(empty($_POST['password']))
		{
			$msg[]="Password field empty........";
		}
		
		
		if(!empty($msg))
		{
			echo '<b>Error:-</b><br>';
			
			foreach($msg as $k)
			{
				echo '<li>'.$k;
			}
		}
		else
		{
			$email=$_POST['email'];
			
			$query1="select * from admin where user_email='$email'";
			$query2="select * from user where user_email='$email'";
			
			$result1=mysqli_query($con,$query1) or die("wrong query");
			$result2=mysqli_query($con,$query2) or die("wrong query");
			
			$row1=mysqli_fetch_assoc($result1);
			$row2=mysqli_fetch_assoc($result2);
			if(!empty($row1))
			{
				if($_POST['password']==$row1['password'] && $_POST['email']==$row1['user_email'])
				{	
			        $type="admin";
					$_SESSION['valid'] = true;
                    $_SESSION['timeout'] = time();
					$_SESSION['username']=$row1['user_name'];
					$_SESSION['email']=$row1['user_email'];
					$_SESSION['password']=$row1['password'];
					$_SESSION['type'] = $type;
					header("location:Admin/index.php?page=0");		
        
      			
			    }
				else
				{
					echo 'Incorrect Password or Email....';
				}
			}
			elseif(!empty($row2))
			{
				if($_POST['password']==$row2['password'] && $_POST['email']==$row2['user_email'])
				{
					$date=$row2['created_date'];
					if($row2['verified']==1){
					
					$type="volunteer";
					$_SESSION['valid'] = true;
                    $_SESSION['timeout'] = time();
					$_SESSION['username']=$row2['user_name'];
					$_SESSION['user_id']=$row2['user_id'];
					$_SESSION['email']=$row2['user_email'];
					$_SESSION['password']=$row2['password'];
					$_SESSION['type'] = $type;
					header("location:Volunteer/index.php?page=0");
						
					}
					else
					{
						echo 'Your account not activated,created on ';echo$date; echo' Please verify your account';
						
					}
					
				}
				
				else
				{
					echo 'Incorrect Password or Email....';
				}
			}
			
			else
			{
				echo 'Invalid User';
			}
		}
	
	}
	else
	{
		header("location:index.html");
	}
			
?>