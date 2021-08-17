<?php
session_start();
require('database/Db_Connection.php');
session_destroy();
 header("location:../index.php");
?>