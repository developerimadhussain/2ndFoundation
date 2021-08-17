<?php			
session_start();	  
					  if(isset($_SESSION['email']))
						{
						$email=$_SESSION['email'];
						require('database/Db_Connection.php');

						$query=mysqli_query($con,"select * from user  where user_email='$email'");
						if(mysqli_num_rows($query))
						{  						   
							$row=mysqli_fetch_array($query);
							$user_id=$row['user_id'];

						
						}
						}
		
 if(isset($_SESSION['valid'])==True && ($_SESSION['type'])=="volunteer"){
	 ?>
	<body  style="background: darkcyan;">
    <div class="container_12"  style="background: black;">
        <div  style="background: darkcyan;">
            <div id="branding">
                
				<div class="floatleft middle">
						<h1>2ND FOUNDATION</h1>
						<p style="margin-left:30px;">VOLUNTEER PANEL</P>
				</div>
                <div class="floatright">
                    <div class="floatleft">
                        <img style="width: 20px;" src="img/img-profile.jpg" alt="Profile Pic" /></div>
                    <div class="floatleft marginleft10">
                        <ul class="inline-ul floatleft">
                            <li>Hello <?php echo $_SESSION['username'];?></li>
                            <li><a href="logout.php">Logout</a></li>
                        </ul>
                    </div>
                </div>
                <div class="clear">
                </div>
            </div>
        </div>
        <div class="clear">
        </div>
        <div class="grid_12">
            <ul class="nav main" style="background: darkblue;;">
                <li class="ic-dashboard"><a href="index.php"><span>Dashboard</span></a> </li>
                <li class="ic-form-style"><a href=""><span>User Profile</span></a></li>
				<li class="ic-typography"><a href=""><span>Change Password</span></a></li>
				<li class="ic-grid-tables"><a href="comment_list.php?user_id=<?php echo $_SESSION['user_id'];?>"><span>Comments</span></a></li>
                <li class="ic-charts"><a href="../index.php"><span>Visit Website</span></a></li>
            </ul>
        </div>
        <div class="clear">
        </div>
		
		<?php	
 }
 ?>
	