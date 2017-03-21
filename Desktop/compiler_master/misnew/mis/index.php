<?php
	//Start session
	session_start();
	
	//Unset the variables stored in session
	unset($_SESSION['SESS_MEMBER_ID']);
	unset($_SESSION['SESS_FIRST_NAME']);
	unset($_SESSION['SESS_USER_ROLE']);
	//include('connect-db.php');
	include('cloudconnect.php');
	require_once("dbcontroller.php");
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>CloudCoder MIS</title>

		<meta name="description" content="Static &amp; Dynamic Tables" />
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
							KG Cloud Coder MIS
						</small>
					</a>
				</div>

				<div class="navbar-buttons navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">
					<li>
						<a class="green"  href="#modal-table" role="button"  data-toggle="modal" name="LOGIN">
						<i class="ace-icon fa fa-user"></i>
						
						<big color="white">Login</big>
						
						</a>					
					</li>
					</ul>
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
						<a href="index.php">
							<i class="menu-icon fa fa-tachometer"></i>
							<span class="menu-text"><b> Dashboard</b> </span>
						</a>

						<b class="arrow"></b>
					</li>

					

					<li class="no-padding-bottom">
						<a href="kgedu.php">
							<i class="menu-icon fa fa-graduation-cap"></i>
							<span class="menu-text"><small><b> KG EDUCATIONAL INSTITUTIONS </b></small> </span>			</a>

						<b class="arrow"></b>			</li>
					
					
					<li class="no-padding-bottom">
						<a href="cc1.php">
						    
							<i class="menu-icon fa fa-cloud"></i>
							<span class="menu-text"><small><b> CLOUDCODER</b></small> </span>						</a>

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
								<a href="#">Home</a>
							</li>

							
							<li class="active">MIS HOME</li>
						</ul><!-- /.breadcrumb -->

				
					</div>

					<div class="page-content">
						
<div class="row">	
<div class ="col-sm-12 widget-container-col">
<div class="widget-box widget-color-dark" >
<div class="widget-header">
<h4 class="widget-title"><font color="white">Status</font></h4>
<div class="widget-toolbar">
													

													<a href="#" data-action="reload" onClick="history.go(0)">
														<i class="ace-icon fa fa-refresh"></i>
													</a>
													
                                                    <a href="#" data-action="collapse">
														<i class="ace-icon fa fa-chevron-up"></i>
													</a>
													<a href="#" data-action="fullscreen" class="orange2">
														<i class="ace-icon fa fa-expand"></i>
													</a>
												</div>
										</div>
<div class="widget-body">

  <div class="page-container">
  <div class="main-content">
		<div>
		<br/>
			<div class="col-xs-2 col-sm-2">
			<span class="btn btn-app btn-sm btn-danger no-hover">
					<span class="line-height-1 bigger-170 ">								

					<?php
$myfile = fopen("sub_recipt.txt", "r") or die("Unable to open file!");
echo fread($myfile,filesize("sub_recipt.txt"));
fclose($myfile);
?>
					</span>
		            <h4>Submission <br/> Receipts</h4>
					
				</div>
			
			
			<div class="col-xs-2 col-sm-2">
											
		          <span class="btn btn-app btn-sm btn-success no-hover">
													<span class="line-height-1 bigger-170">
		          
					<?php
$myfile = fopen("tc_result.txt", "r") or die("Unable to open file!");
echo fread($myfile,filesize("tc_result.txt"));
fclose($myfile);
?>
</span>
		            <h4>TestCase<br/> Results</h4>
					
				</div>
			
	                           
          <div class="col-xs-2 col-sm-2">
											
		         <span class="btn btn-app btn-sm btn-primary no-hover">
													<span class="line-height-1 bigger-170">
					<?php
$myfile = fopen("solved_problem.txt", "r") or die("Unable to open file!");
echo fread($myfile,filesize("solved_problem.txt"));
fclose($myfile);
?>
					</span>
		
					<br/>
					<br/>
					<br/>
                     <h4>Problems</h4>
			  </div>
		
			<div class="col-sm-2 col-xs-2">						
		          <span class="btn btn-app btn-sm btn-yellow no-hover">
	<span class="line-height-1 bigger-170">
					<?php
$myfile = fopen("test_cases.txt", "r") or die("Unable to open file!");
echo fread($myfile,filesize("test_cases.txt"));
fclose($myfile);
?></span>
		            <h4> Test<br/>
					Cases</h4>
					
				</div>
			
			<div class="col-sm-2 col-xs-2">
			
		          <span class="btn btn-app btn-sm btn-pink no-hover">
													<span class="line-height-1 bigger-170">
					<?php
$myfile = fopen("course_reg.txt", "r") or die("Unable to open file!");
echo fread($myfile,filesize("course_reg.txt"));
fclose($myfile);
?></span>
		            <h4>Course <br/>
					Registrations</h4>
					
				</div>
			
		
			<div class="col-sm-2 col-xs-2">
				
		          <span class="btn btn-app btn-sm btn-purple no-hover">
					<span class="line-height-1 bigger-170">
					<?php
$myfile = fopen("users.txt", "r") or die("Unable to open file!");
echo fread($myfile,filesize("users.txt"));
fclose($myfile);
?></span>
<br/>
<br/>
		           <br/>
				<h4>Users</h4>
				</div>
			
		
		<div class="col-xs-2 col-sm-2">
		<span class="btn btn-app btn-sm btn-grey no-hover">
													<span class="line-height-1 bigger-170">
					<?php
					/* $query=mysql_query("select count(*) from cc_courses");
						echo $query; */
					
				$myfile = fopen("courses.txt", "r") or die("Unable to open file!");
					echo fread($myfile,filesize("courses.txt"));
					fclose($myfile); 

					?></span>              <br/>
