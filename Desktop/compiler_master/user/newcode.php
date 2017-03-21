<?php
$code=$_POST["code"];
echo $code;
?>
<html>
	<head>
		<title>Online Compiler for Off-Campus Students</title>
			<meta name="keywords" content="BITS,OffCampus,Pilani,Compiler,WILPD" />
			<link rel="shortcut icon" href="../styles/favicon.ico" />
			<link rel="stylesheet" type="text/css" href="../styles/style.css" />		
		
			<script type="text/javascript" src="../js/jquery.js"></script>
			<!--<script type="text/javascript" src="../js/compile.js"></script>-->
			<script type="text/javascript" src="../js/tab.js"></script>
			<script type="text/javascript" src="../js/jquery.form.js"></script>
			
	</head>

	<body>
	<div id="whole">
		
		<div id="content">
			
			<table class="code">
				<td class="code">	
				<form action="compile.php" method="post" id="form">
					Select Language of Interest:
						<select name="language" id="language">
							<option value="c">C</option>
							<option value="cpp">C++</option>
							<option value="java">Java</option>
							<option value="python2.7">Python</option>
							<option value="python3.2">Python3</option>
						</select>
					<br />
					<strong>Enter Your code here:<br/></strong>
					<textarea name="code" rows=15 cols=100 onkeydown=insertTab(this,event) id="code"></textarea><br/>
					<span id="errorCode" class="error"></span><br/><br/>
					
					<input type="submit" value="Submit" id="submit">
					<input type="reset" value="Reset"><br/>
				</form>
				</td>
			
			<tr>
			<td class="code"><strong>Output:</strong>
			<span id="output"></span><br/></td>
			
			</tr>
		</div>
		
	</div>
	
	</body>
</html>
