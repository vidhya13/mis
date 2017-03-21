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
<script type="text/javascript">
$(document).ready(function() {
$(".menu").click(function () {
    $(".menu").removeClass("active");
    // $(".tab").addClass("active"); // instead of this do the below 
    $(this).addClass("active");   
});
});
</script>		
		<!--auto load script starts here-->

		<script type="text/javascript">
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
<!--auto load script ends here-->
<!--auto load script for course wise search-->
<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
		<script>

function getProblems(val) {
	$.ajax({
	type: "POST",
	url: "course_problem_list.php",
	data:'title='+val,
	success: function(data){
		$("#problem-lists").html(data);
	}
	});
}

function selectCountry(val) {
$("#search-box").val(val);
$("#suggesstion-box").hide();
}
</script>
<!--auto load script course wise ends here-->

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
							KG Cloud Coder Admin						</small>					</a>				</div>

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
						<a href="index.html">
							<i class="menu-icon fa fa-tachometer"></i>
							<span class="menu-text"> Dashboard </span>						</a>

						<b class="arrow"></b>					</li>

					

					<li class="no-padding-bottom">
						<a href="cc_students_details.php">
						    
							<i class="menu-icon fa fa-graduation-cap"></i>
							<span class="menu-text"><small><b> Student Details</b></small> </span>						</a>

						<b class="arrow"></b>					</li>
						
					<li class="no-padding-bottom">
						<a href="cc_mentor_details.php">
						    
							<i class="menu-icon glyphicon  glyphicon-user"></i>
							<span class="menu-text"><small><b> Mentor Details</b></small> </span>						</a>

						<b class="arrow"></b>					</li>
					
					<li class="no-padding-bottom">
						<a href="cc_mentis_details.php">
						    
							<i class="menu-icon fa fa-users"></i>
							<span class="menu-text"><small><b> Mentor & Mentee Details</b></small> </span>						</a>

						<b class="arrow"></b>					</li>	
						
					<li class="no-padding-bottom">
						<a href="assign_mentis.php">
						    
							<i class="menu-icon fa fa-plus"></i>
							<span class="menu-text"><small><b> Assign Mentees Here</b></small> </span>						</a>

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
								<a href="#">Home</a>							</li>
							<li class="active">Dashboard</li>
						</ul><!-- /.breadcrumb -->
						
						
						
					</div>

					<div class="page-content">
						 

						

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								
								<div class="alert alert-block alert-success">
									<button type="button" class="close" data-dismiss="alert">
										<i class="ace-icon fa fa-times"></i>									</button>

									<i class="ace-icon fa fa-check green"></i>

									Welcome to
									<strong class="green">
										KG Cloud Coder Admin Page
								  </strong>
								</div>
								
					<!--here for the change-->
				<div class="col-sm-12">
										<div class="tabbable">
											<ul class="nav nav-tabs padding-12 tab-color-blue background-blue" id="myTab4">
												<li >
													<a class="menu" href="index_admin.php">Search by user</a>
												</li>

												<li class="active" >
													<a class="menu" data-toggle="tab"  href="#profile4">Search by course</a>
												</li>

												<li>
													<a class="menu" href="search_date.php">Search by date</a>
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
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Enter Course</label>
			<div class="col-sm-9">
			<input type="text" name="course_name" list="course_list-2" placeholder="select course" id="state-list"  class="col-xs-6 col-sm-8" onChange="getProblems(this.value);"  />
			
			<datalist id="course_list-2">
			<select name="course_name" multiple>
			<?php
			foreach($results as $course) {
	
			?>
			<option value="<?php echo $course["title"]; ?>"><?php echo $course["id"]; ?></option>
			<?php
			}
			?>
			</select>
			</datalist>
			</div>	
			</div>	
			
			<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Select problem</label>
			<div class="col-sm-9">			
			<select class="col-xs-6 col-sm-8" id="problem-lists" data-placeholder="select problem" name="problem_name">
			<option value="">Select problem</option>
			</select>
			</div>
			

											
<br>
<br>
<br>
										<div class="col-md-offset-5 col-md-4">
											<button class="btn btn-info" type="submit" name="submit" id="mybtn">
												<i class="ace-icon fa fa-search bigger-110"></i>
												Search
											</button>
											
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
																									<?php	
$db_handle = new DBController();
			$query ="SELECT id,username FROM cc_users";
			$results = $db_handle->runQuery($query);	
