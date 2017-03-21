<?php
include('connect-db.php');
include('session.php');
$conn->query("update user_log set logout_Date = NOW() where user_id = '$session_id' ")or die(mysql_error());
session_destroy();
header('location:index_login.html'); 
?>