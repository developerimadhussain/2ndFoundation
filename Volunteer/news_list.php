
<?php	
include('includes/header.php'); 
include('includes/navbar.php'); 
include('includes/sidebar.php'); 
?>
        <div class="grid_10">
		
            <div class="box round first grid">
                <h2 class="page-header" style="color:deeppink" > NEWS LIST</h2>
                <div class="block"> 
   <?php if(isset($_GET['del'])){
		$id=$_GET['del'];
	    require('database/Db_Connection.php');
        mysqli_query($con,"DELETE FROM news WHERE news_id='".$id."'") or die("can't Execute...");
      
		echo'
	<div style="width:300px;">
  <h2><li style="color:green; ">Successfully! News Deleted</li></h2>
</div></br>';

	}
	if(isset($_GET['publish'])){
		$publish=$_GET['publish'];
		$id=$_GET['news_id'];
	    require('database/Db_Connection.php');
        mysqli_query($con,"Update  news set publish='$publish' WHERE news_id='".$id."'") or die("can't Execute...");
      
		echo'
	<div style="width:300px;">
  <h2><li style="color:green; ">Successfully! News Published</li></h2>
</div></br>';

	}
	?>				
                 <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th  style="text-align: center;">SL.NO.</th>
                                    <th  style="text-align: center;">News Title</th>
									<th style="text-align: center;">News Detail</th>
                                    <th style="text-align: center;">Image</th>
                                    <th style="text-align: center;">Created Date</th>  
									<th style="text-align: center;">Status</th>									
                                    <th style="text-align: center;">Delete News</th>
                                    <th style="text-align: center;">Update News</th>
                                    <th style="text-align: center;">Publish News</th>
                                  
                                </tr>
                            </thead>
                            <tbody>

                               <?php
			                    $user_id=$_GET['user_id'];
                                $sql = "select * from news where user_id='$user_id' ORDER BY created_date DESC ";

                                $result = mysqli_query($con,$sql);

                                $response = array();
                                $count = 0;

                                while($row = mysqli_fetch_array($result))
                                {
									  $count++;
									?>
                                
                                  
								   <tr>
				 				 
				<td align="center" style="width:150px;"><?php  echo $count."<br>";?></td>
				<td align="center" style="width:150px;"><?php  echo $row[2]."<br>";?></td>
				<td align="center" style="width:150px;"><?php echo  strip_tags(substr($row[3],0,70)) ; echo '....'?></td>
				<td align="center"><img src="<?php echo 'image/'.$row[5];?>" height="100px" width="150px"></td>
				<td  align="center" style="width:150px;"><?php  echo $row[6];?></td>
				<td  align="center" style="width:150px;"><?php  echo $row[4];?></td>
			
				<td align="center" style="width:150px;">
				
				<a onclick="show_confirm(<?php  echo $row['news_id'];?>,<?php  echo $row['user_id'];?>)"><button type="button" class="button_delete">Delete </button></a>
				
				</td>
				<td align="center" style="width:150px;">
				
				<a href="news_update.php?news_id=<?php echo $row[0];?>&user_id=<?php echo $user_id;?>"><button type="button" class="update_button">Update </button></a>
				
				</td>
				<td align="center" style="width:150px;">
				<?php if( $row[4]=='Pending'){
					?>
			
				<a ><button type="button" class="btn btn-primary disabled " >Publish </button></a>
				<?php
				}
				 else{
					 if($row['publish']==1)
					 {
					
						?>
							<p  align="center" style="width:150px;">Publish</p>
					<?php
					 }
					 else
					 {
                        ?>					
						
					<a onclick="show_confirm1(<?php  echo $row['news_id'];?>,<?php  echo $row['user_id'];?>)"><button type="button" class="btn btn-primary active">Publish </button></a>
				<?php
				 }}
				?>
				</td>
				
				
				
			
				</tr>
								
							<?php	
                            }
 $count++;
                            ?>
                        </tbody>
                    </table>
                </div>
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
var c=confirm("Do you want to delete this news");
if(c==true)
{
window.location.href='news_list.php?user_id='+$user_id+'&del='+$id+'';
return true;
}
}
function show_confirm1($id,$user_id){
var c=confirm("Do you want to publish this news");
if(c==true)
{
window.location.href='news_list.php?user_id='+$user_id+'&news_id='+$id+'&publish=1';
return true;
}
}


</script>
    <?php	 
include('includes/footer.php'); 
?>
</body>
</html>


