<?php			
include('includes/header.php'); 
include('includes/navbar.php'); 
include('includes/sidebar.php');

 
?>
        <div class="grid_10">
		
            <div class="box round first grid">
              <h2 class="page-header" style="color: deeppink;">
                      UPDATE NEWS
                    </h2>
                <div class="block">               
               <?php
 
    if(isset($_SESSION['valid'])==True){?>
	
	
	
	         	<?php 
		if(isset($_GET['ok'])){
		echo'
	<div style="width:300px;">
  <h2><li style="color:green; ">Successfully! News Updated</li></h2>
</div>';
	}
	elseif(isset($_GET['alt'])){
		if($_GET['alt']==1)
	echo'<div style="width:300px;" >
  <h2><li style="color:blue;">Please full fill all the fields</li></h2>
</div>';

 
	}
	
?>
 
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">

                   
					<form class="com-mail" action="news_update_process.php?news_id=<?php echo $_GET['news_id'];?>&user_id=<?php echo $_GET['user_id'];?>" method="post" enctype="multipart/form-data">
					<?php
						require('database/Db_Connection.php');
							$news_id=$_GET['news_id'];
							$query = "SELECT * FROM news WHERE news_id='$news_id'";
						       $result = mysqli_query($con,$query);								
								   if($row = mysqli_fetch_array($result))
                                      {
										   $title=$row['news_title'];
										   $detail=$row['news_detail'];
									
									
									  }?>
                        <div class="form-group">
                            <label>News Title :</label>
                            <input name="title" class="form-control" placeholder="News Title"  value="<?php echo $title;?>">
                        </div>
                        <div class="form-group">
                            <label>News Detail :</label>
                            <textarea name="detail" id="detail" required="required" class="form-control" rows="15" ><?php echo $detail;?></textarea>
                        </div>   
                     

                       <div class="form-group">
						<label for="exampleFormControlFile1">Add Photo</label>
						<input type="file" class="form-control-file" name="img" id="img">
					  </div>

                    
                     <input type="submit" class="btn btn-danger" value="Update News">
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


