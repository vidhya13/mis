<?php
session_start();       
	   $selected_val='';
          if(isset($_GET['course_name'])){
            $selected_val = $_GET['course_name'];
        echo $selected_val;
		$_SESSION['course_id']=$selected_val;
       
		}
		//session_destroy();
		$sname='';
          if(isset($_GET['section_name'])){
            $sname = $_GET['section_name'];
        }
        echo $sname;
?>