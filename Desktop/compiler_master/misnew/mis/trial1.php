<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
        <title>Graph </title>
    </head>
    
<body style="font-family: Arial;border: 0 none;">
    <!-- where the chart will be rendered -->
    <div id="visualization" style="width: 600px; height: 400px;"></div>
 
    <?php
 
    //include database connection
    //include 'db_connect.php';
	
    $mysqli=mysqli_connect('10.100.1.147','demo','demo@123','cloudcoderdb');
	
    //query all records from the database
    $query = "select s.event_id,e.user_id,u.username,e.problem_id,p.course_id,p.testname,cc.name,cc.title,u.email,t.name,cc.year, s.num_tests_attempted,s.num_tests_passed,e.timestamp from cc_events e,cc_users u,cc_submission_receipts s,cc_courses cc,cc_problems p,cc_terms t where cc.id =p.course_id and s.event_id=e.id and u.id=e.user_id and e.problem_id=p.problem_id and t.id=cc.term_id and left(e.timestamp,10) > 1448515900  and left(e.timestamp,10) < 1448515950 and p.course_id order by u.id,p.problem_id ";
 
    //execute the query
    $result = $mysqli->query( $query );
 
    //get number of rows returned
    $num_results = $result->num_rows;
 
    if( $num_results > 0){
 
    ?>
        <!-- load api -->
        <script type="text/javascript" src="http://www.google.com/jsapi"></script>
        
        <script type="text/javascript">
            //load package
            google.load('visualization', '1', {packages: ['corechart']});
        </script>
 
        <script type="text/javascript">
            function drawVisualization() {
                // Create and populate the data table.
                var data = google.visualization.arrayToDataTable([
                    ['username', 'num_tests_passed'],
                    <?php
                    while( $row = $result->fetch_assoc() ){
                        extract($row);
                        echo "['{$username}', {$num_tests_passed}],";
                    }
                    ?>
                ]);
 
                // Create and draw the visualization.
                new google.visualization.PieChart(document.getElementById('visualization')).
                draw(data, {title:"Cloud Coder Users Performance"});
            }
 
            google.setOnLoadCallback(drawVisualization);
        </script>
    <?php
 
    }else{
        echo "No programming languages found in the database.";
    }
    ?>
    
</body>
</html>