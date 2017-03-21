<?php
include('config.php');
include('common/header.php');
include('config.php');
if(isset($_POST['submit']))
{
$uname=$_POST['username'];
$pass=$_POST['password'];
$cpass=$_POST['cpassword'];
$query=mysql_query("UPDATE `cc_users` SET `username`='$uname',`password`='$pass',`confirm_password`='$cpass' WHERE `username`='$uname'");
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



											<div class="tab-content" id="h4 tab1">
												<div id="home4" class="tab-pane in active">
												
												<div class="row">
													
													<div><!--form start-->
			<form action="" method="post" class="form-horizontal" role="form">
			<div class="col-sm-12">
											
			<div class="form-group" >
			<center><h3>Change your password</h3></center>
			<hr></hr>
			<div class="form-group" >
												<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Username</label>
												<div class="col-sm-9">
													<input type="text" name="username" list="datalist-2" placeholder="Enter username" id="form-field-1"  class="col-xs-6 col-sm-4"  />
												</div>
											</div>
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Enter a new password</label>
			<div class="col-sm-9">
			<input type="text" name="password" list="datalist-2" placeholder="Password" id="form-field-1"  class="col-xs-6 col-sm-4" />
			</div>
			</div>
			<div class="form-group" >
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Re-enter password</label>
			<div class="col-sm-9">
			<input type="text" name="cpassword" list="datalist-2" placeholder="Password" id="form-field-1"  class="col-xs-6 col-sm-4" />
			</div>
			</div>
			<br>
			<div class="col-md-offset-3 col-md-4">
											<input class="btn btn-info" type="submit" name="submit" value="Update Password">
												
												
										
											</div><br>
		
										</div>	
										
</div>												
			</div>


			
</form>		
<!--php script for live table-->
	<br><br><br>

<div  class="space"></div>
			<?php include('common/footer.php'); ?>

			</body>
</html>
