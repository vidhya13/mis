<?php
require_once("dbcontroller.php");
$db_handle = new DBController();
if(!empty($_POST["course_id"])) {
	$courseId=$_POST['course_id'];
	//$query ="SELECT * FROM states WHERE countryID = '" . $_POST["country_id"] . "'";
	$query ="SELECT course_id, title FROM cc_courses INNER JOIN (select * from cc_course_registrations ) AS cc ON cc_courses.id = cc.course_id where course_id='$courseId'" ;
	$results = $db_handle->runQuery($query);
	foreach($results as $course)
	{
		$courseID=$course['course_id'];
	}
	$query ="SELECT problem_id, testname FROM cc_problems WHERE course_id = '$courseID' and visible = '1'";
	$results = $db_handle->runQuery($query);

?>
	<option value="">Select problem</option>
<?php
	foreach($results as $problem) {
?>
	<option value="<?php echo $problem["problem_id"]; ?>"><?php echo $problem["testname"]; ?></option>
<?php
	}
}
?>