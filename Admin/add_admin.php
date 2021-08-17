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
    <h6 class="m-0 font-weight-bold text-primary">Add Admin profile 
         <a href="admin_profile.php"><button style="float:right;" type="button" class="btn btn-secondary" data-dismiss="modal">Back</button> </a> 
           
    </h6>
	  </br>
	  <?php
	  if(isset($_GET['ok']))
		{
		echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert" style="width:330px; float:right;">
  <strong>Successfully!</strong> registered.
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
  <div class="card-body">
 <form style ="width:600px;color:black;" action="admin_registration_process.php" method="POST">

        <div class="modal-body">
          <div class="row">
          <div class="col md-3">
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
         <button type="submit" name="registerbtn" class="btn btn-primary">Save</button>
        </div>
        </div>
      </form>
   
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
window.location.href='register.php?del='+$id+'';
return true;
}
} 


</script>

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>