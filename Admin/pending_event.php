<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
?>


<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">PENDING EVENT LIST
           
    </h6>
	</br>
	<?php if(isset($_GET['del'])){
		$id=$_GET['del'];
	    require('database/Db_Connection.php');
        mysqli_query($con,"DELETE FROM event WHERE event_id='".$id."'") or die("can't Execute...");
      
		echo'
	<div class="alert alert-danger alert-dismissible fade show" role="alert" style="width:330px; float:right;">
  <strong>Successfully!</strong> event Deleted.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
	
  </button>
</div>';
	}
	elseif(isset($_GET['ok'])){
		$id=$_GET['ok'];
	    require('database/Db_Connection.php');
        mysqli_query($con,"Update event set status='Approve'  WHERE event_id='".$id."'") or die("can't Execute...");
      
		echo'
	<div class="alert alert-danger alert-dismissible fade show" role="alert" style="width:330px; float:right;">
  <strong>Successfully!</strong> event Approved.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
	
  </button>
</div>';
	}
?>
  </div>

  <div class="card-body">

    <div class="table-responsive">

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr class="text-center">
             <th style="padding-bottom:55px;"> ID </th>
             <th style="padding-bottom:33px;">Event Title</th>
			 <th style="padding-bottom:30px;">Event Detail</th>
			 <th style="padding-bottom: 55px;">Author</th> 
			 <th style="padding-bottom: 55px;" >Location</th>
			 <th style="padding-bottom:30px;">Organization </br> Name</th>
			 <th style="padding-top:35px;">Event Start <br>Date & Time</th>    
			 <th style="padding-bottom: 55px;">Status</th>
			 <th style="padding-bottom: 55px;">Image</th>									                           
			 <th style="padding-bottom: 55px; width:70px;">Action</th>                                    						      
          </tr>
        </thead>
        <tbody>
     <?php
			                   	require('database/Db_Connection.php');
                                $sql = "select * from event ORDER BY date DESC";

                                $result = mysqli_query($con,$sql);

                                $response = array();
                                $count = 0;

                                while($row = mysqli_fetch_array($result))
                                {
									$status=$row['status'];
									if($status=="Pending")
									{
									 $count++;
									$id=$row['user_id'];
						   $result2 = $con->query("SELECT * FROM user where user_id='$id'");
					       if($result2->num_rows) {
						
						while($row2 = $result2->fetch_assoc()) {
							$user_name=$row2['user_name'];
							$organization_name=$row2['organization_name'];
							
						}
						}
									
									?>
                                  
				<tr style="color:black;">
				<td><?php  echo $count."<br>";?></td>
				<td align="center" style="width:150px;"> <?php  echo $row[2]."<br>";?></td>
				<td ><?php echo  strip_tags(substr($row[3],0,30)) ; echo '....'?></td>
					<td><?php  echo $user_name;?></td>
					<td><?php  echo $row[4];?></td>
					<td><?php  echo $organization_name;?></td>
					<td ><?php  echo $row[5];?></td>
					<td ><?php  echo $row[6];?></td>
					<td > <img  src="<?php echo 'image/'.$row[7];?>" height="80px" width="102px"></td>
				    <td style="width:170px;">
					<img onclick="show_confirm(<?php  echo $row['event_id'];?>)" src="image/del.png"height="40px" width="42px" ></a>
					<a href="view.php?value=3&id=<?php echo $row[0];?>"><img src="image/view3.png"height="40px" width="42px" ></a>
					<img onclick="show1_confirm(<?php  echo $row['event_id'];?>)" src="image/approve.png"height="40px" width="42px" ></a>
				<?php
				}
					
					?>
				
				</td>
				</tr>
								
							<?php	
								}
 $count++;
                            ?>
                        </tbody>
                    </table>
          

    </div>
  </div>
</div>

</div>
<!-- /.container-fluid -->
<script type="text/JavaScript" language="JavaScript">

 function show_confirm($id){
var c=confirm("Do you want to delete this event");
if(c==true)
{
window.location.href='pending_event.php?del='+$id+'';
return true;
}
}
function show1_confirm($id){
var c=confirm("Do you want to Approve this event");
if(c==true)
{
window.location.href='pending_event.php?ok='+$id+'';
return true;
}
}

</script>


<?php
include('includes/scripts.php');
include('includes/footer.php');
?>