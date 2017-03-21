<?php
include('config.php');
session_start();

$cname=$_POST['course'];
//echo $cname;
$_SESSION['cid']=$_POST['course'];
echo $_SESSION['cid']; 
$_SESSION['sid']=$_POST['seid'];
echo $_SESSION['sid'];
?>