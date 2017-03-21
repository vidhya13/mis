<html>
<body>
<?php
include('config.php');
//include('header.php');

	if(isset($_GET['problem_id']))
	{
		$id=$_GET['problem_id'];

		$upd=mysql_query("update cc_problems set visible=1 where problem_id='$id'");
	//	$upd1=mysql_query("update cc_test_cases set visible=1 where problem_id='$id'");
		if($upd)
			{
				header('location:mex.php');
			}
	}
	if(isset($_GET['status']))
	{
		$status=$_GET['status'];
			if($status==0)
			{
				$upd=mysql_query("update cc_problems set visible=1 where problem_id='$id'");
			//	$upd1=mysql_query("update cc_test_cases set status=1 where problem_id='$id'");
				
			}
	}
?>
</body>
</html>
