<?php
include("common/header.php");

?>

<html>
<head>
	<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
	<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.1.1.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<style>

		tr.selected {
			background-color: #FFCF8B
		}
		td {padding: 5px;}
		.Highlight
		{
			background-color: #dcfac9;
			cursor: pointer;
		}
		.b
		{
			visibility:visible;
		}
		

	</style>

</head>
<body>
<form action="" method="post" class="form-horizontal" role="form" target="">

	<div class="tab-content" id="h4">


		<div id="profile4" class="tab-pane in active">
			<!--	<iframe name="profile">-->
			<div class="row">
				<!--include here-->
				<div style="margin-left:10px">
													<span class="a">
		<a href="#" onclick="document.location.href='new_prob.php?course_id='+document.getElementById('myDiv').innerHTML" class="btn btn-primary btn-sm">New</a>
			<a class="btn btn-sm" id="e">Edit</a>
			<a class="btn btn-sm" id="d">Delete</a>
			<a class="btn btn-sm" name="stat" id="st">Statistics</a>
			<a class="btn btn-primary btn-sm" name="imp" id="im">Import</a>
			<a class="btn btn-sm" name="share" id="sh">Share</a>
			<a class="btn btn-primary btn-sm" name="impc" id="imc">Import Course</a>
			<a class="btn btn-sm" name="mkv" id="mav">Make Visible</a>
			<a class="btn btn-sm" name="mkinv" id="mai">Make Invisible</a>
			<a class="btn btn-sm" name="setdt" id="sdt">Set dates/Times</a>
			
			<a class="btn btn-sm" name="quiz" id="q">Quiz</a>
			</span>


				</div>
				<div><!--form start-->


				</div>

			</div>
		</div>
		<?php
		include('config.php');
	/*	$q=$_GET['cname'];
	//	$var1 = $_POST['var1'];
	if (!isset($_SESSION['course_id'])) { 
echo "";
}
else
{	// check if session user_id is set
	$cid=$_SESSION['course_id'];
	
	$q=$_GET['cname'];
	echo $q;*/
	$cid=$_SESSION['cid'];
	$query=mysql_query("select * from cc_problems where course_id='$cid'");
		echo "<table id='' class='table table-bordered' style='margin-top:10px'>
<thead>
			<tr>
			<th>Id</th>
			<th>Name</th>
			 <th>Description</th>
			 <th>Type</th>
			 <th>Assigned</th>
			 <th>Due</th>
			 <th>Visible</th>
			 
			 <th>Shared</th>
			 <th>Module (CLICK TO EDIT)</th></tr>
			 </thead><tbody>";
			 
		while($row=mysql_fetch_array($query))
		{
		$i=1;
			?>
			<tr id="<?php echo $row['problem_id']; ?>" onclick="un()">
				<td><?php echo $row['problem_id']; ?></td>
				<td><?php echo $row['testname']; ?></td>
				<td><?php echo $row['breif_description']; ?></td>
				<td><?php echo $row['problem_type']; ?></td>
				<td><?php echo $row['assigned_date']; ?></td>
				<td><?php echo $row['due_date']; ?></td>
				<td><?php if($row['visible']==0){ 
				echo "<font color='#E32548'><b>False</b></font>"; }
				else { echo "<font color='#36BD0D'><b>True</b></font>"; } ?></td>
				
				<td><?php if($row['shared']==0){ 
				echo "<font color='#E32548'><b>No</b></font>"; }
				else { echo "<font color='#36BD0D'><b>Yes</b></font>"; } ?></td>
				<td><?php echo $row['module_id']; ?></td>


			</tr>

			<?php
		$i++;
		} 
		
		?>
		</tbody>
		</table>
		<?php 
		//}
		
		?>
		
		<script>
			function un()
			{
				document.getElementById("e").disabled = true;
				
			}
		</script>
		<script>

			$("tr").click(function ()
			{
				$(this).addClass("Highlight").siblings().removeClass("Highlight");
				$("#e").addClass("btn-primary");
				$("#d").addClass("btn-primary");
				$("#st").addClass("btn-primary");
				$("#sh").addClass("btn-primary");
				$("#mav").addClass("btn-primary");
				$("#mai").addClass("btn-primary");
				$("#sdt").addClass("btn-primary");
				$("#mp").addClass("btn-primary");
				$("#q").addClass("btn-primary");
				var a=($(this).attr('id'));
				
				$("#e").click(function()
				{
					var base_url="http://10.100.9.73/compiler_master/misnew/prob_edit.php";
					var full_url=base_url+"?problem_id="+a;
					window.location=full_url;
				});
				$("#d").click(function()
				{
					var base_url="http://10.100.9.73/compiler_master/misnew/prob_delete.php";
					var full_url=base_url+"?problem_id="+a;
					window.location=full_url;
				});
				$("#mav").click(function()
				{
					var base_url="http://10.100.9.73/compiler_master/misnew/prob_mav.php";
					var full_url=base_url+"?problem_id="+a;
					window.location=full_url;
				});
				$("#mai").click(function()
				{
					var base_url="http://10.100.9.73/compiler_master/misnew/prob_mai.php";
					var full_url=base_url+"?problem_id="+a;
					window.location=full_url;
				});
				$("#sh").click(function()
				{
					var base_url="http://10.100.9.73/compiler_master/misnew/prob_share.php";
					var full_url=base_url+"?problem_id="+a;
					window.location=full_url; 
					});

				//$(this).find('.a').prop("disabled",false);
			});


		</script>
		
		</form>

<div  class="space"></div><br><br><br>
<?php include('common/footer.php'); ?>
</body>
</html>