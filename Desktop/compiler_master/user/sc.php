<?php
include('../misnew/config.php');
if(isset($_GET['course_id']))
{
	$id=$_GET['course_id'];
}
?>
<html>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta charset="utf-8" />
	<title>Dashboard - KG Cloud Coder Admin</title>

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

	<!-- ace settings handler -->
	<script src="assets/js/ace-extra.min.js"></script>

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
					KG Cloud Coder Admin
				</small>
			</a>
		</div>

		<center>
			<div style="margin-top:60px;border:1px solid black;width:1000px">
				<label style="padding:5px">
					<u><b style="font-size:20px">Exercise Description</b></u>

				</label><br><br>
				<label><?php echo $row1['description']; ?></label>
			</div>
		</center>
		<div style="width:300px;margin-left:300px;padding:10px">
			<!--<select >
			<option>DEFAULT</option>
			<option></option>
			</select> -->
			<a href="../misnew/exercise.php"  class="btn btn-primary btn-sm"><< Back</a>
			<!--<a href="../misnew/logout.php"  class="btn btn-primary btn-sm">Logout</a> -->
			<table class="code">
				<td class="code">
					<form action="" method="post" id="form">
						<div style="" hidden>
							Select Language of Interest:
							<select name="language" id="language">
								<option value="c" <?php if($row1['problem_type']=='c') { ?> selected="selected" <?php } ?>>C</option>
								<option value="cpp" <?php if($row1['problem_type']=='c++') { ?> selected="selected" <?php } ?>>C++</option>
								<option value="java" <?php if($row1['problem_type']=='java') { ?> selected="selected" <?php } ?>>Java</option>
								<option value="python2.7" <?php if($row1['problem_type']=='python') { ?> selected="selected" <?php } ?>>Python</option>
								<option value="python3.2" <?php if($row1['problem_type']=='python3') { ?> selected="selected" <?php } ?>>Python3</option>
								<option value="php" <?php if($row1['problem_type']=='PHP') { ?> selected="selected" <?php } ?>>PHP</option>
							</select>
						</div>
						<br />
						<strong>Enter Your code here:<br/></strong>
						<code><textarea name="code" rows=15 cols=100 onkeydown=insertTab(this,event) id="code" style="background-color:#d9d9d9"><?php echo $row1['skeleton']; ?></textarea></code><br/>
						<span id="errorCode" class="error"></span><br/><br/>

						<input class="btn btn-primary" type="submit" name="submit" value="Submit" id="submit">

						<input class="btn btn-primary" type="reset" value="Reset"><br/>



				</td>

				<tr>
					<!--<td class="code"><strong>Output:</strong>
                    <button id="output" name="output"></button><br/>

                    <input id="output" name="output">
                    </td> -->
				<tr>
					<td class="code"><strong>Output:</strong>
						<span id="output"></span><br/></td>

				</tr>


				</tr>
		</div>
		<table>
			<div id="bottom">

			</div>
		</table>

		<?php


		?>
		<center>
			<div style="margin:20px;padding:20px">
				<table style="margin-top:10px;padding:20px;clear:both;border:2px solid #808000;width:700px;height:170px">
					<tr>

						<td><label><b>Test Input</b></label></td>
						<td><input type="text" name="ti" value="<?php echo htmlspecialchars($row2['input']); ?>"></td>
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
	</div>
</div>
<?php include('../../misnew/common/footer.php'); ?>
</form>
</body>
<?php } ?>
</html>
