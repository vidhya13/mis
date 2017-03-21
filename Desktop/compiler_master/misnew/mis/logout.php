<?php
include('connect-db.php');
session_start(); // start a session
if (isset($_SESSION['SESS_MEMBER_ID'])) { 	   // check if session user_id is set
	$session_id = $_SESSION['SESS_MEMBER_ID']; //if it is set, assign the value to the variable $userid
}
else { // if it is not set
	$session_id = ""; // assign a null value to $userid
}
//echo "User ID: " . $userid; //print it on screen.
$query="update user_log set logout_Date = NOW() where user_id = '$session_id'";
$result=mysql_query($query)or die(mysql_error());
session_destroy();
header('location:index.php'); 
?>