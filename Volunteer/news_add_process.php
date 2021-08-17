<?php
require('database/Db_Connection.php');
$user_id=$_GET['user_id'];
	if(!empty($_POST))
	{
    $title= $_POST['title'];
    $detail = $_POST['detail'];
	$image=$_FILES['img']['name'];
	date_default_timezone_set('Asia/Dhaka');
	$date=date('F j, Y, g:i A', time() - (3*3600));
	$status="Pending";
	
    if ((strlen($title) == 0) || (strlen($detail) == 0) ) {
		header("location:add_news.php?user_id=$user_id&alt=1");
    }
						
			  
			  else {
        $query = "SELECT * FROM news WHERE news_title='$title'";
        $result = mysqli_query($con,$query);      
        $count = mysqli_num_rows($result);    
        if ($count==0) {

            $query = 'INSERT INTO news(user_id,news_title,news_detail,status,image,created_date) VALUES ("'.$user_id.'","'.$title.'","'.$detail.'","'.$status.'","'.$image.'","'.$date.'")';

            mysqli_query($con,$query);
			move_uploaded_file($_FILES['img']['tmp_name'],"image/".$_FILES['img']['name']);
            header("location:add_news.php?user_id=$user_id&ok=1");
        }
        else {
           header("location:add_news.php?user_id=$user_id&alt=2");
        }
    }
	}

?>