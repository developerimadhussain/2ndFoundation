 <?php			
include('includes/header.php'); 
include('includes/navbar.php'); 
include('includes/sidebar.php');

 
?>
        <div class="grid_10">
		
            <div class="box round first grid">
              <h2 class="page-header" style="color: deeppink;">
                       ADD CAUSES 
                    </h2>
                <div class="block">               
             <?php 
		if(isset($_GET['ok'])){
		echo'
	<div style="width:300px;">
  <h2><li style="color:green; ">Successfully! Causes added</li></h2>
</div>';
	}
	elseif(isset($_GET['alt'])){
		if($_GET['alt']==1)
	echo'<div style="width:300px;" >
  <h2><li style="color:blue;">Please full fill all the fields</li></h2>
</div>';
else
	echo'<div style="width:300px;"><h2><li style="color:blue;">This Causes title already exist</li></h2>
</div>';
 
	}
 
    if(isset($_SESSION['valid'])==True){?>
 
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-6">

                   
					<form class="com-mail" action="causes_add_process.php?user_id=<?php echo $_GET['user_id'];?>" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                        <div class="form-group">
                            <label> Title :</label>
                            <input name="title" class="form-control" placeholder="Title">
                        </div>
                        <div class="form-group">
                            <label> Detail :</label>
                            <textarea name="detail" id="detail" required="required" class="form-control" rows="15"></textarea>
                        </div>   
                     

                       <div class="form-group">
						<label for="exampleFormControlFile1">Add Photo</label>
						<input type="file" class="form-control-file" name="img" id="img">
					  </div>

                    
                     <input type="submit"  class="btn btn-danger" value="Add">
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
