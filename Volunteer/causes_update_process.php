<?php
require('database/Db_Connection.php');
$causes_id=$_GET['causes_id'];
$user_id=$_GET['user_id'];
	if(!empty($_POST))
	{
    $title= $_POST['title'];
    $detail = $_POST['detail'];
	$image=$_FILES['img']['name'];
	date_default_timezone_set('Asia/Dhaka');
	$date=date('F j, Y, g:i A', time() - (3*3600));
	
    if ((strlen($title) == 0) || (strlen($detail) == 0) ) {
          	header("location:causes_update.php?causes_id=$causes_id&user_id=$user_id&alt=1");
    }
						
			  
			  else { 
        				  
        if($image){

            $query = "update  causes  set title='$title',detail='$detail',image='$image',created_date='$date' where id='$causes_id'";

		}
		else
			  $query = "update  causes  set title='$title',detail='$detail',created_date='$date' where id='$causes_id'";
			
            mysqli_query($con,$query);
			move_uploaded_file($_FILES['img']['tmp_name'],"image/".$_FILES['img']['name']);
				header("location:causes_update.php?causes_id=$causes_id&user_id=$user_id&ok=1");
			
		}
		
        }
       
   
	

?>