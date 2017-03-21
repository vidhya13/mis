<?php

	$languageID=$_POST["language"];
	if(isset($_FILES["file"]) && isset($_FILES["file"]["name"]) && $_FILES["file"]["name"]!="")
	{
		include "../compilers/make.php";
	}
	else
	{
		switch($languageID)
			{
				case "c":
				{
					include("../compilers/c.php");
					include("../user/code1.php");
					break;
				}
				case "cpp":
				{
					include("../compilers/cpp.php");
					include("../user/code1.php");
					break;
				}
				case "java":
				{
					include("../compilers/java.php");
					include("../user/code1.php");
					break;
				}
				case "python2.7":
				{
					include("../compilers/python27.php");
					include("../user/code1.php");
					break;
				}
				case "python3.2":
				{
					include("../compilers/python32.php");
					include("../user/code1.php");
					break;
				}
				case "php":
				{
					include("../compilers/php.php");
					include("../user/code1.php");
					break;
				}
			}
	}
?>
