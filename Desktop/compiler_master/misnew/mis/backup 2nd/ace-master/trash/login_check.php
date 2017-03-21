<?php
		include('connect-db.php');
		//ini_set('error_reporting', 0);
		session_start();
		$username = $_POST['username'];
		$password = $_POST['password'];
		
		echo $username; 
		/* student */
		$result = $conn->prepare("select * from users where username = '1132J07' and password = '$password'")or die(mysql_error());
		$result->execute();
		$num_row = $result->rowcount();
		$row = $result->fetch();
		/* teacher */
		$query_mentor = $conn->prepare("SELECT * FROM users WHERE username='$username' ,IsMentor='yes' AND password='$password'")or die(mysql_error());
		$query_mentor->execute();	
		$num_row_mentor = $query_mentor->rowcount();
		$row_mentor = $query_mentor->fetch();
		if( $num_row > 0 ) { 
		$_SESSION['id']=$row['id'];
		echo 'true_user';	
		$conn->query("insert into user_log (username,login_date,user_id)values('$username',NOW(),".$row['id'].")")or die(mysql_error()); 
		header('location:index_admin.php ');
		}
		else if ($num_row_mentor > 0){
		$_SESSION['id']=$row_mentor['id'];
		echo 'true';
		$conn->query("insert into user_log (username,login_date,user_id)values('$username',NOW(),".$row_mentor['id'].")")or die(mysql_error());
		 header('location:index_mentor.php ');
		 
		 } 
		 else{ 
				echo 'false';
		}	
		?>