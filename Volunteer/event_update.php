<?php			
include('includes/header.php'); 
include('includes/navbar.php'); 
include('includes/sidebar.php');

 
?>
        <div class="grid_10">
		
            <div class="box round first grid">
              <h2 class="page-header" style="color: deeppink;">
                      UPDATE EVENT
                    </h2>
                <div class="block">               
          
	
	
	         	<?php 
		if(isset($_GET['ok'])){
		echo'
	<div style="width:300px;">
  <h2><li style="color:green; ">Successfully! Event Updated</li></h2>
</div>';
	}
	elseif(isset($_GET['alt'])){
		if($_GET['alt']==1)
	echo'<div style="width:300px;" >
  <h2><li style="color:blue;">Please full fill all the fields</li></h2>
</div>';

 
	}
	

    
    if(isset($_SESSION['valid'])==True){?>
 
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                 
                   
				
              <form class="com-mail" action="event_update_process.php?event_id=<?php echo $_GET['event_id'];?>&user_id=<?php echo $_GET['user_id'];?>" method="POST" enctype="multipart/form-data">
			    <?php
						require('database/Db_Connection.php');
							$event_id=$_GET['event_id'];
							$query = "SELECT * FROM event WHERE event_id='$event_id'";
						       $result = mysqli_query($con,$query);								
								   if($row = mysqli_fetch_array($result))
                                      {
										   $title=$row['title'];
										   $detail=$row['details'];
										   $location=$row['location'];
										   $detail=$row['details'];
										   $date=$row['date'];
									
									
									  }?>
                        <div class="form-group">
                            <label>Event Title :</label>
                            <input name="title" class="form-control" placeholder="Event Title" value="<?php echo $title;?>">
                        </div>
						<div class="form-group">
                            <label>Event Start Date & Time:</label>
                            <input type="datetime-local "value="<?php echo $date;?>" name="date" class="form-control" >
                        </div>
						<div class="form-group">
                            <label>Event Location :</label>
                            <input name="location" class="form-control" placeholder="Place,District" value="<?php echo $location;?>">
                        </div>
                        <div class="form-group">
                            <label>Event Detail :</label>
                            <textarea name="detail" id="detail" required="required" class="form-control" rows="15"><?php echo $detail;?></textarea>
                        </div>   
                     

                       <div class="form-group">
						<label for="exampleFormControlFile1">Add Photo</label>
						<input type="file" class="form-control-file" name="img" id="img">
					  </div>

                    
                     <input type="submit" class="btn btn-danger" value="Update">
                    </form>

                </div>
                
            </div>

    <?php
}
?>
</div>
</div>
</div>
</div>
<div class="clear">
        </div>
    </div>
    <div class="clear">
    </div>
    <?php	 
include('includes/footer.php'); 
?>

</body>
</html>



