<?php


include('../misnew/config.php');
if(isset($_GET['course_id']))
{

$id=$_GET['course_id'];

$query5=mysql_query("select * from cc_problems where problem_id='$id'");
$row1=mysql_fetch_assoc($query5);



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

	<!--[if lte IE 9]>
	<link rel="stylesheet" href="../../misnew/assets/css/ace-part2.min.css" class="ace-main-stylesheet" />
	<![endif]-->

	<!--[if lte IE 9]>
	<link rel="stylesheet" href="../../misnew/assets/css/ace-ie.min.css" />
	<![endif]-->

	<!-- inline styles related to this page -->

	<!-- ace settings handler 
	<script src="assets/js/ace-extra.min.js"></script> -->

	<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

	<!--[if lte IE 8]>
	<script src="../../misnew/assets/js/html5shiv.min.js"></script>
	<script src="../../misnew/assets/js/respond.min.js"></script>
	<![endif]-->

	<!--auto load script starts here-->
	<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
	<link rel="shortcut icon" href="../styles/favicon.ico" />
	<link rel="stylesheet" type="text/css" href="../styles/style.css" />

	<!--<script type="text/javascript" src="../js/jquery.js"></script>
	<script type="text/javascript" src="../js/compile.js"></script> 
	<script type="text/javascript" src="../js/tab.js"></script>
	<script type="text/javascript" src="../js/jquery.form.js"></script> -->
	<script>
	$(document).ready(function() {
	
		// Fade in the progress bar
		$('#output').hide();
		$('#output').html('<br/>Generating the output &nbsp;&nbsp;&nbsp; <img src="../images/loader.gif" />');
		$('#output').fadeIn();
		$('#output1').hide();
		$('#output1').html('<br/>Generating the output &nbsp;&nbsp;&nbsp; <img src="../images/loader.gif" />');
		$('#output1').fadeIn();
		// Disable the submit button
		$('#form #submit').attr("disabled", "disabled");
		// Clear and hide any error messages
		$('#form .error').html('');
		// Set temporary variables for the script
		var isFocus=0;
		var isError=0;
		// Get the data from the form
		var code=$('#form #code').val();
		//document.getElementById("sam").innerHTML=code;
		var input=$('#form #input').val();
		var language=$('#form #language').val();
		// Validate the data
		if($.trim(code)=='') {
			$('#form #errorCode').html('The code area is empty');
			$('#form #code').focus();
			isFocus=1;
			isError=1;
		}
		// Terminate the script if an error is found
		if(isError==1) {
			$('#output').html('');
			$('#output').hide();
			// Activate the submit button
			$('#form #submit').removeAttr("disabled", "disabled");
			return false;
		}
		$.ajaxSetup ({
			cache: false
		});
		var dataString = 'code='+ encodeURIComponent(code) + '&input=' + encodeURIComponent(input) + '&language=' + encodeURIComponent(language);
		$.ajax({
			type: "POST",
			url: "compile.php",
			data: dataString,
			success: function(msg) {
				$('#output').html(msg);
				$('#form #submit').removeAttr("disabled", "disabled");
			},
			error: function(ob,errStr) {
				$('#output').html('');
				// Activate the submit button
				$('#form #submit').removeAttr("disabled", "disabled");
			}
		});
		
		return false;
	
});
	</script>
	<style>
	td,th
	{
	padding:10px;
	}
	</style>
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
</div></div>
<center>

	<div style="margin-top:60px;border:1px solid black;width:1000px">
		<label style="padding:5px">
			<u><b style="font-size:20px">Exercise Description</b></u>

		</label><br><br>
		<label><?php echo $row1['description'];?></label>
	</div>
</center>
<div style="width:700px;height:500px;margin-left:200px;padding:10px">
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
				<code><textarea name="code" rows=15 cols=100 id="code" style="background-color:#d9d9d9"><?php  if(isset($_POST['code'])) { 
         echo htmlentities ($_POST['code']); } else { echo $row1['skeleton']; }?></textarea></code><br/>
				<span id="errorCode" class="error"></span><br/><br/>

				<input class="btn btn-primary" type="submit" name="submit" value="Submit" id="submit">
				
				<!--<input class="btn btn-primary" type="submit" name="test" value="Test" id="submit"> -->
				<input class="btn btn-primary" type="reset" value="Reset"><br/>



		</td>
		</form>
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
	</div>
</div>
</table>

<?php
/*while($row2=mysql_fetch_assoc($query6))
{
*/

if(isset($_POST['submit']))
{
$query6=mysql_query("select * from cc_test_cases where problem_id='$id'");
$i=1;
$coding=$_POST['code'];
?>
<table style="width:800px;border:'1';" border="1">
<tr>

<th>Outcome</th>
<th>Input</th>
<th>Message</th>
<th>Output</th>
</tr>
<?php
while($row=mysql_fetch_array($query6))
{

?>
<tr>
<td>
<?php
//echo $row['input']."<br>";
if (strpos($coding, $row['input']) === FALSE) {
   echo "<font color='red'>Failed</font><br><br>";
}
else
{
echo "<font color='green'>Passed</font><br><br>";
}
$i++;

?>
</td>
<td><?php echo $row['testinput']; ?></td>
<td><?php echo $row['message']; ?></td>
<td><?php echo $row['output']; ?></td>
<?php
}
}

?>
</table>
<!--<center>
	<div style="margin:20px;padding:20px">
		<table style="margin-top:10px;padding:20px;clear:both;border:2px solid #808000;width:700px;height:170px">
			<tr>

				<td><label><b>Test Input</b></label></td>
				<td><input type="text" name="ti" value="<?php //echo htmlspecialchars($row2['input']); ?>"></td>
			</tr>
			<tr>
				<td><label><b>Test output</b></label></td>
				<td><input type="text" name="to" value="<?php //echo $row2['output']; ?>"></td>
			</tr>
			<tr>
				<td><label><b>Secret</b></label></td>
				<td><input type="checkbox" name="test_index" />If checked, the test is secret (not revealed to students)</td>
			</tr>
		</table>
		<div id="sam"></div>
	</div>
</center> -->
<?php
//}

?>

<?php include('../../misnew/common/footer.php'); ?>

</body>
<?php } ?>
</html>
