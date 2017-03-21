<?php
session_start(); // start a session
if (isset($_SESSION['SESS_FIRST_NAME'])) { 	// check if session user_id is set
	$username = $_SESSION['SESS_FIRST_NAME']; //if it is set, assign the value to the variable $userid
}
else { // if it is not set
	$username = ""; // assign a null value to $userid
}
?>
<html>
<head>
	<title>KGiSL CloudCoder</title>
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
	<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.1/jquery-ui.min.js"></script>
</head>
<?php
include('config.php');
if(isset($_GET['course_id']))
{
	$course_id1=$_GET['course_id'];
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

		$lic=$_POST['lic'];
		$wass=$_POST['assigned_date'];
		$wdue=$_POST['due_date'];
		$query1=mysql_query("INSERT INTO `cc_problems`(  `course_id`,`assigned_date`, `due_date`, `visible`,
  `problem_type`, `testname`, `breif_description`, `description`, `skeleton`, 
 `author_name`, `author_email`, `author_website`, `license`) VALUES 
 ('".$course_id1."','".$wass."','".$wdue."','".$vis."','".$prob_type."','".$prob_name."','".$breif_des."','".$full_des."',
 '".$sek_code."','".$aut_name."','".$aut_email."','".$websit."','".$lic."')");
		if($query1)
		{
			echo "<script>alert('Sucess')</script> " or die("Error:".mysql_error());
		}
		else
		{
			echo "<script>alert('Failure')</script>";
		}
	}
}
?>
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
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" class="form-horizontal" role="form" target="_self" >
	<div class="tab-content" id="h4" style="background-color:#ffffff">
		<div id="profile4" class="tab-pane in active">
			<!--	<iframe name="profile">-->
			<div class="row">
				<!--include here-->
				<div style="margin-left:100px">

					<input type="submit" class="btn btn-primary btn-md" name="st" value="Save and Test">
					<a href="mex.php"  style="margin-left:850px" class="btn btn-primary btn-md"><< Back</a>
					<div style="background-color:#f9ffe6;width:1200px"><!--form start-->
						<div  style="margin:30px;padding:20px" >
							<div class="form-group" >
								<label class="col-sm-3 control-label no-padding-right"><b>Problem Type</b></label>
								<div class="col-sm-9">
									<select name="ptype"  class="col-sm-3">
										<option>Select problem Type</option>
										<option>c</option>
										<option>c++</option>
										<option>java</option>
										<option>python</option>
										<option>python3</option>
										<option>PHP</option>
									</select>
								</div>
							</div>
							<div class="form-group" >
								<label class="col-sm-3 control-label no-padding-right"><b>Problem Name</b></label>
								<div class="col-sm-9">
									<input type="text" name="pname"  class="col-sm-3" >
								</div>
							</div>
							<div class="form-group" >
								<label class="col-sm-3 control-label no-padding-right"><b>Brief Description</b></label>
								<div class="col-sm-9">
									<input type="text" name="bdes"  class="col-sm-3">
								</div>
							</div>
							<div class="form-group" >
								<label class="col-sm-3 control-label no-padding-right"><b>Full Description(HTML)</b></label>
								<div class="col-sm-9">
									<textarea rows="12" style="width:600px;background-color:#d9d9d9" name="fdes" class="col-sm-3" autofocus onchange="ValidatePassKey(this)"></textarea>
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
									<textarea rows="12" id="1" name="scode" style="width:600px;background-color:#d9d9d9" class="col-sm-3"></textarea>
								</div>
							</div>
							<div class="form-group" >
								<label class="col-sm-3 control-label no-padding-right"><b>Author Name</b></label>
								<div class="col-sm-9">
									<input type="text" name="aname"  class="col-sm-3">
								</div>
							</div>
							<div class="form-group" >
								<label class="col-sm-3 control-label no-padding-right"><b>Author Email</b></label>
								<div class="col-sm-9">
									<input type="text" name="aemail"  class="col-sm-3">
								</div>
							</div>
							<div class="form-group" >
								<label class="col-sm-3 control-label no-padding-right"><b>Website</b></label>
								<div class="col-sm-9">
									<input type="text" name="web" class="col-sm-3">
								</div>
							</div>
							<div class="form-group" >
								<label class="col-sm-3 control-label no-padding-right"><b>Creation Date</b></label>
								<div class="col-sm-9">
									<input type="text" class="datepicker" id="datepicker" name="creation_date" style="width:205px"  class="col-sm-3">
								</div>
							</div>

							<div class="form-group" >
								<label class="col-sm-3 control-label no-padding-right"><b>License</b></label>
								<div class="col-sm-9">
									<select name="lic"  class="col-sm-3">
										<option>Select license</option>
										<option>NOT REDISTRIBUTABLE</option>
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
									<input type="text" class="datepicker" id="datepicker2" style="width:205px" name="assigned_date" readonly="readonly"  class="col-sm-3">
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
									<input type="text" style="width:205px" style="width:205px" class="datepicker" id="datepicker3" name="due_date" readonly="readonly"  class="col-sm-3">
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
							</div>

							<?php
							if(!empty($_POST["submit"])) {
								$conn = mysql_connect("localhost","root","mysql");
								mysql_select_db("cloudcoderdb",$conn);
								$itemCount = count($_POST["test_input"]);
								$ind = (isset($_POST['test_index'])) ? 1 : 0;
								$itemValues=0;
								$query1=mysql_query("SELECT * FROM cc_problems
								ORDER BY problem_id DESC
								LIMIT 1;");
								$row=mysql_fetch_array($query1);
								$pid=$row['problem_id'];
								$query = "INSERT INTO cc_test_cases (problem_id,input,output,secret) VALUES ";
								$queryValue = "";
								for($i=0;$i<$itemCount;$i++) {
									if(!empty($_POST["test_input"][$i]) || !empty($_POST["test_output"][$i])) {
										$itemValues++;
										if($queryValue!="") {
											$queryValue .= ",";
										}
										$queryValue .= "('".$pid."','" . $_POST["test_input"][$i] . "', '" . $_POST["test_output"][$i] . "','".$ind."')";
									}
								}
								$sql = $query.$queryValue;
								if($itemValues!=0) {
									$result = mysql_query($sql);
									if(!empty($result)) $message = "";
								}
								if($itemValues=0) {
									die(mysql_error());
								}
							}
							?>

							<SCRIPT>
								function addMore() {
									$("<DIV>").load("input.php", function() {
										$("#product").append($(this).html());
									});
								}
								function deleteRow() {
									$('DIV.product-item').each(function(index, item){
										jQuery(':checkbox', this).each(function () {

											$(item).remove();

										});
									});
								}
							</SCRIPT>

							<DIV id="outer">
								<DIV id="header">
									<DIV class="float-left">&nbsp;</DIV>
									<!--<DIV class="float-left col-heading">Item Name</DIV>
                                    <DIV class="float-left col-heading">Item Price</DIV> -->
								</DIV>
								<DIV id="product">
									<?php require_once("input.php") ?>
								</DIV>
								<DIV class="btn-action float-clear">
									<div class="col-md-offset-3 col-md-4">
										<input type="button" class="btn btn-primary bt" name="add_item" value="Add Test Case" onClick="addMore();" />
										<input type="button" class="btn btn-primary bt" name="del_item" value="Delete" onClick="deleteRow();" />
									</div>
									<span class="success"><?php if(isset($message)) { echo $message; }?></span>
								</DIV>
								<DIV class="footer">

								</DIV>
							</DIV>

</form>
</body>

</html>