<?php
if(isset($_POST['submit']))
{
$name=$_POST['code'];

$input="printf('hello')";
if (strpos($name, $input) === FALSE) {
   echo "<script>alert('test case failed');</script>";
}
else
{
echo "<script>alert('test case passed');</script>";
}
}
echo $name;
?>
<html>
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>KG Cloud Coder</title>

		<meta name="description" content="overview &amp; stats" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="../misnew/assets/css/bootstrap.min.css" />
		<link rel="stylesheet" href="../misnew/assets/font-awesome/4.2.0/css/font-awesome.min.css" />

		<!-- page specific plugin styles -->

		<!-- text fonts -->
		<link rel="stylesheet" href="../misnew/assets/fonts/fonts.googleapis.com.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="../misnew/assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="../../misnew/assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
		<![endif]-->
	
		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="../../misnew/assets/css/ace-ie.min.css" />
		<![endif]-->

		<!-- inline styles related to this page -->

		<!-- ace settings handler -->
		<script src="../misnew/assets/js/ace-extra.min.js"></script>

		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<script src="../../misnew/assets/js/html5shiv.min.js"></script>
		<script src="../../misnew/assets/js/respond.min.js"></script>
		<![endif]-->
		
		<!--auto load script starts here-->
		<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
			<link rel="shortcut icon" href="../styles/favicon.ico" />
			<link rel="stylesheet" type="text/css" href="../styles/style.css" />		
		
			<script type="text/javascript" src="../js/jquery.js"></script>
			<script type="text/javascript" src="../js/compile.js"></script>
			<script type="text/javascript" src="../js/tab.js"></script>
			<script type="text/javascript" src="../js/jquery.form.js"></script>
			<script type="text/javascript">
				$(document).ready(function() { 
					$('#form2').ajaxForm(function(msg) { 
						$('#output2').html(msg); 
					}); 
				});
			</script>
	</head>

	<body class="no-skin" style="background-color:white">
<div id="navbar" class="navbar navbar-default" style="height:50px">
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
			<a href="../misnew/exercise.php"  style="margin-left:1050px;margin-top:10px;" class="btn btn-primary btn-md"><< Back</a>
			<table class="code" style="width:1000px;margin:30px;padding:20px;">
				<td class="code">	
				<form action="compile.php" method="post" id="form">
					<div style="border:1px solid balck;background-color:#ffffe6;margin:10px;padding:20px">					
						Select Language of Interest:
						<select name="language" id="language">
							<option value="c">C</option>
							<option value="cpp">C++</option>
							<option value="java">Java</option>
							<option value="python2.7">Python</option>
							<option value="python3.2">Python3</option>
							<option value="php">PHP</option>
						</select>
					</div>
					<br />
					<strong>Enter Your code here:<br/></strong>
					<code><textarea name="code" rows=15 cols=150 onkeydown=insertTab(this,event) id="code" style="background-color:#d9d9d9"></textarea></code><br/>
					<span id="errorCode" class="error"></span><br/><br/>
					<!--<strong>Sample Input please:<br/></strong>
					<textarea name="input" rows=7 cols=150 id="input" style="background-color:#d9d9d9"></textarea><br/><br/> -->
					<input class="btn btn-primary" type="submit" name="submit" value="Submit" id="submit">
					<input class="btn btn-primary" type="reset" value="Reset"><br/>
				
				</td>
				
			<tr>
			<td class="code"><strong>Output:</strong>
			<span id="output"></span><br/></td>
			
			</tr>
		</div>
		<table>
		<div id="bottom">
			
		</div>
		</table>
	</div>
	<?php include('../../misnew/common/footer.php'); ?>
	</form>
	</body>
</html>
