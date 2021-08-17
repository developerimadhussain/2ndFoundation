 <?php			
include('includes/header.php'); 
include('includes/navbar.php'); 
include('includes/sidebar.php');

 
?>
        <div class="grid_10">
		
            <div class="box round first grid">
                 <h2 class="page-header" style="color: deeppink;">
                        Comment List
                    </h2>
                <div class="block">               
                 <?php if(isset($_GET['del'])){
		$id=$_GET['del'];
	    require('database/Db_Connection.php');
        mysqli_query($con,"DELETE FROM comment WHERE id='".$id."'") or die("can't Execute...");
      
		echo'
	<div style="width:300px;">
  <h2 style="color:green; ">Successfully! Comment Deleted</h2>
</div></br>';

	}
	if(isset($_GET['publish'])){
		$publish=$_GET['publish'];
		$pub="Publish";
		$id=$_GET['cm_id'];
	    require('database/Db_Connection.php');
        mysqli_query($con,"Update  comment set publish='$publish',status='$pub' WHERE id='".$id."'") or die("can't Execute...");
      
		echo'
	<div style="width:300px;">
  <h2><li style="color:green; ">Successfully!  Comment Approve and Published</li></h2>
</div>
';

	}

            if(isset($_SESSION['valid'])==True){?>
            <div class="row">

                <div class="col-lg-6" style="width: 100%">
                  
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th  style="text-align: center;"> SL.NO.</th>
                                    <th  style="text-align: center;"> Name</th>
									<th style="text-align: center;"> Email</th>
                                                                     
                                    <th style="text-align: center;">Message</th>  
                                    <th style="text-align: center;">Status </th>									
                                    <th style="text-align: center;">Delete </th>
                                    <th style="text-align: center;">Publish </th>
                                   
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $user_id=$_GET['user_id'];
                                $sql = "select * from comment where user_id='$user_id' ORDER BY id DESC";
                                $result = mysqli_query($con,$sql);

                                $response = array();
                                $count = 0;

                                while($row = mysqli_fetch_array($result))
                                {
									$count++;
									?>
                                  
								   <tr>
				 				 
				<td align="center" style="width:150px;"><?php  echo $count."<br>";?></td>
				<td align="center" style="width:150px;"><?php  echo $row[3]."<br>";?></td>
				<td  align="center" style="width:150px;"><?php  echo $row[4];?></td>
				<td  align="center" style="width:150px;"><?php  echo $row[5];?></td>
				<td  align="center" style="width:150px;"><?php  echo $row['status'];?></td>
			
				
				<td align="center" style="width:150px;">
				
				<a onclick="show_confirm(<?php  echo $row['id'];?>,<?php  echo $row['user_id'];?>)"><button type="button" class="button_delete">Delete </button></a>
				
				</td>
				
				<td style="text-align: center; ">
				<?php if( $row['status']=='Pending'){
					?>
					
			
				
				<a onclick="show_confirm1(<?php  echo $row['id'];?>,<?php  echo $row['user_id'];?>)"><button type="button" class="btn btn-primary active">Publish </button></a>
				<?php
				}
				 else{
					 if($row['publish']==1)
					 {
					
						?>
							<a ><button type="button" class="btn btn-primary disabled " >Publish </button></a>
					<?php
					 }
					 else
					 {
                        ?>					
						
					<a onclick="show_confirm1(<?php  echo $row['id'];?>,<?php  echo $row['user_id'];?>)"><button type="button" class="btn btn-primary active">Publish </button></a>
				<?php
				 }}
				 ?>
					</td>
				
				</tr>
								
							<?php	
                            }
 
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <?php
    }
    ?>   
                </div>
            </div>
        </div>
        <div class="clear">
        </div>
    </div>
    <div class="clear">
    </div>
   <script type="text/JavaScript" language="JavaScript">

 function show_confirm($id,$user_id){
var c=confirm("Do you want to delete this Comment");
if(c==true)
{
window.location.href='comment_list.php?user_id='+$user_id+'&del='+$id+'';
return true;
}
}
function show_confirm1($id,$user_id){
var c=confirm("Do you want to publish this  Comment");
if(c==true)
{
window.location.href='comment_list.php?user_id='+$user_id+'&cm_id='+$id+'&publish=1';
return true;
}
}


</script>
    <?php	 	 
include('includes/footer.php'); 
?>

</body>
</html>
