<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
$_SESSION['valid']=true;
?>


<?php
    if(isset($_SESSION['valid'])==True){?>
 
     <div class="card-body">

<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">ADD ORGANIZATION 
           
    </h6>
	</br>
	<?php if(isset($_GET['ok'])){
		echo'
	<div class="alert alert-danger alert-dismissible fade show" role="alert" style="width:330px; float:right;">
  <strong>Successfully!</strong> organization Added.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
	
  </button>
</div>';
	}
	
?>
  </div>


            <div class="row">
                <div class="col-lg-6">

                   
						<form style="margin-left:10px;" class="com-mail" action="add_organization_process.php" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>Organization Name :</label>
                            <input name="name" class="form-control" placeholder="Organization Name">
                        </div>
						<div class="form-group">
                            <label> Contact Person:</label>
                            <input name="person" class="form-control" placeholder="Name">
                        </div>
						

					
												 
						
						<div class="form-group">
                            <label> Mobile:</label>
                            <input name="mobile" class="form-control" placeholder="Mobile">
                        </div>
						<div class="form-group">
                            <label> Target Audience:</label>
                            <input name="audience" class="form-control" placeholder="Audience">
                        </div>
						  
                        <div class="form-group">
                            <label>Detail :</label>
                            <textarea name="detail" id="detail" required="required" class="form-control" rows="8"></textarea>
                        </div>   
                     

                       <div class="form-group">
						<label for="exampleFormControlFile1">Add Photo</label>
						<input type="file" class="form-control-file" name="img" id="img">
					  </div> 

                    
                     <input class="btn btn-primary" type="submit" value="ADD">
					 <br>
					 <br>
					 
					 </div>
                    </form>

                </div>
				
                
            </div>

    <?php
}
?>
</div>
</div>


<?php
include('includes/scripts.php');
include('includes/footer.php');
?>