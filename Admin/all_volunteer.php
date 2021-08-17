<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
require('database/Db_connection.php');
?>


<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Admin Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="code.php" method="POST">

        <div class="modal-body">

            <div class="form-group">
                <label> Username </label>
                <input type="text" name="username" class="form-control" placeholder="Enter Username">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" placeholder="Enter Email">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" placeholder="Enter Password">
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="confirmpassword" class="form-control" placeholder="Confirm Password">
            </div>
        
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="registerbtn" class="btn btn-primary">Save</button>
        </div>
      </form>

    </div>
  </div>
</div>


<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">VOLUNTEER LIST
            
    </h6>
	</br>
	<?php if(isset($_GET['del'])){
		$id=$_GET['del'];
	    require('database/Db_Connection.php');
        mysqli_query($con,"DELETE FROM user WHERE user_id='".$id."'") or die("can't Execute...");
      
		echo'
	<div class="alert alert-danger alert-dismissible fade show" role="alert" style="width:330px; float:right;">
  <strong>Successfully!</strong> volunteer Deleted.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
	
  </button>
</div>';
	}
	?>
 
  </div>

  <div class="card-body">

    <div class="table-responsive">

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="5">
        <thead>
          <tr>
            <th> ID </th>
            <th> Username </th>
            <th>Email </th>
            <th>Organization Name</th>
            <th>Mobile</th>
            <th>Address </th>
            <th>District </th>
            <th>Action </th>
          </tr>
        </thead>
        <tbody>
     
          
		  <?php
		   	require('database/Db_Connection.php');
                                $sql = "select * from user";

                                $result = mysqli_query($con,$sql);

                                $response = array();
                                $count = 0;

                                while($row = mysqli_fetch_array($result))
                                {
									 $count++;
									
									?>
									<tr style="color:black;">
            <td><?php echo $count;?></td>
            <td> <?php echo $row['user_name'];?></td>
            <td> <?php echo $row['user_email'];?></td>
            <td> <?php echo $row['organization_name'];?></td>
            <td> <?php echo $row['user_mobile'];?> </td>
            <td> <?php echo $row['user_address'];?> </td>
            <td> <?php echo $row['district'];?> </td>
			 <td>
			 <img onclick="show_confirm(<?php  echo $row['user_id'];?>)" src="image/del.png"height="40px" width="42px" ></a>
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
<!-- /.container-fluid -->
<script type="text/JavaScript" language="JavaScript">

 function show_confirm($id){
var c=confirm("Do you want to delete this volunteer");
if(c==true)
{
window.location.href='all_volunteer.php?del='+$id+'';
return true;
}
}


</script>

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>