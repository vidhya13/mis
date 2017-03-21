<?php

include('common/header.php'); ?>

					<!--here for the change-->
				<div class="col-sm-12" style="padding-top:10px">
										<div class="tabbable">
											<ul class="nav nav-tabs padding-12 tab-color-blue background-blue" id="myTab4">
												<li >
													<a class="menu" href="single_user.php">Register Single User</a>
												</li>

												<li  >
													<a class="menu" href="existing_user.php">Register Existing User</a>
												</li>

												<li>
													<a class="menu" href="bulk_user.php">Bulk User Registration</a>
												</li>
												<li class="active">
													<a class="menu"  data-toggle="tab" href="#profile4">Manage Users</a>
												</li>
											</ul>

											<div class="tab-content" id="h4">
											

												<div id="profile4" class="tab-pane in active">
											<!--	<iframe name="profile">-->
													<div class="row">
													<!--include here-->
			
													<div><!--form start-->
			<form action="" method="post" class="form-horizontal" role="form" target="_self">
			

										</div>	
										
			</div>		
</div>	

<?php
include('config.php');
$query=mysql_query("select * from cc_user where status=1");
echo "<table id='dynamic-table' class='table table-striped table-bordered table-hover'>
<thead>
			<tr>
			<th>Username</th>
			 <th>Firstname</th>
			 <th>Lastname</th>
			 <th>Email</th>
			 <th>actions</th></tr>
			 </thead>";
while($row=mysql_fetch_array($query))
{
?> <tbody>
<tr>
		<td><?php echo $row['username']; ?></td>
		<td><?php echo $row['firstname']; ?></td>
		<td><?php echo $row['lastname']; ?></td>
		<td><?php echo $row['email']; ?></td>
		<td><a style="padding-left:30px;color:#4286f4" class="fa fa-edit" href="mu_edit.php?id=<?php echo $row['user_id']; ?>"></a>
		<a style="padding-left:20px;color:#e01f59" class="fa fa-trash" href="mu_delete.php?id=<?php echo $row['user_id']; ?>&status=<?php echo $row['status']; ?>"></a></td>
		
		</tr>
		</tbody>
		<?php
		}
?>
</table>		
	</form>								
	
<div  class="space"></div>
			<?php include('common/footer.php'); ?>
			</body>
</html>
