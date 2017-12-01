<?php
$dbhost							= "localhost";
$dbuser							= "root";
$dbpass							= "123";
$dbname							= "coding_world";

$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die ("Error connecting to database");
mysql_select_db($dbname);
?>