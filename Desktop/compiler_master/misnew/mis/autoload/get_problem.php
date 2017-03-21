<?php
require_once("dbcontroller.php");
$db_handle = new DBController();
if(!empty($_POST["course_id"])) {
	$courseId=$_POST['course_id'];
	//$query ="SELECT * FROM states WHERE countryID = '" . $_POST["country_id"] . "'";
	$query ="SELECT problem_id, testname FROM cc_problems WHERE course_id = '" . $courseId . "' and visible = '1'";
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