<?php
require('database/Db_Connection.php');
$event_id=$_GET['event_id'];
$user_id=$_GET['user_id'];
	if(!empty($_POST))
	{
    $title= $_POST['title'];
    $detail = $_POST['detail'];
    $location = $_POST['location'];
    $date = $_POST['date'];
	$image=$_FILES['img']['name'];
	
    if ((strlen($title) == 0) || (strlen($detail) == 0) || (strlen($location) == 0) || (strlen($date) == 0)) {
       	header("location:event_update.php?event_id=$event_id&user_id=$user_id&alt=1");
    }
						
			  
			  else { 
       		  
        if($image){

            $query = "update  event  set title='$title',details='$detail',location='$location',date='$date',image='$image' where event_id='$event_id'";

		}
		else
			   $query = "update  event  set title='$title',details='$detail',location='$location',date='$date' where event_id='$event_id'";
			
            mysqli_query($con,$query);
			move_uploaded_file($_FILES['img']['tmp_name'],"image/".$_FILES['img']['name']);
           	header("location:event_update.php?event_id=$event_id&user_id=$user_id&ok=1");
			  }
			  
			  }
       
    
	

?>