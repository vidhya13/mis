<!DOCTYPE html>
<html>
<head>
<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>

<?php
$q = $_GET['q'];

include('config.php');
$sql="SELECT * FROM cc_problems WHERE course_id = '".$q."'";
$result = mysql_query($sql);
?>
<div id="txtHint"></div>
<table >
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
									while($row=mysql_fetch_array($result))
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
								<?php
mysql_close($con);
?>
</body>
</html>