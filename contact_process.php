<?php
require('database/Db_Connection.php');
	if(!empty($_POST))
	{
    $name= $_POST['name'];
    $email= $_POST['email'];
    $subject= $_POST['subject'];
    $message = $_POST['message'];
	
	
    if ((strlen($name) == 0) || (strlen($email) == 0) || (strlen($subject) == 0)|| (strlen($message) == 0)) {
        echo '<script language="javascript">';
        echo 'alert("Please fill all the fields")';
        echo '</script>';
    }
						
			  
			  else {
            $query = 'INSERT INTO contact (name,email,subject,message) VALUES ("'.$name.'","'.$email.'","'.$subject.'","'.$message.'")';

            mysqli_query($con,$query);
			
            header("location:success.php?page=2");
        }
        
    }
	

?>