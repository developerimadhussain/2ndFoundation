<?php
require('database/Db_Connection.php');
  $news_id=$_GET['id'];
  $user_id=$_GET['user_id'];
  $status="Pending";


	if(!empty($_POST))
	{
    $name= $_POST['name'];
    $message = $_POST['message'];
	$email= $_POST['email'];
	
	
    if ((strlen($name) == 0) || (strlen($message) == 0) ||(strlen($email) == 0)){
        echo '<script language="javascript">';
        echo 'alert("Please fill all the fields")';
        echo '</script>';
    }
						
			  
			  else {
		
		
		$query = 'INSERT INTO comment (user_id,news_id,name,email,message,status) VALUES ("'.$user_id.'","'.$news_id.'","'.$name.'","'.$email.'","'.$message.'","'.$status.'")';
			mysqli_query($con,$query);
           header("location:single_blog.php?p=1&id=".$news_id);
        }
		
		 
       
      
    }
	

?>