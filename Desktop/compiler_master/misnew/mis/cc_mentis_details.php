<?php
ini_set('error_reporting', 0);
include('connect-db.php');
session_start(); // start a session
if (isset($_SESSION['SESS_FIRST_NAME'])) { 	   // check if session user_id is set
	$username = $_SESSION['SESS_FIRST_NAME']; //if it is set, assign the value to the variable $userid
}
else { // if it is not set
	$username = ""; // assign a null value to $userid
}
$sql = "select id,username from cc_users where IsMentor='yes'";
$result = mysql_query($sql);



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
			<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<script src="assets/js/html5shiv.min.js"></script>
		<script src="assets/js/respond.min.js"></script>
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

					<span class="icon-bar"></span>
				</button>

				<div class="navbar-header pull-left">
					<a href="#" class="navbar-brand">
						<small>
							<i class="fa fa-cloud"></i>
							KG Cloud Coder Admin
						</small>
					</a>
				</div>

				<div class="navbar-buttons navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">
						

						
						

						<li class="light-blue">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								
								<span class="user-info">
									<small>Welcome,</small>
									<?php echo $username; ?>
								</span>

								<i class="ace-icon fa fa-caret-down"></i>
							</a>

							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								

								<li>
									<a href="logout.php">
										<i class="ace-icon fa fa-power-off"></i>
										Logout
									</a>
								</li>
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
					<li class="">
						<a href="index_admin.php">
							<i class="menu-icon fa fa-tachometer"></i>
							<span class="menu-text"> Dashboard </span>
						</a>

						<b class="arrow"></b>
					</li>

					
					<li class="no-padding-bottom">
						<a href="cc_students_details.php">
						 <i class="menu-icon fa fa-graduation-cap"></i>
						<span class="menu-text"><small><b> Student Details</b></small> </span>						</a>

						<b class="arrow"></b>		</li>
						
					<li class="no-padding-bottom">
						<a href="cc_mentor_details.php">
						    
							<i class="menu-icon glyphicon  glyphicon-user"></i>
							<span class="menu-text"><small><b> Mentor Details</b></small> </span>						</a>

						<b class="arrow"></b>					</li>
					
					<li class="active">
						<a href="#">
						    
							<i class="menu-icon fa fa-users"></i>
							<span class="menu-text"><small><b> Mentor & Mentee Details</b></small> </span>						</a>

						<b class="arrow"></b>					</li>	
						
					<li class="no-padding-bottom">
						<a href="assign_mentis.php">
						    
							<i class="menu-icon fa fa-plus"></i>
							<span class="menu-text"><small><b> Assign Mentee Here</b></small> </span>						</a>

						<b class="arrow"></b>					</li>
						
						<li class="no-padding-bottom">
						<a href="cc_userlog.php">
						    
							<i class="menu-icon fa fa-eye"></i>
							<span class="menu-text"><small><b> User log</b></small> </span>						</a>

						<b class="arrow"></b>					</li>	
					
					<li class="no-padding-bottom">
						<a href="graph_view.php">
						    
							<i class="menu-icon fa fa-bar-chart-o"></i>
							<span class="menu-text"><small><b> Graph View</b></small> </span>						</a>

						<b class="arrow"></b>					</li>	

					

					
					

				</ul><!-- /.nav-list -->

				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>

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
								<a href="index_admin.php">Home</a>
							</li>

							
							<li class="active">View Mentees under the Mentor</li>
						</ul><!-- /.breadcrumb -->

					<!--	<div class="nav-search" id="nav-search">
							<form class="form-search">
								<span class="input-icon">
									<input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
									<i class="ace-icon fa fa-search nav-search-icon"></i>
								</span>
							</form>
						</div><!-- /.nav-search -->
					</div>

					<div class="page-content">
						

				<!--		<div class="page-header">
							<h1>
								Tables
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									Static &amp; Dynamic Tables
								</small>
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12 col-sm-7">
								<!-- PAGE CONTENT BEGINS -->
								<div class="widget-box">
												<div class="widget-header">
													<h4 class="widget-title">View mentor & mentee Information</h4>

													<span class="widget-toolbar">
														

														<a href="#" data-action="collapse">
															<i class="ace-icon fa fa-chevron-up"></i>
														</a>

														
													</span>
												</div>

												<div class="widget-body">
													<div class="widget-main">
									<form action="" method="post" class="form-horizontal" role="form">
													
													<div class="form-group" >
														<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Select mentee  </label>
														<div class="col-sm-9">
														<select name="mentor_uname">
														<option value="">choose a mentee</option>
			<?php while ($row = mysql_fetch_array($result)) {
			
			$mentor_username=$row['username'];
			$mentor_id = $row['id'];
			
			?>
			<option value="<?php echo $mentor_username;?>"><?php echo $mentor_username;?></option>
			<?php } ?>
			</select>
			&nbsp;&nbsp; 
			<!--<div class="col-md-offset-3 col-md-9">-->
				<button class="btn btn-info" type="submit" name="submit">
				<i class="ace-icon fa fa-check bigger-110"></i>
				Submit
				</button>
			<!--</div>	-->
			</div>
			</form>
														
