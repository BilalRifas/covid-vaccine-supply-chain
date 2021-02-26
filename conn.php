<?php 
$conn = @mysql_connect("localhost", "root", "") or trigger_error(mysql_error());
mysql_select_db("health", $conn);
?>