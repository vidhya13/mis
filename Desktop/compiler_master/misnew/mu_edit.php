<?php
include('common/header.php');
include('config.php');
if(isset($_GET['id']))
	{
		$id=$_GET['id'];
		if(isset($_POST['submit']))
			{
				$uname=$_POST['username'];
				$fname=$_POST['firstname'];
				$lname=$_POST['lastname'];
				$email1=$_POST['email'];
				$query3=mysql_query("update cc_users set username='$uname', firstname='$fname', lastname='$lname', 
				email='$email1' where user_id='$id'");
				if($query3)
					{
						header('Location:manage_user.php');
					}
			}
		$query=mysql_query("select * from cc_users where user_id='$id'");
		$row=mysql_fetch_array($query);
?>
<html>
	<head>
		<style>
		</style>
	</head>
	<body>
		<div class="col-sm-12" style="padding-top:10px">
			<div class="tabbable">
				<ul class="nav nav-tabs padding-12 tab-color-blue background-blue" id="myTab4">
					<li><a class="menu" href="single_user.php">Register Single User</a></li>
					<li><a class="menu" href="existing_user.php">Register Existing User</a></li>
					<li><a class="menu" href="bulk_user.php">Bulk User Registration</a></li>
					<li class="active"><a class="menu"  data-toggle="tab" href="#profile4">Manage Users</li>
				</ul>
					<div class="tab-content" id="h4">
						<div id="profile4" class="tab-pane in active">
							<!--	<iframe name="profile">-->
							<div class="row">
							<!--include here-->
								<div><!--form start-->
									<form action="" method="post" class="form-horizontal" role="form" target="_self">
									<div class="col-sm-12">
											<div class="form-group" >
												<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Username</label>
												<div class="col-sm-9">
													<input type="text" name="username" class="col-xs-6 col-sm-4" value="<?php echo $row['username']; ?>" />
												</div>
											</div>
											<div class="form-group" >
												<label class="col-sm-3 control-label no-padding-right" for="form-field-1">FirstName</label>
												<div class="col-sm-9">
													<input type="text" name="firstname" class="col-xs-6 col-sm-4"  value="<?php echo $row['firstname']; ?>"/>
												</div>
											</div>
											<div class="form-group" >
												<label class="col-sm-3 control-label no-padding-right" for="form-field-1" >LastName</label>
												<div class="col-sm-9">
													<input type="text" name="lastname" class="col-xs-6 col-sm-4"  value="<?php echo $row['lastname']; ?>"/>
												</div>
											</div>
											<div class="form-group" >
												<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Email</label>
												<div class="col-sm-9">
													<input type="text" name="email" class="col-xs-6 col-sm-4" value="<?php echo $row['email']; ?>" />
												</div>
											</div>
											<div class="col-md-offset-3 col-md-4">
												<input class="btn btn-info" type="submit" name="submit" value="Submit">
												<a href="manage_user.php" class="btn btn-info">Back</a>
											</div>
									</form>
								</div>	
							</div>		
						</div>
	</body>
	<?php } ?>
</html>
						
