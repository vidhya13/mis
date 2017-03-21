<?php

include('common/header.php');
include('config.php');
if(isset($_POST['submit']))
{
$file = 'tableData.txt';

// read file into array

$data = file($file) or die('Could not read file!');

//go through the lines in the array

foreach ($data as $line)

{

//extract the variables

list($uname,$fname,$lname,$email,$pass,$phonenumber)=explode(",",$line);
$sql="INSERT INTO cc_user (username,firstname,lastname,email,password,mobile_no) VALUES ('$uname','$fname','$lname','$email','$pass','$phonenumber')";
if(mysql_query($sql))
{
header("location:single_users.php");
}
if ( !mysql_query($sql) ) {

echo("<P>Error inserting data: " .

mysql_error() . "</P>");

}

}
}
?>
					<!--here for the change-->
				<div class="col-sm-12" style="padding-top:10px">
										<div class="tabbable">
											<ul class="nav nav-tabs padding-12 tab-color-blue background-blue" id="myTab4">
												<li >
													<a class="menu" href="single_user.php">Register Single User</a>
												</li>

												<li  >
													<a class="menu" href="existing_user.php">Register Existing User</a>
												</li>

												<li class="active">
													<a class="menu"  data-toggle="tab"  href="#profile4">Bulk User Registration</a>
												</li>
												<li>
													<a class="menu" href="manage_user.php">Manage Users</a>
												</li>
											</ul>

											<div class="tab-content" id="h4">
											

												<div id="profile4" class="tab-pane in active">
											<!--	<iframe name="profile">-->
													<div class="row">
													<!--include here-->
			<?php
			ini_set('error_reporting', 0);
			require_once("dbcontroller.php");
			$db_handle = new DBController();
			//$query="SELECT course_id, title FROM cc_courses INNER JOIN (select * from cc_course_registrations) AS cc ON cc_courses.id = cc.course_id";
			$query="SELECT id, title FROM cc_courses ";

			$results = $db_handle->runQuery($query);
			
			
			?>
			
													<div><!--form start-->
			<form action="" method="post" class="form-horizontal" role="form" target="_self">
			<div class="active">
			<div class="form-group" >

			<label class="col-sm-8 control-label no-padding-right" for="form-field-1"><b>File should be tab-delimited in format:</b><i> username,firstname,lastname,email,password,MobileNumber</i></label><br>
			
			</div>
			
			<div class="form-group" >

			<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Filename</label>
			<div class="col-sm-9">
			<input type="file" name="course_name" list="course_list-2" placeholder="select course" id="state-list"  class="col-xs-6 col-sm-8" onChange="getProblems(this.value);"  />
			
			
			</div>	
			</div>	
			
			

											
<br>
<br>

										<div class="col-md-offset-3 col-md-4">
												<input class="btn btn-info" type="submit" name="submit" value="Submit">
											
											<button class="btn" type="reset">
												<i class="ace-icon fa fa-undo bigger-110"></i>
												Reset
											</button>

										</div>	
										<!--	<div class="col-md-offset-0 col-md-1">
											<button class="btn" type="reset">
												<i class="ace-icon fa fa-undo bigger-110"></i>
												Reset
											</button>
											</div>-->
			</div>		
</div>			
	</form>								
	
	<!--here only-->
																									<!--here--->
																									
<br>
<br><br><br><br><br><br>
<div  class="space"></div>
			<?php include('common/footer.php'); ?>

			</body>
</html>
