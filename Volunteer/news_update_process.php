<?php
require('database/Db_Connection.php');
$news_id=$_GET['news_id'];
$user_id=$_GET['user_id'];
	if(!empty($_POST))
	{
    $title= $_POST['title'];
    $detail = $_POST['detail'];
	$image=$_FILES['img']['name'];
	date_default_timezone_set('Asia/Dhaka');
	$date=date('F j, Y, g:i A', time() - (3*3600));
	
    if ((strlen($title) == 0) || (strlen($detail) == 0) ) {
        	header("location:news_update.php?news_id=$news_id&user_id=$user_id&alt=1");
    }
						
			  
			  else {    
			 
        if($image){

            $query = "update  news  set news_title='$title',news_detail='$detail',image='$image',created_date='$date' where news_id='$news_id'";

		}
		else
			  $query = "update  news  set news_title='$title',news_detail='$detail',created_date='$date' where news_id='$news_id'";
			
            mysqli_query($con,$query);
			move_uploaded_file($_FILES['img']['tmp_name'],"image/".$_FILES['img']['name']);
            header("location:news_update.php?news_id=$news_id&ok=7&user_id=$user_id");
        }
		 
		
		
		
			  }
       
    
	

?>