<?php
if(isset($_POST['submit'])){
// As output of $_POST['mentor']  to display individual value

	$mentor_uname 	= $_POST['mentor_uname'];

//echo "You have selected :" .$select;  Displaying Selected Value
//SELECT b.mentee_username,a.firstname,a.email from cc_users a,cc_mentor_mentees b where b.mentor_id='36' and b.mentee_username=a.username 
$sql1 = "SELECT b.mentee_username,a.firstname,a.phonenumber,a.email from cc_users a,cc_mentor_mentees b where b.mentor_id='$mentor_id' and b.mentee_username=a.username"; 
$result = mysql_query($sql1);
	 ?>
	
<br>
	<h3 class="header blue lighter smaller">
											<i class="ace-icon fa fa-search nav-search-icon"></i>
											Mentees Under the <?php echo $mentor_uname;?>
										</h3>
<!--table here-->
<div class="row">
									<div class="col-xs-12">
										

										<div class="clearfix">
											<div class="pull-right tableTools-container"></div>
										</div>
										

										<!-- div.table-responsive -->

										<!-- div.dataTables_borderWrap -->
										<div>
											<table id="dynamic-table" class="table table-striped table-bordered table-hover">
												<thead>
											
											
												<tr>
													
													<th>Mentee Username</th>
													<th>Firstname</th>
													<th>Phonenumber</th>
													<th>Email</th>
													<!--	<th>Time</th>-->

													
												</tr>
											</thead>

												<tbody>
					<?php while($row=mysql_fetch_array($result))
{
?>
												<tr>
												<td><?php echo $row['mentee_username']; ?></td>
	     		
				<td><?php echo $row['firstname']; ?></td>
				
				<td><?php echo $row['phonenumber']; ?></td>
				
				<td><?php echo $row['email']; ?></td>
				
				
			

													
												</tr>

					
<?php 
}
}
?>
											</tbody>
											</table>
										</div>
									</div>
								</div>

	</div>
	</div>

								</div><!-- widget-box -->
							<!--</div> /.col -->
							
							
										
									
									
									</div><!-- /.col -->
						</div><!-- /.row -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->

			
			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
		</div><!-- /.main-container -->
		<div class="footer">
				<div class="footer">
				<div class="footer-inner">
					<div class="footer-content">
						<span class="bigger-120">
							<span class="blue bolder">Cloud Coder </span>
						MIS Report	 &copy; <span class="blue bolder">KGiSL	</span>					</span>

						&nbsp; &nbsp;
						<span class="action-buttons">
							<a href="#">
								<i class="ace-icon fa fa-twitter-square light-blue bigger-150"></i>							</a>

							<a href="#">
								<i class="ace-icon fa fa-facebook-square text-primary bigger-150"></i>							</a>

							<a href="#">
								<i class="ace-icon fa fa-rss-square orange bigger-150"></i>							</a>						</span>					</div>
				</div>
			</div>
			</div>

		<!-- basic scripts -->

		<!--[if !IE]> -->
		<script src="assets/js/jquery.2.1.1.min.js"></script>

		<!-- <![endif]-->

		<!--[if IE]>
<script src="assets/js/jquery.1.11.1.min.js"></script>
<![endif]-->

		<!--[if !IE]> -->
		<script type="text/javascript">
			window.jQuery || document.write("<script src='assets/js/jquery.min.js'>"+"<"+"/script>");
		</script>

		<!-- <![endif]-->

		<!--[if IE]>
<script type="text/javascript">
 window.jQuery || document.write("<script src='assets/js/jquery1x.min.js'>"+"<"+"/script>");
</script>
<![endif]-->
		
	</body>
</html>
