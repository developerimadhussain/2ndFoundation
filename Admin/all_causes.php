<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
?>


<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">ALL CAUSES LIST
           
    </h6>
	</br>
	<?php if(isset($_GET['del'])){
		$id=$_GET['del'];
	    require('database/Db_Connection.php');
        mysqli_query($con,"DELETE FROM causes WHERE id='".$id."'") or die("can't Execute...");
      
		echo'
	<div class="alert alert-danger alert-dismissible fade show" role="alert" style="width:330px; float:right;">
  <strong>Successfully!</strong> causes Deleted.
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
            <th style="padding-bottom:40px;"> ID </th>
            <th style="padding-bottom:40px;">Causes Title</th>
			<th style="padding-bottom:40px;">Causes Detail</th>
	        <th style="padding-bottom:40px;">Author</th>
			<th style="padding-bottom: 17px;">Organization </br> Name</th>
            <th style="padding-bottom:40px;">Image</th>
			<th style="padding-bottom:20px;">Created Date</th>                                   
			<th style="padding-bottom:40px;"style="width: 280px;" >Action</th>     
			                                						      
          </tr>
        </thead>
        <tbody>
     <?php
			                   	require('database/Db_Connection.php');
                                $sql = "select * from causes ORDER BY created_date DESC";

                                $result = mysqli_query($con,$sql);

                                $response = array();
                                $count = 0;

                                while($row = mysqli_fetch_array($result))
                                {
									$status=$row['status'];
									if($status=="Approve")
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
				<td><?php  echo $count;"<br>";?></td>
				<td><?php  echo $row[2]."<br>";?></td>
				<td ><?php echo  strip_tags(substr($row[3],0,70)) ; echo '....'?></td>
				<td ><?php  echo $user_name;?></td>
				<td ><?php  echo $organization_name;?></td>
				<td><img src="<?php echo 'image/'.$row[5];?>" height="100px" width="150px"></td>
				<td ><?php  echo $row[6];?></td>
				<td  style="padding-top:40px; width:115px;">
				
			     <img onclick="show_confirm(<?php  echo $row['id'];?>)" src="image/del.png"height="40px" width="42px" ></a>
				<a href="view.php?value=2&id=<?php echo $row[0];?>"><img src="image/view1.png"height="40px" width="42px" ></a> 
				
				
				</td>
				
				

				</tr>
								
							<?php	
                            }

								}
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
var c=confirm("Do you want to delete this causes");
if(c==true)
{
window.location.href='pending_causes.php?del='+$id+'';
return true;
}
}


</script>

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>