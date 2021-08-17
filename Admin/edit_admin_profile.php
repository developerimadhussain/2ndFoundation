<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
require('database/Db_connection.php');

 ?>

<div class="container-fluid">
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Edit Admin profile 
         <a href="admin_profile.php"><button style="float:right;" type="button" class="btn btn-secondary" data-dismiss="modal">Back</button> </a> 
           
    </h6>
	  </br>
	  <?php
	  if(isset($_GET['ok']))
		{
		echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert" style="width:330px; float:right;">
  <strong>Successfully!</strong> admin prifile updated.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
	
  </button>
</div>';
		}
		 if(isset($_GET['error']))
		{
		echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert" style="width:330px; float:right;">
  <strong>'; echo $_GET['error'];
  echo'
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
	
  </button>
</div>';
		}
		?>
	  
  </div>
  <?php
	   	require('database/Db_Connection.php');
		$id=$_GET['user_id'];
		$sql = "select * from admin where user_id='$id'";

		$result = mysqli_query($con,$sql);
	    if($row = mysqli_fetch_array($result))
		{
			$username=$row['user_name'];
			$email=$row['user_email'];
			$password=$row['password'];
			
		}
	  
	  ?>
  <div class="card-body">
 <form style ="width:600px;color:black;" action="edit_admin_profile_process.php?id=<?php echo $id;?>" method="POST">

        <div>
  <div class="row">
          <div class="col md-3">
            <div class="form-group">
                <label> Username </label>
                <input type="text" name="username" value="<?php echo $username;?>" class="form-control" placeholder="Enter Username">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email"  value="<?php echo $email;?>" class="form-control" placeholder="Enter Email">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password"  value="<?php echo $password;?>" class="form-control" placeholder="Enter Password">
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="confirmpassword"  value="<?php echo $password;?>" class="form-control" placeholder="Confirm Password">
            </div>
        
        
      
            <button type="submit" name="registerbtn" class="btn btn-primary">Save</button>
        </div>
        </div>
        </div>
      </form>
   
  </div>
  </div>
</div>

<!-- /.container-fluid -->
<script type="text/JavaScript" language="JavaScript">

 function show_confirm($id){
var c=confirm("Do you want to delete this admin");
if(c==true)
{
window.location.href='register.php?del='+$id+'';
return true;
}
} 


</script>

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>