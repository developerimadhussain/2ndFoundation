 <?php			
include('includes/header.php'); 
include('includes/navbar.php'); 
include('includes/sidebar.php');

 
?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2 class="page-header" style="color:deeppink" >EVENT LIST</h2>
                <div class="block">   

  <?php if(isset($_GET['del'])){
		$id=$_GET['del'];
	    require('database/Db_Connection.php');
        mysqli_query($con,"DELETE FROM event WHERE event_id='".$id."'") or die("can't Execute...");
      
		echo'
	<div style="width:300px;">
  <h2><li style="color:green; ">Successfully! Event Deleted</li></h2>
</div></br>';

	}
	if(isset($_GET['publish'])){
		$publish=$_GET['publish'];
		$id=$_GET['event_id'];
	    require('database/Db_Connection.php');
        mysqli_query($con,"Update  event set publish='$publish' WHERE event_id='".$id."'") or die("can't Execute...");
      
		echo'
	<div style="width:300px;">
  <h2><li style="color:green; ">Successfully! Event Published</li></h2>
</div>
';

	}
	?>    
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr >
                                    <th  style="text-align: center; padding:0px; ">SL.NO.</th>
                                    <th  style="text-align: center; padding:0px; ">Event Title</th>
									<th style="text-align: center;  padding:0px; ">Event Detail</th>
									<th style="text-align: center;  padding:0px; ">Location</th>
                                    <th style="text-align: center;  padding:0px; ">Event Start <br>Date & Time</th>    
                                     <th style="text-align: center; padding:0px; ">Image</th>									
                                     <th style="text-align: center; padding:0px; ">Status</th>									
                                    <th style="text-align: center;  padding:0px;">Delete Event</th>
                                    <th style="text-align: center;  padding:0px;">Update Event</th>
                                    <th style="text-align: center;  padding:0px;">Publish</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
								 $user_id=$_GET['user_id'];
                                $sql = "select * from event where user_id='$user_id=' ORDER BY event_id DESC";
                                $result = mysqli_query($con,$sql);

                                $response = array();
                                $count = 0;

                                while($row = mysqli_fetch_array($result))
                                {
									 $count++;
									?>
                                  
								   <tr>
				 				 
				<td align="center" style="width:150px;"><?php  echo $count;"<br>";?></td>
				<td align="center" style="width:150px;"><?php  echo $row[2]."<br>";?></td>
				<td align="center" style="width:150px;"><?php echo  strip_tags(substr($row[3],0,70)) ; echo '....'?></td>
				<td align="center" style="width:150px;"><?php  echo $row[4]."<br>";?></td>
				<td align="center" style="width:150px;"><?php  echo date('F j, Y, g:i A',strtotime($row[5]));?></td>
				<td align="center"><img src="<?php echo 'image/'.$row[7];?>" height="100px" width="150px"></td>
				<td align="center" style="width:150px;"><?php  echo $row[6]."<br>";?></td>
				
			
				<td align="center" style="width:150px;">
				
				<a onclick="show_confirm(<?php  echo $row['event_id'];?>,<?php  echo $row['user_id'];?>)"><button type="button" class="button_delete">Delete </button></a>
				
				</td>
				<td align="center" style="width:150px;">
				
					<a href="event_update.php?event_id=<?php echo $row[0];?>&user_id=<?php echo $user_id;?>"><button type="button" class="update_button">Update </button></a>
				
				</td>
				<td style="text-align: center; ">
				<?php if( $row[6]=='Pending'){
					?>
					
			
				<a ><button type="button" class="btn btn-primary disabled " >Publish </button></a>
				<?php
				}
				 else{
					 if($row['publish']==1)
					 {
					
						?>
							<p  align="center" style="width:150px;">Publish</p>
					<?php
					 }
					 else
					 {
                        ?>					
						
					<a onclick="show_confirm1(<?php  echo $row['event_id'];?>,<?php  echo $row['user_id'];?>)"><button type="button" class="btn btn-primary active">Publish </button></a>
				<?php
				 }}
				 ?>
					</td>
				
				</tr>
								
							<?php	
                            }

                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
       
                </div>
           
        <div class="clear">
        </div>
    </div>
    <div class="clear">
    </div>
	<script type="text/JavaScript" language="JavaScript">

 function show_confirm($id,$user_id){
var c=confirm("Do you want to delete this event");
if(c==true)
{
window.location.href='event_list.php?user_id='+$user_id+'&del='+$id+'';
return true;
}
}
function show_confirm1($id,$user_id){
var c=confirm("Do you want to publish this event");
if(c==true)
{
window.location.href='event_list.php?user_id='+$user_id+'&event_id='+$id+'&publish=1';
return true;
}
}


</script>
    <?php	 
include('includes/footer.php'); 
?>

</body>
</html>
