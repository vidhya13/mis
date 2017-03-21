<html>
<body>
<?php
include('config.php');
include('common/header.php');

	if(isset($_GET['id']))
	{
		$id=$_GET['id'];

		$upd=mysql_query("update cc_users set status=0 where user_id='$id'");
		if($upd)
			{
				header('location:manage_user.php');
			}
	}
	if(isset($_GET['status']))
	{
		$status=$_GET['status'];
			if($status==0)
			{
				$upd=mysql_query("update cc_users set status=1 where user_id='$id'");
				
			}
	}
?>
</body>
</html>
