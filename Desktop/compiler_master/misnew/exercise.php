<?php
include('common/header.php');
include('config.php');
session_start(); // start a session
if (isset($_SESSION['SESS_FIRST_NAME'])) { 	   // check if session user_id is set
	$username = $_SESSION['SESS_FIRST_NAME']; //if it is set, assign the value to the variable $userid
}
else { // if it is not set
	$username = ""; // assign a null value to $userid
}
//echo "User ID: " . $userid; //print it on screen.


?>
<html>
<head>
	<!--JQuery Modal-->
	<script src="jquery.modal.js" type="text/javascript" charset="utf-8"></script>
	<script type="text/javascript" src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
	<script type="text/javascript" src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
	<script type="text/javascript" src=" http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>

	<style>
		div.container {
			width: 100%;
			border: 1px solid gray;
		}


		nav {
			float: right;
			width: 500px;
			margin: 0;
			padding: 1em;
			height:400px;
			background-color:#ffbf80;
		}



		article {
			margin-right: 10px;
		//border-right: 1px solid gray;
		//padding: 1em;
			overflow: hidden;
		}



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



	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
	<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.1.1.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

</head>
<body>
<form method="post" action="" target="_self">
	<div class="tab-content container" id="h4">
		<div id="home4" class="tab-pane in active">
			<div class="row">
				<div><!--form start-->
					<form action="" method="post" class="form-horizontal" role="form">
						<!--	<nav>
                                <label>
                                    <u><b style="font-size:20px">Exercise Description</b></u>
                                </label><br>
                                <div id="edes"><script>docment.write($text);</script></div>
                            </nav> -->

						<article>
							<div>
								<label>
									<u><b style="font-size:20px">Exercises</b></u>
								</label>
								<select style="margin-left:300px;">
									<option value="select">All Modules</option>
									<?php
									include("./config.php");
									$query = "SELECT * FROM cc_modules";
									$result = mysql_query($query) or die(mysql_error());
									while($row=mysql_fetch_array($result))
									{
										$bname=$row['id'];
										$name=$row['name'];
										echo "<option value ='".$bname."'> ".$row['name']."</option>";

									}

									?>
								</select>
								<input style="margin-left:10px;" class="btn btn-info" type="submit" name="refresh" value="Refresh">
								<a style="margin-left:10px;" class="btn btn-info" id="e">Load Exercise</a>
								<br>


								<?php
								include('config.php');
								session_start();
								$cid=$_SESSION['cid'];
								$query=mysql_query("select * from cc_problems where course_id='$cid'");
								?>
								<table style="margin-top:10px" id='' class='table table-bordered' style='margin-top:10px'>
									<thead>
									<tr>
									
										<th>Name</th>
										<th style="display: none;">Description</th>
										<th>Due</th>
										<th>Status</th>
									</tr>
									</thead>
									<tbody>
									<?php
									while($row=mysql_fetch_array($query))
									{
										?>

										<tr  id="<?php echo $row['problem_id']; ?>">

											<td name="language" id="language"><?php echo $row['testname']; ?></td>
											<td style="display: none;" class="nr"><?php echo $row['description']; ?></td>
											<td><?php echo $row['due_date']; ?></td>
											<td><?php if($row['status']==0){ echo "<font color='#E32548'><b>InActive</b></font>"; }
												else { echo "<font color='#36BD0D'><b>Active</b></font>"; } ?></td>


										</tr>

										<?php
									}
									?>
									</tbody>
								</table>
					</form>

					<script>

						$("tr").click(function ()
						{
							$(this).addClass("Highlight").siblings().removeClass("Highlight");
							$('#e').prop("enabled",true);

							var a=($(this).attr('id'));

							var $row = $(this).closest("tr");    // Find the row
							var $text = $row.find(".nr").text();
							alert($text);
							$.ajax({
								url: "exercise.php",
								type: "GET",
								data: {account: a},
								async: false,
							});

							$("#e").click(function()
							{
								var base_url="http://10.100.9.73/compiler_master/user/code1.php";
								var full_url=base_url+"?course_id="+a;
								window.location=full_url;
							});

							//$(this).find('.a').prop("disabled",false);
						});


					</script>

				</div>
				</article>

			</div><!-- /.main-content -->
		</div></div></div>

	
	<div style="padding-top:10px;">
		<?php include('common/footer.php'); ?>
	</div>
</body>
</html>
