 <?php			
include('includes/header.php'); 
include('includes/navbar.php'); 
include('includes/sidebar.php');

 
?>
        <div class="grid_10">
		
            <div class="box round first grid" style="background: lightgreen;">
                <h2> Dashbord</h2>
                <div class="block"> 
								
								 <?php		
										require('database/Db_Connection.php');
										$query="select organization_name from user where user_id='$user_id'";
										$res=mysqli_query($con,$query);
										$organization_name=$row['organization_name'];
										?>
				
              
<h2 style="background:cornsilk;;text-align:center;">ORGANIZATION NAME: <?php echo 										$organization_name ?></h2>
<br>
   <div class="row">
   <div class="col-md-4 " style="padding-left:85px;">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
			<div class="h5 mb-0 font-weight-bold text-gray-800">
               <?php	  $c=0;
											
										
										require('database/Db_Connection.php');
										$query="select * from news ";
										$res=mysqli_query($con,$query);
											
										while($row=mysqli_fetch_assoc($res))
											{
												if($row['status']=="Pending"){
													$c++;
												}
											}
											   ?>
											
              <div class="text-xs font-weight-bold text-warning text-uppercase mb-1"> Total Pending News</div>
               <div class="col-auto">
             <i class=" fa-2x text-green-300" style="font-size:30px;">  <?php echo $c; ?></i>
            </div>
			<br>
			 <a class="btn btn-primary" href="pending_news_list.php?user_id=<?php echo $user_id;?>">VIEW</a>
            </div>
            <div class="col-auto">
              <i class="fas fa-comments fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
    <div class="col-md-4 " style="padding-left:85px;">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
			<div class="h5 mb-0 font-weight-bold text-gray-800">
               <?php	  
			   $c=0;
											
											
										
										require('database/Db_Connection.php');
										$query="select * from event where user_id=' $user_id' ";
										$res=mysqli_query($con,$query);
											
										while($row=mysqli_fetch_assoc($res))
											{
												if($row['status']=="Pending"){
													$c++;
												}
											}
											   ?>
											
              <div class="text-xs font-weight-bold text-warning text-uppercase mb-1"> Total Pending event</div>
               <div class="col-auto">
              <i class=" fa-2x text-green-300" style="font-size:30px;">  <?php echo $c; ?></i>
            </div>
			<br>
		
			 <a class="btn btn-primary" href="pending_event_list.php?user_id=<?php echo $user_id;?>">VIEW</a>
            </div>
            <div class="col-auto">
              <i class="fas fa-comments fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
    <div class="col-md-4 " style="padding-left:85px;">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
			<div class="h5 mb-0 font-weight-bold text-gray-800">
               <?php	  $c=0;
											
										
										require('database/Db_Connection.php');
										$query="select * from causes ";
										$res=mysqli_query($con,$query);
											
										while($row=mysqli_fetch_assoc($res))
											{
												if($row['status']=="Pending"){
													$c++;
												}
											}
											   ?>
											
              <div class="text-xs font-weight-bold text-warning text-uppercase mb-1"> Total Pending causes</div>
               <div class="col-auto">
               <i class=" fa-2x text-green-300" style="font-size:30px;">  <?php echo $c; ?></i>
            </div>
			<br>
			<a class="btn btn-primary" href="pending_causes_list.php?user_id=<?php echo $user_id;?>">VIEW</a>
            </div>
            <div class="col-auto">
              <i class="fas fa-comments fa-2x text-gray-300"></i>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
</br>
</br>
  <div class="row">
  <div class="col-md-4 " style="padding-left:85px;">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
		<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total  News:</div>
	
              <div class="h5 mb-0 font-weight-bold text-gray-800">
               <?php	  $c=0;
											
										
										require('database/Db_Connection.php');
										$query="select * from news ";
										$res=mysqli_query($con,$query);
											
										while($row=mysqli_fetch_assoc($res))
											{
													$c++;
											}
											
											   ?>
											   
												
												
												
												
												</div>
												</div>
            
               <div class="col-auto">
			  
             <i class=" fa-2x text-green-300" style="font-size:30px;">  <?php echo $c; ?></i>
            </div>
			<br>
			<a class="btn btn-primary" href="news_list.php?user_id=<?php echo $user_id;?>">VIEW</a>
          </div>
        </div>
      </div>
    </div>
  
      <div class="col-md-4" style="padding-left:85px;"> 
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
		<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total  event:</div>
	
              <div class="h5 mb-0 font-weight-bold text-gray-800">
               <?php	  $c=0;
											
										
										require('database/Db_Connection.php');
										$query="select * from event ";
										$res=mysqli_query($con,$query);
											
										while($row=mysqli_fetch_assoc($res))
											{
												$c++;
											}
											
											   ?>
											   
												
												
												
												
												</div>
												</div>
            
               <div class="col-auto">
			  
           <i class=" fa-2x text-green-300" style="font-size:30px;">  <?php echo $c; ?></i>
            </div>
			<br>
			
              <a class="btn btn-primary" href="event_list.php?user_id=<?php echo $user_id;?>">VIEW</a>
          </div>
        </div>
      </div>
      </div>
  

 <div class="col-md-4 " style="padding-left:85px;">
      <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2">
		<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total  Causes:</div>
		
              <div class="h5 mb-0 font-weight-bold text-gray-800">
               <?php	  $c=0;
											
										
										require('database/Db_Connection.php');
										$query="select * from causes ";
										$res=mysqli_query($con,$query);
											
										while($row=mysqli_fetch_assoc($res))
											{
											
													$c++;
												
											}
											
											   ?>
											   
												
												
												
												
												</div>
												</div>
            
               <div class="col-auto">
			  
            <i class=" fa-2x text-green-300" style="font-size:30px;">  <?php echo $c; ?></i>
            </div>
			<br>
			<a class="btn btn-primary" href="causes_list.php?user_id=<?php echo $user_id;?>">VIEW</a>
          </div>
        </div>
      </div>
    </div>
 
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
