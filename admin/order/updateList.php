<?php 
include("connect.php");
$array	= $_POST['arrayorder'];

if ($_POST['update'] == "update"){
	
	$count = 1;
	foreach ($array as $idval) {
		$query = "UPDATE topics SET listorder = " . $count . " WHERE id = " . $idval;
		mysql_query($query) or die('Error, Update list has failed');
		$count ++;	
	}
	echo 'All saved ! Refresh the page to see the changes';
}
?>