if(isset($_POST['submit']))
{
	//include('connect-db.php'); 
	
	//$username		=	$_POST['username'];
	//$user_id 		=	$_POST['id'];
	$course_name		=	$_POST['course_name'];
	$problem_id		=	$_POST['problem_name'];
	
	
	//$sql = " select id from cc_courses WHERE title= '$course_name'";
	$sql = " SELECT course_id, title FROM cc_courses INNER JOIN (select * from cc_course_registrations ) AS cc ON cc_courses.id = cc.course_id where title='$course_name'";
	
	$results = $db_handle->runQuery($sql);
		
	
	//$result=mysql_query($sql) or die(mysql_error());
	//while($row=mysql_fetch_array($result))
		
	foreach($results as $row)	
	{
		$course_id=$row['course_id'];
		
	}	
			
}	
	$sql2="select s.event_id,e.user_id,u.username,e.problem_id,p.course_id,p.testname,cc.name,cc.title,u.email,t.name,cc.year, s.num_tests_attempted,s.num_tests_passed from cc_events e,cc_users u,cc_submission_receipts s,cc_courses cc,cc_problems p,cc_terms t where cc.id =p.course_id and s.event_id=e.id and u.id=e.user_id and e.problem_id=p.problem_id and t.id=cc.term_id and cc.id ='$course_id' and e.problem_id='$problem_id' order by event_id DESC limit 5";
	
	//$result1=mysql_query($sql1) or die(mysql_error());
	$results = $db_handle->runQuery($sql2);		
	
?>

							<div class="col-sm-12">
								<!-- PAGE CONTENT BEGINS -->
								<div class="widget-box">
												<div class="widget-header">
													<h4 class="widget-title">Search Results</h4>

													<span class="widget-toolbar">
														<!--<a href="#" data-action="reload">
															<i class="ace-icon fa fa-refresh"></i>
														</a>-->

														<a href="#" data-action="collapse">
															<i class="ace-icon fa fa-chevron-up"></i>
														</a>

														
													</span>
												</div>

												<div class="widget-body">
													<div class="widget-main">
																	<div class="row">
									<div class="col-xs-12">
										

										<div class="clearfix">
											<div class="pull-right tableTools-container"></div>
										</div>
								<div>
								
											<table id="dynamic-table" class="table table-striped table-bordered table-hover">
												<thead>
												
													<tr>
												<!--	<th>ID</th>	-->
													<th>Username</th>
													<th>Coursename</th>
													<th>Problem name</th>
													
													<th>Attempted Testcases</th>
													<th>Passed Testcases</th>
																								
													</tr>

												</thead>

												<tbody>
													
						<?php foreach($results as $row1) {

							$tot_attempted	=	$row1['num_tests_attempted'];
							$tot_passed		=	$row1['num_tests_passed'];
							
							if(!$tot_attempted == 0 && !$tot_passed ==0){
					
								 
								$maximum=max(array($tot_attempted));
								for ($i = 1; $i <count($maximum); $i++) {
								if ($a[$i] > $maximum) {
									$maximum = $a[$i];
								}
								}
														
						?>
												<tr>
			><?php //echo $row1['event_id'];?></td>-->
				
				<td><?php echo $row1['username']; ?></td>
	     		
				<td><?php echo $row1['title']; ?></td>
				
				<td><?php echo $row1['testname']; ?></td>
				
				<td><?php echo $row1['num_tests_attempted']; ?></td>
				
				<td><?php echo $row1['num_tests_passed']; ?></td>
				
				
				
				
			

													
												</tr>


					<?php }
							}
					?>
													

													

												</tbody>
											</table>
										
								</div>	
							</div>
						</div>	
													
													</div>
												</div>
								</div>				
							</div><!--Live table by course end-->

	
</div>												
													</div>
										<!--		<iframe>-->
												</div>

											</div>
										</div>
									</div>


						
				
				</div>	
										
									
									
									</div><!-- /.col --> <!-- /.page-content -->
						
								</div>
							</div>	
					<!--search division end here-->	
						
				
									</div>
				
			</div><!-- /.main-content -->
								</div>
