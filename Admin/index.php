<?php	
include('includes/header.php'); 
include('includes/navbar.php'); 
?>
<div class="container-fluid">
  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
  </div>
  <div class="row wow fadeInUp" data-wow-delay=".2s">
    <div class="col-xl-4 col-md-6 mb-4 wow fadeInUp" data-wow-delay=".2s">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2 wow fadeInUp" data-wow-delay="2.0s">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Registered Admin</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
               <?php	  $c=0;
											
										
										require('database/Db_Connection.php');
										$query="select * from admin ";
										$res=mysqli_query($con,$query);
											
										while($row=mysqli_fetch_assoc($res))
											{
												
													$c++;
											}
											   ?>
											
										
										
              

              </div>
            </div>
		 <div class="col-auto">
			
             <i style="margin-left:95px;"class=" fa-2x text-green-800 font-weight-bold">  <?php echo $c; ?></i>
             <br>
             <br>
			<a style="margin-left:70px;" class="btn btn-primary" href="admin_list.php">VIEW</a>
          </div>
          </div>
        </div>
      </div>
    </div>
	  <div class="col-xl-4 col-md-6 mb-4 wow fadeInUp" data-wow-delay=".2s">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2 wow fadeInUp" data-wow-delay="2.0s">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Organization</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
               <?php	  $c=0;
											
										
										require('database/Db_Connection.php');
										$query="select * from organization ";
										$res=mysqli_query($con,$query);
											
										while($row=mysqli_fetch_assoc($res))
											{
												
													$c++;
											}
											   ?>
											
										
										
              

              </div>
            </div>
		 <div class="col-auto">
			
             <i style="margin-left:95px;"class=" fa-2x text-green-800 font-weight-bold">  <?php echo $c; ?></i>
             <br>
             <br>
			<a style="margin-left:70px;" class="btn btn-primary" href="all_organization.php">VIEW</a>
          </div>
          </div>
        </div>
      </div>
    </div>
	  <div class="col-xl-4 col-md-6 mb-4 wow fadeInUp" data-wow-delay=".2s">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2 wow fadeInUp" data-wow-delay="2.0s">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Volunteer</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
               <?php	  $c=0;
											
										
										require('database/Db_Connection.php');
										$query="select * from user ";
										$res=mysqli_query($con,$query);
											
										while($row=mysqli_fetch_assoc($res))
											{
												
													$c++;
											}
											   ?>
											
										
										
              

              </div>
            </div>
		 <div class="col-auto">
			
             <i style="margin-left:95px;"class=" fa-2x text-green-800 font-weight-bold">  <?php echo $c; ?></i>
             <br>
             <br>
			<a style="margin-left:70px;" class="btn btn-primary" href="all_volunteer.php">VIEW</a>
          </div>
          </div>
        </div>
      </div>
    </div>
    </div>
	 <div class="row wow fadeInUp" data-wow-delay=".2s">
    <div class="col-xl-4 col-md-6 mb-4 wow fadeInUp" data-wow-delay=".2s">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2 wow fadeInUp" data-wow-delay="2.0s">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Pending News</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
               <?php	  $c=0;
											
										
										require('database/Db_Connection.php');
										$query="select * from news ";
										$res=mysqli_query($con,$query);
											
										while($row=mysqli_fetch_assoc($res))
											{if($row['status']=="Pending"){
													$c++;
												}
											}
											   ?>
											
										
										
              

              </div>
            </div>
		 <div class="col-auto">
			
             <i style="margin-left:95px;"class=" fa-2x text-green-800 font-weight-bold">  <?php echo $c; ?></i>
             <br>
             <br>
			<a style="margin-left:70px;" class="btn btn-primary" href="pending_news.php">VIEW</a>
          </div>
          </div>
        </div>
      </div>
    </div>
	  <div class="col-xl-4 col-md-6 mb-4 wow fadeInUp" data-wow-delay=".2s">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2 wow fadeInUp" data-wow-delay="2.0s">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Pending Event</div>
              <div class="h5 mb-0 font-weight-bold text-gray-800">
               <?php	  $c=0;
											
										
										require('database/Db_Connection.php');
										$query="select * from event ";
										$res=mysqli_query($con,$query);
											
										while($row=mysqli_fetch_assoc($res))
											{if($row['status']=="Pending"){
													$c++;
												}
											}
											   ?>
											
										
										
              

              </div>
            </div>
		 <div class="col-auto">
			
             <i style="margin-left:95px;"class=" fa-2x text-green-800 font-weight-bold">  <?php echo $c; ?></i>
             <br>
             <br>
			<a style="margin-left:70px;" class="btn btn-primary" href="pending_event.php">VIEW</a>
          </div>
          </div>
        </div>
      </div>
    </div>
	  <div class="col-xl-4 col-md-6 mb-4 wow fadeInUp" data-wow-delay=".2s">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2 wow fadeInUp" data-wow-delay="2.0s">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Pending Causes</div>
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
											
										
										
              

              </div>
            </div>
		 <div class="col-auto">
			
             <i style="margin-left:95px;"class=" fa-2x text-green-800 font-weight-bold">  <?php echo $c; ?></i>
             <br>
             <br>
			<a style="margin-left:70px;" class="btn btn-primary" href="pending_causes.php">VIEW</a>
          </div>
          </div>
        </div>
      </div>
    </div>
    </div>
	 <div class="row wow fadeInUp" data-wow-delay=".2s">
    <div class="col-xl-4 col-md-6 mb-4 wow fadeInUp" data-wow-delay=".2s">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2 wow fadeInUp" data-wow-delay="2.0s">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total News</div>
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
			
             <i style="margin-left:95px;"class=" fa-2x text-green-800 font-weight-bold">  <?php echo $c; ?></i>
             <br>
             <br>
			<a style="margin-left:70px;" class="btn btn-primary" href="news_list.php">VIEW</a>
          </div>
          </div>
        </div>
      </div>
    </div>
	  <div class="col-xl-4 col-md-6 mb-4 wow fadeInUp" data-wow-delay=".2s">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2 wow fadeInUp" data-wow-delay="2.0s">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Event</div>
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
			
             <i style="margin-left:95px;"class=" fa-2x text-green-800 font-weight-bold">  <?php echo $c; ?></i>
             <br>
             <br>
			<a style="margin-left:70px;" class="btn btn-primary" href="event_list.php">VIEW</a>
          </div>
          </div>
        </div>
      </div>
    </div>
	  <div class="col-xl-4 col-md-6 mb-4 wow fadeInUp" data-wow-delay=".2s">
      <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
          <div class="row no-gutters align-items-center">
            <div class="col mr-2 wow fadeInUp" data-wow-delay="2.0s">
              <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Causes</div>
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
			
             <i style="margin-left:95px;"class=" fa-2x text-green-800 font-weight-bold">  <?php echo $c; ?></i>
             <br>
             <br>
			<a style="margin-left:70px;" class="btn btn-primary" href="causes_list.php">VIEW</a>
          </div>
          </div>
        </div>
      </div>
    </div>
    </div>
	
  </div>
  

 
   
   










  <?php
include('includes/scripts.php');
include('includes/footer.php');

?>