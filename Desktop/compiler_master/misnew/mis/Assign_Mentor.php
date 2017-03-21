<?php
/* 
 Assign_Mentor.PHP
 It will update the user to mentor
*/

 // connect to the database
 include'connect-db.php';
 //to remove notice and warning errors
 ini_set('error_reporting', 0);
 
 
 // check if the 'id' variable is set in URL, and check that it is valid
 if (isset($_GET['id']) && is_numeric($_GET['id']))
 {
	 //if(isset($_GET['username']))
 //{
 // get id value
 $id 		= $_GET['id'];
 $username 	= $_GET['username'];
 // update entry
 $sql = "UPDATE cc_users SET IsMentor='yes' WHERE id=$id";
 $result = mysql_query($sql) or die(mysql_error());
 
 if($result > 0) {
	 echo'mentor assigned';
	 //$sql=mysql_query("INSERT INTO cc_mentor_mentis(id,username,) VALUES ('$id','$username')") or die(mysql_error());
	// $sql=mysql_query("insert into mentor_mentis(id,username) values ('$id','$username')") or die(mysql_error());
	  
	  $sql=mysql_query("insert into cc_mentors(mentor_id,mentor_username,date,time) values ('".$id."','".$username."',curdate(),curtime())") or die(mysql_error());
	 
	header("Location: cc_mentor_details.php");
 }
 else {
	 echo 'error1';
 }
 
 // redirect back to the view page
 //}
 }
 else
 // if id isn't set, or isn't valid, redirect back to view page
 {
 //header("Location: cc_students_details.php");
 echo 'error2';
 }
 
 
?>