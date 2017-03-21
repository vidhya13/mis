
<?php
//This page for mentor to adding their mentis 
ini_set('error_reporting', 0);
//include 'connect-db.php';
	$server = 'localhost';
 $user = 'root';
 $pass = '';
 $db = 'cc_db';
 
 // Connect to Database
 $connection = mysql_connect($server, $user, $pass) 
 or die ("Could not connect to server ... \n" . mysql_error ());
 mysql_select_db($db) 
 or die ("Could not connect to database ... \n" . mysql_error ());

$sql = "Select mentor_username,mentor_id from cc_mentors";
$result = mysql_query($sql);

/*session_start(); // start a session
if (isset($_SESSION['SESS_FIRST_NAME'])) { 	   // check if session user_id is set
	$username = $_SESSION['SESS_FIRST_NAME']; //if it is set, assign the value to the variable $userid
}
else { // if it is not set
	$username = ""; // assign a null value to $userid
}
*/													
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Autocomplete textbox using jQuery, PHP and MySQL by CodexWorld</title>
  <link rel="stylesheet" href="jquery-ui.css">
  <script src="jquery-1.10.2.js"></script>
  <script src="jquery-ui.js"></script>
  <script>
  $(function() {
    $( "#skills" ).autocomplete({
      source: 'validate.php'
    });
  });
  </script>
</head>
<body>
 
<div class="ui-widget">
	<form action="" method="post" class="form-horizontal" role="form">
													
													<div class="form-group" >
														<label class="col-sm-3 control-label no-padding-right" for="form-field-1">MentorName  </label>
														<div class="col-sm-9">
														<select name="mentor">
														<option value="">choose a mentor</option>
			<?php while ($row = mysql_fetch_array($result)) {
			
			$mentor_id=$row['mentor_id'];
			$mentor_username=$row['mentor_username'];
			?>
			<option value="<?php echo $mentor_username;?>"><?php echo $mentor_username;?></option>
			<?php } ?>
			</select>
														
														</div>	
														</div>
  <label for="skills">Enter username: </label>
  <input id="skills" name="menti_I">
  													
									<!--	<div class="clearfix form-actions">
										<div class="col-md-offset-3 col-md-9">
											<button class="btn btn-info" type="submit" name="submit">
												<i class="ace-icon fa fa-check bigger-110"></i>
												Add
											</button>

											</div>
									</div>-->
	<button type="submit"  value="Submit" name="submit">Add</button>					
														</form>

													
														
<?php
if(isset($_POST['submit'])){
// As output of $_POST['mentor']  to display individual value
	
	$mentor_username 	= $_POST['mentor'];
	$mentee_username 	= $_POST['menti_I'];
	
$check = "select * from cc_mentor_mentees where mentee_username='$mentee_username'";

$check_result=mysql_query($check);
$check_rows =mysql_num_rows($check_result);
if($check_rows > 0)
{
	//echo "exits already added";
	//echo $check_rows;
	echo "<script type=\"text/javascript\">window.alert('Mentee Already assigned.');
	window.location.href = ' /eg/project/assign_mentis.php';</script>"; 
	exit;
}
else{
	$sql1= "insert into cc_mentor_mentees(mentor_id,mentor_username,mentee_username,date,time,add_by) values ('".$mentor_id."','".$mentor_username."','".$mentee_username."',curdate(),curtime(),'".$mentor_username."')";
	$result = mysql_query($sql1);
	//or die(mysql_error());
	}
	}

//exit;
?>
  
</div>
</body>
</html>