<div  class="space"></div>
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

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>			</a>		</div><!-- /.main-container -->

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
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="assets/js/bootstrap.min.js"></script>

		<!-- page specific plugin scripts -->
		<script src="assets/js/jquery.dataTables.min.js"></script>
		<script src="assets/js/jquery.dataTables.bootstrap.min.js"></script>
		<script src="assets/js/dataTables.tableTools.min.js"></script>
		<script src="assets/js/dataTables.colVis.min.js"></script>

		<!--[if lte IE 8]>
		  <script src="assets/js/excanvas.min.js"></script>
		<![endif]-->
		<script src="assets/js/jquery-ui.custom.min.js"></script>
		<script src="assets/js/jquery.ui.touch-punch.min.js"></script>
		<script src="assets/js/jquery.easypiechart.min.js"></script>
		<script src="assets/js/jquery.sparkline.min.js"></script>
		<script src="assets/js/jquery.flot.min.js"></script>
		<script src="assets/js/jquery.flot.pie.min.js"></script>
		<script src="assets/js/jquery.flot.resize.min.js"></script>

		<!-- ace scripts -->
		<script src="assets/js/ace-elements.min.js"></script>
		<script src="assets/js/ace.min.js"></script>

		<!-- inline scripts related to this page -->
			
		<script type="text/javascript">
			jQuery(function($) {
				//initiate dataTables plugin
				var oTable1 = 
				$('#dynamic-table')
				//.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
				.dataTable( {
					bAutoWidth: false,
					"aoColumns": [
					  { "bSortable": false },
					  null, null,null, null, null,
					  { "bSortable": false }
					],
					"aaSorting": [],
			
					//,
					//"sScrollY": "200px",
					//"bPaginate": false,
			
					//"sScrollX": "100%",
					//"sScrollXInner": "120%",
					//"bScrollCollapse": true,
					//Note: if you are applying horizontal scrolling (sScrollX) on a ".table-bordered"
					//you may want to wrap the table inside a "div.dataTables_borderWrap" element
			
					//"iDisplayLength": 50
			    } );
				//oTable1.fnAdjustColumnSizing();
			
			
				//TableTools settings
				TableTools.classes.container = "btn-group btn-overlap";
				TableTools.classes.print = {
					"body": "DTTT_Print",
					"info": "tableTools-alert gritter-item-wrapper gritter-info gritter-center white",
					"message": "tableTools-print-navbar"
				}
			
				//initiate TableTools extension
				var tableTools_obj = new $.fn.dataTable.TableTools( oTable1, {
					"sSwfPath": "assets/swf/copy_csv_xls_pdf.swf",
					
					"sRowSelector": "td:not(:last-child)",
					"sRowSelect": "multi",
					"fnRowSelected": function(row) {
						//check checkbox when row is selected
						try { $(row).find('input[type=checkbox]').get(0).checked = true }
						catch(e) {}
					},
					"fnRowDeselected": function(row) {
						//uncheck checkbox
						try { $(row).find('input[type=checkbox]').get(0).checked = false }
						catch(e) {}
					},
			
					"sSelectedClass": "success",
			        "aButtons": [
						{
							"sExtends": "copy",
							"sToolTip": "Copy to clipboard",
							"sButtonClass": "btn btn-white btn-primary btn-bold",
							"sButtonText": "<i class='fa fa-copy bigger-110 pink'></i>",
							"fnComplete": function() {
								this.fnInfo( '<h3 class="no-margin-top smaller">Table copied</h3>\
									<p>Copied '+(oTable1.fnSettings().fnRecordsTotal())+' row(s) to the clipboard.</p>',
									1500
								);
							}
						},
						
						{
							"sExtends": "csv",
							"sToolTip": "Export to CSV",
							"sButtonClass": "btn btn-white btn-primary  btn-bold",
							"sButtonText": "<i class='fa fa-file-excel-o bigger-110 green'></i>"
						},
						
						{
							"sExtends": "pdf",
							"sToolTip": "Export to PDF",
							"sButtonClass": "btn btn-white btn-primary  btn-bold",
							"sButtonText": "<i class='fa fa-file-pdf-o bigger-110 red'></i>"
						},
						
						{
							"sExtends": "print",
							"sToolTip": "Print view",
							"sButtonClass": "btn btn-white btn-primary  btn-bold",
							"sButtonText": "<i class='fa fa-print bigger-110 grey'></i>",
							
							"sMessage": "<div class='navbar navbar-default'><div class='navbar-header pull-left'><a class='navbar-brand' href='#'><small>Optional Navbar &amp; Text</small></a></div></div>",
							
							"sInfo": "<h3 class='no-margin-top'>Print view</h3>\
									  <p>Please use your browser's print function to\
									  print this table.\
									  <br />Press <b>escape</b> when finished.</p>",
						}
			        ]
			    } );
				//we put a container before our table and append TableTools element to it
			    $(tableTools_obj.fnContainer()).appendTo($('.tableTools-container'));
				
				//also add tooltips to table tools buttons
				//addding tooltips directly to "A" buttons results in buttons disappearing (weired! don't know why!)
				//so we add tooltips to the "DIV" child after it becomes inserted
				//flash objects inside table tools buttons are inserted with some delay (100ms) (for some reason)
				setTimeout(function() {
					$(tableTools_obj.fnContainer()).find('a.DTTT_button').each(function() {
						var div = $(this).find('> div');
						if(div.length > 0) div.tooltip({container: 'body'});
						else $(this).tooltip({container: 'body'});
					});
				}, 200);
				
				
				
				//ColVis extension
				var colvis = new $.fn.dataTable.ColVis( oTable1, {
					"buttonText": "<i class='fa fa-search'></i>",
					"aiExclude": [0, 6],
					"bShowAll": true,
					//"bRestore": true,
					"sAlign": "right",
					"fnLabel": function(i, title, th) {
						return $(th).text();//remove icons, etc
					}
					
				}); 
				
				//style it
				$(colvis.button()).addClass('btn-group').find('button').addClass('btn btn-white btn-info btn-bold')
				
				//and append it to our table tools btn-group, also add tooltip
				$(colvis.button())
				.prependTo('.tableTools-container .btn-group')
				.attr('title', 'Show/hide columns').tooltip({container: 'body'});
				
				//and make the list, buttons and checkboxed Ace-like
				$(colvis.dom.collection)
				.addClass('dropdown-menu dropdown-light dropdown-caret dropdown-caret-right')
				.find('li').wrapInner('<a href="javascript:void(0)" />') //'A' tag is required for better styling
				.find('input[type=checkbox]').addClass('ace').next().addClass('lbl padding-8');
			
			
				
				/////////////////////////////////
				//table checkboxes
				$('th input[type=checkbox], td input[type=checkbox]').prop('checked', false);
				
				//select/deselect all rows according to table header checkbox
				$('#dynamic-table > thead > tr > th input[type=checkbox]').eq(0).on('click', function(){
					var th_checked = this.checked;//checkbox inside "TH" table header
					
					$(this).closest('table').find('tbody > tr').each(function(){
						var row = this;
						if(th_checked) tableTools_obj.fnSelect(row);
						else tableTools_obj.fnDeselect(row);
					});
				});
				
				//select/deselect a row when the checkbox is checked/unchecked
				$('#dynamic-table').on('click', 'td input[type=checkbox]' , function(){
					var row = $(this).closest('tr').get(0);
					if(!this.checked) tableTools_obj.fnSelect(row);
					else tableTools_obj.fnDeselect($(this).closest('tr').get(0));
				});
				
			
				
				
					$(document).on('click', '#dynamic-table .dropdown-toggle', function(e) {
					e.stopImmediatePropagation();
					e.stopPropagation();
					e.preventDefault();
				});
				
				
				//And for the first simple table, which doesn't have TableTools or dataTables
				//select/deselect all rows according to table header checkbox
				var active_class = 'active';
				$('#simple-table > thead > tr > th input[type=checkbox]').eq(0).on('click', function(){
					var th_checked = this.checked;//checkbox inside "TH" table header
					
					$(this).closest('table').find('tbody > tr').each(function(){
						var row = this;
						if(th_checked) $(row).addClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', true);
						else $(row).removeClass(active_class).find('input[type=checkbox]').eq(0).prop('checked', false);
					});
				});
				
				//select/deselect a row when the checkbox is checked/unchecked
				$('#simple-table').on('click', 'td input[type=checkbox]' , function(){
					var $row = $(this).closest('tr');
					if(this.checked) $row.addClass(active_class);
					else $row.removeClass(active_class);
				});
			
				
			
				/********************************/
				//add tooltip for small view action buttons in dropdown menu
				$('[data-rel="tooltip"]').tooltip({placement: tooltip_placement});
				
				//tooltip placement on right or left
				function tooltip_placement(context, source) {
					var $source = $(source);
					var $parent = $source.closest('table')
					var off1 = $parent.offset();
					var w1 = $parent.width();
			
					var off2 = $source.offset();
					//var w2 = $source.width();
			
					if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
					return 'left';
				}
				
			
			})
		</script>

			</body>
</html>
