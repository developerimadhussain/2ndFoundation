<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
require('database/Db_connection.php');

 ?>
<div class="modal fade" id="addadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5>Add Admin Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	  
	
     

    </div>
  </div>
  </div>
<div class="container-fluid">
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Admin Profile 
           
            <a style="margin-left:20px;" class="btn btn-primary" href="add_admin.php">Add Admin Profile</a>
    </h6>
	  </br>
	    <?php 
		
		 if(isset($_GET['del']))
		{
			$id=$_GET['del'];
	    require('database/Db_Connection.php');
        mysqli_query($con,"DELETE FROM admin WHERE user_id='".$id."'") or die("can't Execute...");
      
		echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert" style="width:330px; float:right;">
  <strong>Successfully!</strong> deleted.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
	
  </button>
</div>';
		}
	else if(isset($_GET['ed']))
	{  
		echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert" style="width:330px; float:right;">
  <strong>Successfully!</strong> updated.
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
          <tr>
            <th> ID </th>
            <th> Username </th>
            <th>Email </th>
            <th>Password</th>
            <th>Action </th>
          </tr>
        </thead>
        <tbody>
     
          <tr>
		  <?php
		   	require('database/Db_Connection.php');
                                $sql = "select * from admin";

                                $result = mysqli_query($con,$sql);

                                $response = array();
                                $count = 0;

                                while($row = mysqli_fetch_array($result))
                                {
									 $count++;
									 $pass=md5($row['password']);
									 
									
									?>
			  <tr>
            <td><?php echo $count;?></td>
            <td> <?php echo $row['user_name'];?></td>
            <td> <?php echo $row['user_email'];?></td>
            <td> <?php echo $pass;?> </td>
            <td style="width:115px;">
				  <a style="margin-left:20px;"><img onclick="show_confirm(<?php  echo $row['user_id'];?>)" src="image/del.png"height="40px" width="42px" ></a><a href="edit_admin_profile.php?user_id=<?php  echo $row['user_id'];?>"style="margin-left:20px;"><img src="image/edit3.jpg"height="40px" width="42px" ></a>
				 
              
      
            </td>
			<?php
								}
								?>
          </tr>
        
        </tbody>
      </table>

    </div>
  </div>
</div>

</div>
<!-- /.container-fluid -->
<script type="text/JavaScript" language="JavaScript">

 function show_confirm($id){
var c=confirm("Do you want to delete this admin");
if(c==true)
{
window.location.href='admin_profile.php?del='+$id+'';
return true;
}
} 


</script>

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>