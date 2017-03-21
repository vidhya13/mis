<?php
session_start(); // start a session
if (isset($_SESSION['SESS_FIRST_NAME'])) { 	// check if session user_id is set
	$username = $_SESSION['SESS_FIRST_NAME']; //if it is set, assign the value to the variable $userid
}
else { // if it is not set
	$username = ""; // assign a null value to $userid
}
include('config.php');
if(isset($_GET['problem_id']))
	{
	$id=$_GET['problem_id'];
	$query5=mysql_query("select * from cc_problems where problem_id='$id'");
	$row1=mysql_fetch_assoc($query5);
	
if(isset($_POST['save']))
{
$prob_type=$_POST['ptype'];
$prob_name=$_POST['pname'];
$breif_des=$_POST['bdes'];
$full_des=$_POST['fdes'];
$sek_code=$_POST['scode'];
$vis = (isset($_POST['pv'])) ? 1 : 0;
$aut_name=$_POST['aname'];
$aut_email=$_POST['aemail'];
$websit=$_POST['web'];
$pname=$_POST['pname'];
$lic=$_POST['lic'];
$wass=$_POST['assigned_date'];
$wdue=$_POST['due_date'];
$query=mysql_query("UPDATE `cc_problems` SET `assigned_date`='$wass',`due_date`='$wdue',`visible`='$vis',
`problem_type`='$prob_type',`testname`='$prob_name',`breif_description`='$breif_des',
`description`='$full_des',`skeleton`='$sek_code',`author_name`='$aut_name',`author_email`='$aut_email',
`author_website`='$websit',`license`='$lic' where problem_id='$id'");
 if($query)
 {
 echo "<script>alert('Sucess')</script>";
 }
 else
 {
 echo "<script>alert('Failure')</script>";
 }
}

	
?>
<html>
<head>
	<title>Dashboard - KG Cloud Coder Admin</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
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
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
	<!-- Load jQuery JS -->
	<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
	<!-- Load jQuery UI Main JS  -->
	<script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
	<script>
		$(function() {
			$( "#datepicker" ).datepicker({	changeMonth: true,changeYear: true}).datepicker("setDate", "0");
			$( "#datepicker2" ).datepicker({ changeMonth: true,changeYear: true}).datepicker("setDate", "0");
			$( "#datepicker3" ).datepicker({ changeMonth: true,changeYear: true}).datepicker("setDate", "0");
		});

	</script>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.1/jquery-ui.min.js">
	</script>
</head>

<body class="no-skin">
<div id="navbar" class="navbar navbar-default" style="height:50px">
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
			<a href="index.html" class="navbar-brand">
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
							<a href="logout.php"><i class="ace-icon fa fa-power-off"></i>Logout</a>
						</li>
					</ul>
				</li>
			</ul>
		</div>
	</div><!-- /.navbar-container -->
</div>
<form action="" method="post" class="form-horizontal" role="form" target="_self" >
	<div class="tab-content" id="h4" style="background-color:#ffffff">
		<div id="profile4" class="tab-pane in active">
			<!--	<iframe name="profile">-->
			<div class="row">
				<!--include here-->
				<div style="margin-left:100px">
					<input type="submit" class="btn btn-primary btn-md" name="save" value="Save Problem!">
					<input type="submit" class="btn btn-primary btn-md" name="st" value="Save and Test">
					<a href="mex.php"  style="margin-left:850px" class="btn btn-primary btn-md"><< Back</a>
					<div style="background-color:#f9ffe6;width:1200px"><!--form start-->
						<div  style="margin:30px;padding:20px" >
							<div class="form-group" >
								<label class="col-sm-3 control-label no-padding-right"><b>Problem Type</b></label>
								<div class="col-sm-9">
									<select name="ptype"  class="col-sm-3" value="<?php echo $row1['problem_type']; ?>">
									<option>Select problem Type</option>
									<option <?php if($row1['problem_type']=='c') { ?> selected="selected" <?php } ?>>c</option>
									<option <?php if($row1['problem_type']=='c++') { ?> selected="selected" <?php } ?>>c++</option>
									<option <?php if($row1['problem_type']=='java') { ?> selected="selected" <?php } ?>>java</option>
									<option <?php if($row1['problem_type']=='python') { ?> selected="selected" <?php } ?>>python</option>
									<option <?php if($row1['problem_type']=='python3') { ?> selected="selected" <?php } ?>>python3</option>
									</select>
								</div>
							</div>
							<div class="form-group" >
								<label class="col-sm-3 control-label no-padding-right"><b>Problem Name</b></label>
								<div class="col-sm-9">
									<input type="text" name="pname"  class="col-sm-3" value="<?php echo $row1['testname']; ?>">
								</div>
							</div>
							<div class="form-group" >
								<label class="col-sm-3 control-label no-padding-right"><b>Brief Description</b></label>
								<div class="col-sm-9">
									<input type="text" name="bdes"  value="<?php echo $row1['breif_description']; ?>" class="col-sm-3">
								</div>
							</div>
							<div class="form-group" >
								<label class="col-sm-3 control-label no-padding-right"><b>Full Description(HTML)</b></label>
								<div class="col-sm-9">
									<textarea rows="12" style="width:600px;background-color:#d9d9d9" name="fdes" class="col-sm-3" autofocus onchange="ValidatePassKey(this)"><?php echo $row1['description']; ?></textarea>
									<script type="text/javascript">
										function ValidatePassKey(tb) {
											document.getElementById(1).focus();
										}
									</script>

								</div>
							</div>
							<div class="form-group" >
								<label class="col-sm-3 control-label no-padding-right"><b>Skeleton Code</b></label>
								<div class="col-sm-9">
									<textarea rows="12" id="1" name="scode" style="width:600px;background-color:#d9d9d9"   value="<?php echo $row1['breif_description']; ?>" class="col-sm-3"><?php echo $row1['skeleton']; ?></textarea>
								</div>
							</div>
							<div class="form-group" >
								<label class="col-sm-3 control-label no-padding-right"><b>Author Name</b></label>
								<div class="col-sm-9">
									<input type="text" name="aname"  class="col-sm-3" value="<?php echo $row1['author_name']; ?>">
								</div>
							</div>
							<div class="form-group" >
								<label class="col-sm-3 control-label no-padding-right"><b>Author Email</b></label>
								<div class="col-sm-9">
									<input type="text" name="aemail"  class="col-sm-3" value="<?php echo $row1['author_email']; ?>">
								</div>
							</div>
							<div class="form-group" >
								<label class="col-sm-3 control-label no-padding-right"><b>Website</b></label>
								<div class="col-sm-9">
									<input type="text" name="web" class="col-sm-3" value="<?php echo $row1['author_website']; ?>">
								</div>
							</div>
							<div class="form-group" >
								<label class="col-sm-3 control-label no-padding-right"><b>Creation Date</b></label>
								<div class="col-sm-9">
									<input type="text" class="datepicker" id="datepicker" name="creation_date" style="width:205px"  class="col-sm-3" value="<?php echo $row1['created_at']; ?>">
								</div>
							</div>
							
							<div class="form-group" >
								<label class="col-sm-3 control-label no-padding-right"><b>License</b></label>
								<div class="col-sm-9">
									<select name="lic"  class="col-sm-3" value="<?php echo $row1['license']; ?>">
									<option>Select license</option>
									<option <?php if($row1['license']=='NOT REDISTRIBUTABLE') { ?> selected="selected" <?php } ?>>NOT REDISTRIBUTABLE</option>
									</select>
								</div>
							</div>
							<!--	<div class="form-group" >
                                <label class="col-sm-3 control-label no-padding-right"><b>URL for Required External Library</b></label>
                                <div class="col-sm-9">
                                <input type="text" name="bdes"  class="col-sm-3">
                                </div>
                                </div>
                                <div class="form-group" >
                                <label class="col-sm-3 control-label no-padding-right"><b>MD5 checksum of required external library</b></label>
                                <div class="col-sm-9">
                                <input type="text" name="bdes"  class="col-sm-3">
                                </div>
                                </div> -->
							<div class="form-group" >
								<label class="col-sm-3 control-label no-padding-right"><b>When assigned</b></label>
								<div class="col-sm-2">
									<input type="text" class="datepicker" id="datepicker2" style="width:205px" name="assigned_date" readonly="readonly"  class="col-sm-3" value="<?php echo $row1['assigned_date']; ?>">
								</div>
								<div class="col-sm-5"  style="padding-left:30px">
									<label class="col-sm-5 control-label no-padding-right"><b>Time (HH:MM)</b></label>
									<input style="margin-left:5px" type="text" name="time1" id="e1" value=""  class="col-sm-3"/>
									<script>
										function display_ct() {
											var strcount
											var x = new Date()
											var x1=x.getMonth() + "/" + x.getDate() + "/" + x.getYear();
											x1 =  x.getHours( )+ ":" +  x.getMinutes() ;
											//document.getElementById('ct').innerHTML = x1;

											//tt=display_c();
											document.getElementById('e1').value = x1;
										}

										display_ct();
									</script>
								</div>

							</div>

							<div class="form-group" >
								<label class="col-sm-3 control-label no-padding-right"><b>When due</b></label>
								<div class="col-sm-2">
									<input type="text" style="width:205px" style="width:205px" class="datepicker" id="datepicker3" name="due_date" readonly="readonly"  class="col-sm-3" value="<?php echo $row1['due_date']; ?>">
								</div>
								<div class="col-sm-5" style="padding-left:30px">
									<label class="col-sm-5 control-label no-padding-right"><b>Time (HH:MM)</b></label>
									<input style="margin-left:5px" type="text" name="time2" id="e2" value=""  class="col-sm-3"/>
									<script>
										function display_c() {
											var strcount
											var x = new Date()
											var x1=x.getMonth() + "/" + x.getDate() + "/" + x.getYear();
											x1 =  x.getHours( )+ ":" +  x.getMinutes() ;
											//document.getElementById('ct').innerHTML = x1;

											//tt=display_c();
											document.getElementById('e2').value = x1;
										}

										display_c();
									</script>
								</div>

							</div>
							<div class="form-group" >
								<label class="col-sm-3 control-label no-padding-right"><b>Problem Visible to students</b></label>
								<div class="col-sm-9">
									<input type="checkbox" name="pv" value="" style="margin-left:5px"><b>Check to make problem visible to students</b>
								</div>
							</div>
							<div class="form-group" style="" id="main">
								<div class="col-md-offset-3 col-md-4">
									<input type="submit" class="btn btn-primary btn-md" name="save" value="Save Problem!">
									<input class="btn btn-primary bt" id="btAdd" type="submit" name="submit" value="Save Test Case">
									<!--   <input class="btn btn-primary bt" type="button" id="btRemove" value="Reset" class="bt" />  -->

								</div>

							<?php
							
								$query6=mysql_query("select * from cc_test_cases where problem_id='$id'");
								if(isset($_POST['submit']))
								{
								$inp=$_POST['ti'];
								$out=$_POST['to'];
								$sec=(isset($_POST['test_index'])) ? 1 : 0;
								$upd=mysql_query("UPDATE `cc_test_cases` SET `input`='$inp',`output`='$out',`secret`='$sec'
								WHERE problem_id='$id'");
								if($upd)
									 {
									 echo "<script>alert('Sucess')</script>";
									 }
									 else
									 {
									 echo "<script>alert('Failure')</script>";
									 }
								}
								while($row2=mysql_fetch_assoc($query6))
								{
								?>
								<center>
								<div style="margin:20px;padding:20px">
								<table style="margin-top:10px;padding:20px;clear:both;border:2px solid #808000;width:700px;height:170px">
								<tr>
								
								<td><label><b>Test Input</b></label></td>
								<td><input type="text" name="ti" value="<?php echo $row2['input']; ?>"></td>
								</tr>
								<tr>
								<td><label><b>Test output</b></label></td>
								<td><input type="text" name="to" value="<?php echo $row2['output']; ?>"></td>
								</tr>
								<tr>
								<td><label><b>Secret</b></label></td>
								<td><input type="checkbox" name="test_index" />If checked, the test is secret (not revealed to students)</td>
								</tr>
								</table>
								</div>
								</center>
								<?php
								}
								
							?>

							
							

</form>
</body>
<?php
}
?>
</html>