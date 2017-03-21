<?php
	ob_start();
	session_start(); // start a session
	if (isset($_SESSION['SESS_FIRST_NAME'])) 
	{ 	// check if session user_id is set
		$username = $_SESSION['SESS_FIRST_NAME'];  //if it is set, assign the value to the variable $userid
	}
	else 
	{ // if it is not set
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
	
	<body class="no-skin" onload-="submitthis();">
		
		<form action="" method="post">
		
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
					<a href="index.html" class="navbar-brand">
						<small>
						<i class="fa fa-cloud"></i>KG Cloud Coder Admin						
						</small>			
					</a>			
				</div>

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
</div>
		<div class="main-container" id="main-container">
			

			

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
								<div class="form-group">
						<label class="col-sm-1 control-label" for="form-field-1">Select course</label>
			<div class="col-sm-9" >	
					
			<select class="col-sm-4" id="course-list" data-placeholder="select course" onchange="submitthis(); this.form.submit();" name="course_name">
				<option>select</option>
					<?php
					include("./config.php");
					$query = "SELECT * FROM cc_courses"; 
					  $result = mysql_query($query) or die(mysql_error());
					  $selected = 'selected="selected"';
						while($row=mysql_fetch_array($result))
						{
						 if (!empty($_POST['course_name']) && $row['id'] == $_POST['course_name']) {
						$selected = 'selected="selected"';
						} else {
							$selected = '';
							}
						$bname=$row['id'];
						$name=$row['title'];
						echo "<option ".$selected." value ='".$bname."' > ".$row['title']."</option>";
						
						}

				?>
			</select>

		<div id="myDiv" name="di" hidden></div>	 
			
			<label class="col-sm-1 control-label" for="form-field-1">Section</label>
					
			<select class=" col-sm-2" id="section-list" data-placeholder="section" onchange="submitthis();this.form.submit();" name="section_name">
			<option value="">Section
			<?php
					include("./config.php");
					$query = "SELECT * FROM cc_user"; 
					  $result = mysql_query($query) or die(mysql_error());
						while($row=mysql_fetch_array($result))
						{
						if(!empty($_POST['section_name']) && $row['user_id'] == $_POST['section_name'])
						{
							$selected="selected='selected'";
						}
						else
						{
							$selected='';
						}
						$bname=$row['user_id'];
						$name=$row['section'];
						echo "<option ".$selected." value ='".$bname."'> ".$row['section']."</option>";
						
						}

				?>
			</option>
			</select>
			<div id="myDiv"></div>
			</div>
			</form>
			
			<script>
			
function showMe (){}		
		
		
		/* 	$("body").on("change","#section-list,#course-list",function()
			{
			alert(1111); return false;
			}); */
			
			
			



function submitthis()
{

var crid = $("#course-list").val(),
	seid = $("#section-list").val();
	
$.ajax(
{
	type: "POST",
  url: "ajax.php",
  data:{"course":crid,"seid":seid},
  success:function(data)
  {
  //alert(data);
  }
 
});

return false;
  
    var val = document.getElementById('course-list').value;
	var val1 = document.getElementById('section-list').value;
    console.log(val);
	console.log(val1);
    var xmlhttp;
    if (window.XMLHttpRequest)
{// code for IE7+, Firefox, Chrome, Opera, Safari
 xmlhttp=new XMLHttpRequest();
 }
else
 {// code for IE6, IE5
 xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
}
    xmlhttp.onreadystatechange=function()
{
if (xmlhttp.readyState==4 && xmlhttp.status==200)
 {
	
    document.getElementById("myDiv").innerHTML=xmlhttp.responseText;
 }
 }
  xmlhttp.open("GET","reply.php?course_name="+val,true);


 xmlhttp.send();
 
}

    </script>
	<!--<script language="javascript">
    function showMe(str)
    {
    document.getElementById('myDiv').innerHTML = str;
	window.location="http://localhost/misnew/mex.php";
    }   
    </script>  	-->
	
			
			</div>
					<!--here for the change-->
				<div class="col-sm-12"  style="padding-top:10px">
										<div class="tabbable">
											<ul class="nav nav-tabs padding-12 tab-color-blue background-blue" id="myTab4">
												<li >
													<a class="menu" href="exercise.php">Exercises</a>
												</li>

												<li>
													<a class="menu"  href="account.php">Account</a>
												</li>

												<li>
													<a class="menu"  href="../user/code.php">Playground</a>
												</li>
												<li>
													<a class="menu"  href="single_user.php">Manage Users</a>
												</li>
												<li>
													<a class="menu"  href="mex.php">Manage Exercises</a>
												</li>
											</ul>
											</form>
											</body>
											</html>
