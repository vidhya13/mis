<?php
ini_set('error_reporting', 0);
require_once("dbcontroller.php");
$db_handle = new DBController();
$query ="SELECT id,username FROM cc_users";
$results = $db_handle->runQuery($query);
//https://code.jquery.com/jquery-2.1.1.min.js
?>
<html>
<head>
<TITLE>jQuery Dependent DropDown List - Countries and States</TITLE>
<head>
<!--<style>
body{width:610px;}
.frmDronpDown {border: 1px solid #F0F0F0;background-color:#C8EEFD;margin: 2px 0px;padding:40px;}
.demoInputBox {padding: 10px;border: #F0F0F0 1px solid;border-radius: 4px;background-color: #FFF;width: 50%;}
.row{padding-bottom:15px;}
</style>-->
<script src="autoselect.js" type="text/javascript"></script>
<script>
function getState(val) {
	$.ajax({
	type: "POST",
	url: "get_state.php",
	data:'username='+val,
	success: function(data){
		$("#state-list").html(data);
	}
	});
}
function getProblem(val) {
	$.ajax({
	type: "POST",
	url: "get_problem.php",
	data:'course_id='+val,
	success: function(data){
		$("#problem-list").html(data);
	}
	});
}

function selectCountry(val) {
$("#search-box").val(val);
$("#suggesstion-box").hide();
}
</script>
</head>
<body>
<form method="post" action="index.php">
<div class="frmDronpDown">
<div class="row">
<label>Username:</label><br/>
<input type="text"  list="datalist-1" id="country-list" class="demoInputBox" onChange="getState(this.value);" name="username" required/>
<datalist id="datalist-1">

<?php
foreach($results as $country) {
	
?>
<option value="<?php echo $country["username"]; ?>"><?php echo $country["id"]; ?></option>
<?php
}
?>
</datalist>
</div>
<div class="row">
<label>course:</label><br/>
<select name="course_name" id="state-list" class="demoInputBox"onChange="getProblem(this.value);">
<option value="">Select Course</option>
</select>
</div>

<div class="row">
<label>problem:</label><br/>
<select name="problem_name" id="problem-list" class="demoInputBox" >
<option value="">Select problem</option>
</select>
</div>
</div>
<button type="submit" name="submit" value="submit">Add</button> 
</form>
<?php
$server = '10.100.1.153';
 $user = 'demo';
 $pass = 'demo@123';
 $db = 'cloudcoderdb';
 
 // Connect to Database
 $connection = mysql_connect($server, $user, $pass) 
 or die ("Could not connect to server ... \n" . mysql_error ());
 mysql_select_db($db) 
 or die ("Could not connect to database ... \n" . mysql_error ());

if(isset($_POST['submit']))
{
	//include('connect-db.php'); 
	
	$username		=	$_POST['username'];
	//$user_id 		=	$_POST['id'];
	$course_id		=	$_POST['course_name'];
	$problem_id		=	$_POST['problem_name'];
	
	//echo $user_id;
	//echo $course_name;
	//echo"prob";
	//echo $problem_name;
	$sql = " select * from cc_users WHERE username= '$username'";

		
	
	$result=mysql_query($sql) or die(mysql_error());
	while($row=mysql_fetch_array($result))
	{
		$user_id=$row['id'];
		
	}	
		//echo $user_id;
		//$sql1="select s.event_id,e.user_id,u.username,e.problem_id,p.course_id,p.testname,cc.name,cc.title,u.email,t.name,cc.year, s.num_tests_attempted,s.num_tests_passed from cc_events e,cc_users u,cc_submission_receipts s,cc_courses cc,cc_problems p,cc_terms t where cc.id ='$course_id' and s.event_id=e.id and u.id='$user_id' and e.problem_id='$problem_id'  ";	
	
		
	//$sql1="select s.event_id,e.user_id,u.username,e.problem_id,p.course_id,p.testname,cc.name,cc.title,u.email,t.name,cc.year, s.num_tests_attempted,s.num_tests_passed from cc_events e,cc_users u,cc_submission_receipts s,cc_courses cc,cc_problems p,cc_terms t where cc.id ='$course_id'and u.id='$user_id' and e.problem_id='$problem_id' limit 1";	
	
	$sql1="select s.event_id,e.user_id,u.username,e.problem_id,p.course_id,p.testname,cc.name,cc.title,u.email,t.name,cc.year, s.num_tests_attempted,s.num_tests_passed from cc_events e,cc_users u,cc_submission_receipts s,cc_courses cc,cc_problems p,cc_terms t where cc.id =p.course_id and s.event_id=e.id and u.id=e.user_id and e.problem_id=p.problem_id and t.id=cc.term_id and cc.id ='$course_id'and u.id='$user_id' and e.problem_id='$problem_id' order by event_id DESC limit 1";
	
	$result1=mysql_query($sql1) or die(mysql_error());
			
	//echo $result1;
	//$row=mysql_fetch_row($result);
	//echo $result;
	//$row=mysql_fetch_array($result)
	//
	//$row = mysql_fetch_row($result);
	//echo $row;

?>
<table>
												<thead>
													<tr>
													<th>ID</th>	
													<th>Username</th>
													<th>Problem name</th>
													<th>Coursename</th>
													<th>Attempted TC</th>
													<th>Passed TC</th>
																									<!--	<th>Time</th>-->
													</tr>
												</thead>

												<tbody>
													
	<?php while($row1=mysql_fetch_array($result1))
	{
 echo $row1;?>
												<tr>
				<td><?php echo $row1['event_id'];?></td>
				
				<td><?php echo $row1['username']; ?></td>
	     		
				<td><?php echo $row1['title']; ?></td>
				
				<td><?php echo $row1['testname']; ?></td>
				
				<td><?php echo $row1['num_tests_attempted']; ?></td>
				
				<td><?php echo $row1['num_tests_passed']; ?></td>
				
				
				
			

													
												</tr>

<?php }} ?>
													

													

												</tbody>
											</table>
</body>
</html>