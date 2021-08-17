<?php
include('includes/header.php'); 
include('includes/navbar.php'); 
?>
<?php 

require "database/Db_Connection.php";
					$id=$_GET['id'];
					$value=$_GET['value'];
				if($value==1){
					 
				$query="SELECT * FROM news WHERE news_id='$id'";
				$result = mysqli_query($con,$query); 
				
						if($row1 = $result->fetch_assoc()) {															
							$id=$row1['news_id'];												
							$title=$row1['news_title'];
							$details=$row1['news_detail'];
                            $date=$row1['created_date'];
							$status=$row1['status'];						
							$image=$row1['image'];
							$id=$row1['user_id'];
						   $result2 = $con->query("SELECT * FROM user where user_id='$id'");
						  
					
					    if($result2->num_rows) {
						
						while($row2 = $result2->fetch_assoc()) {
							$user_name=$row2['user_name'];
							
						}
						}
						}
				}
				
				else if($value==2){
					 
				$query="SELECT * FROM causes WHERE id='$id'";
				$result = mysqli_query($con,$query); 
				
						if($row1 = $result->fetch_assoc()) {															
							$id=$row1['id'];	
							$status=$row1['status'];											
							$title=$row1['title'];
							$details=$row1['detail'];
                            $date=$row1['created_date'];						
							$image=$row1['image'];
							$id=$row1['user_id'];
						   $result2 = $con->query("SELECT * FROM user where user_id='$id'");
						  
					
					    if($result2->num_rows) {
						
						while($row2 = $result2->fetch_assoc()) {
							$user_name=$row2['user_name'];
							
						}
						}
						}
				}
				else if($value==3){
				require "database/Db_Connection.php";
					$event_id=$_GET['id'];
				$query="SELECT * FROM event WHERE event_id='$event_id'";
				$result = mysqli_query($con,$query); 
				
						if($row = $result->fetch_assoc()) {															
							$id=$row['event_id'];												
							$title=$row['title'];
							$status=$row['status'];
							$details=$row['details'];
                            $date=$row['date'];	
							$date=date('F j, Y, g:i a ',strtotime($date));							
							$image=$row['image'];							
							$location=$row['location'];
							
				
				
						}
				}
				else if($value==4){
				
require "database/Db_Connection.php";
					$organization_id=$_GET['id'];
	$query1="SELECT * FROM organization WHERE organization_id='$organization_id'";
	$query2="SELECT * FROM map ";
				$result1 = mysqli_query($con,$query1); 
				$result2 = mysqli_query($con,$query2); 
				
						if($row1 = $result1->fetch_assoc()) {
							$id=$row1['organization_id'];												
							$title=$row1['organization_name'];
							$location=$row1['location'];
							$mobile=$row1['mobile'];
							$contact_person=$row1['contact_person'];
							$target_audience=$row1['target_audience'];														
							$details=$row1['detail'];			
							$image=$row1['image'];		  	
							
						}
				}
				
						?>

<div class="container-fluid">

<!-- DataTales Example -->
<div style="background:aliceblue;" class="card shadow mb-4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">VIEW >>
	<?php
	 if($value==1){
		echo 'NEWS';
	}else if($value==2){
		echo 'CAUSES';
	}
	else if($value==3){
		echo 'EVENT';
	}
		else if($value==4){
			echo 'ORGANIZATION';
		}
	
	?>
    >>
<?php
echo $title;

?>	
	 
    </h6>
<?php	
if($value<4){
	?>
	<h6 style="float: right;
    /* background: aquamarine; */
    width: 140px;
    font-weight: 900;
    color: indianred;"> Status: <?php
echo $status;

?></h6>
<?php
}
?>
	</br>
	<?php if(isset($_GET['del'])){
		$id=$_GET['del'];
	    require('database/Db_Connection.php');
        mysqli_query($con,"DELETE FROM news WHERE news_id='".$id."'") or die("can't Execute...");
      
		echo'
	<div class="alert alert-danger alert-dismissible fade show" role="alert" style="width:330px; float:right;">
  <strong>Successfully!</strong> News Deleted.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
	
  </button>
</div>';
	}
	?>
  </div>

  <div class="card-body">

<div class="section">
	
		<div class="container">
			<div class="row">
<?php 
              if($value<4){
						
															
							echo '
					<main id="main" class="col-md-9 wow fadeInUp" data-wow-delay=".2s">
					<div class="article">
				
						<div class="article-img wow fadeInUp" data-wow-delay=".2s">
							<img style="width: -webkit-fill-available;" src="image/'.$image.'" alt="">
						</div>
						<div class="article-content">	
                             <br>						
							<h2 class="article-title wow fadeInUp" data-wow-delay=".2s"  style="color:blue">'.$title.'</h2>
							<ul class="article-meta wow fadeInUp" data-wow-delay=".2s">
								<li style="list-style:none;color: brown;"  class="wow fadeInUp" data-wow-delay=".2s" style="color:brown ;">'.$date.'</li>';
								?>
								<?php
								if($value==3){
	                            	echo '
								<li  style="list-style:none;color: deeppink;" class="wow fadeInUp" data-wow-delay=".2s" style="color: deeppink;"> '.$location.'</li>';
								}
									?>
	<?php
							echo '
								<li  style="list-style:none;color: deeppink;" class="wow fadeInUp" data-wow-delay=".2s" style="color: deeppink;">By '.$user_name.'</li>
								 
							</ul>

							<p style="color: #212529;"class="wow fadeInUp" data-wow-delay=".2s">'.$details.'</p>
							
								';
								
			  }
			  else{
				  
				 
				
					
					  						
					echo '
                    <div class="col-md-8 wow fadeInUp" data-wow-delay=".2s">
                      <img style="width: -webkit-fill-available;" src="image/'.$image.'">
                    </div>
                    <div class="col-md-12 event_details wow fadeInUp" data-wow-delay=".2s">
                        <a class="wow fadeInUp" data-wow-delay=".2s" href="#"><h2 class="event_title">'.$title.'</h2></a>
                        <p class="wow fadeInUp" data-wow-delay=".2s">'.$details.'</p>
						<h6 class="wow fadeInUp" data-wow-delay=".2s" style="color:blue;">Contact_person: '.$contact_person .'</h6>
						<h6 class="wow fadeInUp" data-wow-delay=".2s" style="color:blue;">Mobile: '.$mobile.'</h6>
						<h6 class="wow fadeInUp" data-wow-delay=".2s" style="color:blue;">Location: '.$location.'</h6>
						<h6 class="wow fadeInUp" data-wow-delay=".2s" style="color:blue;"> Target_audience: '.$target_audience.'</h6>
						
                       
                    </div>	
                </div>';
					
						
					
				
				  
			  }
			  
						
						
								?>
						</div>
						
						

						<!-- /article reply form -->
					</div>
				
		</div>
		
	</div>
	
  </div>
</div>



<!-- /.container-fluid -->
<script type="text/JavaScript" language="JavaScript">

 function show_confirm($id){
var c=confirm("Do you want to delete this news");
if(c==true)
{
window.location.href='all_news.php?del='+$id+'';
return true;
}
}


</script>


<?php
include('includes/scripts.php');
include('includes/footer.php');
?>