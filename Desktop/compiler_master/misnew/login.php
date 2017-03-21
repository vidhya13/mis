<html>
<body>

<?php
//Start session
session_start();
 
//Include database connection details
require_once('connect-db.php');
  
//Function to sanitize values received from the form. Prevents SQL injection
function clean($str) {
$str = @trim($str);
if(get_magic_quotes_gpc()) {
$str = stripslashes($str);
}
return mysql_real_escape_string($str);
}
 
//Sanitize the POST values
$username = clean($_POST['text_username']);
$password = clean($_POST['text_password']);
 
 
//Input Validations
if($username  == "" || $password == "")
	{
		echo '<script>alert("Please Fill up all fields!");</script>';
		echo "<script>window.location.href='index.php';</script>";	
		exit();
	}
//Create query
$qry="SELECT * FROM cc_users WHERE username='$username' AND password='$password'";

$result=mysql_query($qry);
 
//Check whether the query was successful or not
if($result) {
if(mysql_num_rows($result) > 0) {

	
//Login Successful
session_regenerate_id();
$member = mysql_fetch_assoc($result);
$_SESSION['SESS_MEMBER_ID'] = $member['id'];
$_SESSION['SESS_FIRST_NAME'] = $member['username'];
//$_SESSION['SESS_LAST_NAME'] = $member['password'];
$_SESSION['SESS_USER_ROLE'] = $member['IsMentor'];

	//enter user login and logout date & username
	$query="insert into user_log (username,login_date,user_id)values('".$member['username']."',NOW(),'".$member['id']."')";
	$result1=mysql_query($query)or die(mysql_error()); 
		

session_write_close();
 if(($_SESSION['SESS_MEMBER_ID'] =="33")or($_SESSION['SESS_MEMBER_ID'] =="1") )
 {
	header("location: exercise.php");
 }
 else if($_SESSION['SESS_USER_ROLE']=="yes")
 {
	header("location: index_mentor.php");
 }
 else if($_SESSION['SESS_USER_ROLE']=="no")
 {
	 header ("location: index_student.php");
 }
exit();
}

else {
//Login failed
	//$error="101";
	header("location: index.php?error='404'");
	
	

	}
}
else 
{
	die("Query failed");
}

?>
</body>
</html>