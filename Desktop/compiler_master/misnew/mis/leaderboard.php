<?php
//echo "User ID: " . $userid; //print it on screen.
ini_set('error_reporting', 0);
			require_once("dbcontroller.php");
			$db_handle = new DBController();
$sql="select s.event_id,e.user_id,u.username,e.problem_id,p.course_id,p.testname,cc.name,cc.title,u.email,t.name,cc.year, s.num_tests_attempted,s.num_tests_passed,e.timestamp from cc_events e,cc_users u,cc_submission_receipts s,cc_courses cc,cc_problems p,cc_terms t where cc.id =p.course_id and s.event_id=e.id and u.id=e.user_id and e.problem_id=p.problem_id and t.id=cc.term_id and left(e.timestamp,10) > 1448515700  and left(e.timestamp,10) < 1448515950 and p.course_id order by u.id,p.problem_id ";
$results = $db_handle->runQuery($sql);
?>
<html><head><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" /><meta charset="utf-8" /><title>Student details</title><meta name="description" content="Static &amp; Dynamic Tables" /><meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" /><link rel="stylesheet" href="project/ace-master/assets/css/bootstrap.min.css" /><link rel="stylesheet" href="project/ace-master/assets/font-awesome/4.2.0/css/font-awesome.min.css" /><link rel="stylesheet" href="project/ace-master/assets/fonts/fonts.googleapis.com.css" /><link rel="stylesheet" href="project/ace-master/assets/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" /><script src="project/ace-master/assets/js/ace-extra.min.js"></script></head><body><div class="table-header"></align></div><div><table id="dynamic-table" class="table table-striped table-bordered table-hover" width="300"><thead><tr><th>S.No</th><th>User Name</th><th>Problem Names</th><th>Total Completed Problems</th></tr></thead>
<tbody>

<?php
$count = 1;
foreach($results as $table_row){
$attempted_tc=$table_row['num_tests_attempted'];
												$passed_tc	=$table_row['num_tests_passed'];		
												$list_problem	=$table_row['testname'];
												
												$problemLists=array($list_problem);
												$problemLists=array_unique($problemLists);
												
												//print_r ($problemLists);
												
												/*for($j=1;$j<count($problemLists);$j++){
													
													$unique_problem=$problemLists[$j];
													
													echo $unique_problem;
												}*/
												//print_r ($unique_problem);
												
												if(!$attempted_tc ==0 && !$passed_tc ==0){
													
													$maximum=max(array($attempted_tc));
													for ($i = 1; $i <count($maximum); $i++) {
													if ($a[$i] > $maximum) {
														$maximum = $a[$i];
													}
													}
								
													
												}
                                                $my_array = array();												
												if($maximum==$passed_tc){
													array_push($my_array,$table_row['testname']);
												}
												
												
																								
?>
<?php
if(count($my_array)!=0){
	
	?>

<tr>
<td><?php echo $count;?></td>

<?php 

$username =$table_row['username'];
$array_prob = $table_row['testname'];
//$array_dict=array($username);

//print_r ($array_dict);
//array_push($array_dict,$array_prob);

//print_r ($array_dict);
//$array_dict[$username]=$array_prob;

//print_r ($array_dict);

//echo key($array_dict);
//foreach(array_keys($array_dict) as $paramName)
  //echo $paramName . "<br>";
//print_r(array_keys($array_dict));
//$array = array($array_dict=> array($array_prob));
//print_r(array_keys($array));

$array_dict=array(array($username,$array_prob));
//print_r ($array_dict);
$number = count($array_dict);
//echo $number;

//$uni=array_unique($array_dict($username));
//echo $uni;
//print_r ($uni);
///////////////

/////////////

for ($row = 0; $row <  $number; $row++) {
   echo "<p><b>Row number $row</b></p>";
   echo "<ul>";
   for ($col = 0; $col <  10; $col++) {
     echo "<li>".$array_dict[$row][$col]."</li>";
	
   }
   echo "</ul>";
  

}

//echo ($array_dict[0][1]);
/*
group_by_key($array_dict);
function group_by_key ($array_dict) {
  $result = array();
  foreach ($array_dict as $sub) {
    foreach ($sub as $k => $v) {
      $result[$k][] = $v;
    }
  }
  return $result;
}
print_r($array_dict);
*/
//print_r (each($array_dict));
//echo implode("",$array_dict($username));
?>

<td><?php echo $table_row['username']; ?></td>
	     		
				
				
				<td><?php echo implode(" ",$my_array); ?></td>
		
				<td><?php echo count($my_array); ?></td>
</tr>
<?php $count=$count+1;
}}?>
</tbody></table></div><script src="project/ace-master/assets/js/jquery.2.1.1.min.js"></script><script src="project/ace-master/assets/js/bootstrap.min.js"></script><script src="project/ace-master/assets/js/jquery.dataTables.min.js"></script><script src="project/ace-master/assets/js/jquery.dataTables.bootstrap.min.js"></script><body></html>