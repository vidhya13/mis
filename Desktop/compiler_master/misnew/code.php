
<html>
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

			
			
			</div>
			<a href="../misnew/playground.php">Back</a>
			<table class="code">
				<td class="code">	
				<form action="compile.php" method="post" id="form">
					Select Language of Interest:
						<select name="language" id="language">
							<option value="c">C</option>
							<option value="cpp">C++</option>
							<option value="java">Java</option>
							<option value="python2.7">Python</option>
							<option value="python3.2">Python3</option>
						</select>
					<br />
					<strong>Enter Your code here:<br/></strong>
					<textarea name="code" rows=15 cols=100 onkeydown=insertTab(this,event) id="code"></textarea><br/>
					<span id="errorCode" class="error"></span><br/><br/>
					<strong>Sample Input please:<br/></strong>
					<textarea name="input" rows=7 cols=100 id="input"></textarea><br/><br/>
					<input type="submit" value="Submit" id="submit">
					<input type="reset" value="Reset"><br/>
				</form>
				</td>
				<td class="code">
				<p>
				For Multiple file implementation of C code, upload your tar.gz or zip or rar file that contains your makefile.</p>
				<form action="compile.php" method="post" enctype="multipart/form-data" id="form2">
					<!--<p>Select Language of Interest:
						<select name="language">
							<option value="1">C</option>
							<option value="2">Python</option>
							<option value="3">Java</option>
						</select>
					</p>-->
					<label for="file">Filename:</label>
					<input type="file" name="file" id="file" /> 
					<br />
					<input type="submit" name="submit" value="Submit" />
					<input type="reset" value="Reset"><br/>
				</form>
			</td>
			<tr>
			<td class="code"><strong>Output:</strong>
			<span id="output"></span><br/></td>
			<td class="code"><strong>Output:</strong>
			<span id="output2"></span><br/></td>
			</tr>
		</div>
		<table>
		<div id="bottom">
			
		</div>
		</table>
	</div>
	
	</body>
</html>