<br/>
                     <br/>
		             <h4>Courses</h4>
			  </div>
		
		</div>
    </div>
  </div>
  <br/>
</div>
</div>
</div>
</div>
						<?php
			ini_set('error_reporting', 0);
			require_once("dbcontroller.php");
			$db_handle = new DBController();
			$query="select s.event_id,e.user_id,u.username,e.problem_id,p.course_id,p.testname,
			COUNT(DISTINCT p.testname),cc.name,cc.title,u.email,t.name,cc.year, s.num_tests_attempted,
			s.num_tests_passed,e.timestamp from cc_events e,cc_users u,cc_submission_receipts s,cc_courses cc,
			cc_problems p,cc_terms t where cc.id =p.course_id and s.event_id=e.id and u.id=e.user_id 
			and e.problem_id=p.problem_id and t.id=cc.term_id and left(e.timestamp,10) > 1448515893  
			and left(e.timestamp,10) < 1448515903 and p.course_id order by u.id,p.problem_id ";
	
			
			$results = $db_handle->runQuery($query);
			
			//,COUNT(DISTINCT p.testname)
			 foreach($results as $row1) {

							$tot_attempted	=	$row1['num_tests_attempted'];
							$tot_passed		=	$row1['num_tests_passed'];
							$problem_name   =	$row1['testname'];
							$count1=$row1['count(testname)'];
							//echo $tot_attempted;
							//echo "hello";
							//echo $tot_passed;
							if(!$tot_attempted == 0 && !$tot_passed ==0){
					
								 
								$maximum=max(array($tot_attempted));
								for ($i = 1; $i <count($maximum); $i++) {
								if ($a[$i] > $maximum) {
									$maximum = $a[$i];
									
								}
								}
								//$count=count($row1);
							}
							
						}				
						?>
						
							
							<div>
		

     
  
  
<!-- add class "sidebar-collapsed" to close sidebar by default, "chat-visible" to make chat appear always -->
  
		<br>
<div class="clearfix">
											<div class="pull-right tableTools-container"></div>
										</div>


<div class="row">
<div class ="col-sm-12 widget-container-col">
<div class="widget-box widget-color-dark" >
<div class="widget-header">
<h4 class="widget-title"><font color="white">Cloudcoder Leaderboard <?php echo date("d-m-Y"); ?></font></h4>
<div class="widget-toolbar">
													

													<a href="#" data-action="reload" onClick="history.go(0)">
														<i class="ace-icon fa fa-refresh"></i>
													</a>
													<a href="#" data-action="collapse">
														<i class="ace-icon fa fa-chevron-up"></i>
													</a>

													<a href="#" data-action="fullscreen" class="orange2">
														<i class="ace-icon fa fa-expand"></i>
													</a>
												</div>
											</div>
<div class="widget-body">

  <div class="page-container">
  <div class="main-content">

	  <?php
	     include 'table.txt';
	  ?>
	 
</div>
</div>
</div></div></div></div>
									</div><!-- /.col -->
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
		
		<script src="assets/js/bootstrap.min.js"></script>

		<!-- page specific plugin scripts -->
		<script src="assets/js/jquery.dataTables.min.js"></script>
		<script src="assets/js/jquery.dataTables.bootstrap.min.js"></script>
		<script src="assets/js/dataTables.tableTools.min.js"></script>
		<script src="assets/js/dataTables.colVis.min.js"></script>

		<!-- ace scripts -->
		<script src="assets/js/ace-elements.min.js"></script>
		<script src="assets/js/ace.min.js"></script>

		<!-- inline scripts related to this page -->
		
		<div id="modal-table" class="modal fade" tabindex="-1">
									<div class="modal-dialog">
										<div class="modal-content">
											<div class="modal-header no-padding">
												<div class="table-header">
													<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
														<span class="white">&times;</span>
													</button>
													Login Here!!
												</div>
											</div>

											<div class="modal-body no-padding">
											<div class="position-relative">
								<div id="login-box" class="login-box visible widget-box no-border">
									<div class="widget-body">
										<div class="widget-main">
											<h4 class="header blue lighter bigger">
												<i class="ace-icon fa fa-coffee green"></i>
												Please Enter Your Information
											</h4>

											<div class="space-6"></div>

											<form id="login"	method="post" action="login.php">
												<fieldset>
													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="text" name="text_username" class="form-control" placeholder="Username" required />
															<i class="ace-icon fa fa-user"></i>
														</span>
													</label>
												<div class="space"></div>
													<label class="block clearfix">
														<span class="block input-icon input-icon-right">
															<input type="password" name="text_password" class="form-control" placeholder="Password" required />
															<i class="ace-icon fa fa-lock"></i>
														</span>
													</label>

													<div class="space"></div>

													<div class="clearfix">
														<label class="inline">
															<input type="checkbox" class="ace" />
															<span class="lbl"> Remember Me</span>
														</label>

														<button type="submit" class="width-35 pull-right btn btn-sm btn-primary">
															<i class="ace-icon fa fa-key"></i>
															<span class="bigger-110">Login</span>
														</button>
													</div>

													<div class="space-4"></div>
												</fieldset>
											</form>

																					</div><!-- /.widget-main -->

																</div><!-- /.widget-body -->
								</div><!-- /.signup-box -->
							</div><!-- /.position-relative -->

							</div>						
										</div><!-- /.modal-content -->
									</div><!-- /.modal-dialog -->
								</div><!-- PAGE CONTENT ENDS -->
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
