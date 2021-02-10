<?php

require('database/Db_Connection.php');
if(isset($_GET['vkey'])){
	
$vkey=$_GET['vkey'];
$query="SELECT verified,vkey FROM user WHERE verified=0 AND vkey='$vkey' LIMIT 1";
$result = mysqli_query($con, $query);
     if(mysqli_num_rows($result) > 0)
    {
		$update="UPDATE  user  SET verified=1 WHERE vkey='$vkey' LIMIT 1";
		$result = mysqli_query($con, $update);
			if($result)
			{
				
               
				header("location:index.php");
			}
			else
			{
				echo $mysqli->error;
			}
	}
	else
	{
			echo"This account invalid or Already verified";
			
			
	}
}
else
{
	die("Something went worng");
	
}
	
?>
	
	
	