 <?php 
require('database/Db_Connection.php');

    if(isset($_POST['submit']))
    {
        $name=$_POST['name'];
        $lat=$_POST['lat'];
        $lng=$_POST['lng'];
        $location=$_POST['loc'];
		
	
				 $query2 = "SELECT organization_id FROM organization WHERE organization_name='$name'";
                $result2 = mysqli_query($con,$query2);
                if($row2 = $result2->fetch_assoc())
				{
					$organization_id=$row2['organization_id'];
					echo $organization_id;
				}					
				
				echo $lat;
				echo $location;
				echo $lng;
				echo $name;
				
			 $query3 ='INSERT INTO `map`(`organization_id`,`name`,`address`,`lat`,`lng`)VALUES ("'.$organization_id.'","'.$name.'","'.$location.'","'.$lat.'","'.$lng.'")';
			 $res3=mysqli_query($con,$query3);
             if($res3){
				  header("location:add_map.php?ok=1");
			
           
			 }
        
		
        
    }
?>
 
 
 