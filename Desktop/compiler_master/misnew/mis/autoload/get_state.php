<?php
require_once("dbcontroller.php");
$db_handle = new DBController();
if(!empty($_POST["username"])) {
	$username=$_POST['username'];
	//echo $userId;
	//$query ="SELECT * FROM states WHERE countryID = '" . $_POST["country_id"] . "'";
	$query="select id from cc_users where username='$username'";
	$results = $db_handle->runQuery($query);
	foreach($results as $row1){
		$userId=$row1['id'];
	}
	$query ="SELECT course_id, title FROM cc_courses INNER JOIN (select * from cc_course_registrations where user_id = '" .$userId. "') AS cc ON cc_courses.id = cc.course_id";
	$results = $db_handle->runQuery($query);
?>
	<option value="">Select Course</option>
<?php
	foreach($results as $state) {
?>
	<option value="<?php echo $state["course_id"]; ?>"><?php echo $state["title"]; ?></option>
<?php
	}
}
?>