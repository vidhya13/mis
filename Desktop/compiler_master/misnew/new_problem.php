<?php
//include('../config.php');


session_start(); // start a session
if (isset($_SESSION['SESS_FIRST_NAME'])) { 	   // check if session user_id is set
	$username = $_SESSION['SESS_FIRST_NAME']; //if it is set, assign the value to the variable $userid
}
else { // if it is not set
	$username = ""; // assign a null value to $userid
}
//echo "User ID: " . $userid; //print it on screen.
?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Dashboard - KG Cloud Coder Admin</title>

		<meta name="description" content="overview &amp; stats" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="assets/font-awesome/4.2.0/css/font-awesome.min.css" />

		<!-- page specific plugin styles -->

		<!-- text fonts -->
		<link rel="stylesheet" href="assets/fonts/fonts.googleapis.com.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
		<![endif]-->
	
		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="assets/css/ace-ie.min.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- ace settings handler -->
		<script src="assets/js/ace-extra.min.js"></script>

		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
		<![endif]-->
		
		<!--auto load script starts here-->
		
		
	</head>

	<body class="no-skin">
		<div id="navbar" class="navbar navbar-default">
			<script type="text/javascript">
				try{ace.settings.check('navbar' , 'fixed')}catch(e){}
			</script>

			<div class="navbar-container" id="navbar-container">
				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
					<span class="sr-only">Toggle sidebar</span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>				</button>

				<div class="navbar-header pull-left">
					<a href="index.html" class="navbar-brand">
						<small>
							<i class="fa fa-cloud"></i>
							KG Cloud Coder Admin</small></a></div>

				<div class="navbar-buttons navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">
		
						

						
						<li class="light-blue">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								
									
									<span class="user-info">
									<small>Welcome,</small>
									<?php echo $username; ?>								</span>

								<i class="ace-icon fa fa-caret-down"></i>							</a>

							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								

								<li>
									<a href="logout.php">
										<i class="ace-icon fa fa-power-off"></i>
										Logout									</a>								</li>
							</ul>
						</li>
					</ul>
				</div>
			</div><!-- /.navbar-container -->
		</div>
<form action="" method="post" class="form-horizontal" role="form" target="_self">
			
<div class="tab-content" id="h4">
											

												<div id="profile4" class="tab-pane in active">
											<!--	<iframe name="profile">-->
													<div class="row">
													<!--include here-->
													<div style="margin-left:10px">
			<input type="submit" class="btn btn-primary btn-sm" name="save" value="Save Problem!">
			<input type="submit" class="btn btn-primary btn-sm" name="st" value="Save and Test">
			<a href="mex.php"  style="margin-left:700px" class="btn btn-primary btn-sm"><< Back</a>
			
			<div><!--form start-->
			<div  style="margin:20px">
			<div class="form-group" >
			<label class="col-sm-2 control-label no-padding-right">Problem Type</label>
			<div class="col-sm-9">
			<select>
			<option>Select Problem Type</option>
			</select>
			</div>
			</div>
			
			<div class="form-group" >
			<label class="col-sm-2 control-label no-padding-right">Problem Name</label>
			<div class="col-sm-9">
			<input type="text" name="pname">
			</div>
			</div>
			<div class="form-group" >
			<label class="col-sm-2 control-label no-padding-right">Brief Description</label>
			<div class="col-sm-9">
			<input type="text" name="bdes">
			</div>
			</div>
			<div class="form-group" >
			<label class="col-sm-2 control-label no-padding-right">Full Description(HTML)</label>
			<div class="col-sm-9">
			<input type="text" name="bdes">
			</div>
			</div>
			<div class="form-group" >
			<label class="col-sm-2 control-label no-padding-right">Skeleton Code</label>
			<div class="col-sm-9">
			<input type="text" name="bdes">
			</div>
			</div>
			<div class="form-group" >
			<label class="col-sm-2 control-label no-padding-right">Author Name</label>
			<div class="col-sm-9">
			<input type="text" name="bdes">
			</div>
			</div>
			<div class="form-group" >
			<label class="col-sm-2 control-label no-padding-right">Author Email</label>
			<div class="col-sm-9">
			<input type="text" name="bdes">
			</div>
			</div>
			<div class="form-group" >
			<label class="col-sm-2 control-label no-padding-right">Website</label>
			<div class="col-sm-9">
			<input type="text" name="bdes">
			</div>
			</div>
			<div class="form-group" >
			<label class="col-sm-2 control-label no-padding-right">Creation Date</label>
			<div class="col-sm-9">
			<input type="text" class="datepicker" id="datepicker" name="admission_date">
			</div>
			</div>
			<div class="form-group" >
			<label class="col-sm-2 control-label no-padding-right">License</label>
			<div class="col-sm-9">
			<input type="text" name="bdes">
			</div>
			</div>
			<div class="form-group" >
			<label class="col-sm-2 control-label no-padding-right">URL for Required External Library</label>
			<div class="col-sm-9">
			<input type="text" name="bdes">
			</div>
			</div>
			<div class="form-group" >
			<label class="col-sm-2 control-label no-padding-right">MD5 checksum of required external library</label>
			<div class="col-sm-9">
			<input type="text" name="bdes">
			</div>
			</div>
			<div class="form-group" >
			<label class="col-sm-2 control-label no-padding-right">When assigned</label>
			<div class="col-sm-9">
			<input type="text" name="bdes">
			</div>
			</div>
			<div class="form-group" >
			<label class="col-sm-2 control-label no-padding-right">When due</label>
			<div class="col-sm-9">
			<input type="text" name="bdes">
			</div>
			</div>
			<div class="form-group" >
			<label class="col-sm-2 control-label no-padding-right">Problem visible to students</label>
			<div class="col-sm-9">
			<input type="ckeckbox" name="bdes">
			</div>
			</div>
			

										</div>	
										
			</div>		
</div>	
</form>								
	
<div  class="space"></div>
			<?php include('common/footer.php'); ?>
			</body>
</html>