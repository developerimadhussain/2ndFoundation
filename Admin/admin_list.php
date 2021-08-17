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
	  
	
      <form action="admin_registration_process.php" method="POST">

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
  
  
  
<div class="modal fade" id="editadminprofile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Admin Data</h5>
		 
	
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
	  <?php
	   	require('database/Db_Connection.php');
		$id=$_GET['id'];
		$sql = "select * from admin where user_id='$id'";

		$result = mysqli_query($con,$sql);
	    if($row = mysqli_fetch_array($result))
		{
			$username=$row['user_name'];
			$email=$row['user_email'];
			$username=$row['password'];
			
			
	  
	  ?>
	
      <form action="edit_process.php" method="POST">

        <div class="modal-body">

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
                <input type="password" name="confirmpassword"  value="<?php echo $confirmpassword;?>" class="form-control" placeholder="Confirm Password">
            </div>
        
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" name="registerbtn" class="btn btn-primary">Save</button>
        </div>
      </form>
	    <?php
		}
	  ?>

    </div>
  </div>
</div>

<?php


if(isset($_GET['id']))
	{
		?>
		 <span  data-toggle="modal"  data-target="#editadminprofile"   src="image/view1.png"height="40px" width="42px"></span>
      
	   <?php
	}
	
	?>
<div class="container-fluid">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">ADMIN LIST
           
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
		else if(isset($_GET['del']))
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
            <td><?php echo $row['user_id'];?></td>
            <td> <?php echo $row['user_name'];?></td>
            <td> <?php echo $row['user_email'];?></td>
            <td> <?php echo $pass;?> </td>
            <td style="width:115px;">
                <!-- <form action="" method="post">
                    <input type="hidden" name="edit_id" value="">
                <button  type="submit" name="edit_btn" class="btn btn-success"> EDIT</button>
					 
                </form>
          
                <form action="" method="post">
                  <input type="hidden" name="delete_id" value=""> -->
				  <a style="margin-left:20px;"><img onclick="show_confirm(<?php  echo $row['user_id'];?>)" src="image/del.png"height="40px" width="42px" ></a>
				 
              
      
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
window.location.href='register.php?del='+$id+'';
return true;
}
} 
function show_confirm1($id){
var c=confirm("Do you want to edit data");
if(c==true)
{
window.location.href='register.php?id='+$id+'';
return true;
}
}

</script>

<?php
include('includes/scripts.php');
include('includes/footer.php');
?>