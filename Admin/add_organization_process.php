<?php
require('database/Db_Connection.php');
	if(!empty($_POST))
	{
    $name= $_POST['name'];
    $person= $_POST['person'];
    $mobile= $_POST['mobile'];
    $audience= $_POST['audience'];
    $detail = $_POST['detail'];
	$image=$_FILES['img']['name'];
	
    if ((strlen($name) == 0) || (strlen($detail) == 0) || (strlen($person) == 0) || (strlen($mobile) == 0) || (strlen($audience) == 0)  ) {
        echo '<script language="javascript">';
        echo 'alert("Please fill all the fields")';
        echo '</script>';
    }
				
			  else {
        $query = "SELECT * FROM organization WHERE organization_name='$name'";
        $result = mysqli_query($con,$query);      
        $count = mysqli_num_rows($result);    
        if ($count==0) {
			

         
		 $query1 ='INSERT INTO organization(user_id,organization_name,contact_person,mobile,target_audience,detail,image) VALUES (1,"'.$name.'","'.$person.'","'.$mobile.'","'.$audience.'","'.$detail.'","'.$image.'")';
         
           
			move_uploaded_file($_FILES['img']['tmp_name'],"image/".$_FILES['img']['name']);
			
			$res=mysqli_query($con,$query1);
	     header("location:add_organization.php?ok=1");
			
		}
        else {
            echo '<script language="javascript">';
            echo 'alert("Sorry this item already exists.")';
            echo '</script>';
        }
    }
	}

?>