<?php
require('database/Db_Connection.php');
$user_id=$_GET['user_id'];

	if(!empty($_POST))
	{
    $title= $_POST['title'];
    $detail = $_POST['detail'];
	$location= $_POST['location'];
	$image=$_FILES['img']['name'];
	$date =  $_POST['date'];
	$status="Pending";
	
    if ((strlen($title) == 0) || (strlen($detail) == 0) ||(strlen($location) == 0)|| (strlen($date) == 0)){
       	header("location:add_event.php?user_id=$user_id&alt=1");
    }
						
			  
			  else {
			 $query = "SELECT * FROM event WHERE title='$title'AND event_id!='$event_id'";
        $result = mysqli_query($con,$query);      
        $count = mysqli_num_rows($result);    
        if ($count==0) {
		
		 $query="INSERT INTO `event`( `user_id`, `title`,`details`, `location`, `date`,`status`,`image`) VALUES ('$user_id','$title','$detail','$location','$date','$status','$image')";
			mysqli_query($con,$query);
			
			move_uploaded_file($_FILES['img']['tmp_name'],"image/".$_FILES['img']['name']);
          	header("location:add_event.php?user_id=$user_id&ok=1");
        }
			  
	   else{
		   	header("location:add_event.php?user_id=$user_id&alt=2");
				  
		 }
			  }
		 
       
      
    }
	

?>