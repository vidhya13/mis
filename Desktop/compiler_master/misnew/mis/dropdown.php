
<html>
<body>
	<?php	
													
													include 'connect-db.php';
													//mysql_connect('localhost','root','');
													//mysql_select_db('cc_db');
													$sql = "Select username from cc_users";
													$result = mysql_query($sql);
													
													
			?>
		<form action="dropdown.php" method="post">
			<select name="mentor" >
			<option value="">choose a mentor</option>
			<?php while ($row = mysql_fetch_array($result)) {
			
			$mentor_name=$row['username'];
			?>
			<option value="<?php echo $mentor_name;?>"><?php echo $mentor_name;?></option>
			<?php } ?>
			</select>
			<input type="submit" name="submit" value="Get Selected Values" />
			
		</form>
		
		<?php
if(isset($_POST['submit'])){
// As output of $_POST['mentor']  to display individual value

	$select = $_POST['mentor'];
	
//echo "You have selected :" .$select;  Displaying Selected Value
$sql1 = "update cc_users set website='www.yahoo.com' where username='$select'";
$result = mysql_query($sql1);
}
?>
 
</body>
</html>
