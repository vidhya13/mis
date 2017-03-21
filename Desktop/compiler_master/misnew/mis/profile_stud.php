
<?php

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
		<title>User Profile Page</title>

		<meta name="description" content="3 styles with inline editable feature" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="project/ace-master/assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="project/ace-master/assets/font-awesome/4.2.0/css/font-awesome.min.css" />

		<!-- page specific plugin styles -->
		<link rel="stylesheet" href="project/ace-master/assets/css/jquery-ui.custom.min.css" />
		<link rel="stylesheet" href="project/ace-master/assets/css/jquery.gritter.min.css" />
		<link rel="stylesheet" href="project/ace-master/assets/css/select2.min.css" />
		<link rel="stylesheet" href="project/ace-master/assets/css/datepicker.min.css" />
		<link rel="stylesheet" href="project/ace-master/assets/css/bootstrap-editable.min.css" />

		<!-- text fonts -->
		<link rel="stylesheet" href="project/ace-master/assets/fonts/fonts.googleapis.com.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="project/ace-master/assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="project/ace-master/assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
		<![endif]-->

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="project/ace-master/assets/css/ace-ie.min.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- ace settings handler -->
		<script src="project/ace-master/assets/js/ace-extra.min.js"></script>

		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<script src="project/ace-master/assets/js/html5shiv.min.js"></script>
		<script src="project/ace-master/assets/js/respond.min.js"></script>
		<![endif]-->
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
					<a href="#" class="navbar-brand">
						<small>
							<i class="ace-icon fa fa-user"></i>
							Profile				</small>					</a>				</div>

				<div class="navbar-buttons navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">
						
						
						

						<li class="light-blue">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								
								<span class="user-info">
									<small>Welcome</small> <?php echo $username; ?>	</span>

								<i class="ace-icon fa fa-caret-down"></i>							</a>

							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								

								

								<li class="divider"></li>

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

		<div class="main-container" id="main-container">
			<script type="text/javascript">
				try{ace.settings.check('main-container' , 'fixed')}catch(e){}
			</script>

			
	<div id="sidebar" class="sidebar                  responsive">
				<script type="text/javascript">
					try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
				</script>

				

				<ul class="nav nav-list">
					<li class="active">
						<a href="index_student.php">
							<i class="menu-icon fa fa-tachometer"></i>
							<span class="menu-text"> Home </span>						</a>

						<b class="arrow"></b>					</li>

					

					
						
				</ul><!-- /.nav-list -->

				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>				</div>

				<script type="text/javascript">
					try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
				</script>
			</div>

				
				

			<div class="main-content">
				<div class="main-content-inner">
					<div class="breadcrumbs" id="breadcrumbs">
						<script type="text/javascript">
							try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
						</script>

						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="index_student.php">Home</a></li>

							<li class="active">User Profile</li>
						</ul><!-- /.breadcrumb --><!-- /.nav-search -->
					</div>

					<div class="page-content">
						<div class="ace-settings-container" id="ace-settings-container">
						  <div class="ace-settings-box clearfix" id="ace-settings-box">
								

						</div><!-- /.ace-settings-box -->
					  </div><!-- /.ace-settings-container --><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<div>
									<div id="user-profile-1" class="user-profile row">
										
											


										<div class="col-xs-12 col-sm-9">
											

											<div class="space-12"></div>

											<div class="profile-user-info profile-user-info-striped">

												<div class="profile-info-row">
													<div class="profile-info-name" name="id">Name </div>

													<div class="profile-info-value">
														<span class="editable" id="username">Vishnu priya</span>													</div>
												</div>
												
												<div class="profile-info-row">
													<div class="profile-info-name"> User Id </div>

													<div class="profile-info-value">
														<span class="editable" id="">12csb54</span>													</div>
												</div>

												

												
												
												<div class="profile-info-row">
													<div class="profile-info-name">Email id</div>

													<div class="profile-info-value">
														<span class="editable" id="">vishnupriya.s2012@kgkite.ac.in</span>													</div>
												</div>
												

												
												
												<div class="profile-info-row">
													<div class="profile-info-name">Mentor Name  </div>

													<div class="profile-info-value">
														<span class="editable" id="">Jayashree</span>													</div>
												</div>
												
											

												<div class="profile-info-row">
													<div class="profile-info-name">Email id</div>

													<div class="profile-info-value">
														<span class="editable" id="">Jayashree@gmail.com</span>													</div>
												</div>
												
												<div class="profile-info-row">
													<div class="profile-info-name">Phone number</div>

													<div class="profile-info-value">
														<span class="editable" id="">8327463546</span>													</div>
												</div>
												
												<div class="profile-info-row">
													<div class="profile-info-name"> Mentor no </div>

													<div class="profile-info-value">
														<span class="editable" id="">8327463546</span>													</div>
												</div>
												
												
												
												

													
												</div>
											</div>
									  </div>
									</div>
								</div>
								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->

			<div class="footer">
				<div class="footer-inner">
					<div class="footer-content">							</div>
				</div>
			</div>

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>			</a>		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->
		<script src="project/ace-master/assets/js/jquery.2.1.1.min.js"></script>

		<!-- <![endif]-->

		<!--[if IE]>
<script src="project/ace-master/assets/js/jquery.1.11.1.min.js"></script>
<![endif]-->

		<!--[if !IE]> -->
		<script type="text/javascript">
			window.jQuery || document.write("<script src='project/ace-master/assets/js/jquery.min.js'>"+"<"+"/script>");
		</script>

		<!-- <![endif]-->

		<!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='project/ace-master/assets/js/jquery1x.min.js'>"+"<"+"/script>");
</script>
<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='project/ace-master/assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="project/ace-master/assets/js/bootstrap.min.js"></script>

		<!-- page specific plugin scripts -->

		<!--[if lte IE 8]>
		  <script src="project/ace-master/assets/js/excanvas.min.js"></script>
		<![endif]-->
		<script src="project/ace-master/assets/js/jquery-ui.custom.min.js"></script>
		<script src="project/ace-master/assets/js/jquery.ui.touch-punch.min.js"></script>
		<script src="project/ace-master/assets/js/jquery.gritter.min.js"></script>
		<script src="project/ace-master/assets/js/bootbox.min.js"></script>
		<script src="project/ace-master/assets/js/jquery.easypiechart.min.js"></script>
		<script src="project/ace-master/assets/js/bootstrap-datepicker.min.js"></script>
		<script src="project/ace-master/assets/js/jquery.hotkeys.min.js"></script>
		<script src="project/ace-master/assets/js/bootstrap-wysiwyg.min.js"></script>
		<script src="project/ace-master/assets/js/select2.min.js"></script>
		<script src="project/ace-master/assets/js/fuelux.spinner.min.js"></script>
		<script src="project/ace-master/assets/js/bootstrap-editable.min.js"></script>
		<script src="project/ace-master/assets/js/ace-editable.min.js"></script>
		<script src="project/ace-master/assets/js/jquery.maskedinput.min.js"></script>

		<!-- ace scripts -->
		<script src="project/ace-master/assets/js/ace-elements.min.js"></script>
		<script src="project/ace-master/assets/js/ace.min.js"></script>

		<!-- inline scripts related to this page -->
		
	</body>
</html>
