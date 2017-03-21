<?php
/* 
 CONNECT-DB.PHP
 Allows PHP to connect to your database
*/

 // Database Variables (edit with your own server information)
 /*$server = "10.100.1.153";
 $user = "demo";
 $pass = "demo@123";
 $db = "cloudcoderdb";
 */
 $server = "localhost";
 $user = "root";
 $pass = "mysql";
 $db = "cloudcoderdb";
 
 // Connect to Database
 $connection = mysql_connect($server, $user, $pass) 
 or die ("Could not connect to server ... \n" . mysql_error ());
 mysql_select_db($db) 
 or die ("Could not connect to database ... \n" . mysql_error ());


?>