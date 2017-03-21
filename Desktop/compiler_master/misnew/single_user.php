<?php

include('common/header.php');
include('config.php');
if(isset($_POST['submit']))
{
	$user=$_POST['username'];
	$first=$_POST['firstname'];
	$last=$_POST['lastname'];
	$pass=$_POST['password'];
	$cpass=$_POST['cpassword'];
	$email=$_POST['email'];
	$aemail=$_POST['altemail'];
	$web=$_POST['website'];
	$mno=$_POST['mobileno'];
	$dept=$_POST['department'];
	$coll=$_POST['college'];
	$year=$_POST['year'];
	$rtype=$_POST['rtype'];
	$sec=$_POST['section'];
	$ismen= $_POST['mentor'];
	$isem= $_POST['isemail'];
	$query=mysql_query("INSERT INTO `cc_user`(`username`, `firstname`, `lastname`, `email`, `alt_email`,
	`password`, `confirm_password`, `website`, `mobile_no`, `department`, `college`, `year`, `user_type`, `section`,`ismentor`,`isemail`)
	VALUES ('".$user."','".$first."','".$last."','".$email."','".$aemail."','".$pass."','".$cpass."','".$web."','".$mno."','".$dept."',
	'".$coll."','".$year."','".$rtype."','".$sec."','".$ismen."','".$isem."')");
	if($query)
	{
		echo "<script>alert('Values Inserted Successfully'); </script>";

	}
	else
	{
		die(mysql_error());

	}
}
?>
<!--here for the change-->
<div class="col-sm-12" style="padding-top:10px">
	<div class="tabbable">
		<ul class="nav nav-tabs padding-12 tab-color-blue background-blue" id="myTab4">
			<li class="active">
				<a class="menu" data-toggle="tab" href="#home4">Register Single User</a>
			</li>

			<li >
				<a class="menu"  href="existing_user.php">Register Existing User</a>
			</li>

			<li>
				<a class="menu"  href="bulk_user.php">Bulk User Registration</a>
			</li>
			<li>
				<a class="menu"  href="manage_user.php">Manage Users</a>
			</li>

		</ul>

		<div class="tab-content" id="h4">
			<div id="home4" class="tab-pane in active">

				<div class="row">

					<div><!--form start-->
						<form action="" method="post" class="form-horizontal" role="form">
							<div class="col-sm-12">
								<div class="form-group" >
									<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Username</label>
									<div class="col-sm-9">
										<input type="text" name="username" list="datalist-2" placeholder="select username" id="form-field-1"  class="col-xs-6 col-sm-4"  />
									</div>
								</div>
								<div class="form-group" >
									<label class="col-sm-3 control-label no-padding-right" for="form-field-1">FirstName</label>
									<div class="col-sm-9">
										<input type="text" name="firstname" list="datalist-2" placeholder="Enter FirstName" id="form-field-1"  class="col-xs-6 col-sm-4"  />
									</div>
								</div>
								<div class="form-group" >
									<label class="col-sm-3 control-label no-padding-right" for="form-field-1">LastName</label>
									<div class="col-sm-9">
										<input type="text" name="lastname" list="datalist-2" placeholder="Enter LastName" id="form-field-1"  class="col-xs-6 col-sm-4"  />
									</div>
								</div>
								<div class="form-group" >
									<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Password</label>
									<div class="col-sm-9">
										<input type="text" name="password" list="datalist-2" placeholder="Enter Password" id="form-field-1"  class="col-xs-6 col-sm-4"  />
									</div>
								</div>
								<div class="form-group" >
									<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Confirm Password</label>
									<div class="col-sm-9">
										<input type="text" name="cpassword" list="datalist-2" placeholder="Confirm Password" id="form-field-1"  class="col-xs-6 col-sm-4"  />
									</div>
								</div>
								<div class="form-group" >
									<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Email</label>
									<div class="col-sm-9">
										<input type="text" name="email" list="datalist-2" placeholder="Enter Email" id="form-field-1"  class="col-xs-6 col-sm-4"  />
									</div>
								</div>
								<div class="form-group" >
									<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Alternate Email</label>
									<div class="col-sm-9">
										<input type="text" name="altemail" list="datalist-2" placeholder="Enter AltEmail" id="form-field-1"  class="col-xs-6 col-sm-4"  />
									</div>
								</div>
							</div>
							<div class="col-sm-12">
								<div class="form-group" >
									<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Website</label>
									<div class="col-sm-9">
										<input type="text" name="website" list="datalist-2" placeholder="Enter Website" id="form-field-1"  class="col-xs-6 col-sm-4"  />
									</div>
								</div>
								<div class="form-group" >
									<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Mobile number</label>
									<div class="col-sm-9">
										<input type="text" name="mobileno" list="datalist-2" placeholder="Enter MobileNumber" id="form-field-1"  class="col-xs-6 col-sm-4"  />
									</div>
								</div>
								<div class="form-group" >
									<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Department</label>
									<div class="col-sm-9">
										<input type="text" name="department" list="datalist-2" placeholder="Enter Department" id="form-field-1"  class="col-xs-6 col-sm-4"  />
									</div>
								</div>
								<div class="form-group" >
									<label class="col-sm-3 control-label no-padding-right" for="form-field-1">College</label>
									<div class="col-sm-9">
										<input type="text" name="college" list="datalist-2" placeholder="Enter College" id="form-field-1"  class="col-xs-6 col-sm-4"  />
									</div>
								</div>
								<div class="form-group" >
									<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Year</label>
									<div class="col-sm-9">
										<input type="text" name="year" list="datalist-2" placeholder="Enter Year" id="form-field-1"  class="col-xs-6 col-sm-4"  />
									</div>
								</div>
								<div class="form-group" >
									<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Section</label>
									<div class="col-sm-9">
										<input type="text" name="section" list="datalist-2" placeholder="Enter Section" id="form-field-1"  class="col-xs-6 col-sm-4"  />
									</div>
								</div>
								<div class="form-group" >
									<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Register type</label>
									<div class="col-sm-9">
										<select class="col-xs-6 col-sm-4" name="rtype">
											<option value="student">Student</option>
											<option value="instructor">Instructor</option>
										</select>
									</div>
								</div>
								<div class="form-group" >
									<label class="col-sm-3 control-label no-padding-right" for="form-field-1">IsMentor?</label>
									<div class="col-sm-3">
										<input type="checkbox" name="mentor" value="1"> Yes<br>
										<input type="checkbox" name="mentor" value="0" checked> No<br>
									</div>
									<div class="col-sm-3">
										<label class="" for="">Enable Email?</label>
										<input type="checkbox" name="isemail" value="1"> Yes<br>
										<input type="checkbox" name="isemail" value="0" style="padding-right:50px" checked> No<br>
									</div>
								</div>
							</div>
					</div>
					<br>
					<br>
					<div class="col-md-offset-3 col-md-4">
						<input class="btn btn-info" type="submit" name="submit" value="Submit">
						<button class="btn" type="reset">
							<i class="ace-icon fa fa-undo bigger-110"></i>Reset
						</button>
					</div>
				</div>
			</div>
			</form>
			<div  class="space"></div>
			<?php include('common/footer.php'); ?>
			</body>
			</html>
