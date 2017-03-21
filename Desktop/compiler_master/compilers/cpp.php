<?php
	$CC="g++";
	$out="./a.out";
	$code=$_POST["code"];
	$input=$_POST["input"];
	$filename_code="main.cpp";
	$filename_in="input.txt";
	$filename_error="error.txt";
	$executable="a.out";

	$command=$CC." -lm ".$filename_code;
	$command_error=$command." 2> ".$filename_error;
	$command_error2="./".$executable;
	//echo $command_error."\n";
	//echo $command_error2."\n";
	//if(trim($code)=="")
	//die("The code area is empty");

	$file_code=fopen($filename_code,"w+");
	fwrite($file_code,$code);
	fclose($file_code);
	$file_in=fopen($filename_in,"w+");
	fwrite($file_in,$input);
	fclose($file_in);
	//shell_exec("chmod 777 $executable");
	//shell_exec("chmod 777 $filename_error");
	shell_exec("chown www-data:www-data $filename_code");
	shell_exec("chown www-data:www-data $filename_in");
	shell_exec("chown www-data:www-data $filename_error");
	shell_exec($command_error);
	shell_exec("chown www-data:www-data $executable");
	$error=file_get_contents($filename_error);

	shell_exec($command_error2);
	$error=file_get_contents($filename_error);

	if(trim($error)=="")
	{
		if(trim($input)=="")
		{
			$output=shell_exec($command_error2);
		}
		else
		{
			$command=$command." < ".$filename_in;
			$output=shell_exec($command_error2);
		}
		echo "<pre>$output</pre>";
	}
	else
	{
		echo "<pre>$error</pre>";
	}
	exec("rm $filename_code");
	exec("rm *.o");
	exec("rm *.txt");
	exec("rm $executable");
?>
