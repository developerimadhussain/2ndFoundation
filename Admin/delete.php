<?php
require('database/Db_Connection.php');
session_start();
	$id = $_GET['id'];
	$value= $_GET['value'];
	if ($value==1){
	mysqli_query($con,"DELETE FROM user WHERE user_id='".$id."'");
	header("location:success.php?ref=1");
	}
	elseif ($value==2){
	mysqli_query($con,"DELETE FROM organization WHERE organization_id='".$id."'");
	header("location:success.php?ref=2");
	}
	elseif ($value==3){
	mysqli_query($con,"DELETE FROM news WHERE news_id='".$id."'");
	header("location:success.php?ref=5");
	}elseif ($value==4){
	mysqli_query($con,"DELETE FROM news WHERE causes_id='".$id."'");
	header("location:success.php?ref=5");
	}
	
?>