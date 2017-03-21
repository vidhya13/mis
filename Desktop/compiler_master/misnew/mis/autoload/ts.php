<?php
$ts = 1458781266;
$date = new DateTime("@$ts");
echo $date->format('U = Y-m-d H:i:s') . "\n";
?>