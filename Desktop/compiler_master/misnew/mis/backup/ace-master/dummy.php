<table id="simple-table" class="table table-striped table-bordered table-hover">
											<thead>
												<tr>
													
													<th>Username</th>
													<th>Problem name</th>
													<th>Coursename</th>
													<th>Attempted TC</th>
													<th>Passed TC</th>
													<th>Date </th>
													<th>Time</th>

													
												</tr>
											</thead>

											<tbody>
					<?php while ($row = mysql_fetch_array($query)) {?>
												<tr>
												<td><?php echo $row['Username']; ?></td>
	     		
				<td><?php echo $row['Problem_name']; ?></td>
				
				<td><?php echo $row['Course_name']; ?></td>
				
				<td><?php echo $row['Tot_attempted']; ?></td>
				
				<td><?php echo $row['Tot_passed']; ?></td>
				
				<td><?php echo $row['Date']; ?></td>
				
				<td><?php echo $row['Time']; ?></td>

													
												</tr>

					<?php } ?>
											</tbody>
										</table>