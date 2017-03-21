<?php

include_once('common/header.php');
include('config.php');
if(isset($_POST['submit']))
{
$uname=$_POST['username'];
$section=$_POST['section'];
$rtype=$_POST['rtype'];
$query=mysql_query("UPDATE `cc_user` SET `username`='$uname',`section`='$section',`user_type`='$rtype' WHERE `username`='$uname'");
if($query)
{
echo "<script>alert('Values Updated Successfully'); </script>";
//header("location:single_user.php");
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
			<li>
				<a class="menu" href="single_user.php">Register Single User</a>
			</li>

			<li  class="active">
				<a class="menu"  data-toggle="tab"  href="existing_user.php">Register Existing User</a>
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
										</div>

											
<br>
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
	<!--here only-->
																									<!--here--->
	<br><br><br>																								
<div  class="space"></div>
			<?php include('common/footer.php'); ?>

			</body>
</html>
