<html>
<head>
<script type="text/javascript"> 
   function clickAndDisable('link') {
     // disable subsequent clicks
     var a = document.getElementById('link');
        a.href = "http://www.google.com";
     
   }   
</script>	
</head>
<body>

<a id="link" href="#" onclick="clickAndDisable()">click me to hide
</a>
<?php
include('connect-db.php');


	/*$sql ="update cc_mentor_mentis set menti_II='rahul' where id='101'";
	//$sql = "select * from cc_mentor_mentis";
	$result = mysql_query($sql) or die(mysql_error());
	//$count =mysql_num_rows($result);
	//echo $result;
if($result>0)
	{
		echo $result;
	 $sql=mysql_query("INSERT INTO cc_mentor_mentis(id,username,menti_I,menti_II,menti_III,menti_IV,menti_V) VALUES ('102','kumaruuu','','','','','')") or die(mysql_error());
 
	}
	else
	{
		echo 'error';
	}*/
	
	
 
 ?>
 </body>
 </html>
 